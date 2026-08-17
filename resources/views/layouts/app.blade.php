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

    $role = optional(auth()->user()->roleRelation)->name;

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
            <!-- ACTIVITY -->
            <!-- ================================================= -->

            @if($role === 'Student')

                <div
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="mt-8"
                >

                    <div
                        class="rounded-3xl
                               bg-slate-800
                               border border-slate-700
                               p-5"
                    >

                        <h3 class="font-bold text-white mb-5">
                            📊 Your Activity
                        </h3>


                        <div class="space-y-4 text-sm">


                            <div class="flex justify-between">

                                <span class="text-slate-300">
                                    📚 Notes
                                </span>

                                <span class="font-bold text-blue-400">
                                    {{ $stats['notes'] ?? 0 }}
                                </span>

                            </div>


                            <div class="flex justify-between">

                                <span class="text-slate-300">
                                    🏡 Rentals
                                </span>

                                <span class="font-bold text-green-400">
                                    {{ $stats['accommodations'] ?? 0 }}
                                </span>

                            </div>


                            <div class="flex justify-between">

                                <span class="text-slate-300">
                                    🛒 Marketplace
                                </span>

                                <span class="font-bold text-orange-400">
                                    {{ $stats['marketplace'] ?? 0 }}
                                </span>

                            </div>


                            <div class="flex justify-between">

                                <span class="text-slate-300">
                                    📢 Announcements
                                </span>

                                <span class="font-bold text-red-400">
                                    {{ $stats['announcements'] ?? 0 }}
                                </span>

                            </div>


                            <div class="flex justify-between">

                                <span class="text-slate-300">
                                    💬 Messages
                                </span>

                                <span class="font-bold text-sky-400">
                                    {{ $stats['messages'] ?? 0 }}
                                </span>

                            </div>

                        </div>


                        <!-- PROGRESS -->

                        <div class="mt-7">

                            <p class="text-sm text-slate-400 mb-2">
                                Semester Progress
                            </p>

                            <div class="w-full bg-slate-700 rounded-full h-2">

                                <div
                                    class="bg-blue-500 h-2 rounded-full"
                                    style="width:78%"
                                ></div>

                            </div>

                            <p class="text-right text-sm text-slate-400 mt-2">
                                78%
                            </p>

                        </div>


                        <!-- DAILY TIP -->

                        <div
                            class="mt-7
                                   bg-blue-900/40
                                   rounded-2xl
                                   p-4"
                        >

                            <h4 class="font-bold text-blue-400">
                                💡 Daily Tip
                            </h4>

                            <p class="text-sm text-slate-300 mt-2">
                                Stay consistent. Small progress every day becomes huge success.
                            </p>

                        </div>

                    </div>

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


                    <!-- USER -->

                    <div
                        class="flex items-center gap-3
                               bg-gray-50
                               rounded-2xl
                               px-3 lg:px-4
                               py-2
                               shadow-sm"
                    >

                        <div
                            class="w-10 h-10
                                   rounded-full
                                   bg-gradient-to-r
                                   from-blue-600
                                   to-indigo-600
                                   text-white
                                   flex items-center justify-center
                                   font-bold"
                        >
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>


                        <div class="hidden md:block">

                            <p class="font-semibold text-sm">
                                {{ Auth::user()->name }}
                            </p>

                            <small class="text-gray-500">
                                {{ $role ?? 'User' }}
                            </small>

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

        transform: translateX(2px);

    }

</style>

</body>

</html>