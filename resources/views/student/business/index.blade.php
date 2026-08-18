<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

        <div class="max-w-7xl mx-auto py-6 sm:py-8 lg:py-10 px-4 sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-6 sm:mb-8 lg:mb-10">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-800 leading-tight">
                    🏪 Business Marketplace
                </h1>

                <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base">
                    Discover trusted businesses around your campus.
                </p>

            </div>

            <!-- Search -->
            <form
                method="GET"
                action="{{ route('businesses.index') }}"
                class="bg-white rounded-2xl sm:rounded-3xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8 border border-slate-200">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 sm:gap-5">

                    <!-- Search Input -->
                    <div class="md:col-span-1">

                        <label
                            for="search"
                            class="block text-sm font-semibold text-gray-700 mb-2">

                            Search Business

                        </label>

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="🔍 Search business..."
                            class="w-full border border-gray-300 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-sm sm:text-base bg-white text-gray-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200">

                    </div>

                    <!-- Category -->
                    <div>

                        <label
                            for="category"
                            class="block text-sm font-semibold text-gray-700 mb-2">

                            Category

                        </label>

                        <select
                            id="category"
                            name="category"
                            class="w-full border border-gray-300 rounded-xl sm:rounded-2xl p-3 sm:p-4 text-sm sm:text-base bg-white text-gray-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200">

                            <option value="">
                                All Categories
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category }}"
                                    @selected(request('category') == $category)>

                                    {{ $category }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">

                        <button
                            type="submit"
                            class="w-full bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white rounded-xl sm:rounded-2xl py-3 sm:py-4 font-bold text-sm sm:text-base transition shadow-md">

                            🔍 Search

                        </button>

                    </div>

                </div>

            </form>

            <!-- Results Count -->
            @if($businesses->count())

                <div class="mb-5 sm:mb-6">

                    <p class="text-sm text-gray-500">

                        Showing

                        <span class="font-bold text-slate-700">
                            {{ $businesses->count() }}
                        </span>

                        {{ $businesses->count() === 1 ? 'business' : 'businesses' }}

                    </p>

                </div>

            @endif

            <!-- Business Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">

                @forelse($businesses as $business)

                    <div
                        class="bg-white rounded-2xl sm:rounded-3xl shadow-lg overflow-hidden border border-slate-200 hover:shadow-xl transition duration-300">

                        @php
                            $cover = $business->images->where('cover', true)->first();
                        @endphp

                        <!-- Cover Image -->
                        @if($cover)

                            <img
                                src="{{ asset('storage/'.$cover->image) }}"
                                alt="{{ $business->business_name }}"
                                loading="lazy"
                                class="w-full h-44 sm:h-52 object-cover">

                        @else

                            <div class="w-full h-44 sm:h-52 bg-gradient-to-br from-sky-100 to-blue-200 flex items-center justify-center">

                                <span class="text-6xl sm:text-7xl">
                                    🏪
                                </span>

                            </div>

                        @endif

                        <!-- Card Content -->
                        <div class="p-4 sm:p-6">

                            <!-- Business Identity -->
                            <div class="flex items-center gap-3 sm:gap-4">

                                @if($business->logo)

                                    <img
                                        src="{{ asset('storage/'.$business->logo) }}"
                                        alt="{{ $business->business_name }} logo"
                                        loading="lazy"
                                        class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl object-cover flex-shrink-0 border border-slate-200">

                                @else

                                    <div
                                        class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl sm:rounded-2xl bg-sky-100 border border-sky-200 flex items-center justify-center text-2xl sm:text-3xl flex-shrink-0">

                                        🏪

                                    </div>

                                @endif

                                <div class="min-w-0">

                                    <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-slate-800 truncate">

                                        {{ $business->business_name }}

                                    </h2>

                                    <p class="text-gray-500 text-sm sm:text-base truncate">

                                        {{ $business->category }}

                                    </p>

                                </div>

                            </div>

                            <!-- Business Details -->
                            <div class="mt-5 sm:mt-6 space-y-2 text-sm sm:text-base text-gray-600">

                                <p class="flex items-start gap-2">

                                    <span class="flex-shrink-0">
                                        📍
                                    </span>

                                    <span class="break-words">
                                        {{ $business->location }}
                                    </span>

                                </p>

                                <p class="flex items-center gap-2">

                                    <span>
                                        ⭐
                                    </span>

                                    <span>
                                        {{ number_format($business->rating, 1) }}
                                    </span>

                                </p>

                                <p class="flex items-center gap-2">

                                    <span>
                                        👀
                                    </span>

                                    <span>
                                        {{ number_format($business->views) }} Views
                                    </span>

                                </p>

                            </div>

                            <!-- View Button -->
                            <a
                                href="{{ route('business.preview', $business) }}"
                                class="block w-full mt-6 sm:mt-8 bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white text-center py-3 sm:py-3.5 rounded-xl sm:rounded-2xl font-bold text-sm sm:text-base transition shadow-md">

                                View Business

                            </a>

                        </div>

                    </div>

                @empty

                    <!-- Empty State -->
                    <div
                        class="col-span-full bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 p-10 sm:p-16 lg:p-20 text-center">

                        <div class="text-6xl sm:text-7xl">
                            🏪
                        </div>

                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mt-4 sm:mt-5 text-slate-800">

                            No businesses found

                        </h2>

                        <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base">

                            Try changing your search or category.

                        </p>

                        @if(request('search') || request('category'))

                            <a
                                href="{{ route('businesses.index') }}"
                                class="inline-block mt-6 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-bold transition shadow-md">

                                Clear Filters

                            </a>

                        @endif

                    </div>

                @endforelse

            </div>

            <!-- Pagination -->
            @if($businesses->hasPages())

                <div class="mt-8 sm:mt-10 overflow-x-auto">

                    <div class="min-w-max">

                        {{ $businesses->withQueryString()->links() }}

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>