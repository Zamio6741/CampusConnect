<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\BusinessReview;
use App\Models\Message;
use App\Models\Product;

class BusinessAnalyticsController extends Controller
{
    public function index()
    {
        $business = auth()->user()->business;

                    abort_unless($business, 404);

        $products = Product::where('business_id', $business->id)->get();

        $totalProducts = $products->count();

        $totalViews = $business->views;

        $totalReviews = BusinessReview::where('business_id', $business->id)->count();

        $averageRating = round(
            BusinessReview::where('business_id', $business->id)->avg('rating') ?? 0,
            1
        );

        $totalMessages = Message::where('business_id', $business->id)->count();

        $unreadMessages = Message::where('business_id', $business->id)
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->count();

        $totalAds = Advertisement::where('business_id', $business->id)->count();

        $featuredProducts = Product::where('business_id', $business->id)
            ->where('featured', true)
            ->count();
        
        $topProducts = Product::where('business_id', $business->id)
    ->latest()
    ->take(5)
    ->get();    

        $viewsPerProduct = $totalProducts
            ? round($totalViews / $totalProducts, 1)
            : 0;

        return view('business.analytics.index', compact(
            'business',
            'totalProducts',
            'totalViews',
            'totalReviews',
            'averageRating',
            'totalMessages',
            'unreadMessages',
            'totalAds',
            'featuredProducts',
            'viewsPerProduct',
            'topProducts',
        ));
    }
}