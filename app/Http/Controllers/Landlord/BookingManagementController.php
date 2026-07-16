<?php

namespace App\Http\Controllers\Landlord;

use App\Http\Controllers\Controller;
use App\Models\BookingRequest;
use Illuminate\Http\Request;

class BookingManagementController extends Controller
{
    public function index()
    {
        $bookings = BookingRequest::with([
                'student',
                'accommodation.photos',
            ])
            ->whereHas('accommodation', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->latest()
            ->get();

        $totalBookings = $bookings->count();

        $pendingBookings = $bookings
            ->where('status', 'Pending')
            ->count();

        $approvedBookings = $bookings
            ->where('status', 'Approved')
            ->count();

        $movedInBookings = $bookings
            ->where('status', 'Moved In')
            ->count();

        return view('landlord.bookings.index', compact(
            'bookings',
            'totalBookings',
            'pendingBookings',
            'approvedBookings',
            'movedInBookings'
        ));
    }

    public function update(Request $request, BookingRequest $booking)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected,Moved In',
        ]);

        // Save previous status
        $oldStatus = $booking->status;

        // Update booking status
        $booking->update([
            'status' => $request->status,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Add revenue ONLY once when tenant moves in
        |--------------------------------------------------------------------------
        */

        if ($oldStatus !== 'Moved In' && $request->status === 'Moved In') {

    $accommodation = $booking->accommodation;

    // Add revenue
    $accommodation->increment(
        'total_revenue',
        $accommodation->price
    );

    // Reduce available spaces
    if ($accommodation->available_spaces > 0) {
        $accommodation->decrement('available_spaces');
    }
}

        return back()->with(
            'success',
            'Booking updated successfully.'
        );
    }
}