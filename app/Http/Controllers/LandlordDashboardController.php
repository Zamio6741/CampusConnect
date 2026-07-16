<?php

namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\BookingRequest;

class LandlordDashboardController extends Controller
{
    public function index()
    {
        $landlord = auth()->user();

        $rentals = Accommodation::with(['photos', 'university'])
            ->where('user_id', $landlord->id)
            ->latest()
            ->get();

        $totalRevenue = $rentals->sum('total_revenue');

        $propertyIds = $rentals->pluck('id');

        $bookingQuery = BookingRequest::whereIn(
            'accommodation_id',
            $propertyIds
        );

        $recentBookings = BookingRequest::with([
                'student',
                'accommodation'
            ])
            ->whereIn('accommodation_id', $propertyIds)
            ->latest()
            ->take(5)
            ->get();

        $notifications = \App\Models\Notification::where('user_id', $landlord->id)
            ->latest()
            ->get();
        $totalCapacity = $rentals->sum('capacity');

$occupiedRentals = $rentals->where('available_spaces', 0)->count();

$occupancy = $rentals->count() > 0
    ? round(($occupiedRentals / $rentals->count()) * 100)
    : 0;

        return view('landlord.dashboard', [

            'rentals' => $rentals,

            'totalRevenue' => $totalRevenue,

            'recentBookings' => $recentBookings,

            'notifications' => $notifications,

            'stats' => [

                'rentals' => $rentals->count(),

                'views' => 0,

                'bookings' => $bookingQuery->count(),

                'pending' => BookingRequest::whereIn(
                    'accommodation_id',
                    $propertyIds
                )->where('status', 'Pending')->count(),

                'approved' => BookingRequest::whereIn(
                    'accommodation_id',
                    $propertyIds
                )->where('status', 'Approved')->count(),

                'verified' => $rentals->where('verified', 1)->count(),

                'featured' => $rentals->where('featured', 1)->count(),

                'revenue' => $totalRevenue,

                'revenue' => $totalRevenue,

                'occupiedRentals' => $occupiedRentals,

            ]

        ]);
    }
}