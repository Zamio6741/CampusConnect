@extends('layouts.admin')

@section('title', 'Marketplace')

@section('content')

<div class="space-y-6">

{{-- HEADER --}}
<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

    <div class="min-w-0">

        <h1 class="text-2xl sm:text-3xl font-bold text-slate-800">
            Marketplace Management
        </h1>

        <p class="text-slate-500 mt-1 text-sm sm:text-base">
            Manage student marketplace listings.
        </p>

    </div>

    <a
        href="{{ route('marketplace.index') }}"
        target="_blank"
        class="w-full lg:w-auto inline-flex items-center justify-center
               bg-orange-600 hover:bg-orange-700
               text-white px-5 py-3 rounded-xl
               font-semibold transition">

        🛒 View Marketplace

    </a>

</div>


{{-- SUCCESS MESSAGE --}}
@if(session('success'))

    <div class="bg-green-100 border border-green-300 text-green-700
                px-4 sm:px-5 py-4 rounded-xl text-sm sm:text-base">

        {{ session('success') }}

    </div>

@endif


{{-- STATISTICS --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-3 sm:gap-5">

    {{-- Total --}}
    <div class="bg-white rounded-2xl shadow border-l-4 border-orange-500 p-4 sm:p-6">

        <p class="text-slate-500 text-xs sm:text-sm">
            Total Listings
        </p>

        <h2 class="text-2xl sm:text-4xl font-bold text-orange-600 mt-2">
            {{ number_format($totalListings) }}
        </h2>

    </div>


    {{-- Available --}}
    <div class="bg-white rounded-2xl shadow border-l-4 border-green-500 p-4 sm:p-6">

        <p class="text-slate-500 text-xs sm:text-sm">
            Available
        </p>

        <h2 class="text-2xl sm:text-4xl font-bold text-green-600 mt-2">
            {{ number_format($availableListings) }}
        </h2>

    </div>


    {{-- Sold --}}
    <div class="bg-white rounded-2xl shadow border-l-4 border-red-500 p-4 sm:p-6">

        <p class="text-slate-500 text-xs sm:text-sm">
            Sold
        </p>

        <h2 class="text-2xl sm:text-4xl font-bold text-red-600 mt-2">
            {{ number_format($soldListings) }}
        </h2>

    </div>


    {{-- Monthly --}}
    <div class="bg-white rounded-2xl shadow border-l-4 border-blue-500 p-4 sm:p-6">

        <p class="text-slate-500 text-xs sm:text-sm">
            This Month
        </p>

        <h2 class="text-2xl sm:text-4xl font-bold text-blue-600 mt-2">
            {{ number_format($monthlyListings) }}
        </h2>

    </div>

</div>


{{-- SEARCH & FILTERS --}}
<div class="bg-white rounded-2xl shadow p-4 sm:p-6">

    <form method="GET"
          action="{{ route('admin.marketplace') }}">

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">

            {{-- Search --}}
            <div class="lg:col-span-2">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search listing, seller or location..."
                    class="w-full border border-slate-300
                           rounded-xl px-4 py-3
                           text-sm sm:text-base
                           focus:ring-2 focus:ring-orange-500
                           focus:outline-none">

            </div>


            {{-- Category --}}
            <div>

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Category
                </label>

                <select
                    name="category"
                    class="w-full border border-slate-300
                           rounded-xl px-4 py-3
                           text-sm sm:text-base">

                    <option value="">
                        All Categories
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category }}"
                            @selected(request('category') === $category)>

                            {{ $category }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Status --}}
            <div>

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full border border-slate-300
                           rounded-xl px-4 py-3
                           text-sm sm:text-base">

                    <option value="">
                        All Listings
                    </option>

                    <option value="available"
                        @selected(request('status') === 'available')>

                        Available

                    </option>

                    <option value="sold"
                        @selected(request('status') === 'sold')>

                        Sold

                    </option>

                </select>

            </div>

        </div>


        {{-- FILTER BUTTONS --}}
        <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3 sm:flex">

            <button
                type="submit"
                class="w-full sm:w-auto
                       bg-orange-600 hover:bg-orange-700
                       text-white px-6 py-3
                       rounded-xl font-semibold
                       transition">

                🔍 Search

            </button>


            <a
                href="{{ route('admin.marketplace') }}"
                class="w-full sm:w-auto
                       bg-slate-500 hover:bg-slate-600
                       text-white px-6 py-3
                       rounded-xl font-semibold
                       text-center transition">

                Reset

            </a>

        </div>

    </form>

</div>


