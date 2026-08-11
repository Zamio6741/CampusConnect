@extends('layouts.admin')

@section('title', 'Notes Management')

@section('content')

@if(session('success')) <div class="mb-6 rounded-2xl bg-green-50 border border-green-200 text-green-700 px-6 py-4 shadow-sm"> <div class="flex items-center gap-3"> <span class="text-xl">✅</span> <div> <p class="font-semibold">Success</p> <p class="text-sm">{{ session('success') }}</p> </div> </div> </div>
@endif

@if(session('error')) <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 text-red-700 px-6 py-4 shadow-sm"> <div class="flex items-center gap-3"> <span class="text-xl">⚠️</span> <div> <p class="font-semibold">Error</p> <p class="text-sm">{{ session('error') }}</p> </div> </div> </div>
@endif

<div class="space-y-8">

{{-- =========================================================
     PAGE HEADER
========================================================== --}}

<div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Notes Management
        </h1>

        <p class="mt-1 text-sm text-slate-500">
            Review, approve, reject and manage student notes.
        </p>
    </div>

    <div class="flex items-center gap-2 text-sm text-slate-500">
        <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>
        Admin Panel
    </div>

</div>


{{-- =========================================================
     DASHBOARD STATISTICS
========================================================== --}}

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">

    {{-- Total Notes --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Total Notes
                </p>

                <h2 class="mt-2 text-3xl font-bold text-slate-800">
                    {{ $notes->total() }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-slate-100 flex items-center justify-center text-2xl">
                📚
            </div>

        </div>
    </div>


    {{-- Approved --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Approved
                </p>

                <h2 class="mt-2 text-3xl font-bold text-green-600">
                    {{ \App\Models\Note::where('status', 'approved')->count() }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center text-2xl">
                ✅
            </div>

        </div>
    </div>


    {{-- Pending --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Pending
                </p>

                <h2 class="mt-2 text-3xl font-bold text-yellow-500">
                    {{ \App\Models\Note::where('status', 'pending')->count() }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center text-2xl">
                ⏳
            </div>

        </div>
    </div>


    {{-- Premium --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Premium
                </p>

                <h2 class="mt-2 text-3xl font-bold text-purple-600">
                    {{ \App\Models\Note::where('is_premium', 1)->count() }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center text-2xl">
                ⭐
            </div>

        </div>
    </div>


    {{-- Free --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Free
                </p>

                <h2 class="mt-2 text-3xl font-bold text-sky-600">
                    {{ \App\Models\Note::where('is_premium', 0)->count() }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-sky-50 flex items-center justify-center text-2xl">
                🆓
            </div>

        </div>
    </div>


    {{-- Downloads --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm font-medium text-slate-500">
                    Downloads
                </p>

                <h2 class="mt-2 text-3xl font-bold text-indigo-600">
                    {{ number_format(\App\Models\Note::sum('downloads')) }}
                </h2>
            </div>

            <div class="w-12 h-12 rounded-xl bg-indigo-50 flex items-center justify-center text-2xl">
                📥
            </div>

        </div>
    </div>

</div>


{{-- =========================================================
     FILTERS
========================================================== --}}

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

    <div class="px-6 py-5 border-b border-slate-200">

        <div class="flex items-center gap-3">

            <div class="w-10 h-10 rounded-xl bg-sky-50 flex items-center justify-center text-lg">
                🔎
            </div>

            <div>
                <h2 class="font-bold text-slate-800">
                    Filter Notes
                </h2>

                <p class="text-sm text-slate-500">
                    Search and filter notes by academic information.
                </p>
            </div>

        </div>

    </div>


    <form method="GET" action="{{ route('admin.notes') }}" class="p-6">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">

            {{-- Search --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Search
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search note title..."
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

            </div>


            {{-- University --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    University
                </label>

                <select
                    name="university"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Universities
                    </option>

                    @foreach($universities as $university)

                        <option
                            value="{{ $university->id }}"
                            @selected(request('university') == $university->id)>

                            {{ $university->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Faculty --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Faculty
                </label>

                <select
                    name="faculty"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Faculties
                    </option>

                    @foreach($faculties as $faculty)

                        <option
                            value="{{ $faculty->id }}"
                            @selected(request('faculty') == $faculty->id)>

                            {{ $faculty->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Department --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Department
                </label>

                <select
                    name="department"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Departments
                    </option>

                    @foreach($departments as $department)

                        <option
                            value="{{ $department->id }}"
                            @selected(request('department') == $department->id)>

                            {{ $department->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Programme --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Programme
                </label>

                <select
                    name="programme"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Programmes
                    </option>

                    @foreach($programmes as $programme)

                        <option
                            value="{{ $programme->id }}"
                            @selected(request('programme') == $programme->id)>

                            {{ $programme->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Semester --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Semester
                </label>

                <select
                    name="semester"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Semesters
                    </option>

                    @foreach($semesters as $semester)
                             <option value="{{ $semester->id }}"
                                   @selected(request('semester') == $semester->id)>
                                  Year {{ $semester->year }} - Semester {{ $semester->semester }}
                             </option>
                    @endforeach

                </select>

            </div>


            {{-- Unit --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Unit
                </label>

                <select
                    name="unit"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Units
                    </option>

                    @foreach($units as $unit)

                        <option
                            value="{{ $unit->id }}"
                            @selected(request('unit') == $unit->id)>

                            {{ $unit->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Premium --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Note Type
                </label>

                <select
                    name="premium"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Types
                    </option>

                    <option
                        value="1"
                        @selected(request('premium') === '1')>
                        Premium
                    </option>

                    <option
                        value="0"
                        @selected(request('premium') === '0')>
                        Free
                    </option>

                </select>

            </div>


            {{-- Status --}}
            <div>

                <label class="block text-sm font-medium text-slate-600 mb-2">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-xl border-slate-300 focus:border-sky-500 focus:ring-sky-500">

                    <option value="">
                        All Statuses
                    </option>

                    <option
                        value="approved"
                        @selected(request('status') === 'approved')>
                        Approved
                    </option>

                    <option
                        value="pending"
                        @selected(request('status') === 'pending')>
                        Pending
                    </option>

                    <option
                        value="rejected"
                        @selected(request('status') === 'rejected')>
                        Rejected
                    </option>

                </select>

            </div>

        </div>


        <div class="mt-6 flex flex-col sm:flex-row justify-end gap-3">

            <a
                href="{{ route('admin.notes') }}"
                class="px-6 py-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-center transition">

                Reset Filters

            </a>

            <button
                type="submit"
                class="px-6 py-3 rounded-xl bg-sky-600 hover:bg-sky-700 text-white font-semibold transition">

                🔎 Apply Filters

            </button>

        </div>

    </form>

</div>


{{-- =========================================================
     NOTES TABLE CONTAINER
========================================================== --}}

<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

    <div class="px-6 py-5 border-b border-slate-200">

        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

            <div>

                <h2 class="text-xl font-bold text-slate-800">
                    Uploaded Notes
                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Select notes below to perform bulk actions.
                </p>

            </div>

            <div class="text-sm text-slate-500">

                Showing
                <span class="font-semibold text-slate-700">
                    {{ $notes->count() }}
                </span>
                notes on this page

            </div>

        </div>

    </div>


    {{-- IMPORTANT:
         The bulk form contains ONLY the checkboxes and bulk buttons.
         Individual approve/reject/delete forms are separate.
    --}}

    <form
        id="bulkForm"
        method="POST"
        action="{{ route('admin.notes.bulk.approve') }}">

        @csrf

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1500px]">

                <thead class="bg-slate-50 border-b border-slate-200">

                    <tr>

                        <th class="px-6 py-4 text-center w-16">

                            <input
                                type="checkbox"
                                id="checkAll"
                                class="w-4 h-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">

                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Preview
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Note
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                            Uploader
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            University
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            Unit
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            Type
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            Downloads
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            Status
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            Uploaded
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-slate-500">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                {{-- ================= NOTES TABLE ================= --}}

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

    {{-- Table Header --}}
    <div class="px-6 py-5 border-b border-gray-100 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h2 class="text-xl font-bold text-gray-900">
                Uploaded Notes
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Review, approve, reject or delete uploaded academic notes.
            </p>
        </div>

        <div class="flex items-center gap-3">

            <span class="text-sm text-gray-500">
                {{ $notes->total() }} notes
            </span>

        </div>

    </div>


    {{-- ================= BULK ACTION FORM ================= --}}

    <form
        id="bulkForm"
        method="POST"
        action="{{ route('admin.notes.bulk.approve') }}"
    >

        @csrf

        {{-- Hidden selected IDs --}}
        <input
            type="hidden"
            name="selected"
            id="selectedNotes"
            value=""
        >


        {{-- Bulk Actions --}}
        <div class="px-6 py-4 bg-slate-50 border-b border-gray-100">

            <div class="flex flex-col xl:flex-row xl:items-center xl:justify-between gap-4">

                <div class="flex flex-wrap items-center gap-3">

                    <span class="text-sm font-semibold text-gray-700">
                        Bulk Actions:
                    </span>


                    {{-- Approve --}}
                    <button
                        type="submit"
                        formaction="{{ route('admin.notes.bulk.approve') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition"
                    >
                        <span>✓</span>
                        Approve Selected
                    </button>


                    {{-- Reject --}}
                    <button
                        type="submit"
                        formaction="{{ route('admin.notes.bulk.reject') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold transition"
                    >
                        <span>⊘</span>
                        Reject Selected
                    </button>


                    {{-- Delete --}}
                    <button
                        type="submit"
                        formaction="{{ route('admin.notes.bulk.delete') }}"
                        onclick="return confirm('Are you sure you want to delete the selected notes?')"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition"
                    >
                        <span>🗑</span>
                        Delete Selected
                    </button>

                </div>


                {{-- Export --}}
                <div class="flex flex-wrap gap-3">

                    <a
                        href="{{ route('admin.notes.export.excel') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-600 hover:bg-emerald-700 text-white text-sm font-semibold transition"
                    >
                        📊 Export Excel
                    </a>

                    <a
                        href="{{ route('admin.notes.export.pdf') }}"
                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold transition"
                    >
                        📄 Export PDF
                    </a>

                </div>

            </div>

        </div>


        {{-- ================= TABLE ================= --}}

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1700px]">

                {{-- Table Head --}}
                <thead class="bg-slate-100 border-b border-gray-200">

                    <tr>

                        <th class="px-6 py-4 text-center w-16">

                            <input
                                type="checkbox"
                                id="checkAll"
                                class="w-4 h-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500"
                            >

                        </th>


                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                            Preview
                        </th>


                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                            Note
                        </th>


                        <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-gray-600">
                            Uploader
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            University
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            Unit
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            Type
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            Downloads
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            Status
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            Uploaded
                        </th>


                        <th class="px-6 py-4 text-center text-xs font-bold uppercase tracking-wider text-gray-600">
                            Actions
                        </th>

                    </tr>

                </thead>


                {{-- Table Body --}}
                <tbody class="divide-y divide-gray-100">

                    @forelse($notes as $note)

                        <tr class="hover:bg-slate-50 transition">


                            {{-- Checkbox --}}
                            <td class="px-6 py-5 text-center">

                                <input
                                    type="checkbox"
                                    class="noteCheckbox w-4 h-4 rounded border-gray-300 text-sky-600 focus:ring-sky-500"
                                    value="{{ $note->id }}"
                                >

                            </td>


                            {{-- Preview --}}
                            <td class="px-6 py-5">

                                @if($note->thumbnail)

                                    <img
                                        src="{{ asset('storage/'.$note->thumbnail) }}"
                                        alt="{{ $note->title }}"
                                        class="w-16 h-20 rounded-xl object-cover shadow-sm border border-gray-200"
                                    >

                                @else

                                    <div class="w-16 h-20 rounded-xl bg-red-50 border border-red-100 flex items-center justify-center">

                                        <span class="text-3xl">
                                            📄
                                        </span>

                                    </div>

                                @endif

                            </td>


                            {{-- Note Information --}}
                            <td class="px-6 py-5">

                                <div class="max-w-[280px]">

                                    <h3 class="font-bold text-gray-900 text-base">
                                        {{ $note->title }}
                                    </h3>

                                    @if($note->description)

                                        <p class="text-sm text-gray-500 mt-1 line-clamp-2">
                                            {{ $note->description }}
                                        </p>

                                    @endif

                                    <div class="flex items-center gap-2 mt-2">

                                        @if($note->is_premium)

                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
                                                ⭐ Premium
                                            </span>

                                        @else

                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                                                Free
                                            </span>

                                        @endif

                                    </div>

                                </div>

                            </td>


                            {{-- Uploader --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    @if($note->user?->profile_photo)

                                        <img
                                            src="{{ asset('storage/'.$note->user->profile_photo) }}"
                                            alt="Profile"
                                            class="w-10 h-10 rounded-full object-cover border border-gray-200"
                                        >

                                    @else

                                        <div class="w-10 h-10 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold">

                                            {{ strtoupper(substr($note->user?->name ?? 'U', 0, 1)) }}

                                        </div>

                                    @endif


                                    <div>

                                        <div class="font-semibold text-gray-900">
                                            {{ $note->user?->name ?? 'Unknown User' }}
                                        </div>

                                        <div class="text-xs text-gray-500">
                                            {{ $note->user?->email ?? '-' }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            {{-- University --}}
                            <td class="px-6 py-5 text-center">

                                <span class="text-sm text-gray-700">
                                    {{ $note->university?->name ?? '-' }}
                                </span>

                            </td>


                            {{-- Unit --}}
                            <td class="px-6 py-5 text-center">

                                <span class="text-sm font-medium text-gray-700">
                                    {{ $note->unit?->name ?? '-' }}
                                </span>

                            </td>


                            {{-- Type --}}
                            <td class="px-6 py-5 text-center">

                                @if($note->is_premium)

                                    <span class="inline-flex px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">
                                        Premium
                                    </span>

                                @else

                                    <span class="inline-flex px-3 py-1 rounded-full bg-sky-100 text-sky-700 text-xs font-semibold">
                                        Free
                                    </span>

                                @endif

                            </td>


                            {{-- Downloads --}}
                            <td class="px-6 py-5 text-center">

                                <div class="font-bold text-gray-900">
                                    {{ number_format($note->downloads ?? 0) }}
                                </div>

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-5 text-center">

                                @if($note->status === 'approved')

                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">
                                        <span>●</span>
                                        Approved
                                    </span>

                                @elseif($note->status === 'pending')

                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs font-semibold">
                                        <span>●</span>
                                        Pending
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">
                                        <span>●</span>
                                        Rejected
                                    </span>

                                @endif

                            </td>


                            {{-- Uploaded --}}
                            <td class="px-6 py-5 text-center">

                                <div class="text-sm font-medium text-gray-700">
                                    {{ $note->created_at->format('d M Y') }}
                                </div>

                                <div class="text-xs text-gray-400 mt-1">
                                    {{ $note->created_at->diffForHumans() }}
                                </div>

                            </td>


                            {{-- Actions --}}
                            <td class="px-6 py-5">

                                <div class="flex flex-col gap-2 min-w-[130px]">


                                    {{-- Preview --}}
                                    <button
                                        type="button"
                                        onclick="previewPDF('{{ asset('storage/'.$note->file_path) }}')"
                                        class="w-full px-3 py-2 rounded-lg bg-sky-600 hover:bg-sky-700 text-white text-sm font-semibold transition"
                                    >
                                        👁 Preview
                                    </button>


                                    {{-- Download --}}
                                    <a
                                        href="{{ asset('storage/'.$note->file_path) }}"
                                        download
                                        class="w-full px-3 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold text-center transition"
                                    >
                                        ⬇ Download
                                    </a>


                                    {{-- Approve --}}
                                    <button
                                        type="button"
                                        onclick="submitNoteAction('{{ route('admin.notes.approve', $note) }}', 'PATCH')"
                                        class="w-full px-3 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm font-semibold transition"
                                    >
                                        ✓ Approve
                                    </button>


                                    {{-- Reject --}}
                                    <button
                                        type="button"
                                        onclick="submitNoteAction('{{ route('admin.notes.reject', $note) }}', 'PATCH')"
                                        class="w-full px-3 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold transition"
                                    >
                                        ⛔ Reject
                                    </button>


                                    {{-- Delete --}}
                                    <button
                                        type="button"
                                        onclick="if(confirm('Are you sure you want to delete this note?')) submitNoteAction('{{ route('admin.notes.destroy', $note) }}', 'DELETE')"
                                        class="w-full px-3 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm font-semibold transition"
                                    >
                                        🗑 Delete
                                    </button>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="11" class="px-6 py-20 text-center">

                                <div class="flex flex-col items-center">

                                    <div class="text-6xl mb-5">
                                        📚
                                    </div>

                                    <h3 class="text-xl font-bold text-gray-900">
                                        No Notes Uploaded
                                    </h3>

                                    <p class="text-gray-500 mt-2">
                                        Uploaded notes will appear here.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </form>

</div>
{{-- =========================================================
     PAGINATION
========================================================= --}}

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 px-6 py-5">

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        {{-- Results information --}}
        <div class="text-sm text-gray-600">

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


        {{-- Pagination --}}
        <div>
            {{ $notes->withQueryString()->links() }}
        </div>

    </div>

</div>


{{-- =========================================================
     PDF PREVIEW MODAL
========================================================= --}}

<div
    id="pdfModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 p-4"
>

    <div
        class="w-full max-w-6xl h-[90vh] bg-white rounded-2xl shadow-2xl overflow-hidden flex flex-col"
    >

        {{-- Modal Header --}}
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">

            <div>

                <h2 class="text-lg font-bold text-gray-900">
                    PDF Preview
                </h2>

                <p class="text-sm text-gray-500">
                    Preview the uploaded note before taking action.
                </p>

            </div>


            <button
                type="button"
                onclick="closePDF()"
                class="w-10 h-10 rounded-xl flex items-center justify-center bg-red-50 text-red-600 hover:bg-red-100 transition text-xl font-bold"
            >
                ×
            </button>

        </div>


        {{-- PDF --}}
        <div class="flex-1 bg-gray-100">

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
========================================================= --}}

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | SELECT ALL NOTES
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
    | UPDATE SELECT-ALL STATE
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


            /*
             * Prevent submitting if nothing was selected.
             */

            if (selected.length === 0) {

                event.preventDefault();

                alert('Please select at least one note.');

                return false;

            }


            /*
             * Send IDs as comma-separated values.
             */

            const selectedInput =
                document.getElementById('selectedNotes');

            if (selectedInput) {

                selectedInput.value = selected.join(',');

            }

        });

    }

});


/*
|--------------------------------------------------------------------------
| INDIVIDUAL NOTE ACTION
|--------------------------------------------------------------------------
|
| This replaces nested forms.
|
| Approve  -> PATCH
| Reject   -> PATCH
| Delete   -> DELETE
|
*/

function submitNoteAction(url, method)
{

    /*
     * Create a temporary form.
     */

    const form = document.createElement('form');

    form.method = 'POST';

    form.action = url;

    form.style.display = 'none';


    /*
     * CSRF token
     */

    const csrf = document.createElement('input');

    csrf.type = 'hidden';

    csrf.name = '_token';

    csrf.value =
        document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        || '{{ csrf_token() }}';

    form.appendChild(csrf);


    /*
     * Laravel method spoofing.
     */

    const methodInput = document.createElement('input');

    methodInput.type = 'hidden';

    methodInput.name = '_method';

    methodInput.value = method;

    form.appendChild(methodInput);


    /*
     * Add form to page and submit.
     */

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

    const modal = document.getElementById('pdfModal');

    const frame = document.getElementById('pdfFrame');


    if (!modal || !frame) {
        return;
    }


    frame.src = url;

    modal.classList.remove('hidden');

    modal.classList.add('flex');


    /*
     * Prevent page scrolling while modal is open.
     */

    document.body.classList.add('overflow-hidden');

}


/*
|--------------------------------------------------------------------------
| CLOSE PDF
|--------------------------------------------------------------------------
*/

function closePDF()
{

    const modal = document.getElementById('pdfModal');

    const frame = document.getElementById('pdfFrame');


    if (!modal || !frame) {
        return;
    }


    frame.src = '';

    modal.classList.remove('flex');

    modal.classList.add('hidden');


    /*
     * Restore page scrolling.
     */

    document.body.classList.remove('overflow-hidden');

}


/*
|--------------------------------------------------------------------------
| CLOSE MODAL WHEN CLICKING BACKDROP
|--------------------------------------------------------------------------
*/

document.addEventListener('click', function (event) {

    const modal = document.getElementById('pdfModal');

    if (!modal) {
        return;
    }


    if (event.target === modal) {

        closePDF();

    }

});


/*
|--------------------------------------------------------------------------
| ESC KEY CLOSES PDF MODAL
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
