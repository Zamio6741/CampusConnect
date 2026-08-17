@extends('layouts.admin')

@section('title', 'User Details')

@section('content')

@php

$roleName = $user->role->name ?? 'User';

$roleColors = [
    'Admin' => [
        'badge' => 'bg-red-100 text-red-700 border-red-200',
        'icon'  => 'bg-red-100 text-red-600',
        'accent'=> 'text-red-600',
    ],

    'Student' => [
        'badge' => 'bg-sky-100 text-sky-700 border-sky-200',
        'icon'  => 'bg-sky-100 text-sky-600',
        'accent'=> 'text-sky-600',
    ],

    'Landlord' => [
        'badge' => 'bg-green-100 text-green-700 border-green-200',
        'icon'  => 'bg-green-100 text-green-600',
        'accent'=> 'text-green-600',
    ],

    'Business Owner' => [
        'badge' => 'bg-purple-100 text-purple-700 border-purple-200',
        'icon'  => 'bg-purple-100 text-purple-600',
        'accent'=> 'text-purple-600',
    ],
];

$roleStyle = $roleColors[$roleName] ?? [
    'badge' => 'bg-slate-100 text-slate-700 border-slate-200',
    'icon'  => 'bg-slate-100 text-slate-600',
    'accent'=> 'text-slate-600',
];

$initial = strtoupper(substr($user->name ?? 'U', 0, 1));

@endphp


<div class="w-full max-w-7xl mx-auto space-y-5 sm:space-y-6 lg:space-y-8 px-0 sm:px-0">


{{-- =========================================================
     PAGE HEADER
========================================================== --}}

