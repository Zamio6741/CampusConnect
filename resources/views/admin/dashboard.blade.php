@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

{{-- =========================================================
    WELCOME HEADER
========================================================= --}}

<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-8">

    <div>
        <h1 class="text-4xl font-bold text-slate-800">
            Welcome back, Admin! 👋
        </h1>

        <p class="text-slate-500 mt-2">
            Here's what's happening on CampusConnect today.
        </p>
    </div>

    {{-- LIVE CLOCK --}}

    <div class="bg-gradient-to-r from-sky-500 to-blue-700 text-white shadow-2xl rounded-2xl px-6 py-4 text-center min-w-[280px]">

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
            class="text-lg font-semibold">
        </div>

        <div
            id="liveTime"
            class="text-3xl font-bold tracking-wide mt-1">
        </div>

    </div>

</div>


{{-- =========================================================
    STATISTICS
========================================================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    {{-- Total Users --}}

    <a
        href="{{ route('admin.users') }}"
        class="block bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl hover:-translate-y-1 transition duration-300">

        <p class="text-gray-500">
            Total Users
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($users) }}
        </h2>

    </a>


    {{-- Students --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Students
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($students) }}
        </h2>

    </div>


    {{-- Businesses --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Businesses
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($businesses) }}
        </h2>

    </div>


    {{-- Accommodations --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Accommodations
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($accommodations) }}
        </h2>

    </div>


    {{-- Notes --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Notes
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($notes) }}
        </h2>

    </div>


    {{-- Past Papers --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Past Papers
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($pastpapers) }}
        </h2>

    </div>


    {{-- Announcements --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Announcements
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($announcements) }}
        </h2>

    </div>


    {{-- Universities --}}

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Universities
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($universities) }}
        </h2>

    </div>

</div>


{{-- =========================================================
    SYSTEM OVERVIEW
========================================================= --}}

<div class="mt-10">

    <h2 class="text-2xl font-bold text-slate-800 mb-6">
        🚀 System Overview
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        {{-- Users --}}

        <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl p-6 text-white shadow-xl">

            <div class="text-5xl">
                👥
            </div>

            <h3 class="text-xl font-bold mt-4">
                {{ number_format($users) }}
            </h3>

            <p class="opacity-80">
                Registered Users
            </p>

        </div>


        {{-- Businesses --}}

        <div class="bg-gradient-to-r from-green-500 to-green-700 rounded-2xl p-6 text-white shadow-xl">

            <div class="text-5xl">
                🏪
            </div>

            <h3 class="text-xl font-bold mt-4">
                {{ number_format($businesses) }}
            </h3>

            <p class="opacity-80">
                Active Businesses
            </p>

        </div>


        {{-- Rentals --}}

        <div class="bg-gradient-to-r from-purple-500 to-purple-700 rounded-2xl p-6 text-white shadow-xl">

            <div class="text-5xl">
                🏠
            </div>

            <h3 class="text-xl font-bold mt-4">
                {{ number_format($accommodations) }}
            </h3>

            <p class="opacity-80">
                Rental Listings
            </p>

        </div>

    </div>

</div>


{{-- =========================================================
    SYSTEM STATUS
========================================================= --}}

<div class="mt-8 grid md:grid-cols-4 gap-6">

    {{-- Server --}}

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between items-center">

            <span>
                Server
            </span>

            <span class="text-green-600 font-bold">
                ● Online
            </span>

        </div>

    </div>


    {{-- Database --}}

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between items-center">

            <span>
                Database
            </span>

            <span class="text-green-600 font-bold">
                ● Connected
            </span>

        </div>

    </div>


    {{-- Storage --}}

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between items-center">

            <span>
                Storage
            </span>

            <span class="text-blue-600 font-bold">
                Healthy
            </span>

        </div>

    </div>


    {{-- Security --}}

    <div class="bg-white rounded-2xl shadow p-6">

        <div class="flex justify-between items-center">

            <span>
                Security
            </span>

            <span class="text-green-600 font-bold">
                Protected
            </span>

        </div>

    </div>

</div>


{{-- =========================================================
    MAIN DASHBOARD GRID
========================================================= --}}

