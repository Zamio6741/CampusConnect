<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\AccommodationImage;
use App\Models\NearbyArea;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RentalController extends Controller
{
    /**
     * List landlord rentals
     */
    public function index()
    {
        $rentals = Accommodation::with([
            'photos',
            'university',
            'nearbyArea',
            'facilities',
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->paginate(10);

        return view('landlord.rentals.index', compact('rentals'));
    }

    /**
     * View one rental
     */
    public function show(Accommodation $accommodation)
    {
        abort_if($accommodation->user_id != Auth::id(), 403);

        $accommodation->load([
            'photos',
            'facilities',
            'university',
            'nearbyArea',
        ]);

        return view('landlord.rentals.show', compact('accommodation'));
    }

    /**
     * Edit page
     */
    public function edit(Accommodation $accommodation)
    {
        abort_if($accommodation->user_id != Auth::id(), 403);

        $accommodation->load([
            'photos',
            'facilities',
        ]);

        return view('landlord.rentals.edit', [
            'accommodation' => $accommodation,
            'universities' => University::all(),
            'areas' => NearbyArea::all(),
        ]);
    }

    /**
     * Update rental
     */
    public function update(Request $request, Accommodation $accommodation)
    {
        abort_if($accommodation->user_id != Auth::id(), 403);

        $validated = $request->validate([
            'property_type' => 'required|string',
            'university_id' => 'required|exists:universities,id',
            'nearby_area_id' => 'required|exists:nearby_areas,id',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'phone' => 'nullable|string|max:20',
            'whatsapp' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'photos.*' => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $accommodation->update([
            'property_type' => $validated['property_type'],
            'title' => ucwords(str_replace('_', ' ', $validated['property_type'])),
            'university_id' => $validated['university_id'],
            'nearby_area_id' => $validated['nearby_area_id'],
            'location' => $validated['location'],
            'price' => $validated['price'],
            'phone' => $validated['phone'] ?? null,
            'whatsapp' => $validated['whatsapp'] ?? null,
            'description' => $validated['description'] ?? null,
        ]);

        // Replace facilities
        $accommodation->facilities()->delete();

        if (!empty($validated['facilities'])) {

            foreach (explode(',', $validated['facilities']) as $facility) {

                $facility = trim($facility);

                if ($facility != '') {

                    $accommodation->facilities()->create([
                        'name' => $facility,
                    ]);

                }
            }
        }

        // Upload new photos
        if ($request->hasFile('photos')) {

            foreach ($request->file('photos') as $photo) {

                $path = $photo->store('accommodations', 'public');

                $accommodation->photos()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect()
            ->route('rentals.show', $accommodation)
            ->with('success', 'Rental updated successfully.');
    }

    /**
     * Delete rental
     */
    public function destroy(Accommodation $accommodation)
    {
        abort_if($accommodation->user_id != Auth::id(), 403);

        foreach ($accommodation->photos as $photo) {

            if (
                $photo->image_path &&
                Storage::disk('public')->exists($photo->image_path)
            ) {
                Storage::disk('public')->delete($photo->image_path);
            }

            $photo->delete();
        }

        $accommodation->delete();

        return redirect()
            ->route('rentals.index')
            ->with('success', 'Rental deleted successfully.');
    }

    /**
     * Delete one photo
     */
    public function deletePhoto(AccommodationImage $photo)
    {
        abort_if($photo->accommodation->user_id != Auth::id(), 403);

        if (
            $photo->image_path &&
            Storage::disk('public')->exists($photo->image_path)
        ) {
            Storage::disk('public')->delete($photo->image_path);
        }

        $photo->delete();

        return back()->with('success', 'Photo deleted successfully.');
    }

    /**
     * Upload extra photos
     */
    public function uploadPhotos(Request $request, Accommodation $accommodation)
    {
        abort_if($accommodation->user_id != Auth::id(), 403);

        $request->validate([
            'photos.*' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        if ($request->hasFile('photos')) {

            foreach ($request->file('photos') as $photo) {

                $path = $photo->store('accommodations', 'public');

                $accommodation->photos()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return back()->with('success', 'Photos uploaded successfully.');
    }
}