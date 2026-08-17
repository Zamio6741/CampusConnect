@extends('layouts.admin')

@section('title', 'Edit Announcement')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl
                        bg-red-100
                        border border-red-200
                        flex items-center justify-center
                        text-2xl
                        shadow-sm">
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


        <a
            href="{{ route('admin.announcements') }}"
            class="inline-flex items-center justify-center gap-2
                   px-5 py-3 rounded-xl
                   border-2 border-slate-300
                   bg-white
                   text-slate-700
                   font-semibold
                   shadow-sm
                   hover:bg-slate-50
                   hover:border-slate-400
                   transition duration-200">

            ← Back to Announcements

        </a>

    </div>


    {{-- =========================================================
         SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <div class="bg-green-50
                    border-2 border-green-200
                    rounded-2xl
                    p-5
                    shadow-sm">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-full
                            bg-green-100
                            border border-green-200
                            flex items-center justify-center
                            text-green-700
                            font-bold
                            flex-shrink-0">

                    ✓

                </div>

                <div>

                    <p class="font-semibold text-green-800">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================== --}}

    @if ($errors->any())

        <div class="bg-red-50
                    border-2 border-red-200
                    rounded-2xl
                    p-5
                    shadow-sm">

            <div class="flex items-start gap-3">

                <div class="w-10 h-10 rounded-full
                            bg-red-100
                            border border-red-200
                            flex items-center justify-center
                            text-red-700
                            font-bold
                            flex-shrink-0">

                    !

                </div>

                <div>

                    <h3 class="font-bold text-red-800">
                        Please correct the following errors:
                    </h3>

                    <ul class="mt-2
                               text-sm
                               text-red-700
                               space-y-1">

                        @foreach ($errors->all() as $error)

                            <li>
                                • {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
         FORM CARD
    ========================================================== --}}

    <div class="bg-white
                rounded-2xl
                shadow-md
                border-2 border-slate-200
                overflow-hidden">


        {{-- =====================================================
             FORM HEADER
        ====================================================== --}}

        <div class="px-6 py-6 sm:px-8
                    border-b-2 border-slate-200
                    bg-slate-50">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl
                            bg-red-100
                            border border-red-200
                            flex items-center justify-center">

                    📢

                </div>

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Announcement Details
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Modify the information below and save your changes.
                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
             FORM
        ====================================================== --}}

        <form
            action="{{ route('admin.announcements.update', $announcement) }}"
            method="POST"
            class="p-6 sm:p-8 space-y-7">

            @csrf

            @method('PUT')


            {{-- =================================================
                 UNIVERSITY
            ================================================== --}}

            <div>

                <label
                    for="university_id"
                    class="block text-sm font-semibold
                           text-slate-700 mb-2">

                    University
                    <span class="text-red-500">*</span>

                </label>


                <select
                    id="university_id"
                    name="university_id"
                    required
                    class="w-full rounded-xl
                           border-2 border-slate-300
                           bg-white
                           px-4 py-3
                           text-slate-800
                           shadow-sm
                           outline-none
                           transition duration-200
                           focus:border-sky-500
                           focus:ring-4
                           focus:ring-sky-100
                           @error('university_id')
                               !border-red-400
                               !focus:border-red-500
                               !focus:ring-red-100
                           @enderror">

                    <option value="">
                        Select University
                    </option>

                    @foreach($universities as $university)

                        <option
                            value="{{ $university->id }}"
                            {{ old('university_id', $announcement->university_id) == $university->id ? 'selected' : '' }}>

                            {{ $university->name }}

                        </option>

                    @endforeach

                </select>


                @error('university_id')

                    <p class="text-red-600 text-sm mt-2">
                        {{ $message }}
                    </p>

                @else

                    <p class="text-xs text-slate-400 mt-2">
                        Students from this university will be able to see the announcement.
                    </p>

                @enderror

            </div>


            {{-- =================================================
                 TITLE
            ================================================== --}}

            <div>

                <label
                    for="title"
                    class="block text-sm font-semibold
                           text-slate-700 mb-2">

                    Announcement Title
                    <span class="text-red-500">*</span>

                </label>


                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $announcement->title) }}"
                    required
                    maxlength="255"
                    placeholder="Enter announcement title..."
                    class="w-full rounded-xl
                           border-2 border-slate-300
                           bg-white
                           px-4 py-3
                           text-slate-800
                           placeholder-slate-400
                           shadow-sm
                           outline-none
                           transition duration-200
                           focus:border-sky-500
                           focus:ring-4
                           focus:ring-sky-100
                           @error('title')
                               !border-red-400
                               !focus:border-red-500
                               !focus:ring-red-100
                           @enderror">


                <div class="flex flex-col sm:flex-row
                            sm:items-center
                            sm:justify-between
                            mt-2
                            gap-2">

                    @error('title')

                        <p class="text-red-600 text-sm">
                            {{ $message }}
                        </p>

                    @else

                        <p class="text-xs text-slate-400">
                            Keep the announcement title short and clear.
                        </p>

                    @enderror

                    <span
                        id="titleCounter"
                        class="text-xs text-slate-400 whitespace-nowrap">

                        0 / 255

                    </span>

                </div>

            </div>


            {{-- =================================================
                 CONTENT
            ================================================== --}}

            <div>

                <label
                    for="content"
                    class="block text-sm font-semibold
                           text-slate-700 mb-2">

                    Announcement Content
                    <span class="text-red-500">*</span>

                </label>


                <textarea
                    id="content"
                    name="content"
                    rows="10"
                    required
                    placeholder="Write the announcement here..."
                    class="w-full rounded-xl
                           border-2 border-slate-300
                           bg-white
                           px-4 py-3
                           text-slate-800
                           placeholder-slate-400
                           shadow-sm
                           outline-none
                           transition duration-200
                           focus:border-sky-500
                           focus:ring-4
                           focus:ring-sky-100
                           resize-y
                           @error('content')
                               !border-red-400
                               !focus:border-red-500
                               !focus:ring-red-100
                           @enderror">{{ old('content', $announcement->content) }}</textarea>


                <div class="flex flex-col sm:flex-row
                            sm:items-center
                            sm:justify-between
                            mt-2
                            gap-2">

                    @error('content')

                        <p class="text-red-600 text-sm">
                            {{ $message }}
                        </p>

                    @else

                        <p class="text-xs text-slate-400">
                            Make sure the announcement contains clear and useful information for students.
                        </p>

                    @enderror

                    <span
                        id="contentCounter"
                        class="text-xs text-slate-400 whitespace-nowrap">

                        0 characters

                    </span>

                </div>

            </div>


            {{-- =================================================
                 CURRENT INFORMATION
            ================================================== --}}

            <div class="bg-sky-50
                        border-2 border-sky-200
                        rounded-2xl
                        p-5">

                <div class="flex items-start gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-white
                                border border-sky-200
                                flex items-center justify-center
                                flex-shrink-0">

                        ℹ️

                    </div>

                    <div class="min-w-0">

                        <h3 class="font-bold text-sky-800">
                            Announcement Information
                        </h3>

                        <div class="text-sm text-sky-700
                                    mt-2
                                    space-y-1">

                            <p>
                                <strong>Created:</strong>

                                {{ $announcement->created_at?->format('F d, Y \a\t h:i A') ?? 'Not available' }}
                            </p>

                            <p>
                                <strong>Last Updated:</strong>

                                {{ $announcement->updated_at?->format('F d, Y \a\t h:i A') ?? 'Not available' }}
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


            {{-- =================================================
                 WARNING
            ================================================== --}}

            <div class="bg-amber-50
                        border-2 border-amber-200
                        rounded-2xl
                        p-5">

                <div class="flex items-start gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-amber-100
                                border border-amber-200
                                flex items-center justify-center
                                flex-shrink-0">

                        ⚠️

                    </div>

                    <div>

                        <h3 class="font-bold text-amber-800">
                            Before saving
                        </h3>

                        <p class="text-sm text-amber-700 mt-1 leading-6">

                            Make sure the university, title, and announcement
                            content are correct. Saving will immediately update
                            this announcement on CampusConnect.

                        </p>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 ACTIONS
            ================================================== --}}

            <div class="flex flex-col sm:flex-row
                        sm:items-center
                        sm:justify-end
                        gap-3
                        pt-5
                        border-t-2 border-slate-200">

                <a
                    href="{{ route('admin.announcements') }}"
                    class="inline-flex items-center justify-center
                           px-6 py-3 rounded-xl
                           border-2 border-slate-300
                           bg-white
                           text-slate-700
                           font-semibold
                           shadow-sm
                           hover:bg-slate-50
                           hover:border-slate-400
                           transition duration-200">

                    Cancel

                </a>


                <a
                    href="{{ route('admin.announcements.show', $announcement) }}"
                    class="inline-flex items-center justify-center gap-2
                           px-6 py-3 rounded-xl
                           border-2 border-sky-200
                           bg-sky-50
                           text-sky-700
                           font-semibold
                           shadow-sm
                           hover:bg-sky-100
                           hover:border-sky-300
                           transition duration-200">

                    👁 Preview

                </a>


                <button
                    type="submit"
                    id="saveButton"
                    class="inline-flex items-center justify-center gap-2
                           px-7 py-3 rounded-xl
                           bg-sky-600
                           border-2 border-sky-600
                           text-white
                           font-semibold
                           shadow-lg
                           hover:bg-sky-700
                           hover:border-sky-700
                           hover:shadow-xl
                           transition duration-200">

                    ✓

                    <span>
                        Save Changes
                    </span>

                </button>

            </div>

        </form>

    </div>


    {{-- =========================================================
         DELETE ANNOUNCEMENT
    ========================================================== --}}

    <div class="bg-white
                rounded-2xl
                shadow-md
                border-2 border-red-100
                p-6">

        <div class="flex flex-col lg:flex-row
                    lg:items-center
                    lg:justify-between
                    gap-5">

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-xl
                            bg-red-100
                            border border-red-200
                            flex items-center justify-center
                            text-xl
                            flex-shrink-0">

                    🗑

                </div>

                <div>

                    <h3 class="font-bold text-slate-800">
                        Delete Announcement
                    </h3>

                    <p class="text-sm text-slate-500 mt-1">
                        Permanently remove this announcement from CampusConnect.
                        This action cannot be undone.
                    </p>

                </div>

            </div>


            <form
                method="POST"
                action="{{ route('admin.announcements.destroy', $announcement) }}"
                onsubmit="return confirm('Are you sure you want to permanently delete this announcement? This action cannot be undone.');">

                @csrf

                @method('DELETE')

                <button
                    type="submit"
                    class="w-full lg:w-auto
                           inline-flex items-center justify-center gap-2
                           px-6 py-3 rounded-xl
                           bg-red-600
                           hover:bg-red-700
                           border-2 border-red-600
                           text-white
                           font-semibold
                           shadow-sm
                           hover:shadow-md
                           transition duration-200">

                    🗑 Delete Announcement

                </button>

            </form>

        </div>

    </div>

