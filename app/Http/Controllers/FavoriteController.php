<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Toggle favorite.
     */
    public function toggle(Note $note)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('note_id', $note->id)
            ->first();

        if ($favorite) {

            $favorite->delete();

            return back()->with(
                'success',
                '💔 Removed from favourites.'
            );
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'note_id' => $note->id,
        ]);

        return back()->with(
            'success',
            '❤️ Added to favourites!'
        );
    }

    /**
     * View favourite notes.
     */
    public function index()
    {
        $notes = Auth::user()
            ->favoriteNotes()
            ->with([
                'user',
                'unit',
                'ratings',
            ])
            ->latest()
            ->get();

        return view(
            'favorites.index',
            compact('notes')
        );
    }
}