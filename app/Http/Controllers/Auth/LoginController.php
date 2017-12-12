<?php

namespace ActivismeBe\Http\Controllers\Auth;

use ActivismeBe\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * --------------------------------------------------------------------------
 * Login controller
 * --------------------------------------------------------------------------
 * 
 * This controller handles authenticating users for the application and 
 * redirecting them to your home screen. The controller uses a trait to
 * conveniently provide its functionality to your application.
 */
class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    /**
     * {@inheritdoc}
     */
    public function showLoginForm()
    {
        if (! session()->has('url.intended')) {
            session(['url.intended' => url()->previous()]);
        }
        
        return view('auth.login');    
    }
}
