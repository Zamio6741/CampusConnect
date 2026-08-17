@extends('layouts.admin')

@section('title','Business Management')

@section('content')

<div class="space-y-6 sm:space-y-8">

    <!-- =========================================================
         HEADER
    ========================================================== -->

    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-5">

        <div>
            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-800">
                🏪 Business Management
            </h1>

            <p class="text-sm sm:text-base text-slate-500 mt-2">
                Review, approve and manage business listings.
            </p>
        </div>

        <div class="w-full lg:w-auto
                    bg-gradient-to-r from-sky-500 to-blue-700
                    text-white rounded-2xl shadow-xl
                    px-5 sm:px-6 py-3 sm:py-4
                    text-center lg:text-left">

            {{ now()->format('F d, Y') }}

        </div>

    </div>


    <!-- =========================================================
         STATISTICS
    ========================================================== -->

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-6">

        <!-- Total -->
        <div class="bg-white rounded-2xl shadow border-l-4 border-blue-600 p-5 sm:p-6">

            <p class="text-gray-500 text-sm">
                Total Businesses
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ $businesses->total() }}
            </h2>

        </div>


        <!-- Approved -->
        <div class="bg-white rounded-2xl shadow border-l-4 border-green-600 p-5 sm:p-6">

            <p class="text-gray-500 text-sm">
                Approved
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2 text-green-600">
                {{ \App\Models\Business::where('status','Approved')->count() }}
            </h2>

        </div>


        <!-- Pending -->
        <div class="bg-white rounded-2xl shadow border-l-4 border-yellow-500 p-5 sm:p-6">

            <p class="text-gray-500 text-sm">
                Pending
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2 text-yellow-500">
                {{ \App\Models\Business::where('status','Pending')->count() }}
            </h2>

        </div>


        <!-- Rejected -->
        <div class="bg-white rounded-2xl shadow border-l-4 border-red-600 p-5 sm:p-6">

            <p class="text-gray-500 text-sm">
                Rejected
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2 text-red-600">
                {{ \App\Models\Business::where('status','Rejected')->count() }}
            </h2>

        </div>

    </div>


    <!-- =========================================================
         FILTERS
    ========================================================== -->

    <form
        method="GET"
        action="{{ route('admin.businesses') }}"
        class="bg-white rounded-2xl shadow p-4 sm:p-6"
    >

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

            <!-- Search -->

            <div class="md:col-span-2">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="🔍 Search business, owner, category or location..."
                    class="w-full
                           border border-gray-300
                           rounded-xl
                           px-4 py-3
                           text-sm sm:text-base
                           focus:outline-none
                           focus:ring-2
                           focus:ring-blue-500
                           focus:border-blue-500"
                >

            </div>


            <!-- Status -->

            <select
                name="status"
                class="w-full
                       border border-gray-300
                       rounded-xl
                       px-4 py-3
                       text-sm sm:text-base
                       focus:outline-none
                       focus:ring-2
                       focus:ring-blue-500"
            >

                <option value="">
                    All Status
                </option>

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


            <!-- University -->

            <select
                name="university"
                class="w-full
                       border border-gray-300
                       rounded-xl
                       px-4 py-3
                       text-sm sm:text-base
                       focus:outline-none
                       focus:ring-2
                       focus:ring-blue-500"
            >

                <option value="">
                    All Universities
                </option>

                @foreach($universities as $university)

                    <option
                        value="{{ $university->id }}"
                        {{ request('university') == $university->id ? 'selected' : '' }}
                    >
                        {{ $university->name }}
                    </option>

                @endforeach

            </select>

        </div>


        <!-- Second Row -->

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-4">

            <!-- Sort -->

            <select
                name="sort"
                class="w-full
                       border border-gray-300
                       rounded-xl
                       px-4 py-3
                       text-sm sm:text-base
                       focus:outline-none
                       focus:ring-2
                       focus:ring-blue-500"
            >

                <option value="">
                    Latest First
                </option>

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


            <!-- Apply -->

            <button
                type="submit"
                class="w-full
                       bg-blue-600
                       hover:bg-blue-700
                       text-white
                       rounded-xl
                       px-6 py-3
                       font-semibold
                       transition"
            >
                🔍 Apply Filters
            </button>


            <!-- Reset -->

            <a
                href="{{ route('admin.businesses') }}"
                class="w-full
                       bg-gray-200
                       hover:bg-gray-300
                       rounded-xl
                       px-6 py-3
                       text-center
                       font-semibold
                       text-gray-700
                       transition"
            >
                Reset
            </a>

        </div>

    </form>


    <!-- =========================================================
         BUSINESS LIST
    ========================================================== -->

    <div class="bg-white rounded-2xl shadow overflow-hidden">


        <!-- Section Header -->

        <div class="flex flex-col sm:flex-row
                    sm:justify-between
                    sm:items-center
                    gap-2
                    px-4 sm:px-6
                    py-4 sm:py-5
                    border-b">

            <h2 class="text-xl sm:text-2xl font-bold">
                Business Listings
            </h2>

            <span class="text-sm text-gray-500">
                {{ $businesses->count() }} of {{ $businesses->total() }}
            </span>

        </div>


        <!-- =====================================================
             DESKTOP TABLE
        ====================================================== -->

        <div class="hidden lg:block overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                <tr class="text-left">

                    <th class="px-6 py-4 text-sm font-semibold">
                        Logo
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold">
                        Business
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold">
                        Category
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold">
                        University
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold">
                        Owner
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold">
                        Phone
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold">
                        Status
                    </th>

                    <th class="px-6 py-4 text-sm font-semibold text-center">
                        Actions
                    </th>

                </tr>

                </thead>


                <tbody>

                @forelse($businesses as $business)

                    <tr class="border-b hover:bg-slate-50 transition">


                        <!-- Logo -->

                        <td class="px-6 py-4">

                            <div
                                class="w-14 h-14
                                       rounded-xl
                                       bg-slate-200
                                       flex items-center
                                       justify-center
                                       text-2xl"
                            >
                                🏪
                            </div>

                        </td>


                        <!-- Business -->

                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">
                                {{ $business->business_name }}
                            </div>

                            <div class="text-sm text-gray-500 mt-1">
                                {{ $business->location }}
                            </div>

                        </td>


                        <!-- Category -->

                        <td class="px-6 py-4">
                            {{ $business->category }}
                        </td>


                        <!-- University -->

                        <td class="px-6 py-4">
                            {{ $business->university?->name ?? 'N/A' }}
                        </td>


                        <!-- Owner -->

                        <td class="px-6 py-4">
                            {{ $business->owner?->name ?? 'Unknown' }}
                        </td>


                        <!-- Phone -->

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $business->phone }}
                        </td>


                        <!-- Status -->

                        <td class="px-6 py-4">

                            @if($business->status=='Approved')

                                <span
                                    class="inline-flex
                                           bg-green-100
                                           text-green-700
                                           border border-green-200
                                           px-3 py-1
                                           rounded-full
                                           text-sm
                                           font-semibold"
                                >
                                    Approved
                                </span>

                            @elseif($business->status=='Rejected')

                                <span
                                    class="inline-flex
                                           bg-red-100
                                           text-red-700
                                           border border-red-200
                                           px-3 py-1
                                           rounded-full
                                           text-sm
                                           font-semibold"
                                >
                                    Rejected
                                </span>

                            @else

                                <span
                                    class="inline-flex
                                           bg-yellow-100
                                           text-yellow-700
                                           border border-yellow-200
                                           px-3 py-1
                                           rounded-full
                                           text-sm
                                           font-semibold"
                                >
                                    Pending
                                </span>

                            @endif

                        </td>


                        <!-- Actions -->

                        <td class="px-6 py-4">

                            <div class="flex gap-2 justify-center">

                                <a
                                    href="{{ route('admin.businesses.show',$business) }}"
                                    class="bg-blue-600
                                           hover:bg-blue-700
                                           text-white
                                           px-3 py-2
                                           rounded-lg
                                           text-sm
                                           font-medium
                                           transition"
                                >
                                    View
                                </a>


                                @if($business->status !== 'Approved')

                                    <form
                                        action="{{ route('admin.businesses.approve',$business) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="bg-green-600
                                                   hover:bg-green-700
                                                   text-white
                                                   px-3 py-2
                                                   rounded-lg
                                                   text-sm
                                                   font-medium
                                                   transition"
                                        >
                                            Approve
                                        </button>

                                    </form>

                                @endif


                                @if($business->status !== 'Rejected')

                                    <form
                                        action="{{ route('admin.businesses.reject',$business) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            class="bg-red-600
                                                   hover:bg-red-700
                                                   text-white
                                                   px-3 py-2
                                                   rounded-lg
                                                   text-sm
                                                   font-medium
                                                   transition"
                                        >
                                            Reject
                                        </button>

                                    </form>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="8"
                            class="py-20 text-center text-gray-500"
                        >
                            No businesses found.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        <!-- =====================================================
             MOBILE / TABLET CARDS
        ====================================================== -->

        <div class="lg:hidden p-4 sm:p-6 space-y-4">

            @forelse($businesses as $business)

                <div
                    class="border-2
                           border-gray-200
                           rounded-2xl
                           p-4
                           sm:p-5
                           bg-white
                           shadow-sm
                           hover:shadow-md
                           transition"
                >

                    <!-- Top -->

                    <div class="flex items-start gap-4">

                        <!-- Logo -->

                        <div
                            class="w-14 h-14
                                   sm:w-16 sm:h-16
                                   flex-shrink-0
                                   rounded-xl
                                   bg-slate-100
                                   border
                                   border-slate-200
                                   flex items-center
                                   justify-center
                                   text-2xl"
                        >
                            🏪
                        </div>


                        <!-- Business Name -->

                        <div class="min-w-0 flex-1">

                            <h3
                                class="font-bold
                                       text-base sm:text-lg
                                       text-slate-800
                                       break-words"
                            >
                                {{ $business->business_name }}
                            </h3>

                            <p
                                class="text-sm
                                       text-gray-500
                                       mt-1
                                       break-words"
                            >
                                📍 {{ $business->location }}
                            </p>

                        </div>

                    </div>


                    <!-- Status -->

                    <div class="mt-4">

                        @if($business->status=='Approved')

                            <span
                                class="inline-flex
                                       bg-green-100
                                       text-green-700
                                       border border-green-200
                                       px-3 py-1
                                       rounded-full
                                       text-xs sm:text-sm
                                       font-semibold"
                            >
                                ✓ Approved
                            </span>

                        @elseif($business->status=='Rejected')

                            <span
                                class="inline-flex
                                       bg-red-100
                                       text-red-700
                                       border border-red-200
                                       px-3 py-1
                                       rounded-full
                                       text-xs sm:text-sm
                                       font-semibold"
                            >
                                ✕ Rejected
                            </span>

                        @else

                            <span
                                class="inline-flex
                                       bg-yellow-100
                                       text-yellow-700
                                       border border-yellow-200
                                       px-3 py-1
                                       rounded-full
                                       text-xs sm:text-sm
                                       font-semibold"
                            >
                                ⏳ Pending
                            </span>

                        @endif

                    </div>


                    <!-- Details -->

                    <div
                        class="grid
                               grid-cols-1
                               sm:grid-cols-2
                               gap-3
                               mt-5
                               pt-4
                               border-t
                               border-gray-100"
                    >

                        <!-- Category -->

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Category
                            </p>

                            <p class="text-sm font-medium text-gray-700 mt-1 break-words">
                                {{ $business->category }}
                            </p>

                        </div>


                        <!-- University -->

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                University
                            </p>

                            <p class="text-sm font-medium text-gray-700 mt-1 break-words">
                                {{ $business->university?->name ?? 'N/A' }}
                            </p>

                        </div>


                        <!-- Owner -->

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Owner
                            </p>

                            <p class="text-sm font-medium text-gray-700 mt-1 break-words">
                                {{ $business->owner?->name ?? 'Unknown' }}
                            </p>

                        </div>


                        <!-- Phone -->

                        <div>

                            <p class="text-xs font-semibold uppercase tracking-wide text-gray-400">
                                Phone
                            </p>

                            <p class="text-sm font-medium text-gray-700 mt-1 break-words">
                                {{ $business->phone }}
                            </p>

                        </div>

                    </div>


                    <!-- Actions -->

                    <div
                        class="grid
                               grid-cols-1
                               sm:grid-cols-3
                               gap-2
                               mt-5
                               pt-4
                               border-t
                               border-gray-100"
                    >

                        <!-- View -->

                        <a
                            href="{{ route('admin.businesses.show',$business) }}"
                            class="w-full
                                   bg-blue-600
                                   hover:bg-blue-700
                                   text-white
                                   px-3 py-2.5
                                   rounded-xl
                                   text-center
                                   text-sm
                                   font-semibold
                                   transition"
                        >
                            👁 View
                        </a>


                        <!-- Approve -->

                        @if($business->status !== 'Approved')

                            <form
                                action="{{ route('admin.businesses.approve',$business) }}"
                                method="POST"
                                class="w-full"
                            >

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="w-full
                                           bg-green-600
                                           hover:bg-green-700
                                           text-white
                                           px-3 py-2.5
                                           rounded-xl
                                           text-sm
                                           font-semibold
                                           transition"
                                >
                                    ✓ Approve
                                </button>

                            </form>

                        @else

                            <div></div>

                        @endif


                        <!-- Reject -->

                        @if($business->status !== 'Rejected')

                            <form
                                action="{{ route('admin.businesses.reject',$business) }}"
                                method="POST"
                                class="w-full"
                            >

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="w-full
                                           bg-red-600
                                           hover:bg-red-700
                                           text-white
                                           px-3 py-2.5
                                           rounded-xl
                                           text-sm
                                           font-semibold
                                           transition"
                                >
                                    ✕ Reject
                                </button>

                            </form>

                        @else

                            <div></div>

                        @endif

                    </div>

                </div>

            @empty

                <div class="py-16 text-center text-gray-500">

                    <div
                        class="w-16 h-16
                               mx-auto
                               rounded-full
                               bg-slate-100
                               flex items-center
                               justify-center
                               text-2xl"
                    >
                        🏪
                    </div>

                    <p class="mt-4 font-medium">
                        No businesses found.
                    </p>

                </div>

            @endforelse

        </div>


        <!-- =====================================================
             PAGINATION
        ====================================================== -->

        <div
            class="px-4 sm:px-6
                   py-5
                   border-t"
        >

            <div class="overflow-x-auto">
                {{ $businesses->links() }}
            </div>

        </div>

    </div>

</div>

@endsection