<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 sm:gap-5">

    <div class="flex items-center gap-3 sm:gap-4 min-w-0">

        <div class="w-11 h-11 sm:w-14 sm:h-14 rounded-xl sm:rounded-2xl
                    bg-sky-100
                    border-2 border-sky-200
                    flex items-center justify-center
                    text-xl sm:text-2xl
                    flex-shrink-0">

            👤

        </div>

        <div class="min-w-0">

            <h1 class="text-2xl sm:text-3xl font-bold text-slate-800">
                User Details
            </h1>

            <p class="text-sm sm:text-base text-slate-500 mt-1 leading-5">
                View and manage this CampusConnect user account.
            </p>

        </div>

    </div>


    {{-- Header Actions --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex gap-3 w-full lg:w-auto">

        <a
            href="{{ route('admin.users') }}"
            class="inline-flex items-center justify-center gap-2
                   px-4 sm:px-5 py-3
                   rounded-xl
                   bg-white
                   border-2 border-slate-200
                   text-slate-700
                   font-semibold
                   hover:bg-slate-50
                   hover:border-slate-300
                   transition duration-200
                   text-sm sm:text-base">

            ← Back to Users

        </a>


        <form
            method="POST"
            action="{{ route('admin.users.toggle', $user) }}"
            class="w-full">

            @csrf
            @method('PATCH')

            <button
                type="submit"
                class="w-full inline-flex items-center justify-center gap-2
                       px-4 sm:px-5 py-3
                       rounded-xl
                       {{ $user->active
                            ? 'bg-yellow-500 hover:bg-yellow-600'
                            : 'bg-green-600 hover:bg-green-700' }}
                       text-white
                       font-semibold
                       shadow-sm
                       transition duration-200
                       text-sm sm:text-base">

                {{ $user->active ? '⏸ Suspend Account' : '✓ Activate Account' }}

            </button>

        </form>

    </div>

</div>



{{-- =========================================================
     PROFILE HERO
========================================================== --}}

<div class="bg-white
            rounded-2xl sm:rounded-3xl
            shadow-md
            border-2 border-slate-200
            overflow-hidden">


    {{-- Top Banner --}}

    <div class="h-24 sm:h-32
                bg-gradient-to-r
                from-sky-600
                via-blue-600
                to-indigo-600
                relative">

        <div class="absolute inset-0 opacity-10">

            <div class="absolute -top-10 -right-10
                        w-32 h-32 sm:w-48 sm:h-48
                        rounded-full
                        bg-white">
            </div>

            <div class="absolute -bottom-16 left-10 sm:left-20
                        w-40 h-40 sm:w-56 sm:h-56
                        rounded-full
                        bg-white">
            </div>

        </div>

    </div>


    {{-- Profile Content --}}

    <div class="px-4 sm:px-6 lg:px-8 pb-6 sm:pb-8">

        <div class="flex flex-col lg:flex-row
                    lg:items-end
                    lg:justify-between
                    gap-5 sm:gap-6
                    -mt-12 sm:-mt-16">


            {{-- Avatar + Identity --}}

            <div class="flex flex-col sm:flex-row
                        sm:items-end
                        gap-4 sm:gap-5
                        min-w-0">


                {{-- Avatar --}}

                <div class="relative flex-shrink-0">

                    @if($user->profile_photo)

                        <img
                            src="{{ asset('storage/'.$user->profile_photo) }}"
                            alt="{{ $user->name }}"
                            class="w-24 h-24 sm:w-32 sm:h-32
                                   rounded-2xl sm:rounded-3xl
                                   object-cover
                                   border-4
                                   border-white
                                   shadow-xl">

                    @else

                        <div class="w-24 h-24 sm:w-32 sm:h-32
                                    rounded-2xl sm:rounded-3xl
                                    bg-sky-100
                                    border-4
                                    border-white
                                    shadow-xl
                                    flex items-center
                                    justify-center
                                    text-4xl sm:text-5xl
                                    font-bold
                                    text-sky-700">

                            {{ $initial }}

                        </div>

                    @endif


                    {{-- Online indicator --}}

                    @if($user->isOnline())

                        <span
                            class="absolute
                                   bottom-1 sm:bottom-2
                                   right-1 sm:right-2
                                   w-5 h-5 sm:w-6 sm:h-6
                                   rounded-full
                                   bg-emerald-500
                                   border-4
                                   border-white"
                            title="Online">
                        </span>

                    @endif

                </div>


                {{-- Identity --}}

                <div class="pb-0 sm:pb-2 min-w-0">

                    <div class="flex flex-wrap items-center gap-2 sm:gap-3">

                        <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 break-words">
                            {{ $user->name }}
                        </h2>


                        <span
                            class="inline-flex items-center
                                   px-2.5 sm:px-3 py-1 sm:py-1.5
                                   rounded-full
                                   border
                                   text-xs sm:text-sm
                                   font-bold
                                   {{ $roleStyle['badge'] }}">

                            {{ $roleName }}

                        </span>

                    </div>


                    <p class="text-sm sm:text-base text-slate-500 mt-2 break-all">
                        {{ $user->email }}
                    </p>


                    <div class="flex flex-wrap items-center gap-2 sm:gap-3 mt-3">

                        @if($user->active)

                            <span
                                class="inline-flex items-center gap-2
                                       px-2.5 sm:px-3 py-1 sm:py-1.5
                                       rounded-full
                                       bg-green-50
                                       border border-green-200
                                       text-green-700
                                       text-xs sm:text-sm
                                       font-semibold">

                                <span class="w-2 h-2 rounded-full bg-green-500"></span>

                                Active Account

                            </span>

                        @else

                            <span
                                class="inline-flex items-center gap-2
                                       px-2.5 sm:px-3 py-1 sm:py-1.5
                                       rounded-full
                                       bg-red-50
                                       border border-red-200
                                       text-red-700
                                       text-xs sm:text-sm
                                       font-semibold">

                                <span class="w-2 h-2 rounded-full bg-red-500"></span>

                                Suspended Account

                            </span>

                        @endif


                        @if($user->isOnline())

                            <span
                                class="inline-flex items-center gap-2
                                       px-2.5 sm:px-3 py-1 sm:py-1.5
                                       rounded-full
                                       bg-emerald-50
                                       border border-emerald-200
                                       text-emerald-700
                                       text-xs sm:text-sm
                                       font-semibold">

                                🟢 Online

                            </span>

                        @else

                            <span
                                class="inline-flex items-center gap-2
                                       px-2.5 sm:px-3 py-1 sm:py-1.5
                                       rounded-full
                                       bg-slate-50
                                       border border-slate-200
                                       text-slate-600
                                       text-xs sm:text-sm
                                       font-semibold">

                                ⚪ Offline

                            </span>

                        @endif

                    </div>

                </div>

            </div>


            {{-- User ID --}}

            <div
                class="bg-slate-50
                       border-2 border-slate-200
                       rounded-2xl
                       px-4 sm:px-5 py-3 sm:py-4
                       w-full lg:w-auto
                       lg:min-w-[180px]">

                <p class="text-xs
                          uppercase
                          tracking-wider
                          font-bold
                          text-slate-400">

                    User ID

                </p>

                <p class="text-xl sm:text-2xl
                          font-bold
                          text-slate-800
                          mt-1">

                    #{{ $user->id }}

                </p>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     ACCOUNT OVERVIEW
========================================================== --}}

