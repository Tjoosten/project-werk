<?php

namespace ActivismeBe\Http\Controllers\Auth;

use Illuminate\Http\Request;
use ActivismeBe\Repositories\UserRepository;
use ActivismeBe\Http\Controllers\Controller;

/**
 * [Authencation]: Account configuratie controller. 
 * 
 * De controller voor het aanpassen van account gegevens. 
 * 
 * @author    Tim Joosten <Topairy@gmail.com>
 * @copyright 2017 Tim Joosten
 */
class AccountSettingsController extends Controller
{
    public function __construct(UserRepository $userRepository) 
    {
        $this->middleware('auth'); 
        $this->userRepository = $userRepository;
    }

    public function index() 
    {

    }

    public function updateInformation() 
    {

    }

    public function updateSecurity() 
    {
        
    }
}
