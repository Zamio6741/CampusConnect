@extends('layouts.admin')

@section('title', 'Accommodation Management')

@section('content')

@if(session('success'))

<div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-5 py-4 rounded-xl">

    {{ session('success') }}

</div>

@endif

<div class="space-y-8">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-4xl font-bold text-slate-800">
                🏠 Accommodation Management
            </h1>
            <p class="text-slate-500 mt-2">
                Review, approve and manage all accommodation listings.
            </p>
        </div>

        <div class="bg-white px-5 py-3 rounded-xl shadow">
            <span class="text-gray-600">
                {{ now()->format('F d, Y') }}
            </span>
        </div>
    </div>

    <!-- Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow border-l-4 border-blue-600 p-6">
            <p class="text-gray-500">Total Rentals</p>
            <h2 class="text-4xl font-bold mt-2">
                {{ $accommodations->total() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow border-l-4 border-green-600 p-6">
            <p class="text-gray-500">Approved</p>
            <h2 class="text-4xl font-bold mt-2 text-green-600">
                {{ \App\Models\Accommodation::where('status','Approved')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow border-l-4 border-yellow-500 p-6">
            <p class="text-gray-500">Pending</p>
            <h2 class="text-4xl font-bold mt-2 text-yellow-500">
                {{ \App\Models\Accommodation::where('status','Pending')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow border-l-4 border-red-600 p-6">
            <p class="text-gray-500">Rejected</p>
            <h2 class="text-4xl font-bold mt-2 text-red-600">
                {{ \App\Models\Accommodation::where('status','Rejected')->count() }}
            </h2>
        </div>

    </div>

   <!-- Search & Filters -->
<div class="bg-white rounded-2xl shadow p-6">

<form method="GET">

<div class="grid md:grid-cols-4 gap-4">

    <div class="md:col-span-2">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="🔍 Search property or location..."
            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

    </div>

    <select
        name="verified"
        class="border rounded-xl px-4 py-3">

        <option value="">All Status</option>

        <option value="1"
            {{ request('verified')=='1' ? 'selected' : '' }}>
            Approved
        </option>

        <option value="0"
            {{ request('verified')=='0' ? 'selected' : '' }}>
            Pending
        </option>

    </select>

    <select
        name="university"
        class="border rounded-xl px-4 py-3">

        <option value="">All Universities</option>

        @foreach($universities as $university)

            <option
                value="{{ $university->id }}"
                {{ request('university')==$university->id ? 'selected' : '' }}>

                {{ $university->name }}

            </option>

        @endforeach

    </select>

</div>

<div class="mt-5 flex gap-3">

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl">

        Search

    </button>

    <a href="{{ route('admin.accommodations') }}"
       class="bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-xl">

        Reset

    </a>

</div>

</form>

</div>
    <!-- Accommodation Table -->

<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="flex justify-between items-center px-6 py-5 border-b">

        <h2 class="text-2xl font-bold">
            Rental Listings
        </h2>

        <span class="text-gray-500">
            Showing {{ $accommodations->count() }} of {{ $accommodations->total() }}
        </span>

    </div>

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-gray-100">

            <tr class="text-left text-gray-700">

                <th class="px-6 py-4">Photo</th>

                <th class="px-6 py-4">Property</th>

                <th class="px-6 py-4">Landlord</th>

                <th class="px-6 py-4">University</th>

                <th class="px-6 py-4">Location</th>

                <th class="px-6 py-4">Price</th>

                <th class="px-6 py-4">Status</th>

                <th class="px-6 py-4 text-center">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($accommodations as $accommodation)

                <tr class="border-b hover:bg-gray-50">

                    <!-- Photo -->

                    <td class="px-6 py-4">

                        <div class="w-16 h-16 rounded-xl bg-gray-200 flex items-center justify-center text-2xl">

                            🏠

                        </div>

                    </td>

                    <!-- Property -->

                    <td class="px-6 py-4">

                        <div class="font-semibold">

                            {{ $accommodation->title }}

                        </div>

                        <div class="text-sm text-gray-500">

                            {{ $accommodation->listing_type }}

                        </div>

                    </td>

                    <!-- Landlord -->

                    <td class="px-6 py-4">

                        {{ $accommodation->owner?->name ?? 'Unknown' }}

                    </td>

                    <!-- University -->

                    <td class="px-6 py-4">

                        {{ $accommodation->university?->name ?? 'N/A' }}

                    </td>

                    <!-- Location -->

                    <td class="px-6 py-4">

                        {{ $accommodation->location }}

                    </td>

                    <!-- Price -->

                    <td class="px-6 py-4 font-semibold text-green-600">

                        KSh {{ number_format($accommodation->price) }}

                    </td>

                    <!-- Status -->

                    <td class="px-6 py-4">

                      @if($accommodation->status == 'Approved')

    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
        Approved
    </span>

@elseif($accommodation->status == 'Rejected')

    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
        Rejected
    </span>

@else

    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
        Pending
    </span>

@endif

                    </td>

                  <td class="px-6 py-4 space-x-2">

   <a href="{{ route('admin.accommodations.show', $accommodation) }}"
   class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded">
    View
</a>

    <form action="{{ route('admin.accommodations.approve', $accommodation) }}"
          method="POST"
          class="inline">
        @csrf
        @method('PATCH')

        <button type="submit"
                onclick="return confirm('Approve this accommodation?')"
                class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded">
            Approve
        </button>
    </form>

    <form action="{{ route('admin.accommodations.reject', $accommodation) }}"
          method="POST"
          class="inline">
        @csrf
        @method('PATCH')

        <button type="submit"
                onclick="return confirm('Reject this accommodation?')"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded">
            Reject
        </button>
    </form>

</td>

                </tr>

            @empty

                <tr>

                    <td colspan="8" class="text-center py-16 text-gray-500">

                        No accommodation listings found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    <div class="px-6 py-5 border-t">

        {{ $accommodations->links() }}

    </div>

</div>

</div>

@endsection