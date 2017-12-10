<?php

namespace ActivismeBe\Http\Controllers;

use Illuminate\Http\Request;

/**
 * [Frontend]: Disclaimer controller
 * 
 * @author    Tim Joosten <Topairy@gmail.com>
 * @copyright 2017 Tim Joosten
 */
class DisclaimerController extends Controller
{
    /**
     * De disclaimer pagina
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.disclaimer');
    }
}
