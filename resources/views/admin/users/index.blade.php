@extends('layouts.admin')

@section('title', 'User Management')

@section('content')

<div class="space-y-6 sm:space-y-8 px-0">

    {{-- =========================================================
         STATS
    ========================================================== --}}

    <div class="grid grid-cols-2 xl:grid-cols-4 gap-3 sm:gap-6">

        {{-- Total Users --}}
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200 sm:border-2 p-4 sm:p-6">
            <p class="text-gray-500 text-xs sm:text-sm">
                Total Users
            </p>

            <h2 class="text-2xl sm:text-4xl font-bold mt-2 sm:mt-3 text-gray-800">
                {{ $users->total() }}
            </h2>
        </div>


        {{-- Students --}}
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200 sm:border-2 p-4 sm:p-6">
            <p class="text-gray-500 text-xs sm:text-sm">
                Students
            </p>

            <h2 class="text-2xl sm:text-4xl font-bold mt-2 sm:mt-3 text-sky-600">
                {{ $users->where('role.name','Student')->count() }}
            </h2>
        </div>


        {{-- Landlords --}}
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200 sm:border-2 p-4 sm:p-6">
            <p class="text-gray-500 text-xs sm:text-sm">
                Landlords
            </p>

            <h2 class="text-2xl sm:text-4xl font-bold mt-2 sm:mt-3 text-green-600">
                {{ $users->where('role.name','Landlord')->count() }}
            </h2>
        </div>


        {{-- Business Owners --}}
        <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200 sm:border-2 p-4 sm:p-6">
            <p class="text-gray-500 text-xs sm:text-sm">
                Business Owners
            </p>

            <h2 class="text-2xl sm:text-4xl font-bold mt-2 sm:mt-3 text-purple-600">
                {{ $users->where('role.name','Business Owner')->count() }}
            </h2>
        </div>

    </div>


    {{-- =========================================================
         SEARCH / FILTER
    ========================================================== --}}

    <div class="bg-white rounded-xl sm:rounded-2xl shadow-md border border-gray-200 sm:border-2 p-4 sm:p-6">

        <form
            method="GET"
            class="grid grid-cols-1 md:grid-cols-[1fr_auto_auto] gap-3 sm:gap-4"
        >

            {{-- Search --}}
            <div class="w-full">

                <label class="block text-xs sm:text-sm font-semibold text-gray-600 mb-2">
                    Search Users
                </label>

                <input
                    name="search"
                    value="{{ request('search') }}"
                    type="text"
                    placeholder="Search name or email..."
                    class="w-full rounded-xl border-2 border-gray-300
                           bg-white px-4 py-3
                           text-sm sm:text-base text-gray-700
                           focus:border-sky-500
                           focus:ring-2
                           focus:ring-sky-100
                           outline-none transition"
                >

            </div>


            {{-- Role --}}
            <div class="w-full md:w-56">

                <label class="block text-xs sm:text-sm font-semibold text-gray-600 mb-2">
                    Role
                </label>

                <select
                    name="role"
                    class="w-full rounded-xl
                           border-2 border-gray-300
                           bg-white px-4 py-3
                           text-sm sm:text-base text-gray-700
                           focus:border-sky-500
                           focus:ring-2
                           focus:ring-sky-100
                           outline-none transition"
                >

                    <option value="">
                        All Roles
                    </option>

                    <option
                        value="Student"
                        {{ request('role') == 'Student' ? 'selected' : '' }}
                    >
                        Student
                    </option>

                    <option
                        value="Landlord"
                        {{ request('role') == 'Landlord' ? 'selected' : '' }}
                    >
                        Landlord
                    </option>

                    <option
                        value="Business Owner"
                        {{ request('role') == 'Business Owner' ? 'selected' : '' }}
                    >
                        Business Owner
                    </option>

                    <option
                        value="Admin"
                        {{ request('role') == 'Admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>

            </div>


            {{-- Search Button --}}
            <div class="flex items-end">

                <button
                    type="submit"
                    class="w-full md:w-auto
                           bg-sky-600
                           hover:bg-sky-700
                           text-white
                           px-7 py-3
                           rounded-xl
                           font-semibold
                           border-2 border-sky-600
                           transition
                           shadow-sm"
                >
                    Search
                </button>

            </div>

        </form>

    </div>


    {{-- =========================================================
         DESKTOP USERS TABLE
    ========================================================== --}}

    <div class="hidden md:block">

        <div class="bg-white rounded-2xl shadow-md
                    border-2 border-gray-200
                    overflow-hidden">

            <div class="overflow-x-auto">

                <table
                    class="w-full border-collapse
                           border border-gray-300"
                >

                    {{-- =================================================
                         TABLE HEADER
                    ================================================== --}}

                    <thead class="bg-slate-100">

                        <tr class="text-gray-700">

                            {{-- User --}}
                            <th
                                class="px-6 lg:px-8 py-5
                                       text-left
                                       font-semibold
                                       border border-gray-300
                                       whitespace-nowrap"
                            >

                                <a
                                    href="{{ request()->fullUrlWithQuery([
                                        'sort' => 'name',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                    ]) }}"
                                    class="hover:text-sky-600 transition"
                                >
                                    User ↕
                                </a>

                            </th>


                            {{-- Email --}}
                            <th
                                class="px-6 py-5
                                       text-left
                                       font-semibold
                                       border border-gray-300
                                       whitespace-nowrap"
                            >

                                <a
                                    href="{{ request()->fullUrlWithQuery([
                                        'sort' => 'email',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                    ]) }}"
                                    class="hover:text-sky-600 transition"
                                >
                                    Email ↕
                                </a>

                            </th>


                            {{-- Role --}}
                            <th
                                class="px-6 py-5
                                       text-center
                                       font-semibold
                                       border border-gray-300
                                       whitespace-nowrap"
                            >
                                Role
                            </th>


                            {{-- Account --}}
                            <th
                                class="px-6 py-5
                                       text-center
                                       font-semibold
                                       border border-gray-300
                                       whitespace-nowrap"
                            >

                                <a
                                    href="{{ request()->fullUrlWithQuery([
                                        'sort' => 'active',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                    ]) }}"
                                    class="hover:text-sky-600 transition"
                                >
                                    Account ↕
                                </a>

                            </th>


                            {{-- Activity --}}
                            <th
                                class="px-6 py-5
                                       text-center
                                       font-semibold
                                       border border-gray-300
                                       whitespace-nowrap"
                            >

                                <a
                                    href="{{ request()->fullUrlWithQuery([
                                        'sort' => 'last_seen',
                                        'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                    ]) }}"
                                    class="hover:text-sky-600 transition"
                                >
                                    Activity ↕
                                </a>

                            </th>


                            {{-- Actions --}}
                            <th
                                class="px-6 lg:px-8 py-5
                                       text-center
                                       font-semibold
                                       border border-gray-300
                                       whitespace-nowrap"
                            >
                                Actions
                            </th>

                        </tr>

                    </thead>


                    {{-- =================================================
                         TABLE BODY
                    ================================================== --}}

                    <tbody>

                    @forelse($users as $user)

                        @php

                            $colors = [
                                'Admin' => 'bg-red-100 text-red-700 border-red-200',
                                'Student' => 'bg-sky-100 text-sky-700 border-sky-200',
                                'Landlord' => 'bg-green-100 text-green-700 border-green-200',
                                'Business Owner' => 'bg-purple-100 text-purple-700 border-purple-200',
                            ];

                        @endphp

                        <tr
                            class="border border-gray-300
                                   hover:bg-slate-50
                                   transition"
                        >

                            {{-- USER --}}
                            <td class="px-6 lg:px-8 py-6 border border-gray-300">

                                <div class="flex items-center gap-3 lg:gap-4">

                                    @if($user->profile_photo)

                                        <img
                                            src="{{ asset('storage/'.$user->profile_photo) }}"
                                            alt="{{ $user->name }}"
                                            class="w-12 h-12 lg:w-14 lg:h-14
                                                   rounded-full
                                                   object-cover
                                                   border-2 border-gray-300
                                                   shadow-sm"
                                        >

                                    @else

                                        <div
                                            class="w-12 h-12 lg:w-14 lg:h-14
                                                   rounded-full
                                                   bg-sky-100
                                                   border-2 border-sky-200
                                                   flex items-center
                                                   justify-center
                                                   text-lg
                                                   font-bold
                                                   text-sky-700
                                                   flex-shrink-0"
                                        >

                                            {{ strtoupper(substr($user->name, 0, 1)) }}

                                        </div>

                                    @endif


                                    <div class="min-w-0">

                                        <h3 class="font-bold text-base lg:text-lg text-gray-800 truncate">
                                            {{ $user->name }}
                                        </h3>

                                        <p class="text-xs lg:text-sm text-gray-500 mt-1">
                                            User ID #{{ $user->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- EMAIL --}}
                            <td class="px-6 py-6 border border-gray-300">

                                <span class="text-sm text-gray-700 break-all">
                                    {{ $user->email }}
                                </span>

                            </td>


                            {{-- ROLE --}}
                            <td class="px-6 py-6 text-center border border-gray-300">

                                <span
                                    class="inline-flex
                                           items-center
                                           px-3 lg:px-4 py-2
                                           rounded-full
                                           border
                                           text-xs lg:text-sm
                                           font-semibold
                                           {{ $colors[$user->role->name] ?? 'bg-gray-100 text-gray-700 border-gray-200' }}"
                                >

                                    {{ $user->role->name }}

                                </span>

                            </td>


                            {{-- ACCOUNT STATUS --}}
                            <td class="px-6 py-6 text-center border border-gray-300">

                                @if($user->active)

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 lg:px-4 py-2
                                               rounded-full
                                               bg-green-100
                                               text-green-700
                                               border border-green-200
                                               text-xs lg:text-sm
                                               font-semibold
                                               whitespace-nowrap"
                                    >

                                        <span>●</span>
                                        Active

                                    </span>

                                @else

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-3 lg:px-4 py-2
                                               rounded-full
                                               bg-red-100
                                               text-red-700
                                               border border-red-200
                                               text-xs lg:text-sm
                                               font-semibold
                                               whitespace-nowrap"
                                    >

                                        <span>●</span>
                                        Suspended

                                    </span>

                                @endif

                            </td>


                            {{-- ONLINE STATUS --}}
                            <td class="px-6 py-6 text-center border border-gray-300">

                                @if($user->isOnline())

                                    <div class="flex flex-col items-center">

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   gap-2
                                                   px-3 lg:px-4 py-2
                                                   rounded-full
                                                   bg-emerald-100
                                                   text-emerald-700
                                                   border border-emerald-200
                                                   text-xs lg:text-sm
                                                   font-semibold
                                                   whitespace-nowrap"
                                        >

                                            🟢 Online

                                        </span>

                                        <span class="text-xs text-gray-500 mt-2">
                                            Active now
                                        </span>

                                    </div>

                                @else

                                    <div class="flex flex-col items-center">

                                        <span
                                            class="inline-flex
                                                   items-center
                                                   gap-2
                                                   px-3 lg:px-4 py-2
                                                   rounded-full
                                                   bg-gray-100
                                                   text-gray-600
                                                   border border-gray-200
                                                   text-xs lg:text-sm
                                                   font-semibold
                                                   whitespace-nowrap"
                                        >

                                            ⚪ Offline

                                        </span>

                                        <span class="text-xs text-gray-500 mt-2 whitespace-nowrap">

                                            {{ $user->last_seen
                                                ? $user->last_seen->diffForHumans()
                                                : 'Never logged in' }}

                                        </span>

                                    </div>

                                @endif

                            </td>


                            {{-- ACTIONS --}}
                            <td class="px-6 lg:px-8 py-6 border border-gray-300">

                                <div class="flex justify-center items-center gap-2">

                                    {{-- View --}}
                                    <a
                                        href="{{ route('admin.users.show', $user) }}"
                                        class="w-20 lg:w-24
                                               text-center
                                               px-3 py-2.5
                                               bg-sky-600
                                               hover:bg-sky-700
                                               text-white
                                               rounded-xl
                                               font-medium
                                               text-sm
                                               border-2 border-sky-700
                                               transition
                                               shadow-sm"
                                    >
                                        View
                                    </a>


                                    {{-- Suspend / Activate --}}
                                    <form
                                        method="POST"
                                        action="{{ route('admin.users.toggle', $user) }}"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="w-20 lg:w-24
                                                   px-2 py-2.5
                                                   bg-yellow-500
                                                   hover:bg-yellow-600
                                                   text-white
                                                   rounded-xl
                                                   font-medium
                                                   text-sm
                                                   border-2 border-yellow-600
                                                   transition
                                                   shadow-sm"
                                        >

                                            {{ $user->active ? 'Suspend' : 'Activate' }}

                                        </button>

                                    </form>


                                    {{-- Delete --}}
                                    @if(!$user->is_admin)

                                        <form
                                            method="POST"
                                            action="{{ route('admin.users.destroy', $user) }}"
                                            onsubmit="return confirm('Delete this user permanently?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="w-20 lg:w-24
                                                       px-2 py-2.5
                                                       bg-red-600
                                                       hover:bg-red-700
                                                       text-white
                                                       rounded-xl
                                                       font-medium
                                                       text-sm
                                                       border-2 border-red-700
                                                       transition
                                                       shadow-sm"
                                            >
                                                Delete
                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-20
                                       text-center
                                       border border-gray-300"
                            >

                                <div class="flex flex-col items-center">

                                    <div
                                        class="w-20 h-20
                                               rounded-full
                                               bg-slate-100
                                               border-2 border-slate-200
                                               flex items-center
                                               justify-center
                                               text-3xl"
                                    >
                                        👥
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-800 mt-5">
                                        No Users Found
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        No users match your current search or filter.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MOBILE USER CARDS
    ========================================================== --}}

    <div class="md:hidden space-y-4">

        @forelse($users as $user)

            @php

                $colors = [
                    'Admin' => 'bg-red-100 text-red-700 border-red-200',
                    'Student' => 'bg-sky-100 text-sky-700 border-sky-200',
                    'Landlord' => 'bg-green-100 text-green-700 border-green-200',
                    'Business Owner' => 'bg-purple-100 text-purple-700 border-purple-200',
                ];

            @endphp

            <div
                class="bg-white rounded-2xl
                       shadow-md
                       border border-gray-200
                       overflow-hidden"
            >

                {{-- Mobile User Header --}}
                <div class="p-4 sm:p-5">

                    <div class="flex items-center gap-3">

                        @if($user->profile_photo)

                            <img
                                src="{{ asset('storage/'.$user->profile_photo) }}"
                                alt="{{ $user->name }}"
                                class="w-14 h-14
                                       rounded-full
                                       object-cover
                                       border-2 border-gray-300
                                       shadow-sm
                                       flex-shrink-0"
                            >

                        @else

                            <div
                                class="w-14 h-14
                                       rounded-full
                                       bg-sky-100
                                       border-2 border-sky-200
                                       flex items-center
                                       justify-center
                                       text-lg
                                       font-bold
                                       text-sky-700
                                       flex-shrink-0"
                            >

                                {{ strtoupper(substr($user->name, 0, 1)) }}

                            </div>

                        @endif


                        <div class="min-w-0 flex-1">

                            <h3 class="font-bold text-base sm:text-lg text-gray-800 truncate">
                                {{ $user->name }}
                            </h3>

                            <p class="text-xs text-gray-500 mt-1">
                                User ID #{{ $user->id }}
                            </p>

                            <p class="text-xs sm:text-sm text-gray-600 mt-1 break-all">
                                {{ $user->email }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Mobile Details --}}
                <div
                    class="px-4 sm:px-5 py-4
                           bg-slate-50
                           border-y border-gray-200
                           space-y-3"
                >

                    {{-- Role --}}
                    <div class="flex items-center justify-between gap-3">

                        <span class="text-sm font-medium text-gray-500">
                            Role
                        </span>

                        <span
                            class="inline-flex
                                   items-center
                                   px-3 py-1.5
                                   rounded-full
                                   border
                                   text-xs
                                   font-semibold
                                   {{ $colors[$user->role->name] ?? 'bg-gray-100 text-gray-700 border-gray-200' }}"
                        >
                            {{ $user->role->name }}
                        </span>

                    </div>


                    {{-- Account --}}
                    <div class="flex items-center justify-between gap-3">

                        <span class="text-sm font-medium text-gray-500">
                            Account
                        </span>

                        @if($user->active)

                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       px-3 py-1.5
                                       rounded-full
                                       bg-green-100
                                       text-green-700
                                       border border-green-200
                                       text-xs
                                       font-semibold"
                            >
                                <span>●</span>
                                Active
                            </span>

                        @else

                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       px-3 py-1.5
                                       rounded-full
                                       bg-red-100
                                       text-red-700
                                       border border-red-200
                                       text-xs
                                       font-semibold"
                            >
                                <span>●</span>
                                Suspended
                            </span>

                        @endif

                    </div>


                    {{-- Activity --}}
                    <div class="flex items-center justify-between gap-3">

                        <span class="text-sm font-medium text-gray-500">
                            Activity
                        </span>

                        @if($user->isOnline())

                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       px-3 py-1.5
                                       rounded-full
                                       bg-emerald-100
                                       text-emerald-700
                                       border border-emerald-200
                                       text-xs
                                       font-semibold"
                            >
                                🟢 Online
                            </span>

                        @else

                            <span
                                class="inline-flex
                                       items-center
                                       gap-1.5
                                       px-3 py-1.5
                                       rounded-full
                                       bg-gray-100
                                       text-gray-600
                                       border border-gray-200
                                       text-xs
                                       font-semibold"
                            >
                                ⚪ Offline
                            </span>

                        @endif

                    </div>


                    {{-- Last Seen --}}
                    <div class="flex items-center justify-between gap-3">

                        <span class="text-sm font-medium text-gray-500">
                            Last Seen
                        </span>

                        <span class="text-xs text-gray-600 text-right">

                            @if($user->isOnline())

                                Active now

                            @else

                                {{ $user->last_seen
                                    ? $user->last_seen->diffForHumans()
                                    : 'Never logged in' }}

                            @endif

                        </span>

                    </div>

                </div>


                {{-- Mobile Actions --}}
                <div class="p-4 sm:p-5">

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-2.5">

                        {{-- View --}}
                        <a
                            href="{{ route('admin.users.show', $user) }}"
                            class="w-full
                                   text-center
                                   px-4 py-3
                                   bg-sky-600
                                   hover:bg-sky-700
                                   text-white
                                   rounded-xl
                                   font-semibold
                                   text-sm
                                   border-2 border-sky-700
                                   transition
                                   shadow-sm"
                        >
                            View User
                        </a>


                        {{-- Suspend / Activate --}}
                        <form
                            method="POST"
                            action="{{ route('admin.users.toggle', $user) }}"
                            class="w-full"
                        >

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                class="w-full
                                       px-4 py-3
                                       bg-yellow-500
                                       hover:bg-yellow-600
                                       text-white
                                       rounded-xl
                                       font-semibold
                                       text-sm
                                       border-2 border-yellow-600
                                       transition
                                       shadow-sm"
                            >

                                {{ $user->active ? 'Suspend' : 'Activate' }}

                            </button>

                        </form>


                        {{-- Delete --}}
                        @if(!$user->is_admin)

                            <form
                                method="POST"
                                action="{{ route('admin.users.destroy', $user) }}"
                                onsubmit="return confirm('Delete this user permanently?')"
                                class="w-full"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-full
                                           px-4 py-3
                                           bg-red-600
                                           hover:bg-red-700
                                           text-white
                                           rounded-xl
                                           font-semibold
                                           text-sm
                                           border-2 border-red-700
                                           transition
                                           shadow-sm"
                                >
                                    Delete
                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

        @empty

            <div
                class="bg-white rounded-2xl
                       shadow-md
                       border border-gray-200
                       px-5 py-16
                       text-center"
            >

                <div class="flex flex-col items-center">

                    <div
                        class="w-20 h-20
                               rounded-full
                               bg-slate-100
                               border-2 border-slate-200
                               flex items-center
                               justify-center
                               text-3xl"
                    >
                        👥
                    </div>

                    <h3 class="text-xl font-bold text-gray-800 mt-5">
                        No Users Found
                    </h3>

                    <p class="text-sm text-gray-500 mt-2 max-w-sm">
                        No users match your current search or filter.
                    </p>

                </div>

            </div>

        @endforelse

    </div>


    {{-- =========================================================
         PAGINATION
    ========================================================== --}}

    <div
        class="bg-white
               rounded-xl sm:rounded-2xl
               shadow-md
               border border-gray-200 sm:border-2
               px-4 sm:px-6
               py-4 sm:py-5"
    >

        <div
            class="flex
                   flex-col
                   lg:flex-row
                   lg:items-center
                   lg:justify-between
                   gap-4"
        >

            {{-- Results Information --}}
            <div class="text-xs sm:text-sm text-gray-600 text-center lg:text-left">

                @if($users->total() > 0)

                    Showing

                    <span class="font-bold text-gray-900">
                        {{ $users->firstItem() }}
                    </span>

                    to

                    <span class="font-bold text-gray-900">
                        {{ $users->lastItem() }}
                    </span>

                    of

                    <span class="font-bold text-gray-900">
                        {{ $users->total() }}
                    </span>

                    users

                @else

                    No users found.

                @endif

            </div>


            {{-- Pagination Links --}}
            <div class="w-full lg:w-auto overflow-x-auto flex justify-center lg:justify-end">

                <div class="min-w-max">

                    {{ $users->withQueryString()->links() }}

                </div>

            </div>

        </div>

    </div>

</div>

@endsection