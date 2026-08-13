@extends('layouts.admin')

@section('title', 'Edit Announcement')

@section('content')

<div class="space-y-8">

    {{-- ================= HEADER ================= --}}

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

        <div>

            <div class="flex items-center gap-4">

                <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl">
                    📢
                </div>

                <div>

                    <h1 class="text-3xl font-bold text-slate-800">
                        Edit Announcement
                    </h1>

                    <p class="text-slate-500 mt-1">
                        Update this announcement before publishing the changes.
                    </p>

                </div>

            </div>

        </div>

        <a
            href="{{ route('admin.announcements') }}"
            class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl border border-gray-300 bg-white text-slate-700 font-semibold hover:bg-slate-50 transition"
        >
            ← Back to Announcements
        </a>

    </div>


    {{-- ================= VALIDATION ERRORS ================= --}}

    @if ($errors->any())

        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">

            <div class="flex items-start gap-3">

                <div class="text-red-600 text-xl">
                    ⚠️
                </div>

                <div>

                    <h3 class="font-bold text-red-800">
                        Please correct the following errors:
                    </h3>

                    <ul class="mt-2 list-disc list-inside text-sm text-red-700 space-y-1">

                        @foreach ($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ================= FORM ================= --}}

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

        {{-- Form Header --}}

        <div class="px-8 py-6 border-b border-gray-100 bg-slate-50">

            <h2 class="text-xl font-bold text-slate-800">
                Announcement Details
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Modify the information below and save your changes.
            </p>

        </div>


        <form
            action="{{ route('admin.announcements.update', $announcement) }}"
            method="POST"
            class="p-8 space-y-7"
        >

            @csrf

            @method('PUT')


            {{-- ================= UNIVERSITY ================= --}}

            <div>

                <label
                    for="university_id"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    University
                </label>

                <select
                    id="university_id"
                    name="university_id"
                    required
                    class="w-full rounded-xl border-gray-300 focus:border-sky-500 focus:ring-sky-500 py-3 px-4"
                >

                    <option value="">
                        Select University
                    </option>

                    @foreach($universities as $university)

                        <option
                            value="{{ $university->id }}"
                            {{ old('university_id', $announcement->university_id) == $university->id ? 'selected' : '' }}
                        >
                            {{ $university->name }}
                        </option>

                    @endforeach

                </select>

                @error('university_id')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @enderror

                <p class="text-xs text-slate-400 mt-2">
                    Students from this university will be able to see the announcement.
                </p>

            </div>


            {{-- ================= TITLE ================= --}}

            <div>

                <label
                    for="title"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Announcement Title
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $announcement->title) }}"
                    required
                    maxlength="255"
                    placeholder="Enter announcement title..."
                    class="w-full rounded-xl border-gray-300 focus:border-sky-500 focus:ring-sky-500 py-3 px-4"
                >

                @error('title')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>


            {{-- ================= CONTENT ================= --}}

            <div>

                <label
                    for="content"
                    class="block text-sm font-semibold text-slate-700 mb-2"
                >
                    Announcement Content
                </label>

                <textarea
                    id="content"
                    name="content"
                    rows="9"
                    required
                    placeholder="Write the announcement here..."
                    class="w-full rounded-xl border-gray-300 focus:border-sky-500 focus:ring-sky-500 py-3 px-4 resize-y"
                >{{ old('content', $announcement->content) }}</textarea>

                @error('content')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @enderror

                <p class="text-xs text-slate-400 mt-2">
                    Make sure the announcement contains clear and useful information for students.
                </p>

            </div>


            {{-- ================= CURRENT INFORMATION ================= --}}

            <div class="bg-sky-50 border border-sky-100 rounded-2xl p-5">

                <div class="flex items-start gap-3">

                    <div class="w-10 h-10 rounded-xl bg-sky-100 flex items-center justify-center">
                        ℹ️
                    </div>

                    <div>

                        <h3 class="font-bold text-sky-800">
                            Announcement Information
                        </h3>

                        <div class="text-sm text-sky-700 mt-2 space-y-1">

                            <p>
                                <strong>Created:</strong>
                                {{ $announcement->created_at?->format('F d, Y \a\t h:i A') }}
                            </p>

                            <p>
                                <strong>Last Updated:</strong>
                                {{ $announcement->updated_at?->format('F d, Y \a\t h:i A') }}
                            </p>

                            @if($announcement->university)

                                <p>
                                    <strong>Current University:</strong>
                                    {{ $announcement->university->name }}
                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= ACTIONS ================= --}}

            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-4 border-t border-gray-100">

                <a
                    href="{{ route('admin.announcements') }}"
                    class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-300 bg-white text-slate-700 font-semibold hover:bg-slate-50 transition"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 px-7 py-3 rounded-xl bg-sky-600 text-white font-semibold hover:bg-sky-700 shadow-lg hover:shadow-xl transition"
                >
                    ✓ Save Changes
                </button>

            </div>

        </form>

    </div>

</div>

@endsection