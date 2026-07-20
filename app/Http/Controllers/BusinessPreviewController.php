<?php

namespace App\Http\Controllers;

use App\Models\Business;

class BusinessPreviewController extends Controller
{
    public function show(Business $business)
    {
        // Count page views
        $business->increment('views');

        // Load gallery
        $business->load('images');

        return view('business.preview', compact('business'));
    }
}