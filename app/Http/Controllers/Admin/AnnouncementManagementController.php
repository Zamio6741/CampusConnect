<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\University;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class AnnouncementManagementController extends Controller
{
    /**
     * Display all announcements.
     */
    public function index(Request $request)
    {
        $announcements = Announcement::with(['user', 'university'])

            ->when($request->filled('search'), function ($query) use ($request) {

                $query->where(function ($q) use ($request) {

                    $q->where('title', 'like', '%' . $request->search . '%')
                      ->orWhere('content', 'like', '%' . $request->search . '%');

                });

            })

            ->when($request->filled('university'), function ($query) use ($request) {

                $query->where('university_id', $request->university);

            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        $universities = University::orderBy('name')->get();

        return view(
            'admin.announcements.index',
            compact('announcements', 'universities')
        );
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $universities = University::orderBy('name')->get();

        return view(
            'admin.announcements.create',
            compact('universities')
        );
    }

    /**
     * Store announcement.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'university_id' => 'required|exists:universities,id',

            'title' => 'required|string|max:255',

            'content' => 'required|string',

        ]);

        $announcement = Announcement::create([

    'university_id' => $validated['university_id'],

    'title' => $validated['title'],

    'content' => $validated['content'],

]);

        /*
        |--------------------------------------------------------------------------
        | Notify students in the selected university
        |--------------------------------------------------------------------------
        */

        $users = User::where(
            'university_id',
            $announcement->university_id
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
            ->route('admin.announcements')
            ->with(
                'success',
                'Announcement published successfully.'
            );
    }

    /**
     * Show announcement.
     */
    public function show(Announcement $announcement)
    {
        $announcement->load(['user', 'university']);

        return view(
            'admin.announcements.show',
            compact('announcement')
        );
    }

    /**
     * Show edit form.
     */
    public function edit(Announcement $announcement)
    {
        $universities = University::orderBy('name')->get();

        return view(
            'admin.announcements.edit',
            compact('announcement', 'universities')
        );
    }

    /**
     * Update announcement.
     */
    public function update(
        Request $request,
        Announcement $announcement
    ) {
        $validated = $request->validate([

            'university_id' => 'required|exists:universities,id',

            'title' => 'required|string|max:255',

            'content' => 'required|string',

        ]);

        $announcement->update($validated);

        return redirect()
            ->route('admin.announcements')
            ->with(
                'success',
                'Announcement updated successfully.'
            );
    }

    /**
     * Delete announcement.
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()
            ->route('admin.announcements')
            ->with(
                'success',
                'Announcement deleted successfully.'
            );
    }
}