<x-app-layout>
    <div class="bg-red-600 text-white text-4xl p-8 text-center">
    TEST VIEW LOADED
</div>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    {{-- Cover Image --}}
    <div class="relative h-[380px] overflow-hidden">

        @php
            $cover = $business->images->where('cover', true)->first();
        @endphp

        @if($cover)
            <img src="{{ asset('storage/'.$cover->image) }}"
                 class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gradient-to-r from-sky-600 to-blue-700"></div>
        @endif

        <div class="absolute inset-0 bg-black/40"></div>

    </div>

    <div class="max-w-7xl mx-auto px-8">

        {{-- Business Header --}}
        <div class="relative -mt-24">

            <div class="bg-white rounded-3xl shadow-2xl p-8">

                <div class="flex flex-col lg:flex-row gap-8">

                    {{-- Logo --}}
                    <div>

                        @if($business->logo)

                            <img
                                src="{{ asset('storage/'.$business->logo) }}"
                                class="w-40 h-40 rounded-3xl object-cover border-8 border-white shadow-xl">

                        @else

                            <div class="w-40 h-40 rounded-3xl bg-sky-100 flex items-center justify-center text-7xl">

                                🏪

                            </div>

                        @endif

                    </div>

                    {{-- Business Info --}}
                    <div class="flex-1">

                        <h1 class="text-5xl font-extrabold">

                            {{ $business->business_name }}

                        </h1>

                        <p class="text-gray-500 mt-2">

                            {{ $business->category }}

                        </p>

                        <div class="flex flex-wrap gap-4 mt-6">

                            <span class="bg-sky-100 text-sky-700 px-5 py-2 rounded-full">
                                📍 {{ $business->location }}
                            </span>

                            <span class="bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full">
                                ⭐ {{ number_format($business->rating,1) }}
                            </span>

                            <span class="bg-green-100 text-green-700 px-5 py-2 rounded-full">
                                👀 {{ $business->views }} Views
                            </span>

                            <span class="bg-purple-100 text-purple-700 px-5 py-2 rounded-full">
                                {{ $business->status }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        {{-- Description --}}
        <div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

            <h2 class="text-3xl font-bold mb-6">

                About

            </h2>

            <p class="text-lg text-gray-600 leading-8">

                {{ $business->description }}

            </p>

        </div>

        {{-- Contact --}}
        <div class="grid lg:grid-cols-2 gap-8 mt-10">

            <div class="bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold mb-6">

                    Contact Information

                </h2>

                <div class="space-y-5">

                    <p><strong>📞 Phone:</strong> {{ $business->phone }}</p>

                    <p><strong>💬 WhatsApp:</strong> {{ $business->whatsapp }}</p>

                    <p><strong>📧 Email:</strong> {{ $business->email }}</p>

                    <p><strong>🌐 Website:</strong>

                        {{ $business->website ?: 'Not Available' }}

                    </p>

                </div>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-8">

                <h2 class="text-2xl font-bold mb-6">

                    Location

                </h2>

                <div class="h-64 rounded-2xl bg-slate-100 flex items-center justify-center text-3xl text-gray-400">

                    🗺 Google Map Coming Soon

                </div>

            </div>

        </div>

        {{-- Gallery --}}
        <div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

            <h2 class="text-3xl font-bold mb-8">

                Gallery

            </h2>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @forelse($business->images as $image)

                    <img
                        src="{{ asset('storage/'.$image->image) }}"
                        class="rounded-2xl shadow-lg h-56 w-full object-cover hover:scale-105 transition">

                @empty

                    <p>No gallery images yet.</p>

                @endforelse

            </div>

        </div>

        {{-- Products --}}
<div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

    <div class="flex justify-between items-center mb-8">

        <h2 class="text-3xl font-bold">
            🛍 Products
        </h2>

        <span class="text-gray-500">
            {{ $business->products->count() }} Products
        </span>

    </div>

    @if($business->products->count())

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach($business->products as $product)

                <div class="border rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition">

                    @if($product->image)

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="w-full h-60 object-cover">

                    @else

                        <div class="w-full h-60 bg-slate-100 flex items-center justify-center text-6xl">

                            📦

                        </div>

                    @endif

                    <div class="p-6">

                        <div class="flex justify-between items-start">

                            <div>

                                <h3 class="text-2xl font-bold">

                                    {{ $product->name }}

                                </h3>

                                <p class="text-gray-500">

                                    {{ $product->category }}

                                </p>

                            </div>

                            @if($product->featured)

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-2 rounded-full text-sm font-semibold">

                                    ⭐ Featured

                                </span>

                            @endif

                        </div>

                        <p class="text-gray-600 mt-4">

                            {{ $product->description }}

                        </p>

                        <div class="flex justify-between items-center mt-6">

                            <span class="text-2xl font-bold text-green-600">

                                KES {{ number_format($product->price) }}

                            </span>

                            <span class="text-sm text-gray-500">

                                Stock: {{ $product->quantity }}

                            </span>

                        </div>

                        <div class="mt-6">

                            @if($product->available)

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                                    ✅ Available

                                </span>

                            @else

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                                    ❌ Out of Stock

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="text-center py-16">

            <div class="text-7xl">

                📦

            </div>

            <h3 class="text-3xl font-bold mt-6">

                No Products Yet

            </h3>

            <p class="text-gray-500 mt-3">

                This business hasn't added any products.

            </p>

        </div>

    @endif

</div>

       {{-- Reviews --}}
<div class="bg-white rounded-3xl shadow-xl mt-10 mb-20 p-8">

    <h2 class="text-3xl font-bold mb-8">
        ⭐ Customer Reviews
    </h2>

  @auth

<form method="POST"
      action="{{ route('business.reviews.store', $business) }}"
      class="mb-10">

    @csrf

    <div class="mb-6">
        <label class="font-semibold">
            Rating
        </label>

        <select
            name="rating"
            class="w-full mt-2 border rounded-xl p-4"
            required>

            <option value="">Select Rating</option>
            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
            <option value="4">⭐⭐⭐⭐ Good</option>
            <option value="3">⭐⭐⭐ Average</option>
            <option value="2">⭐⭐ Poor</option>
            <option value="1">⭐ Very Poor</option>

        </select>
    </div>

    <div class="mb-6">
        <label class="font-semibold">
            Review
        </label>

        <textarea
            name="review"
            rows="5"
            class="w-full border rounded-xl p-4"
            placeholder="Share your experience..."
            required></textarea>
    </div>

    <button
        class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-xl font-bold">

        Submit Review

    </button>

</form>

@endauth

@auth

<form method="POST"
      action="{{ route('business.reviews.store', $business) }}"
      class="mb-10">

    @csrf

    <div class="mb-6">
        <label class="font-semibold">
            Rating
        </label>

        <select
            name="rating"
            class="w-full mt-2 border rounded-xl p-4"
            required>

            <option value="">Select Rating</option>
            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
            <option value="4">⭐⭐⭐⭐ Good</option>
            <option value="3">⭐⭐⭐ Average</option>
            <option value="2">⭐⭐ Poor</option>
            <option value="1">⭐ Very Poor</option>

        </select>
    </div>

    <div class="mb-6">
        <label class="font-semibold">
            Review
        </label>

        <textarea
            name="review"
            rows="5"
            class="w-full border rounded-xl p-4"
            placeholder="Share your experience..."
            required></textarea>
    </div>

    <button
        class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-xl font-bold">

        Submit Review

    </button>

</form>

@endauth

    @forelse($business->reviews()->with('user')->latest()->get() as $review)

        <div class="border-t pt-6 mt-6">

            <div class="flex justify-between">

                <div>

                    <h3 class="font-bold">

                        {{ $review->user->name }}

                    </h3>

                    <div class="text-yellow-500">

                        @for($i=1;$i<=5;$i++)

                            {{ $i <= $review->rating ? '★' : '☆' }}

                        @endfor

                    </div>

                </div>

                <span class="text-gray-400">

                    {{ $review->created_at->diffForHumans() }}

                </span>

            </div>

            <p class="mt-4 text-gray-700">

                {{ $review->review }}

            </p>

            @if($review->reply)

                <div class="mt-4 bg-sky-50 p-4 rounded-xl">

                    <strong class="text-sky-700">

                        Business Reply

                    </strong>

                    <p class="mt-2">

                        {{ $review->reply }}

                    </p>

                </div>

            @endif

        </div>

    @empty

        <div class="text-center py-12 text-gray-500">

            No reviews yet.

        </div>

    @endforelse

</div>

    </div>

</div>

</x-app-layout>