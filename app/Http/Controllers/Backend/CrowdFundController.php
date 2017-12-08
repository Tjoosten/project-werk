<?php

namespace ActivismeBe\Http\Controllers\Backend;

use Illuminate\Http\Request;
use ActivismeBe\Http\Requests\Backend\CrowdfundValidator;
use ActivismeBe\Repositories\UserRepository;
use ActivismeBe\Repositories\GiftRepository;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Mollie\Laravel\Facades\Mollie;

class CrowdFundController extends Controller
{
    private $userRepository; 
    private $giftRepository; 
    private $paymentProvider; //** @var Reserved variable for the mollie laravel api. */

    public function __construct(UserRepository $userRepository, GiftRepository $giftRepository, Mollie $paymentProvider)
    {
        $this->userRepository  = $userRepository;
        $this->giftRepository  = $giftRepository;
        $this->paymentProvider = $paymentProvider;
    }

    public function store(CrowdfundValidator $input): View
    {
        if ($user = $this->userRepository->create($input->all())) {
            $payment = $this->paymentProvider->api()->payments()->create([
                'amount'      => $input->bedrag, 
                'description' => "Gift van {$input->bedrag} voor Activisme_BE", 
                'redirectUrl' => route('ondersteuning.index') 
            ]);

            $payment        = $this->paymentProvider->api()->payments()->get($payment->id);
            $giftOpgeslagen = $this->giftRepository->create(['author_id' => $user->id, 'description' => $payment->description, 'amount' => $payment->amount]);

            if ($payment->isPaid() && $giftOpgeslagen) {
                return view('frontend.ondersteuning-bedankt', compact('user', '$transactie'));
            }
        } 
    }
}
