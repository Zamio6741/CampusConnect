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

        $completedBookings = $bookings
            ->where('status', 'Completed')
            ->count();

        return view('landlord.bookings.index', compact(
            'bookings',
            'totalBookings',
            'pendingBookings',
            'approvedBookings',
            'completedBookings'
        ));
    }

    public function update(Request $request, BookingRequest $booking)
    {
        $request->validate([
            'status' => 'required|in:Pending,Approved,Rejected,Completed',
        ]);

        $booking->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Booking updated successfully.');
    }
}