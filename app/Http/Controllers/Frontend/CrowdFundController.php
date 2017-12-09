<?php

namespace ActivismeBe\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

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

    public function create(): View
    {
        $plan = 0;
        return view('frontend.ondersteuning.create', compact('plan'));
    }
}
