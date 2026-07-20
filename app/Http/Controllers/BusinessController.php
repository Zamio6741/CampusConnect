<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function edit(Business $business)
{
    abort_if($business->user_id != auth()->id(), 403);

    $universities = University::all();

    return view('business.edit', compact('business', 'universities'));
}

  public function update(Request $request, Business $business)
{
    abort_if($business->user_id != auth()->id(), 403);

    $validated = $request->validate([
        'business_name' => 'required|max:255',
        'category' => 'required|max:255',
        'description' => 'required',
        'phone' => 'required',
        'whatsapp' => 'nullable',
        'email' => 'nullable|email',
        'location' => 'required',
        'website' => 'nullable',
        'facebook' => 'nullable',
        'instagram' => 'nullable',
        'tiktok' => 'nullable',
        'google_maps' => 'nullable',
        'university_id' => 'required',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

   if ($request->hasFile('logo')) {

    if ($business->logo) {
        Storage::disk('public')->delete($business->logo);
    }

    $validated['logo'] = $request
        ->file('logo')
        ->store('business-logos', 'public');
}

$business->update($validated);

    return redirect()
        ->route('business.dashboard')
        ->with('success', 'Business updated successfully.');
}

public function show(Business $business)
{
    $business->load([
        'images',
        'products',
        'university',
    ]);

    $business->increment('views');

   return view('business.preview', compact('business'));
}

}