<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\AccommodationImage;
use App\Models\Facility;
use App\Models\NearbyArea;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'universities' => University::all(),
            'areas' => NearbyArea::all(),
        ]);
    }

    public function storeStep1(Request $request)
    {
        $validated = $request->validate([
            'property_type'   => 'required|string',
            'university_id'   => 'required|exists:universities,id',
            'nearby_area_id'  => 'required|exists:nearby_areas,id',
            'description'     => 'nullable|string',
        ]);

        session([
            'rental.step1' => $validated
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
        if (!session()->has('rental.step1')) {
            return redirect()->route('rental.step1');
        }

        return view('accommodation.create-step2');
    }

    public function storeStep2(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:255',
        ]);

        session([
            'rental.step2' => $validated
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
        if (!session()->has('rental.step2')) {
            return redirect()->route('rental.step2');
        }

        return view('accommodation.create-step3');
    }
    public function storeStep3(Request $request)
    {
        $request->validate([
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $photos = [];

        if ($request->hasFile('photos')) {

            foreach ($request->file('photos') as $photo) {

                $photos[] = $photo->store(
                    'accommodations',
                    'public'
                );

            }

        }

        session([
            'rental.step3' => [
                'photos' => $photos,
            ]
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
        if (!session()->has('rental.step3')) {
            return redirect()->route('rental.step3');
        }

        return view('accommodation.create-step4');
    }

    public function storeStep4(Request $request)
    {
        $validated = $request->validate([

            'price' => 'required|numeric|min:0',

            'phone' => 'nullable|string|max:20',

            'whatsapp' => 'nullable|string|max:20',

            'facilities' => 'nullable|array',

            'facilities.*' => 'string|max:100',

        ]);

        session([
            'rental.step4' => $validated
        ]);

        return redirect()->route('rental.step5');
    }

    /*
    |--------------------------------------------------------------------------
    | STEP 5
    |--------------------------------------------------------------------------
    */

    public function step5()
    {
        if (!session()->has('rental.step4')) {
            return redirect()->route('rental.step4');
        }

        $step1 = session('rental.step1');
        $step2 = session('rental.step2');
        $step3 = session('rental.step3');
        $step4 = session('rental.step4');

        $university = University::find($step1['university_id']);

        $area = NearbyArea::find($step1['nearby_area_id']);

        return view(
            'accommodation.create-step5',
            compact(
                'step1',
                'step2',
                'step3',
                'step4',
                'university',
                'area'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PUBLISH
    |--------------------------------------------------------------------------
    */
        public function publish()
    {
        if (
            !session()->has('rental.step1') ||
            !session()->has('rental.step2') ||
            !session()->has('rental.step3') ||
            !session()->has('rental.step4')
        ) {
            return redirect()
                ->route('rental.step1')
                ->with('error', 'Your rental session expired. Please start again.');
        }

        $step1 = session('rental.step1');
        $step2 = session('rental.step2');
        $step3 = session('rental.step3');
        $step4 = session('rental.step4');

        DB::beginTransaction();

        try {

            $accommodation = Accommodation::create([

                'user_id' => Auth::id(),

                'listing_type' => 'rental',

                'property_type' => $step1['property_type'],

                'title' => ucwords(str_replace('_', ' ', $step1['property_type'])),

                'description' => $step1['description'] ?? null,

                'university_id' => $step1['university_id'],

                'nearby_area_id' => $step1['nearby_area_id'],

                'location' => $step2['location'],

                'price' => $step4['price'],

                'phone' => $step4['phone'] ?? null,

                'whatsapp' => $step4['whatsapp'] ?? null,

                'available_spaces' => 1,

                'verified' => false,

                'featured' => false,

            ]);

            /*
            |--------------------------------------------------------------------------
            | Save Images
            |--------------------------------------------------------------------------
            */

            if (!empty($step3['photos'])) {

                foreach ($step3['photos'] as $photo) {

                  AccommodationImage::create([
    'accommodation_id' => $accommodation->id,
    'image_path' => $photo,
]);

                }

            }

            /*
            |--------------------------------------------------------------------------
            | Save Facilities
            |--------------------------------------------------------------------------
            */

            if (!empty($step4['facilities'])) {

                foreach ($step4['facilities'] as $facility) {

                    Facility::create([

                        'accommodation_id' => $accommodation->id,

                        'name' => $facility,

                    ]);

                }

            }

            DB::commit();

            session()->forget('rental');

            return redirect()
                ->route('landlord.dashboard')
                ->with('success', '🎉 Rental published successfully!');
        }

        catch (\Exception $e) {

    DB::rollBack();

    dd($e->getMessage());

}
    }

}