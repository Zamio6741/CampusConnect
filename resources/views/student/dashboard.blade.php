<x-app-layout>

@php
    /*
    |--------------------------------------------------------------------------
    | Semester Progress
    |--------------------------------------------------------------------------
    | These values are supplied by DashboardController.
    |
    | semesterProgress = percentage completed based on the student's
    | semester start and end dates.
    |
    | The fallback values prevent the dashboard from breaking if a
    | student has not configured their semester dates yet.
    |--------------------------------------------------------------------------
    */

    $semesterProgress = isset($semesterProgress)
        ? max(0, min(100, (int) $semesterProgress))
        : 0;

    $semesterStartDate = $semesterStartDate ?? null;
    $semesterEndDate = $semesterEndDate ?? null;
@endphp


<div
    x-data="{
        sidebar: false,
        mobileSidebar: false
    }"
    class="min-h-screen bg-slate-100"
>

    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside
        @mouseenter="sidebar = true"
        @mouseleave="sidebar = false"
        :class="mobileSidebar ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        class="fixed inset-y-0 left-0 z-50
               h-screen
               bg-slate-900 text-white
               transition-all duration-300 ease-in-out
               flex flex-col
               shadow-2xl
               overflow-hidden
               w-72 lg:w-24"
        :style="window.innerWidth >= 1024
            ? (sidebar ? 'width:18rem' : 'width:6rem')
            : 'width:18rem'"
    >

        <!-- ===================================================== -->
        <!-- SIDEBAR HEADER -->
        <!-- ===================================================== -->

        <div class="h-24 flex items-center shrink-0 border-b border-white/5">

            <!-- Collapsed Logo -->

            <div
                x-show="!sidebar && !mobileSidebar"
                class="w-full flex justify-center"
            >

                <div class="w-12 h-12 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-2xl shadow-lg">
                    🎓
                </div>

            </div>


            <!-- Expanded Logo -->

            <div
                x-show="sidebar || mobileSidebar"
                x-transition
                class="px-6 flex items-center gap-3 whitespace-nowrap"
            >

                <div class="w-11 h-11 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-xl shadow-lg shrink-0">
                    🎓
                </div>

                <div>

                    <h1 class="text-xl font-extrabold tracking-tight">
                        CampusConnect
                    </h1>

                    <p class="text-xs text-blue-300">
                        Student Portal
                    </p>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- NAVIGATION -->
        <!-- ===================================================== -->

        <nav class="flex-1 overflow-y-auto overflow-x-hidden px-3 py-6">

            <!-- DASHBOARD -->

            <a
                href="{{ route('dashboard') }}"
                class="group flex items-center rounded-xl
                       bg-gradient-to-r from-blue-600 to-indigo-600
                       text-white font-semibold
                       shadow-lg
                       mb-7
                       h-12
                       transition-all duration-200
                       hover:shadow-xl"
                :class="sidebar || mobileSidebar
                    ? 'justify-start px-4 gap-4'
                    : 'justify-center'"
            >

                <span class="text-xl shrink-0">
                    🏠
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Dashboard
                </span>

            </a>


            <!-- ================================================= -->
            <!-- ACADEMIC -->
            <!-- ================================================= -->

            <div class="mb-6">

                <p
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="px-3 mb-3 text-xs font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap"
                >
                    📚 Academic
                </p>

                <div class="space-y-2">

                    <!-- NOTES -->

                    <a
                        href="{{ route('notes.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            📖
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Notes
                        </span>

                    </a>


                    <!-- PAST PAPERS -->

                    <a
                        href="{{ route('pastpapers.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            📄
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Past Papers
                        </span>

                    </a>


                    <!-- ANNOUNCEMENTS -->

                    <a
                        href="{{ route('announcements.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            📢
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Announcements
                        </span>

                    </a>


                    <!-- ================================================= -->
                    <!-- SEMESTER SETTINGS - NEW -->
                    <!-- ================================================= -->

                    <a
                        href="{{ route('semester.edit') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            📅
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Semester Settings
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- STUDENT LIFE -->
            <!-- ================================================= -->

            <div class="mb-6">

                <p
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="px-3 mb-3 text-xs font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap"
                >
                    🏡 Student Life
                </p>

                <div class="space-y-2">

                    <!-- CAMPUS HOSTELS -->

                    <a
                        href="{{ route('campus.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            🏫
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Campus Hostels
                        </span>

                    </a>


                    <!-- RENTALS -->

                    <a
                        href="{{ route('browse.rentals') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            🏠
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Rentals
                        </span>

                    </a>


                    <!-- MARKETPLACE -->

                    <a
                        href="{{ route('marketplace.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            🛒
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Marketplace
                        </span>

                    </a>


                    <!-- LOST & FOUND -->

                    <a
                        href="{{ route('lostfound.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            🔍
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Lost & Found
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- SERVICES -->
            <!-- ================================================= -->

            <div class="mb-6">

                <p
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="px-3 mb-3 text-xs font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap"
                >
                    💼 Services
                </p>

                <div class="space-y-2">

                    <!-- STUDENT SERVICES -->

                    <a
                        href="{{ route('student-services.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            🎓
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Student Services
                        </span>

                    </a>


                    <!-- BUSINESSES -->

                    <a
                        href="{{ route('businesses.index') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            🏢
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Businesses
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- COMMUNICATION -->
            <!-- ================================================= -->

            <div class="mb-6">

                <p
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="px-3 mb-3 text-xs font-bold uppercase tracking-widest text-slate-400 whitespace-nowrap"
                >
                    💬 Communication
                </p>

                <div class="space-y-2">

                    <!-- MESSAGES -->

                    <a
                        href="{{ route('student.messages') }}"
                        class="sidebar-link"
                        :class="sidebar || mobileSidebar
                            ? 'justify-start px-4 gap-4'
                            : 'justify-center'"
                    >

                        <span class="text-lg shrink-0">
                            💬
                        </span>

                        <span
                            x-show="sidebar || mobileSidebar"
                            x-transition
                            class="whitespace-nowrap"
                        >
                            Messages
                        </span>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- ACTIVITY -->
            <!-- ================================================= -->

            <div
                x-show="sidebar || mobileSidebar"
                x-transition
                class="mt-8"
            >

                <div class="rounded-3xl bg-slate-800 border border-slate-700 p-5">

                    <h3 class="font-bold text-white mb-5">
                        📊 Your Activity
                    </h3>

                    <div class="space-y-4 text-sm">

                        <!-- NOTES -->

                        <div class="flex justify-between">

                            <span class="text-slate-300">
                                📚 Notes
                            </span>

                            <span class="font-bold text-blue-400">
                                {{ $stats['notes'] ?? 0 }}
                            </span>

                        </div>


                        <!-- RENTALS -->

                        <div class="flex justify-between">

                            <span class="text-slate-300">
                                🏡 Rentals
                            </span>

                            <span class="font-bold text-green-400">
                                {{ $stats['accommodations'] ?? 0 }}
                            </span>

                        </div>


                        <!-- MARKETPLACE -->

                        <div class="flex justify-between">

                            <span class="text-slate-300">
                                🛒 Marketplace
                            </span>

                            <span class="font-bold text-orange-400">
                                {{ $stats['marketplace'] ?? 0 }}
                            </span>

                        </div>


                        <!-- ANNOUNCEMENTS -->

                        <div class="flex justify-between">

                            <span class="text-slate-300">
                                📢 Announcements
                            </span>

                            <span class="font-bold text-red-400">
                                {{ $stats['announcements'] ?? 0 }}
                            </span>

                        </div>


                        <!-- MESSAGES -->

                        <div class="flex justify-between">

                            <span class="text-slate-300">
                                💬 Messages
                            </span>

                            <span class="font-bold text-sky-400">
                                {{ $stats['messages'] ?? 0 }}
                            </span>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- REAL SEMESTER PROGRESS -->
                    <!-- ================================================= -->

                    <div class="mt-7">

                        <div class="flex items-center justify-between mb-2">

                            <p class="text-sm text-slate-400">
                                Semester Progress
                            </p>

                            <span class="text-sm font-bold text-blue-400">
                                {{ $semesterProgress }}%
                            </span>

                        </div>


                        <div class="w-full bg-slate-700 rounded-full h-2 overflow-hidden">

                            <div
                                class="bg-gradient-to-r from-blue-500 to-indigo-500 h-2 rounded-full transition-all duration-700"
                                style="width: {{ $semesterProgress }}%"
                            ></div>

                        </div>


                        @if($semesterStartDate && $semesterEndDate)

                            <div class="flex justify-between mt-2 text-xs text-slate-500">

                                <span>
                                    {{ \Carbon\Carbon::parse($semesterStartDate)->format('M d, Y') }}
                                </span>

                                <span>
                                    {{ \Carbon\Carbon::parse($semesterEndDate)->format('M d, Y') }}
                                </span>

                            </div>

                        @endif

                    </div>


                    <!-- Daily Tip -->

