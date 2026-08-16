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
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | User Growth — All 12 Months
        |--------------------------------------------------------------------------
        |
        | Builds real cumulative user-registration data from the database.
        | January through December are always displayed.
        | Future months are left empty.
        |
        */

        $year = now()->year;

        $userGrowthLabels = [];
        $userGrowthData = [];

        // Users registered before the current year.
        $usersBeforeYear = User::where(
            'created_at',
            '<',
            Carbon::create($year, 1, 1)
        )->count();

        // Users registered during the current year.
        $usersThisYear = User::where(
            'created_at',
            '>=',
            Carbon::create($year, 1, 1)
        )
            ->where(
                'created_at',
                '<',
                Carbon::create($year + 1, 1, 1)
            )
            ->get(['created_at']);

        $runningTotal = $usersBeforeYear;

        /*
        |--------------------------------------------------------------------------
        | Build January → December data
        |--------------------------------------------------------------------------
        */

        for ($monthNumber = 1; $monthNumber <= 12; $monthNumber++) {

            $month = Carbon::create($year, $monthNumber, 1);

            $userGrowthLabels[] = $month->format('M');

            // Future months have no data yet.
            if ($month->isFuture()) {
                $userGrowthData[] = null;
                continue;
            }

            $monthUsers = $usersThisYear
                ->filter(function ($user) use ($month) {
                    return Carbon::parse($user->created_at)->month === $month->month;
                })
                ->count();

            $runningTotal += $monthUsers;

            $userGrowthData[] = $runningTotal;
        }

        /*
        |--------------------------------------------------------------------------
        | Main Statistics
        |--------------------------------------------------------------------------
        */

        $users = User::count();

        $students = User::where('role_id', 2)->count();

        $landlords = User::where('role_id', 3)->count();

        $businessOwners = User::where('role_id', 4)->count();

        $businesses = Business::count();

        $accommodations = Accommodation::count();

        $notes = Note::count();

        $pastpapers = PastPaper::count();

        $announcements = Announcement::count();

        $universities = University::count();

        /*
        |--------------------------------------------------------------------------
        | Return Dashboard
        |--------------------------------------------------------------------------
        */

        return view('admin.dashboard', [

            /*
            |--------------------------------------------------------------------------
            | Statistics
            |--------------------------------------------------------------------------
            */

            'users' => $users,

            'students' => $students,

            'landlords' => $landlords,

            'businessOwners' => $businessOwners,

            'businesses' => $businesses,

            'accommodations' => $accommodations,

            'notes' => $notes,

            'pastpapers' => $pastpapers,

            'announcements' => $announcements,

            'universities' => $universities,

            /*
            |--------------------------------------------------------------------------
            | User Growth Chart
            |--------------------------------------------------------------------------
            */

            'userGrowthLabels' => $userGrowthLabels,

            'userGrowthData' => $userGrowthData,

            /*
            |--------------------------------------------------------------------------
            | Recent Activity
            |--------------------------------------------------------------------------
            */

            'recentUsers' => User::latest()
                ->take(5)
                ->get(),

            'recentBusinesses' => Business::latest()
                ->take(5)
                ->get(),

            'recentNotes' => Note::latest()
                ->take(5)
                ->get(),

            /*
            |--------------------------------------------------------------------------
            | Top Universities
            |--------------------------------------------------------------------------
            */

            'topUniversities' => University::withCount('users')
                ->orderByDesc('users_count')
                ->take(5)
                ->get(),

            /*
            |--------------------------------------------------------------------------
            | Pending Items
            |--------------------------------------------------------------------------
            */

            'pendingBusinesses' => Business::where(
                'status',
                'pending'
            )->count(),

            'pendingNotes' => Note::where(
                'status',
                'pending'
            )->count(),

            'pendingAccommodations' => Accommodation::where(
                'status',
                'pending'
            )->count(),

            /*
            |--------------------------------------------------------------------------
            | Reports
            |--------------------------------------------------------------------------
            */

            'pendingReports' => 0,
        ]);
    }
}