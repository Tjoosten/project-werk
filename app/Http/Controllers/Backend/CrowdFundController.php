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

class CrowdFundController extends Controller
{
    private $userRepository; 
    private $giftRepository;

    public function __construct(UserRepository $userRepository, GiftRepository $giftRepository)
    {
        $this->userRepository  = $userRepository;
        $this->giftRepository  = $giftRepository;
    }

    public function store(PaymentValidator $input, Log $logger): RedirectResponse
    {
        $paymentData = [
            'amount'      => $input->plan,
            'description' => 'Steun Activisme_BE',
            'redirectUrl' => route('ondersteuning.bedanking') // TODO: Registratie URI.
        ];

        if ($this->giftRepository->validatePlan($input->plan)) {
            try {
                $payment = Mollie::api()->payments()->create($paymentData);
            } catch (Mollie_API_Exception $exception) {
                $logger->emergency('Mollie payment issues', ['error' => htmlspecialchars($exception->getMessage())]);
                return redirect()->route('ondersteuning.index');
            }

            // TODO: insert method for creating the backer.
            // TODO: Insert method for creating the payment in our system.
            // TODO: Attach both to each other.

            return redirect()->away($payment->getPaymentUrl());
        }

        return redirect()->route('ondersteuning.index');
    }
}
