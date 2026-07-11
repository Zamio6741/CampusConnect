<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Booking
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, Accommodation $accommodation)
    {
        $request->validate([
            'move_in_date' => ['required', 'date'],
            'message' => ['nullable', 'string', 'max:1000'],
        ]);

        Booking::create([
            'student_id' => Auth::id(),
            'accommodation_id' => $accommodation->id,
            'move_in_date' => $request->move_in_date,
            'message' => $request->message,
            'status' => 'Pending',
        ]);

        return redirect()
            ->back()
            ->with('success', 'Booking request sent successfully.');
    }
}