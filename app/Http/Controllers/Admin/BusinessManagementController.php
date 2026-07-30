<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Business;

class BusinessManagementController extends Controller
{
    public function index()
    {
        $businesses = Business::latest()->paginate(20);

        return view('admin.businesses.index', compact('businesses'));
    }

    public function approve(Business $business)
{
    $business->status = 'Approved';
    $business->save();

    return back();
}

public function reject(Business $business)
{
    $business->status = 'Rejected';
    $business->save();

    return back();
}

}