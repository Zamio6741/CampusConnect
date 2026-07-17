<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\BusinessImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BusinessGalleryController extends Controller
{
    public function index(Business $business)
    {
        return view('business.gallery', compact('business'));
    }

    public function store(Request $request, Business $business)
    {
        $request->validate([
            'images.*' => 'required|image|max:4096',
        ]);

        foreach ($request->file('images') as $image) {

            $path = $image->store('business-gallery', 'public');

            BusinessImage::create([
                'business_id' => $business->id,
                'image' => $path,
            ]);
        }

        return back()->with('success', 'Images uploaded successfully.');
    }

    public function destroy(BusinessImage $image)
    {
        Storage::disk('public')->delete($image->image);

        $image->delete();

        return back()->with('success', 'Image deleted.');
    }

    public function cover(BusinessImage $image)
    {
        BusinessImage::where('business_id', $image->business_id)
            ->update(['cover' => false]);

        $image->update([
            'cover' => true,
        ]);

        return back()->with('success', 'Cover image updated.');
    }
}