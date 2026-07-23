<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100">

    <div class="max-w-7xl mx-auto px-8 py-10">

        <!-- Header -->

        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-5xl font-extrabold text-slate-800 flex items-center gap-4">

                    ⭐ Customer Reviews

                </h1>

                <p class="text-gray-500 mt-2 text-lg">

                    Monitor customer feedback, ratings and replies.

                </p>

            </div>

        </div>


        <!-- Statistics Cards -->

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

            <!-- Average Rating -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <p class="text-gray-500">

                    Average Rating

                </p>

                <div class="flex items-end gap-3 mt-4">

                    <h2 class="text-5xl font-black text-yellow-500">

                        {{ number_format($reviews->avg('rating') ?? 0,1) }}

                    </h2>

                    <span class="text-3xl">

                        ⭐

                    </span>

                </div>

            </div>


            <!-- Total Reviews -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <p class="text-gray-500">

                    Total Reviews

                </p>

                <h2 class="text-5xl font-black mt-4 text-slate-800">

                    {{ $reviews->count() }}

                </h2>

            </div>


            <!-- Positive Reviews -->

            @php
                $positive = $reviews->where('rating','>=',4)->count();

                $positivePercent = $reviews->count()
                    ? round(($positive/$reviews->count())*100)
                    : 0;
            @endphp

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <p class="text-gray-500">

                    Positive Reviews

                </p>

                <h2 class="text-5xl font-black mt-4 text-green-600">

                    {{ $positivePercent }}%

                </h2>

            </div>


            <!-- Pending Replies -->

            @php
                $pendingReplies = $reviews->whereNull('reply')->count();
            @endphp

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <p class="text-gray-500">

                    Pending Replies

                </p>

                <h2 class="text-5xl font-black mt-4 text-red-500">

                    {{ $pendingReplies }}

                </h2>

            </div>


            <!-- 5 Star Reviews -->

            <div class="bg-white rounded-3xl shadow-lg p-8">

                <p class="text-gray-500">

                    5★ Reviews

                </p>

                <h2 class="text-5xl font-black mt-4 text-sky-600">

                    {{ $reviews->where('rating',5)->count() }}

                </h2>

            </div>

        </div>

        <!-- ================= Search & Filters ================= -->

<div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

    <div class="flex flex-col lg:flex-row gap-6 justify-between items-center">

        <!-- Search -->

        <div class="w-full lg:w-1/3">

            <form method="GET">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="🔍 Search customer or review..."
                    class="w-full rounded-2xl border border-gray-300 px-6 py-4 focus:ring-2 focus:ring-sky-500 focus:outline-none">

            </form>

        </div>

        <!-- Rating Filter -->

        <div class="flex flex-wrap gap-3">

            <a href="{{ route('business.reviews') }}"
               class="{{ request('rating')=='' ? 'bg-sky-600 text-white' : 'bg-gray-100' }} px-5 py-3 rounded-xl font-semibold">
                All
            </a>

            @for($i=5;$i>=1;$i--)

                <a href="?rating={{ $i }}"
                   class="{{ request('rating')==$i ? 'bg-yellow-500 text-white' : 'bg-gray-100' }} px-5 py-3 rounded-xl font-semibold">

                    {{ $i }}★

                </a>

            @endfor

        </div>

        <!-- Sort -->

        <div>

            <form method="GET">

                <select
                    name="sort"
                    onchange="this.form.submit()"
                    class="rounded-xl border border-gray-300 px-5 py-3">

                    <option value="latest"
                        {{ request('sort')=='latest' ? 'selected' : '' }}>
                        Newest
                    </option>

                    <option value="oldest"
                        {{ request('sort')=='oldest' ? 'selected' : '' }}>
                        Oldest
                    </option>

                    <option value="highest"
                        {{ request('sort')=='highest' ? 'selected' : '' }}>
                        Highest Rating
                    </option>

                    <option value="lowest"
                        {{ request('sort')=='lowest' ? 'selected' : '' }}>
                        Lowest Rating
                    </option>

                </select>

            </form>

        </div>

    </div>

</div>


<!-- ================= Rating Distribution ================= -->

<div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

    <h2 class="text-2xl font-bold mb-8">

        ⭐ Rating Distribution

    </h2>

    @for($i=5;$i>=1;$i--)

        @php

            $count = $reviews->where('rating',$i)->count();

            $percentage = $reviews->count()
                ? ($count/$reviews->count())*100
                : 0;

        @endphp

        <div class="flex items-center gap-5 mb-5">

            <div class="w-16 font-bold">

                {{ $i }}★

            </div>

            <div class="flex-1 h-5 bg-gray-200 rounded-full overflow-hidden">

                <div
                    class="h-5 bg-yellow-400 rounded-full"
                    style="width: {{ $percentage }}%">

                </div>

            </div>

            <div class="w-12 text-right font-bold">

                {{ $count }}

            </div>

        </div>

    @endfor

</div>

<!-- ================= Reviews ================= -->

<div class="mt-10 space-y-8">

@forelse($reviews as $review)

<div class="bg-white rounded-3xl shadow-xl p-8">

    <div class="flex justify-between items-start">

        <div class="flex gap-5">

            <!-- Avatar -->

            <div class="w-16 h-16 rounded-full bg-sky-100 flex items-center justify-center text-3xl">

                👤

            </div>

            <div>

                <h2 class="text-2xl font-bold">

                    {{ $review->user->name }}

                </h2>

                <div class="flex items-center gap-1 mt-2 text-2xl text-yellow-400">

                    @for($i=1;$i<=5;$i++)

                        {!! $i <= $review->rating ? '★' : '☆' !!}

                    @endfor

                </div>

                <p class="text-gray-400 mt-2">

                    {{ $review->created_at->format('d M Y • h:i A') }}

                </p>

            </div>

        </div>

        <span class="bg-sky-100 text-sky-700 px-5 py-2 rounded-full font-semibold">

            {{ $review->rating }}/5

        </span>

    </div>


    <!-- Review -->

    <div class="mt-8">

        <p class="text-lg leading-8 text-gray-700">

            {{ $review->review }}

        </p>

    </div>


    <!-- Reply -->

    @if($review->reply)

        <div class="mt-8 ml-10 bg-sky-50 border-l-4 border-sky-500 rounded-2xl p-6">

            <h3 class="font-bold text-sky-700 text-lg">

                🏪 Business Reply

            </h3>

            <p class="mt-3 text-gray-700">

                {{ $review->reply }}

            </p>

        </div>

    @else

        <div class="mt-8">

            <form
                method="POST"
                action="{{ route('business.reviews.reply',$review) }}">

                @csrf

                <textarea
                    name="reply"
                    rows="3"
                    class="w-full rounded-2xl border border-gray-300 p-5"
                    placeholder="Write your reply..."></textarea>

                <div class="mt-4 flex justify-end">

                    <button
                        class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-xl font-bold">

                        💬 Reply

                    </button>

                </div>

            </form>

        </div>

    @endif

</div>

@empty

<div class="bg-white rounded-3xl shadow-xl py-24 text-center">

    <div class="text-8xl">

        ⭐

    </div>

    <h2 class="text-4xl font-bold mt-6">

        No Reviews Yet

    </h2>

    <p class="text-gray-500 mt-4 text-lg">

        Customers haven't reviewed your business yet.

    </p>

</div>

@endforelse

</div>


<!-- ================= Pagination ================= -->

@if(method_exists($reviews,'links'))

<div class="mt-12">

    {{ $reviews->links() }}

</div>

@endif

    </div>

</div>

</x-app-layout>