</div>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const title = document.getElementById('title');

    const titleCounter = document.getElementById('titleCounter');

    const content = document.getElementById('content');

    const contentCounter = document.getElementById('contentCounter');

    const form = document.querySelector('form[action*="announcements"][method="POST"]');

    const saveButton = document.getElementById('saveButton');


    /*
    |--------------------------------------------------------------------------
    | Title Counter
    |--------------------------------------------------------------------------
    */

    function updateTitleCounter() {

        if (!title || !titleCounter) {
            return;
        }

        titleCounter.textContent =
            title.value.length + ' / 255';

    }


    /*
    |--------------------------------------------------------------------------
    | Content Counter
    |--------------------------------------------------------------------------
    */

    function updateContentCounter() {

        if (!content || !contentCounter) {
            return;
        }

        contentCounter.textContent =
            content.value.length + ' characters';

    }


    /*
    |--------------------------------------------------------------------------
    | Event Listeners
    |--------------------------------------------------------------------------
    */

    if (title) {

        title.addEventListener(
            'input',
            updateTitleCounter
        );

    }


    if (content) {

        content.addEventListener(
            'input',
            updateContentCounter
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Initial Counter Values
    |--------------------------------------------------------------------------
    */

    updateTitleCounter();

    updateContentCounter();


    /*
    |--------------------------------------------------------------------------
    | Prevent Accidental Double Submission
    |--------------------------------------------------------------------------
    */

    if (form && saveButton) {

        form.addEventListener('submit', function () {

            saveButton.disabled = true;

            saveButton.classList.add(
                'opacity-75',
                'cursor-not-allowed'
            );

            saveButton.innerHTML = `
                <svg
                    class="animate-spin h-5 w-5"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24">

                    <circle
                        class="opacity-25"
                        cx="12"
                        cy="12"
                        r="10"
                        stroke="currentColor"
                        stroke-width="4">
                    </circle>

                    <path
                        class="opacity-75"
                        fill="currentColor"
                        d="M4 12a8 8 0 018-8V0
                           C5.373 0 0 5.373 0 12h4zm2
                           5.291A7.962 7.962 0 014 12H0c0
                           3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>

                </svg>

                <span>
                    Saving...
                </span>
            `;

        });

    }

});

</script>

@endpush