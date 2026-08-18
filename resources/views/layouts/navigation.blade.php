@php
    $role = optional(auth()->user()->roleRelation)->name;

    $dashboardRoute = match ($role) {
        'Student' => route('student.dashboard'),
        'Landlord' => route('landlord.dashboard'),
        'Business Owner' => route('business.dashboard'),
        'Admin' => route('admin.dashboard'),
        default => route('dashboard'),
    };
@endphp

<nav
    x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 shadow-sm"
>
    <!-- =========================================================
         PRIMARY NAVIGATION
    ========================================================== -->

    <div class="max-w-7xl mx-auto px-3 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center min-h-16">

            <!-- =====================================================
                 LEFT SIDE
            ====================================================== -->

            <div class="flex items-center min-w-0">

                <!-- CAMPUSCONNECT BRAND -->

                <div class="shrink-0 flex items-center">

                    <a
                        href="{{ $dashboardRoute }}"
                        class="flex items-center gap-2"
                        aria-label="CampusConnect Dashboard"
                    >

                        <div
                            class="w-9 h-9 rounded-xl
                                   bg-gradient-to-r from-blue-600 to-indigo-600
                                   flex items-center justify-center
                                   text-white text-lg
                                   shadow-md"
                        >
                            🎓
                        </div>

                        <span
                            class="hidden sm:block
                                   text-xl font-extrabold
                                   bg-gradient-to-r from-blue-600 to-indigo-600
                                   bg-clip-text text-transparent"
                        >
                            CampusConnect
                        </span>

                    </a>

                </div>


                <!-- =================================================
                     DESKTOP NAVIGATION
                     Only main navigation remains here.
                ================================================== -->

                <div
                    class="hidden sm:flex sm:items-center
                           sm:space-x-4 lg:space-x-6
                           sm:ms-6 lg:ms-10"
                >

                    <!-- Dashboard -->

                    <x-nav-link
                        :href="$dashboardRoute"
                        :active="request()->url() === $dashboardRoute"
                    >
                        🏠 Dashboard
                    </x-nav-link>


                    {{-- =================================================
                         LANDLORD
                    ================================================== --}}

                    @if($role == 'Landlord')

                        <x-nav-link
                            :href="route('rentals.create')"
                            :active="request()->routeIs('rentals.create')"
                        >
                            ➕ Add Rental
                        </x-nav-link>

                        <x-nav-link
                            :href="route('campus.create')"
                            :active="request()->routeIs('campus.create')"
                        >
                            🏫 Add Hostel
                        </x-nav-link>

                        <x-nav-link
                            :href="route('rentals.index')"
                            :active="request()->routeIs('rentals.*')"
                        >
                            🏠 My Listings
                        </x-nav-link>

                    @endif


                    {{-- =================================================
                         BUSINESS OWNER
                    ================================================== --}}

                    @if($role == 'Business Owner')

                        <x-nav-link
                            :href="route('businesses.create')"
                            :active="request()->routeIs('businesses.create')"
                        >
                            🏪 My Business
                        </x-nav-link>

                        <x-nav-link
                            :href="route('businesses.index')"
                            :active="request()->routeIs('businesses.*')"
                        >
                            📋 My Businesses
                        </x-nav-link>

                        <x-nav-link
                            :href="route('marketplace.create')"
                            :active="request()->routeIs('marketplace.create')"
                        >
                            🛒 Sell Item
                        </x-nav-link>

                    @endif


                    {{-- =================================================
                         ADMIN
                    ================================================== --}}

                    @if($role == 'Admin')

                        <x-nav-link
                            :href="route('admin.dashboard')"
                            :active="request()->routeIs('admin.dashboard')"
                        >
                            🛠 Admin
                        </x-nav-link>

                        <x-nav-link
                            :href="route('announcements.index')"
                            :active="request()->routeIs('announcements.*')"
                        >
                            📢 Announcements
                        </x-nav-link>

                        <x-nav-link
                            :href="route('notes.index')"
                            :active="request()->routeIs('notes.*')"
                        >
                            📚 Notes
                        </x-nav-link>

                        <x-nav-link
                            :href="route('businesses.index')"
                            :active="request()->routeIs('businesses.*')"
                        >
                            🏪 Businesses
                        </x-nav-link>

                    @endif

                </div>

            </div>


            <!-- =========================================================
                 DESKTOP RIGHT SIDE
            ========================================================== -->

            <div class="hidden sm:flex sm:items-center sm:ms-4 lg:ms-6 gap-2">

                <!-- =================================================
                     NOTIFICATIONS
                ================================================== -->

                <a
                    href="{{ route('notifications.index') }}"
                    class="relative flex items-center justify-center
                           w-10 h-10 rounded-full
                           text-gray-600 dark:text-gray-300
                           hover:bg-sky-50 dark:hover:bg-gray-700
                           hover:text-sky-600
                           transition duration-200"
                    title="Notifications"
                    aria-label="Notifications"
                >

                    <span class="text-xl leading-none pointer-events-none">
                        🔔
                    </span>

                    @if(isset($notificationCount) && $notificationCount > 0)

                        <span
                            class="absolute -top-1 -right-1
                                   min-w-[19px] h-5
                                   px-1
                                   flex items-center justify-center
                                   bg-red-600
                                   text-white
                                   text-[10px]
                                   font-bold
                                   rounded-full
                                   border-2 border-white
                                   dark:border-gray-800
                                   shadow-sm"
                        >
                            {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                        </span>

                    @endif

                </a>


                <!-- =================================================
                     USER DROPDOWN
                ================================================== -->

                <x-dropdown align="right" width="64">

                    <x-slot name="trigger">

                        <button
                            type="button"
                            class="inline-flex items-center
                                   max-w-[300px]
                                   px-3 py-2
                                   border border-transparent
                                   text-sm font-medium
                                   rounded-xl
                                   text-gray-600 dark:text-gray-300
                                   bg-white dark:bg-gray-800
                                   hover:bg-gray-50
                                   dark:hover:bg-gray-700
                                   hover:text-sky-600
                                   transition
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-sky-500
                                   focus:ring-offset-2"
                        >

                            <!-- =================================================
                                 USER AVATAR
                            ================================================== -->

                            <div
                                class="w-10 h-10 rounded-full
                                       bg-gradient-to-r from-blue-600 to-indigo-600
                                       text-white
                                       flex items-center justify-center
                                       font-extrabold
                                       text-base
                                       shadow-md
                                       shrink-0"
                            >
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>


                            <!-- =================================================
                                 USER NAME + ROLE
                            ================================================== -->

                            <div class="text-left min-w-0 ms-3">

                                <div
                                    class="truncate
                                           max-w-[180px]
                                           font-semibold
                                           text-gray-700
                                           dark:text-gray-200"
                                >
                                    {{ Auth::user()->name }}
                                </div>

                                <div
                                    class="text-xs
                                           text-gray-400
                                           dark:text-gray-500
                                           truncate
                                           max-w-[180px]"
                                >
                                    {{ $role }}
                                </div>

                            </div>


                            <!-- ARROW -->

                            <div class="ms-2 shrink-0">

                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>

                            </div>

                        </button>

                    </x-slot>


                    <!-- =================================================
                         DROPDOWN CONTENT
                    ================================================== -->

                    <x-slot name="content">

                        <!-- =================================================
                             USER HEADER
                        ================================================== -->

                        <div
                            class="px-4 py-4
                                   bg-gradient-to-r
                                   from-sky-50
                                   to-blue-50
                                   dark:from-gray-900
                                   dark:to-gray-800
                                   border-b
                                   border-sky-100
                                   dark:border-gray-700"
                        >

                            <div class="flex items-center gap-3">

                                <div
                                    class="w-11 h-11 rounded-full
                                           bg-gradient-to-r
                                           from-blue-600
                                           to-indigo-600
                                           text-white
                                           flex items-center justify-center
                                           font-extrabold
                                           text-lg
                                           shadow-md
                                           shrink-0"
                                >
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>

                                <div class="min-w-0">

                                    <p
                                        class="font-bold
                                               text-gray-800
                                               dark:text-gray-100
                                               truncate"
                                    >
                                        {{ Auth::user()->name }}
                                    </p>

                                    <p
                                        class="text-xs
                                               text-gray-500
                                               dark:text-gray-400
                                               truncate"
                                    >
                                        User
                                    </p>

                                </div>

                            </div>

                        </div>


                        <!-- =================================================
                             ROLE
                        ================================================== -->

                        <div
                            class="px-4 py-2
                                   text-xs
                                   text-gray-500
                                   dark:text-gray-400"
                        >

                            Logged in as

                            <strong class="text-sky-600">
                                {{ $role }}
                            </strong>

                        </div>


                        <div
                            class="border-t
                                   border-gray-100
                                   dark:border-gray-700"
                        ></div>


                        <!-- =================================================
                             DASHBOARD
                        ================================================== -->

                        <x-dropdown-link
                            :href="$dashboardRoute"
                        >
                            🏠 Dashboard
                        </x-dropdown-link>


                        {{-- =================================================
                             STUDENT DROPDOWN BUTTONS
                        ================================================== --}}

                        @if($role == 'Student')

                            <div
                                class="px-4 pt-3 pb-2
                                       text-[11px]
                                       font-bold
                                       uppercase
                                       tracking-wider
                                       text-gray-400
                                       dark:text-gray-500"
                            >
                                Student Menu
                            </div>


                            <!-- Notes -->

                            <x-dropdown-link
                                :href="route('notes.index')"
                            >
                                📚 Notes
                            </x-dropdown-link>


                            <!-- Past Papers -->

                            <x-dropdown-link
                                :href="route('pastpapers.index')"
                            >
                                📄 Past Papers
                            </x-dropdown-link>


                            <!-- Marketplace -->

                            <x-dropdown-link
                                :href="route('marketplace.index')"
                            >
                                🛒 Marketplace
                            </x-dropdown-link>


                            <!-- Campus Hostels -->

                            <x-dropdown-link
                                :href="route('campus.index')"
                            >
                                🏫 Campus Hostels
                            </x-dropdown-link>


                            <!-- Rentals -->

                            <x-dropdown-link
                                :href="route('rentals.index')"
                            >
                                🏠 Rentals
                            </x-dropdown-link>


                            <!-- Businesses -->

                            <x-dropdown-link
                                :href="route('businesses.index')"
                            >
                                🏪 Businesses
                            </x-dropdown-link>


                            <!-- Lost & Found -->

                            <x-dropdown-link
                                :href="route('lostfound.index')"
                            >
                                🔍 Lost & Found
                            </x-dropdown-link>


                            <!-- Student Services -->

                            <x-dropdown-link
                                :href="route('student-services.index')"
                            >
                                🎓 Student Services
                            </x-dropdown-link>


                            <div
                                class="my-2
                                       border-t
                                       border-gray-100
                                       dark:border-gray-700"
                            ></div>

                        @endif


                        <!-- =================================================
                             PROFILE
                        ================================================== -->

                        <x-dropdown-link
                            :href="route('profile.edit')"
                        >
                            👤 Profile
                        </x-dropdown-link>


                        <!-- =================================================
                             NOTIFICATIONS
                        ================================================== -->

                        <x-dropdown-link
                            :href="route('notifications.index')"
                        >

                            <div class="flex items-center justify-between w-full">

                                <span>
                                    🔔 Notifications
                                </span>

                                @if(isset($notificationCount) && $notificationCount > 0)

                                    <span
                                        class="ms-2 inline-flex items-center justify-center
                                               min-w-[18px] h-[18px]
                                               px-1
                                               text-[10px]
                                               font-bold
                                               bg-red-600
                                               text-white
                                               rounded-full"
                                    >
                                        {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                                    </span>

                                @endif

                            </div>

                        </x-dropdown-link>


                        <!-- =================================================
                             LOGOUT
                        ================================================== -->

                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                        >

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                🚪 Log Out
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            <!-- =========================================================
                 MOBILE HEADER ACTIONS
            ========================================================== -->

            <div class="flex sm:hidden items-center gap-1">

                <!-- Mobile Notifications -->

                <a
                    href="{{ route('notifications.index') }}"
                    class="relative flex items-center justify-center
                           w-10 h-10 rounded-full
                           text-gray-600
                           hover:bg-sky-50
                           hover:text-sky-600
                           transition"
                    aria-label="Notifications"
                >

                    <span class="text-xl">
                        🔔
                    </span>

                    @if(isset($notificationCount) && $notificationCount > 0)

                        <span
                            class="absolute -top-0.5 -right-0.5
                                   min-w-[18px] h-[18px]
                                   px-1
                                   flex items-center justify-center
                                   bg-red-600
                                   text-white
                                   text-[9px]
                                   font-bold
                                   rounded-full
                                   border-2 border-white"
                        >
                            {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                        </span>

                    @endif

                </a>


                <!-- Mobile Hamburger -->

                <button
                    type="button"
                    @click="open = !open"
                    class="inline-flex items-center justify-center
                           w-10 h-10
                           rounded-xl
                           text-gray-600
                           hover:bg-gray-100
                           active:bg-gray-200
                           transition"
                    :aria-expanded="open"
                    aria-label="Toggle navigation menu"
                >

                    <!-- Menu Icon -->

                    <svg
                        x-show="!open"
                        x-transition
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>


                    <!-- Close Icon -->

                    <svg
                        x-show="open"
                        x-transition
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- =============================================================
         MOBILE NAVIGATION
    ============================================================== -->

    <div
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        class="sm:hidden border-t border-gray-100
               dark:border-gray-700
               bg-white dark:bg-gray-800
               shadow-lg"
        style="display: none;"
    >

        <div class="max-h-[75vh] overflow-y-auto overscroll-contain">

            <!-- =====================================================
                 MOBILE USER SUMMARY
            ====================================================== -->

            <div
                class="px-4 py-4
                       bg-sky-50 dark:bg-gray-900/50
                       border-b border-sky-100 dark:border-gray-700"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="w-11 h-11 rounded-full
                               bg-gradient-to-r from-blue-600 to-indigo-600
                               text-white
                               flex items-center justify-center
                               font-bold shrink-0"
                    >
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="min-w-0">

                        <p
                            class="font-semibold text-gray-800
                                   dark:text-gray-100 truncate"
                        >
                            {{ Auth::user()->name }}
                        </p>

                        <p
                            class="text-xs text-gray-500
                                   dark:text-gray-400 truncate"
                        >
                            User
                        </p>

                    </div>

                </div>

            </div>


            <!-- =====================================================
                 MOBILE MAIN LINKS
            ====================================================== -->

            <div class="px-3 py-3 space-y-1">

                <x-responsive-nav-link :href="$dashboardRoute">
                    🏠 Dashboard
                </x-responsive-nav-link>


                <!-- Notifications -->

                <x-responsive-nav-link
                    :href="route('notifications.index')"
                >

                    <div class="flex items-center justify-between w-full">

                        <span>
                            🔔 Notifications
                        </span>

                        @if(isset($notificationCount) && $notificationCount > 0)

                            <span
                                class="inline-flex items-center justify-center
                                       min-w-[22px] h-[22px]
                                       px-1.5
                                       bg-red-600
                                       text-white
                                       text-xs
                                       font-bold
                                       rounded-full"
                            >
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>

                        @endif

                    </div>

                </x-responsive-nav-link>


                {{-- =================================================
                     STUDENT
                ================================================== --}}

                @if($role == 'Student')

                    <x-responsive-nav-link :href="route('notes.index')">
                        📚 Notes
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('pastpapers.index')">
                        📄 Past Papers
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('marketplace.index')">
                        🛒 Marketplace
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('campus.index')">
                        🏫 Campus Hostels
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('rentals.index')">
                        🏠 Rentals
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('businesses.index')">
                        🏪 Businesses
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('lostfound.index')">
                        🔍 Lost & Found
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('student-services.index')">
                        🎓 Student Services
                    </x-responsive-nav-link>

                @endif


                {{-- =================================================
                     LANDLORD
                ================================================== --}}

                @if($role == 'Landlord')

                    <x-responsive-nav-link :href="route('rentals.create')">
                        ➕ Add Rental
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('campus.create')">
                        🏫 Add Hostel
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('rentals.index')">
                        🏠 My Listings
                    </x-responsive-nav-link>

                @endif


                {{-- =================================================
                     BUSINESS OWNER
                ================================================== --}}

                @if($role == 'Business Owner')

                    <x-responsive-nav-link :href="route('businesses.create')">
                        🏪 My Business
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('businesses.index')">
                        📋 My Businesses
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('marketplace.create')">
                        🛒 Sell Item
                    </x-responsive-nav-link>

                @endif


                {{-- =================================================
                     ADMIN
                ================================================== --}}

                @if($role == 'Admin')

                    <x-responsive-nav-link :href="route('admin.dashboard')">
                        🛠 Admin
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('announcements.index')">
                        📢 Announcements
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('notes.index')">
                        📚 Notes
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('businesses.index')">
                        🏪 Businesses
                    </x-responsive-nav-link>

                @endif

            </div>


            <!-- =====================================================
                 MOBILE ACCOUNT SECTION
            ====================================================== -->

            <div
                class="border-t
                       border-gray-200 dark:border-gray-700
                       px-3 py-3"
            >

                <p
                    class="px-3 py-2
                           text-xs font-semibold uppercase
                           tracking-wider
                           text-gray-400"
                >
                    Account
                </p>


                <!-- Profile -->

                <x-responsive-nav-link
                    :href="route('profile.edit')"
                    :active="request()->routeIs('profile.edit')"
                >
                    👤 Profile
                </x-responsive-nav-link>


                <!-- Dashboard -->

                <x-responsive-nav-link :href="$dashboardRoute">
                    🏠 Dashboard
                </x-responsive-nav-link>


                <!-- Logout -->

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        🚪 Log Out
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>