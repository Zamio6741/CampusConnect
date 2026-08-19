<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CampusConnect') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="font-sans antialiased">

@php

    /*
    |--------------------------------------------------------------------------
    | USER ROLE
    |--------------------------------------------------------------------------
    */

    $role = optional(auth()->user()->roleRelation)->name;


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ROUTE
    |--------------------------------------------------------------------------
    */

    $dashboardRoute = match ($role) {

        'Student' =>
            Route::has('student.dashboard')
                ? route('student.dashboard')
                : route('dashboard'),

        'Landlord' =>
            Route::has('landlord.dashboard')
                ? route('landlord.dashboard')
                : route('dashboard'),

        'Business Owner' =>
            Route::has('business.dashboard')
                ? route('business.dashboard')
                : route('dashboard'),

        'Admin' =>
            Route::has('admin.dashboard')
                ? route('admin.dashboard')
                : route('dashboard'),

        default => route('dashboard'),

    };


    /*
    |--------------------------------------------------------------------------
    | SAFE SEMESTER DEFAULTS
    |--------------------------------------------------------------------------
    */

    $semesterProgress = isset($semesterProgress)
        ? max(0, min(100, (int) $semesterProgress))
        : 0;

    $semesterStartDate = $semesterStartDate ?? null;

    $semesterEndDate = $semesterEndDate ?? null;

    $semesterDaysRemaining = $semesterDaysRemaining ?? null;

    $semesterStarted = $semesterStarted ?? false;

    $semesterCompleted = $semesterCompleted ?? false;


    /*
    |--------------------------------------------------------------------------
    | DAILY QUOTES
    |--------------------------------------------------------------------------
    */

    $semesterMessages = $semesterMessages ?? [
        '💪 Keep pushing! Small progress every day matters.',
        '📚 Stay consistent with your studies.',
        '🎯 Set your goals and keep moving forward.',
        '🧠 Learn something new today.',
        '🔥 Stay focused. Your future self will thank you.',
        '🚀 Great things are built one step at a time.',
    ];

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

        :class="mobileSidebar
            ? 'translate-x-0'
            : '-translate-x-full lg:translate-x-0'"

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


            <!-- COLLAPSED LOGO -->

            <div
                x-show="!sidebar && !mobileSidebar"
                class="w-full flex justify-center"
            >

                <div
                    class="w-12 h-12 rounded-2xl
                           bg-gradient-to-r from-blue-600 to-indigo-600
                           flex items-center justify-center
                           text-2xl
                           shadow-lg"
                >
                    🎓
                </div>

            </div>


            <!-- EXPANDED LOGO -->

            <div
                x-show="sidebar || mobileSidebar"
                x-transition
                class="px-6 flex items-center gap-3 whitespace-nowrap"
            >

                <div
                    class="w-11 h-11 rounded-xl
                           bg-gradient-to-r from-blue-600 to-indigo-600
                           flex items-center justify-center
                           text-xl
                           shadow-lg
                           shrink-0"
                >
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


            <!-- ================================================= -->
            <!-- DASHBOARD -->
            <!-- ================================================= -->

            <a
                href="{{ $dashboardRoute }}"

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
                    class="px-3 mb-3
                           text-xs font-bold uppercase
                           tracking-widest
                           text-slate-400
                           whitespace-nowrap"
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
                    <!-- SEMESTER SETTINGS -->
                    <!-- ================================================= -->

                    @if(Route::has('semester.edit'))

                        <a
                            href="{{ route('semester.edit') }}"
                            class="sidebar-link
                                   bg-blue-500/10
                                   hover:bg-blue-500/20"

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

                    @endif

                </div>

            </div>


            <!-- ================================================= -->
            <!-- STUDENT LIFE -->
            <!-- ================================================= -->

            <div class="mb-6">

                <p
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="px-3 mb-3
                           text-xs font-bold uppercase
                           tracking-widest
                           text-slate-400
                           whitespace-nowrap"
                >
                    🏡 Student Life
                </p>


                <div class="space-y-2">


                    <!-- HOSTELS -->

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
                    class="px-3 mb-3
                           text-xs font-bold uppercase
                           tracking-widest
                           text-slate-400
                           whitespace-nowrap"
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

            @if(Route::has('student.messages'))

                <div class="mb-6">

                    <p
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="px-3 mb-3
                               text-xs font-bold uppercase
                               tracking-widest
                               text-slate-400
                               whitespace-nowrap"
                    >
                        💬 Communication
                    </p>


                    <div class="space-y-2">

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

            @endif


            <!-- ================================================= -->
            <!-- STUDENT ACTIVITY -->
            <!-- ================================================= -->

            @if($role === 'Student')

                <div
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="mt-8"
                >


                    <!-- ================================================= -->
                    <!-- YOUR ACTIVITY -->
                    <!-- ================================================= -->

                    <div
                        class="rounded-3xl
                               bg-slate-800
                               border border-slate-700
                               p-5
                               mb-5"
                    >

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

                    </div>


                    <!-- ================================================= -->
                    <!-- SEMESTER PROGRESS -->
                    <!-- ================================================= -->

                    <div
                        class="rounded-3xl
                               bg-slate-800
                               border border-slate-700
                               p-5
                               mb-5"
                    >

                        <div class="flex items-center justify-between mb-4">

                            <h3 class="font-bold text-white">
                                📈 Semester Progress
                            </h3>

                            <span class="text-sm font-bold text-blue-400">
                                {{ $semesterProgress }}%
                            </span>

                        </div>


                        <!-- PROGRESS BAR -->

                        <div
                            class="w-full
                                   bg-slate-700
                                   rounded-full
                                   h-3
                                   overflow-hidden"
                        >

                            <div
                                class="bg-gradient-to-r
                                       from-blue-500
                                       to-indigo-500
                                       h-3
                                       rounded-full
                                       transition-all duration-700"
                                style="width: {{ $semesterProgress }}%"
                            ></div>

                        </div>


                        <!-- STATUS -->

                        <div class="mt-4">

                            @if($semesterCompleted)

                                <p class="text-sm text-green-400 font-semibold">
                                    🎉 Semester completed!
                                </p>

                            @elseif($semesterStarted)

                                <p class="text-sm text-slate-300">

                                    ⏳

                                    @if($semesterDaysRemaining !== null)

                                        {{ $semesterDaysRemaining }}
                                        {{ $semesterDaysRemaining == 1 ? 'day' : 'days' }}
                                        remaining

                                    @else

                                        Semester in progress

                                    @endif

                                </p>

                            @elseif($semesterStartDate)

                                <p class="text-sm text-slate-300">
                                    🎓 Semester has not started yet.
                                </p>

                            @else

                                <p class="text-sm text-slate-400">
                                    📅 Set your semester dates below.
                                </p>

                            @endif

                        </div>


                        <!-- DATES -->

                        @if($semesterStartDate || $semesterEndDate)

                            <div
                                class="mt-4
                                       pt-4
                                       border-t border-slate-700
                                       space-y-2
                                       text-xs"
                            >

                                @if($semesterStartDate)

                                    <div class="flex justify-between">

                                        <span class="text-slate-400">
                                            Start
                                        </span>

                                        <span class="text-slate-200">
                                            {{ \Carbon\Carbon::parse($semesterStartDate)->format('M d, Y') }}
                                        </span>

                                    </div>

                                @endif


                                @if($semesterEndDate)

                                    <div class="flex justify-between">

                                        <span class="text-slate-400">
                                            End
                                        </span>

                                        <span class="text-slate-200">
                                            {{ \Carbon\Carbon::parse($semesterEndDate)->format('M d, Y') }}
                                        </span>

                                    </div>

                                @endif

                            </div>

                        @endif


                        <!-- ================================================= -->
                        <!-- SEMESTER SETTINGS BUTTON -->
                        <!-- ================================================= -->

                        @if(Route::has('semester.edit'))

                            <a
                                href="{{ route('semester.edit') }}"
                                class="mt-5
                                       flex items-center justify-center gap-2
                                       w-full
                                       rounded-xl
                                       bg-blue-600
                                       hover:bg-blue-500
                                       text-white
                                       font-semibold
                                       text-sm
                                       py-3
                                       transition
                                       shadow-lg
                                       hover:shadow-blue-500/20"
                            >

                                <span>
                                    ⚙️
                                </span>

                                <span>
                                    Semester Settings
                                </span>

                            </a>

                        @endif

                    </div>


                    <!-- ================================================= -->
                    <!-- DAILY QUOTE -->
                    <!-- ================================================= -->

                    <div
                        class="rounded-3xl
                               bg-gradient-to-br
                               from-blue-900/70
                               to-indigo-900/70
                               border border-blue-800/50
                               p-5
                               mb-5"
                    >

                        <div class="flex items-center gap-2 mb-3">

                            <span class="text-xl">
                                💡
                            </span>

                            <h4 class="font-bold text-blue-300">
                                Daily Quote
                            </h4>

                        </div>


                        <div
                            x-data="{
                                messages: @js($semesterMessages),
                                current: 0,

                                init() {

                                    if (this.messages.length > 1) {

                                        setInterval(() => {

                                            this.current =
                                                (this.current + 1)
                                                % this.messages.length;

                                        }, 7000);

                                    }

                                }
                            }"
                        >

                            <p
                                class="text-sm
                                       text-slate-200
                                       leading-relaxed
                                       min-h-[48px]"
                                x-text="messages[current]"
                            ></p>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- QUICK SEMESTER SETTINGS -->
                    <!-- ================================================= -->

                    @if(Route::has('semester.edit'))

                        <a
                            href="{{ route('semester.edit') }}"
                            class="flex items-center gap-3
                                   rounded-2xl
                                   border border-slate-700
                                   bg-slate-800
                                   hover:bg-slate-700
                                   px-4 py-3
                                   text-sm
                                   text-slate-200
                                   transition"
                        >

                            <span class="text-lg">
                                📅
                            </span>

                            <div>

                                <p class="font-semibold text-white">
                                    Semester Settings
                                </p>

                                <p class="text-xs text-slate-400">
                                    Update your semester dates
                                </p>

                            </div>

                        </a>

                    @endif

                </div>

            @endif

        </nav>


        <!-- ===================================================== -->
        <!-- SIDEBAR FOOTER -->
        <!-- ===================================================== -->

        <div
            class="shrink-0
                   border-t border-white/5
                   p-4"
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
    <!-- MAIN APPLICATION -->
    <!-- ========================================================= -->

    <main class="min-h-screen lg:pl-24">


        <!-- ===================================================== -->
        <!-- TOP BAR -->
        <!-- ===================================================== -->

        <header
            class="bg-white
                   border-b border-gray-200
                   sticky top-0
                   z-30"
        >

            <div
                class="flex items-center justify-between
                       px-5 lg:px-10
                       py-4"
            >


                <!-- LEFT -->

                <div class="flex items-center gap-4">


                    <!-- MOBILE MENU -->

                    <button
                        @click="mobileSidebar = !mobileSidebar"
                        type="button"
                        class="lg:hidden
                               w-11 h-11
                               rounded-xl
                               bg-gray-100
                               hover:bg-blue-50
                               flex items-center justify-center
                               text-xl
                               transition"
                        aria-label="Open navigation menu"
                    >
                        ☰
                    </button>


                    <!-- PAGE BRAND -->

                    <div class="hidden sm:flex items-center gap-3">

                        <div
                            class="w-10 h-10
                                   rounded-xl
                                   bg-gradient-to-r
                                   from-blue-600
                                   to-indigo-600
                                   flex items-center justify-center
                                   text-white
                                   shadow"
                        >
                            🎓
                        </div>

                        <div>

                            <h1 class="font-extrabold text-lg text-gray-800">
                                CampusConnect
                            </h1>

                            <p class="text-xs text-gray-400">
                                Student Portal
                            </p>

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->

                <div class="flex items-center gap-3">


                    <!-- NOTIFICATIONS -->

                    @if(Route::has('notifications.index'))

                        <a
                            href="{{ route('notifications.index') }}"
                            class="relative
                                   w-11 h-11
                                   rounded-xl
                                   bg-gray-100
                                   hover:bg-blue-50
                                   hover:shadow-lg
                                   flex items-center justify-center
                                   transition"
                        >

                            🔔

                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    class="absolute
                                           -top-2 -right-2
                                           bg-red-500
                                           text-white
                                           text-xs
                                           rounded-full
                                           w-6 h-6
                                           flex items-center justify-center
                                           font-bold"
                                >
                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                                </span>

                            @endif

                        </a>

                    @endif


                    <!-- USER DROPDOWN -->