<div>

    <div class="flex items-center gap-3 mb-4 sm:mb-5">

        <div class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl
                    bg-sky-100
                    border-2 border-sky-200
                    flex items-center justify-center
                    flex-shrink-0">

            📊

        </div>

        <div>

            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                Account Overview
            </h2>

            <p class="text-xs sm:text-sm text-slate-500">
                Current account status and activity.
            </p>

        </div>

    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">


        {{-- Account Status --}}

        <div class="bg-white
                    rounded-xl sm:rounded-2xl
                    border-2 border-slate-200
                    shadow-sm
                    p-4 sm:p-6">

            <div class="flex items-center justify-between gap-3">

                <div class="min-w-0">

                    <p class="text-sm font-medium text-slate-500">
                        Account Status
                    </p>

                    <h3
                        class="text-lg sm:text-xl font-bold mt-2
                        {{ $user->active
                            ? 'text-green-600'
                            : 'text-red-600' }}">

                        {{ $user->active ? 'Active' : 'Suspended' }}

                    </h3>

                </div>

                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl
                           {{ $user->active
                                ? 'bg-green-100 text-green-600'
                                : 'bg-red-100 text-red-600' }}
                           flex items-center justify-center
                           text-lg sm:text-xl
                           flex-shrink-0">

                    {{ $user->active ? '✓' : '⛔' }}

                </div>

            </div>

        </div>


        {{-- Role --}}

        <div class="bg-white
                    rounded-xl sm:rounded-2xl
                    border-2 border-slate-200
                    shadow-sm
                    p-4 sm:p-6">

            <div class="flex items-center justify-between gap-3">

                <div class="min-w-0">

                    <p class="text-sm font-medium text-slate-500">
                        User Role
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold mt-2 break-words {{ $roleStyle['accent'] }}">
                        {{ $roleName }}
                    </h3>

                </div>

                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl
                           {{ $roleStyle['icon'] }}
                           flex items-center justify-center
                           text-lg sm:text-xl
                           flex-shrink-0">

                    👤

                </div>

            </div>

        </div>


        {{-- Activity --}}

        <div class="bg-white
                    rounded-xl sm:rounded-2xl
                    border-2 border-slate-200
                    shadow-sm
                    p-4 sm:p-6">

            <div class="flex items-center justify-between gap-3">

                <div>

                    <p class="text-sm font-medium text-slate-500">
                        Activity
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold mt-2
                               {{ $user->isOnline()
                                    ? 'text-emerald-600'
                                    : 'text-slate-600' }}">

                        {{ $user->isOnline() ? 'Online' : 'Offline' }}

                    </h3>

                </div>

                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl
                           {{ $user->isOnline()
                                ? 'bg-emerald-100'
                                : 'bg-slate-100' }}
                           flex items-center justify-center
                           text-lg sm:text-xl
                           flex-shrink-0">

                    {{ $user->isOnline() ? '🟢' : '⚪' }}

                </div>

            </div>

        </div>


        {{-- Joined --}}

        <div class="bg-white
                    rounded-xl sm:rounded-2xl
                    border-2 border-slate-200
                    shadow-sm
                    p-4 sm:p-6">

            <div class="flex items-center justify-between gap-3">

                <div class="min-w-0">

                    <p class="text-sm font-medium text-slate-500">
                        Member Since
                    </p>

                    <h3 class="text-lg sm:text-xl font-bold text-slate-800 mt-2">
                        {{ $user->created_at->format('d M Y') }}
                    </h3>

                </div>

                <div
                    class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl
                           bg-purple-100
                           text-purple-600
                           flex items-center justify-center
                           text-lg sm:text-xl
                           flex-shrink-0">

                    📅

                </div>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     USER INFORMATION
