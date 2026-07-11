<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Accommodation;

class LandlordDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $rentals = Accommodation::where('user_id', $user->id)
    ->latest()
    ->take(5)
    ->get();

        $stats = [

            'rentals' => Accommodation::where('user_id',$user->id)->count(),

            'bookings' => 0,

            'earnings' => 0,

            'views' => 0,

        ];

        return view('landlord.dashboard', compact(
    'user',
    'rentals',
    'stats'
));
    }
}