<div class="mt-7 bg-blue-900/40 rounded-2xl p-4">

    <h4 class="font-bold text-blue-400">
        💡 Daily Tip
    </h4>

    <p class="text-sm text-slate-300 mt-2 leading-relaxed">
        {{ $dailyTip ?? 'Stay consistent. Small progress every day becomes huge success.' }}
    </p>

</div>

                </div>

            </div>

        </nav>


        <!-- ===================================================== -->
        <!-- SIDEBAR FOOTER -->
        <!-- ===================================================== -->

        <div
            class="shrink-0 border-t border-white/5 p-4"
            x-show="sidebar || mobileSidebar"
            x-transition
        >

            <p class="text-center text-xs text-slate-500">
                CampusConnect v2.0
            </p>

        </div>

    </aside>


    <!-- ========================================================= -->
    <!-- MOBILE OVERLAY -->
    <!-- ========================================================= -->

    <div
        x-show="mobileSidebar"
        x-transition.opacity
        @click="mobileSidebar = false"
        class="fixed inset-0 z-40 bg-black/50 lg:hidden"
    ></div>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="min-h-screen lg:pl-24 bg-slate-100">


        <!-- ===================================================== -->
        <!-- DASHBOARD SEARCH BAR -->
        <!-- ===================================================== -->

        <div class="bg-slate-100">

            <div class="px-4 sm:px-6 lg:px-8 py-4">

                <div class="flex items-center gap-4">

                    <!-- MOBILE MENU -->

                    <button
                        @click="mobileSidebar = !mobileSidebar"
                        type="button"
                        class="lg:hidden w-11 h-11 shrink-0 rounded-xl bg-gray-100 hover:bg-blue-50 flex items-center justify-center text-xl transition"
                    >
                        ☰
                    </button>


                    <!-- SEARCH -->

                    <div class="relative flex-1 max-w-4xl mx-auto">

                        <svg
                            class="absolute left-5 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400 pointer-events-none"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14"
                            />

                        </svg>


                        <input
                            type="text"
                            name="dashboard_search"
                            id="dashboard_search"
                            placeholder="Search notes, hostels, businesses, marketplace..."
                            class="w-full pl-14 pr-5 py-3.5 rounded-2xl
                                   border border-gray-200
                                   bg-gray-50
                                   text-gray-700
                                   placeholder-gray-400
                                   focus:bg-white
                                   focus:ring-4
                                   focus:ring-blue-100
                                   focus:border-blue-500
                                   transition
                                   shadow-sm"
                        >

                    </div>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- CONTENT -->
        <!-- ===================================================== -->

        <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8">


            <!-- ================================================= -->
            <!-- HERO -->
            <!-- ================================================= -->

            <div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 rounded-3xl shadow-2xl overflow-hidden mb-10">

                <div class="px-6 lg:px-10 py-8 lg:py-10 flex flex-col lg:flex-row justify-between items-center">

                    <!-- LEFT -->

                    <div class="w-full">

                        <h1 class="text-3xl lg:text-4xl font-extrabold text-white">

                            👋 Hello, {{ Auth::user()->name }}

                        </h1>

                        <p class="text-blue-100 mt-3 text-base lg:text-lg">

                            Welcome back to CampusConnect.
                            Stay organized, productive and ahead of your semester.

                        </p>

                        <div class="mt-8 flex flex-wrap gap-4">

                            <a
                                href="{{ route('notes.index') }}"
                                class="bg-white text-blue-700 px-6 py-3 rounded-xl font-bold hover:scale-105 transition"
                            >
                                Browse Notes
                            </a>

                            <a
                                href="{{ route('marketplace.index') }}"
                                class="bg-blue-500 hover:bg-blue-400 text-white px-6 py-3 rounded-xl font-bold transition"
                            >
                                Marketplace
                            </a>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- REAL SEMESTER PROGRESS -->
                    <!-- ================================================= -->

                    <div class="mt-8 lg:mt-0 w-full lg:w-80 lg:ml-8 shrink-0">

                        <div class="bg-white/15 backdrop-blur-lg rounded-3xl p-6">

                            <div class="flex items-start justify-between gap-4">

                                <div>

                                    <h3 class="text-white font-bold text-lg">
                                        Semester Progress
                                    </h3>

                                    <p class="text-blue-100 text-sm mt-1">
                                        Keep pushing 💪
                                    </p>

                                </div>

                                <div class="bg-white/20 rounded-xl px-3 py-2">

                                    <span class="text-white font-extrabold text-lg">
                                        {{ $semesterProgress }}%
                                    </span>

                                </div>

                            </div>


                            <div class="mt-6">

                                <div class="flex justify-between text-sm text-blue-100 mb-2">

                                    <span>
                                        Completed
                                    </span>

                                    <span class="font-semibold">
                                        {{ $semesterProgress }}%
                                    </span>

                                </div>


                                <div class="w-full bg-white/20 rounded-full h-3 overflow-hidden">

                                    <div
                                        class="bg-white rounded-full h-3 transition-all duration-700"
                                        style="width: {{ $semesterProgress }}%"
                                    ></div>

                                </div>

                            </div>


                            @if($semesterStartDate && $semesterEndDate)

                                <div class="mt-5 flex items-center justify-between gap-3 text-xs text-blue-100">

                                    <div>

                                        <p class="opacity-70">
                                            Started
                                        </p>

                                        <p class="font-semibold text-white mt-1">
                                            {{ \Carbon\Carbon::parse($semesterStartDate)->format('M d, Y') }}
                                        </p>

                                    </div>


                                    <div class="text-right">

                                        <p class="opacity-70">
                                            Ends
                                        </p>

                                        <p class="font-semibold text-white mt-1">
                                            {{ \Carbon\Carbon::parse($semesterEndDate)->format('M d, Y') }}
                                        </p>

                                    </div>

                                </div>

                            @endif


                            <div class="grid grid-cols-2 gap-4 mt-8">

                                <div>

                                    <p class="text-3xl font-bold text-white">
                                        {{ $stats['notes'] ?? 0 }}
                                    </p>

                                    <p class="text-blue-100 text-sm">
                                        Notes
                                    </p>

                                </div>

                                <div>

                                    <p class="text-3xl font-bold text-white">
                                        {{ $stats['announcements'] ?? 0 }}
                                    </p>

                                    <p class="text-blue-100 text-sm">
                                        Updates
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- QUICK STATS -->
            <!-- ================================================= -->

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 lg:gap-8">


                <!-- NOTES -->

                <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Total Notes
                            </p>

                            <h2 class="text-4xl font-extrabold text-blue-600 mt-3">
                                {{ $stats['notes'] ?? 0 }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                            📚
                        </div>

                    </div>

                </div>


                <!-- BUSINESSES -->

                <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Businesses
                            </p>

                            <h2 class="text-4xl font-extrabold text-orange-500 mt-3">
                                {{ $stats['businesses'] ?? 0 }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">
                            🏪
                        </div>

                    </div>

                </div>


                <!-- RENTALS -->

                <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Rentals
                            </p>

                            <h2 class="text-4xl font-extrabold text-green-600 mt-3">
                                {{ $stats['accommodations'] ?? 0 }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">
                            🏡
                        </div>

                    </div>

                </div>


                <!-- ANNOUNCEMENTS -->

                <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500 text-sm">
                                Announcements
                            </p>

                            <h2 class="text-4xl font-extrabold text-red-500 mt-3">
                                {{ $stats['announcements'] ?? 0 }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center text-3xl">
                            📢
                        </div>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- QUICK ACCESS -->
            <!-- ================================================= -->

            <div class="mt-14">

                <div class="mb-8">

                    <h2 class="text-3xl lg:text-4xl font-extrabold text-gray-800">
                        Quick Access
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Everything you need in one place.
                    </p>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 lg:gap-8">


                    <!-- NOTES -->

                    <a
                        href="{{ route('notes.index') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-4xl">
                            📚
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Notes
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Browse lecture notes uploaded by students.
                        </p>

                    </a>


                    <!-- PAST PAPERS -->

                    <a
                        href="{{ route('pastpapers.index') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-4xl">
                            📄
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Past Papers
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Prepare using previous CATs and exams.
                        </p>

                    </a>


                    <!-- MARKETPLACE -->

                    <a
                        href="{{ route('marketplace.index') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-4xl">
                            🛒
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Marketplace
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Buy and sell with fellow students.
                        </p>

                    </a>


                    <!-- RENTALS -->

                    <a
                        href="{{ route('browse.rentals') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-4xl">
                            🏡
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Rentals
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Find affordable off-campus housing.
                        </p>

                    </a>


                    <!-- HOSTELS -->

                    <a
                        href="{{ route('campus.index') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center text-4xl">
                            🏫
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Hostels
                        </h3>

                        <p class="text-gray-500 mt-3">
                            View available campus hostels.
                        </p>

                    </a>


                    <!-- LOST & FOUND -->

                    <a
                        href="{{ route('lostfound.index') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center text-4xl">
                            🔍
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Lost & Found
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Recover or report lost items.
                        </p>

                    </a>


                    <!-- BUSINESSES -->

                    <a
                        href="{{ route('businesses.index') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-pink-100 flex items-center justify-center text-4xl">
                            🏪
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            Businesses
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Discover student businesses nearby.
                        </p>

                    </a>


                    <!-- PROFILE -->

                    <a
                        href="{{ route('profile.edit') }}"
                        class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300"
                    >

                        <div class="w-16 h-16 rounded-2xl bg-sky-100 flex items-center justify-center text-4xl">
                            👤
                        </div>

                        <h3 class="text-2xl font-bold mt-6">
                            My Profile
                        </h3>

                        <p class="text-gray-500 mt-3">
                            Update your account and settings.
                        </p>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- RECENT ACTIVITY -->
            <!-- ================================================= -->

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8 mt-16">


                <!-- RECENT ANNOUNCEMENTS -->

                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <div class="flex justify-between items-center mb-8">

                        <div>

                            <h2 class="text-2xl font-bold">
                                📢 Recent Announcements
                            </h2>

                            <p class="text-gray-500 text-sm mt-1">
                                Latest campus updates
                            </p>

                        </div>

                        <a
                            href="{{ route('announcements.index') }}"
                            class="text-blue-600 font-semibold hover:underline"
                        >
                            View All →
                        </a>

                    </div>


                    <div class="space-y-6">

                        @forelse($announcements->take(4) as $announcement)

                            <div class="border-b pb-5 last:border-none">

                                <h3 class="font-bold text-lg">
                                    {{ $announcement->title }}
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    {{ \Illuminate\Support\Str::limit($announcement->content, 90) }}
                                </p>

                                <small class="text-gray-400">
                                    {{ $announcement->created_at->diffForHumans() }}
                                </small>

                            </div>

                        @empty

                            <p class="text-gray-400">
                                No announcements available.
                            </p>

                        @endforelse

                    </div>

                </div>


                <!-- TRENDING NOTES -->

                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <div class="flex justify-between items-center mb-8">

                        <div>

                            <h2 class="text-2xl font-bold">
                                🔥 Trending Notes
                            </h2>

                            <p class="text-gray-500 text-sm mt-1">
                                Most viewed study materials
                            </p>

                        </div>

                        <a
                            href="{{ route('notes.index') }}"
                            class="text-blue-600 font-semibold hover:underline"
                        >
                            Browse →
                        </a>

                    </div>


                    <div class="space-y-5">

                        @forelse($trendingNotes as $note)

                            <div class="flex justify-between items-center border-b pb-5 last:border-none">

                                <div>

                                    <h3 class="font-bold">
                                        {{ $note->title }}
                                    </h3>

                                    <p class="text-gray-500 text-sm mt-2">
                                        By {{ $note->user->name }}
                                    </p>

                                </div>

                                <a
                                    href="{{ route('notes.preview', $note) }}"
                                    class="text-blue-600 font-semibold"
                                >
                                    Open →
                                </a>

                            </div>

                        @empty

                            <p class="text-gray-400">
                                No notes available.
                            </p>

                        @endforelse

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- FOOTER -->
            <!-- ================================================= -->

            <footer class="mt-16 bg-white border-t rounded-t-3xl">

                <div class="px-6 lg:px-10 py-8 flex flex-col md:flex-row justify-between items-center">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white text-xl shadow-lg">
                            🎓
                        </div>

                        <div>

                            <h3 class="text-xl font-bold text-gray-800">
                                CampusConnect
                            </h3>

                            <p class="text-gray-500 text-sm">
                                Your complete student companion.
                            </p>

                        </div>

                    </div>


                    <div class="flex items-center gap-4 mt-6 md:mt-0">

                        <a
                            href="#"
                            class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-blue-600 hover:text-white transition duration-300 flex items-center justify-center"
                        >
                            🌐
                        </a>

                        <a
                            href="#"
                            class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-sky-500 hover:text-white transition duration-300 flex items-center justify-center"
                        >
                            💬
                        </a>

                        <a
                            href="#"
                            class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-indigo-600 hover:text-white transition duration-300 flex items-center justify-center"
                        >
                            📧
                        </a>

                        <a
                            href="#"
                            class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-red-500 hover:text-white transition duration-300 flex items-center justify-center"
                        >
                            ❤️
                        </a>

                    </div>

                </div>


                <div class="border-t border-gray-100 px-6 lg:px-10 py-5 flex flex-col md:flex-row justify-between items-center gap-3">

                    <p class="text-sm text-gray-500">

                        © {{ date('Y') }}

                        <span class="font-semibold text-gray-700">
                            CampusConnect
                        </span>.

                        Built for students with LOVE.

                    </p>


                    <div class="flex items-center gap-5 text-sm text-gray-500">

                        <span class="hover:text-blue-600 cursor-pointer transition">
                            Privacy
                        </span>

                        <span class="hover:text-blue-600 cursor-pointer transition">
                            Terms
                        </span>

                        <span class="hover:text-blue-600 cursor-pointer transition">
                            Help
                        </span>

                        <span class="font-semibold text-blue-600">
                            v2.0
                        </span>

                    </div>

                </div>

            </footer>

        </div>

    </main>

</div>


<!-- ============================================================= -->
<!-- SIDEBAR STYLES -->
<!-- ============================================================= -->

<style>

    .sidebar-link {
        display: flex;
        align-items: center;
        min-height: 48px;
        border-radius: 14px;
        color: #cbd5e1;
        font-weight: 500;
        transition: all .2s ease;
        white-space: nowrap;
    }

    .sidebar-link:hover {
        background: rgba(59, 130, 246, .15);
        color: #ffffff;
    }

</style>


</x-app-layout>