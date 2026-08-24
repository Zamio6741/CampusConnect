<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Announcement;
use App\Models\Business;
use App\Models\CampusHostel;
use App\Models\LostItem;
use App\Models\MarketplaceItem;
use App\Models\Note;
use App\Models\PastPaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentSearchController extends Controller
{
    /**
     * Global CampusConnect search for students.
     */
    public function index(Request $request)
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:255'],
        ]);

        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | SEARCH TERM
        |--------------------------------------------------------------------------
        */

        $query = trim((string) $request->input('q', ''));

        /*
        |--------------------------------------------------------------------------
        | EMPTY COLLECTIONS
        |--------------------------------------------------------------------------
        */

        $notes = collect();
        $pastPapers = collect();
        $businesses = collect();
        $accommodations = collect();
        $campusHostels = collect();
        $marketplaceItems = collect();
        $lostItems = collect();
        $announcements = collect();

        /*
        |--------------------------------------------------------------------------
        | ONLY SEARCH WHEN QUERY EXISTS
        |--------------------------------------------------------------------------
        */

        if ($query !== '') {

            /*
            |--------------------------------------------------------------------------
            | SEARCH PATTERN
            |--------------------------------------------------------------------------
            |
            | PostgreSQL uses LIKE through Laravel's query builder.
            |
            */

            $search = '%' . $query . '%';


            /*
            |--------------------------------------------------------------------------
            | NOTES
            |--------------------------------------------------------------------------
            */

            $notes = Note::query()
                ->where('university_id', $user->university_id)
                ->where(function ($q) use ($search) {

                    $q->where('title', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('unit_code', 'LIKE', $search)
                        ->orWhere('unit_name', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | PAST PAPERS
            |--------------------------------------------------------------------------
            */

            $pastPapers = PastPaper::query()
                ->where('university_id', $user->university_id)
                ->where(function ($q) use ($search) {

                    $q->where('title', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('unit_code', 'LIKE', $search)
                        ->orWhere('unit_name', 'LIKE', $search)
                        ->orWhere('year', 'LIKE', $search)
                        ->orWhere('semester', 'LIKE', $search)
                        ->orWhere('type', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | ACCOMMODATION
            |--------------------------------------------------------------------------
            |
            | IMPORTANT:
            | Do NOT search "gender" here.
            |
            | Your actual Supabase accommodations table does not
            | contain a gender column.
            |
            */

            $accommodations = Accommodation::query()
                ->with([
                    'nearbyArea:id,name',
                ])
                ->where('university_id', $user->university_id)
                ->where(function ($q) use ($search) {

                    $q->where('title', 'LIKE', $search)
                        ->orWhere('property_type', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('location', 'LIKE', $search)
                        ->orWhere('listing_type', 'LIKE', $search)
                        ->orWhereHas('nearbyArea', function ($area) use ($search) {

                            $area->where('name', 'LIKE', $search);

                        });

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | CAMPUS HOSTELS
            |--------------------------------------------------------------------------
            */

            $campusHostels = CampusHostel::query()
                ->where('university_id', $user->university_id)
                ->where(function ($q) use ($search) {

                    $q->where('name', 'LIKE', $search)
                        ->orWhere('block', 'LIKE', $search)
                        ->orWhere('room_type', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('gender', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | BUSINESSES
            |--------------------------------------------------------------------------
            */

            $businesses = Business::query()
                ->where('university_id', $user->university_id)
                ->where(function ($q) use ($search) {

                    $q->where('business_name', 'LIKE', $search)
                        ->orWhere('category', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('location', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | MARKETPLACE
            |--------------------------------------------------------------------------
            |
            | MarketplaceItem does not have university_id.
            |
            */

            $marketplaceItems = MarketplaceItem::query()
                ->with([
                    'user:id,name',
                ])
                ->where(function ($q) use ($search) {

                    $q->where('title', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('category', 'LIKE', $search)
                        ->orWhere('condition', 'LIKE', $search)
                        ->orWhere('location', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | LOST & FOUND
            |--------------------------------------------------------------------------
            */

            $lostItems = LostItem::query()
                ->with([
                    'user:id,name',
                ])
                ->where(function ($q) use ($search) {

                    $q->where('title', 'LIKE', $search)
                        ->orWhere('description', 'LIKE', $search)
                        ->orWhere('type', 'LIKE', $search)
                        ->orWhere('location', 'LIKE', $search)
                        ->orWhere('status', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();


            /*
            |--------------------------------------------------------------------------
            | ANNOUNCEMENTS
            |--------------------------------------------------------------------------
            */

            $announcements = Announcement::query()
                ->where('university_id', $user->university_id)
                ->where(function ($q) use ($search) {

                    $q->where('title', 'LIKE', $search)
                        ->orWhere('content', 'LIKE', $search);

                })
                ->latest()
                ->limit(30)
                ->get();
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL RESULTS
        |--------------------------------------------------------------------------
        */

        $totalResults =
            $notes->count()
            + $pastPapers->count()
            + $businesses->count()
            + $accommodations->count()
            + $campusHostels->count()
            + $marketplaceItems->count()
            + $lostItems->count()
            + $announcements->count();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('student.search', [

            'query' => $query,

            'notes' => $notes,

            'pastPapers' => $pastPapers,

            'businesses' => $businesses,

            'accommodations' => $accommodations,

            'campusHostels' => $campusHostels,

            'marketplaceItems' => $marketplaceItems,

            'lostItems' => $lostItems,

            'announcements' => $announcements,

            'totalResults' => $totalResults,

        ]);
    }
}