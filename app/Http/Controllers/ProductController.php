<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $business = Business::where('user_id', Auth::id())->firstOrFail();

        $products = $business->products()->latest()->get();

        return view('products.index', compact('business','products'));
    }

    public function create()
    {
        $business = Business::where('user_id', Auth::id())->firstOrFail();
            
        return view('products.create', compact('business'));
    }

    public function store(Request $request)
{
    $business = Business::where('user_id', Auth::id())->firstOrFail();

    $validated = $request->validate([
        'name' => 'required|max:255',
        'category' => 'nullable|max:255',
        'price' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:0',
        'description' => 'nullable',
        'image' => 'nullable|image|max:4096',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('products', 'public');
    }

    $validated['business_id'] = $business->id;

    $validated['available'] = $request->quantity > 0;

    Product::create($validated);

    return redirect()
        ->route('products.index')
        ->with('success', 'Product added successfully.');
}

public function edit(Product $product)
{
    return view('products.edit', compact('product'));
}

public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name'=>'required|max:255',
        'category'=>'nullable|max:255',
        'price'=>'required|numeric|min:0',
        'quantity'=>'required|integer|min:0',
        'description'=>'nullable',
        'image'=>'nullable|image|max:4096',
    ]);

    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('products','public');
    }

    $validated['available'] = $request->quantity > 0;

    $product->update($validated);

    return redirect()
        ->route('products.index')
        ->with('success','Product updated successfully.');
}

public function featured(Product $product)
{
    Product::where('business_id', $product->business_id)
        ->update([
            'featured' => false,
        ]);

    $product->update([
        'featured' => true,
    ]);

    return back()->with('success', 'Featured product updated.');
}

}