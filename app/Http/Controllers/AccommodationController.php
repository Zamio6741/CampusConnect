<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\AccommodationImage;
use App\Models\Facility;
use App\Models\NearbyArea;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccommodationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Campus Hostels
    |--------------------------------------------------------------------------
    */

    public function campus()
    {
        $hostels = Accommodation::where('listing_type', 'campus')
            ->latest()
            ->paginate(12);

        return view('accommodation.campus', compact('hostels'));
    }

    public function createCampus()
    {
        $universities = University::orderBy('name')->get();

        $locations = NearbyArea::orderBy('name')->get();

        return view(
            'accommodation.create-campus',
            compact('universities', 'locations')
        );
    }

    public function storeCampus(Request $request)
    {
        if (!Auth::user()->hasActiveAccommodationPass()) {

    return redirect()
        ->route('pass.index')
        ->with('error', 'You need an active Accommodation Pass before posting.');
}
        $validated = $request->validate([

            'title' => 'required|max:255',

            'description' => 'required',

            'available_spaces' => 'required|integer',

            'price' => 'required|numeric',

            'location' => 'required',

            'phone' => 'required',

            'whatsapp' => 'nullable',

            'images.*' => 'image|mimes:jpg,jpeg,png|max:4096',

        ]);

        $accommodation = Accommodation::create([

            'user_id' => Auth::id(),

            'university_id' => Auth::user()->university_id,

            'listing_type' => 'campus',

            'property_type' => 'hostel',

            'title' => $validated['title'],

            'description' => $validated['description'],

            'available_spaces' => $validated['available_spaces'],

            'price' => $validated['price'],

            'phone' => $validated['phone'],

            'whatsapp' => $validated['whatsapp'] ?? null,

            'location' => $validated['location'],

            'verified' => false,

            'featured' => false,

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('accommodations', 'public');

                AccommodationImage::create([

                    'accommodation_id' => $accommodation->id,

                    'image_path' => $path,

                ]);
            }
        }

        return redirect()
            ->route('accommodation.show', $accommodation)
            ->with('success', 'Campus hostel posted successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Off Campus Rentals
    |--------------------------------------------------------------------------
    */

    public function rentals()
    {
        $rentals = Accommodation::where('listing_type', 'rental')
            ->latest()
            ->paginate(12);

        return view('accommodation.rentals', compact('rentals'));
    }

    public function createRental()
    {
        $universities = University::orderBy('name')->get();

        $locations = NearbyArea::orderBy('name')->get();

        return view(
            'accommodation.create-rental',
            compact('universities', 'locations')
        );
    }

   public function storeRental(Request $request)
{
    if (!Auth::user()->hasActiveAccommodationPass()) {

        return redirect()
            ->route('pass.index')
            ->with('error', 'You need an active Accommodation Pass before posting.');
    }

    $validated = $request->validate([

            'property_type' => 'required',

            'title' => 'required|max:255',

            'description' => 'required',

            'available_spaces' => 'required|integer',

            'price' => 'required|numeric',

            'location' => 'required',

            'phone' => 'required',

            'whatsapp' => 'nullable',

            'images.*' => 'image|mimes:jpg,jpeg,png|max:4096',

        ]);

        $accommodation = Accommodation::create([

            'user_id' => Auth::id(),

            'university_id' => Auth::user()->university_id,

            'listing_type' => 'rental',

            'property_type' => $validated['property_type'],

            'title' => $validated['title'],

            'description' => $validated['description'],

            'available_spaces' => $validated['available_spaces'],

            'price' => $validated['price'],

            'phone' => $validated['phone'],

            'whatsapp' => $validated['whatsapp'] ?? null,

            'location' => $validated['location'],

            'verified' => false,

            'featured' => false,

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('accommodations', 'public');

                AccommodationImage::create([

                    'accommodation_id' => $accommodation->id,

                    'image_path' => $path,

                ]);
            }
        }

        if ($request->has('facilities')) {

            foreach ($request->facilities as $facility) {

                Facility::create([

                    'accommodation_id' => $accommodation->id,

                    'name' => $facility,

                ]);
            }
        }

        return redirect()
            ->route('accommodation.show', $accommodation)
            ->with('success', 'Rental posted successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | Show Accommodation
    |--------------------------------------------------------------------------
    */

    public function show(Accommodation $accommodation)
{
    $accommodation->load([
        'images',
        'facilities',
        'reviews.user',
        'owner',
        'university'
    ]);

    $hasPass = auth()->check()
        ? auth()->user()->hasActiveAccommodationPass()
        : false;

    return view('accommodation.show', [
        'accommodation' => $accommodation,
        'hasPass' => $hasPass,
    ]);
}
}