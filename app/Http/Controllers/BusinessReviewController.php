<?php

namespace App\Http\Controllers;

use App\Models\BusinessReview;
use Illuminate\Http\Request;

class BusinessReviewController extends Controller
{
    public function index(Request $request)
    {
        $business = auth()->user()->businesses()->firstOrFail();

        // Reviews query
        $query = BusinessReview::where('business_id', $business->id)
            ->with('user');

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('review', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($qq) use ($search) {
                      $qq->where('name', 'like', "%{$search}%");
                  });

            });
        }

        // Rating Filter
        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }

        // Sorting
        switch ($request->sort) {

            case 'oldest':
                $query->oldest();
                break;

            case 'highest':
                $query->orderByDesc('rating');
                break;

            case 'lowest':
                $query->orderBy('rating');
                break;

            default:
                $query->latest();
        }

        // Paginated Reviews
        $reviews = $query->paginate(10)->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $stats = BusinessReview::where('business_id', $business->id);

        $totalReviews = $stats->count();

        $averageRating = round(
            BusinessReview::where('business_id', $business->id)->avg('rating') ?? 0,
            1
        );

        $positivePercent = $totalReviews
            ? round(
                BusinessReview::where('business_id', $business->id)
                    ->where('rating', '>=', 4)
                    ->count() / $totalReviews * 100
            )
            : 0;

        $pendingReplies = BusinessReview::where('business_id', $business->id)
            ->whereNull('reply')
            ->count();

        $fiveStar = BusinessReview::where('business_id', $business->id)
            ->where('rating', 5)
            ->count();

        $distribution = [];

        for ($i = 5; $i >= 1; $i--) {

            $distribution[$i] = BusinessReview::where('business_id', $business->id)
                ->where('rating', $i)
                ->count();
        }

        return view('business.reviews.index', compact(
            'business',
            'reviews',
            'totalReviews',
            'averageRating',
            'positivePercent',
            'pendingReplies',
            'fiveStar',
            'distribution'
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