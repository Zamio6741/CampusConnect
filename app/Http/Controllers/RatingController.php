<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Store or update a user's rating.
     */
    public function store(Request $request, Note $note)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'note_id' => $note->id,
            ],
            [
                'rating' => $request->rating,
            ]
        );

        return back()->with('success', '⭐ Rating submitted successfully!');
    }
}