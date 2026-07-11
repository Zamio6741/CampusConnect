<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index(Request $request)
    {
        $query = Business::where(
            'university_id',
            Auth::user()->university_id
        );

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

        $business = Business::create([

            'user_id' => Auth::id(),

            'university_id' => Auth::user()->university_id,

            'name' => $validated['name'],

            'category' => $validated['category'],

            'description' => $validated['description'],

            'phone' => $validated['phone'],

            'whatsapp' => $request->whatsapp,

            'location' => $validated['location'],

            'opening_hours' => $request->opening_hours,

        ]);

        // Notify only users from the same university
        $users = User::where(
            'university_id',
            Auth::user()->university_id
        )->get();

        foreach ($users as $user) {

            Notification::create([

                'user_id' => $user->id,

                'title' => 'New Business',

                'message' => $business->name . ' has been added.',

                'type' => 'business',

            ]);

        }

        return redirect()
            ->route('businesses.index')
            ->with('success', 'Business posted successfully.');
    }

    public function show(Business $business)
    {
        abort_if(
            $business->university_id != Auth::user()->university_id,
            403
        );

        return view('businesses.show', compact('business'));
    }

    public function edit(Business $business)
    {
        abort_if(
            $business->user_id != Auth::id(),
            403
        );

        return view('businesses.edit', compact('business'));
    }

    public function update(Request $request, Business $business)
    {
        abort_if(
            $business->user_id != Auth::id(),
            403
        );

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
        abort_if(
            $business->user_id != Auth::id(),
            403
        );

        $business->delete();

        return redirect()
            ->route('businesses.index')
            ->with('success', 'Business deleted successfully.');
    }
}