{{-- LISTINGS CONTAINER --}}
<div class="bg-white rounded-2xl shadow overflow-hidden">

    {{-- HEADER --}}
    <div class="px-4 sm:px-6 py-5 border-b">

        <div class="flex flex-col sm:flex-row
                    sm:items-center sm:justify-between gap-2">

            <div>

                <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                    Marketplace Listings
                </h2>

                <p class="text-sm text-slate-500 mt-1">

                    Showing {{ $items->count() }}
                    of {{ $items->total() }}

                </p>

            </div>

            {{-- Desktop hint --}}
            <div class="hidden md:block text-sm text-slate-400">
                Manage listings below
            </div>

        </div>

    </div>


    {{-- =========================================================
         DESKTOP TABLE
    ========================================================== --}}

    <div class="hidden md:block overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-100">

                <tr class="text-left text-slate-700">

                    <th class="px-6 py-4">
                        Item
                    </th>

                    <th class="px-6 py-4">
                        Seller
                    </th>

                    <th class="px-6 py-4">
                        Category
                    </th>

                    <th class="px-6 py-4">
                        Price
                    </th>

                    <th class="px-6 py-4">
                        Location
                    </th>

                    <th class="px-6 py-4">
                        Status
                    </th>

                    <th class="px-6 py-4 text-center">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse($items as $item)

                    <tr class="border-b hover:bg-slate-50 transition">

                        {{-- ITEM --}}
                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                <div class="w-16 h-16 rounded-xl overflow-hidden
                                            bg-orange-100 flex-shrink-0">

                                    @if($item->images->count())

                                        <img
                                            src="{{ asset('storage/'.$item->images->first()->image) }}"
                                            alt="{{ $item->title }}"
                                            class="w-full h-full object-cover">

                                    @else

                                        <div class="w-full h-full flex items-center justify-center text-2xl">
                                            🛒
                                        </div>

                                    @endif

                                </div>

                                <div class="min-w-0">

                                    <div class="font-bold text-slate-800 truncate max-w-xs">
                                        {{ $item->title }}
                                    </div>

                                    <div class="text-sm text-slate-500">
                                        {{ $item->condition }}
                                    </div>

                                </div>

                            </div>

                        </td>


                        {{-- SELLER --}}
                        <td class="px-6 py-4">

                            <div class="font-semibold">
                                {{ $item->user?->name ?? 'Unknown' }}
                            </div>

                            <div class="text-sm text-slate-500">
                                {{ $item->user?->email ?? 'N/A' }}
                            </div>

                        </td>


                        {{-- CATEGORY --}}
                        <td class="px-6 py-4">

                            <span class="bg-orange-100 text-orange-700
                                         px-3 py-1 rounded-full
                                         text-sm font-semibold">

                                {{ $item->category }}

                            </span>

                        </td>


                        {{-- PRICE --}}
                        <td class="px-6 py-4 font-bold text-green-600 whitespace-nowrap">

                            KSh {{ number_format($item->price) }}

                        </td>


                        {{-- LOCATION --}}
                        <td class="px-6 py-4 text-slate-600">
                            {{ $item->location ?? 'N/A' }}
                        </td>


                        {{-- STATUS --}}
                        <td class="px-6 py-4">

                            @if($item->sold)

                                <span class="bg-red-100 text-red-700
                                             px-3 py-1 rounded-full
                                             text-sm font-semibold">

                                    Sold

                                </span>

                            @else

                                <span class="bg-green-100 text-green-700
                                             px-3 py-1 rounded-full
                                             text-sm font-semibold">

                                    Available

                                </span>

                            @endif

                        </td>


                        {{-- ACTIONS --}}
                        <td class="px-6 py-4">

                            <div class="flex flex-wrap justify-center gap-2">

                                <a
                                    href="{{ route('admin.marketplace.show', $item) }}"
                                    class="bg-blue-600 hover:bg-blue-700
                                           text-white px-3 py-2
                                           rounded-lg text-sm">

                                    View

                                </a>


                                @if($item->sold)

                                    <form
                                        action="{{ route('admin.marketplace.available', $item) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="bg-green-600 hover:bg-green-700
                                                   text-white px-3 py-2
                                                   rounded-lg text-sm">

                                            Available

                                        </button>

                                    </form>

                                @else

                                    <form
                                        action="{{ route('admin.marketplace.sold', $item) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            onclick="return confirm('Mark this item as sold?')"
                                            class="bg-yellow-500 hover:bg-yellow-600
                                                   text-white px-3 py-2
                                                   rounded-lg text-sm">

                                            Sold

                                        </button>

                                    </form>

                                @endif


                                <form
                                    action="{{ route('admin.marketplace.destroy', $item) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this marketplace listing permanently?')"
                                        class="bg-red-600 hover:bg-red-700
                                               text-white px-3 py-2
                                               rounded-lg text-sm">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-16 text-slate-500">

                            <div class="text-6xl mb-4">
                                🛒
                            </div>

                            <div class="text-xl font-semibold">
                                No marketplace listings found.
                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- =========================================================
         MOBILE LISTING CARDS
    ========================================================== --}}

    <div class="md:hidden divide-y divide-slate-200">

        @forelse($items as $item)

            <div class="p-4 sm:p-5">

                {{-- TOP --}}
                <div class="flex items-start gap-3">

                    {{-- IMAGE --}}
                    <div class="w-20 h-20 sm:w-24 sm:h-24
                                rounded-2xl overflow-hidden
                                bg-orange-100 flex-shrink-0">

                        @if($item->images->count())

                            <img
                                src="{{ asset('storage/'.$item->images->first()->image) }}"
                                alt="{{ $item->title }}"
                                class="w-full h-full object-cover">

                        @else

                            <div class="w-full h-full
                                        flex items-center justify-center
                                        text-3xl">

                                🛒

                            </div>

                        @endif

                    </div>


                    {{-- ITEM DETAILS --}}
                    <div class="flex-1 min-w-0">

                        <div class="flex items-start justify-between gap-2">

                            <h3 class="font-bold text-slate-800
                                       text-base sm:text-lg
                                       leading-tight">

                                {{ $item->title }}

                            </h3>


                            @if($item->sold)

                                <span class="flex-shrink-0
                                             bg-red-100 text-red-700
                                             px-2 py-1 rounded-full
                                             text-xs font-bold">

                                    Sold

                                </span>

                            @else

                                <span class="flex-shrink-0
                                             bg-green-100 text-green-700
                                             px-2 py-1 rounded-full
                                             text-xs font-bold">

                                    Available

                                </span>

                            @endif

                        </div>


                        <p class="text-sm text-slate-500 mt-1">
                            {{ $item->condition }}
                        </p>


                        <p class="text-lg sm:text-xl
                                  font-bold text-green-600 mt-2">

                            KSh {{ number_format($item->price) }}

                        </p>

                    </div>

                </div>


                {{-- INFORMATION --}}
                <div class="grid grid-cols-2 gap-3 mt-4">

                    <div class="bg-slate-50 rounded-xl p-3">

                        <p class="text-xs text-slate-400 uppercase font-bold">
                            Category
                        </p>

                        <p class="text-sm font-semibold text-slate-700 mt-1 truncate">

                            {{ $item->category }}

                        </p>

                    </div>


                    <div class="bg-slate-50 rounded-xl p-3">

                        <p class="text-xs text-slate-400 uppercase font-bold">
                            Location
                        </p>

                        <p class="text-sm font-semibold text-slate-700 mt-1 truncate">

                            {{ $item->location ?? 'N/A' }}

                        </p>

                    </div>


                    <div class="bg-slate-50 rounded-xl p-3 col-span-2">

                        <p class="text-xs text-slate-400 uppercase font-bold">
                            Seller
                        </p>

                        <p class="text-sm font-semibold text-slate-700 mt-1">

                            {{ $item->user?->name ?? 'Unknown' }}

                        </p>

                        <p class="text-xs text-slate-500 mt-0.5 break-all">

                            {{ $item->user?->email ?? 'N/A' }}

                        </p>

                    </div>

                </div>


                {{-- ACTIONS --}}
                <div class="grid grid-cols-2 gap-2 mt-4">

                    <a
                        href="{{ route('admin.marketplace.show', $item) }}"
                        class="inline-flex items-center justify-center
                               bg-blue-600 hover:bg-blue-700
                               text-white px-3 py-3
                               rounded-xl text-sm font-semibold">

                        👁 View

                    </a>


                    @if($item->sold)

                        <form
                            action="{{ route('admin.marketplace.available', $item) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                class="w-full bg-green-600 hover:bg-green-700
                                       text-white px-3 py-3
                                       rounded-xl text-sm font-semibold">

                                ✓ Available

                            </button>

                        </form>

                    @else

                        <form
                            action="{{ route('admin.marketplace.sold', $item) }}"
                            method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                onclick="return confirm('Mark this item as sold?')"
                                class="w-full bg-yellow-500 hover:bg-yellow-600
                                       text-white px-3 py-3
                                       rounded-xl text-sm font-semibold">

                                ✓ Mark Sold

                            </button>

                        </form>

                    @endif


                    <form
                        action="{{ route('admin.marketplace.destroy', $item) }}"
                        method="POST"
                        class="col-span-2">

                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Delete this marketplace listing permanently?')"
                            class="w-full bg-red-600 hover:bg-red-700
                                   text-white px-3 py-3
                                   rounded-xl text-sm font-semibold">

                            🗑 Delete Listing

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="text-center py-16 px-5 text-slate-500">

                <div class="text-5xl sm:text-6xl mb-4">
                    🛒
                </div>

                <div class="text-lg sm:text-xl font-semibold">
                    No marketplace listings found.
                </div>

            </div>

        @endforelse

    </div>


    {{-- PAGINATION --}}
    <div class="px-4 sm:px-6 py-5 border-t overflow-x-auto">

        {{ $items->links() }}

    </div>

</div>


</div>

@endsection