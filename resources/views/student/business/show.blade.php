<x-app-layout>

<div class="min-h-screen bg-slate-100">

    {{-- Cover Photo --}}
    @php
        $cover = $business->images->where('cover', true)->first();
    @endphp

    @if($cover)
        <img
            src="{{ asset('storage/'.$cover->image) }}"
            class="w-full h-96 object-cover">
    @else
        <div class="w-full h-96 bg-gradient-to-r from-sky-400 to-blue-600"></div>
    @endif

    <div class="max-w-7xl mx-auto px-6 -mt-28 relative z-20">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Header --}}
            <div class="p-10">

                <div class="flex flex-col lg:flex-row gap-8">

                    {{-- Logo --}}
                    <div class="flex-shrink-0">

                        @if($business->logo)

                            <img
                                src="{{ asset('storage/'.$business->logo) }}"
                                class="w-44 h-44 rounded-3xl border-4 border-white shadow-xl object-cover">

                        @else

                            <div class="w-44 h-44 rounded-3xl bg-sky-100 flex items-center justify-center text-7xl">
                                🏪
                            </div>

                        @endif

                    </div>

                    {{-- Business Details --}}
                    <div class="flex-1">

                        <div class="flex justify-between items-start">

                            <div>

                                <h1 class="text-5xl font-black text-slate-800">
                                    {{ $business->business_name }}
                                </h1>

                                <p class="text-xl text-slate-500 mt-2">
                                    {{ $business->category }}
                                </p>

                            </div>

                            @if($business->status=='Approved')

                                <span class="bg-green-100 text-green-700 px-5 py-2 rounded-full font-bold">
                                    ✅ Verified
                                </span>

                            @endif

                        </div>

                        <div class="grid md:grid-cols-4 gap-4 mt-8">

                            <div class="bg-slate-100 rounded-2xl p-5 text-center">

                                <div class="text-3xl">⭐</div>

                                <div class="text-2xl font-bold mt-2">
                                    {{ number_format($business->rating,1) }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    Rating
                                </div>

                            </div>

                            <div class="bg-slate-100 rounded-2xl p-5 text-center">

                                <div class="text-3xl">👀</div>

                                <div class="text-2xl font-bold mt-2">
                                    {{ $business->views }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    Views
                                </div>

                            </div>

                            <div class="bg-slate-100 rounded-2xl p-5 text-center">

                                <div class="text-3xl">📍</div>

                                <div class="font-bold mt-2">
                                    {{ $business->location }}
                                </div>

                            </div>

                            <div class="bg-slate-100 rounded-2xl p-5 text-center">

                                <div class="text-3xl">🛍</div>

                                <div class="font-bold mt-2">
                                    {{ $business->products->count() }}
                                </div>

                                <div class="text-sm text-gray-500">
                                    Products
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <hr>
            {{-- ================= ACTION BUTTONS ================= --}}

<div class="px-10 pb-10">

    <div class="flex flex-wrap gap-5">

        <a href="#message"
           class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-4 rounded-2xl font-bold transition">

            💬 Message Business

        </a>

        <a href="#reviews"
           class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-4 rounded-2xl font-bold transition">

            ⭐ Write Review

        </a>

        @if($business->website)

            <a href="{{ $business->website }}"
               target="_blank"
               class="bg-slate-700 hover:bg-slate-800 text-white px-8 py-4 rounded-2xl font-bold transition">

                🌍 Visit Website

            </a>

        @endif

    </div>

</div>

<hr>

{{-- ================= ABOUT ================= --}}

<div class="p-10">

    <h2 class="text-3xl font-bold mb-6">

        📖 About {{ $business->business_name }}

    </h2>

    <p class="text-lg leading-9 text-slate-600">

        {{ $business->description }}

    </p>

</div>

<hr>
{{-- ================= BUSINESS GALLERY ================= --}}

<div class="p-10">

    <div class="flex items-center justify-between mb-8">

        <h2 class="text-3xl font-bold">

            🖼 Business Gallery

        </h2>

        <span class="text-slate-500">

            {{ $business->images->count() }} Photos

        </span>

    </div>

    @if($business->images->count())

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            @foreach($business->images as $image)

                <a href="{{ asset('storage/'.$image->image) }}"
                   target="_blank">

                    <img
                        src="{{ asset('storage/'.$image->image) }}"
                        class="w-full h-56 object-cover rounded-2xl shadow-md hover:shadow-2xl hover:scale-105 transition duration-300">

                </a>

            @endforeach

        </div>

    @else

        <div class="bg-slate-100 rounded-2xl p-12 text-center">

            <div class="text-7xl mb-4">
                🖼
            </div>

            <h3 class="text-2xl font-bold">

                No gallery images yet

            </h3>

            <p class="text-slate-500 mt-2">

                This business hasn't uploaded any photos.

            </p>

        </div>

    @endif

</div>

<hr>
{{-- ================= PRODUCTS & SERVICES ================= --}}

<div class="p-10">

    <div class="flex items-center justify-between mb-8">

        <h2 class="text-3xl font-bold">

            🛍 Products & Services

        </h2>

        <span class="text-slate-500">

            {{ $business->products->count() }} Items

        </span>

    </div>

    @if($business->products->count())

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($business->products as $product)

                <div class="bg-white rounded-3xl border shadow-md hover:shadow-2xl transition overflow-hidden">

                    @if($product->image)

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="w-full h-56 object-cover">

                    @else

                        <div class="h-56 bg-sky-100 flex items-center justify-center text-6xl">

                            🛍

                        </div>

                    @endif

                    <div class="p-6">

                        <h3 class="text-2xl font-bold">

                            {{ $product->name }}

                        </h3>

                        <p class="text-slate-600 mt-3 leading-7">

                            {{ $product->description }}

                        </p>

                        <div class="flex justify-between items-center mt-6">

                            <span class="text-2xl font-extrabold text-sky-700">

                                KSh {{ number_format($product->price) }}

                            </span>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <div class="bg-slate-100 rounded-3xl p-12 text-center">

            <div class="text-7xl mb-4">

                📦

            </div>

            <h3 class="text-2xl font-bold">

                No products uploaded

            </h3>

            <p class="text-slate-500 mt-3">

                This business hasn't added any products or services yet.

            </p>

        </div>

    @endif

</div>

<hr>
{{-- ================= REVIEWS ================= --}}

<div id="reviews" class="p-10">

    <div class="flex justify-between items-center mb-8">

        <h2 class="text-3xl font-bold">

            ⭐ Student Reviews

        </h2>

        <span class="bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full font-bold">

            {{ number_format($business->rating,1) }}/5

        </span>

    </div>

    {{-- Leave Review --}}

    <div class="bg-slate-100 rounded-3xl p-8 mb-10">

        <h3 class="text-2xl font-bold mb-6">

            Leave Your Review

        </h3>

        <form action="{{ route('business.reviews.store', $business) }}" method="POST">

            @csrf

            <div class="mb-6">

                <label class="font-semibold block mb-3">

                    Rating

                </label>

                <select
                    name="rating"
                    class="w-full rounded-xl border-gray-300">

                    <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
                    <option value="4">⭐⭐⭐⭐ Very Good</option>
                    <option value="3">⭐⭐⭐ Good</option>
                    <option value="2">⭐⭐ Fair</option>
                    <option value="1">⭐ Poor</option>

                </select>

            </div>

            <div class="mb-6">

                <label class="font-semibold block mb-3">

                    Review

                </label>

                <textarea
                    name="review"
                    rows="5"
                    class="w-full rounded-xl border-gray-300"
                    placeholder="Share your experience with this business..."
                    required></textarea>

            </div>

            <button
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-2xl font-bold">

                Submit Review

            </button>

        </form>

    </div>

    {{-- Existing Reviews --}}

    <div class="space-y-6">

        @forelse($business->reviews as $review)

            <div class="bg-white rounded-2xl shadow p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <h4 class="font-bold">

                            {{ $review->user->name }}

                        </h4>

                        <p class="text-yellow-500">

                            {{ str_repeat('⭐',$review->rating) }}

                        </p>

                    </div>

                    <span class="text-sm text-gray-500">

                        {{ $review->created_at->diffForHumans() }}

                    </span>

                </div>

                <p class="mt-5 text-slate-600 leading-7">

                    {{ $review->review }}

                </p>

            </div>

        @empty

            <div class="bg-slate-100 rounded-3xl p-12 text-center">

                <div class="text-7xl mb-4">

                    ⭐

                </div>

                <h3 class="text-2xl font-bold">

                    No reviews yet

                </h3>

                <p class="text-slate-500 mt-3">

                    Be the first student to review this business.

                </p>

            </div>

        @endforelse
    </div>

</div>   {{-- END Reviews Section --}}

<hr>

{{-- ================= CONTACT BUSINESS ================= --}}

<div id="message" class="p-10">

    <h2 class="text-3xl font-bold mb-8">
        💬 Contact Business
    </h2>

    <div class="grid lg:grid-cols-2 gap-10">

        {{-- Contact Information --}}
        <div>

            <div class="bg-slate-100 rounded-3xl p-8">

                <h3 class="text-2xl font-bold mb-6">
                    Contact Information
                </h3>

                <div class="space-y-5 text-lg">

                    <p>📞 <strong>Phone:</strong> {{ $business->phone ?? 'Not provided' }}</p>

                    <p>💬 <strong>WhatsApp:</strong> {{ $business->whatsapp ?? 'Not provided' }}</p>

                    <p>📧 <strong>Email:</strong> {{ $business->email ?? 'Not provided' }}</p>

                    <p>🌍 <strong>Website:</strong>
                        @if($business->website)
                            <a href="{{ $business->website }}"
                               target="_blank"
                               class="text-sky-600 hover:underline">
                                {{ $business->website }}
                            </a>
                        @else
                            Not provided
                        @endif
                    </p>

                    <p>📍 <strong>Location:</strong> {{ $business->location }}</p>

                </div>

            </div>

        </div>

        {{-- Message Form --}}
        <div>

            <div class="bg-white border rounded-3xl shadow-lg p-8">

                <h3 class="text-2xl font-bold mb-6">
                    Send a Message
                </h3>

                @if(session('success'))

                    <div class="mb-5 bg-green-100 text-green-700 p-4 rounded-xl">
                        {{ session('success') }}
                    </div>

                @endif

                <form action="{{ route('messages.store', $business) }}" method="POST">

                    @csrf

                    <textarea
                        name="message"
                        rows="8"
                        class="w-full rounded-2xl border border-gray-300 p-5 focus:ring-2 focus:ring-sky-500"
                        placeholder="Write your message to this business..."
                        required></textarea>

                    <button
                        type="submit"
                        class="mt-6 w-full bg-sky-600 hover:bg-sky-700 text-white py-4 rounded-2xl font-bold">

                        📩 Send Message

                    </button>

                               </form>

            </div>

        </div>

    </div>

</div>

        </div>

    </div>

</div>

</x-app-layout>