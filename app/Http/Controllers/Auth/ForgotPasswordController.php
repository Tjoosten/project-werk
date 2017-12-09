<?php

namespace ActivismeBe\Http\Controllers\Auth;

use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * --------------------------------------------------------------------------
 * Password Reset Controller
 * --------------------------------------------------------------------------
 * 
 * This controller is responsible for handling password reset emails and 
 * includes a trait which assists in sending these notifications from 
 * your appication to your users. Feel free to explore this trait.
 */
class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
}
