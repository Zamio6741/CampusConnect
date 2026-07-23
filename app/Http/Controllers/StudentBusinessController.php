<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;

class StudentBusinessController extends Controller
{
    public function index(Request $request)
{
    $query = Business::with(['images', 'user'])
        ->where('status', 'Approved');

    if ($request->filled('search')) {
        $query->where(function ($q) use ($request) {
            $q->where('business_name', 'like', '%' . $request->search . '%')
              ->orWhere('category', 'like', '%' . $request->search . '%')
              ->orWhere('location', 'like', '%' . $request->search . '%');
        });
    }

    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    $businesses = $query->latest()->paginate(12);

    $categories = Business::where('status', 'Approved')
        ->select('category')
        ->distinct()
        ->pluck('category');

    return view('student.business.index', compact('businesses', 'categories'));
}

public function show(Business $business)
{
    $business->load([
        'images',
        'products',
        'user',
        'reviews.user',
    ]);

    return view(
        'student.business.show',
        compact('business')
    );
}

}