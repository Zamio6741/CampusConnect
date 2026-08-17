@extends('layouts.admin')

@section('title', 'Notes Management')

@section('content')

@if(session('success'))
    <div class="mb-6 w-full max-w-full overflow-hidden rounded-2xl bg-green-50 border-2 border-green-300 text-green-700 px-4 sm:px-6 py-4 shadow-sm">
        <div class="flex items-start gap-3 min-w-0">
            <span class="text-xl flex-shrink-0">✅</span>

            <div class="min-w-0 flex-1">
                <p class="font-semibold">Success</p>

                <p class="text-sm break-words [overflow-wrap:anywhere]">
                    {{ session('success') }}
                </p>
            </div>
        </div>
    </div>
@endif


@if(session('error'))
    <div class="mb-6 w-full max-w-full overflow-hidden rounded-2xl bg-red-50 border-2 border-red-300 text-red-700 px-4 sm:px-6 py-4 shadow-sm">
        <div class="flex items-start gap-3 min-w-0">
            <span class="text-xl flex-shrink-0">⚠️</span>

            <div class="min-w-0 flex-1">
                <p class="font-semibold">Error</p>

                <p class="text-sm break-words [overflow-wrap:anywhere]">
                    {{ session('error') }}
                </p>
            </div>
        </div>
    </div>
@endif


{{-- =========================================================
     PAGE CONTENT
========================================================== --}}

<div class="w-full max-w-full min-w-0 overflow-x-hidden space-y-6 sm:space-y-8 pt-20 sm:pt-24 lg:pt-0">


{{-- =========================================================
     PAGE HEADER
========================================================== --}}

<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 min-w-0">

    <div class="min-w-0 max-w-full">

        <h1 class="text-2xl sm:text-3xl font-bold text-slate-800 break-words [overflow-wrap:anywhere]">
            Notes Management
        </h1>

        <p class="mt-1 text-sm text-slate-500 break-words">
            Review, approve, reject and manage student notes.
        </p>

    </div>


    <div class="flex items-center gap-2 text-sm text-slate-500 flex-shrink-0">

        <span class="w-2.5 h-2.5 rounded-full bg-green-500 flex-shrink-0"></span>

        <span>Admin Panel</span>

    </div>

</div>



{{-- =========================================================
     DASHBOARD STATISTICS
========================================================== --}}

<div class="w-full max-w-full grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-3 xl:grid-cols-6 gap-3 sm:gap-5">


    {{-- Total --}}

    <div class="min-w-0 bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-3 sm:p-4">

        <div class="flex items-center justify-between gap-2 sm:gap-3 min-w-0">

            <div class="min-w-0">

                <p class="text-xs sm:text-sm font-medium text-slate-500 break-words">
                    Total Notes
                </p>

                <h2 class="mt-1 sm:mt-2 text-xl sm:text-3xl font-bold text-slate-800">
                    {{ $notes->total() }}
                </h2>

            </div>

            <div class="hidden sm:flex w-11 h-11 flex-shrink-0 rounded-xl bg-slate-100 border border-slate-200 items-center justify-center text-xl">
                📚
            </div>

        </div>

    </div>



    {{-- Approved --}}

    <div class="min-w-0 bg-white rounded-2xl shadow-sm border-2 border-green-200 p-3 sm:p-4">

        <div class="flex items-center justify-between gap-2 sm:gap-3 min-w-0">

            <div class="min-w-0">

                <p class="text-xs sm:text-sm font-medium text-slate-500 break-words">
                    Approved
                </p>

                <h2 class="mt-1 sm:mt-2 text-xl sm:text-3xl font-bold text-green-600">
                    {{ \App\Models\Note::where('status', 'approved')->count() }}
                </h2>

            </div>

            <div class="hidden sm:flex w-11 h-11 flex-shrink-0 rounded-xl bg-green-50 border border-green-200 items-center justify-center text-xl">
                ✅
            </div>

        </div>

    </div>



    {{-- Pending --}}

    <div class="min-w-0 bg-white rounded-2xl shadow-sm border-2 border-yellow-200 p-3 sm:p-4">

        <div class="flex items-center justify-between gap-2 sm:gap-3 min-w-0">

            <div class="min-w-0">

                <p class="text-xs sm:text-sm font-medium text-slate-500 break-words">
                    Pending
                </p>

                <h2 class="mt-1 sm:mt-2 text-xl sm:text-3xl font-bold text-yellow-500">
                    {{ \App\Models\Note::where('status', 'pending')->count() }}
                </h2>

            </div>

            <div class="hidden sm:flex w-11 h-11 flex-shrink-0 rounded-xl bg-yellow-50 border border-yellow-200 items-center justify-center text-xl">
                ⏳
            </div>

        </div>

    </div>



    {{-- Premium --}}

    <div class="min-w-0 bg-white rounded-2xl shadow-sm border-2 border-purple-200 p-3 sm:p-4">

        <div class="flex items-center justify-between gap-2 sm:gap-3 min-w-0">

            <div class="min-w-0">

                <p class="text-xs sm:text-sm font-medium text-slate-500 break-words">
                    Premium
                </p>

                <h2 class="mt-1 sm:mt-2 text-xl sm:text-3xl font-bold text-purple-600">
                    {{ \App\Models\Note::where('is_premium', 1)->count() }}
                </h2>

            </div>

            <div class="hidden sm:flex w-11 h-11 flex-shrink-0 rounded-xl bg-purple-50 border border-purple-200 items-center justify-center text-xl">
                ⭐
            </div>

        </div>

    </div>



    {{-- Free --}}

    <div class="min-w-0 bg-white rounded-2xl shadow-sm border-2 border-sky-200 p-3 sm:p-4">

        <div class="flex items-center justify-between gap-2 sm:gap-3 min-w-0">

            <div class="min-w-0">

                <p class="text-xs sm:text-sm font-medium text-slate-500 break-words">
                    Free
                </p>

                <h2 class="mt-1 sm:mt-2 text-xl sm:text-3xl font-bold text-sky-600">
                    {{ \App\Models\Note::where('is_premium', 0)->count() }}
                </h2>

            </div>

            <div class="hidden sm:flex w-11 h-11 flex-shrink-0 rounded-xl bg-sky-50 border border-sky-200 items-center justify-center text-xl">
                🆓
            </div>

        </div>

    </div>



    {{-- Downloads --}}

    <div class="min-w-0 bg-white rounded-2xl shadow-sm border-2 border-indigo-200 p-3 sm:p-4">

        <div class="flex items-center justify-between gap-2 sm:gap-3 min-w-0">

            <div class="min-w-0">

                <p class="text-xs sm:text-sm font-medium text-slate-500 break-words">
                    Downloads
                </p>

                <h2 class="mt-1 sm:mt-2 text-xl sm:text-3xl font-bold text-indigo-600 break-all">
                    {{ number_format(\App\Models\Note::sum('downloads')) }}
                </h2>

            </div>

            <div class="hidden sm:flex w-11 h-11 flex-shrink-0 rounded-xl bg-indigo-50 border border-indigo-200 items-center justify-center text-xl">
                📥
            </div>

        </div>

    </div>

