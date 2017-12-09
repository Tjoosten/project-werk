<?php

namespace ActivismeBe\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * [Frontend]: Crowdfund controller. 
 * 
 * @author      Tim Joosten <Topairy@gmail.com>
 * @copyright   2017 Tim Joosten
 */
class CrowdFundController extends Controller
{
    /**
     * Geef de basis informatie view weer voor onze crowdfund. 
     *
     * @return \illuminate\View\View
     */
    public function index(): View
    {
        return view('frontend.ondersteuning');
    }

    /**
     * Het creatie formulier voor een nieuwe gift. 
     *
     * @param  string $plan De naam van het plan waarin de gebruiker geintresseerd is. 
     * @return \Illuminate\View\View
     */
    public function create($plan): View
    {
        switch ($plan) { // Bepaal het bedrag en opslag in variable voor te laten passeren naar form.
            case 'brons':   $plan = '7.00';  break; 
            case 'zilver':  $plan = '12.00'; break;
            case 'goud':    $plan = '17.00'; break;
            case 'diamant': $plan = '22.00'; break;

            default: $plan = '7.00';
        }

        return view('frontend.ondersteuning.create', compact('plan'));
    }

    /**
     * @todo docblock 
     * @todo controller logic.
     */
    public function show(): View
    {
        //        
    }
}
