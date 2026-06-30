<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display all notes.
     */
    public function index(Request $request)
    {
        $query = Note::with(['user', 'unit']);

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhereHas('unit', function ($unit) use ($search) {

                      $unit->where('unit_code', 'like', "%{$search}%")
                           ->orWhere('unit_name', 'like', "%{$search}%");

                  })
                  ->orWhereHas('user', function ($user) use ($search) {

                      $user->where('name', 'like', "%{$search}%");

                  });

            });
        }

        // Filter by Unit
        if ($request->filled('unit')) {

            $query->where('unit_id', $request->unit);

        }

        $notes = $query->latest()->paginate(9)->withQueryString();

        $units = Unit::orderBy('unit_code')->get();

        return view('notes.index', compact('notes', 'units'));
    }

    /**
     * Upload page
     */
    public function create()
    {
        $units = Unit::orderBy('unit_code')->get();

        return view('notes.create', compact('units'));
    }

    /**
     * Save Note
     */
    public function store(Request $request)
    {
        $request->validate([

            'unit_id' => 'required|exists:units,id',

            'title' => 'required|max:255',

            'description' => 'nullable',

            'pdf' => 'required|mimes:pdf|max:25600',

        ]);

        $path = $request->file('pdf')->store('notes', 'public');

        Note::create([

            'user_id' => Auth::id(),

            'unit_id' => $request->unit_id,

            'title' => $request->title,

            'description' => $request->description,

            'file_path' => $path,

        ]);

        return redirect()
            ->route('notes.index')
            ->with('success', '🎉 Notes uploaded successfully!');
    }
}