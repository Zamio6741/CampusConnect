<?php

namespace App\Http\Controllers;

use App\Models\BusinessReview;
use Illuminate\Http\Request;

class BusinessReviewController extends Controller
{
    public function index(Request $request)
    {
        $business = auth()->user()->businesses()->firstOrFail();

        $reviews = BusinessReview::where('business_id', $business->id)
            ->with('user');

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $reviews->where(function ($query) use ($search) {

                $query->where('review', 'like', "%{$search}%")

                    ->orWhereHas('user', function ($q) use ($search) {

                        $q->where('name', 'like', "%{$search}%");

                    });

            });

        }

        // Rating filter
        if ($request->filled('rating')) {

            $reviews->where('rating', $request->rating);

        }

        // Sorting
        switch ($request->sort) {

            case 'oldest':
                $reviews->oldest();
                break;

            case 'highest':
                $reviews->orderByDesc('rating');
                break;

            case 'lowest':
                $reviews->orderBy('rating');
                break;

            default:
                $reviews->latest();

        }

        $reviews = $reviews->paginate(10)->withQueryString();

        return view('business.reviews.index', compact(
            'business',
            'reviews'
        ));
    }

    public function store(Request $request, $business)
    {
        $request->validate([

            'rating' => 'required|integer|min:1|max:5',

            'review' => 'required|string|max:1000',

        ]);

        BusinessReview::updateOrCreate(

            [
                'business_id' => $business,
                'user_id' => auth()->id(),
            ],

            [
                'rating' => $request->rating,
                'review' => $request->review,
            ]

        );

        return back()->with('success', 'Review submitted successfully.');

    }

    public function reply(Request $request, BusinessReview $review)
    {
        $request->validate([

            'reply' => 'required|string|max:1000',

        ]);

        $review->update([

            'reply' => $request->reply,

        ]);

        return back()->with('success', 'Reply posted successfully.');
    }
}