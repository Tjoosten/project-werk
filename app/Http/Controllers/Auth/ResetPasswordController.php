<?php

namespace ActivismeBe\Http\Controllers\Auth;

use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

/**
 * --------------------------------------------------------------------------
 * Password Reset Controller.
 * --------------------------------------------------------------------------
 * 
 * This controller is responsible for handling password reset requests 
 * and uses a simple trait to include this behaviour. You're free to 
 * explore this trait and override any methods you wish to tweak.
 */
class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

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
