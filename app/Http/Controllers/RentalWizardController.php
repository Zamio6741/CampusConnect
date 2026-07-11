<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Accommodation;

class RentalWizardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | STEP 1
    |--------------------------------------------------------------------------
    */

    public function step1()
    {
        return view('accommodation.create-step1', [
            'universities' => \App\Models\University::all(),
            'areas' => \App\Models\NearbyArea::all(),
        ]);
    }

    public function storeStep1(Request $request)
    {
        $request->validate([
            'property_type' => 'required',
            'university_id' => 'required',
            'nearby_area_id' => 'required',
            'description' => 'nullable',
        ]);

        session([
            'rental.step1' => [
                'property_type' => $request->property_type,
                'university_id' => $request->university_id,
                'nearby_area_id' => $request->nearby_area_id,
                'description' => $request->description,
            ]
        ]);

        return redirect()->route('rental.step2');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 2
    |--------------------------------------------------------------------------
    */

    public function step2()
    {
        return view('accommodation.create-step2');
    }

    public function storeStep2(Request $request)
    {
        session([
            'rental.step2' => $request->all()
        ]);

        return redirect()->route('rental.step3');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 3
    |--------------------------------------------------------------------------
    */

    public function step3()
    {
        return view('accommodation.create-step3');
    }

    public function storeStep3(Request $request)
    {
        session([
            'rental.step3' => $request->all()
        ]);

        return redirect()->route('rental.step4');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 4
    |--------------------------------------------------------------------------
    */

    public function step4()
    {
        return view('accommodation.create-step4');
    }

    public function storeStep4(Request $request)
    {
        session([
            'rental.step4' => $request->all()
        ]);

        return redirect()->route('rental.step5');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 5 (Preview)
    |--------------------------------------------------------------------------
    */

    public function step5()
    {
        $step1 = session('rental.step1');
        $step2 = session('rental.step2');
        $step3 = session('rental.step3');
        $step4 = session('rental.step4');

        $university = null;
        $area = null;

        if (!empty($step1['university_id'])) {
            $university = \App\Models\University::find($step1['university_id']);
        }

        if (!empty($step1['nearby_area_id'])) {
            $area = \App\Models\NearbyArea::find($step1['nearby_area_id']);
        }

        return view('accommodation.create-step5', compact(
            'step1',
            'step2',
            'step3',
            'step4',
            'university',
            'area'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | PUBLISH RENTAL
    |--------------------------------------------------------------------------
    */

    public function publish()
    {
        $step1 = session('rental.step1');
        $step2 = session('rental.step2');
        $step3 = session('rental.step3');
        $step4 = session('rental.step4');

        Accommodation::create([

            'user_id' => Auth::id(),

            'listing_type' => 'rental',

            'property_type' => strtolower($step1['property_type']),

            'title' => ucfirst($step1['property_type']),

            'description' => $step1['description'] ?? null,

            'university_id' => $step1['university_id'],

            'location' => $step2['location'] ?? '',

            'latitude' => $step2['latitude'] ?? null,

            'longitude' => $step2['longitude'] ?? null,

            'price' => $step3['price'] ?? 0,

            'phone' => $step3['phone'] ?? null,

            'whatsapp' => $step3['whatsapp'] ?? null,

            'available_spaces' => 1,

            'verified' => false,

            'featured' => false,
        ]);

        session()->forget('rental');

        return redirect()
            ->route('landlord.dashboard')
            ->with('success', '🎉 Rental published successfully!');
    }
}