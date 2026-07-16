<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\BookingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class BookingRequestController extends Controller
{
    public function create(Accommodation $accommodation)
    {
        return view('bookings.create', compact('accommodation'));
    }

    public function store(Request $request, Accommodation $accommodation)
    {   
        $request->validate([
            'visit_date' => 'required|date|after_or_equal:today',
            'phone'      => 'required',
            'message'    => 'nullable',
        ]);

       $booking = BookingRequest::create([
    'accommodation_id' => $accommodation->id,
    'student_id'       => Auth::id(),
    'visit_date'       => $request->visit_date,
    'phone'            => $request->phone,
    'message'          => $request->message,
    'status'           => 'Pending',
]);
     Notification::create([
    'user_id' => $accommodation->user_id,
    'title'   => 'New Booking Request',
    'message' => Auth::user()->name . ' requested to book "' . $accommodation->title . '".',
    'type'    => 'booking',
]);

        return redirect()
            ->route('browse.rental.show', $accommodation)
            ->with('success', 'Viewing request sent successfully.');
    }
}