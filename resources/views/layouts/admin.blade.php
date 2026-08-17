<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusConnect Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet"
    >

    <script src="https://unpkg.com/alpinejs" defer></script>

    <style>

        body {
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }

        .sidebar-scroll::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 20px;
        }

        .sidebar-scroll {
            scrollbar-width: thin;
            scrollbar-color: #334155 transparent;
        }

        /* Prevent dashboard content from forcing the page wider */
        .dashboard-main {
            min-width: 0;
            width: 100%;
        }

        /* Smooth mobile sidebar */
        .mobile-sidebar {
            will-change: transform, width;
        }

    </style>

</head>


<body class="bg-slate-100">


<div
    x-data="{
        sidebar: false,
        mobileSidebar: false
    }"
    class="min-h-screen"
>


    <!-- ========================================================= -->
    <!-- MOBILE BACKDROP -->
    <!-- ========================================================= -->

    <div
        x-show="mobileSidebar"
        x-transition.opacity
        @click="mobileSidebar = false"
        class="fixed inset-0 z-40 bg-slate-950/60 backdrop-blur-[2px] lg:hidden"
        style="display: none;"
    ></div>



    <!-- ========================================================= -->
    <!-- SIDEBAR -->
    <!-- ========================================================= -->

    <aside

        @mouseenter="sidebar = true"
        @mouseleave="sidebar = false"

        :class="mobileSidebar
            ? 'translate-x-0'
            : '-translate-x-full lg:translate-x-0'"

        :style="window.innerWidth >= 1024
            ? (sidebar ? 'width:18rem' : 'width:6rem')
            : 'width:18rem'"

        class="mobile-sidebar
               fixed inset-y-0 left-0
               z-50 lg:z-30
               h-screen
               bg-slate-900
               text-white
               transition-all duration-300 ease-in-out
               flex flex-col
               shadow-2xl
               overflow-hidden
               shrink-0"
    >


        <!-- ===================================================== -->
        <!-- LOGO -->
        <!-- ===================================================== -->

        <div
            class="h-20
                   border-b border-slate-800
                   flex items-center justify-center
                   shrink-0"
        >

            <!-- Expanded Logo -->

            <div
                x-show="sidebar || mobileSidebar"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="text-center whitespace-nowrap"
            >

                <h1 class="text-2xl font-black tracking-wide">
                    🎓 CampusConnect
                </h1>

                <p class="text-xs text-slate-400 text-center mt-1">
                    Admin Control Center
                </p>

            </div>


            <!-- Collapsed Logo -->

            <div
                x-show="!sidebar && !mobileSidebar"
                x-transition
                class="text-4xl"
            >
                🎓
            </div>


            <!-- Mobile Close -->

            <button
                type="button"
                @click="mobileSidebar = false"
                class="lg:hidden
                       absolute
                       right-4
                       top-5
                       w-9 h-9
                       rounded-xl
                       bg-slate-800
                       hover:bg-slate-700
                       flex items-center justify-center
                       text-slate-300
                       transition"
                aria-label="Close menu"
            >
                ✕
            </button>

        </div>



        <!-- ===================================================== -->
        <!-- NAVIGATION -->
        <!-- ===================================================== -->

        <nav
            class="flex-1
                   overflow-y-auto
                   sidebar-scroll
                   py-6
                   px-4
                   space-y-2"
        >


            <!-- Dashboard -->

            <a
                href="{{ route('admin.dashboard') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.dashboard')
                            ? 'bg-sky-600 text-white shadow-xl scale-[1.02]'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
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



            <!-- Users -->

            <a
                href="{{ route('admin.users') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.users*')
                            ? 'bg-sky-600 text-white shadow-xl scale-[1.02]'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
                    👥
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Users
                </span>

            </a>



            <!-- Businesses -->

            <a
                href="{{ route('admin.businesses') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.businesses*')
                            ? 'bg-sky-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
                    🏪
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Businesses
                </span>

            </a>



            <!-- Marketplace -->

            <a
                href="{{ route('admin.marketplace') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.marketplace*')
                            ? 'bg-orange-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
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



            <!-- Accommodations -->

            <a
                href="{{ route('admin.accommodations') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.accommodations*')
                            ? 'bg-sky-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
                    🏢
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Accommodations
                </span>

            </a>



            <!-- Notes -->

            <a
                href="{{ route('admin.notes') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.notes*')
                            ? 'bg-sky-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
                    📚
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Notes
                </span>

            </a>



            <!-- Announcements -->

            <a
                href="{{ route('admin.announcements') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.announcements*')
                            ? 'bg-red-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
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



            <!-- Reports -->

            <a
                href="{{ route('admin.reports') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.reports*')
                            ? 'bg-sky-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
                    📊
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Reports
                </span>

            </a>



            <!-- Settings -->

            <a
                href="{{ route('admin.settings') }}"
                class="group
                       flex items-center
                       gap-4
                       px-5 py-3
                       rounded-xl
                       transition-all duration-300

                       {{ request()->routeIs('admin.settings*')
                            ? 'bg-sky-600 text-white shadow-lg'
                            : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}"
            >

                <span class="text-xl shrink-0">
                    ⚙️
                </span>

                <span
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="whitespace-nowrap"
                >
                    Settings
                </span>

            </a>

        </nav>



        <!-- ===================================================== -->
        <!-- BOTTOM USER -->
        <!-- ===================================================== -->

        <div
            class="border-t border-slate-800
                   p-5
                   shrink-0"
        >

            <div class="flex items-center gap-4">

                <div
                    class="w-12 h-12
                           rounded-full
                           bg-sky-600
                           flex items-center justify-center
                           text-xl
                           shrink-0"
                >
                    👤
                </div>


                <div
                    x-show="sidebar || mobileSidebar"
                    x-transition
                    class="flex-1 min-w-0"
                >

                    <p class="font-semibold whitespace-nowrap">
                        Administrator
                    </p>

                    <p class="text-xs text-green-400 whitespace-nowrap">
                        ● Online
                    </p>

                </div>

            </div>



            <!-- Logout -->

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                class="mt-5"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full
                           bg-red-600
                           hover:bg-red-700
                           py-3
                           rounded-xl
                           font-semibold
                           transition
                           flex items-center justify-center"
                >

                    <span
                        x-show="sidebar || mobileSidebar"
                        x-transition
                        class="whitespace-nowrap"
                    >
                        🚪 Logout
                    </span>

                    <span
                        x-show="!sidebar && !mobileSidebar"
                        x-transition
                    >
                        🚪
                    </span>

                </button>

            </form>

        </div>

    </aside>



    <!-- ========================================================= -->
    <!-- MAIN APPLICATION -->
    <!-- ========================================================= -->

    <main
        class="dashboard-main
               min-h-screen
               lg:ml-24"
    >


        <!-- ===================================================== -->
        <!-- TOP NAVIGATION -->
        <!-- ===================================================== -->

        <header
            class="bg-white
                   shadow-sm
                   border-b
                   sticky top-0
                   z-20"
        >

            <div
                class="min-h-20
                       px-4 sm:px-6 lg:px-8
                       py-3
                       flex items-center
                       justify-between
                       gap-3"
            >


                <!-- LEFT -->

                <div
                    class="flex items-center
                           gap-3 sm:gap-5
                           min-w-0"
                >

                    <!-- MOBILE MENU -->

                    <button
                        type="button"
                        @click="mobileSidebar = true"
                        class="lg:hidden
                               w-11 h-11
                               shrink-0
                               rounded-xl
                               bg-slate-100
                               hover:bg-slate-200
                               transition
                               flex items-center justify-center"
                        aria-label="Open menu"
                    >
                        ☰
                    </button>


                    <!-- DESKTOP MENU DECORATIVE -->

                    <button
                        type="button"
                        class="hidden lg:flex
                               w-12 h-12
                               shrink-0
                               rounded-xl
                               bg-slate-100
                               hover:bg-slate-200
                               transition
                               items-center justify-center"
                        aria-label="Menu"
                    >
                        ☰
                    </button>


                    <div class="min-w-0">

                        <h2
                            class="text-xl sm:text-2xl lg:text-3xl
                                   font-bold
                                   text-slate-800
                                   truncate"
                        >
                            @yield('title')
                        </h2>

                        <p
                            class="text-gray-500
                                   text-xs sm:text-sm
                                   truncate"
                        >
                            CampusConnect Administration
                        </p>

                    </div>

                </div>



                <!-- RIGHT -->

                <div
                    class="flex items-center
                           gap-2 sm:gap-4 lg:gap-6
                           shrink-0"
                >


                    <!-- ================================================= -->
                    <!-- SEARCH -->
                    <!-- ================================================= -->

                    <form
                        action="{{ route('admin.search') }}"
                        method="GET"
                        class="flex shrink-0"
                    >

                        <div
                            class="relative
                                   w-28
                                   sm:w-44
                                   md:w-56
                                   lg:w-64
                                   xl:w-80"
                        >

                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Search..."
                                autocomplete="off"
                                class="w-full
                                       h-10 sm:h-11
                                       rounded-xl
                                       border border-slate-300
                                       bg-white
                                       pl-3 sm:pl-4
                                       pr-9 sm:pr-11
                                       text-xs sm:text-sm
                                       text-slate-700
                                       placeholder-slate-400
                                       focus:ring-2
                                       focus:ring-sky-500
                                       focus:border-sky-500
                                       focus:outline-none
                                       transition"
                            >

                            <button
                                type="submit"
                                class="absolute
                                       right-0 top-0
                                       h-10 sm:h-11
                                       w-9 sm:w-11
                                       flex items-center justify-center
                                       text-slate-400
                                       hover:text-sky-600
                                       transition"
                                aria-label="Search"
                                title="Search"
                            >

                                <span
                                    class="text-sm sm:text-lg leading-none"
                                >
                                    🔍
                                </span>

                            </button>

                        </div>

                    </form>



                    <!-- ================================================= -->
                    <!-- NOTIFICATIONS -->
                    <!-- ================================================= -->

                    <div
                        x-data="{ notificationsOpen: false }"
                        class="relative shrink-0"
                    >

                        @php

                            $notificationCount = auth()->user()
                                ->notifications()
                                ->where('created_at', '>=', now()->subDays(7))
                                ->where('is_read', false)
                                ->count();

                            $headerNotifications = auth()->user()
                                ->notifications()
                                ->where('created_at', '>=', now()->subDays(7))
                                ->latest()
                                ->take(5)
                                ->get();

                        @endphp


                        <!-- Bell -->

                        <button
                            type="button"
                            @click="notificationsOpen = !notificationsOpen"
                            class="relative
                                   flex items-center justify-center
                                   w-10 h-10 sm:w-11 sm:h-11
                                   rounded-xl
                                   text-slate-600
                                   hover:bg-sky-50
                                   hover:text-sky-600
                                   transition duration-200"
                            title="Notifications"
                            aria-label="Notifications"
                        >

                            <span class="text-xl sm:text-2xl leading-none">
                                🔔
                            </span>


                            @if($notificationCount > 0)

                                <span
                                    class="absolute
                                           -top-1 -right-1
                                           min-w-[18px] sm:min-w-[20px]
                                           h-5
                                           px-1
                                           rounded-full
                                           bg-red-600
                                           text-white
                                           text-[10px] sm:text-xs
                                           font-bold
                                           flex items-center justify-center
                                           border-2 border-white
                                           shadow-sm"
                                >
                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                                </span>

                            @endif

                        </button>



                        <!-- NOTIFICATION DROPDOWN -->

                        <div
                            x-show="notificationsOpen"
                            x-transition
                            @click.outside="notificationsOpen = false"
                            class="absolute
                                   right-0
                                   mt-3
                                   w-[calc(100vw-2rem)]
                                   max-w-96
                                   bg-white
                                   rounded-2xl
                                   shadow-2xl
                                   border border-slate-200
                                   z-50"
                            style="display: none;"
                        >

                            <!-- Header -->

                            <div
                                class="px-5 py-4
                                       border-b border-slate-200
                                       flex items-center justify-between"
                            >

                                <div>

                                    <h3
                                        class="font-bold
                                               text-lg
                                               text-slate-800"
                                    >
                                        Notifications
                                    </h3>

                                    <p class="text-xs text-slate-500 mt-1">

                                        @if($notificationCount > 0)

                                            {{ $notificationCount }} unread

                                        @else

                                            All caught up

                                        @endif

                                    </p>

                                </div>


                                @if($notificationCount > 0)

                                    <form
                                        action="{{ route('notifications.readAll') }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="text-xs
                                                   font-semibold
                                                   text-sky-600
                                                   hover:text-sky-800"
                                        >
                                            Mark all as read
                                        </button>

                                    </form>

                                @endif

                            </div>



                            <!-- Notification List -->

                            <div class="max-h-[420px] overflow-y-auto">

                                @forelse($headerNotifications as $notification)

                                    <div
                                        class="px-5 py-4
                                               border-b border-slate-100
                                               hover:bg-slate-50
                                               transition
                                               {{ !$notification->is_read
                                                    ? 'bg-sky-50'
                                                    : 'bg-white' }}"
                                    >

                                        <div class="flex gap-3">

                                            <!-- Icon -->

                                            <div
                                                class="w-10 h-10
                                                       rounded-xl
                                                       flex items-center
                                                       justify-center
                                                       shrink-0
                                                       {{ !$notification->is_read
                                                            ? 'bg-sky-100'
                                                            : 'bg-slate-100' }}"
                                            >

                                                @switch($notification->type)

                                                    @case('booking')
                                                        📅
                                                        @break

                                                    @case('business')
                                                        🏪
                                                        @break

                                                    @case('announcement')
                                                        📢
                                                        @break

                                                    @case('note')
                                                        📚
                                                        @break

                                                    @case('message')
                                                        💬
                                                        @break

                                                    @case('system')
                                                        ⚙️
                                                        @break

                                                    @default
                                                        🔔

                                                @endswitch

                                            </div>



                                            <!-- Content -->

                                            <div class="flex-1 min-w-0">

                                                <div
                                                    class="flex items-start
                                                           justify-between
                                                           gap-2"
                                                >

                                                    <h4
                                                        class="text-sm
                                                               {{ !$notification->is_read
                                                                    ? 'font-bold text-slate-900'
                                                                    : 'font-semibold text-slate-700' }}"
                                                    >
                                                        {{ $notification->title }}
                                                    </h4>


                                                    @if(!$notification->is_read)

                                                        <span
                                                            class="w-2 h-2
                                                                   rounded-full
                                                                   bg-sky-600
                                                                   shrink-0
                                                                   mt-1.5"
                                                        ></span>

                                                    @endif

                                                </div>


                                                <p
                                                    class="text-xs
                                                           text-slate-500
                                                           mt-1
                                                           line-clamp-2"
                                                >
                                                    {{ $notification->message }}
                                                </p>


                                                <div
                                                    class="flex items-center
                                                           justify-between
                                                           gap-2
                                                           mt-2"
                                                >

                                                    <span
                                                        class="text-[11px]
                                                               text-slate-400"
                                                    >
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </span>


                                                    @if($notification->link)

                                                        <form
                                                            action="{{ route('notifications.read', $notification) }}"
                                                            method="POST"
                                                        >

                                                            @csrf
                                                            @method('PATCH')

                                                            <button
                                                                type="submit"
                                                                class="text-xs
                                                                       font-semibold
                                                                       text-sky-600
                                                                       hover:text-sky-800"
                                                            >
                                                                View →
                                                            </button>

                                                        </form>

                                                    @elseif(!$notification->is_read)

                                                        <form
                                                            action="{{ route('notifications.read', $notification) }}"
                                                            method="POST"
                                                        >

                                                            @csrf
                                                            @method('PATCH')

                                                            <button
                                                                type="submit"
                                                                class="text-xs
                                                                       font-semibold
                                                                       text-sky-600
                                                                       hover:text-sky-800"
                                                            >
                                                                Mark as read
                                                            </button>

                                                        </form>

                                                    @endif

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <div class="py-12 text-center">

                                        <div class="text-5xl mb-3">
                                            🎉
                                        </div>

                                        <p
                                            class="font-semibold
                                                   text-slate-700"
                                        >
                                            You're all caught up
                                        </p>

                                        <p
                                            class="text-sm
                                                   text-slate-400
                                                   mt-1"
                                        >
                                            No recent notifications.
                                        </p>

                                    </div>

                                @endforelse

                            </div>



                            <!-- Footer -->

                            <div
                                class="p-3
                                       border-t border-slate-200"
                            >

                                <a
                                    href="{{ route('notifications.index') }}"
                                    class="block
                                           text-center
                                           py-2
                                           rounded-xl
                                           bg-slate-100
                                           hover:bg-slate-200
                                           text-sm
                                           font-semibold
                                           text-slate-700
                                           transition"
                                >
                                    View all notifications →
                                </a>

                            </div>

                        </div>

                    </div>



                    <!-- ================================================= -->
                    <!-- ADMIN PROFILE -->
                    <!-- ================================================= -->

                    <div class="flex items-center gap-3 shrink-0">

                        <div
                            class="w-10 h-10 sm:w-11 sm:h-11
                                   rounded-full
                                   bg-sky-600
                                   flex items-center justify-center
                                   text-white
                                   font-bold"
                        >
                            A
                        </div>


                        <div class="hidden md:block">

                            <p class="font-semibold">
                                Admin
                            </p>

                            <p class="text-xs text-gray-500">
                                Super Administrator
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </header>



        <!-- ========================================================= -->
        <!-- PAGE CONTENT -->
        <!-- ========================================================= -->

        <section
            class="w-full
                   min-w-0
                   px-4
                   sm:px-6
                   lg:px-8
                   py-4
                   sm:py-6"
        >

            @yield('content')

        </section>

    </main>

</div>



<!-- ========================================================= -->
<!-- CHART JS -->
<!-- ========================================================= -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('scripts')


</body>
</html>