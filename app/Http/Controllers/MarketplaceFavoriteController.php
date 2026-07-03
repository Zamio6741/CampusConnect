<?php

namespace App\Http\Controllers;

use App\Models\MarketplaceItem;
use Illuminate\Support\Facades\Auth;

class MarketplaceFavoriteController extends Controller
{
    public function toggle(MarketplaceItem $marketplace)
    {
        $favorite = $marketplace->favorites()
            ->where('user_id', Auth::id())
            ->first();

        if ($favorite) {

            $favorite->delete();

            return back()->with('success', 'Item removed from favourites.');

        }

        $marketplace->favorites()->create([
            'user_id' => Auth::id(),
        ]);

        return back()->with('success', 'Item saved successfully.');
    }
}