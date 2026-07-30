<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Business;
use App\Models\Accommodation;
use App\Models\Note;
use App\Models\PastPaper;
use App\Models\Announcement;
use App\Models\University;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [

            'users' => User::count(),

            'students' => User::where('role_id',2)->count(),

            'landlords' => User::where('role_id',3)->count(),

            'businesses' => Business::count(),

            'accommodations' => Accommodation::count(),

            'notes' => Note::count(),

            'pastpapers' => PastPaper::count(),

            'announcements' => Announcement::count(),

            'universities' => University::count(),

            'recentUsers' => User::latest()->take(5)->get(),

            'recentBusinesses' => Business::latest()->take(5)->get(),

            'recentNotes' => Note::latest()->take(5)->get(),

            'topUniversities' => University::withCount('users')
                    ->orderByDesc('users_count')
                    ->take(5)
                    ->get(),
            
            'pendingBusinesses' => Business::where('status', 'pending')->count(),

            'pendingNotes' => Note::where('status', 'pending')->count(),

            'pendingAccommodations' => Accommodation::where('status', 'pending')->count(),

            'pendingReports' => 0,  
            
        ]);
    }
}