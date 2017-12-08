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

    public function create($amount)
    {
        $bedrag = (int) $amount;

        if ($bedrag === 7 || $bedrag === 12 || $bedrag === 17 || $bedrag === 22) {
            return view('frontend.ondersteuning.create', ['amount' => $mount]);
        }
        
        return redirect()->route('ondersteuning.index');
    }
}
