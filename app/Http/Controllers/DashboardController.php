<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Business;
use App\Models\Note;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $announcements = Announcement::latest()->take(5)->get();
        $businesses = Business::where('active', true)
    ->latest()
    ->take(6)
    ->get();

        $recentNotes = Note::with(['user', 'unit'])
            ->latest()
            ->take(6)
            ->get();

        $stats = [

            'notes' => Note::count(),

            'units' => Unit::count(),

            'announcements' => Announcement::count(),

            'myNotes' => Note::where('user_id', $user->id)->count(),

        ];

       return view('dashboard', [

    'user' => $user,

    'announcements' => $announcements,

    'businesses' => $businesses,

    'recentNotes' => $recentNotes,

    'stats' => $stats,

]);
    }
}