@extends('layouts.admin')

@section('title', 'Accommodation Management')

@section('content')

<div class="space-y-6 sm:space-y-8 w-full max-w-full overflow-hidden">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="bg-green-100 border border-green-400 text-green-700 px-4 sm:px-5 py-4 rounded-xl">
            {{ session('success') }}
        </div>

    @endif


    {{-- HEADER --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div class="min-w-0">

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-800">
                🏠 Accommodation Management
            </h1>

            <p class="text-slate-500 mt-2 text-sm sm:text-base">
                Review, approve and manage all accommodation listings.
            </p>

        </div>

        <div class="bg-white px-4 sm:px-5 py-3 rounded-xl shadow w-full lg:w-auto">

            <span class="text-gray-600 text-sm sm:text-base">
                {{ now()->format('F d, Y') }}
            </span>

        </div>

    </div>


    {{-- STATISTICS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6">

        {{-- TOTAL --}}
        <div class="bg-white rounded-2xl shadow border-l-4 border-blue-600 p-5 sm:p-6">

            <p class="text-gray-500 text-sm sm:text-base">
                Total Rentals
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ $accommodations->total() }}
            </h2>

        </div>


        {{-- APPROVED --}}
        <div class="bg-white rounded-2xl shadow border-l-4 border-green-600 p-5 sm:p-6">

            <p class="text-gray-500 text-sm sm:text-base">
                Approved
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2 text-green-600">
                {{ \App\Models\Accommodation::where('status','Approved')->count() }}
            </h2>

        </div>


        {{-- PENDING --}}
        <div class="bg-white rounded-2xl shadow border-l-4 border-yellow-500 p-5 sm:p-6">

            <p class="text-gray-500 text-sm sm:text-base">
                Pending
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2 text-yellow-500">
                {{ \App\Models\Accommodation::where('status','Pending')->count() }}
            </h2>

        </div>


        {{-- REJECTED --}}
        <div class="bg-white rounded-2xl shadow border-l-4 border-red-600 p-5 sm:p-6">

            <p class="text-gray-500 text-sm sm:text-base">
                Rejected
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2 text-red-600">
                {{ \App\Models\Accommodation::where('status','Rejected')->count() }}
            </h2>

        </div>

    </div>


    {{-- SEARCH & FILTERS --}}
    <div class="bg-white rounded-2xl shadow p-4 sm:p-6">

        <form method="GET" action="{{ route('admin.accommodations') }}">

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

                {{-- SEARCH --}}
                <div class="md:col-span-2">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="🔍 Search property or location..."
                        class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                </div>


                {{-- STATUS --}}
                <select
                    name="verified"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <option value="">
                        All Status
                    </option>

                    <option value="1"
                        {{ request('verified') == '1' ? 'selected' : '' }}>
                        Approved
                    </option>

                    <option value="0"
                        {{ request('verified') == '0' ? 'selected' : '' }}>
                        Pending
                    </option>

                </select>


                {{-- UNIVERSITY --}}
                <select
                    name="university"
                    class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                    <option value="">
                        All Universities
                    </option>

                    @foreach($universities as $university)

                        <option
                            value="{{ $university->id }}"
                            {{ request('university') == $university->id ? 'selected' : '' }}>

                            {{ $university->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- FILTER BUTTONS --}}
            <div class="mt-5 grid grid-cols-1 sm:grid-cols-2 gap-3 sm:flex">

                <button
                    type="submit"
                    class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl transition font-medium">

                    🔍 Search

                </button>

                <a
                    href="{{ route('admin.accommodations') }}"
                    class="w-full sm:w-auto text-center bg-gray-500 hover:bg-gray-600 text-white px-5 py-3 rounded-xl transition font-medium">

                    Reset

                </a>

            </div>

        </form>

    </div>


    {{-- ACCOMMODATION TABLE --}}
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        {{-- TABLE HEADER --}}
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 px-4 sm:px-6 py-5 border-b">

            <div>

                <h2 class="text-xl sm:text-2xl font-bold">
                    Rental Listings
                </h2>

                <p class="text-sm text-gray-500 mt-1 sm:hidden">
                    Showing {{ $accommodations->count() }} of {{ $accommodations->total() }}
                </p>

            </div>

            <span class="hidden sm:block text-gray-500 text-sm">
                Showing {{ $accommodations->count() }} of {{ $accommodations->total() }}
            </span>

        </div>


        {{-- MOBILE TABLE SCROLL --}}
        <div class="overflow-x-auto">

            <table class="min-w-[1050px] w-full">

                <thead class="bg-gray-100">

                <tr class="text-left text-gray-700">

                    <th class="px-5 sm:px-6 py-4">
                        Photo
                    </th>

                    <th class="px-5 sm:px-6 py-4">
                        Property
                    </th>

                    <th class="px-5 sm:px-6 py-4">
                        Landlord
                    </th>

                    <th class="px-5 sm:px-6 py-4">
                        University
                    </th>

                    <th class="px-5 sm:px-6 py-4">
                        Location
                    </th>

                    <th class="px-5 sm:px-6 py-4">
                        Price
                    </th>

                    <th class="px-5 sm:px-6 py-4">
                        Status
                    </th>

                    <th class="px-5 sm:px-6 py-4 text-center">
                        Actions
                    </th>

                </tr>

                </thead>


                <tbody>

                @forelse($accommodations as $accommodation)

                    <tr class="border-b hover:bg-gray-50 transition">

                        {{-- PHOTO --}}
                        <td class="px-5 sm:px-6 py-4">

                            <div class="w-14 h-14 sm:w-16 sm:h-16 rounded-xl bg-gray-200 flex items-center justify-center text-2xl flex-shrink-0">

                                🏠

                            </div>

                        </td>


                        {{-- PROPERTY --}}
                        <td class="px-5 sm:px-6 py-4">

                            <div class="font-semibold max-w-[220px] truncate">

                                {{ $accommodation->title }}

                            </div>

                            <div class="text-sm text-gray-500">

                                {{ $accommodation->listing_type }}

                            </div>

                        </td>


                        {{-- LANDLORD --}}
                        <td class="px-5 sm:px-6 py-4">

                            <span class="whitespace-nowrap">

                                {{ $accommodation->owner?->name ?? 'Unknown' }}

                            </span>

                        </td>


                        {{-- UNIVERSITY --}}
                        <td class="px-5 sm:px-6 py-4">

                            <span class="whitespace-nowrap">

                                {{ $accommodation->university?->name ?? 'N/A' }}

                            </span>

                        </td>


                        {{-- LOCATION --}}
                        <td class="px-5 sm:px-6 py-4">

                            <span class="max-w-[180px] truncate block">

                                {{ $accommodation->location }}

                            </span>

                        </td>


                        {{-- PRICE --}}
                        <td class="px-5 sm:px-6 py-4 font-semibold text-green-600 whitespace-nowrap">

                            KSh {{ number_format($accommodation->price) }}

                        </td>


                        {{-- STATUS --}}
                        <td class="px-5 sm:px-6 py-4">

                            @if($accommodation->status == 'Approved')

                                <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm whitespace-nowrap">

                                    Approved

                                </span>

                            @elseif($accommodation->status == 'Rejected')

                                <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm whitespace-nowrap">

                                    Rejected

                                </span>

                            @else

                                <span class="inline-block bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm whitespace-nowrap">

                                    Pending

                                </span>

                            @endif

                        </td>


                        {{-- ACTIONS --}}
                        <td class="px-5 sm:px-6 py-4">

                            <div class="flex flex-wrap justify-center gap-2 min-w-[270px]">

                                {{-- VIEW --}}
                                <a
                                    href="{{ route('admin.accommodations.show', $accommodation) }}"
                                    class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm transition">

                                    View

                                </a>


                                {{-- APPROVE --}}
                                <form
                                    action="{{ route('admin.accommodations.approve', $accommodation) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Approve this accommodation?')"
                                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm transition">

                                        Approve

                                    </button>

                                </form>


                                {{-- REJECT --}}
                                <form
                                    action="{{ route('admin.accommodations.reject', $accommodation) }}"
                                    method="POST">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Reject this accommodation?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm transition">

                                        Reject

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="text-center py-16 text-gray-500">

                            <div class="text-5xl mb-4">
                                🏠
                            </div>

                            <div class="text-lg font-semibold">
                                No accommodation listings found.
                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        <div class="px-4 sm:px-6 py-5 border-t overflow-x-auto">

            {{ $accommodations->links() }}

        </div>

    </div>

</div>

@endsection