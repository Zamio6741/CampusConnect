<?php

namespace App\Http\Controllers;

use App\Models\PastPaper;
use App\Models\Unit;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PastPaperController extends Controller
{
    /**
     * Display all past papers.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $year = $request->year;
        $type = $request->type;

        $papers = PastPaper::with(['user', 'unit'])

            // Only show papers from the logged-in user's university
            ->where('university_id', Auth::user()->university_id)

            ->when($search, function ($query) use ($search) {

                $query->where(function ($query) use ($search) {

                    $query->where('title', 'like', "%{$search}%")
                          ->orWhereHas('unit', function ($q) use ($search) {

                              $q->where('unit_code', 'like', "%{$search}%")
                                ->orWhere('unit_name', 'like', "%{$search}%");

                          });

                });

            })

            ->when($year, function ($query) use ($year) {

                $query->where('year', $year);

            })

            ->when($type, function ($query) use ($type) {

                $query->where('type', $type);

            })

            ->latest()
            ->get();

        return view('pastpapers.index', compact(
            'papers',
            'search',
            'year',
            'type'
        ));
    }

    /**
     * Upload page.
     */
    public function create()
    {
        $units = Unit::orderBy('unit_code')->get();

        return view('pastpapers.create', compact('units'));
    }

    /**
     * Store uploaded paper.
     */
    public function store(Request $request)
    {
        $request->validate([

            'unit_id' => 'required|exists:units,id',
            'title' => 'required|max:255',
            'year' => 'required',
            'semester' => 'required',
            'type' => 'required',
            'description' => 'nullable|max:1000',
            'pdf' => 'required|mimes:pdf|max:25600',

        ]);

        $path = $request->file('pdf')->store('pastpapers', 'public');

        $paper = PastPaper::create([

            'user_id'       => Auth::id(),
            'university_id' => Auth::user()->university_id,
            'unit_id'       => $request->unit_id,
            'title'         => $request->title,
            'year'          => $request->year,
            'semester'      => $request->semester,
            'type'          => $request->type,
            'description'   => $request->description,
            'file_path'     => $path,

        ]);

        // Notify users from the same university only
        $users = User::where(
            'university_id',
            Auth::user()->university_id
        )->get();

        foreach ($users as $user) {

            Notification::create([
                'user_id' => $user->id,
                'title' => 'New Past Paper',
                'message' => $paper->title . ' has been uploaded.',
                'type' => 'pastpaper',
            ]);

        }

        return redirect()
            ->route('pastpapers.index')
            ->with('success', '🎉 Past paper uploaded successfully!');
    }

    /**
     * Preview PDF.
     */
    public function preview(PastPaper $pastpaper)
    {
        return response()->file(
            storage_path('app/public/' . $pastpaper->file_path)
        );
    }
}