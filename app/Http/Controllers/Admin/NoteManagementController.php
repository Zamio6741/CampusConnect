<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Faculty;
use App\Models\Note;
use App\Models\Programme;
use App\Models\Semester;
use App\Models\University;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Exports\NotesExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class NoteManagementController extends Controller
{
    public function index(Request $request)
    {
        $notes = Note::with([
                'user',
                'university',
                'faculty',
                'department',
                'programme',
                'semester',
                'unit'
            ])

            ->when($request->search, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->where('title', 'like', "%{$request->search}%")
                      ->orWhere('description', 'like', "%{$request->search}%");
                });
            })

            ->when($request->university, fn($q)=>$q->where('university_id',$request->university))
            ->when($request->faculty, fn($q)=>$q->where('faculty_id',$request->faculty))
            ->when($request->department, fn($q)=>$q->where('department_id',$request->department))
            ->when($request->programme, fn($q)=>$q->where('programme_id',$request->programme))
            ->when($request->semester, fn($q)=>$q->where('semester_id',$request->semester))
            ->when($request->unit, function ($q) use ($request) {

    $q->where(function ($query) use ($request) {

        $query->where('unit_id', $request->unit)
              ->orWhere('unit_code', 'like', '%' . $request->unit . '%')
              ->orWhere('unit_name', 'like', '%' . $request->unit . '%');

    });

})
            ->when($request->status, fn($q)=>$q->where('status',$request->status))

            ->when($request->premium !== null && $request->premium !== '', function ($query) use ($request) {
                $query->where('is_premium', $request->premium);
            })

            ->orderBy(
                $request->get('sort','created_at'),
                $request->get('direction','desc')
            )

            ->paginate(10)
            ->withQueryString();

        return view('admin.notes.index', [

            'notes'=>$notes,

            'universities'=>University::orderBy('name')->get(),
            'faculties'=>Faculty::orderBy('name')->get(),
            'departments'=>Department::orderBy('name')->get(),
            'programmes'=>Programme::orderBy('name')->get(),
            'semesters' => Semester::orderBy('year')
    ->orderBy('semester')
    ->get(),
            'units' => Unit::orderBy('unit_name')->get(),

        ]);
    }

    public function bulkApprove(Request $request)
{
    $ids = explode(',', $request->selected);

    Note::whereIn('id', $ids)
        ->update([
            'status' => 'approved'
        ]);

    return back()->with('success', 'Selected notes approved successfully.');
}

public function bulkReject(Request $request)
{
    $ids = explode(',', $request->selected);

    Note::whereIn('id', $ids)
        ->update([
            'status' => 'rejected'
        ]);

    return back()->with('success', 'Selected notes rejected successfully.');
}

public function bulkDelete(Request $request)
{
    $ids = explode(',', $request->selected);

    Note::whereIn('id', $ids)->delete();

    return back()->with('success', 'Selected notes deleted successfully.');
}

public function exportExcel()
{
    return Excel::download(
        new NotesExport,
        'campusconnect-notes.xlsx'
    );
}


public function exportPdf()
{
    $notes = Note::with([
        'user',
        'university',
        'faculty',
        'department',
        'programme',
        'semester',
        'unit',
    ])
    ->latest()
    ->get();

    $pdf = Pdf::loadView(
        'admin.notes.export-pdf',
        compact('notes')
    );

    $pdf->setPaper('a4', 'landscape');

    return $pdf->download(
        'campusconnect-notes.pdf'
    );
}

public function show(Note $note)
{
    return view('admin.notes.show', compact('note'));
}

public function approve(Note $note)
{
    $note->update([
        'status' => 'approved',
    ]);

    return back()->with('success', 'Note approved successfully.');
}

public function reject(Note $note)
{
    $note->update([
        'status' => 'rejected',
    ]);

    return back()->with('success', 'Note rejected successfully.');
}

public function destroy(Note $note)
{
    $note->delete();

    return back()->with('success', 'Note deleted successfully.');
}

}