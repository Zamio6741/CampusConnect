<?php

namespace App\Http\Controllers;

use App\Models\Business;

class BusinessDashboardController extends Controller
{
    public function index()
    {
        $business = Business::where('user_id', auth()->id())->first();

        if (!$business) {
            return redirect()->route('business.create');
        }

        return view('business.dashboard', compact('business'));
    }
}