<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::where(
                'university_id',
                Auth::user()->university_id
            )
            ->latest()
            ->paginate(10);

        return view('announcements.index', compact('announcements'));
    }

    public function create()
    {
        return view('announcements.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',

            'content' => 'required',

        ]);

        $announcement = Announcement::create([

            'user_id' => Auth::id(),

            'university_id' => Auth::user()->university_id,

            'title' => $validated['title'],

            'content' => $validated['content'],

        ]);

        // Notify only users from the same university
        $users = User::where(
            'university_id',
            Auth::user()->university_id
        )->get();

        foreach ($users as $user) {

            Notification::create([

                'user_id' => $user->id,

                'title' => 'New Announcement',

                'message' => $announcement->title,

                'type' => 'announcement',

            ]);

        }

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement posted successfully.');
    }

    public function show(Announcement $announcement)
    {
        abort_if(
            $announcement->university_id != Auth::user()->university_id,
            403
        );

        return view('announcements.show', compact('announcement'));
    }

    public function edit(Announcement $announcement)
    {
        abort_if(
            $announcement->university_id != Auth::user()->university_id,
            403
        );

        return view('announcements.edit', compact('announcement'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        abort_if(
            $announcement->university_id != Auth::user()->university_id,
            403
        );

        $validated = $request->validate([

            'title' => 'required|max:255',

            'content' => 'required',

        ]);

        $announcement->update($validated);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement updated successfully.');
    }

    public function destroy(Announcement $announcement)
    {
        abort_if(
            $announcement->university_id != Auth::user()->university_id,
            403
        );

        $announcement->delete();

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement deleted.');
    }
}