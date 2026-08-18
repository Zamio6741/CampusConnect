<x-app-layout>

    <div class="min-h-screen bg-slate-100">

        {{-- Cover Photo --}}
        @php
            $cover = $business->images->where('cover', true)->first();
        @endphp

        @if($cover)

            <img
                src="{{ asset('storage/'.$cover->image) }}"
                alt="{{ $business->business_name }}"
                loading="lazy"
                class="w-full h-56 sm:h-72 md:h-80 lg:h-96 object-cover">

        @else

            <div class="w-full h-56 sm:h-72 md:h-80 lg:h-96 bg-gradient-to-r from-sky-400 to-blue-600"></div>

        @endif


        <div class="max-w-7xl mx-auto px-3 sm:px-5 md:px-6 -mt-16 sm:-mt-20 md:-mt-28 relative z-20">

            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden">

                {{-- ================= HEADER ================= --}}
                <div class="p-5 sm:p-7 md:p-10">

                    <div class="flex flex-col lg:flex-row gap-6 md:gap-8">

                        {{-- Logo --}}
                        <div class="flex-shrink-0">

                            @if($business->logo)

                                <img
                                    src="{{ asset('storage/'.$business->logo) }}"
                                    alt="{{ $business->business_name }} logo"
                                    loading="lazy"
                                    class="w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 lg:w-44 lg:h-44 rounded-2xl sm:rounded-3xl border-4 border-white shadow-xl object-cover">

                            @else

                                <div class="w-24 h-24 sm:w-32 sm:h-32 md:w-40 md:h-40 lg:w-44 lg:h-44 rounded-2xl sm:rounded-3xl bg-sky-100 flex items-center justify-center text-5xl sm:text-6xl md:text-7xl">
                                    🏪
                                </div>

                            @endif

                        </div>


                        {{-- Business Details --}}
                        <div class="flex-1 min-w-0">

                            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">

                                <div class="min-w-0">

                                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-black text-slate-800 break-words leading-tight">
                                        {{ $business->business_name }}
                                    </h1>

                                    <p class="text-base sm:text-lg md:text-xl text-slate-500 mt-2">
                                        {{ $business->category }}
                                    </p>

                                </div>


                                @if($business->status == 'Approved')

                                    <span class="self-start whitespace-nowrap bg-green-100 text-green-700 px-4 sm:px-5 py-2 rounded-full font-bold text-sm sm:text-base">

                                        ✅ Verified

                                    </span>

                                @endif

                            </div>


                            {{-- Stats --}}
                            <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 sm:gap-4 mt-6 sm:mt-8">

                                {{-- Rating --}}
                                <div class="bg-slate-100 border border-slate-200 rounded-xl sm:rounded-2xl p-3 sm:p-5 text-center">

                                    <div class="text-2xl sm:text-3xl">
                                        ⭐
                                    </div>

                                    <div class="text-xl sm:text-2xl font-bold mt-1 sm:mt-2">
                                        {{ number_format($business->rating, 1) }}
                                    </div>

                                    <div class="text-xs sm:text-sm text-gray-500">
                                        Rating
                                    </div>

                                </div>


                                {{-- Views --}}
                                <div class="bg-slate-100 border border-slate-200 rounded-xl sm:rounded-2xl p-3 sm:p-5 text-center">

                                    <div class="text-2xl sm:text-3xl">
                                        👀
                                    </div>

                                    <div class="text-xl sm:text-2xl font-bold mt-1 sm:mt-2">
                                        {{ number_format($business->views) }}
                                    </div>

                                    <div class="text-xs sm:text-sm text-gray-500">
                                        Views
                                    </div>

                                </div>


                                {{-- Location --}}
                                <div class="bg-slate-100 border border-slate-200 rounded-xl sm:rounded-2xl p-3 sm:p-5 text-center">

                                    <div class="text-2xl sm:text-3xl">
                                        📍
                                    </div>

                                    <div class="font-bold mt-1 sm:mt-2 text-xs sm:text-sm break-words">
                                        {{ $business->location }}
                                    </div>

                                    <div class="text-xs sm:text-sm text-gray-500">
                                        Location
                                    </div>

                                </div>


                                {{-- Products --}}
                                <div class="bg-slate-100 border border-slate-200 rounded-xl sm:rounded-2xl p-3 sm:p-5 text-center">

                                    <div class="text-2xl sm:text-3xl">
                                        🛍
                                    </div>

                                    <div class="text-xl sm:text-2xl font-bold mt-1 sm:mt-2">
                                        {{ $business->products->count() }}
                                    </div>

                                    <div class="text-xs sm:text-sm text-gray-500">
                                        Products
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <hr class="border-slate-200">


                {{-- ================= ACTION BUTTONS ================= --}}
                <div class="px-5 sm:px-7 md:px-10 py-5 sm:py-7">

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 sm:gap-4">

                        <a
                            href="#message"
                            class="w-full lg:w-auto text-center bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold transition shadow-sm">

                            💬 Message Business

                        </a>


                        <a
                            href="#reviews"
                            class="w-full lg:w-auto text-center bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold transition shadow-sm">

                            ⭐ Write Review

                        </a>


                        @if($business->website)

                            <a
                                href="{{ $business->website }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-full lg:w-auto text-center bg-slate-700 hover:bg-slate-800 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold transition shadow-sm">

                                🌍 Visit Website

                            </a>

                        @endif

                    </div>

                </div>


                <hr class="border-slate-200">


                {{-- ================= ABOUT ================= --}}
                <div class="p-5 sm:p-7 md:p-10">

                    <h2 class="text-2xl sm:text-3xl font-bold mb-5 sm:mb-6 text-slate-800">
                        📖 About {{ $business->business_name }}
                    </h2>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-5 sm:p-6">

                        <p class="text-base sm:text-lg leading-7 sm:leading-9 text-slate-600 break-words">

                            {{ $business->description }}

                        </p>

                    </div>

                </div>


                <hr class="border-slate-200">


                {{-- ================= BUSINESS GALLERY ================= --}}
                <div class="p-5 sm:p-7 md:p-10">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-6 sm:mb-8">

                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-800">
                            🖼 Business Gallery
                        </h2>

                        <span class="text-slate-500 text-sm sm:text-base">
                            {{ $business->images->count() }} Photos
                        </span>

                    </div>


                    @if($business->images->count())

                        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-5">

                            @foreach($business->images as $image)

                                <a
                                    href="{{ asset('storage/'.$image->image) }}"
                                    target="_blank"
                                    rel="noopener noreferrer">

                                    <img
                                        src="{{ asset('storage/'.$image->image) }}"
                                        alt="Business gallery image"
                                        loading="lazy"
                                        class="w-full h-36 sm:h-44 md:h-52 lg:h-56 object-cover rounded-xl sm:rounded-2xl border border-slate-200 shadow-md hover:shadow-xl hover:scale-[1.02] transition duration-300">

                                </a>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-slate-100 border border-slate-200 rounded-2xl p-8 sm:p-12 text-center">

                            <div class="text-6xl sm:text-7xl mb-4">
                                🖼
                            </div>

                            <h3 class="text-xl sm:text-2xl font-bold">
                                No gallery images yet
                            </h3>

                            <p class="text-slate-500 mt-2 text-sm sm:text-base">
                                This business hasn't uploaded any photos.
                            </p>

                        </div>

                    @endif

                </div>


                <hr class="border-slate-200">


                {{-- ================= PRODUCTS & SERVICES ================= --}}
                <div class="p-5 sm:p-7 md:p-10">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-6 sm:mb-8">

                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-800">
                            🛍 Products & Services
                        </h2>

                        <span class="text-slate-500 text-sm sm:text-base">
                            {{ $business->products->count() }} Items
                        </span>

                    </div>


                    @if($business->products->count())

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-8">

                            @foreach($business->products as $product)

                                <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-md hover:shadow-xl transition overflow-hidden">

                                    @if($product->image)

                                        <img
                                            src="{{ asset('storage/'.$product->image) }}"
                                            alt="{{ $product->name }}"
                                            loading="lazy"
                                            class="w-full h-48 sm:h-52 md:h-56 object-cover">

                                    @else

                                        <div class="h-48 sm:h-52 md:h-56 bg-sky-100 flex items-center justify-center text-6xl">
                                            🛍
                                        </div>

                                    @endif


                                    <div class="p-5 sm:p-6">

                                        <h3 class="text-xl sm:text-2xl font-bold break-words text-slate-800">
                                            {{ $product->name }}
                                        </h3>

                                        <p class="text-slate-600 mt-3 leading-7 text-sm sm:text-base">
                                            {{ $product->description }}
                                        </p>

                                        <div class="flex justify-between items-center mt-5 sm:mt-6">

                                            <span class="text-xl sm:text-2xl font-extrabold text-sky-700">
                                                KSh {{ number_format($product->price) }}
                                            </span>

                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="bg-slate-100 border border-slate-200 rounded-2xl sm:rounded-3xl p-8 sm:p-12 text-center">

                            <div class="text-6xl sm:text-7xl mb-4">
                                📦
                            </div>

                            <h3 class="text-xl sm:text-2xl font-bold">
                                No products uploaded
                            </h3>

                            <p class="text-slate-500 mt-3 text-sm sm:text-base">
                                This business hasn't added any products or services yet.
                            </p>

                        </div>

                    @endif

                </div>


                <hr class="border-slate-200">


                {{-- ================= REVIEWS ================= --}}
                <div id="reviews" class="p-5 sm:p-7 md:p-10">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-6 sm:mb-8">

                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-800">
                            ⭐ Student Reviews
                        </h2>

                        <span class="self-start sm:self-auto bg-yellow-100 border border-yellow-200 text-yellow-700 px-4 sm:px-5 py-2 rounded-full font-bold">

                            {{ number_format($business->rating, 1) }}/5

                        </span>

                    </div>


                    {{-- Leave Review --}}
                    <div class="bg-slate-100 border border-slate-200 rounded-2xl sm:rounded-3xl p-5 sm:p-8 mb-8 sm:mb-10">

                        <h3 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6 text-slate-800">
                            Leave Your Review
                        </h3>


                        <form
                            action="{{ route('business.reviews.store', $business) }}"
                            method="POST">

                            @csrf


                            {{-- Rating --}}
                            <div class="mb-5 sm:mb-6">

                                <label
                                    for="rating"
                                    class="font-semibold block mb-2 sm:mb-3 text-slate-700">

                                    Rating

                                </label>

                                <select
                                    id="rating"
                                    name="rating"
                                    class="w-full rounded-xl border-2 border-gray-300 bg-white p-3 sm:p-4 text-gray-700 shadow-sm focus:border-sky-500 focus:ring-2 focus:ring-sky-200 focus:outline-none transition">

                                    <option value="5">
                                        ⭐⭐⭐⭐⭐ Excellent
                                    </option>

                                    <option value="4">
                                        ⭐⭐⭐⭐ Very Good
                                    </option>

                                    <option value="3">
                                        ⭐⭐⭐ Good
                                    </option>

                                    <option value="2">
                                        ⭐⭐ Fair
                                    </option>

                                    <option value="1">
                                        ⭐ Poor
                                    </option>

                                </select>

                            </div>


                            {{-- Review --}}
                            <div class="mb-5 sm:mb-6">

                                <label
                                    for="review"
                                    class="font-semibold block mb-2 sm:mb-3 text-slate-700">

                                    Review

                                </label>

                                <textarea
                                    id="review"
                                    name="review"
                                    rows="5"
                                    class="w-full rounded-xl border-2 border-gray-300 bg-white p-3 sm:p-4 text-gray-700 shadow-sm focus:border-sky-500 focus:ring-2 focus:ring-sky-200 focus:outline-none resize-y transition"
                                    placeholder="Share your experience with this business..."
                                    required></textarea>

                            </div>


                            <button
                                type="submit"
                                class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 active:bg-yellow-700 text-white px-7 sm:px-8 py-3 rounded-xl sm:rounded-2xl font-bold shadow-sm transition">

                                Submit Review

                            </button>

                        </form>

                    </div>


                    {{-- Existing Reviews --}}
                    <div class="space-y-5 sm:space-y-6">

                        @forelse($business->reviews as $review)

                            <div class="bg-white rounded-xl sm:rounded-2xl border border-slate-200 shadow p-5 sm:p-6">

                                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2">

                                    <div>

                                        <h4 class="font-bold text-slate-800">
                                            {{ $review->user->name }}
                                        </h4>

                                        <p class="text-yellow-500">
                                            {{ str_repeat('⭐', $review->rating) }}
                                        </p>

                                    </div>

                                    <span class="text-xs sm:text-sm text-gray-500">
                                        {{ $review->created_at->diffForHumans() }}
                                    </span>

                                </div>

                                <p class="mt-4 sm:mt-5 text-slate-600 leading-7 text-sm sm:text-base break-words">

                                    {{ $review->review }}

                                </p>

                            </div>

                        @empty

                            <div class="bg-slate-100 border border-slate-200 rounded-2xl sm:rounded-3xl p-8 sm:p-12 text-center">

                                <div class="text-6xl sm:text-7xl mb-4">
                                    ⭐
                                </div>

                                <h3 class="text-xl sm:text-2xl font-bold">
                                    No reviews yet
                                </h3>

                                <p class="text-slate-500 mt-3 text-sm sm:text-base">
                                    Be the first student to review this business.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>


                <hr class="border-slate-200">


                {{-- ================= CONTACT BUSINESS ================= --}}
                <div id="message" class="p-5 sm:p-7 md:p-10">

                    <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-8 text-slate-800">
                        💬 Contact Business
                    </h2>


                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-10">


                        {{-- Contact Information --}}
                        <div>

                            <div class="bg-slate-100 border border-slate-200 rounded-2xl sm:rounded-3xl p-5 sm:p-8">

                                <h3 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6 text-slate-800">
                                    Contact Information
                                </h3>


                                <div class="space-y-4 sm:space-y-5 text-sm sm:text-lg">

                                    <p class="break-words">
                                        📞 <strong>Phone:</strong>
                                        {{ $business->phone ?? 'Not provided' }}
                                    </p>

                                    <p class="break-words">
                                        💬 <strong>WhatsApp:</strong>
                                        {{ $business->whatsapp ?? 'Not provided' }}
                                    </p>

                                    <p class="break-words">
                                        📧 <strong>Email:</strong>
                                        {{ $business->email ?? 'Not provided' }}
                                    </p>

                                    <p class="break-words">
                                        🌍 <strong>Website:</strong>

                                        @if($business->website)

                                            <a
                                                href="{{ $business->website }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="text-sky-600 hover:underline break-all">

                                                {{ $business->website }}

                                            </a>

                                        @else

                                            Not provided

                                        @endif

                                    </p>

                                    <p class="break-words">
                                        📍 <strong>Location:</strong>
                                        {{ $business->location }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Message Form --}}
                        <div>

                            <div class="bg-white border-2 border-slate-200 rounded-2xl sm:rounded-3xl shadow-lg p-5 sm:p-8">

                                <h3 class="text-xl sm:text-2xl font-bold mb-5 sm:mb-6 text-slate-800">
                                    Send a Message
                                </h3>


                                @if(session('success'))

                                    <div class="mb-5 bg-green-100 border border-green-300 text-green-700 p-4 rounded-xl">

                                        {{ session('success') }}

                                    </div>

                                @endif


                                <form
                                    action="{{ route('messages.store', $business) }}"
                                    method="POST">

                                    @csrf


                                    <label
                                        for="message_text"
                                        class="block font-semibold text-slate-700 mb-2">

                                        Your Message

                                    </label>


                                    <textarea
                                        id="message_text"
                                        name="message"
                                        rows="7"
                                        class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white p-4 sm:p-5 text-gray-700 shadow-sm focus:border-sky-500 focus:ring-2 focus:ring-sky-200 focus:outline-none resize-y transition"
                                        placeholder="Write your message to this business..."
                                        required></textarea>


                                    <button
                                        type="submit"
                                        class="mt-5 sm:mt-6 w-full bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white py-3.5 sm:py-4 rounded-xl sm:rounded-2xl font-bold shadow-sm transition">

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