<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;

class RentalBrowseController extends Controller
{
    public function index()
    {
        $rentals = Accommodation::with([
            'photos',
            'university',
            'nearbyArea',
            'facilities'
        ])
        ->where('available', true)
        ->latest()
        ->paginate(12);

        return view('student.rentals.index', compact('rentals'));
    }

    public function show(Accommodation $accommodation)
    {
        $accommodation->load([
            'photos',
            'facilities',
            'university',
            'nearbyArea'
        ]);

        return view('student.rentals.show', compact('accommodation'));
    }
}