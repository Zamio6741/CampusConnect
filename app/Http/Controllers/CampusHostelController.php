<?php

namespace App\Http\Controllers;

use App\Models\CampusHostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampusHostelController extends Controller
{
    /**
     * Display hostels for the logged-in user's university.
     */
    public function index()
    {
        $hostels = CampusHostel::with('images')
            ->where('university_id', Auth::user()->university_id)
            ->latest()
            ->get();

        return view('campus_hostels.index', compact('hostels'));
    }

    /**
     * Show hostel details.
     */
    public function show(CampusHostel $campusHostel)
    {
        $campusHostel->load('images');

        return view('campus_hostels.show', compact('campusHostel'));
    }
}