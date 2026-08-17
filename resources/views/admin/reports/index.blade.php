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
    class="inline-flex items-center justify-center gap-2
           bg-sky-600 hover:bg-sky-700
           border-2 border-sky-700
           text-white
           px-5 py-3
           rounded-xl
           font-semibold
           shadow-md hover:shadow-lg
           transition duration-200">

    🖨

    Print Report

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

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 text-sm font-medium">
                            Total Users
                        </p>

                        <h3 class="text-4xl font-bold text-slate-800 mt-3">
                            {{ number_format($totalUsers) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl
                                bg-sky-100
                                border border-sky-200
                                text-sky-600
                                flex items-center
                                justify-center
                                text-2xl
                                flex-shrink-0">

                        👥

                    </div>

                </div>

            </div>


            {{-- Students --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 text-sm font-medium">
                            Students
                        </p>

                        <h3 class="text-4xl font-bold text-sky-600 mt-3">
                            {{ number_format($students) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl
                                bg-sky-100
                                border border-sky-200
                                text-sky-600
                                flex items-center
                                justify-center
                                text-2xl
                                flex-shrink-0">

                        🎓

                    </div>

                </div>

            </div>


            {{-- Landlords --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 text-sm font-medium">
                            Landlords
                        </p>

                        <h3 class="text-4xl font-bold text-green-600 mt-3">
                            {{ number_format($landlords) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl
                                bg-green-100
                                border border-green-200
                                text-green-600
                                flex items-center
                                justify-center
                                text-2xl
                                flex-shrink-0">

                        🏠

                    </div>

                </div>

            </div>


            {{-- Business Owners --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 text-sm font-medium">
                            Business Owners
                        </p>

                        <h3 class="text-4xl font-bold text-purple-600 mt-3">
                            {{ number_format($businessOwners) }}
                        </h3>

                    </div>

                    <div class="w-14 h-14 rounded-2xl
                                bg-purple-100
                                border border-purple-200
                                text-purple-600
                                flex items-center
                                justify-center
                                text-2xl
                                flex-shrink-0">

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

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 font-medium">
                            Businesses
                        </p>

                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ number_format($businesses) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-purple-100
                                border border-purple-200
                                flex items-center
                                justify-center
                                text-2xl">

                        💼

                    </div>

                </div>

            </div>


            {{-- Accommodations --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 font-medium">
                            Accommodations
                        </p>

                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ number_format($accommodations) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-green-100
                                border border-green-200
                                flex items-center
                                justify-center
                                text-2xl">

                        🏠

                    </div>

                </div>

            </div>


            {{-- Notes --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 font-medium">
                            Notes
                        </p>

                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ number_format($notes) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-blue-100
                                border border-blue-200
                                flex items-center
                                justify-center
                                text-2xl">

                        📚

                    </div>

                </div>

            </div>


            {{-- Past Papers --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 font-medium">
                            Past Papers
                        </p>

                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ number_format($pastpapers) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-orange-100
                                border border-orange-200
                                flex items-center
                                justify-center
                                text-2xl">

                        📝

                    </div>

                </div>

            </div>


            {{-- Announcements --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 font-medium">
                            Announcements
                        </p>

                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ number_format($announcements) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-red-100
                                border border-red-200
                                flex items-center
                                justify-center
                                text-2xl">

                        📢

                    </div>

                </div>

            </div>


            {{-- Universities --}}

            <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

                <div class="flex items-center justify-between gap-4">

                    <div>

                        <p class="text-slate-500 font-medium">
                            Universities
                        </p>

                        <h3 class="text-3xl font-bold text-slate-800 mt-2">
                            {{ number_format($universities) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-sky-100
                                border border-sky-200
                                flex items-center
                                justify-center
                                text-2xl">

                        🏫

                    </div>

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

            {{-- Pending Businesses --}}

            <div class="bg-yellow-50
                        border border-yellow-200
                        rounded-2xl
                        p-6
                        shadow-sm">

                <div class="flex justify-between items-center gap-4">

                    <div>

                        <p class="text-yellow-700 font-semibold">
                            Pending Businesses
                        </p>

                        <h3 class="text-4xl font-bold text-yellow-800 mt-2">
                            {{ number_format($pendingBusinesses) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-yellow-100
                                border border-yellow-200
                                flex items-center
                                justify-center
                                text-2xl">

                        ⏳

                    </div>

                </div>

            </div>


            {{-- Pending Notes --}}

            <div class="bg-blue-50
                        border border-blue-200
                        rounded-2xl
                        p-6
                        shadow-sm">

                <div class="flex justify-between items-center gap-4">

                    <div>

                        <p class="text-blue-700 font-semibold">
                            Pending Notes
                        </p>

                        <h3 class="text-4xl font-bold text-blue-800 mt-2">
                            {{ number_format($pendingNotes) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-blue-100
                                border border-blue-200
                                flex items-center
                                justify-center
                                text-2xl">

                        📚

                    </div>

                </div>

            </div>


            {{-- Pending Accommodations --}}

            <div class="bg-green-50
                        border border-green-200
                        rounded-2xl
                        p-6
                        shadow-sm">

                <div class="flex justify-between items-center gap-4">

                    <div>

                        <p class="text-green-700 font-semibold">
                            Pending Accommodations
                        </p>

                        <h3 class="text-4xl font-bold text-green-800 mt-2">
                            {{ number_format($pendingAccommodations) }}
                        </h3>

                    </div>

                    <div class="w-12 h-12 rounded-xl
                                bg-green-100
                                border border-green-200
                                flex items-center
                                justify-center
                                text-2xl">

                        🏠

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
        CHARTS
    ========================================================== --}}

    <div class="grid xl:grid-cols-2 gap-6">

        {{-- User Distribution --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="mb-6">

                <h2 class="text-xl font-bold text-slate-800">
                    User Distribution
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Breakdown of registered platform users.
                </p>

            </div>

            <div class="h-[320px]">

                <canvas id="userDistributionChart"></canvas>

            </div>

        </div>


        {{-- Content Overview --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="mb-6">

                <h2 class="text-xl font-bold text-slate-800">
                    Content Overview
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Overview of the content currently available.
                </p>

            </div>

            <div class="h-[320px]">

                <canvas id="contentChart"></canvas>

            </div>

        </div>

    </div>


    {{-- =========================================================
        UNIVERSITY PERFORMANCE
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

        <div class="mb-6">

            <h2 class="text-xl font-bold text-slate-800">
                University Performance
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Platform activity broken down by university.
            </p>

        </div>

        @if($universityStats->count())

            <div class="overflow-x-auto">

                <table class="w-full text-left">

                    <thead>

                        <tr class="border-b border-slate-200">

                            <th class="px-3 pb-4 text-sm font-semibold text-slate-500">
                                University
                            </th>

                            <th class="px-3 pb-4 text-sm font-semibold text-slate-500 text-center">
                                Users
                            </th>

                            <th class="px-3 pb-4 text-sm font-semibold text-slate-500 text-center">
                                Businesses
                            </th>

                            <th class="px-3 pb-4 text-sm font-semibold text-slate-500 text-center">
                                Notes
                            </th>

                            <th class="px-3 pb-4 text-sm font-semibold text-slate-500 text-center">
                                Accommodations
                            </th>

                            <th class="px-3 pb-4 text-sm font-semibold text-slate-500 text-center">
                                Announcements
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($universityStats as $university)

                            <tr class="border-b border-slate-100
                                       hover:bg-slate-50
                                       transition">

                                <td class="px-3 py-5">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl
                                                    bg-sky-100
                                                    border border-sky-200
                                                    flex items-center
                                                    justify-center">

                                            🎓

                                        </div>

                                        <div>

                                            <div class="font-semibold text-slate-800">
                                                {{ $university->name }}
                                            </div>

                                            <div class="text-xs text-slate-400 mt-1">
                                                University
                                            </div>

                                        </div>

                                    </div>

                                </td>


                                <td class="px-3 py-5 text-center">

                                    <span class="inline-flex items-center justify-center
                                                 min-w-[45px]
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-sky-100
                                                 text-sky-700
                                                 font-semibold">

                                        {{ number_format($university->users_count) }}

                                    </span>

                                </td>


                                <td class="px-3 py-5 text-center">

                                    <span class="inline-flex items-center justify-center
                                                 min-w-[45px]
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-purple-100
                                                 text-purple-700
                                                 font-semibold">

                                        {{ number_format($university->businesses_count) }}

                                    </span>

                                </td>


                                <td class="px-3 py-5 text-center">

                                    <span class="inline-flex items-center justify-center
                                                 min-w-[45px]
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-blue-100
                                                 text-blue-700
                                                 font-semibold">

                                        {{ number_format($university->notes_count) }}

                                    </span>

                                </td>


                                <td class="px-3 py-5 text-center">

                                    <span class="inline-flex items-center justify-center
                                                 min-w-[45px]
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-green-100
                                                 text-green-700
                                                 font-semibold">

                                        {{ number_format($university->accommodations_count) }}

                                    </span>

                                </td>


                                <td class="px-3 py-5 text-center">

                                    <span class="inline-flex items-center justify-center
                                                 min-w-[45px]
                                                 px-3 py-1.5
                                                 rounded-full
                                                 bg-red-100
                                                 text-red-700
                                                 font-semibold">

                                        {{ number_format($university->announcements_count) }}

                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="text-center py-12">

                <div class="w-16 h-16 rounded-2xl
                            bg-slate-100
                            border border-slate-200
                            flex items-center
                            justify-center
                            text-2xl
                            mx-auto">

                    🏫

                </div>

                <h3 class="text-lg font-bold text-slate-800 mt-4">
                    No university data available
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    University statistics will appear here once data is available.
                </p>

            </div>

        @endif

    </div>


    {{-- =========================================================
        RECENT ACTIVITY
    ========================================================== --}}

    <div class="grid xl:grid-cols-2 gap-6">

        {{-- Recent Users --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Recent Users
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Latest users registered on CampusConnect.
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-sky-100
                            border border-sky-200
                            flex items-center
                            justify-center">

                    👥

                </div>

            </div>

            <div class="space-y-5">

                @forelse($recentUsers as $user)

                    <div class="flex items-center gap-4">

                        <div class="w-11 h-11 rounded-full
                                    bg-sky-100
                                    border border-sky-200
                                    text-sky-700
                                    flex items-center
                                    justify-center
                                    font-bold
                                    flex-shrink-0">

                            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}

                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="font-semibold text-slate-800 truncate">
                                {{ $user->name }}
                            </p>

                            <p class="text-sm text-slate-500 truncate">
                                {{ $user->email }}
                            </p>

                        </div>

                        <span class="text-xs text-slate-400 whitespace-nowrap">

                            {{ $user->created_at?->diffForHumans() }}

                        </span>

                    </div>

                @empty

                    <div class="py-8 text-center">

                        <div class="text-3xl">
                            👥
                        </div>

                        <p class="text-slate-500 mt-2">
                            No users found.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- Recent Announcements --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="flex items-center justify-between mb-6">

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Recent Announcements
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Latest announcements published on the platform.
                    </p>

                </div>

                <div class="w-11 h-11 rounded-xl
                            bg-red-100
                            border border-red-200
                            flex items-center
                            justify-center">

                    📢

                </div>

            </div>

            <div class="space-y-5">

                @forelse($recentAnnouncements as $announcement)

                    <div class="flex items-start gap-4">

                        <div class="w-11 h-11 rounded-xl
                                    bg-red-100
                                    border border-red-200
                                    text-red-600
                                    flex items-center
                                    justify-center
                                    text-xl
                                    flex-shrink-0">

                            📢

                        </div>

                        <div class="flex-1 min-w-0">

                            <p class="font-semibold text-slate-800 break-words">
                                {{ $announcement->title }}
                            </p>

                            <p class="text-sm text-slate-500 mt-1">

                                {{ $announcement->university->name ?? 'Unknown University' }}

                            </p>

                            <p class="text-xs text-slate-400 mt-1">

                                {{ $announcement->created_at?->diffForHumans() }}

                            </p>

                        </div>

                    </div>

                @empty

                    <div class="py-8 text-center">

                        <div class="text-3xl">
                            📢
                        </div>

                        <p class="text-slate-500 mt-2">
                            No announcements found.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>


    {{-- =========================================================
        REPORT FOOTER
    ========================================================== --}}

    <div class="bg-slate-900
                text-white
                rounded-2xl
                p-6
                shadow-xl">

        <div class="flex flex-col md:flex-row
                    md:items-center
                    md:justify-between
                    gap-4">

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
    | Check Chart.js
    |--------------------------------------------------------------------------
    */

    if (typeof Chart === 'undefined') {

        console.warn('Chart.js is not loaded.');

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | User Distribution Chart
    |--------------------------------------------------------------------------
    */

    const userDistributionCanvas =
        document.getElementById('userDistributionChart');


    if (userDistributionCanvas) {

        new Chart(
            userDistributionCanvas,
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
                            {{ (int) $students }},
                            {{ (int) $landlords }},
                            {{ (int) $businessOwners }}
                        ],

                        borderWidth: 0

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    cutout: '65%',

                    plugins: {

                        legend: {

                            position: 'bottom',

                            labels: {

                                padding: 20,

                                usePointStyle: true

                            }

                        }

                    }

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Content Overview Chart
    |--------------------------------------------------------------------------
    */

    const contentCanvas =
        document.getElementById('contentChart');


    if (contentCanvas) {

        new Chart(
            contentCanvas,
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
                            {{ (int) $businesses }},
                            {{ (int) $accommodations }},
                            {{ (int) $notes }},
                            {{ (int) $pastpapers }},
                            {{ (int) $announcements }}
                        ],

                        borderRadius: 8,

                        borderSkipped: false

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

                        },

                        x: {

                            grid: {

                                display: false

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

    }

});

</script>

@endpush


@push('styles')

<style>

@media print {

    body {
        background: white !important;
    }

    nav,
    aside,
    header,
    footer,
    button {
        display: none !important;
    }

    .shadow-md,
    .shadow-xl {
        box-shadow: none !important;
    }

    .rounded-2xl {
        border-radius: 8px !important;
    }

    canvas {
        max-height: 300px !important;
    }

}

</style>

@endpush