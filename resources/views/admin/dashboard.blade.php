@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- =========================================================
WELCOME HEADER
========================================================= --}}

<div class="w-full min-w-0">

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

        <div class="min-w-0">
            <h1 class="text-3xl sm:text-4xl font-bold text-slate-800 break-words">
                Welcome back, Admin! 👋
            </h1>

            <p class="text-slate-500 mt-2 break-words">
                Here's what's happening on CampusConnect today.
            </p>
        </div>

        {{-- LIVE CLOCK --}}

        <div class="w-full lg:w-auto lg:min-w-[280px] bg-gradient-to-r from-sky-500 to-blue-700 text-white shadow-2xl rounded-2xl px-6 py-4 text-center">

            <div class="flex items-center justify-center gap-2 mb-1">

                <span class="text-2xl">
                    🕒
                </span>

                <span class="text-sm uppercase tracking-widest opacity-80">
                    Current Time
                </span>

            </div>

            <div
                id="liveDate"
                class="text-base sm:text-lg font-semibold break-words">
            </div>

            <div
                id="liveTime"
                class="text-2xl sm:text-3xl font-bold tracking-wide mt-1">
            </div>

        </div>

    </div>


    {{-- =========================================================
    STATISTICS
    ========================================================= --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Total Users --}}

        <a
            href="{{ route('admin.users') }}"
            class="block min-w-0 bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl hover:-translate-y-1 transition duration-300">

            <p class="text-gray-500 break-words">
                Total Users
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($users) }}
            </h2>

        </a>


        {{-- Students --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">
                Students
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($students) }}
            </h2>

        </div>


        {{-- Businesses --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">
                Businesses
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($businesses) }}
            </h2>

        </div>


        {{-- Accommodations --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500 break-words">
                Accommodations
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($accommodations) }}
            </h2>

        </div>


        {{-- Notes --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">
                Notes
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($notes) }}
            </h2>

        </div>


        {{-- Past Papers --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">
                Past Papers
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($pastpapers) }}
            </h2>

        </div>


        {{-- Announcements --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500 break-words">
                Announcements
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($announcements) }}
            </h2>

        </div>


        {{-- Universities --}}

        <div class="min-w-0 bg-white rounded-2xl shadow-lg p-6">

            <p class="text-gray-500">
                Universities
            </p>

            <h2 class="text-3xl sm:text-4xl font-bold mt-2">
                {{ number_format($universities) }}
            </h2>

        </div>

    </div>


    {{-- =========================================================
    SYSTEM OVERVIEW
    ========================================================= --}}

    <div class="mt-10">

        <h2 class="text-2xl font-bold text-slate-800 mb-6 break-words">
            🚀 System Overview
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- Users --}}

            <div class="min-w-0 bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl p-6 text-white shadow-xl">

                <div class="text-5xl">
                    👥
                </div>

                <h3 class="text-xl font-bold mt-4">
                    {{ number_format($users) }}
                </h3>

                <p class="opacity-80 break-words">
                    Registered Users
                </p>

            </div>


            {{-- Businesses --}}

            <div class="min-w-0 bg-gradient-to-r from-green-500 to-green-700 rounded-2xl p-6 text-white shadow-xl">

                <div class="text-5xl">
                    🏪
                </div>

                <h3 class="text-xl font-bold mt-4">
                    {{ number_format($businesses) }}
                </h3>

                <p class="opacity-80 break-words">
                    Active Businesses
                </p>

            </div>


            {{-- Rentals --}}

            <div class="min-w-0 bg-gradient-to-r from-purple-500 to-purple-700 rounded-2xl p-6 text-white shadow-xl">

                <div class="text-5xl">
                    🏠
                </div>

                <h3 class="text-xl font-bold mt-4">
                    {{ number_format($accommodations) }}
                </h3>

                <p class="opacity-80 break-words">
                    Rental Listings
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
    SYSTEM STATUS
    ========================================================= --}}

    <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Server --}}

        <div class="min-w-0 bg-white rounded-2xl shadow p-6">

            <div class="flex flex-wrap justify-between items-center gap-2">

                <span>
                    Server
                </span>

                <span class="text-green-600 font-bold whitespace-nowrap">
                    ● Online
                </span>

            </div>

        </div>


        {{-- Database --}}

        <div class="min-w-0 bg-white rounded-2xl shadow p-6">

            <div class="flex flex-wrap justify-between items-center gap-2">

                <span>
                    Database
                </span>

                <span class="text-green-600 font-bold whitespace-nowrap">
                    ● Connected
                </span>

            </div>

        </div>


        {{-- Storage --}}

        <div class="min-w-0 bg-white rounded-2xl shadow p-6">

            <div class="flex flex-wrap justify-between items-center gap-2">

                <span>
                    Storage
                </span>

                <span class="text-blue-600 font-bold whitespace-nowrap">
                    Healthy
                </span>

            </div>

        </div>


        {{-- Security --}}

        <div class="min-w-0 bg-white rounded-2xl shadow p-6">

            <div class="flex flex-wrap justify-between items-center gap-2">

                <span>
                    Security
                </span>

                <span class="text-green-600 font-bold whitespace-nowrap">
                    Protected
                </span>

            </div>

        </div>

    </div>


    {{-- =========================================================
    MAIN DASHBOARD GRID
    ========================================================= --}}

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mt-8 min-w-0">


        {{-- =====================================================
        LEFT SIDE
        ====================================================== --}}

        <div class="xl:col-span-2 min-w-0 space-y-6">


            {{-- USER GROWTH --}}

            <div class="min-w-0 bg-white rounded-2xl shadow p-4 sm:p-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-6">

                    <div class="min-w-0">

                        <h2 class="text-xl font-bold break-words">
                            User Growth
                        </h2>

                        <p class="text-sm text-slate-500 mt-1 break-words">
                            Total registered users by month
                        </p>

                    </div>

                    <div class="text-sm text-slate-400 shrink-0">
                        {{ now()->year }}
                    </div>

                </div>

                <div class="relative w-full" style="height:320px;">

                    <canvas id="usersChart"></canvas>

                </div>

            </div>


            {{-- RECENT ACTIVITY --}}

            <div class="min-w-0 bg-white rounded-2xl shadow p-4 sm:p-6">

                <h2 class="text-xl font-bold mb-6 break-words">
                    📈 Recent Activity
                </h2>

                <div class="space-y-5">


                    {{-- RECENT USERS --}}

                    @foreach($recentUsers as $user)

                        <div class="flex items-start gap-4 min-w-0">

                            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-xl shrink-0">
                                👤
                            </div>

                            <div class="min-w-0">

                                <div class="font-semibold break-words">
                                    {{ $user->name }}
                                </div>

                                <div class="text-gray-500 text-sm break-words">
                                    Registered a new account
                                </div>

                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $user->created_at->diffForHumans() }}
                                </div>

                            </div>

                        </div>

                    @endforeach


                    {{-- RECENT BUSINESSES --}}

                    @foreach($recentBusinesses as $business)

                        <div class="flex items-start gap-4 min-w-0">

                            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-xl shrink-0">
                                🏪
                            </div>

                            <div class="min-w-0">

                                <div class="font-semibold break-words">
                                    {{ $business->business_name }}
                                </div>

                                <div class="text-gray-500 text-sm break-words">
                                    Registered a business
                                </div>

                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $business->created_at->diffForHumans() }}
                                </div>

                            </div>

                        </div>

                    @endforeach


                    {{-- RECENT NOTES --}}

                    @foreach($recentNotes as $note)

                        <div class="flex items-start gap-4 min-w-0">

                            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-xl shrink-0">
                                📚
                            </div>

                            <div class="min-w-0">

                                <div class="font-semibold break-words">
                                    {{ $note->title }}
                                </div>

                                <div class="text-gray-500 text-sm break-words">
                                    Uploaded new notes
                                </div>

                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $note->created_at->diffForHumans() }}
                                </div>

                            </div>

                        </div>

                    @endforeach


                    {{-- EMPTY STATE --}}

                    @if(
                        $recentUsers->isEmpty() &&
                        $recentBusinesses->isEmpty() &&
                        $recentNotes->isEmpty()
                    )

                        <div class="text-center py-10 text-gray-500">
                            No recent activity available.
                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- =====================================================
        RIGHT SIDE
        ====================================================== --}}

        <div class="min-w-0 space-y-6">


            {{-- USERS BY ROLE --}}

            <div class="min-w-0 bg-white rounded-2xl shadow p-4 sm:p-6">

                <h2 class="text-xl font-bold mb-6 break-words">
                    Users by Role
                </h2>

                <div class="relative w-full" style="height:300px;">

                    <canvas id="rolesChart"></canvas>

                </div>

            </div>


            {{-- TOP UNIVERSITIES --}}

            <div class="min-w-0 bg-white rounded-2xl shadow p-4 sm:p-6">

                <h2 class="text-xl font-bold mb-6 break-words">
                    🏆 Top Universities
                </h2>

                <div class="space-y-5">

                    @forelse($topUniversities as $university)

                        @php

                            $percentage = $users > 0
                                ? min(($university->users_count / $users) * 100, 100)
                                : 0;

                        @endphp

                        <div class="min-w-0">

                            <div class="flex flex-col sm:flex-row sm:justify-between mb-2 gap-1">

                                <span class="font-semibold break-words min-w-0">
                                    {{ $university->name }}
                                </span>

                                <span class="text-slate-500 whitespace-nowrap shrink-0">
                                    {{ number_format($university->users_count) }} users
                                </span>

                            </div>

                            <div class="w-full bg-slate-200 rounded-full h-3 overflow-hidden">

                                <div
                                    class="bg-blue-600 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ $percentage }}%">
                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-8 text-gray-500">
                            No university data available.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
    FULL-WIDTH ADMIN CONTROL CENTER
    ========================================================= --}}

    <div class="mt-10 min-w-0 bg-white rounded-3xl shadow-xl border border-slate-100 p-4 sm:p-6 lg:p-8">


        {{-- HEADER --}}

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

            <div class="flex items-start gap-4 min-w-0">

                <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-3xl shrink-0">
                    ⚡
                </div>

                <div class="min-w-0">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 break-words">
                        Admin Control Center
                    </h2>

                    <p class="text-sm text-slate-500 mt-1 break-words">
                        Manage and monitor the major areas of CampusConnect.
                    </p>

                </div>

            </div>

            <div class="text-sm text-slate-400 shrink-0">
                Administrative Tools
            </div>

        </div>


        {{-- CONTROL BUTTONS --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">


            {{-- USERS --}}

            <a
                href="{{ route('admin.users') }}"
                class="group min-w-0 bg-blue-600 text-white rounded-2xl p-6 sm:p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

                <div class="text-3xl">
                    👥
                </div>

                <div class="mt-3 text-lg font-bold">
                    Users
                </div>

                <div class="text-sm opacity-80 mt-1 break-words">
                    Manage Users
                </div>

            </a>


            {{-- BUSINESSES --}}

            <a
                href="{{ route('admin.businesses') }}"
                class="group min-w-0 bg-green-600 text-white rounded-2xl p-6 sm:p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

                <div class="text-3xl">
                    🏪
                </div>

                <div class="mt-3 text-lg font-bold">
                    Businesses
                </div>

                <div class="text-sm opacity-80 mt-1 break-words">
                    Manage Businesses
                </div>

            </a>


            {{-- RENTALS --}}

            <a
                href="{{ route('admin.accommodations') }}"
                class="group min-w-0 bg-purple-600 text-white rounded-2xl p-6 sm:p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

                <div class="text-3xl">
                    🏠
                </div>

                <div class="mt-3 text-lg font-bold">
                    Rentals
                </div>

                <div class="text-sm opacity-80 mt-1 break-words">
                    Manage Rentals
                </div>

            </a>


            {{-- MARKETPLACE --}}

            <a
                href="{{ route('admin.marketplace') }}"
                class="group min-w-0 bg-orange-500 text-white rounded-2xl p-6 sm:p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

                <div class="text-3xl">
                    🛒
                </div>

                <div class="mt-3 text-lg font-bold">
                    Marketplace
                </div>

                <div class="text-sm opacity-80 mt-1 break-words">
                    Manage Listings
                </div>

            </a>


            {{-- ANNOUNCEMENTS --}}

            <a
                href="{{ route('admin.announcements') }}"
                class="group min-w-0 bg-red-600 text-white rounded-2xl p-6 sm:p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

                <div class="text-3xl">
                    📢
                </div>

                <div class="mt-3 text-lg font-bold">
                    Announcements
                </div>

                <div class="text-sm opacity-80 mt-1 break-words">
                    Manage Announcements
                </div>

            </a>


            {{-- REPORTS --}}

            <a
                href="{{ route('admin.reports') }}"
                class="group min-w-0 bg-slate-700 text-white rounded-2xl p-6 sm:p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

                <div class="text-3xl">
                    📊
                </div>

                <div class="mt-3 text-lg font-bold">
                    Reports
                </div>

                <div class="text-sm opacity-80 mt-1 break-words">
                    System Reports
                </div>

            </a>

        </div>


        {{-- =====================================================
        PENDING ITEMS
        ====================================================== --}}

        <div class="mt-8">

            <h3 class="text-lg font-bold text-slate-800 mb-5 break-words">
                Pending & Attention Required
            </h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


                {{-- PENDING BUSINESSES --}}

                <div class="min-w-0 bg-yellow-100 rounded-2xl p-5 sm:p-6 border-l-8 border-yellow-500">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <h3 class="text-lg font-bold text-slate-800 break-words">
                                Businesses Pending
                            </h3>

                            <div class="text-4xl sm:text-5xl font-bold mt-3 text-slate-900">
                                {{ number_format($pendingBusinesses) }}
                            </div>

                        </div>

                        <div class="text-3xl shrink-0">
                            🏪
                        </div>

                    </div>

                </div>


                {{-- PENDING NOTES --}}

                <div class="min-w-0 bg-blue-100 rounded-2xl p-5 sm:p-6 border-l-8 border-blue-500">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <h3 class="text-lg font-bold text-slate-800 break-words">
                                Notes Pending
                            </h3>

                            <div class="text-4xl sm:text-5xl font-bold mt-3 text-slate-900">
                                {{ number_format($pendingNotes) }}
                            </div>

                        </div>

                        <div class="text-3xl shrink-0">
                            📚
                        </div>

                    </div>

                </div>


                {{-- PENDING RENTALS --}}

                <div class="min-w-0 bg-green-100 rounded-2xl p-5 sm:p-6 border-l-8 border-green-500">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <h3 class="text-lg font-bold text-slate-800 break-words">
                                Rentals Pending
                            </h3>

                            <div class="text-4xl sm:text-5xl font-bold mt-3 text-slate-900">
                                {{ number_format($pendingAccommodations) }}
                            </div>

                        </div>

                        <div class="text-3xl shrink-0">
                            🏠
                        </div>

                    </div>

                </div>


                {{-- REPORTS --}}

                <div class="min-w-0 bg-red-100 rounded-2xl p-5 sm:p-6 border-l-8 border-red-500">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <h3 class="text-lg font-bold text-slate-800 break-words">
                                Reports
                            </h3>

                            <div class="text-4xl sm:text-5xl font-bold mt-3 text-slate-900">
                                {{ number_format($pendingReports) }}
                            </div>

                        </div>

                        <div class="text-3xl shrink-0">
                            🚨
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection


{{-- =========================================================
SCRIPTS
========================================================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* ========================================================
       USER GROWTH CHART
    ========================================================= */

    const usersChartElement =
        document.getElementById('usersChart');

    if (usersChartElement && typeof Chart !== 'undefined') {

        const userGrowthLabels =
            @json($userGrowthLabels);

        const userGrowthData =
            @json($userGrowthData);

        new Chart(
            usersChartElement,
            {
                type: 'line',

                data: {

                    labels: userGrowthLabels,

                    datasets: [{

                        label: 'Total Registered Users',

                        data: userGrowthData,

                        borderColor: '#2563eb',

                        backgroundColor: 'rgba(37, 99, 235, 0.15)',

                        fill: true,

                        tension: 0.4,

                        borderWidth: 3,

                        pointRadius: 4,

                        pointHoverRadius: 6,

                        pointBackgroundColor: '#2563eb',

                        spanGaps: false

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    interaction: {

                        intersect: false,

                        mode: 'index'

                    },

                    plugins: {

                        legend: {

                            display: true,

                            position: 'top'

                        },

                        tooltip: {

                            callbacks: {

                                label: function(context) {

                                    const count =
                                        context.parsed.y;

                                    if (count === null) {
                                        return 'No data';
                                    }

                                    return count.toLocaleString() +
                                        (
                                            count === 1
                                                ? ' registered user'
                                                : ' registered users'
                                        );

                                }

                            }

                        }

                    },

                    scales: {

                        x: {

                            grid: {

                                display: false

                            }

                        },

                        y: {

                            beginAtZero: true,

                            ticks: {

                                precision: 0

                            }

                        }

                    }

                }

            }
        );

    }


    /* ========================================================
       USERS BY ROLE
    ========================================================= */

    const rolesChartElement =
        document.getElementById('rolesChart');

    if (rolesChartElement && typeof Chart !== 'undefined') {

        new Chart(
            rolesChartElement,
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
                            {{ $businesses }}
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

                            position: 'bottom'

                        }

                    }

                }

            }
        );

    }


    /* ========================================================
       LIVE DATE & TIME
    ========================================================= */

    function updateDateTime() {

        const now = new Date();

        const dateElement =
            document.getElementById('liveDate');

        const timeElement =
            document.getElementById('liveTime');


        if (dateElement) {

            dateElement.textContent =
                now.toLocaleDateString(
                    'en-US',
                    {
                        weekday: 'long',
                        year: 'numeric',
                        month: 'long',
                        day: 'numeric'
                    }
                );

        }


        if (timeElement) {

            timeElement.textContent =
                now.toLocaleTimeString(
                    'en-US',
                    {
                        hour: '2-digit',
                        minute: '2-digit',
                        second: '2-digit'
                    }
                );

        }

    }


    updateDateTime();

    setInterval(updateDateTime, 1000);

});

</script>

@endpush