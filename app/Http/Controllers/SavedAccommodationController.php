<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\SavedAccommodation;
use Illuminate\Support\Facades\Auth;

class SavedAccommodationController extends Controller
{
    /**
     * Save / Unsave Accommodation
     */
    public function toggle(Accommodation $accommodation)
    {
        $saved = SavedAccommodation::where('user_id', Auth::id())
            ->where('accommodation_id', $accommodation->id)
            ->first();

        if ($saved) {

            $saved->delete();

            return back()->with(
                'success',
                '💔 Accommodation removed from saved list.'
            );

        }

        SavedAccommodation::create([

            'user_id' => Auth::id(),

            'accommodation_id' => $accommodation->id,

        ]);

        return back()->with(
            'success',
            '❤️ Accommodation saved successfully.'
        );
    }

    /**
     * Saved Accommodation Page
     */
    public function index()
    {
        $saved = SavedAccommodation::where('user_id', Auth::id())
            ->with('accommodation.images')
            ->latest()
            ->get();

        return view(
            'accommodation.saved',
            compact('saved')
        );
    }
}