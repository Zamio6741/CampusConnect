<?php

namespace App\Http\Controllers;

use App\Models\MarketplaceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $query = MarketplaceItem::with('images', 'user')
            ->where('sold', false);

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->location) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        $items = $query->latest()->paginate(12);

        return view('marketplace.index', compact('items'));
    }

    public function create()
    {
        return view('marketplace.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'title' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'condition' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'whatsapp' => 'nullable',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:4096',

        ]);

        $item = MarketplaceItem::create([

            'user_id' => Auth::id(),

            'title' => $validated['title'],

            'description' => $validated['description'],

            'price' => $validated['price'],

            'category' => $validated['category'],

            'condition' => $validated['condition'],

            'phone' => $validated['phone'],

            'whatsapp' => $request->whatsapp,

            'location' => $validated['location'],


        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $image) {

                $path = $image->store('marketplace', 'public');

                $item->images()->create([

                    'image' => $path

                ]);

            }

        }

        return redirect()
            ->route('marketplace.index')
            ->with('success', 'Item listed successfully.');
    }

    public function show(MarketplaceItem $marketplace)
{
    $marketplace->load('images', 'user');

    $similarItems = MarketplaceItem::with('images')
        ->where('category', $marketplace->category)
        ->where('id', '!=', $marketplace->id)
        ->latest()
        ->take(4)
        ->get();

    return view('marketplace.show', [
        'item' => $marketplace,
        'similarItems' => $similarItems,
    ]);
}

    public function myItems()
    {
        $items = MarketplaceItem::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('marketplace.my-items', compact('items'));
    }

    public function edit(MarketplaceItem $marketplace)
    {
        abort_if($marketplace->user_id != Auth::id(), 403);

        return view('marketplace.edit', [

            'item' => $marketplace

        ]);
    }

    public function update(Request $request, MarketplaceItem $marketplace)
    {
        abort_if($marketplace->user_id != Auth::id(), 403);

        $validated = $request->validate([

            'title' => 'required',

            'description' => 'required',

            'price' => 'required|numeric',

            'category' => 'required',

            'condition' => 'required',

            'phone' => 'required',

            'location' => 'required',

            'whatsapp' => 'nullable',

        ]);

        $marketplace->update($validated);

        return redirect()

            ->route('marketplace.show', $marketplace)

            ->with('success', 'Listing updated successfully.');

    }

   public function destroy(MarketplaceItem $marketplace)
{
    abort_if($marketplace->user_id != Auth::id(), 403);

    $marketplace->delete();

    return redirect()
        ->route('marketplace.index')
        ->with('success', 'Listing deleted.');
}

public function markSold(MarketplaceItem $marketplace)
{
    abort_if($marketplace->user_id != Auth::id(), 403);

    $marketplace->sold = true;
    $marketplace->save();

    return back()->with('success', 'Item marked as sold.');
}

public function markAvailable(MarketplaceItem $marketplace)
{
    abort_if($marketplace->user_id != Auth::id(), 403);

    $marketplace->sold = false;
    $marketplace->save();

    return back()->with('success', 'Item marked as available.');
}
}