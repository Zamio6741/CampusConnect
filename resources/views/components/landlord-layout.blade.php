@props(['title' => 'Landlord Portal'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }} - CampusConnect</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>


<body class="bg-slate-100 antialiased">

<div
    x-data="{
        sidebar: false,
        mobileSidebar: false
    }"
    class="min-h-screen"
>


    {{-- ========================================================= --}}
    {{-- DESKTOP + MOBILE SIDEBAR --}}
    {{-- ========================================================= --}}

    <aside

        {{-- Desktop hover --}}
        @mouseenter="sidebar = true"
        @mouseleave="sidebar = false"

        {{-- Mobile positioning --}}
        :class="mobileSidebar
            ? 'translate-x-0'
            : '-translate-x-full lg:translate-x-0'"

        class="fixed
               inset-y-0
               left-0
               z-50
               h-screen
               bg-slate-900
               text-white
               shadow-2xl
               flex
               flex-col
               overflow-hidden
               transition-all
               duration-300
               ease-in-out
               w-72
               lg:w-24"

        {{-- Desktop width --}}
        :style="window.innerWidth >= 1024
            ? (sidebar ? 'width:18rem' : 'width:6rem')
            : 'width:18rem'"

    >


        {{-- ===================================================== --}}
        {{-- SIDEBAR BRAND --}}
        {{-- ===================================================== --}}

        <div
            class="h-24
                   shrink-0
                   border-b border-slate-700
                   flex items-center"
        >


            {{-- COLLAPSED BRAND --}}

            <div
                x-show="!sidebar && !mobileSidebar"
                class="w-full flex justify-center"
            >

                <div
                    class="w-12 h-12
                           rounded-2xl
                           bg-gradient-to-r
                           from-sky-500
                           to-blue-600
                           flex items-center justify-center
                           text-2xl
                           font-bold
                           shadow-lg"
                >
                    C
                </div>

            </div>


            {{-- EXPANDED BRAND --}}

            <div
                x-show="sidebar || mobileSidebar"
                x-transition
                class="px-6
                       flex items-center
                       gap-3
                       whitespace-nowrap"
            >

                <div
                    class="w-11 h-11
                           rounded-xl
                           bg-gradient-to-r
                           from-sky-500
                           to-blue-600
                           flex items-center justify-center
                           text-xl
                           font-bold
                           shadow-lg
                           shrink-0"
                >
                    C
                </div>


                <div>

                    <h1 class="text-xl font-extrabold tracking-tight">
                        CampusConnect
                    </h1>

                    <p class="text-xs text-sky-300">
                        Landlord Portal
                    </p>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- LANDLORD USER --}}
        {{-- ===================================================== --}}

        <div
            class="shrink-0
                   border-b border-slate-700
                   px-4 py-5"
        >

            <div
                class="flex items-center"
                :class="sidebar || mobileSidebar
                    ? 'gap-4'
                    : 'justify-center'"
            >


                {{-- AVATAR --}}

                <div
                    class="w-11 h-11
                           rounded-full
                           bg-sky-600
                           flex items-center justify-center
                           text-lg
                           font-bold
                           shrink-0
                           shadow-lg"
                >

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>


                {{-- USER DETAILS --}}

                <div
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="min-w-0"
                >

                    <p class="font-bold text-white truncate">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Landlord
                    </p>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- NAVIGATION --}}
        {{-- ===================================================== --}}

        <nav
            class="flex-1
                   overflow-y-auto
                   overflow-x-hidden
                   px-3
                   py-6"
        >


            {{-- ================================================= --}}
            {{-- DASHBOARD --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('landlord.dashboard') }}"

                class="landlord-sidebar-link
                       {{ request()->routeIs('landlord.dashboard')
                            ? 'active'
                            : '' }}"

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
                    class="font-semibold whitespace-nowrap"
                >
                    Dashboard
                </span>

            </a>


            {{-- ================================================= --}}
            {{-- ADD RENTAL --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('rental.step1') }}"

                class="landlord-sidebar-link
                       {{ request()->routeIs('rental.*')
                            ? 'active'
                            : '' }}"

                :class="sidebar || mobileSidebar
                    ? 'justify-start px-4 gap-4'
                    : 'justify-center'"
            >

                <span class="text-xl shrink-0">
                    ➕
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="font-semibold whitespace-nowrap"
                >
                    Add Rental
                </span>

            </a>


            {{-- ================================================= --}}
            {{-- MY RENTALS --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('rentals.index') }}"

                class="landlord-sidebar-link
                       {{ request()->routeIs('rentals.*')
                            ? 'active'
                            : '' }}"

                :class="sidebar || mobileSidebar
                    ? 'justify-start px-4 gap-4'
                    : 'justify-center'"
            >

                <span class="text-xl shrink-0">
                    🏢
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="font-semibold whitespace-nowrap"
                >
                    My Rentals
                </span>

            </a>


            {{-- ================================================= --}}
            {{-- BOOKINGS --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('landlord.bookings') }}"

                class="landlord-sidebar-link
                       {{ request()->routeIs('landlord.bookings*')
                            ? 'active'
                            : '' }}"

                :class="sidebar || mobileSidebar
                    ? 'justify-start px-4 gap-4'
                    : 'justify-center'"
            >

                <span class="text-xl shrink-0">
                    📅
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="font-semibold whitespace-nowrap"
                >
                    Bookings
                </span>

            </a>


            {{-- ================================================= --}}
            {{-- PROFILE --}}
            {{-- ================================================= --}}

            <a
                href="{{ route('landlord.profile') }}"

                class="landlord-sidebar-link
                       {{ request()->routeIs('landlord.profile')
                            ? 'active'
                            : '' }}"

                :class="sidebar || mobileSidebar
                    ? 'justify-start px-4 gap-4'
                    : 'justify-center'"
            >

                <span class="text-xl shrink-0">
                    👤
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="font-semibold whitespace-nowrap"
                >
                    Profile
                </span>

            </a>

        </nav>


        {{-- ===================================================== --}}
        {{-- LOGOUT --}}
        {{-- ===================================================== --}}

        <div
            class="shrink-0
                   border-t border-slate-700
                   p-3"
        >

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"

                    class="landlord-logout-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"
                >

                    <span class="text-xl shrink-0">
                        🚪
                    </span>

                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="font-semibold whitespace-nowrap"
                    >
                        Log Out
                    </span>

                </button>

            </form>

        </div>

    </aside>


    {{-- ========================================================= --}}
    {{-- MOBILE OVERLAY --}}
    {{-- ========================================================= --}}

    <div

        x-show="mobileSidebar"

        x-transition.opacity

        @click="mobileSidebar = false"

        class="fixed
               inset-0
               z-40
               bg-black/60
               backdrop-blur-sm
               lg:hidden"

    ></div>


    {{-- ========================================================= --}}
    {{-- MAIN APPLICATION --}}
    {{-- ========================================================= --}}

    <main
        class="min-h-screen
               transition-all
               duration-300"
    >


        {{-- ===================================================== --}}
        {{-- MOBILE TOP BAR --}}
        {{-- ===================================================== --}}

        <header
            class="lg:hidden
                   fixed
                   top-0
                   left-0
                   right-0
                   z-30
                   bg-slate-900
                   text-white
                   shadow-lg"
        >

            <div
                class="px-4 py-3
                       flex items-center
                       justify-between"
            >


                {{-- MOBILE MENU BUTTON --}}

                <button
                    type="button"

                    @click="mobileSidebar = true"

                    class="w-11 h-11
                           rounded-xl
                           bg-slate-800
                           hover:bg-sky-600
                           flex items-center
                           justify-center
                           text-xl
                           transition"

                    aria-label="Open landlord navigation"
                >

                    ☰

                </button>


                {{-- BRAND --}}

                <div class="text-center">

                    <h1 class="text-lg font-extrabold text-sky-400">
                        CampusConnect
                    </h1>

                    <p class="text-[10px] text-slate-400">
                        Landlord Portal
                    </p>

                </div>


                {{-- PROFILE --}}

                <a
                    href="{{ route('landlord.profile') }}"

                    class="w-10 h-10
                           rounded-full
                           bg-sky-600
                           flex items-center
                           justify-center
                           font-bold
                           shadow-lg"
                >

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </a>

            </div>

        </header>


        {{-- ===================================================== --}}
        {{-- PAGE CONTENT --}}
        {{-- ===================================================== --}}

        <div class="pt-20 lg:pt-0 lg:pl-24">

            {{ $slot }}

        </div>

    </main>


    {{-- ========================================================= --}}
    {{-- SIDEBAR STYLES --}}
    {{-- ========================================================= --}}

    <style>

        .landlord-sidebar-link {

            display: flex;

            align-items: center;

            min-height: 50px;

            margin-bottom: 8px;

            border-radius: 14px;

            color: #cbd5e1;

            transition:
                background-color .2s ease,
                color .2s ease,
                transform .2s ease,
                box-shadow .2s ease;

            white-space: nowrap;

        }


        .landlord-sidebar-link:hover {

            background: rgba(14, 165, 233, .15);

            color: #ffffff;

            transform: translateX(2px);

        }


        .landlord-sidebar-link.active {

            background:
                linear-gradient(
                    135deg,
                    #0284c7,
                    #0369a1
                );

            color: #ffffff;

            box-shadow:
                0 10px 25px
                rgba(2, 132, 199, .25);

        }


        .landlord-logout-link {

            width: 100%;

            display: flex;

            align-items: center;

            min-height: 50px;

            border-radius: 14px;

            color: #cbd5e1;

            transition:
                background-color .2s ease,
                color .2s ease,
                transform .2s ease;

            white-space: nowrap;

        }


        .landlord-logout-link:hover {

            background: #dc2626;

            color: #ffffff;

            transform: translateX(2px);

        }


        /* ===================================================== */
        /* SIDEBAR SCROLLBAR */
        /* ===================================================== */

        aside nav::-webkit-scrollbar {

            width: 5px;

        }


        aside nav::-webkit-scrollbar-track {

            background: transparent;

        }


        aside nav::-webkit-scrollbar-thumb {

            background: #334155;

            border-radius: 999px;

        }


        aside nav::-webkit-scrollbar-thumb:hover {

            background: #475569;

        }

    </style>


</div>


</body>

</html>