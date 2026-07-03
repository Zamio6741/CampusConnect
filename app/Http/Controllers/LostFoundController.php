<?php

namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LostFoundController extends Controller
{
    public function index()
    {
        $items = LostItem::latest()->paginate(12);

        return view('lostfound.index', compact('items'));
    }

    public function create()
    {
        return view('lostfound.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'type' => 'required|in:lost,found',
            'location' => 'required',
            'date' => 'required|date',
            'phone' => 'required|max:20',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('lost-found', 'public');
        }

        LostItem::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'type' => $validated['type'],
            'location' => $validated['location'],
            'date' => $validated['date'],
            'phone' => $validated['phone'],
            'image' => $image,
            'status' => 'open',
        ]);

        return redirect()
            ->route('lostfound.index')
            ->with('success', 'Post created successfully.');
    }

    public function show(LostItem $lostfound)
    {
        return view('lostfound.show', [
            'item' => $lostfound
        ]);
    }
}