<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\University;
use App\Models\Product;
use App\Models\BusinessReview;
use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Business Dashboard
    |--------------------------------------------------------------------------
    */

public function dashboard()
{
    $business = Business::where('user_id', auth()->id())->first();

    if (!$business) {
        return redirect()
            ->route('businesses.create')
            ->with('info', 'Please register your business first.');
    }

    $unreadMessages = Message::where('business_id', $business->id)
        ->where('sender_id', '!=', auth()->id())
        ->where('is_read', false)
        ->count();

    $productsCount = Product::where('business_id', $business->id)->count();

    $reviewsCount = BusinessReview::where('business_id', $business->id)->count();

    $averageRating = round(
        BusinessReview::where('business_id', $business->id)->avg('rating') ?? 0,
        1
    );

    $advertisementsCount = Advertisement::where('business_id', $business->id)->count();

    return view('business.dashboard', compact(
        'business',
        'unreadMessages',
        'productsCount',
        'reviewsCount',
        'averageRating',
        'advertisementsCount'
    ));
}
    /*
    |--------------------------------------------------------------------------
    | Show Registration Form
    |--------------------------------------------------------------------------
    */

   public function create()
{
    // Check if the logged-in user already owns a business
    $existingBusiness = Business::where('user_id', auth()->id())->first();

    if ($existingBusiness) {
        return redirect()
            ->route('business.dashboard')
            ->with('info', 'You already have a registered business.');
    }

    $universities = University::orderBy('name')->get();

    return view('business.create', compact('universities'));
}

    /*
    |--------------------------------------------------------------------------
    | Store Business
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
            if (Business::where('user_id', auth()->id())->exists()) {
        return redirect()
            ->route('business.dashboard')
            ->with('error', 'You can only register one business account.');
    }

        $request->validate([

            'business_name' => 'required',

            'category' => 'required',

            'description' => 'required',

            'phone' => 'required',

            'location' => 'required',

        ]);

        Business::create([

            'user_id' => auth()->id(),

            'university_id' => $request->university_id,

            'business_name' => $request->business_name,

            'category' => $request->category,

            'description' => $request->description,

            'phone' => $request->phone,

            'whatsapp' => $request->whatsapp,

            'email' => $request->email,

            'location' => $request->location,

            'google_maps' => $request->google_maps,

            'facebook' => $request->facebook,

            'instagram' => $request->instagram,

            'tiktok' => $request->tiktok,

            'website' => $request->website,

            'status' => 'Pending',

        ]);

        return redirect()->route('business.dashboard')
            ->with('success','Business registered successfully.');


    }

    public function edit(Business $business)
{
    abort_if($business->user_id != auth()->id(), 403);

    $universities = University::all();

    return view('business.edit', compact('business', 'universities'));
}

  public function update(Request $request, Business $business)
{
    abort_if($business->user_id != auth()->id(), 403);

    $validated = $request->validate([
        'business_name' => 'required|max:255',
        'category' => 'required|max:255',
        'description' => 'required',
        'phone' => 'required',
        'whatsapp' => 'nullable',
        'email' => 'nullable|email',
        'location' => 'required',
        'website' => 'nullable',
        'facebook' => 'nullable',
        'instagram' => 'nullable',
        'tiktok' => 'nullable',
        'google_maps' => 'nullable',
        'university_id' => 'required',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

   if ($request->hasFile('logo')) {

    if ($business->logo) {
        Storage::disk('public')->delete($business->logo);
    }

    $validated['logo'] = $request
        ->file('logo')
        ->store('business-logos', 'public');
}

$business->update($validated);

    return redirect()
        ->route('business.dashboard')
        ->with('success', 'Business updated successfully.');
}

public function show(Business $business)
{
    $business->load([
        'images',
        'products',
        'university',
    ]);

    $business->increment('views');

   return view('business.preview', compact('business'));
}

public function index()
{
    $business = Business::where('user_id', auth()->id())->first();

    if (!$business) {
        return redirect()->route('business.create');
    }

    return view('business.dashboard', compact('business'));
}

public function profile()
{
    $business = auth()->user()->business;

                abort_unless($business, 404);

    return view('business.profile', compact('business'));
}

}