========================================================== --}}

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 sm:gap-6">


    {{-- Personal Information --}}

    <div
        class="lg:col-span-2
               bg-white
               rounded-xl sm:rounded-2xl
               shadow-sm
               border-2 border-slate-200
               overflow-hidden">

        <div
            class="px-4 sm:px-6 py-4 sm:py-5
                   border-b-2 border-slate-200
                   bg-slate-50">

            <div class="flex items-center gap-3">

                <div
                    class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl
                           bg-sky-100
                           border-2 border-sky-200
                           flex items-center justify-center
                           flex-shrink-0">

                    📝

                </div>

                <div>

                    <h2 class="text-base sm:text-lg font-bold text-slate-800">
                        Personal Information
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-500">
                        Basic information associated with this account.
                    </p>

                </div>

            </div>

        </div>


        <div class="p-4 sm:p-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-5">


                {{-- Name --}}

                <div
                    class="rounded-xl
                           border-2 border-slate-200
                           bg-white
                           p-4 sm:p-5
                           hover:border-sky-200
                           transition">

                    <p class="text-xs uppercase
                              tracking-wider
                              font-bold
                              text-slate-400">

                        Full Name

                    </p>

                    <p class="text-base sm:text-lg font-bold
                              text-slate-800
                              mt-2
                              break-words">

                        {{ $user->name }}

                    </p>

                </div>


                {{-- Email --}}

                <div
                    class="rounded-xl
                           border-2 border-slate-200
                           bg-white
                           p-4 sm:p-5
                           hover:border-sky-200
                           transition">

                    <p class="text-xs uppercase
                              tracking-wider
                              font-bold
                              text-slate-400">

                        Email Address

                    </p>

                    <p class="text-base sm:text-lg font-bold
                              text-slate-800
                              mt-2
                              break-all">

                        {{ $user->email }}

                    </p>

                </div>


                {{-- Role --}}

                <div
                    class="rounded-xl
                           border-2 border-slate-200
                           bg-white
                           p-4 sm:p-5
                           hover:border-sky-200
                           transition">

                    <p class="text-xs uppercase
                              tracking-wider
                              font-bold
                              text-slate-400">

                        Assigned Role

                    </p>

                    <div class="mt-2">

                        <span
                            class="inline-flex
                                   px-3 py-1.5
                                   rounded-full
                                   border
                                   text-xs sm:text-sm font-bold
                                   {{ $roleStyle['badge'] }}">

                            {{ $roleName }}

                        </span>

                    </div>

                </div>


                {{-- User ID --}}

                <div
                    class="rounded-xl
                           border-2 border-slate-200
                           bg-white
                           p-4 sm:p-5
                           hover:border-sky-200
                           transition">

                    <p class="text-xs uppercase
                              tracking-wider
                              font-bold
                              text-slate-400">

                        Account ID

                    </p>

                    <p class="text-base sm:text-lg font-bold
                              text-slate-800
                              mt-2">

                        #{{ $user->id }}

                    </p>

                </div>

            </div>

        </div>

    </div>



    {{-- Activity Card --}}

    <div
        class="bg-white
               rounded-xl sm:rounded-2xl
               shadow-sm
               border-2 border-slate-200
               overflow-hidden">

        <div
            class="px-4 sm:px-6 py-4 sm:py-5
                   border-b-2 border-slate-200
                   bg-slate-50">

            <div class="flex items-center gap-3">

                <div
                    class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl
                           bg-emerald-100
                           border-2 border-emerald-200
                           flex items-center justify-center
                           flex-shrink-0">

                    🟢

                </div>

                <div>

                    <h2 class="text-base sm:text-lg font-bold text-slate-800">
                        Activity
                    </h2>

                    <p class="text-xs sm:text-sm text-slate-500">
                        Login activity.
                    </p>

                </div>

            </div>

        </div>


        <div class="p-4 sm:p-6 space-y-5">


            {{-- Current Status --}}

            <div class="flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-between
                        gap-3
                        pb-5
                        border-b-2 border-slate-100">

                <div>

                    <p class="text-sm font-semibold text-slate-700">
                        Current Status
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Live account activity
                    </p>

                </div>


                @if($user->isOnline())

                    <span
                        class="inline-flex items-center gap-2
                               w-fit
                               px-3 py-1.5
                               rounded-full
                               bg-emerald-100
                               border border-emerald-200
                               text-emerald-700
                               text-sm font-bold">

                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>

                        Online

                    </span>

                @else

                    <span
                        class="inline-flex items-center gap-2
                               w-fit
                               px-3 py-1.5
                               rounded-full
                               bg-slate-100
                               border border-slate-200
                               text-slate-600
                               text-sm font-bold">

                        Offline

                    </span>

                @endif

            </div>


            {{-- Last Seen --}}

            <div>

                <p class="text-xs uppercase
                          tracking-wider
                          font-bold
                          text-slate-400">

                    Last Seen

                </p>

                <p class="font-bold text-slate-800 mt-2 break-words">

                    {{ $user->last_seen
                        ? $user->last_seen->format('d M Y, h:i A')
                        : 'No activity recorded' }}

                </p>

                @if($user->last_seen)

                    <p class="text-xs text-slate-400 mt-1">
                        {{ $user->last_seen->diffForHumans() }}
                    </p>

                @endif

            </div>


            {{-- Joined --}}

            <div>

                <p class="text-xs uppercase
                          tracking-wider
                          font-bold
                          text-slate-400">

                    Account Created

                </p>

                <p class="font-bold text-slate-800 mt-2 break-words">

                    {{ $user->created_at->format('d M Y, h:i A') }}

                </p>

            </div>


            {{-- Updated --}}

            <div>

                <p class="text-xs uppercase
                          tracking-wider
                          font-bold
                          text-slate-400">

                    Last Updated

                </p>

                <p class="font-bold text-slate-800 mt-2 break-words">

                    {{ $user->updated_at->format('d M Y, h:i A') }}

                </p>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     ACCOUNT SECURITY / STATUS
