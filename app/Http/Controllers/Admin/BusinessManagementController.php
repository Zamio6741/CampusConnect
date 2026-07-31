<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use App\Models\University;

class BusinessManagementController extends Controller
{
    public function index(Request $request)
{
    $query = Business::with(['user', 'university']);

    // Search
    if ($request->filled('search')) {

        $query->where(function ($q) use ($request) {

            $q->where('business_name', 'like', '%' . $request->search . '%')
              ->orWhere('category', 'like', '%' . $request->search . '%')
              ->orWhere('location', 'like', '%' . $request->search . '%')
              ->orWhereHas('user', function ($user) use ($request) {
                    $user->where('name', 'like', '%' . $request->search . '%');
              });

        });

    }

    // Status
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // University
    if ($request->filled('university')) {
        $query->where('university_id', $request->university);
    }

    // Sorting
    switch ($request->sort) {

        case 'oldest':
            $query->oldest();
            break;

        case 'views':
            $query->orderByDesc('views');
            break;

        case 'rating':
            $query->orderByDesc('rating');
            break;

        default:
            $query->latest();

    }

    $businesses = $query
        ->paginate(10)
        ->withQueryString();

    $universities = University::orderBy('name')->get();

    return view(
        'admin.businesses.index',
        compact('businesses', 'universities')
    );
}

   public function approve(Business $business)
{
    $business->update([
        'status' => 'Approved',
    ]);

    return back()->with('success', 'Business approved successfully.');
}

public function reject(Business $business)
{
    $business->update([
        'status' => 'Rejected',
    ]);

    return back()->with('success', 'Business rejected successfully.');
}

public function show(Business $business)
{
    return view('admin.businesses.show', compact('business'));
}

}