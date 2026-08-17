@extends('layouts.admin')

@section('title', 'Announcements')

@section('content')

<div class="space-y-6 sm:space-y-7 min-w-0 pt-20 sm:pt-24 lg:pt-0">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div class="flex items-center gap-3 min-w-0">

            <div class="w-11 h-11 sm:w-12 sm:h-12 flex-shrink-0 rounded-xl bg-red-100 border border-red-200 flex items-center justify-center text-xl">
                📢
            </div>

            <div class="min-w-0">

                <h1 class="text-2xl sm:text-2xl font-bold text-slate-800 break-words">
                    Announcements
                </h1>

                <p class="text-xs sm:text-sm text-slate-500 mt-1 break-words">
                    Create and manage announcements across CampusConnect.
                </p>

            </div>

        </div>


        <a
            href="{{ route('admin.announcements.create') }}"
            class="w-full lg:w-auto inline-flex items-center justify-center gap-2
                   bg-red-600 hover:bg-red-700
                   text-white text-sm font-semibold
                   px-5 py-2.5 rounded-xl
                   border border-red-700
                   shadow-md hover:shadow-lg
                   transition duration-200">

            <span class="text-lg">
                +
            </span>

            Create Announcement

        </a>

    </div>


    {{-- =========================================================
         STATISTICS
    ========================================================== --}}

    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4">


        {{-- Total Announcements --}}

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">

            <div class="flex items-center justify-between gap-3">

                <div class="min-w-0">

                    <p class="text-xs sm:text-sm text-slate-500 truncate">
                        Total Announcements
                    </p>

                    <h2 class="text-2xl sm:text-3xl font-bold text-slate-800 mt-1">
                        {{ number_format($announcements->total()) }}
                    </h2>

                </div>

                <div class="hidden sm:flex w-10 h-10 flex-shrink-0 rounded-lg bg-red-100 border border-red-200 items-center justify-center text-lg">
                    📢
                </div>

            </div>

        </div>


        {{-- Universities --}}

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">

            <div class="flex items-center justify-between gap-3">

                <div class="min-w-0">

                    <p class="text-xs sm:text-sm text-slate-500 truncate">
                        Universities
                    </p>

                    <h2 class="text-2xl sm:text-3xl font-bold text-sky-600 mt-1">
                        {{ number_format($universities->count()) }}
                    </h2>

                </div>

                <div class="hidden sm:flex w-10 h-10 flex-shrink-0 rounded-lg bg-sky-100 border border-sky-200 items-center justify-center text-lg">
                    🎓
                </div>

            </div>

        </div>


        {{-- Current Page --}}

        <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">

            <div class="flex items-center justify-between gap-3">

                <div class="min-w-0">

                    <p class="text-xs sm:text-sm text-slate-500 truncate">
                        Current Page
                    </p>

                    <h2 class="text-2xl sm:text-3xl font-bold text-purple-600 mt-1">
                        {{ $announcements->currentPage() }}
                    </h2>

                </div>

                <div class="hidden sm:flex w-10 h-10 flex-shrink-0 rounded-lg bg-purple-100 border border-purple-200 items-center justify-center text-lg">
                    📄
                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         SEARCH / FILTER
    ========================================================== --}}

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4 sm:p-5">

        <form
            method="GET"
            action="{{ route('admin.announcements') }}">

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-3 items-end">


                {{-- SEARCH --}}

                <div class="lg:col-span-5 min-w-0">

                    <label
                        for="search"
                        class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">

                        Search

                    </label>

                    <input
                        id="search"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search title or content..."
                        class="w-full min-w-0 rounded-lg
                               border border-slate-300
                               bg-white
                               px-3 py-2.5
                               text-sm text-slate-800
                               placeholder-slate-400
                               shadow-sm
                               outline-none
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-500/20
                               transition duration-200">

                </div>


                {{-- UNIVERSITY --}}

                <div class="lg:col-span-4 min-w-0">

                    <label
                        for="university"
                        class="block text-xs sm:text-sm font-semibold text-slate-700 mb-1.5">

                        University

                    </label>

                    <select
                        id="university"
                        name="university"
                        class="w-full min-w-0 max-w-full rounded-lg
                               border border-slate-300
                               bg-white
                               px-3 py-2.5
                               text-sm text-slate-800
                               shadow-sm
                               outline-none
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-500/20
                               transition duration-200">

                        <option value="">
                            All Universities
                        </option>

                        @foreach($universities as $university)

                            <option
                                value="{{ $university->id }}"
                                {{ request('university') == $university->id ? 'selected' : '' }}>

                                {{ $university->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- SEARCH BUTTON --}}

                <div class="md:col-span-1 lg:col-span-2">

                    <button
                        type="submit"
                        class="w-full
                               bg-sky-600
                               hover:bg-sky-700
                               border border-sky-700
                               text-white
                               text-sm
                               font-semibold
                               px-5 py-2.5
                               rounded-lg
                               shadow-sm
                               hover:shadow-md
                               transition duration-200">

                        Search

                    </button>

                </div>


                {{-- CLEAR --}}

                <div class="md:col-span-1 lg:col-span-1">

                    <a
                        href="{{ route('admin.announcements') }}"
                        class="w-full
                               inline-flex
                               items-center
                               justify-center
                               px-4 py-2.5
                               rounded-lg
                               border border-slate-300
                               bg-white
                               text-slate-700
                               text-sm
                               font-semibold
                               hover:bg-slate-50
                               hover:border-slate-400
                               transition duration-200">

                        Clear

                    </a>

                </div>

            </div>

        </form>

    </div>


    {{-- =========================================================
         ANNOUNCEMENTS
    ========================================================== --}}

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden min-w-0">


        {{-- SECTION HEADER --}}

        <div class="px-4 sm:px-5 py-4 border-b border-slate-200">

            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                All Announcements
            </h2>

            <p class="text-xs sm:text-sm text-slate-500 mt-1">
                Manage announcements published on the platform.
            </p>

        </div>


        {{-- =====================================================
             ANNOUNCEMENTS EXIST
        ====================================================== --}}

        @if($announcements->count())


            {{-- =================================================
                 DESKTOP TABLE
            ================================================== --}}

            <div class="hidden xl:block overflow-x-auto">

                <table class="w-full table-fixed">


                    {{-- TABLE HEADER --}}

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr class="text-left text-xs text-slate-600">

                            <th class="w-[34%] px-4 py-3 font-semibold">
                                Announcement
                            </th>

                            <th class="w-[20%] px-4 py-3 font-semibold">
                                University
                            </th>

                            <th class="w-[18%] px-4 py-3 font-semibold">
                                Posted By
                            </th>

                            <th class="w-[13%] px-4 py-3 font-semibold">
                                Date
                            </th>

                            <th class="w-[15%] px-4 py-3 text-center font-semibold">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    {{-- TABLE BODY --}}

                    <tbody class="divide-y divide-slate-200">

                        @foreach($announcements as $announcement)

                            <tr class="hover:bg-slate-50 transition">


                                {{-- ANNOUNCEMENT --}}

                                <td class="px-4 py-4 min-w-0">

                                    <div class="flex items-start gap-3 min-w-0">

                                        <div
                                            class="w-9 h-9 flex-shrink-0 rounded-lg
                                                   bg-red-100
                                                   border border-red-200
                                                   flex items-center
                                                   justify-center
                                                   text-base">

                                            📢

                                        </div>


                                        <div class="min-w-0 w-full">

                                            <a
                                                href="{{ route('admin.announcements.show', $announcement) }}"
                                                class="block font-semibold text-sm text-slate-800
                                                       hover:text-sky-600
                                                       transition
                                                       break-words
                                                       line-clamp-2">

                                                {{ $announcement->title }}

                                            </a>


                                            <p
                                                class="text-xs text-slate-500 mt-1
                                                       line-clamp-2
                                                       break-words">

                                                {{ $announcement->content }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- UNIVERSITY --}}

                                <td class="px-4 py-4 min-w-0">

                                    <div
                                        class="inline-flex max-w-full
                                               items-center gap-1
                                               px-2.5 py-1
                                               rounded-full
                                               bg-sky-100
                                               border border-sky-200
                                               text-sky-700
                                               text-xs
                                               font-semibold">

                                        <span class="flex-shrink-0">🎓</span>

                                        <span class="min-w-0 truncate">
                                            {{ $announcement->university->name ?? 'Unknown' }}
                                        </span>

                                    </div>

                                </td>


                                {{-- POSTED BY --}}

                                <td class="px-4 py-4 min-w-0">

                                    <div class="font-semibold text-sm text-slate-700 truncate">

                                        {{ $announcement->user->name ?? 'System' }}

                                    </div>


                                    @if($announcement->user)

                                        <div class="text-[11px] text-slate-400 mt-1 truncate">

                                            {{ $announcement->user->email }}

                                        </div>

                                    @endif

                                </td>


                                {{-- DATE --}}

                                <td class="px-4 py-4">

                                    <div class="text-xs font-medium text-slate-700 whitespace-nowrap">

                                        {{ $announcement->created_at->format('d M Y') }}

                                    </div>


                                    <div class="text-[11px] text-slate-400 mt-1 whitespace-nowrap">

                                        {{ $announcement->created_at->diffForHumans() }}

                                    </div>

                                </td>


                                {{-- ACTIONS --}}

                                <td class="px-4 py-4">

                                    <div class="flex items-center justify-center gap-1.5">


                                        {{-- VIEW --}}

                                        <a
                                            href="{{ route('admin.announcements.show', $announcement) }}"
                                            class="w-8 h-8
                                                   rounded-lg
                                                   bg-sky-100
                                                   border border-sky-200
                                                   text-sky-700
                                                   flex items-center
                                                   justify-center
                                                   hover:bg-sky-200
                                                   hover:border-sky-300
                                                   transition
                                                   text-sm"
                                            title="View">

                                            👁

                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('admin.announcements.edit', $announcement) }}"
                                            class="w-8 h-8
                                                   rounded-lg
                                                   bg-amber-100
                                                   border border-amber-200
                                                   text-amber-700
                                                   flex items-center
                                                   justify-center
                                                   hover:bg-amber-200
                                                   hover:border-amber-300
                                                   transition
                                                   text-sm"
                                            title="Edit">

                                            ✏️

                                        </a>


                                        {{-- DELETE --}}

                                        <form
                                            method="POST"
                                            action="{{ route('admin.announcements.destroy', $announcement) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this announcement?');">

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="w-8 h-8
                                                       rounded-lg
                                                       bg-red-100
                                                       border border-red-200
                                                       text-red-700
                                                       flex items-center
                                                       justify-center
                                                       hover:bg-red-200
                                                       hover:border-red-300
                                                       transition
                                                       text-sm"
                                                title="Delete">

                                                🗑

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- =================================================
                 MOBILE / TABLET CARDS
            ================================================== --}}

            <div class="xl:hidden p-3 sm:p-4 bg-slate-50 space-y-3">

                @foreach($announcements as $announcement)

                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">


                        {{-- CARD HEADER --}}

                        <div class="p-4">

                            <div class="flex items-start gap-3 min-w-0">

                                <div
                                    class="w-9 h-9 flex-shrink-0 rounded-lg
                                           bg-red-100
                                           border border-red-200
                                           flex items-center
                                           justify-center
                                           text-base">

                                    📢

                                </div>


                                <div class="min-w-0 flex-1">

                                    <a
                                        href="{{ route('admin.announcements.show', $announcement) }}"
                                        class="block text-sm sm:text-base
                                               font-bold text-slate-800
                                               hover:text-sky-600
                                               break-words
                                               line-clamp-2">

                                        {{ $announcement->title }}

                                    </a>


                                    <p
                                        class="text-xs sm:text-sm text-slate-500
                                               mt-1
                                               break-words
                                               line-clamp-3">

                                        {{ $announcement->content }}

                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- CARD INFORMATION --}}

                        <div class="px-4 pb-4">

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">


                                {{-- University --}}

                                <div class="rounded-lg bg-slate-50 border border-slate-200 p-3 min-w-0">

                                    <p class="text-[10px] font-bold uppercase tracking-wide text-slate-400">
                                        University
                                    </p>

                                    <p class="mt-1 text-xs sm:text-sm font-semibold text-slate-700 break-words">
                                        🎓 {{ $announcement->university->name ?? 'Unknown' }}
                                    </p>

                                </div>


                                {{-- Posted By --}}

                                <div class="rounded-lg bg-slate-50 border border-slate-200 p-3 min-w-0">

                                    <p class="text-[10px] font-bold uppercase tracking-wide text-slate-400">
                                        Posted By
                                    </p>

                                    <p class="mt-1 text-xs sm:text-sm font-semibold text-slate-700 truncate">
                                        {{ $announcement->user->name ?? 'System' }}
                                    </p>

                                    @if($announcement->user)

                                        <p class="text-[11px] text-slate-400 truncate">
                                            {{ $announcement->user->email }}
                                        </p>

                                    @endif

                                </div>


                                {{-- Date --}}

                                <div class="rounded-lg bg-slate-50 border border-slate-200 p-3 min-w-0">

                                    <p class="text-[10px] font-bold uppercase tracking-wide text-slate-400">
                                        Date
                                    </p>

                                    <p class="mt-1 text-xs sm:text-sm font-semibold text-slate-700">
                                        {{ $announcement->created_at->format('d M Y') }}
                                    </p>

                                    <p class="text-[11px] text-slate-400">
                                        {{ $announcement->created_at->diffForHumans() }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- ACTIONS --}}

                        <div class="px-4 py-3 bg-slate-50 border-t border-slate-200">

                            <div class="flex items-center justify-between gap-2">

                                <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wide text-slate-400">
                                    Actions
                                </span>


                                <div class="flex items-center gap-1.5">


                                    {{-- VIEW --}}

                                    <a
                                        href="{{ route('admin.announcements.show', $announcement) }}"
                                        class="w-8 h-8 rounded-lg
                                               bg-sky-100
                                               border border-sky-200
                                               text-sky-700
                                               flex items-center
                                               justify-center
                                               hover:bg-sky-200
                                               transition
                                               text-sm"
                                        title="View">

                                        👁

                                    </a>


                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('admin.announcements.edit', $announcement) }}"
                                        class="w-8 h-8 rounded-lg
                                               bg-amber-100
                                               border border-amber-200
                                               text-amber-700
                                               flex items-center
                                               justify-center
                                               hover:bg-amber-200
                                               transition
                                               text-sm"
                                        title="Edit">

                                        ✏️

                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        method="POST"
                                        action="{{ route('admin.announcements.destroy', $announcement) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this announcement?');">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-8 h-8 rounded-lg
                                                   bg-red-100
                                                   border border-red-200
                                                   text-red-700
                                                   flex items-center
                                                   justify-center
                                                   hover:bg-red-200
                                                   transition
                                                   text-sm"
                                            title="Delete">

                                            🗑

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- =====================================================
                 PAGINATION
            ====================================================== --}}

            @if($announcements->hasPages())

                <div class="px-4 sm:px-5 py-4 border-t border-slate-200 overflow-x-auto">

                    <div class="min-w-max">

                        {{ $announcements->links() }}

                    </div>

                </div>

            @endif


        @else


            {{-- =====================================================
                 EMPTY STATE
            ====================================================== --}}

            <div class="py-16 sm:py-20 px-4 text-center">

                <div
                    class="w-16 h-16 sm:w-20 sm:h-20 rounded-full
                           bg-red-100
                           border border-red-200
                           flex items-center
                           justify-center
                           text-2xl sm:text-3xl
                           mx-auto">

                    📢

                </div>


                <h3 class="text-lg sm:text-xl font-bold text-slate-800 mt-5">

                    No announcements found

                </h3>


                <p class="text-sm text-slate-500 mt-2 max-w-md mx-auto break-words">

                    There are no announcements matching your search.

                </p>


                <a
                    href="{{ route('admin.announcements.create') }}"
                    class="inline-flex
                           items-center
                           gap-2
                           mt-5
                           bg-red-600
                           hover:bg-red-700
                           border border-red-700
                           text-white
                           text-sm
                           font-semibold
                           px-5 py-2.5
                           rounded-xl
                           shadow-md
                           hover:shadow-lg
                           transition">

                    <span>
                        +
                    </span>

                    Create Announcement

                </a>

            </div>

        @endif

    </div>

</div>

@endsection