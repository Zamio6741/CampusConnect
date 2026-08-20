<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100">

    <div class="max-w-7xl mx-auto px-3 sm:px-5 lg:px-8 py-5 sm:py-8 lg:py-10">

        <!-- ========================================================= -->
        <!-- HEADER -->
        <!-- ========================================================= -->

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-6 sm:mb-8 lg:mb-10">

            <div>

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-800 flex items-center gap-2 sm:gap-3">

                    <span>⭐</span>

                    <span>Customer Reviews</span>

                </h1>

                <p class="text-gray-500 mt-2 text-sm sm:text-base lg:text-lg">

                    Monitor customer feedback, ratings and replies.

                </p>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- STATISTICS CARDS -->
        <!-- ========================================================= -->

        @php

            $positive = $reviews->where('rating', '>=', 4)->count();

            $positivePercent = $reviews->count()
                ? round(($positive / $reviews->count()) * 100)
                : 0;

            $pendingReplies = $reviews->whereNull('reply')->count();

        @endphp


        <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-3 sm:gap-5">

            <!-- Average Rating -->

            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition p-4 sm:p-6 lg:p-7">

                <div class="flex items-center justify-between gap-2">

                    <p class="text-xs sm:text-sm font-semibold text-gray-500">
                        Average Rating
                    </p>

                    <span class="text-lg sm:text-xl">
                        ⭐
                    </span>

                </div>

                <div class="flex items-end gap-2 mt-3 sm:mt-4">

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black text-yellow-500">

                        {{ number_format($averageRating, 1) }}

                    </h2>

                    <span class="text-gray-400 text-xs sm:text-sm mb-1">
                        / 5
                    </span>

                </div>

            </div>


            <!-- Total Reviews -->

            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition p-4 sm:p-6 lg:p-7">

                <p class="text-xs sm:text-sm font-semibold text-gray-500">
                    Total Reviews
                </p>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-slate-800">

                    {{ $totalReviews }}

                </h2>

            </div>


            <!-- Positive Reviews -->

            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition p-4 sm:p-6 lg:p-7">

                <p class="text-xs sm:text-sm font-semibold text-gray-500">
                    Positive Reviews
                </p>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-green-600">

                    {{ $positivePercent }}%

                </h2>

            </div>


            <!-- Pending Replies -->

            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition p-4 sm:p-6 lg:p-7">

                <p class="text-xs sm:text-sm font-semibold text-gray-500">
                    Pending Replies
                </p>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-red-500">

                    {{ $pendingReplies }}

                </h2>

            </div>


            <!-- Five Star -->

            <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition p-4 sm:p-6 lg:p-7 col-span-2 lg:col-span-1">

                <p class="text-xs sm:text-sm font-semibold text-gray-500">
                    5★ Reviews
                </p>

                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-sky-600">

                    {{ $fiveStar }}

                </h2>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- SEARCH & FILTERS -->
        <!-- ========================================================= -->

        <div class="mt-6 sm:mt-8 lg:mt-10 bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm p-4 sm:p-6 lg:p-7">

            <div class="flex flex-col xl:flex-row gap-5 xl:items-center xl:justify-between">


                <!-- Search -->

                <form
                    method="GET"
                    class="w-full xl:max-w-md">

                    @if(request('rating'))
                        <input
                            type="hidden"
                            name="rating"
                            value="{{ request('rating') }}">
                    @endif

                    @if(request('sort'))
                        <input
                            type="hidden"
                            name="sort"
                            value="{{ request('sort') }}">
                    @endif

                    <label
                        for="review-search"
                        class="block text-sm font-semibold text-slate-700 mb-2">

                        Search Reviews

                    </label>

                    <div class="relative">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                            🔍
                        </span>

                        <input
                            id="review-search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search customer or review..."
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-slate-300 bg-white pl-11 pr-4 py-3 sm:py-3.5 text-sm sm:text-base focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">

                    </div>

                </form>


                <!-- Rating Filter -->

                <div class="w-full xl:flex-1">

                    <p class="block text-sm font-semibold text-slate-700 mb-2">

                        Filter by Rating

                    </p>

                    <div class="flex flex-wrap gap-2">

                        <a
                            href="{{ route('business.reviews') }}"
                            class="{{ request('rating') == '' ? 'bg-sky-600 text-white border-sky-600' : 'bg-white text-slate-700 border-slate-300 hover:border-sky-400 hover:bg-sky-50' }}
                            inline-flex items-center justify-center px-4 py-2.5 rounded-xl border-2 font-semibold text-sm transition">

                            All

                        </a>

                        @for($i = 5; $i >= 1; $i--)

                            <a
                                href="?rating={{ $i }}{{ request('search') ? '&search='.urlencode(request('search')) : '' }}"
                                class="{{ request('rating') == $i ? 'bg-yellow-500 text-white border-yellow-500' : 'bg-white text-slate-700 border-slate-300 hover:border-yellow-400 hover:bg-yellow-50' }}
                                inline-flex items-center justify-center px-4 py-2.5 rounded-xl border-2 font-semibold text-sm transition">

                                {{ $i }}★

                            </a>

                        @endfor

                    </div>

                </div>


                <!-- Sort -->

                <div class="w-full xl:w-auto">

                    <label
                        for="review-sort"
                        class="block text-sm font-semibold text-slate-700 mb-2">

                        Sort Reviews

                    </label>

                    <form method="GET">

                        @if(request('search'))
                            <input
                                type="hidden"
                                name="search"
                                value="{{ request('search') }}">
                        @endif

                        @if(request('rating'))
                            <input
                                type="hidden"
                                name="rating"
                                value="{{ request('rating') }}">
                        @endif

                        <select
                            id="review-sort"
                            name="sort"
                            onchange="this.form.submit()"
                            class="w-full xl:min-w-[180px] rounded-xl border-2 border-slate-300 bg-white px-4 py-3 text-sm sm:text-base text-slate-700 focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none">

                            <option
                                value="latest"
                                {{ request('sort') == 'latest' ? 'selected' : '' }}>

                                Newest

                            </option>

                            <option
                                value="oldest"
                                {{ request('sort') == 'oldest' ? 'selected' : '' }}>

                                Oldest

                            </option>

                            <option
                                value="highest"
                                {{ request('sort') == 'highest' ? 'selected' : '' }}>

                                Highest Rating

                            </option>

                            <option
                                value="lowest"
                                {{ request('sort') == 'lowest' ? 'selected' : '' }}>

                                Lowest Rating

                            </option>

                        </select>

                    </form>

                </div>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- RATING DISTRIBUTION -->
        <!-- ========================================================= -->

        <div class="mt-6 sm:mt-8 lg:mt-10 bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm p-5 sm:p-7 lg:p-8">

            <div class="flex items-center justify-between mb-6 sm:mb-8">

                <div>

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">

                        ⭐ Rating Distribution

                    </h2>

                    <p class="text-xs sm:text-sm text-gray-500 mt-1">

                        Overview of your customer ratings.

                    </p>

                </div>

            </div>


            @for($i = 5; $i >= 1; $i--)

                @php

                    $count = $distribution[$i] ?? 0;

                    $percentage = $totalReviews > 0
                        ? ($count / $totalReviews) * 100
                        : 0;

                @endphp

                <div class="flex items-center gap-2 sm:gap-4 mb-4 last:mb-0">

                    <div class="w-10 sm:w-12 text-sm sm:text-base font-bold text-slate-700 shrink-0">

                        {{ $i }}★

                    </div>

                    <div class="flex-1 h-3 sm:h-4 bg-slate-200 border border-slate-300 rounded-full overflow-hidden">

                        <div
                            class="h-full bg-yellow-400 rounded-full transition-all duration-500"
                            style="width: {{ $percentage }}%">

                        </div>

                    </div>

                    <div class="w-8 sm:w-12 text-right text-sm sm:text-base font-bold text-slate-700">

                        {{ $count }}

                    </div>

                </div>

            @endfor

        </div>


        <!-- ========================================================= -->
        <!-- REVIEWS -->
        <!-- ========================================================= -->

        <div class="mt-6 sm:mt-8 lg:mt-10 space-y-5 sm:space-y-6">

            @forelse($reviews as $review)

                <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition overflow-hidden">

                    <div class="p-5 sm:p-7 lg:p-8">


                        <!-- Review Header -->

                        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">

                            <div class="flex items-start gap-3 sm:gap-4 min-w-0">

                                <!-- Avatar -->

                                <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-full bg-sky-100 border border-sky-200 flex items-center justify-center text-xl sm:text-2xl shrink-0">

                                    👤

                                </div>


                                <!-- Customer -->

                                <div class="min-w-0">

                                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-slate-800 truncate">

                                        {{ $review->user->name }}

                                    </h2>

                                    <div class="flex items-center gap-1 mt-1 text-lg sm:text-xl text-yellow-400">

                                        @for($i = 1; $i <= 5; $i++)

                                            {!! $i <= $review->rating ? '★' : '☆' !!}

                                        @endfor

                                    </div>

                                    <p class="text-xs sm:text-sm text-gray-400 mt-1">

                                        {{ $review->created_at->timezone('Africa/Nairobi')->format('d M Y • h:i A') }}

                                    </p>

                                </div>

                            </div>


                            <!-- Rating Badge -->

                            <span class="self-start inline-flex items-center bg-sky-50 text-sky-700 border border-sky-200 px-3 sm:px-4 py-2 rounded-full font-bold text-xs sm:text-sm whitespace-nowrap">

                                {{ $review->rating }}/5

                            </span>

                        </div>


                        <!-- Divider -->

                        <div class="border-t border-slate-200 my-5 sm:my-6"></div>


                        <!-- Review Text -->

                        <div>

                            <p class="text-sm sm:text-base lg:text-lg leading-7 sm:leading-8 text-gray-700 whitespace-pre-wrap break-words">

                                {{ $review->review }}

                            </p>

                        </div>


                        <!-- Business Reply -->

                        @if($review->reply)

                            <div class="mt-6 sm:mt-7 bg-sky-50 border border-sky-200 border-l-4 border-l-sky-500 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                                <div class="flex items-center gap-2">

                                    <span class="text-lg">
                                        🏪
                                    </span>

                                    <h3 class="font-bold text-sky-700 text-sm sm:text-base">

                                        Business Reply

                                    </h3>

                                </div>

                                <p class="mt-2 sm:mt-3 text-sm sm:text-base text-gray-700 leading-6 sm:leading-7 whitespace-pre-wrap break-words">

                                    {{ $review->reply }}

                                </p>

                            </div>

                        @else

                            <!-- Reply Form -->

                            <div class="mt-6 sm:mt-7 pt-5 sm:pt-6 border-t border-slate-200">

                                <form
                                    method="POST"
                                    action="{{ route('business.reviews.reply', $review) }}">

                                    @csrf

                                    <label
                                        for="reply-{{ $review->id }}"
                                        class="block text-sm font-semibold text-slate-700 mb-2">

                                        Reply to Customer

                                    </label>

                                    <textarea
                                        id="reply-{{ $review->id }}"
                                        name="reply"
                                        rows="3"
                                        class="w-full rounded-xl sm:rounded-2xl border-2 border-slate-300 bg-white px-4 py-3 text-sm sm:text-base text-slate-800 placeholder-gray-400 focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none resize-y transition"
                                        placeholder="Write a professional reply to this customer..."
                                        required></textarea>

                                    <div class="mt-3 sm:mt-4 flex justify-end">

                                        <button
                                            type="submit"
                                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white px-6 sm:px-8 py-3 rounded-xl font-bold text-sm sm:text-base border border-sky-700 shadow-sm hover:shadow transition">

                                            💬 Reply

                                        </button>

                                    </div>

                                </form>

                            </div>

                        @endif

                    </div>

                </div>

            @empty

                <!-- Empty State -->

                <div class="bg-white rounded-2xl sm:rounded-3xl border border-slate-200 shadow-sm py-16 sm:py-20 lg:py-24 px-5 text-center">

                    <div class="text-6xl sm:text-7xl lg:text-8xl">

                        ⭐

                    </div>

                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mt-5 sm:mt-6 text-slate-800">

                        No Reviews Yet

                    </h2>

                    <p class="text-gray-500 mt-3 text-sm sm:text-base lg:text-lg">

                        Customers haven't reviewed your business yet.

                    </p>

                </div>

            @endforelse

        </div>


        <!-- ========================================================= -->
        <!-- PAGINATION -->
        <!-- ========================================================= -->

        @if(method_exists($reviews, 'links'))

            <div class="mt-8 sm:mt-10 overflow-x-auto">

                {{ $reviews->links() }}

            </div>

        @endif

    </div>

</div>

</x-business-layout>