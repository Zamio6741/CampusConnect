<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;

class AccommodationManagementController extends Controller
{
    public function index(Request $request)
{
    $query = Accommodation::with(['owner', 'university']);

    // Search
    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('title', 'like', '%' . $request->search . '%')
              ->orWhere('location', 'like', '%' . $request->search . '%');
        });
    }

    // Verified filter
    if ($request->filled('verified')) {
        $query->where('verified', $request->verified);
    }

    // University filter
    if ($request->filled('university')) {
        $query->where('university_id', $request->university);
    }

    $accommodations = $query
        ->latest()
        ->paginate(10)
        ->withQueryString();

    $universities = \App\Models\University::orderBy('name')->get();

    return view('admin.accommodations.index', compact(
        'accommodations',
        'universities'
    ));
}

  public function approve(Accommodation $accommodation)
{
    $accommodation->verified = true;
    $accommodation->status = 'Approved';
    $accommodation->save();

    return redirect()
        ->route('admin.accommodations')
        ->with('success', 'Accommodation approved successfully.');
}

public function reject(Accommodation $accommodation)
{
    $accommodation->verified = false;
    $accommodation->status = 'Rejected';
    $accommodation->save();

    return redirect()
        ->route('admin.accommodations')
        ->with('success', 'Accommodation rejected successfully.');
}
    public function show(Accommodation $accommodation)
{
    return view('admin.accommodations.show', compact('accommodation'));
}

}