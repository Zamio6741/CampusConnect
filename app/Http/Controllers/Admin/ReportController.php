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
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | MAIN STATISTICS
        |--------------------------------------------------------------------------
        | Get the major platform statistics in one database query.
        */

        $stats = DB::selectOne("
            SELECT
                (SELECT COUNT(*) FROM users) AS total_users,

                (SELECT COUNT(*) FROM users WHERE role_id = 2) AS students,

                (SELECT COUNT(*) FROM users WHERE role_id = 3) AS landlords,

                (SELECT COUNT(*) FROM users WHERE role_id = 4) AS business_owners,

                (SELECT COUNT(*) FROM businesses) AS businesses,

                (SELECT COUNT(*) FROM accommodations) AS accommodations,

                (SELECT COUNT(*) FROM notes) AS notes,

                (SELECT COUNT(*) FROM past_papers) AS pastpapers,

                (SELECT COUNT(*) FROM announcements) AS announcements,

                (SELECT COUNT(*) FROM universities) AS universities
        ");

        $totalUsers = (int) $stats->total_users;
        $students = (int) $stats->students;
        $landlords = (int) $stats->landlords;
        $businessOwners = (int) $stats->business_owners;

        $businesses = (int) $stats->businesses;
        $accommodations = (int) $stats->accommodations;
        $notes = (int) $stats->notes;
        $pastpapers = (int) $stats->pastpapers;
        $announcements = (int) $stats->announcements;
        $universities = (int) $stats->universities;


        /*
        |--------------------------------------------------------------------------
        | PENDING CONTENT
        |--------------------------------------------------------------------------
        */

        $pending = DB::selectOne("
            SELECT
                (SELECT COUNT(*) FROM businesses WHERE status = 'pending')
                    AS pending_businesses,

                (SELECT COUNT(*) FROM notes WHERE status = 'pending')
                    AS pending_notes,

                (SELECT COUNT(*) FROM accommodations WHERE status = 'pending')
                    AS pending_accommodations
        ");

        $pendingBusinesses = (int) $pending->pending_businesses;
        $pendingNotes = (int) $pending->pending_notes;
        $pendingAccommodations = (int) $pending->pending_accommodations;


        /*
        |--------------------------------------------------------------------------
        | UNIVERSITY STATISTICS
        |--------------------------------------------------------------------------
        */

       $universityStats = University::query()
    ->select('universities.id', 'universities.name')
            ->selectSub(
                User::selectRaw('COUNT(*)')
                    ->whereColumn(
                        'users.university_id',
                        'universities.id'
                    ),
                'users_count'
            )
            ->selectSub(
                Business::selectRaw('COUNT(*)')
                    ->whereColumn(
                        'businesses.university_id',
                        'universities.id'
                    ),
                'businesses_count'
            )
            ->selectSub(
                Note::selectRaw('COUNT(*)')
                    ->whereColumn(
                        'notes.university_id',
                        'universities.id'
                    ),
                'notes_count'
            )
            ->selectSub(
                Accommodation::selectRaw('COUNT(*)')
                    ->whereColumn(
                        'accommodations.university_id',
                        'universities.id'
                    ),
                'accommodations_count'
            )
            ->selectSub(
                Announcement::selectRaw('COUNT(*)')
                    ->whereColumn(
                        'announcements.university_id',
                        'universities.id'
                    ),
                'announcements_count'
            )
            ->orderByDesc('users_count')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RECENT USERS
        |--------------------------------------------------------------------------
        */

        $recentUsers = User::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RECENT ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        $recentAnnouncements = Announcement::with([
                'user',
                'university'
            ])
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | REPORT
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.reports.index',
            compact(

                'totalUsers',
                'students',
                'landlords',
                'businessOwners',

                'businesses',
                'accommodations',
                'notes',
                'pastpapers',
                'announcements',
                'universities',

                'pendingBusinesses',
                'pendingNotes',
                'pendingAccommodations',

                'universityStats',

                'recentUsers',
                'recentAnnouncements'

            )
        );
    }
}