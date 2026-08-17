<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Business;
use App\Models\Accommodation;
use App\Models\Note;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{
    /**
     * Search CampusConnect from the Admin panel.
     */
    public function index(Request $request)
    {
        $query = trim($request->input('q', ''));

        /*
        |--------------------------------------------------------------------------
        | Empty Search
        |--------------------------------------------------------------------------
        */

        if ($query === '') {
            return view('admin.search', [
                'query' => '',
                'users' => collect(),
                'businesses' => collect(),
                'accommodations' => collect(),
                'notes' => collect(),
                'announcements' => collect(),
                'totalResults' => 0,
            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Users
        |--------------------------------------------------------------------------
        */

        $users = User::query()
            ->where(function ($q) use ($query) {

                $q->where('name', 'ILIKE', "%{$query}%")
                    ->orWhere('email', 'ILIKE', "%{$query}%");

            })
            ->latest()
            ->take(20)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Businesses
        |--------------------------------------------------------------------------
        */

        $businesses = Business::query()
            ->where(function ($q) use ($query) {

                $q->where('business_name', 'ILIKE', "%{$query}%")
                    ->orWhere('category', 'ILIKE', "%{$query}%")
                    ->orWhere('description', 'ILIKE', "%{$query}%")
                    ->orWhere('location', 'ILIKE', "%{$query}%")
                    ->orWhere('email', 'ILIKE', "%{$query}%");

            })
            ->latest()
            ->take(20)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Accommodations
        |--------------------------------------------------------------------------
        */

        $accommodations = Accommodation::query()
            ->where(function ($q) use ($query) {

                $q->where('title', 'ILIKE', "%{$query}%")
                    ->orWhere('description', 'ILIKE', "%{$query}%")
                    ->orWhere('location', 'ILIKE', "%{$query}%")
                    ->orWhere('whatsapp', 'ILIKE', "%{$query}%")
                    ->orWhere('property_type', 'ILIKE', "%{$query}%")
                    ->orWhere('listing_type', 'ILIKE', "%{$query}%");

            })
            ->latest()
            ->take(20)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Notes
        |--------------------------------------------------------------------------
        */

        $notes = Note::query()
            ->where(function ($q) use ($query) {

                $q->where('title', 'ILIKE', "%{$query}%")
                    ->orWhere('description', 'ILIKE', "%{$query}%");

            })
            ->latest()
            ->take(20)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Announcements
        |--------------------------------------------------------------------------
        */

        $announcements = Announcement::query()
            ->where(function ($q) use ($query) {

                $q->where('title', 'ILIKE', "%{$query}%")
                    ->orWhere('content', 'ILIKE', "%{$query}%");

            })
            ->latest()
            ->take(20)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Total Results
        |--------------------------------------------------------------------------
        */

        $totalResults =
            $users->count() +
            $businesses->count() +
            $accommodations->count() +
            $notes->count() +
            $announcements->count();


        /*
        |--------------------------------------------------------------------------
        | Return Search Results
        |--------------------------------------------------------------------------
        */

        return view('admin.search', compact(
            'query',
            'users',
            'businesses',
            'accommodations',
            'notes',
            'announcements',
            'totalResults'
        ));
    }
}