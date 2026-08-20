<x-business-layout>
    <div class="bg-red-600 text-white text-2xl sm:text-4xl p-5 sm:p-8 text-center">
        TEST VIEW LOADED
    </div>

    <div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

        {{-- Cover Image --}}
        <div class="relative h-[220px] sm:h-[300px] lg:h-[380px] overflow-hidden">

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

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Business Header --}}
            <div class="relative -mt-16 sm:-mt-20 lg:-mt-24">

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl p-4 sm:p-6 lg:p-8">

                    <div class="flex flex-col lg:flex-row gap-5 sm:gap-8">

                        {{-- Logo --}}
                        <div class="shrink-0 flex justify-center lg:justify-start">

                            @if($business->logo)

                                <img
                                    src="{{ asset('storage/'.$business->logo) }}"
                                    class="w-28 h-28 sm:w-36 sm:h-36 lg:w-40 lg:h-40 rounded-2xl sm:rounded-3xl object-cover border-4 sm:border-8 border-white shadow-xl">

                            @else

                                <div class="w-28 h-28 sm:w-36 sm:h-36 lg:w-40 lg:h-40 rounded-2xl sm:rounded-3xl bg-sky-100 flex items-center justify-center text-5xl sm:text-6xl lg:text-7xl">

                                    🏪

                                </div>

                            @endif

                        </div>

                        {{-- Business Info --}}
                        <div class="flex-1 min-w-0 text-center lg:text-left">

                            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold break-words">

                                {{ $business->business_name }}

                            </h1>

                            <p class="text-gray-500 mt-2 text-base sm:text-lg">

                                {{ $business->category }}

                            </p>

                            <div class="flex flex-wrap justify-center lg:justify-start gap-2 sm:gap-4 mt-5 sm:mt-6">

                                <span class="bg-sky-100 text-sky-700 px-3 sm:px-5 py-2 rounded-full text-sm sm:text-base max-w-full break-words">
                                    📍 {{ $business->location }}
                                </span>

                                <span class="bg-yellow-100 text-yellow-700 px-3 sm:px-5 py-2 rounded-full text-sm sm:text-base">
                                    ⭐ {{ number_format($business->rating,1) }}
                                </span>

                                <span class="bg-green-100 text-green-700 px-3 sm:px-5 py-2 rounded-full text-sm sm:text-base">
                                    👀 {{ $business->views }} Views
                                </span>

                                <span class="bg-purple-100 text-purple-700 px-3 sm:px-5 py-2 rounded-full text-sm sm:text-base">
                                    {{ $business->status }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            {{-- Description --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl mt-6 sm:mt-10 p-5 sm:p-8">

                <h2 class="text-2xl sm:text-3xl font-bold mb-4 sm:mb-6">

                    About

                </h2>

                <p class="text-base sm:text-lg text-gray-600 leading-7 sm:leading-8 break-words">

                    {{ $business->description }}

                </p>

            </div>

            {{-- Contact --}}
            <div class="grid lg:grid-cols-2 gap-5 sm:gap-8 mt-6 sm:mt-10">

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-8">

                    <h2 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6">

                        Contact Information

                    </h2>

                    <div class="space-y-4 sm:space-y-5 break-words">

                        <p>
                            <strong>📞 Phone:</strong>
                            <span class="break-all">{{ $business->phone }}</span>
                        </p>

                        <p>
                            <strong>💬 WhatsApp:</strong>
                            <span class="break-all">{{ $business->whatsapp }}</span>
                        </p>

                        <p>
                            <strong>📧 Email:</strong>
                            <span class="break-all">{{ $business->email }}</span>
                        </p>

                        <p>
                            <strong>🌐 Website:</strong>
                            <span class="break-all">
                                {{ $business->website ?: 'Not Available' }}
                            </span>
                        </p>

                    </div>

                </div>

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-8">

                    <h2 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6">

                        Location

                    </h2>

                    <div class="h-48 sm:h-64 rounded-2xl bg-slate-100 flex items-center justify-center text-xl sm:text-3xl text-gray-400 text-center px-4">

                        🗺 Google Map Coming Soon

                    </div>

                </div>

            </div>

            {{-- Gallery --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl mt-6 sm:mt-10 p-5 sm:p-8">

                <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8">

                    Gallery

                </h2>

                <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">

                    @forelse($business->images as $image)

                        <img
                            src="{{ asset('storage/'.$image->image) }}"
                            class="rounded-2xl shadow-lg h-56 sm:h-60 w-full object-cover hover:scale-105 transition">

                    @empty

                        <p>No gallery images yet.</p>

                    @endforelse

                </div>

            </div>

            {{-- Products --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl mt-6 sm:mt-10 p-5 sm:p-8">

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6 sm:mb-8">

                    <h2 class="text-2xl sm:text-3xl font-bold">
                        🛍 Products
                    </h2>

                    <span class="text-gray-500">
                        {{ $business->products->count() }} Products
                    </span>

                </div>

                @if($business->products->count())

                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-8">

                        @foreach($business->products as $product)

                            <div class="border rounded-2xl sm:rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition">

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/'.$product->image) }}"
                                        class="w-full h-48 sm:h-60 object-cover">

                                @else

                                    <div class="w-full h-48 sm:h-60 bg-slate-100 flex items-center justify-center text-5xl sm:text-6xl">

                                        📦

                                    </div>

                                @endif

                                <div class="p-4 sm:p-6">

                                    <div class="flex flex-col sm:flex-row justify-between items-start gap-3">

                                        <div class="min-w-0">

                                            <h3 class="text-xl sm:text-2xl font-bold break-words">

                                                {{ $product->name }}

                                            </h3>

                                            <p class="text-gray-500">

                                                {{ $product->category }}

                                            </p>

                                        </div>

                                        @if($product->featured)

                                            <span class="bg-yellow-100 text-yellow-700 px-3 py-2 rounded-full text-sm font-semibold shrink-0">

                                                ⭐ Featured

                                            </span>

                                        @endif

                                    </div>

                                    <p class="text-gray-600 mt-4 break-words">

                                        {{ $product->description }}

                                    </p>

                                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2 mt-6">

                                        <span class="text-xl sm:text-2xl font-bold text-green-600">

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

                    <div class="text-center py-12 sm:py-16">

                        <div class="text-6xl sm:text-7xl">

                            📦

                        </div>

                        <h3 class="text-2xl sm:text-3xl font-bold mt-5 sm:mt-6">

                            No Products Yet

                        </h3>

                        <p class="text-gray-500 mt-3">

                            This business hasn't added any products.

                        </p>

                    </div>

                @endif

            </div>

            {{-- Reviews --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl mt-6 sm:mt-10 mb-10 sm:mb-20 p-5 sm:p-8">

                <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8">
                    ⭐ Customer Reviews
                </h2>

                @auth

                <form method="POST"
                      action="{{ route('business.reviews.store', $business) }}"
                      class="mb-8 sm:mb-10">

                    @csrf

                    <div class="mb-5 sm:mb-6">

                        <label class="font-semibold">
                            Rating
                        </label>

                        <select
                            name="rating"
                            class="w-full mt-2 border rounded-xl p-3 sm:p-4 text-sm sm:text-base"
                            required>

                            <option value="">Select Rating</option>
                            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                            <option value="4">⭐⭐⭐⭐ Good</option>
                            <option value="3">⭐⭐⭐ Average</option>
                            <option value="2">⭐⭐ Poor</option>
                            <option value="1">⭐ Very Poor</option>

                        </select>

                    </div>

                    <div class="mb-5 sm:mb-6">

                        <label class="font-semibold">
                            Review
                        </label>

                        <textarea
                            name="review"
                            rows="5"
                            class="w-full border rounded-xl p-3 sm:p-4 text-sm sm:text-base"
                            placeholder="Share your experience..."
                            required></textarea>

                    </div>

                    <button
                        class="w-full sm:w-auto bg-sky-600 hover:bg-sky-700 text-white px-6 sm:px-8 py-3 rounded-xl font-bold">

                        Submit Review

                    </button>

                </form>

                @endauth

                @auth

                <form method="POST"
                      action="{{ route('business.reviews.store', $business) }}"
                      class="mb-8 sm:mb-10">

                    @csrf

                    <div class="mb-5 sm:mb-6">

                        <label class="font-semibold">
                            Rating
                        </label>

                        <select
                            name="rating"
                            class="w-full mt-2 border rounded-xl p-3 sm:p-4 text-sm sm:text-base"
                            required>

                            <option value="">Select Rating</option>
                            <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                            <option value="4">⭐⭐⭐⭐ Good</option>
                            <option value="3">⭐⭐⭐ Average</option>
                            <option value="2">⭐⭐ Poor</option>
                            <option value="1">⭐ Very Poor</option>

                        </select>

                    </div>

                    <div class="mb-5 sm:mb-6">

                        <label class="font-semibold">
                            Review
                        </label>

                        <textarea
                            name="review"
                            rows="5"
                            class="w-full border rounded-xl p-3 sm:p-4 text-sm sm:text-base"
                            placeholder="Share your experience..."
                            required></textarea>

                    </div>

                    <button
                        class="w-full sm:w-auto bg-sky-600 hover:bg-sky-700 text-white px-6 sm:px-8 py-3 rounded-xl font-bold">

                        Submit Review

                    </button>

                </form>

                @endauth

                @forelse($business->reviews()->with('user')->latest()->get() as $review)

                    <div class="border-t pt-5 sm:pt-6 mt-5 sm:mt-6">

                        <div class="flex flex-col sm:flex-row justify-between gap-3">

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

                            <span class="text-gray-400 text-sm">

                                {{ $review->created_at->diffForHumans() }}

                            </span>

                        </div>

                        <p class="mt-4 text-gray-700 break-words">

                            {{ $review->review }}

                        </p>

                        @if($review->reply)

                            <div class="mt-4 bg-sky-50 p-4 rounded-xl">

                                <strong class="text-sky-700">

                                    Business Reply

                                </strong>

                                <p class="mt-2 break-words">

                                    {{ $review->reply }}

                                </p>

                            </div>

                        @endif

                    </div>

                @empty

                    <div class="text-center py-10 sm:py-12 text-gray-500">

                        No reviews yet.

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-business-layout>