<?php

namespace ActivismeBe\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Visie controllers
 * 
 * @author      Tim Joosten <Topairy@gmail.com>
 * @copyright   2017 Tim Joosten
 */
class VisieController extends Controller
{
    /**
     * De index pagina waar onze visie op word uitgelegd.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('frontend.visie');
    }
}