========================================================== --}}

<div
    class="bg-white
           rounded-xl sm:rounded-2xl
           shadow-sm
           border-2 border-slate-200
           overflow-hidden">

    <div
        class="px-4 sm:px-6 py-4 sm:py-5
               border-b-2 border-slate-200
               bg-slate-50">

        <div class="flex items-center gap-3">

            <div
                class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl
                       bg-indigo-100
                       border-2 border-indigo-200
                       flex items-center justify-center
                       flex-shrink-0">

                🛡️

            </div>

            <div>

                <h2 class="text-base sm:text-lg font-bold text-slate-800">
                    Account & Security
                </h2>

                <p class="text-xs sm:text-sm text-slate-500">
                    Manage the user's access to CampusConnect.
                </p>

            </div>

        </div>

    </div>


    <div class="p-4 sm:p-6">

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5">


            {{-- Account Access --}}

            <div
                class="rounded-xl
                       border-2 border-slate-200
                       p-4 sm:p-5">

                <div class="flex items-start gap-3">

                    <div
                        class="w-10 h-10 rounded-xl
                               {{ $user->active
                                    ? 'bg-green-100 text-green-600'
                                    : 'bg-red-100 text-red-600' }}
                               flex items-center justify-center
                               flex-shrink-0">

                        {{ $user->active ? '✓' : '⛔' }}

                    </div>

                    <div class="min-w-0">

                        <p class="font-bold text-slate-800">
                            Account Access
                        </p>

                        <p class="text-sm
                                  mt-1
                                  {{ $user->active
                                        ? 'text-green-600'
                                        : 'text-red-600' }}">

                            {{ $user->active
                                ? 'User can access the platform'
                                : 'User access is suspended' }}

                        </p>

                    </div>

                </div>

            </div>


            {{-- Role Access --}}

            <div
                class="rounded-xl
                       border-2 border-slate-200
                       p-4 sm:p-5">

                <div class="flex items-start gap-3">

                    <div
                        class="w-10 h-10 rounded-xl
                               {{ $roleStyle['icon'] }}
                               flex items-center justify-center
                               flex-shrink-0">

                        🔐

                    </div>

                    <div>

                        <p class="font-bold text-slate-800">
                            Permission Level
                        </p>

                        <p class="text-sm text-slate-500 mt-1">
                            {{ $roleName }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- Online State --}}

            <div
                class="rounded-xl
                       border-2 border-slate-200
                       p-4 sm:p-5">

                <div class="flex items-start gap-3">

                    <div
                        class="w-10 h-10 rounded-xl
                               {{ $user->isOnline()
                                    ? 'bg-emerald-100'
                                    : 'bg-slate-100' }}
                               flex items-center justify-center
                               flex-shrink-0">

                        {{ $user->isOnline() ? '🟢' : '⚪' }}

                    </div>

                    <div>

                        <p class="font-bold text-slate-800">
                            Presence
                        </p>

                        <p class="text-sm text-slate-500 mt-1">

                            {{ $user->isOnline()
                                ? 'Currently online'
                                : 'Currently offline' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     ADMIN ACTIONS
========================================================== --}}

