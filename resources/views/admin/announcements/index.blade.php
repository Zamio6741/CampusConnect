@extends('layouts.admin')

@section('title', 'Announcements')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-red-100 border border-red-200 flex items-center justify-center text-2xl">
                📢
            </div>

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Announcements
                </h1>

                <p class="text-slate-500 mt-1">
                    Create and manage announcements across CampusConnect.
                </p>
            </div>

        </div>


        <a
            href="{{ route('admin.announcements.create') }}"
            class="inline-flex items-center justify-center gap-2
                   bg-red-600 hover:bg-red-700
                   text-white font-semibold
                   px-6 py-3 rounded-xl
                   border border-red-700
                   shadow-lg hover:shadow-xl
                   transition duration-200">

            <span class="text-xl">
                +
            </span>

            Create Announcement

        </a>

    </div>


    {{-- =========================================================
         STATISTICS
    ========================================================== --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        {{-- Total Announcements --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Announcements
                    </p>

                    <h2 class="text-4xl font-bold text-slate-800 mt-2">
                        {{ number_format($announcements->total()) }}
                    </h2>

                </div>

                <div class="w-12 h-12 rounded-xl bg-red-100 border border-red-200
                            flex items-center justify-center text-xl">

                    📢

                </div>

            </div>

        </div>


        {{-- Universities --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Universities
                    </p>

                    <h2 class="text-4xl font-bold text-sky-600 mt-2">
                        {{ number_format($universities->count()) }}
                    </h2>

                </div>

                <div class="w-12 h-12 rounded-xl bg-sky-100 border border-sky-200
                            flex items-center justify-center text-xl">

                    🎓

                </div>

            </div>

        </div>


        {{-- Current Page --}}

        <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Current Page
                    </p>

                    <h2 class="text-4xl font-bold text-purple-600 mt-2">
                        {{ $announcements->currentPage() }}
                    </h2>

                </div>

                <div class="w-12 h-12 rounded-xl bg-purple-100 border border-purple-200
                            flex items-center justify-center text-xl">

                    📄

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         SEARCH / FILTER
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md border border-slate-200 p-6">

        <form
            method="GET"
            action="{{ route('admin.announcements') }}">

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-4 items-end">


                {{-- =================================================
                     SEARCH
                ================================================== --}}

                <div class="lg:col-span-5">

                    <label
                        for="search"
                        class="block text-sm font-semibold text-slate-700 mb-2">

                        Search

                    </label>

                    <input
                        id="search"
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search title or content..."
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-slate-800
                               placeholder-slate-400
                               shadow-sm
                               outline-none
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-500/20
                               transition duration-200">

                </div>


                {{-- =================================================
                     UNIVERSITY
                ================================================== --}}

                <div class="lg:col-span-4">

                    <label
                        for="university"
                        class="block text-sm font-semibold text-slate-700 mb-2">

                        University

                    </label>

                    <select
                        id="university"
                        name="university"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-slate-800
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


                {{-- =================================================
                     SEARCH BUTTON
                ================================================== --}}

                <div class="lg:col-span-2">

                    <button
                        type="submit"
                        class="w-full
                               bg-sky-600
                               hover:bg-sky-700
                               border border-sky-700
                               text-white
                               font-semibold
                               px-6 py-3
                               rounded-xl
                               shadow-sm
                               hover:shadow-md
                               transition duration-200">

                        Search

                    </button>

                </div>


                {{-- =================================================
                     CLEAR
                ================================================== --}}

                <div class="lg:col-span-1">

                    <a
                        href="{{ route('admin.announcements') }}"
                        class="w-full
                               inline-flex
                               items-center
                               justify-center
                               px-4 py-3
                               rounded-xl
                               border border-slate-300
                               bg-white
                               text-slate-700
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
         ANNOUNCEMENTS TABLE
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md border border-slate-200 overflow-hidden">


        {{-- =====================================================
             SECTION HEADER
        ====================================================== --}}

        <div class="px-6 py-5 border-b border-slate-200">

            <h2 class="text-xl font-bold text-slate-800">
                All Announcements
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Manage announcements published on the platform.
            </p>

        </div>


        {{-- =====================================================
             ANNOUNCEMENTS EXIST
        ====================================================== --}}

        @if($announcements->count())

            <div class="overflow-x-auto">

                <table class="w-full">


                    {{-- =================================================
                         TABLE HEADER
                    ================================================== --}}

                    <thead class="bg-slate-50 border-b border-slate-200">

                        <tr class="text-left text-sm text-slate-600">

                            <th class="px-6 py-4 font-semibold">
                                Announcement
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                University
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Posted By
                            </th>

                            <th class="px-6 py-4 font-semibold">
                                Date
                            </th>

                            <th class="px-6 py-4 text-center font-semibold">
                                Actions
                            </th>

                        </tr>

                    </thead>


                    {{-- =================================================
                         TABLE BODY
                    ================================================== --}}

                    <tbody class="divide-y divide-slate-200">

                        @foreach($announcements as $announcement)

                            <tr class="hover:bg-slate-50 transition">


                                {{-- =================================================
                                     ANNOUNCEMENT
                                ================================================== --}}

                                <td class="px-6 py-5">

                                    <div class="flex items-start gap-4">

                                        <div
                                            class="w-11 h-11 rounded-xl
                                                   bg-red-100
                                                   border border-red-200
                                                   flex items-center
                                                   justify-center
                                                   text-lg
                                                   flex-shrink-0">

                                            📢

                                        </div>


                                        <div class="min-w-0">

                                            <a
                                                href="{{ route('admin.announcements.show', $announcement) }}"
                                                class="font-bold text-slate-800
                                                       hover:text-sky-600
                                                       transition">

                                                {{ $announcement->title }}

                                            </a>


                                            <p
                                                class="text-sm text-slate-500 mt-1
                                                       line-clamp-2 max-w-xl">

                                                {{ $announcement->content }}

                                            </p>

                                        </div>

                                    </div>

                                </td>


                                {{-- =================================================
                                     UNIVERSITY
                                ================================================== --}}

                                <td class="px-6 py-5">

                                    <span
                                        class="inline-flex
                                               items-center
                                               px-3 py-1.5
                                               rounded-full
                                               bg-sky-100
                                               border border-sky-200
                                               text-sky-700
                                               text-sm
                                               font-semibold
                                               whitespace-nowrap">

                                        🎓

                                        {{ $announcement->university->name ?? 'Unknown' }}

                                    </span>

                                </td>


                                {{-- =================================================
                                     POSTED BY
                                ================================================== --}}

                                <td class="px-6 py-5">

                                    <div class="font-semibold text-slate-700">

                                        {{ $announcement->user->name ?? 'System' }}

                                    </div>


                                    @if($announcement->user)

                                        <div class="text-xs text-slate-400 mt-1">

                                            {{ $announcement->user->email }}

                                        </div>

                                    @endif

                                </td>


                                {{-- =================================================
                                     DATE
                                ================================================== --}}

                                <td class="px-6 py-5">

                                    <div class="text-sm font-medium text-slate-700">

                                        {{ $announcement->created_at->format('d M Y') }}

                                    </div>


                                    <div class="text-xs text-slate-400 mt-1">

                                        {{ $announcement->created_at->diffForHumans() }}

                                    </div>

                                </td>


                                {{-- =================================================
                                     ACTIONS
                                ================================================== --}}

                                <td class="px-6 py-5">

                                    <div class="flex items-center justify-center gap-2">


                                        {{-- VIEW --}}

                                        <a
                                            href="{{ route('admin.announcements.show', $announcement) }}"
                                            class="w-9 h-9
                                                   rounded-lg
                                                   bg-sky-100
                                                   border border-sky-200
                                                   text-sky-700
                                                   flex items-center
                                                   justify-center
                                                   hover:bg-sky-200
                                                   hover:border-sky-300
                                                   transition"
                                            title="View">

                                            👁

                                        </a>


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route('admin.announcements.edit', $announcement) }}"
                                            class="w-9 h-9
                                                   rounded-lg
                                                   bg-amber-100
                                                   border border-amber-200
                                                   text-amber-700
                                                   flex items-center
                                                   justify-center
                                                   hover:bg-amber-200
                                                   hover:border-amber-300
                                                   transition"
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
                                                class="w-9 h-9
                                                       rounded-lg
                                                       bg-red-100
                                                       border border-red-200
                                                       text-red-700
                                                       flex items-center
                                                       justify-center
                                                       hover:bg-red-200
                                                       hover:border-red-300
                                                       transition"
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


            {{-- =====================================================
                 PAGINATION
            ====================================================== --}}

            @if($announcements->hasPages())

                <div class="px-6 py-5 border-t border-slate-200">

                    {{ $announcements->links() }}

                </div>

            @endif


        @else


            {{-- =====================================================
                 EMPTY STATE
            ====================================================== --}}

            <div class="py-24 text-center">

                <div
                    class="w-20 h-20 rounded-full
                           bg-red-100
                           border border-red-200
                           flex items-center
                           justify-center
                           text-3xl
                           mx-auto">

                    📢

                </div>


                <h3 class="text-xl font-bold text-slate-800 mt-6">

                    No announcements found

                </h3>


                <p class="text-slate-500 mt-2 max-w-md mx-auto">

                    There are no announcements matching your search.

                </p>


                <a
                    href="{{ route('admin.announcements.create') }}"
                    class="inline-flex
                           items-center
                           gap-2
                           mt-6
                           bg-red-600
                           hover:bg-red-700
                           border border-red-700
                           text-white
                           font-semibold
                           px-6 py-3
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