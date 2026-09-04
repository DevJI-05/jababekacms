<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CarbonTrackerController extends Controller
{
    public function index(): View
    {
        return view('pages.carbon-tracker');
    }
}
