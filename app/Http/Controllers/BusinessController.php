<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index(Request $request)
{
    $query = Business::query();

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $businesses = $query->latest()->paginate(12);

    return view('businesses.index', compact('businesses'));
}

    public function create()
    {
        return view('businesses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'whatsapp' => 'nullable',
            'location' => 'required',
            'opening_hours' => 'nullable',
        ]);

        Business::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'phone' => $validated['phone'],
            'whatsapp' => $request->whatsapp,
            'location' => $validated['location'],
            'opening_hours' => $request->opening_hours,
        ]);

        return redirect()
            ->route('businesses.index')
            ->with('success', 'Business posted successfully.');
    }

    public function show(Business $business)
    {
        return view('businesses.show', compact('business'));
    }

    public function edit(Business $business)
    {
        if ($business->user_id != Auth::id()) {
            abort(403);
        }

        return view('businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        if ($business->user_id != Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|max:255',
            'category' => 'required',
            'description' => 'required',
            'phone' => 'required',
            'whatsapp' => 'nullable',
            'location' => 'required',
            'opening_hours' => 'nullable',
        ]);

        $business->update([
            'name' => $validated['name'],
            'category' => $validated['category'],
            'description' => $validated['description'],
            'phone' => $validated['phone'],
            'whatsapp' => $request->whatsapp,
            'location' => $validated['location'],
            'opening_hours' => $request->opening_hours,
        ]);

        return redirect()
            ->route('businesses.show', $business)
            ->with('success', 'Business updated successfully.');
    }

    public function destroy(Business $business)
    {
        if ($business->user_id != Auth::id()) {
            abort(403);
        }

        $business->delete();

        return redirect()
            ->route('businesses.index')
            ->with('success', 'Business deleted successfully.');
    }
}