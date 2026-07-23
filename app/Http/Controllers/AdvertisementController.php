<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertisementController extends Controller
{
    /**
     * Display all advertisements belonging to the logged-in business owner.
     */
    public function index()
    {
        $advertisements = Advertisement::whereHas('business', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->latest()
        ->get();

        return view('business.advertisements.index', compact('advertisements'));
    }

    /**
     * Show the form for creating an advertisement.
     */
    public function create()
    {
        $business = Business::where('user_id', Auth::id())->firstOrFail();

        return view('business.advertisements.create', compact('business'));
    }

    /**
     * Store a newly created advertisement.
     */
    public function store(Request $request)
    {
        $business = Business::where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('advertisements', 'public');
        }

        $validated['business_id'] = $business->id;
        $validated['status'] = 'Pending';
        $validated['is_active'] = $request->boolean('is_active');

        Advertisement::create($validated);

        return redirect()
            ->route('business.advertisements.index')
            ->with('success', 'Advertisement created successfully and is awaiting approval.');
    }

    /**
     * Display a single advertisement.
     */
    public function show(Advertisement $advertisement)
    {
        abort_if($advertisement->business->user_id !== Auth::id(), 403);

        return view('business.advertisements.show', compact('advertisement'));
    }

    /**
     * Show the edit form.
     */
    public function edit(Advertisement $advertisement)
    {
        abort_if($advertisement->business->user_id !== Auth::id(), 403);

        return view('business.advertisements.edit', compact('advertisement'));
    }

    /**
     * Update an advertisement.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        abort_if($advertisement->business->user_id !== Auth::id(), 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:4096',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('advertisements', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');

        $advertisement->update($validated);

        return redirect()
            ->route('business.advertisements.index')
            ->with('success', 'Advertisement updated successfully.');
    }

    /**
     * Delete an advertisement.
     */
    public function destroy(Advertisement $advertisement)
    {
        abort_if($advertisement->business->user_id !== Auth::id(), 403);

        $advertisement->delete();

        return redirect()
            ->route('business.advertisements.index')
            ->with('success', 'Advertisement deleted successfully.');
    }
}