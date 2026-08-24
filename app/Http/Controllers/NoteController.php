<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display all notes.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $notes = Note::with([
                'user',
                'unit',
                'ratings'
            ])
            ->where('university_id', Auth::user()->university_id)

            ->when($search, function ($query) use ($search) {

                $query->where(function ($query) use ($search) {

                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('unit_code', 'like', "%{$search}%")
                        ->orWhere('unit_name', 'like', "%{$search}%")
                        ->orWhereHas('unit', function ($q) use ($search) {

                            $q->where('unit_code', 'like', "%{$search}%")
                                ->orWhere('unit_name', 'like', "%{$search}%");

                        });

                });

            })

            ->latest()
            ->get();

        return view('notes.index', compact('notes', 'search'));
    }

    /**
     * Show upload page.
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store uploaded note.
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit_code' => 'required|string|max:100',
            'unit_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'pdf' => 'required|mimes:pdf|max:25600',
        ]);

        $path = $request->file('pdf')->store('notes', 'public');

        $note = Note::create([
            'user_id'        => Auth::id(),
            'university_id'  => Auth::user()->university_id,

            // Free-text unit information
            'unit_code'      => trim($request->unit_code),
            'unit_name'      => trim($request->unit_name),

            'title'          => $request->title,
            'description'    => $request->description,
            'file_path'      => $path,
        ]);

        // Notify users from the same university only
        $users = User::where(
            'university_id',
            Auth::user()->university_id
        )->get();

        foreach ($users as $user) {

            Notification::create([
                'user_id' => $user->id,
                'title' => 'New Note',
                'message' => $note->title . ' has been uploaded.',
                'type' => 'note',
            ]);

        }

        return redirect()
            ->route('notes.index')
            ->with('success', '🎉 Notes uploaded successfully!');
    }

    /**
     * Preview PDF inside CampusConnect.
     */
    public function preview(Note $note)
    {
        return response()->file(
            storage_path('app/public/' . $note->file_path),
            [
                'Content-Type' => 'application/pdf',
            ]
        );
    }
}