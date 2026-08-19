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
    | BUSINESS DASHBOARD ROUTE
    |--------------------------------------------------------------------------
    */

    $dashboardRoute = Route::has('business.dashboard')
        ? route('business.dashboard')
        : route('dashboard');


    /*
    |--------------------------------------------------------------------------
    | BUSINESS INSTANCE
    |--------------------------------------------------------------------------
    |
    | The dashboard already provides $business.
    | The fallback attempts to retrieve the user's business relationship.
    |
    */

    $businessForLayout = $business ?? optional(auth()->user())->business;

@endphp


<div
    x-data="{
        sidebar: false,
        mobileSidebar: false
    }"
    class="min-h-screen bg-slate-100"
>


    <!-- ========================================================= -->
    <!-- BUSINESS SIDEBAR -->
    <!-- ========================================================= -->

    <aside

        @mouseenter="sidebar = true"

        @mouseleave="sidebar = false"

        :class="mobileSidebar
            ? 'translate-x-0'
            : '-translate-x-full lg:translate-x-0'"

        class="fixed inset-y-0 left-0 z-50
               h-screen
               bg-slate-900
               text-white
               transition-all
               duration-300
               ease-in-out
               flex
               flex-col
               shadow-2xl
               overflow-hidden
               w-72
               lg:w-24"

        :style="window.innerWidth >= 1024
            ? (sidebar ? 'width:18rem' : 'width:6rem')
            : 'width:18rem'"

    >


        <!-- ===================================================== -->
        <!-- SIDEBAR HEADER -->
        <!-- ===================================================== -->

        <div
            class="h-24
                   flex
                   items-center
                   shrink-0
                   border-b
                   border-white/5"
        >

            <!-- COLLAPSED LOGO -->

            <div
                x-show="!sidebar && !mobileSidebar"
                class="w-full flex justify-center"
            >

                <div
                    class="w-12
                           h-12
                           rounded-2xl
                           bg-gradient-to-r
                           from-blue-600
                           to-indigo-600
                           flex
                           items-center
                           justify-center
                           text-2xl
                           shadow-lg"
                >

                    🏪

                </div>

            </div>


            <!-- EXPANDED LOGO -->

            <div
                x-show="sidebar || mobileSidebar"
                x-transition
                class="px-6
                       flex
                       items-center
                       gap-3
                       whitespace-nowrap"
            >

                <div
                    class="w-11
                           h-11
                           rounded-xl
                           bg-gradient-to-r
                           from-blue-600
                           to-indigo-600
                           flex
                           items-center
                           justify-center
                           text-xl
                           shadow-lg
                           shrink-0"
                >

                    🏪

                </div>


                <div>

                    <h1
                        class="text-xl
                               font-extrabold
                               tracking-tight"
                    >

                        CampusConnect

                    </h1>


                    <p
                        class="text-xs
                               text-blue-300"
                    >

                        Business Portal

                    </p>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- BUSINESS OWNER -->
        <!-- ===================================================== -->

        <div
            x-show="sidebar || mobileSidebar"
            x-transition
            class="px-5
                   py-6
                   border-b
                   border-white/5"
        >

            <div
                class="flex
                       items-center
                       gap-3"
            >

                <div
                    class="w-12
                           h-12
                           rounded-full
                           bg-gradient-to-r
                           from-blue-500
                           to-indigo-600
                           flex
                           items-center
                           justify-center
                           text-white
                           font-bold
                           text-lg
                           shrink-0"
                >

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>


                <div class="min-w-0">

                    <p
                        class="font-bold
                               text-sm
                               truncate"
                    >

                        {{ Auth::user()->name }}

                    </p>


                    <p
                        class="text-xs
                               text-slate-400
                               mt-1"
                    >

                        Business Owner

                    </p>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- NAVIGATION -->
        <!-- ===================================================== -->

        <nav
            class="flex-1
                   overflow-y-auto
                   overflow-x-hidden
                   px-3
                   py-6"
        >


            <!-- ================================================= -->
            <!-- DASHBOARD -->
            <!-- ================================================= -->

            @if(Route::has('business.dashboard'))

                <a
                    href="{{ route('business.dashboard') }}"

                    class="sidebar-link
                           mb-3"

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

            @endif


            <!-- ================================================= -->
            <!-- BUSINESS PROFILE -->
            <!-- ================================================= -->

            @if(Route::has('business.profile'))

                <a
                    href="{{ route('business.profile') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        🏪
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Business Profile

                    </span>

                </a>

            @endif


            <!-- ================================================= -->
            <!-- GALLERY -->
            <!-- ================================================= -->

            @if(Route::has('business.gallery') && $businessForLayout)

                <a
                    href="{{ route('business.gallery', $businessForLayout) }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        🖼
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Gallery

                    </span>

                </a>

            @endif


            <!-- ================================================= -->
            <!-- PRODUCTS -->
            <!-- ================================================= -->

            @if(Route::has('products.index'))

                <a
                    href="{{ route('products.index') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        🛍
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Products

                    </span>

                </a>

            @endif


            <!-- ================================================= -->
            <!-- ADVERTISEMENTS -->
            <!-- ================================================= -->

            @if(Route::has('business.advertisements.index'))

                <a
                    href="{{ route('business.advertisements.index') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        📢
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Advertisements

                    </span>

                </a>

            @endif


            <!-- ================================================= -->
            <!-- ANALYTICS -->
            <!-- ================================================= -->

            @if(Route::has('business.analytics'))

                <a
                    href="{{ route('business.analytics') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        📈
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Analytics

                    </span>

                </a>

            @endif


            <!-- ================================================= -->
            <!-- MESSAGES -->
            <!-- ================================================= -->

            @if(Route::has('business.messages'))

                <a
                    href="{{ route('business.messages') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
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

            @endif


            <!-- ================================================= -->
            <!-- REVIEWS -->
            <!-- ================================================= -->

            @if(Route::has('business.reviews'))

                <a
                    href="{{ route('business.reviews') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        ⭐
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Reviews

                    </span>

                </a>

            @endif


            <!-- ================================================= -->
            <!-- NOTIFICATIONS -->
            <!-- ================================================= -->

            @if(Route::has('business.notifications'))

                <a
                    href="{{ route('business.notifications') }}"

                    class="sidebar-link"

                    :class="sidebar || mobileSidebar
                        ? 'justify-start px-4 gap-4'
                        : 'justify-center'"

                >

                    <span class="text-xl shrink-0">
                        🔔
                    </span>


                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >

                        Notifications

                    </span>

                </a>

            @endif

        </nav>


        <!-- ===================================================== -->
        <!-- SIDEBAR FOOTER -->
        <!-- ===================================================== -->

        <div
            class="shrink-0
                   border-t
                   border-white/5
                   p-4"
            x-show="sidebar || mobileSidebar"
            x-transition
        >

            <p
                class="text-center
                       text-xs
                       text-slate-500"
            >

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
        class="fixed
               inset-0
               z-40
               bg-black/50
               lg:hidden"
    ></div>


    <!-- ========================================================= -->
    <!-- MAIN -->
    <!-- ========================================================= -->

    <main
        class="min-h-screen
               lg:pl-24"
    >


        <!-- ===================================================== -->
        <!-- TOP BAR -->
        <!-- ===================================================== -->

        <header
            class="bg-white
                   border-b
                   border-gray-200
                   sticky
                   top-0
                   z-30"
        >

            <div
                class="flex
                       items-center
                       justify-between
                       px-5
                       lg:px-10
                       py-4"
            >


                <!-- LEFT -->

                <div
                    class="flex
                           items-center
                           gap-4"
                >


                    <!-- MOBILE MENU -->

                    <button
                        @click="mobileSidebar = !mobileSidebar"
                        type="button"
                        class="lg:hidden
                               w-11
                               h-11
                               rounded-xl
                               bg-gray-100
                               hover:bg-blue-50
                               flex
                               items-center
                               justify-center
                               text-xl
                               transition"
                        aria-label="Open navigation menu"
                    >

                        ☰

                    </button>


                    <!-- BRAND -->

                    <div
                        class="hidden
                               sm:flex
                               items-center
                               gap-3"
                    >

                        <div
                            class="w-10
                                   h-10
                                   rounded-xl
                                   bg-gradient-to-r
                                   from-blue-600
                                   to-indigo-600
                                   flex
                                   items-center
                                   justify-center
                                   text-white
                                   shadow"
                        >

                            🏪

                        </div>


                        <div>

                            <h1
                                class="font-extrabold
                                       text-lg
                                       text-gray-800"
                            >

                                CampusConnect

                            </h1>


                            <p
                                class="text-xs
                                       text-gray-400"
                            >

                                Business Portal

                            </p>

                        </div>

                    </div>

                </div>


                <!-- RIGHT -->

                <div
                    class="flex
                           items-center
                           gap-3"
                >


                    <!-- BUSINESS NOTIFICATIONS -->

                    @if(Route::has('business.notifications'))

                        <a
                            href="{{ route('business.notifications') }}"
                            class="relative
                                   w-11
                                   h-11
                                   rounded-xl
                                   bg-gray-100
                                   hover:bg-blue-50
                                   hover:shadow-lg
                                   flex
                                   items-center
                                   justify-center
                                   transition"
                            title="Notifications"
                        >

                            🔔

                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    class="absolute
                                           -top-2
                                           -right-2
                                           bg-red-500
                                           text-white
                                           text-xs
                                           rounded-full
                                           w-6
                                           h-6
                                           flex
                                           items-center
                                           justify-center
                                           font-bold"
                                >

                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}

                                </span>

                            @endif

                        </a>

                    @endif


                    <!-- USER MENU -->

                    <div
                        class="relative"
                        x-data="{ userMenu: false }"
                        @click.outside="userMenu = false"
                    >


                        <button
                            type="button"
                            @click="userMenu = !userMenu"
                            class="flex
                                   items-center
                                   gap-3
                                   bg-gray-50
                                   hover:bg-blue-50
                                   border
                                   border-gray-200
                                   hover:border-blue-200
                                   rounded-2xl
                                   px-3
                                   lg:px-4
                                   py-2
                                   shadow-sm
                                   hover:shadow-md
                                   transition-all
                                   duration-200
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-blue-500/30"
                            :aria-expanded="userMenu"
                        >


                            <div
                                class="w-10
                                       h-10
                                       rounded-full
                                       bg-gradient-to-r
                                       from-blue-600
                                       to-indigo-600
                                       text-white
                                       flex
                                       items-center
                                       justify-center
                                       font-bold
                                       shrink-0"
                            >

                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                            </div>


                            <div
                                class="hidden
                                       md:block
                                       text-left"
                            >

                                <p
                                    class="font-semibold
                                           text-sm
                                           text-gray-800"
                                >

                                    {{ Auth::user()->name }}

                                </p>


                                <small
                                    class="text-gray-500"
                                >

                                    Business Owner

                                </small>

                            </div>


                            <svg
                                class="w-4
                                       h-4
                                       text-gray-500
                                       transition-transform
                                       duration-200"
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


                        <!-- ================================================= -->
                        <!-- USER DROPDOWN -->
                        <!-- ================================================= -->

                        <div
                            x-show="userMenu"
                            x-transition
                            class="absolute
                                   right-0
                                   mt-3
                                   w-64
                                   bg-white
                                   rounded-2xl
                                   shadow-2xl
                                   border
                                   border-gray-200
                                   overflow-hidden
                                   z-50"
                            style="display: none;"
                        >


                            <!-- USER INFO -->

                            <div
                                class="px-5
                                       py-4
                                       bg-gradient-to-r
                                       from-blue-600
                                       to-indigo-600
                                       text-white"
                            >

                                <p
                                    class="font-bold
                                           text-sm"
                                >

                                    {{ Auth::user()->name }}

                                </p>


                                <p
                                    class="text-xs
                                           text-blue-100
                                           mt-1"
                                >

                                    {{ Auth::user()->email }}

                                </p>

                            </div>


                            <div class="p-2">


                                <!-- PROFILE -->

                                @if(Route::has('profile.edit'))

                                    <a
                                        href="{{ route('profile.edit') }}"
                                        @click="userMenu = false"
                                        class="flex
                                               items-center
                                               gap-3
                                               px-4
                                               py-3
                                               rounded-xl
                                               text-gray-700
                                               hover:bg-blue-50
                                               hover:text-blue-700
                                               transition"
                                    >

                                        <span
                                            class="w-9
                                                   h-9
                                                   rounded-lg
                                                   bg-blue-100
                                                   text-blue-600
                                                   flex
                                                   items-center
                                                   justify-center"
                                        >

                                            👤

                                        </span>


                                        <div>

                                            <p
                                                class="font-semibold
                                                       text-sm"
                                            >

                                                Profile

                                            </p>


                                            <p
                                                class="text-xs
                                                       text-gray-400"
                                            >

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
                                        class="w-full
                                               flex
                                               items-center
                                               gap-3
                                               px-4
                                               py-3
                                               rounded-xl
                                               text-gray-700
                                               hover:bg-red-50
                                               hover:text-red-600
                                               transition
                                               text-left"
                                    >

                                        <span
                                            class="w-9
                                                   h-9
                                                   rounded-lg
                                                   bg-red-100
                                                   text-red-600
                                                   flex
                                                   items-center
                                                   justify-center"
                                        >

                                            🚪

                                        </span>


                                        <div>

                                            <p
                                                class="font-semibold
                                                       text-sm"
                                            >

                                                Log Out

                                            </p>


                                            <p
                                                class="text-xs
                                                       text-gray-400"
                                            >

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


    <!-- ========================================================= -->
    <!-- SIDEBAR STYLES -->
    <!-- ========================================================= -->

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


        .sidebar-link:active {

            transform: translateX(1px);

        }

    </style>


</body>

</html>