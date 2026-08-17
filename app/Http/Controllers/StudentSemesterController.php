<?php

namespace App\Http\Controllers;

use App\Models\StudentSemester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentSemesterController extends Controller
{
    /**
     * Show the semester settings page.
     */
    public function edit()
    {
        $semester = StudentSemester::where('user_id', Auth::id())
            ->latest()
            ->first();

        return view('student.semester', compact('semester'));
    }

    /**
     * Save or update the current semester.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'start_date' => [
                'required',
                'date',
            ],

            'end_date' => [
                'required',
                'date',
                'after:start_date',
            ],
        ], [
            'end_date.after' => 'The semester end date must be after the start date.',
        ]);

        $user = Auth::user();

        $semester = StudentSemester::where('user_id', $user->id)
            ->latest()
            ->first();

        if ($semester) {

            // Update existing semester
            $semester->update([
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]);

            $message = 'Your semester dates have been updated successfully.';

        } else {

            // Create first semester
            StudentSemester::create([
                'user_id' => $user->id,
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]);

            $message = 'Your semester dates have been saved successfully.';
        }

        return redirect()
            ->route('student.dashboard')
            ->with('success', $message);
    }
}