<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MarketplaceItem;
use Illuminate\Http\Request;

class MarketplaceManagementController extends Controller
{
    /**
     * Display marketplace listings.
     */
    public function index(Request $request)
    {
        $query = MarketplaceItem::with(['user', 'images']);

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Category Filter
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        /*
        |--------------------------------------------------------------------------
        | Status Filter
        |--------------------------------------------------------------------------
        */

        if ($request->status === 'available') {
            $query->where('sold', false);
        }

        if ($request->status === 'sold') {
            $query->where('sold', true);
        }

        /*
        |--------------------------------------------------------------------------
        | Listings
        |--------------------------------------------------------------------------
        */

        $items = $query
            ->latest()
            ->paginate(15)
            ->withQueryString();

        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $categories = MarketplaceItem::query()
            ->select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        /*
        |--------------------------------------------------------------------------
        | Statistics
        |--------------------------------------------------------------------------
        */

        $totalListings = MarketplaceItem::count();

        $availableListings = MarketplaceItem::where('sold', false)->count();

        $soldListings = MarketplaceItem::where('sold', true)->count();

        $monthlyListings = MarketplaceItem::whereMonth(
            'created_at',
            now()->month
        )
        ->whereYear(
            'created_at',
            now()->year
        )
        ->count();

        return view('admin.marketplace.index', compact(
            'items',
            'categories',
            'totalListings',
            'availableListings',
            'soldListings',
            'monthlyListings'
        ));
    }

    /**
     * Show marketplace listing.
     */
    public function show(MarketplaceItem $marketplace)
    {
        $marketplace->load([
            'user',
            'images',
        ]);

        return view(
            'admin.marketplace.show',
            compact('marketplace')
        );
    }

    /**
     * Mark listing as sold.
     */
    public function markSold(MarketplaceItem $marketplace)
    {
        $marketplace->update([
            'sold' => true,
        ]);

        return back()->with(
            'success',
            'Marketplace listing marked as sold.'
        );
    }

    /**
     * Mark listing as available.
     */
    public function markAvailable(MarketplaceItem $marketplace)
    {
        $marketplace->update([
            'sold' => false,
        ]);

        return back()->with(
            'success',
            'Marketplace listing marked as available.'
        );
    }

    /**
     * Delete marketplace listing.
     */
    public function destroy(MarketplaceItem $marketplace)
    {
        $marketplace->delete();

        return redirect()
            ->route('admin.marketplace')
            ->with(
                'success',
                'Marketplace listing deleted successfully.'
            );
    }
}