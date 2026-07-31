@extends('layouts.admin')

@section('title','Business Management')

@section('content')

<div class="space-y-8">

    <!-- Header -->
    <div class="flex justify-between items-center">

        <div>
            <h1 class="text-4xl font-bold text-slate-800">
                🏪 Business Management
            </h1>

            <p class="text-slate-500 mt-2">
                Review, approve and manage business listings.
            </p>
        </div>

        <div class="bg-gradient-to-r from-sky-500 to-blue-700 text-white rounded-2xl shadow-xl px-6 py-4">
            {{ now()->format('F d, Y') }}
        </div>

    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow border-l-4 border-blue-600 p-6">
            <p class="text-gray-500">Total Businesses</p>
            <h2 class="text-4xl font-bold mt-2">
                {{ $businesses->total() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow border-l-4 border-green-600 p-6">
            <p class="text-gray-500">Approved</p>
            <h2 class="text-4xl font-bold mt-2 text-green-600">
                {{ \App\Models\Business::where('status','Approved')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow border-l-4 border-yellow-500 p-6">
            <p class="text-gray-500">Pending</p>
            <h2 class="text-4xl font-bold mt-2 text-yellow-500">
                {{ \App\Models\Business::where('status','Pending')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow border-l-4 border-red-600 p-6">
            <p class="text-gray-500">Rejected</p>
            <h2 class="text-4xl font-bold mt-2 text-red-600">
                {{ \App\Models\Business::where('status','Rejected')->count() }}
            </h2>
        </div>

    </div>

    <!-- Filters -->

   <form method="GET" action="{{ route('admin.businesses') }}"
      class="bg-white rounded-2xl shadow p-6 mb-8">

    <div class="grid md:grid-cols-4 gap-4">

        <div class="md:col-span-2">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="🔍 Search business, owner, category or location..."
                class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500">

        </div>

        <select
            name="status"
            class="border rounded-xl px-4 py-3">

            <option value="">All Status</option>

            <option value="Pending"
                {{ request('status')=='Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Approved"
                {{ request('status')=='Approved' ? 'selected' : '' }}>
                Approved
            </option>

            <option value="Rejected"
                {{ request('status')=='Rejected' ? 'selected' : '' }}>
                Rejected
            </option>

        </select>

        <select
            name="university"
            class="border rounded-xl px-4 py-3">

            <option value="">All Universities</option>

            @foreach($universities as $university)

                <option value="{{ $university->id }}"
                    {{ request('university') == $university->id ? 'selected' : '' }}>

                    {{ $university->name }}

                </option>

            @endforeach

        </select>

    </div>

    <div class="grid md:grid-cols-4 gap-4 mt-4">

        <select
            name="sort"
            class="border rounded-xl px-4 py-3">

            <option value="">Latest First</option>

            <option value="oldest"
                {{ request('sort')=='oldest' ? 'selected' : '' }}>
                Oldest First
            </option>

            <option value="views"
                {{ request('sort')=='views' ? 'selected' : '' }}>
                Most Viewed
            </option>

            <option value="rating"
                {{ request('sort')=='rating' ? 'selected' : '' }}>
                Highest Rated
            </option>

        </select>

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl px-6 py-3">

            🔍 Apply Filters

        </button>

        <a href="{{ route('admin.businesses') }}"
           class="bg-gray-200 hover:bg-gray-300 rounded-xl px-6 py-3 text-center">

            Reset

        </a>

    </div>

</form>
    <!-- Table -->

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="flex justify-between items-center px-6 py-5 border-b">

            <h2 class="text-2xl font-bold">
                Business Listings
            </h2>

            <span class="text-gray-500">
                {{ $businesses->count() }} of {{ $businesses->total() }}
            </span>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                <tr>

                    <th class="px-6 py-4">Logo</th>
                    <th class="px-6 py-4">Business</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4">University</th>
                    <th class="px-6 py-4">Owner</th>
                    <th class="px-6 py-4">Phone</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Actions</th>

                </tr>

                </thead>

                <tbody>

                @forelse($businesses as $business)

                <tr class="border-b hover:bg-slate-50">

                    <td class="px-6 py-4">
                        <div class="w-14 h-14 rounded-xl bg-slate-200 flex items-center justify-center text-2xl">
                            🏪
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        <div class="font-semibold">
                            {{ $business->business_name }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $business->location }}
                        </div>
                    </td>

                    <td class="px-6 py-4">
                        {{ $business->category }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $business->university?->name ?? 'N/A' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $business->owner?->name ?? 'Unknown' }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $business->phone }}
                    </td>

                    <td class="px-6 py-4">

                        @if($business->status=='Approved')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">Approved</span>

                        @elseif($business->status=='Rejected')
                            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm">Rejected</span>

                        @else
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm">Pending</span>

                        @endif

                    </td>

                    <td class="px-6 py-4">

                        <div class="flex gap-2 justify-center">

                            <a href="{{ route('admin.businesses.show',$business) }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg">
                                View
                            </a>

                            <form action="{{ route('admin.businesses.approve',$business) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg">
                                    Approve
                                </button>
                            </form>

                            <form action="{{ route('admin.businesses.reject',$business) }}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg">
                                    Reject
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="8" class="py-20 text-center text-gray-500">
                        No businesses found.
                    </td>
                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="px-6 py-5 border-t">
            {{ $businesses->links() }}
        </div>

    </div>

</div>

@endsection