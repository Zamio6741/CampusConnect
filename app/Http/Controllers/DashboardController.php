<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Announcement;
use App\Models\Business;
use App\Models\Note;
use App\Models\Notification;
use App\Models\PastPaper;
use App\Models\Unit;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | University Filter
        |--------------------------------------------------------------------------
        */

        $universityId = $user->university_id;

        /*
        |--------------------------------------------------------------------------
        | Dashboard Content
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        $businesses = Business::where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        $trendingNotes = Note::with(['user', 'unit'])
            ->where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        $pastPapers = PastPaper::with(['user', 'unit'])
            ->where('university_id', $universityId)
            ->latest()
            ->take(3)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $stats = [

            'notes' => Note::where('university_id', $universityId)->count(),

            'pastpapers' => PastPaper::where('university_id', $universityId)->count(),

            'businesses' => Business::where('university_id', $universityId)->count(),

            'accommodations' => Accommodation::where('university_id', $universityId)->count(),

            'announcements' => Announcement::where('university_id', $universityId)->count(),

            'units' => Unit::count(),

            'myNotes' => Note::where('user_id', $user->id)->count(),

        ];

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        $notifications = Notification::where('user_id', $user->id)
            ->latest()
            ->get();

        $notificationCount = $notifications
            ->where('is_read', false)
            ->count();

        return view('student.dashboard', [

            'user' => $user,

            'announcements' => $announcements,

            'businesses' => $businesses,

            'trendingNotes' => $trendingNotes,

            'pastPapers' => $pastPapers,

            'stats' => $stats,

            'notifications' => $notifications,

            'notificationCount' => $notificationCount,

        ]);
    }
}