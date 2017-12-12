<?php

namespace ActivismeBe\Http\Controllers\Backend;

use ActivismeBe\Http\Requests\PaymentValidator;
use ActivismeBe\Repositories\UserRepository;
use ActivismeBe\Repositories\BackerRepository;
use ActivismeBe\Repositories\GiftRepository;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;
use Mollie_API_Exception;

/**
 * [Backend]: crowdfund controller. 
 * 
 * Deze controller word gebruikt voor het opslaan/verwerking van de gift. 
 * 
 * @author      Tim Joosten <Topairy@gmail.com>
 * @copyright   2017 Tim Joosten
 */
class CrowdFundController extends Controller
{
    private $userRepository;    /** @var UserRepository     $userRepository   */ 
    private $giftRepository;    /** @var GiftRepository     $giftRepository   */
    private $backerRepository;  /** @var BackerRepository   $backerRepository */

    /**
     * CrowdfundController constructor
     *
     * @param  UserRepository   $userRepository     Abstractie laaf tussen controller, user logica en ORM.
     * @param  GiftRepository   $giftRepository     Abstractie laag tussen controller, gift logica en ORM.
     * @param  Backerrepository $backerRepository   Abstractie laag tussen controller, backer logica en ORM.
     * @return void
     */
    public function __construct(UserRepository $userRepository, GiftRepository $giftRepository, BackerRepository $backerRepository)
    {
        $this->userRepository   = $userRepository;
        $this->giftRepository   = $giftRepository;
        $this->backerRepository = $backerRepository;
    }

    /**
     * Verwerking en opslag van de gift in ons systeem en dat van Mollie. 
     *
     * @todo [Ons systeem]: Het aanmaken van de gebruiker in het systeem.
     * 
     * @param  PaymentValidator $input  De door gebruiker gegeven data. (gavalideerd).
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PaymentValidator $input): RedirectResponse
    {
        if ($this->giftRepository->validatePlan($input->plan)) {
            try // Probeer een betaling aan te maken in het systeem van mollie.  
            { 
                // Payment Gateway Provider
                $payment = Mollie::api()->payments()->create(['amount' => $input->plan, 'description' => 'Steun Activisme_BE', 'redirectUrl' => route('ondersteuning.bedanking')]);

                // Internal Payment system.
                $backer = $this->backerRepository->entity()->firstOrCreate($input->except(['_token', 'plan']));
                $this->giftRepository->create(['backer_id' => $backer->id, 'amount' => $input->plan, 'transaction_id' => $payment->id, 'status' => $payment->status]);
            } 

            catch (Mollie_API_Exception $exception) // De foutmelding als iets misploopt. Log deze en stuur de gebruiker terug?
            { 
                Log::emergency('Mollie payment issues', ['error' => htmlspecialchars($exception->getMessage())]);

                flash('Helaas konden we de betaling niet doorvoeren. Door een interne fout in het systeem.')->warning(); 
                return redirect()->route('ondersteuning.index');
            }
            
            // Geen flash session nodig. Omdat we verder gaan in een externe url van Mollie.
            return redirect()->away($payment->getPaymentUrl());
        }

        // De gebruiker heeft een verkeerde betalings logica doorgegeven.  
        flash('U hebt een verkeerd betaalplan doorgegeven.')->warning();
        return redirect()->route('ondersteuning.index');
    }
}
