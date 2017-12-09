<?php

namespace ActivismeBe\Http\Controllers\Backend;

use ActivismeBe\Http\Requests\PaymentValidator;
use ActivismeBe\Repositories\UserRepository;
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
    private $userRepository; /** @var UserRepository $userRepository */ 
    private $giftRepository; /** @var GiftRepository $giftRepository */

    /**
     * CrowdfundController constructor
     *
     * @param  UserRepository $userRepository Abstractie laaf tussen controller, user logica en databank.
     * @param  GiftRepository $giftRepository Abstractie laag tussen controller, gift logica en databank.
     * @return void
     */
    public function __construct(UserRepository $userRepository, GiftRepository $giftRepository)
    {
        $this->userRepository = $userRepository;
        $this->giftRepository = $giftRepository;
    }

    /**
     * Verwerking en opslag van de gift in ons systeem en dat van Mollie. 
     *
     * @todo [Ons systeem]: maak de redirectUrl aan. ( route('ondersteuning.bedankin') )
     * @todo [Ons systeem]: Het aanmaken van de gebruiker in het systeem.
     * @todo [Ons systeem]: Methode voor het opslaan van de betalings gegevens. 
     * @todo [Ons systeem]: Attacheer de backer aan de betalings gegevens. 
     * 
     * @param  PaymentValidator $input  De door gebruiker gegeven data. (gavalideerd).
     * @param  Log              $logger De log instantie voor het wegschrijven van een mogelijke foutmelding. 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PaymentValidator $input, Log $logger): RedirectResponse
    {
        if ($this->giftRepository->validatePlan($input->plan)) {
            try // Probeer een betaling aan te maken in het systeem van mollie.  
            { 
                $payment = Mollie::api()->payments()->create([
                    'amount'      => $input->plan,
                    'description' => 'Steun Activisme_BE',
                    'redirectUrl' => route('ondersteuning.bedanking')
                ]);
            } 

            catch (Mollie_API_Exception $exception) // De foutmelding als iets misploopt. Log deze en stuur de gebruiker terug?
            { 
                $logger->emergency('Mollie payment issues', ['error' => htmlspecialchars($exception->getMessage())]);

                flash('Helaas konden we de betaling niet doorvoeren.')->warning(); 
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
