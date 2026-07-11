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

<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">

    <!-- Primary Navigation -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">

                    <a href="{{ $dashboardRoute }}">

                        <x-application-logo
                            class="block h-9 w-auto fill-current text-sky-600" />

                    </a>

                </div>

                <!-- Desktop Navigation -->
                <div class="hidden sm:flex sm:items-center sm:space-x-6 sm:ms-10">

                    <x-nav-link
                        :href="$dashboardRoute"
                        :active="request()->url() === $dashboardRoute">

                        🏠 Dashboard

                    </x-nav-link>
                                        {{-- STUDENT --}}

                    @if($role == 'Student')

                        <x-nav-link
                            :href="route('notes.index')"
                            :active="request()->routeIs('notes.*')">

                            📚 Notes

                        </x-nav-link>

                        <x-nav-link
                            :href="route('pastpapers.index')"
                            :active="request()->routeIs('pastpapers.*')">

                            📄 Past Papers

                        </x-nav-link>

                        <x-nav-link
                            :href="route('marketplace.index')"
                            :active="request()->routeIs('marketplace.*')">

                            🛒 Marketplace

                        </x-nav-link>

                        <x-nav-link
                            :href="route('campus.index')"
                            :active="request()->routeIs('campus.*')">

                            🏫 Campus Hostels

                        </x-nav-link>

                        <x-nav-link
                            :href="route('rentals.index')"
                            :active="request()->routeIs('rentals.*')">

                            🏠 Rentals

                        </x-nav-link>

                        <x-nav-link
                            :href="route('businesses.index')"
                            :active="request()->routeIs('businesses.*')">

                            🏪 Businesses

                        </x-nav-link>

                        <x-nav-link
                            :href="route('lostfound.index')"
                            :active="request()->routeIs('lostfound.*')">

                            🔍 Lost & Found

                        </x-nav-link>

                        <x-nav-link
                            :href="route('student-services.index')"
                            :active="request()->routeIs('student-services.*')">

                            🎓 Student Services

                        </x-nav-link>

                    @endif
                                        {{-- LANDLORD --}}

                    @if($role == 'Landlord')

                        <x-nav-link
                            :href="route('rentals.create')"
                            :active="request()->routeIs('rentals.create')">

                            ➕ Add Rental

                        </x-nav-link>

                        <x-nav-link
                            :href="route('campus.create')"
                            :active="request()->routeIs('campus.create')">

                            🏫 Add Hostel

                        </x-nav-link>

                        <x-nav-link
                            :href="route('rentals.index')"
                            :active="request()->routeIs('rentals.*')">

                            🏠 My Listings

                        </x-nav-link>

                    @endif
                                        {{-- BUSINESS OWNER --}}

                    @if($role == 'Business Owner')

                        <x-nav-link
                            :href="route('businesses.create')"
                            :active="request()->routeIs('businesses.create')">

                            🏪 My Business

                        </x-nav-link>

                        <x-nav-link
                            :href="route('businesses.index')"
                            :active="request()->routeIs('businesses.*')">

                            📋 My Businesses

                        </x-nav-link>

                        <x-nav-link
                            :href="route('marketplace.create')"
                            :active="request()->routeIs('marketplace.create')">

                            🛒 Sell Item

                        </x-nav-link>

                    @endif
                                        {{-- ADMIN --}}

                    @if($role == 'Admin')

                        <x-nav-link
                            :href="route('admin.dashboard')"
                            :active="request()->routeIs('admin.dashboard')">

                            🛠 Admin

                        </x-nav-link>

                        <x-nav-link
                            :href="route('announcements.index')"
                            :active="request()->routeIs('announcements.*')">

                            📢 Announcements

                        </x-nav-link>

                        <x-nav-link
                            :href="route('notes.index')"
                            :active="request()->routeIs('notes.*')">

                            📚 Notes

                        </x-nav-link>

                        <x-nav-link
                            :href="route('businesses.index')"
                            :active="request()->routeIs('businesses.*')">

                            🏪 Businesses

                        </x-nav-link>

                    @endif

                </div>

            </div>
            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <!-- Notifications -->
                <a href="{{ $dashboardRoute }}" class="relative me-5">

                    <span class="text-2xl">🔔</span>

                    @if(isset($notificationCount) && $notificationCount > 0)

                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full px-2 py-0.5">

                            {{ $notificationCount }}

                        </span>

                    @endif

                </a>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="56">

                    <x-slot name="trigger">

                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-lg text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-800 hover:text-sky-600 transition">

                            <div>

                                {{ Auth::user()->name }}

                                <div class="text-xs text-gray-400">

                                    {{ $role }}

                                </div>

                            </div>

                            <div class="ms-2">

                                <svg class="fill-current h-4 w-4"
                                     xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">

                                    <path fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>

                                </svg>

                            </div>

                        </button>

                    </x-slot>

                    <x-slot name="content">

                        <div class="px-4 py-2 text-xs text-gray-500">

                            Logged in as

                            <strong>{{ $role }}</strong>

                        </div>

                        <hr>

                        <x-dropdown-link :href="route('profile.edit')">

                            👤 Profile

                        </x-dropdown-link>

                        <x-dropdown-link :href="$dashboardRoute">

                            🏠 Dashboard

                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">

                                🚪 Log Out

                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-100 transition">

                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">

                        <path
                            :class="{ 'hidden': open, 'inline-flex': !open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>

                        <path
                            :class="{ 'hidden': !open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"/>

                    </svg>

                </button>

            </div>

        </div>

    </div>
    
    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }"
         class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="$dashboardRoute">

                🏠 Dashboard

            </x-responsive-nav-link>

            {{-- STUDENT --}}
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

            {{-- LANDLORD --}}
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

            {{-- BUSINESS OWNER --}}
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

            {{-- ADMIN --}}
            @if($role == 'Admin')

                <x-responsive-nav-link :href="route('admin.dashboard')">
                    🛠 Admin
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('announcements.index')">
                    📢 Announcements
                </x-responsive-nav-link>

            @endif

        </div>

        <!-- Responsive User Menu -->

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800 dark:text-gray-200">

                    {{ Auth::user()->name }}

                </div>

                <div class="font-medium text-sm text-gray-500">

                    {{ Auth::user()->email }}

                </div>

                <div class="text-xs text-sky-600 mt-1">

                    {{ $role }}

                </div>

            </div>

            <div class="mt-3 space-y-1">

                <x-responsive-nav-link
                    :href="route('profile.edit')">

                    👤 Profile

                </x-responsive-nav-link>

                <x-responsive-nav-link
                    :href="$dashboardRoute">

                    🏠 Dashboard

                </x-responsive-nav-link>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">

                        🚪 Log Out

                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>