<div class="grid xl:grid-cols-3 gap-6 mt-8">


    {{-- =====================================================
        LEFT SIDE
    ====================================================== --}}

    <div class="xl:col-span-2 space-y-6">


        {{-- USER GROWTH --}}

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                User Growth
            </h2>

            <div style="height:320px;">

                <canvas id="usersChart"></canvas>

            </div>

        </div>


        {{-- RECENT ACTIVITY --}}

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                📈 Recent Activity
            </h2>

            <div class="space-y-5">


                {{-- RECENT USERS --}}

                @foreach($recentUsers as $user)

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-xl shrink-0">
                            👤
                        </div>

                        <div>

                            <div class="font-semibold">
                                {{ $user->name }}
                            </div>

                            <div class="text-gray-500 text-sm">
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

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-xl shrink-0">
                            🏪
                        </div>

                        <div>

                            <div class="font-semibold">
                                {{ $business->business_name }}
                            </div>

                            <div class="text-gray-500 text-sm">
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

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-xl shrink-0">
                            📚
                        </div>

                        <div>

                            <div class="font-semibold">
                                {{ $note->title }}
                            </div>

                            <div class="text-gray-500 text-sm">
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

    <div class="space-y-6">


        {{-- USERS BY ROLE --}}

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                Users by Role
            </h2>

            <div style="height:300px;">

                <canvas id="rolesChart"></canvas>

            </div>

        </div>


        {{-- TOP UNIVERSITIES --}}

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                🏆 Top Universities
            </h2>

            <div class="space-y-5">

                @forelse($topUniversities as $university)

                    @php

                        $percentage = $users > 0
                            ? min(($university->users_count / $users) * 100, 100)
                            : 0;

                    @endphp

                    <div>

                        <div class="flex justify-between mb-2 gap-3">

                            <span class="font-semibold">
                                {{ $university->name }}
                            </span>

                            <span class="text-slate-500 whitespace-nowrap">
                                {{ $university->users_count }} users
                            </span>

                        </div>

                        <div class="w-full bg-slate-200 rounded-full h-3">

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

