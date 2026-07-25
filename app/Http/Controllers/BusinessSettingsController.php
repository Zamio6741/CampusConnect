<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessSettingsController extends Controller
{
    public function index()
{
    dd(auth()->user());
}

    public function update(Request $request)
    {
        $business = auth()->user()->businesses()->firstOrFail();

        $validated = $request->validate([
            'business_name'=>'required|max:255',
            'category'=>'required|max:255',
            'description'=>'required',
            'phone'=>'required',
            'whatsapp'=>'nullable',
            'email'=>'nullable|email',
            'website'=>'nullable',
            'location'=>'required',
            'google_maps'=>'nullable',
            'facebook'=>'nullable',
            'instagram'=>'nullable',
            'tiktok'=>'nullable',
            'university_id'=>'required',
            'logo'=>'nullable|image|max:2048',
        ]);

        if($request->hasFile('logo')){

            if($business->logo){
                Storage::disk('public')->delete($business->logo);
            }

            $validated['logo']=$request
                ->file('logo')
                ->store('business-logos','public');
        }

        $business->update($validated);

        return back()->with(
            'success',
            'Business settings updated successfully.'
        );
    }
}