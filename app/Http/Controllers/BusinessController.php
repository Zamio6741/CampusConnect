<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\University;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Business Dashboard
    |--------------------------------------------------------------------------
    */

  public function dashboard()
{
    $businesses = Business::where('user_id', auth()->id())->get();

    $business = $businesses->first();

    return view('business.dashboard', compact('businesses', 'business'));
}

    /*
    |--------------------------------------------------------------------------
    | Show Registration Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $universities = University::orderBy('name')->get();

        return view('business.create', compact('universities'));
    }

    /*
    |--------------------------------------------------------------------------
    | Store Business
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'business_name' => 'required',

            'category' => 'required',

            'description' => 'required',

            'phone' => 'required',

            'location' => 'required',

        ]);

        Business::create([

            'user_id' => auth()->id(),

            'university_id' => $request->university_id,

            'business_name' => $request->business_name,

            'category' => $request->category,

            'description' => $request->description,

            'phone' => $request->phone,

            'whatsapp' => $request->whatsapp,

            'email' => $request->email,

            'location' => $request->location,

            'google_maps' => $request->google_maps,

            'facebook' => $request->facebook,

            'instagram' => $request->instagram,

            'tiktok' => $request->tiktok,

            'website' => $request->website,

            'status' => 'Pending',

        ]);

        return redirect()->route('business.dashboard')
            ->with('success','Business registered successfully.');
    }
}