<div class="mt-10 bg-white rounded-3xl shadow-xl border border-slate-100 p-8">

    {{-- HEADER --}}

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-3xl">
                ⚡
            </div>

            <div>

                <h2 class="text-2xl font-bold text-slate-800">
                    Admin Control Center
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Manage and monitor the major areas of CampusConnect.
                </p>

            </div>

        </div>

        <div class="text-sm text-slate-400">
            Administrative Tools
        </div>

    </div>


    {{-- =====================================================
        CONTROL BUTTONS
    ====================================================== --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">


        {{-- USERS --}}

        <a
            href="{{ route('admin.users') }}"
            class="group bg-blue-600 text-white rounded-2xl p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

            <div class="text-3xl">
                👥
            </div>

            <div class="mt-3 text-lg font-bold">
                Users
            </div>

            <div class="text-sm opacity-80 mt-1">
                Manage Users
            </div>

        </a>


        {{-- BUSINESSES --}}

        <a
            href="{{ route('admin.businesses') }}"
            class="group bg-green-600 text-white rounded-2xl p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

            <div class="text-3xl">
                🏪
            </div>

            <div class="mt-3 text-lg font-bold">
                Businesses
            </div>

            <div class="text-sm opacity-80 mt-1">
                Manage Businesses
            </div>

        </a>


        {{-- RENTALS --}}

        <a
            href="{{ route('admin.accommodations') }}"
            class="group bg-purple-600 text-white rounded-2xl p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

            <div class="text-3xl">
                🏠
            </div>

            <div class="mt-3 text-lg font-bold">
                Rentals
            </div>

            <div class="text-sm opacity-80 mt-1">
                Manage Rentals
            </div>

        </a>


        {{-- MARKETPLACE --}}

        <a
            href="{{ route('admin.marketplace') }}"
            class="group bg-orange-500 text-white rounded-2xl p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

            <div class="text-3xl">
                🛒
            </div>

            <div class="mt-3 text-lg font-bold">
                Marketplace
            </div>

            <div class="text-sm opacity-80 mt-1">
                Manage Listings
            </div>

        </a>


        {{-- ANNOUNCEMENTS --}}

        <a
            href="{{ route('admin.announcements') }}"
            class="group bg-red-600 text-white rounded-2xl p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

            <div class="text-3xl">
                📢
            </div>

            <div class="mt-3 text-lg font-bold">
                Announcements
            </div>

            <div class="text-sm opacity-80 mt-1">
                Manage Announcements
            </div>

        </a>


        {{-- REPORTS --}}

        <a
            href="{{ route('admin.reports') }}"
            class="group bg-slate-700 text-white rounded-2xl p-7 text-center hover:-translate-y-1 hover:shadow-xl transition duration-300">

            <div class="text-3xl">
                📊
            </div>

            <div class="mt-3 text-lg font-bold">
                Reports
            </div>

            <div class="text-sm opacity-80 mt-1">
                System Reports
            </div>

        </a>

    </div>


    {{-- =====================================================
        PENDING ITEMS
    ====================================================== --}}

    <div class="mt-8">

        <h3 class="text-lg font-bold text-slate-800 mb-5">
            Pending & Attention Required
        </h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5">


            {{-- PENDING BUSINESSES --}}

            <div class="bg-yellow-100 rounded-2xl p-6 border-l-8 border-yellow-500">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h3 class="text-lg font-bold text-slate-800">
                            Businesses Pending
                        </h3>

                        <div class="text-5xl font-bold mt-3 text-slate-900">
                            {{ $pendingBusinesses }}
                        </div>

                    </div>

                    <div class="text-3xl">
                        🏪
                    </div>

                </div>

            </div>


            {{-- PENDING NOTES --}}

            <div class="bg-blue-100 rounded-2xl p-6 border-l-8 border-blue-500">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h3 class="text-lg font-bold text-slate-800">
                            Notes Pending
                        </h3>

                        <div class="text-5xl font-bold mt-3 text-slate-900">
                            {{ $pendingNotes }}
                        </div>

                    </div>

                    <div class="text-3xl">
                        📚
                    </div>

                </div>

            </div>


            {{-- PENDING RENTALS --}}

            <div class="bg-green-100 rounded-2xl p-6 border-l-8 border-green-500">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h3 class="text-lg font-bold text-slate-800">
                            Rentals Pending
                        </h3>

                        <div class="text-5xl font-bold mt-3 text-slate-900">
                            {{ $pendingAccommodations }}
                        </div>

                    </div>

                    <div class="text-3xl">
                        🏠
                    </div>

                </div>

            </div>


            {{-- REPORTS --}}

            <div class="bg-red-100 rounded-2xl p-6 border-l-8 border-red-500">

                <div class="flex items-start justify-between gap-4">

                    <div>

                        <h3 class="text-lg font-bold text-slate-800">
                            Reports
                        </h3>

                        <div class="text-5xl font-bold mt-3 text-slate-900">
                            {{ $pendingReports }}
                        </div>

                    </div>

                    <div class="text-3xl">
                        🚨
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

    if (usersChartElement) {

        new Chart(
            usersChartElement,
            {
                type: 'line',

                data: {

                    labels: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul'
                    ],

                    datasets: [{

                        label: 'Users',

                        data: [
                            5,
                            9,
                            12,
                            18,
                            25,
                            30,
                            {{ $users }}
                        ],

                        borderColor: '#2563eb',

                        backgroundColor: 'rgba(37,99,235,.15)',

                        fill: true,

                        tension: .4,

                        borderWidth: 3,

                        pointRadius: 4,

                        pointHoverRadius: 6

                    }]

                },

                options: {

                    responsive: true,

                    maintainAspectRatio: false,

                    plugins: {

                        legend: {

                            display: true

                        }

                    },

                    scales: {

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

    if (rolesChartElement) {

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
                            {{ \App\Models\User::where('role_id', 3)->count() }},
                            {{ \App\Models\User::where('role_id', 4)->count() }}
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

            dateElement.innerHTML =
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

            timeElement.innerHTML =
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