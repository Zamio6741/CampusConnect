<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::latest()->get();

        return view('hostels.index', compact('hostels'));
    }

    public function create()
    {
        return view('hostels.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'university'=>'required',

            'hostel_name'=>'required',

            'gender'=>'required',

            'room_number'=>'required',

            'capacity'=>'required|integer',

            'available_spaces'=>'required|integer',

            'description'=>'nullable',

            'warden_name'=>'nullable',

            'warden_phone'=>'nullable',

            'image'=>'nullable|image|max:4096'

        ]);

        $image = null;

        if($request->hasFile('image'))
        {
            $image = $request
                ->file('image')
                ->store('hostels','public');
        }

        Hostel::create([

            'user_id'=>Auth::id(),

            'university'=>$request->university,

            'hostel_name'=>$request->hostel_name,

            'gender'=>$request->gender,

            'room_number'=>$request->room_number,

            'capacity'=>$request->capacity,

            'available_spaces'=>$request->available_spaces,

            'description'=>$request->description,

            'warden_name'=>$request->warden_name,

            'warden_phone'=>$request->warden_phone,

            'image'=>$image

        ]);

        return redirect()
            ->route('hostels.index')
            ->with('success','Hostel added successfully.');
    }
}