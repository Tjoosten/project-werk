<?php

namespace ActivismeBe\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use ActivismeBe\Http\Controllers\Controller;
use Illuminate\View\View;

class CrowdFundController extends Controller
{
    public function index(): View
    {
        return view('frontend.ondersteuning');
    }
}