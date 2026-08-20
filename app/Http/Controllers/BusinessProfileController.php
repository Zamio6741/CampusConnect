<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BusinessProfileController extends Controller
{
    /**
     * Display the business profile.
     */
    public function edit()
    {
        $business = auth()->user()->business;

        abort_unless($business, 404);

        return view('business.profile', compact('business'));
    }

    /**
     * Update the business profile.
     */
    public function update(Request $request)
    {
        $business = auth()->user()->business;

        abort_unless($business, 404);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
        ]);

        $business->update($validated);

        return redirect()
            ->route('business.profile')
            ->with('success', 'Business profile updated successfully.');
    }
}