<div
    class="relative"
    x-data="{ userMenu: false }"
    @click.outside="userMenu = false"
>

    <!-- USER BUTTON -->

    <button
        type="button"
        @click="userMenu = !userMenu"
        class="flex items-center gap-3
               bg-gray-50
               hover:bg-blue-50
               border border-gray-200
               hover:border-blue-200
               rounded-2xl
               px-3 lg:px-4
               py-2
               shadow-sm
               hover:shadow-md
               transition-all duration-200
               focus:outline-none
               focus:ring-2
               focus:ring-blue-500/30"
        aria-label="Open user menu"
        :aria-expanded="userMenu"
    >

        <!-- AVATAR -->

        <div
            class="w-10 h-10
                   rounded-full
                   bg-gradient-to-r
                   from-blue-600
                   to-indigo-600
                   text-white
                   flex items-center justify-center
                   font-bold
                   shrink-0"
        >
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>


        <!-- USER DETAILS -->

        <div class="hidden md:block text-left">

            <p class="font-semibold text-sm text-gray-800">
                {{ Auth::user()->name }}
            </p>

            <small class="text-gray-500">
                {{ $role ?? 'User' }}
            </small>

        </div>


        <!-- CHEVRON -->

        <svg
            class="w-4 h-4 text-gray-500
                   transition-transform duration-200"
            :class="{ 'rotate-180': userMenu }"
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7"
            />
        </svg>

    </button>


    <!-- DROPDOWN -->

    <div
        x-show="userMenu"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 scale-95 translate-y-2"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-2"
        class="absolute right-0 mt-3
               w-64
               bg-white
               rounded-2xl
               shadow-2xl
               border border-gray-200
               overflow-hidden
               z-50"
        style="display: none;"
    >

        <!-- DROPDOWN HEADER -->

        <div
            class="px-5 py-4
                   bg-gradient-to-r
                   from-blue-600
                   to-indigo-600
                   text-white"
        >

            <p class="font-bold text-sm">
                {{ Auth::user()->name }}
            </p>

            <p class="text-xs text-blue-100 mt-1">
                {{ Auth::user()->email }}
            </p>

        </div>


        <!-- MENU -->

        <div class="p-2">

            <!-- PROFILE -->

            @if(Route::has('profile.edit'))

                <a
                    href="{{ route('profile.edit') }}"
                    @click="userMenu = false"
                    class="flex items-center gap-3
                           px-4 py-3
                           rounded-xl
                           text-gray-700
                           hover:bg-blue-50
                           hover:text-blue-700
                           transition"
                >

                    <span
                        class="w-9 h-9
                               rounded-lg
                               bg-blue-100
                               text-blue-600
                               flex items-center justify-center
                               text-lg"
                    >
                        👤
                    </span>

                    <div>

                        <p class="font-semibold text-sm">
                            Profile
                        </p>

                        <p class="text-xs text-gray-400">
                            Manage your account
                        </p>

                    </div>

                </a>

            @endif


            <!-- LOGOUT -->

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    @click="userMenu = false"
                    class="w-full
                           flex items-center gap-3
                           px-4 py-3
                           rounded-xl
                           text-gray-700
                           hover:bg-red-50
                           hover:text-red-600
                           transition
                           text-left"
                >

                    <span
                        class="w-9 h-9
                               rounded-lg
                               bg-red-100
                               text-red-600
                               flex items-center justify-center
                               text-lg"
                    >
                        🚪
                    </span>

                    <div>

                        <p class="font-semibold text-sm">
                            Log Out
                        </p>

                        <p class="text-xs text-gray-400">
                            Sign out of your account
                        </p>

                    </div>

                </button>

            </form>

        </div>

    </div>

</div>

                </div>

            </div>

        </header>


        <!-- ===================================================== -->
        <!-- PAGE CONTENT -->
        <!-- ===================================================== -->

        <div class="min-h-screen">

            {{ $slot }}

        </div>


    </main>


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

            transform: translateX(2px);

        }

    </style>


</body>

</html>