</div>



{{-- =========================================================
     FILTERS
========================================================== --}}

<div class="w-full max-w-full min-w-0 bg-white rounded-2xl shadow-sm border-2 border-slate-300 overflow-hidden">

    <div class="px-4 sm:px-6 py-5 border-b-2 border-slate-200">

        <div class="flex items-start gap-3 min-w-0">

            <div class="w-10 h-10 flex-shrink-0 rounded-xl bg-sky-50 border border-sky-200 flex items-center justify-center text-lg">
                🔎
            </div>

            <div class="min-w-0 flex-1">

                <h2 class="font-bold text-slate-800">
                    Filter Notes
                </h2>

                <p class="text-sm text-slate-500 break-words">
                    Search and filter notes by academic information.
                </p>

            </div>

        </div>

    </div>


    <form
        method="GET"
        action="{{ route('admin.notes') }}"
        class="p-4 sm:p-6 w-full max-w-full"
    >

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 min-w-0">


            {{-- Search --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search note title..."
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

            </div>



            {{-- University --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    University
                </label>

                <select
                    name="university"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Universities</option>

                    @foreach($universities as $university)

                        <option
                            value="{{ $university->id }}"
                            @selected(request('university') == $university->id)
                        >
                            {{ $university->name }}
                        </option>

                    @endforeach

                </select>

            </div>



            {{-- Faculty --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Faculty
                </label>

                <select
                    name="faculty"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Faculties</option>

                    @foreach($faculties as $faculty)

                        <option
                            value="{{ $faculty->id }}"
                            @selected(request('faculty') == $faculty->id)
                        >
                            {{ $faculty->name }}
                        </option>

                    @endforeach

                </select>

            </div>



            {{-- Department --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Department
                </label>

                <select
                    name="department"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Departments</option>

                    @foreach($departments as $department)

                        <option
                            value="{{ $department->id }}"
                            @selected(request('department') == $department->id)
                        >
                            {{ $department->name }}
                        </option>

                    @endforeach

                </select>

            </div>



            {{-- Programme --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Programme
                </label>

                <select
                    name="programme"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Programmes</option>

                    @foreach($programmes as $programme)

                        <option
                            value="{{ $programme->id }}"
                            @selected(request('programme') == $programme->id)
                        >
                            {{ $programme->name }}
                        </option>

                    @endforeach

                </select>

            </div>



            {{-- Semester --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Semester
                </label>

                <select
                    name="semester"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Semesters</option>

                    @foreach($semesters as $semester)

                        <option
                            value="{{ $semester->id }}"
                            @selected(request('semester') == $semester->id)
                        >
                            Year {{ $semester->year }} - Semester {{ $semester->semester }}
                        </option>

                    @endforeach

                </select>

            </div>



            {{-- Unit --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Unit
                </label>

                <select
                    name="unit"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Units</option>

                    @foreach($units as $unit)

                        <option
                            value="{{ $unit->id }}"
                            @selected(request('unit') == $unit->id)
                        >
                            {{ $unit->name }}
                        </option>

                    @endforeach

                </select>

            </div>



            {{-- Premium --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Note Type
                </label>

                <select
                    name="premium"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Types</option>

                    <option value="1" @selected(request('premium') === '1')>
                        Premium
                    </option>

                    <option value="0" @selected(request('premium') === '0')>
                        Free
                    </option>

                </select>

            </div>



            {{-- Status --}}

            <div class="min-w-0">

                <label class="block text-sm font-semibold text-slate-600 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full min-w-0 max-w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm
                           focus:border-sky-500 focus:ring-2 focus:ring-sky-200
                           outline-none"
                >

                    <option value="">All Statuses</option>

                    <option value="approved" @selected(request('status') === 'approved')>
                        Approved
                    </option>

                    <option value="pending" @selected(request('status') === 'pending')>
                        Pending
                    </option>

                    <option value="rejected" @selected(request('status') === 'rejected')>
                        Rejected
                    </option>

                </select>

            </div>

        </div>



        <div class="mt-6 pt-5 border-t-2 border-slate-200 flex flex-col sm:flex-row justify-end gap-3">

            <a
                href="{{ route('admin.notes') }}"
                class="w-full sm:w-auto px-6 py-3 rounded-xl
                       bg-slate-100 border-2 border-slate-300
                       hover:bg-slate-200
                       text-slate-700 font-semibold text-center text-sm transition"
            >
                Reset Filters
            </a>


            <button
                type="submit"
                class="w-full sm:w-auto px-6 py-3 rounded-xl
                       bg-sky-600 border-2 border-sky-700
                       hover:bg-sky-700
                       text-white font-semibold text-sm transition"
            >
                🔎 Apply Filters
            </button>

        </div>

    </form>

</div>



{{-- =========================================================
     NOTES MANAGEMENT
========================================================== --}}

<div class="w-full max-w-full min-w-0 bg-white rounded-2xl shadow-sm border-2 border-slate-300 overflow-hidden">


    {{-- Header --}}

    <div class="px-4 sm:px-6 py-5 border-b-2 border-slate-300">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 min-w-0">

            <div class="min-w-0 flex-1">

                <h2 class="text-xl font-bold text-slate-800 break-words">
                    Uploaded Notes
                </h2>

                <p class="text-sm text-slate-500 mt-1 break-words">
                    Review, approve, reject or delete uploaded academic notes.
                </p>

            </div>


            <span
                class="self-start sm:self-auto inline-flex items-center
                       max-w-full
                       px-4 py-2 rounded-xl
                       bg-slate-100
                       border-2 border-slate-200
                       text-xs sm:text-sm font-semibold text-slate-600
                       flex-shrink-0"
            >
                {{ $notes->total() }} notes
            </span>

        </div>

    </div>



    {{-- =====================================================
         BULK ACTION FORM
    ====================================================== --}}

    <form
        id="bulkForm"
        method="POST"
        action="{{ route('admin.notes.bulk.approve') }}"
        class="w-full max-w-full"
    >

        @csrf


        <input
            type="hidden"
            name="selected"
            id="selectedNotes"
            value=""
        >



        {{-- Bulk Actions --}}

        <div class="px-4 sm:px-6 py-4 bg-slate-50 border-b-2 border-slate-300">

            <div class="flex flex-col gap-4 min-w-0">


                <div class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        id="checkAll"
                        class="w-5 h-5 flex-shrink-0 rounded border-2 border-slate-400
                               text-sky-600 focus:ring-sky-500"
                    >

                    <span class="text-sm font-bold text-slate-700">
                        Select All
                    </span>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-3 gap-2 sm:gap-3">

                    <button
                        type="submit"
                        formaction="{{ route('admin.notes.bulk.approve') }}"
                        class="w-full min-w-0 inline-flex items-center justify-center gap-2
                               px-4 py-2.5 rounded-xl
                               bg-green-600 border-2 border-green-700
                               hover:bg-green-700
                               text-white text-xs sm:text-sm font-semibold transition
                               break-words"
                    >
                        ✓ Approve
                    </button>


                    <button
                        type="submit"
                        formaction="{{ route('admin.notes.bulk.reject') }}"
                        class="w-full min-w-0 inline-flex items-center justify-center gap-2
                               px-4 py-2.5 rounded-xl
                               bg-yellow-500 border-2 border-yellow-600
                               hover:bg-yellow-600
                               text-white text-xs sm:text-sm font-semibold transition
                               break-words"
                    >
                        ⛔ Reject
                    </button>


                    <button
                        type="submit"
                        formaction="{{ route('admin.notes.bulk.delete') }}"
                        onclick="return confirm('Are you sure you want to delete the selected notes?')"
                        class="w-full min-w-0 inline-flex items-center justify-center gap-2
                               px-4 py-2.5 rounded-xl
                               bg-red-600 border-2 border-red-700
                               hover:bg-red-700
                               text-white text-xs sm:text-sm font-semibold transition
                               break-words"
                    >
                        🗑 Delete
                    </button>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-3">

                    <a
                        href="{{ route('admin.notes.export.excel') }}"
                        class="w-full min-w-0 inline-flex items-center justify-center gap-2
                               px-4 py-2.5 rounded-xl
                               bg-emerald-600 border-2 border-emerald-700
                               hover:bg-emerald-700
                               text-white text-xs sm:text-sm font-semibold transition
                               text-center break-words"
                    >
                        📊 Export Excel
                    </a>


                    <a
                        href="{{ route('admin.notes.export.pdf') }}"
                        class="w-full min-w-0 inline-flex items-center justify-center gap-2
                               px-4 py-2.5 rounded-xl
                               bg-indigo-600 border-2 border-indigo-700
                               hover:bg-indigo-700
                               text-white text-xs sm:text-sm font-semibold transition
                               text-center break-words"
                    >
                        📄 Export PDF
                    </a>

                </div>

            </div>

        </div>



        {{-- =====================================================
             DESKTOP TABLE
        ====================================================== --}}

        <div class="hidden xl:block w-full max-w-full overflow-x-auto">

            <table class="w-full border-collapse table-fixed text-[11px]">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="w-10 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            <span class="sr-only">Select</span>
                        </th>

                        <th class="w-16 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Preview
                        </th>

                        <th class="w-[22%] px-3 py-3 text-left border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Note
                        </th>

                        <th class="w-[15%] px-3 py-3 text-left border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Uploader
                        </th>

                        <th class="w-[10%] px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            University
                        </th>

                        <th class="w-[10%] px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Unit
                        </th>

                        <th class="w-16 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Type
                        </th>

                        <th class="w-16 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Downloads
                        </th>

                        <th class="w-20 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Status
                        </th>

                        <th class="w-20 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Uploaded
                        </th>

                        <th class="w-24 px-2 py-3 text-center border-2 border-slate-300 text-[10px] font-bold uppercase tracking-tight text-slate-600">
                            Actions
                        </th>

                    </tr>

                </thead>


                <tbody class="bg-white">

                @forelse($notes as $note)

                    <tr class="hover:bg-slate-50 transition">


                        {{-- Checkbox --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200">

                            <input
                                type="checkbox"
                                class="noteCheckbox w-3.5 h-3.5 rounded border-2 border-slate-400 text-sky-600"
                                value="{{ $note->id }}"
                            >

                        </td>



                        {{-- Preview --}}

                        <td class="px-2 py-4 border-2 border-slate-200">

                            <div class="flex justify-center">

                                @if($note->thumbnail)

                                    <img
                                        src="{{ asset('storage/'.$note->thumbnail) }}"
                                        alt="{{ $note->title }}"
                                        class="w-12 h-14 rounded-lg object-cover border border-slate-300"
                                    >

                                @else

                                    <div
                                        class="w-12 h-14 rounded-lg bg-red-50 border border-red-200
                                               flex items-center justify-center text-lg"
                                    >
                                        📄
                                    </div>

                                @endif

                            </div>

                        </td>



                        {{-- Note --}}

                        <td class="px-3 py-4 border-2 border-slate-200 align-top min-w-0">

                            <div class="min-w-0 max-w-full">

                                <h3 class="font-semibold text-gray-900 text-[11px] leading-tight break-words [overflow-wrap:anywhere]">
                                    {{ $note->title }}
                                </h3>

                                @if($note->description)

                                    <p class="text-[10px] text-gray-500 mt-1 line-clamp-2 break-words [overflow-wrap:anywhere] leading-tight">
                                        {{ $note->description }}
                                    </p>

                                @endif

                                <div class="mt-1.5">

                                    @if($note->is_premium)

                                        <span class="inline-flex max-w-full px-2 py-0.5 rounded-full bg-purple-100 border border-purple-300 text-purple-700 text-[9px] font-semibold break-words">
                                            ⭐ Premium
                                        </span>

                                    @else

                                        <span class="inline-flex max-w-full px-2 py-0.5 rounded-full bg-sky-100 border border-sky-300 text-sky-700 text-[9px] font-semibold">
                                            Free
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </td>



                        {{-- Uploader --}}

                        <td class="px-3 py-4 border-2 border-slate-200 align-top min-w-0">

                            <div class="flex items-center gap-1.5 min-w-0 max-w-full">

                                @if($note->user?->profile_photo)

                                    <img
                                        src="{{ asset('storage/'.$note->user->profile_photo) }}"
                                        alt="Profile"
                                        class="w-7 h-7 flex-shrink-0 rounded-full object-cover border border-slate-300"
                                    >

                                @else

                                    <div class="w-7 h-7 flex-shrink-0 rounded-full bg-sky-100 border border-sky-200 text-sky-700 flex items-center justify-center font-bold text-[10px]">

                                        {{ strtoupper(substr($note->user?->name ?? 'U', 0, 1)) }}

                                    </div>

                                @endif


                                <div class="min-w-0 max-w-full">

                                    <div class="font-semibold text-gray-900 text-[10px] break-words [overflow-wrap:anywhere]">
                                        {{ $note->user?->name ?? 'Unknown User' }}
                                    </div>

                                    <div class="text-[9px] text-gray-500 break-words [overflow-wrap:anywhere]">
                                        {{ $note->user?->email ?? '-' }}
                                    </div>

                                </div>

                            </div>

                        </td>



                        {{-- University --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200 align-top min-w-0">

                            <span class="block text-[10px] text-gray-700 break-words [overflow-wrap:anywhere] leading-tight">
                                {{ $note->university?->name ?? '-' }}
                            </span>

                        </td>



                        {{-- Unit --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200 align-top min-w-0">

                            <span class="block text-[10px] font-medium text-gray-700 break-words [overflow-wrap:anywhere] leading-tight">
                                {{ $note->unit?->name ?? '-' }}
                            </span>

                        </td>



                        {{-- Type --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200 align-top">

                            @if($note->is_premium)

                                <span class="inline-flex max-w-full px-1.5 py-0.5 rounded-full bg-purple-100 border border-purple-300 text-purple-700 text-[9px] font-semibold break-words">
                                    Premium
                                </span>

                            @else

                                <span class="inline-flex max-w-full px-1.5 py-0.5 rounded-full bg-sky-100 border border-sky-300 text-sky-700 text-[9px] font-semibold">
                                    Free
                                </span>

                            @endif

                        </td>



                        {{-- Downloads --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200 align-top">

                            <span class="font-bold text-gray-900 text-[10px] break-all">
                                {{ number_format($note->downloads ?? 0) }}
                            </span>

                        </td>



                        {{-- Status --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200 align-top">

                            @if($note->status === 'approved')

                                <span class="inline-flex max-w-full px-1.5 py-0.5 rounded-full bg-green-100 border border-green-300 text-green-700 text-[9px] font-semibold break-words">
                                    ● Approved
                                </span>

                            @elseif($note->status === 'pending')

                                <span class="inline-flex max-w-full px-1.5 py-0.5 rounded-full bg-yellow-100 border border-yellow-300 text-yellow-700 text-[9px] font-semibold break-words">
                                    ● Pending
                                </span>

                            @else

                                <span class="inline-flex max-w-full px-1.5 py-0.5 rounded-full bg-red-100 border border-red-300 text-red-700 text-[9px] font-semibold break-words">
                                    ● Rejected
                                </span>

                            @endif

                        </td>



                        {{-- Uploaded --}}

                        <td class="px-2 py-4 text-center border-2 border-slate-200 align-top">

                            <div class="text-[10px] font-medium text-gray-700">
                                {{ $note->created_at->format('d M Y') }}
                            </div>

                            <div class="text-[9px] text-gray-400 mt-0.5 break-words">
                                {{ $note->created_at->diffForHumans() }}
                            </div>

                        </td>



                        {{-- Actions --}}

                        <td class="px-2 py-4 border-2 border-slate-200 align-top">

                            <div class="flex flex-col gap-1 min-w-0">

                                <button
                                    type="button"
                                    onclick="previewPDF('{{ asset('storage/'.$note->file_path) }}')"
                                    class="w-full min-w-0 px-1.5 py-1.5 rounded-lg bg-sky-600 border border-sky-700 hover:bg-sky-700 text-white text-[9px] font-semibold leading-tight break-words"
                                >
                                    👁 Preview
                                </button>

                                <a
                                    href="{{ asset('storage/'.$note->file_path) }}"
                                    download
                                    class="w-full min-w-0 px-1.5 py-1.5 rounded-lg bg-indigo-600 border border-indigo-700 hover:bg-indigo-700 text-white text-[9px] font-semibold text-center leading-tight break-words"
                                >
                                    ⬇ Download
                                </a>

                                <button
                                    type="button"
                                    onclick="submitNoteAction('{{ route('admin.notes.approve', $note) }}', 'PATCH')"
                                    class="w-full min-w-0 px-1.5 py-1.5 rounded-lg bg-green-600 border border-green-700 hover:bg-green-700 text-white text-[9px] font-semibold leading-tight break-words"
                                >
                                    ✓ Approve
                                </button>

                                <button
                                    type="button"
                                    onclick="submitNoteAction('{{ route('admin.notes.reject', $note) }}', 'PATCH')"
                                    class="w-full min-w-0 px-1.5 py-1.5 rounded-lg bg-yellow-500 border border-yellow-600 hover:bg-yellow-600 text-white text-[9px] font-semibold leading-tight break-words"
                                >
                                    ⛔ Reject
                                </button>

                                <button
                                    type="button"
                                    onclick="if(confirm('Are you sure you want to delete this note?')) submitNoteAction('{{ route('admin.notes.destroy', $note) }}', 'DELETE')"
                                    class="w-full min-w-0 px-1.5 py-1.5 rounded-lg bg-red-600 border border-red-700 hover:bg-red-700 text-white text-[9px] font-semibold leading-tight break-words"
                                >
                                    🗑 Delete
                                </button>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="11" class="px-6 py-20 text-center border-2 border-slate-200">

                            <div class="flex flex-col items-center">

                                <div class="text-6xl mb-5">
                                    📚
                                </div>

                                <h3 class="text-xl font-bold text-gray-900">
                                    No Notes Uploaded
                                </h3>

                                <p class="text-gray-500 mt-2 break-words">
                                    Uploaded notes will appear here.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>



        {{-- =====================================================
             MOBILE / TABLET CARDS
        ====================================================== --}}

        <div class="xl:hidden w-full max-w-full min-w-0 p-3 sm:p-5 bg-slate-50 space-y-4 overflow-hidden">

            @forelse($notes as $note)

                <div
                    class="w-full max-w-full min-w-0 bg-white rounded-2xl border-2 border-slate-200 shadow-sm overflow-hidden"
                >

                    {{-- Card Header --}}

                    <div class="p-4 border-b-2 border-slate-100 min-w-0">

                        <div class="flex items-start gap-3 min-w-0">

                            <input
                                type="checkbox"
                                class="noteCheckbox mt-1 w-5 h-5 flex-shrink-0 rounded border-2 border-slate-400 text-sky-600"
                                value="{{ $note->id }}"
                            >


                            @if($note->thumbnail)

                                <img
                                    src="{{ asset('storage/'.$note->thumbnail) }}"
                                    alt="{{ $note->title }}"
                                    class="w-16 h-20 sm:w-20 sm:h-24 flex-shrink-0 rounded-xl object-cover border-2 border-slate-300"
                                >

                            @else

                                <div
                                    class="w-16 h-20 sm:w-20 sm:h-24 flex-shrink-0 rounded-xl
                                           bg-red-50 border-2 border-red-200
                                           flex items-center justify-center text-3xl"
                                >
                                    📄
                                </div>

                            @endif


                            <div class="min-w-0 flex-1 max-w-full">

                                <h3 class="font-bold text-gray-900 text-base sm:text-lg break-words [overflow-wrap:anywhere] leading-snug">
                                    {{ $note->title }}
                                </h3>


                                @if($note->description)

                                    <p class="text-sm text-gray-500 mt-1 line-clamp-2 break-words [overflow-wrap:anywhere]">
                                        {{ $note->description }}
                                    </p>

                                @endif


                                <div class="flex flex-wrap items-center gap-2 mt-3 min-w-0">

                                    @if($note->is_premium)

                                        <span class="inline-flex max-w-full px-2.5 py-1 rounded-full bg-purple-100 border border-purple-300 text-purple-700 text-xs font-semibold break-words">
                                            ⭐ Premium
                                        </span>

                                    @else

                                        <span class="inline-flex max-w-full px-2.5 py-1 rounded-full bg-sky-100 border border-sky-300 text-sky-700 text-xs font-semibold">
                                            Free
                                        </span>

                                    @endif


                                    @if($note->status === 'approved')

                                        <span class="inline-flex max-w-full px-2.5 py-1 rounded-full bg-green-100 border border-green-300 text-green-700 text-xs font-semibold break-words">
                                            ● Approved
                                        </span>

                                    @elseif($note->status === 'pending')

                                        <span class="inline-flex max-w-full px-2.5 py-1 rounded-full bg-yellow-100 border border-yellow-300 text-yellow-700 text-xs font-semibold break-words">
                                            ● Pending
                                        </span>

                                    @else

                                        <span class="inline-flex max-w-full px-2.5 py-1 rounded-full bg-red-100 border border-red-300 text-red-700 text-xs font-semibold break-words">
                                            ● Rejected
                                        </span>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>



                    {{-- Academic Information --}}

                    <div class="p-4 grid grid-cols-1 sm:grid-cols-2 gap-3 min-w-0">


                        {{-- Uploader --}}

                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3 min-w-0 overflow-hidden">

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                Uploader
                            </p>

                            <div class="flex items-center gap-2 mt-2 min-w-0">

                                @if($note->user?->profile_photo)

                                    <img
                                        src="{{ asset('storage/'.$note->user->profile_photo) }}"
                                        alt="Profile"
                                        class="w-9 h-9 flex-shrink-0 rounded-full object-cover border-2 border-slate-300"
                                    >

                                @else

                                    <div class="w-9 h-9 flex-shrink-0 rounded-full bg-sky-100 border-2 border-sky-200 text-sky-700 flex items-center justify-center font-bold">

                                        {{ strtoupper(substr($note->user?->name ?? 'U', 0, 1)) }}

                                    </div>

                                @endif


                                <div class="min-w-0 flex-1">

                                    <p class="font-semibold text-slate-800 break-words [overflow-wrap:anywhere]">
                                        {{ $note->user?->name ?? 'Unknown User' }}
                                    </p>

                                    <p class="text-xs text-slate-500 break-words [overflow-wrap:anywhere]">
                                        {{ $note->user?->email ?? '-' }}
                                    </p>

                                </div>

                            </div>

                        </div>



                        {{-- University --}}

                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3 min-w-0 overflow-hidden">

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                University
                            </p>

                            <p class="mt-2 text-sm font-semibold text-slate-700 break-words [overflow-wrap:anywhere]">
                                {{ $note->university?->name ?? '-' }}
                            </p>

                        </div>



                        {{-- Unit --}}

                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3 min-w-0 overflow-hidden">

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                Unit
                            </p>

                            <p class="mt-2 text-sm font-semibold text-slate-700 break-words [overflow-wrap:anywhere]">
                                {{ $note->unit?->name ?? '-' }}
                            </p>

                        </div>



                        {{-- Downloads --}}

                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3 min-w-0">

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                Downloads
                            </p>

                            <p class="mt-2 text-lg font-bold text-indigo-600 break-all">
                                📥 {{ number_format($note->downloads ?? 0) }}
                            </p>

                        </div>



                        {{-- Uploaded --}}

                        <div class="rounded-xl bg-slate-50 border border-slate-200 p-3 min-w-0">

                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                Uploaded
                            </p>

                            <p class="mt-2 text-sm font-semibold text-slate-700">
                                {{ $note->created_at->format('d M Y') }}
                            </p>

                            <p class="text-xs text-slate-400 mt-1 break-words">
                                {{ $note->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </div>



                    {{-- Actions --}}

                    <div class="p-4 bg-slate-50 border-t-2 border-slate-100">

                        <p class="text-xs font-bold uppercase tracking-wide text-slate-400 mb-3">
                            Actions
                        </p>


                        <div class="grid grid-cols-1 min-[400px]:grid-cols-2 sm:grid-cols-4 gap-2 min-w-0">


                            <button
                                type="button"
                                onclick="previewPDF('{{ asset('storage/'.$note->file_path) }}')"
                                class="w-full min-w-0 px-3 py-2.5 rounded-xl
                                       bg-sky-600 border-2 border-sky-700
                                       hover:bg-sky-700
                                       text-white text-sm font-semibold transition
                                       break-words"
                            >
                                👁 Preview
                            </button>


                            <a
                                href="{{ asset('storage/'.$note->file_path) }}"
                                download
                                class="w-full min-w-0 px-3 py-2.5 rounded-xl
                                       bg-indigo-600 border-2 border-indigo-700
                                       hover:bg-indigo-700
                                       text-white text-sm font-semibold text-center transition
                                       break-words"
                            >
                                ⬇ Download
                            </a>


                            <button
                                type="button"
                                onclick="submitNoteAction('{{ route('admin.notes.approve', $note) }}', 'PATCH')"
                                class="w-full min-w-0 px-3 py-2.5 rounded-xl
                                       bg-green-600 border-2 border-green-700
                                       hover:bg-green-700
                                       text-white text-sm font-semibold transition
                                       break-words"
                            >
                                ✓ Approve
                            </button>


                            <button
                                type="button"
                                onclick="submitNoteAction('{{ route('admin.notes.reject', $note) }}', 'PATCH')"
                                class="w-full min-w-0 px-3 py-2.5 rounded-xl
                                       bg-yellow-500 border-2 border-yellow-600
                                       hover:bg-yellow-600
                                       text-white text-sm font-semibold transition
                                       break-words"
                            >
                                ⛔ Reject
                            </button>


                            <button
                                type="button"
                                onclick="if(confirm('Are you sure you want to delete this note?')) submitNoteAction('{{ route('admin.notes.destroy', $note) }}', 'DELETE')"
                                class="min-[400px]:col-span-2 sm:col-span-4 w-full min-w-0 px-3 py-2.5 rounded-xl
                                       bg-red-600 border-2 border-red-700
                                       hover:bg-red-700
                                       text-white text-sm font-semibold transition
                                       break-words"
                            >
                                🗑 Delete Note
                            </button>

                        </div>

                    </div>

                </div>

            @empty

                <div class="bg-white rounded-2xl border-2 border-slate-200 px-6 py-20 text-center">

                    <div class="flex flex-col items-center">

                        <div class="text-6xl mb-5">
                            📚
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 break-words">
                            No Notes Uploaded
                        </h3>

                        <p class="text-gray-500 mt-2 break-words">
                            Uploaded notes will appear here.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

    </form>

</div>



{{-- =========================================================
     PAGINATION
========================================================== --}}

<div class="w-full max-w-full min-w-0 bg-white rounded-2xl shadow-sm border-2 border-slate-300 px-4 sm:px-6 py-5 overflow-hidden">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 min-w-0">

        <div class="text-sm text-gray-600 break-words">

            @if($notes->total() > 0)

                Showing

                <span class="font-bold text-gray-900">
                    {{ $notes->firstItem() }}
                </span>

                to

                <span class="font-bold text-gray-900">
                    {{ $notes->lastItem() }}
                </span>

                of

                <span class="font-bold text-gray-900">
                    {{ $notes->total() }}
                </span>

                notes

            @else

                No notes found.

            @endif

        </div>


        <div class="w-full md:w-auto max-w-full overflow-x-auto pb-1">

            {{ $notes->withQueryString()->links() }}

        </div>

    </div>

</div>



{{-- =========================================================
     PDF PREVIEW MODAL
========================================================== --}}

<div
    id="pdfModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 p-2 sm:p-4"
>

    <div
        class="w-full max-w-6xl h-[95vh] sm:h-[90vh]
               bg-white rounded-2xl shadow-2xl
               border-2 border-slate-300
               overflow-hidden flex flex-col min-w-0"
    >

        <div
            class="flex items-center justify-between gap-3
                   px-4 sm:px-6 py-4
                   border-b-2 border-slate-200
                   min-w-0"
        >

            <div class="min-w-0 flex-1">

                <h2 class="text-lg font-bold text-gray-900 break-words">
                    PDF Preview
                </h2>

                <p class="text-sm text-gray-500 hidden sm:block break-words">
                    Preview the uploaded note before taking action.
                </p>

            </div>


            <button
                type="button"
                onclick="closePDF()"
                aria-label="Close PDF preview"
                class="w-10 h-10 flex-shrink-0 rounded-xl
                       flex items-center justify-center
                       bg-red-50 border-2 border-red-200
                       text-red-600 hover:bg-red-100
                       transition text-xl font-bold"
            >
                ×
            </button>

        </div>


        <div class="flex-1 bg-gray-100 min-h-0 min-w-0 overflow-hidden">

            <iframe
                id="pdfFrame"
                src=""
                class="w-full h-full border-0"
                title="PDF Preview"
            ></iframe>

        </div>

    </div>

</div>



{{-- =========================================================
     JAVASCRIPT
========================================================== --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | SELECT ALL
    |--------------------------------------------------------------------------
    */

    const checkAll = document.getElementById('checkAll');


    const checkboxes = () => {

        return document.querySelectorAll('.noteCheckbox');

    };


    if (checkAll) {

        checkAll.addEventListener('change', function () {

            checkboxes().forEach(function (checkbox) {

                checkbox.checked = checkAll.checked;

            });

        });

    }



    /*
    |--------------------------------------------------------------------------
    | UPDATE SELECT ALL
    |--------------------------------------------------------------------------
    */

    document.addEventListener('change', function (event) {

        if (!event.target.classList.contains('noteCheckbox')) {

            return;

        }


        const all = Array.from(checkboxes());


        const checked = all.filter(function (checkbox) {

            return checkbox.checked;

        });


        if (checkAll) {

            checkAll.checked =
                all.length > 0 &&
                checked.length === all.length;


            checkAll.indeterminate =
                checked.length > 0 &&
                checked.length < all.length;

        }

    });



    /*
    |--------------------------------------------------------------------------
    | BULK FORM
    |--------------------------------------------------------------------------
    */

    const bulkForm = document.getElementById('bulkForm');


    if (bulkForm) {

        bulkForm.addEventListener('submit', function (event) {

            const selected = Array.from(
                document.querySelectorAll('.noteCheckbox:checked')
            ).map(function (checkbox) {

                return checkbox.value;

            });


            if (selected.length === 0) {

                event.preventDefault();

                alert('Please select at least one note.');

                return false;

            }


            const selectedInput =
                document.getElementById('selectedNotes');


            if (selectedInput) {

                selectedInput.value =
                    selected.join(',');

            }

        });

    }

});



/*
|--------------------------------------------------------------------------
| INDIVIDUAL NOTE ACTION
|--------------------------------------------------------------------------
*/

function submitNoteAction(url, method)
{

    const form =
        document.createElement('form');


    form.method = 'POST';

    form.action = url;

    form.style.display = 'none';



    const csrf =
        document.createElement('input');


    csrf.type = 'hidden';

    csrf.name = '_token';

    csrf.value =
        document.querySelector('meta[name="csrf-token"]')
            ?.getAttribute('content')
        || '{{ csrf_token() }}';


    form.appendChild(csrf);



    const methodInput =
        document.createElement('input');


    methodInput.type = 'hidden';

    methodInput.name = '_method';

    methodInput.value = method;


    form.appendChild(methodInput);



    document.body.appendChild(form);

    form.submit();

}



/*
|--------------------------------------------------------------------------
| PDF PREVIEW
|--------------------------------------------------------------------------
*/

function previewPDF(url)
{

    const modal =
        document.getElementById('pdfModal');


    const frame =
        document.getElementById('pdfFrame');


    if (!modal || !frame) {

        return;

    }


    frame.src = url;


    modal.classList.remove('hidden');

    modal.classList.add('flex');


    document.body.classList.add('overflow-hidden');

}



/*
|--------------------------------------------------------------------------
| CLOSE PDF
|--------------------------------------------------------------------------
*/

function closePDF()
{

    const modal =
        document.getElementById('pdfModal');


    const frame =
        document.getElementById('pdfFrame');


    if (!modal || !frame) {

        return;

    }


    frame.src = '';


    modal.classList.remove('flex');

    modal.classList.add('hidden');


    document.body.classList.remove('overflow-hidden');

}



/*
|--------------------------------------------------------------------------
| BACKDROP CLOSE
|--------------------------------------------------------------------------
*/

document.addEventListener('click', function (event) {

    const modal =
        document.getElementById('pdfModal');


    if (!modal) {

        return;

    }


    if (event.target === modal) {

        closePDF();

    }

});



/*
|--------------------------------------------------------------------------
| ESCAPE KEY
|--------------------------------------------------------------------------
*/

document.addEventListener('keydown', function (event) {

    if (event.key === 'Escape') {

        closePDF();

    }

});

</script>

@endpush


@endsection