<?php

namespace ActivismeBe\Http\Controllers;

use Illuminate\Http\Request;

class DisclaimerController extends Controller
{
    public function index()
    {
        return view('frontend.disclaimer');
    }
}