<div
    class="bg-white
           rounded-xl sm:rounded-2xl
           shadow-md
           border-2 border-slate-200
           overflow-hidden">

    <div
        class="px-4 sm:px-6 py-4 sm:py-5
               border-b-2 border-slate-200
               bg-slate-50">

        <div class="flex items-center gap-3">

            <div
                class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl
                       bg-orange-100
                       border-2 border-orange-200
                       flex items-center justify-center
                       flex-shrink-0">

                ⚙️

            </div>

            <div>

                <h2 class="text-base sm:text-lg font-bold text-slate-800">
                    Administrator Actions
                </h2>

                <p class="text-xs sm:text-sm text-slate-500">
                    Manage this user's account.
                </p>

            </div>

        </div>

    </div>


    <div
        class="p-4 sm:p-6
               flex flex-col
               lg:flex-row
               lg:items-center
               lg:justify-between
               gap-5">


        <div class="min-w-0">

            <p class="font-semibold text-slate-800">
                Account Management
            </p>

            <p class="text-sm text-slate-500 mt-1 leading-6">
                Suspending prevents access while deleting permanently removes the account.
            </p>

        </div>


        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 w-full lg:w-auto">


            {{-- Toggle Account --}}

            <form
                method="POST"
                action="{{ route('admin.users.toggle', $user) }}"
                class="w-full">

                @csrf
                @method('PATCH')

                <button
                    type="submit"
                    class="w-full
                           inline-flex
                           items-center
                           justify-center
                           gap-2
                           px-5 sm:px-6 py-3
                           rounded-xl
                           {{ $user->active
                                ? 'bg-yellow-500 hover:bg-yellow-600'
                                : 'bg-green-600 hover:bg-green-700' }}
                           text-white
                           font-semibold
                           transition
                           text-sm sm:text-base">

                    {{ $user->active
                        ? '⏸ Suspend User'
                        : '✓ Activate User' }}

                </button>

            </form>


            {{-- Delete --}}

            @if(!$user->is_admin)

                <form
                    method="POST"
                    action="{{ route('admin.users.destroy', $user) }}"
                    onsubmit="return confirm('Delete this user permanently? This action cannot be undone.');"
                    class="w-full">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full
                               inline-flex
                               items-center
                               justify-center
                               gap-2
                               px-5 sm:px-6 py-3
                               rounded-xl
                               bg-red-600
                               hover:bg-red-700
                               text-white
                               font-semibold
                               transition
                               text-sm sm:text-base">

                        🗑 Delete User

                    </button>

                </form>

            @else

                <div
                    class="w-full
                           inline-flex
                           items-center
                           justify-center
                           gap-2
                           px-5 sm:px-6 py-3
                           rounded-xl
                           bg-slate-100
                           border-2 border-slate-200
                           text-slate-500
                           font-semibold
                           text-sm sm:text-base">

                    🛡️ Protected Admin

                </div>

            @endif

        </div>

    </div>

</div>



{{-- =========================================================
     FOOTER INFORMATION
========================================================== --}}

<div
    class="rounded-xl sm:rounded-2xl
           bg-sky-50
           border-2 border-sky-200
           p-4 sm:p-5">

    <div class="flex items-start gap-3 sm:gap-4">

        <div
            class="w-10 h-10 sm:w-11 sm:h-11 rounded-xl
                   bg-white
                   border-2 border-sky-200
                   flex items-center justify-center
                   flex-shrink-0">

            ℹ️

        </div>

        <div class="min-w-0">

            <h3 class="font-bold text-sky-900">
                User Account Information
            </h3>

            <p class="text-sm text-sky-700 mt-1 leading-6">

                This page displays administrative information for
                <strong>{{ $user->name }}</strong>.
                Account status, role and activity information shown here
                can be used by administrators to manage access to
                CampusConnect.

            </p>

        </div>

    </div>

</div>


</div>

@endsection