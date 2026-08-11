@extends('layouts.admin')

@section('title', 'Marketplace')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Marketplace Management
            </h1>

            <p class="text-slate-500 mt-1">
                Manage student marketplace listings.
            </p>
        </div>

       <a href="{{ route('marketplace.index') }}"
   target="_blank"
           class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-3 rounded-xl font-semibold transition">

            View Marketplace
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl">
            {{ session('success') }}
        </div>

    @endif


    {{-- STATISTICS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        <div class="bg-white rounded-2xl shadow border-l-4 border-orange-500 p-6">

            <p class="text-slate-500">
                Total Listings
            </p>

            <h2 class="text-4xl font-bold text-orange-600 mt-2">
                {{ number_format($totalListings) }}
            </h2>

        </div>


        <div class="bg-white rounded-2xl shadow border-l-4 border-green-500 p-6">

            <p class="text-slate-500">
                Available
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ number_format($availableListings) }}
            </h2>

        </div>


        <div class="bg-white rounded-2xl shadow border-l-4 border-red-500 p-6">

            <p class="text-slate-500">
                Sold
            </p>

            <h2 class="text-4xl font-bold text-red-600 mt-2">
                {{ number_format($soldListings) }}
            </h2>

        </div>


        <div class="bg-white rounded-2xl shadow border-l-4 border-blue-500 p-6">

            <p class="text-slate-500">
                Listed This Month
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ number_format($monthlyListings) }}
            </h2>

        </div>

    </div>


    {{-- SEARCH & FILTERS --}}
    <div class="bg-white rounded-2xl shadow p-6">

        <form method="GET"
              action="{{ route('admin.marketplace') }}">

            <div class="grid md:grid-cols-4 gap-4">

                <div class="md:col-span-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search listing, seller or location..."
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-orange-500 focus:outline-none">

                </div>


                <select
                    name="category"
                    class="border border-slate-300 rounded-xl px-4 py-3">

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


                <select
                    name="status"
                    class="border border-slate-300 rounded-xl px-4 py-3">

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


            <div class="mt-5 flex gap-3">

                <button
                    type="submit"
                    class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-semibold">

                    Search

                </button>


                <a href="{{ route('admin.marketplace') }}"
                   class="bg-slate-500 hover:bg-slate-600 text-white px-6 py-3 rounded-xl font-semibold">

                    Reset

                </a>

            </div>

        </form>

    </div>


    {{-- LISTINGS TABLE --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="px-6 py-5 border-b flex justify-between items-center">

            <div>

                <h2 class="text-xl font-bold text-slate-800">
                    Marketplace Listings
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Showing {{ $items->count() }} of {{ $items->total() }}
                </p>

            </div>

        </div>


        <div class="overflow-x-auto">

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

                        <tr class="border-b hover:bg-slate-50">

                            {{-- ITEM --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-4">

                                    <div class="w-16 h-16 rounded-xl overflow-hidden bg-orange-100 flex-shrink-0">

                                        @if($item->images->count())

                                            <img
                                                src="{{ asset('storage/'.$item->images->first()->image) }}"
                                                class="w-full h-full object-cover">

                                        @else

                                            <div class="w-full h-full flex items-center justify-center text-2xl">
                                                🛒
                                            </div>

                                        @endif

                                    </div>

                                    <div>

                                        <div class="font-bold text-slate-800">
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

                                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">

                                    {{ $item->category }}

                                </span>

                            </td>


                            {{-- PRICE --}}
                            <td class="px-6 py-4 font-bold text-green-600">

                                KSh {{ number_format($item->price) }}

                            </td>


                            {{-- LOCATION --}}
                            <td class="px-6 py-4 text-slate-600">

                                {{ $item->location ?? 'N/A' }}

                            </td>


                            {{-- STATUS --}}
                            <td class="px-6 py-4">

                                @if($item->sold)

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                                        Sold
                                    </span>

                                @else

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                        Available
                                    </span>

                                @endif

                            </td>


                            {{-- ACTIONS --}}
                            <td class="px-6 py-4">

                                <div class="flex flex-wrap justify-center gap-2">

                                    <a
                                        href="{{ route('admin.marketplace.show', $item) }}"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm">

                                        View

                                    </a>


                                    @if($item->sold)

                                        <form
                                            action="{{ route('admin.marketplace.available', $item) }}"
                                            method="POST">

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm">

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
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-2 rounded-lg text-sm">

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
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm">

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


        <div class="px-6 py-5 border-t">

            {{ $items->links() }}

        </div>

    </div>

</div>

@endsection