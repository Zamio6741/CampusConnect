<?php

namespace App\Http\Controllers;

use App\Models\StudentServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentServiceController extends Controller
{
    public function index()
    {
        return view('student-services.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service' => 'required',
            'phone' => 'required',
            'notes' => 'nullable',
        ]);

        StudentServiceRequest::create([
            'user_id' => Auth::id(),
            'service' => $validated['service'],
            'phone' => $validated['phone'],
            'notes' => $request->notes,
        ]);

        return back()->with('success', 'Request sent successfully. We will contact you shortly.');
    }
}