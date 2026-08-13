@extends('layouts.admin')

@section('title', 'Reports')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                System Reports
            </h1>

            <p class="text-slate-500 mt-2">
                Monitor CampusConnect activity, users, content and system growth.
            </p>
        </div>

        <div class="flex items-center gap-3">

            <button
                onclick="window.print()"
                class="bg-slate-800 hover:bg-slate-900 text-white px-5 py-3 rounded-xl font-semibold transition">
                🖨 Print Report
            </button>

        </div>

    </div>


    {{-- =========================================================
        USER STATISTICS
    ========================================================== --}}

    <div>

        <h2 class="text-xl font-bold text-slate-800 mb-4">
            User Statistics
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

            {{-- Total Users --}}

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500 text-sm">
                            Total Users
                        </p>

                        <h3 class="text-4xl font-bold mt-3">
                            {{ number_format($totalUsers) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-2xl">
                        👥
                    </div>

                </div>

            </div>


            {{-- Students --}}

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500 text-sm">
                            Students
                        </p>

                        <h3 class="text-4xl font-bold mt-3 text-sky-600">
                            {{ number_format($students) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-2xl">
                        🎓
                    </div>

                </div>

            </div>


            {{-- Landlords --}}

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500 text-sm">
                            Landlords
                        </p>

                        <h3 class="text-4xl font-bold mt-3 text-green-600">
                            {{ number_format($landlords) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl">
                        🏠
                    </div>

                </div>

            </div>


            {{-- Business Owners --}}

            <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500 text-sm">
                            Business Owners
                        </p>

                        <h3 class="text-4xl font-bold mt-3 text-purple-600">
                            {{ number_format($businessOwners) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-2xl">
                        💼
                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        CONTENT STATISTICS
    ========================================================== --}}

    <div>

        <h2 class="text-xl font-bold text-slate-800 mb-4">
            Platform Content
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

            {{-- Businesses --}}

            <div class="bg-white rounded-2xl shadow-md p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500">
                            Businesses
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            {{ number_format($businesses) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        💼
                    </span>

                </div>

            </div>


            {{-- Accommodations --}}

            <div class="bg-white rounded-2xl shadow-md p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500">
                            Accommodations
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            {{ number_format($accommodations) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        🏠
                    </span>

                </div>

            </div>


            {{-- Notes --}}

            <div class="bg-white rounded-2xl shadow-md p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500">
                            Notes
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            {{ number_format($notes) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        📚
                    </span>

                </div>

            </div>


            {{-- Past Papers --}}

            <div class="bg-white rounded-2xl shadow-md p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500">
                            Past Papers
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            {{ number_format($pastpapers) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        📝
                    </span>

                </div>

            </div>


            {{-- Announcements --}}

            <div class="bg-white rounded-2xl shadow-md p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500">
                            Announcements
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            {{ number_format($announcements) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        📢
                    </span>

                </div>

            </div>


            {{-- Universities --}}

            <div class="bg-white rounded-2xl shadow-md p-6">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-gray-500">
                            Universities
                        </p>

                        <h3 class="text-3xl font-bold mt-2">
                            {{ number_format($universities) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        🏫
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        PENDING ITEMS
    ========================================================== --}}

    <div>

        <h2 class="text-xl font-bold text-slate-800 mb-4">
            Pending Items
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-yellow-700 font-semibold">
                            Pending Businesses
                        </p>

                        <h3 class="text-4xl font-bold text-yellow-800 mt-2">
                            {{ number_format($pendingBusinesses) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        ⏳
                    </span>

                </div>

            </div>


            <div class="bg-blue-50 border border-blue-200 rounded-2xl p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-blue-700 font-semibold">
                            Pending Notes
                        </p>

                        <h3 class="text-4xl font-bold text-blue-800 mt-2">
                            {{ number_format($pendingNotes) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        📚
                    </span>

                </div>

            </div>


            <div class="bg-green-50 border border-green-200 rounded-2xl p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-green-700 font-semibold">
                            Pending Accommodations
                        </p>

                        <h3 class="text-4xl font-bold text-green-800 mt-2">
                            {{ number_format($pendingAccommodations) }}
                        </h3>

                    </div>

                    <span class="text-3xl">
                        🏠
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        CHARTS
    ========================================================== --}}

    <div class="grid xl:grid-cols-2 gap-6">

        {{-- User Distribution --}}

        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                User Distribution
            </h2>

            <div class="h-[320px]">

                <canvas id="userDistributionChart"></canvas>

            </div>

        </div>


        {{-- Content Overview --}}

        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                Content Overview
            </h2>

            <div class="h-[320px]">

                <canvas id="contentChart"></canvas>

            </div>

        </div>

    </div>


  {{-- =========================================================
    UNIVERSITY PERFORMANCE
========================================================= --}}

<div class="bg-white rounded-2xl shadow-md p-6">

    <div class="mb-6">

        <h2 class="text-xl font-bold text-slate-800">
            University Performance
        </h2>

        <p class="text-sm text-gray-500 mt-1">
            Platform activity broken down by university.
        </p>

    </div>

    @if($universityStats->count())

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead>

                    <tr class="border-b border-slate-200">

                        <th class="pb-4 text-sm font-semibold text-slate-500">
                            University
                        </th>

                        <th class="pb-4 text-sm font-semibold text-slate-500 text-center">
                            Users
                        </th>

                        <th class="pb-4 text-sm font-semibold text-slate-500 text-center">
                            Businesses
                        </th>

                        <th class="pb-4 text-sm font-semibold text-slate-500 text-center">
                            Notes
                        </th>

                        <th class="pb-4 text-sm font-semibold text-slate-500 text-center">
                            Accommodations
                        </th>

                        <th class="pb-4 text-sm font-semibold text-slate-500 text-center">
                            Announcements
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($universityStats as $university)

                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                            <td class="py-5">

                                <div class="font-semibold text-slate-800">
                                    {{ $university->name }}
                                </div>

                            </td>

                            <td class="py-5 text-center">

                                <span class="inline-flex items-center justify-center min-w-[45px] px-3 py-1 rounded-full bg-sky-100 text-sky-700 font-semibold">

                                    {{ number_format($university->users_count) }}

                                </span>

                            </td>

                            <td class="py-5 text-center">

                                <span class="inline-flex items-center justify-center min-w-[45px] px-3 py-1 rounded-full bg-purple-100 text-purple-700 font-semibold">

                                    {{ number_format($university->businesses_count) }}

                                </span>

                            </td>

                            <td class="py-5 text-center">

                                <span class="inline-flex items-center justify-center min-w-[45px] px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold">

                                    {{ number_format($university->notes_count) }}

                                </span>

                            </td>

                            <td class="py-5 text-center">

                                <span class="inline-flex items-center justify-center min-w-[45px] px-3 py-1 rounded-full bg-green-100 text-green-700 font-semibold">

                                    {{ number_format($university->accommodations_count) }}

                                </span>

                            </td>

                            <td class="py-5 text-center">

                                <span class="inline-flex items-center justify-center min-w-[45px] px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">

                                    {{ number_format($university->announcements_count) }}

                                </span>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    @else

        <div class="text-center py-10 text-gray-500">

            No university data available.

        </div>

    @endif

</div>

    {{-- =========================================================
        RECENT ACTIVITY
    ========================================================== --}}

    <div class="grid xl:grid-cols-2 gap-6">


        {{-- Recent Users --}}

        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                Recent Users
            </h2>

            <div class="space-y-5">

                @forelse($recentUsers as $user)

                    <div class="flex items-center gap-4">

                        <div class="w-11 h-11 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold">

                            {{ strtoupper(substr($user->name, 0, 1)) }}

                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                {{ $user->name }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ $user->email }}
                            </p>

                        </div>

                        <span class="text-xs text-gray-400">
                            {{ $user->created_at->diffForHumans() }}
                        </span>

                    </div>

                @empty

                    <p class="text-gray-500">
                        No users found.
                    </p>

                @endforelse

            </div>

        </div>


        {{-- Recent Announcements --}}

        <div class="bg-white rounded-2xl shadow-md p-6">

            <h2 class="text-xl font-bold text-slate-800 mb-6">
                Recent Announcements
            </h2>

            <div class="space-y-5">

                @forelse($recentAnnouncements as $announcement)

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-xl bg-red-100 text-red-600 flex items-center justify-center text-xl">
                            📢
                        </div>

                        <div class="flex-1">

                            <p class="font-semibold text-slate-800">
                                {{ $announcement->title }}
                            </p>

                            <p class="text-sm text-gray-500">
                                {{ $announcement->university->name ?? 'Unknown University' }}
                            </p>

                            <p class="text-xs text-gray-400 mt-1">
                                {{ $announcement->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </div>

                @empty

                    <p class="text-gray-500">
                        No announcements found.
                    </p>

                @endforelse

            </div>

        </div>

    </div>


    {{-- =========================================================
        REPORT FOOTER
    ========================================================== --}}

    <div class="bg-slate-900 text-white rounded-2xl p-6 shadow-xl">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>

                <h2 class="text-xl font-bold">
                    CampusConnect System Report
                </h2>

                <p class="text-slate-400 text-sm mt-1">
                    Generated from the current platform data.
                </p>

            </div>

            <div class="text-sm text-slate-400">
                Generated:
                <span class="text-white font-semibold">
                    {{ now()->format('d M Y, H:i') }}
                </span>
            </div>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | User Distribution
    |--------------------------------------------------------------------------
    */

    new Chart(
        document.getElementById('userDistributionChart'),
        {
            type: 'doughnut',

            data: {

                labels: [
                    'Students',
                    'Landlords',
                    'Business Owners'
                ],

                datasets: [{

                    data: [
                        {{ $students }},
                        {{ $landlords }},
                        {{ $businessOwners }}
                    ],

                    borderWidth: 0

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                plugins: {

                    legend: {

                        position: 'bottom'

                    }

                }

            }

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Content Overview
    |--------------------------------------------------------------------------
    */

    new Chart(
        document.getElementById('contentChart'),
        {
            type: 'bar',

            data: {

                labels: [
                    'Businesses',
                    'Accommodations',
                    'Notes',
                    'Past Papers',
                    'Announcements'
                ],

                datasets: [{

                    label: 'Total',

                    data: [
                        {{ $businesses }},
                        {{ $accommodations }},
                        {{ $notes }},
                        {{ $pastpapers }},
                        {{ $announcements }}
                    ],

                    borderRadius: 8

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {

                            precision: 0

                        }

                    }

                },

                plugins: {

                    legend: {

                        display: false

                    }

                }

            }

        }
    );

});

</script>

@endpush