@extends('layouts.admin')

@section('title', 'Create Announcement')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-red-100
                        border border-red-200
                        flex items-center justify-center text-2xl
                        shadow-sm">
                📢
            </div>

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Create Announcement
                </h1>

                <p class="text-slate-500 mt-1">
                    Publish an announcement to students on CampusConnect.
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
         VALIDATION ERRORS
    ========================================================== --}}

    @if($errors->any())

        <div class="bg-red-50
                    border-2 border-red-200
                    rounded-2xl
                    p-5
                    shadow-sm">

            <div class="flex items-start gap-3">

                <div class="w-10 h-10 rounded-xl
                            bg-red-100
                            border border-red-200
                            flex items-center justify-center
                            text-xl
                            flex-shrink-0">

                    ⚠️

                </div>

                <div>

                    <h3 class="font-bold text-red-800">
                        Please fix the following errors:
                    </h3>

                    <ul class="mt-2 space-y-1 text-sm text-red-700">

                        @foreach($errors->all() as $error)

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
                            font-bold">

                    ✓

                </div>

                <p class="font-semibold text-green-800">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- =========================================================
         MAIN FORM
    ========================================================== --}}

    <form
        method="POST"
        action="{{ route('admin.announcements.store') }}"
        class="space-y-6">

        @csrf


        {{-- =====================================================
             TARGET AUDIENCE
        ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-md
                    border-2 border-slate-200
                    overflow-hidden">

            {{-- Section Header --}}

            <div class="px-6 py-5
                        border-b-2 border-slate-100
                        bg-slate-50">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-sky-100
                                border border-sky-200
                                flex items-center justify-center">

                        🎓

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Target Audience
                        </h2>

                        <p class="text-sm text-slate-500">
                            Choose which university should receive this announcement.
                        </p>

                    </div>

                </div>

            </div>


            {{-- University Field --}}

            <div class="p-6">

                <label
                    for="university_id"
                    class="block text-sm font-semibold text-slate-700 mb-2">

                    University
                    <span class="text-red-500">*</span>

                </label>


                <select
                    id="university_id"
                    name="university_id"
                    required
                    class="w-full rounded-xl
                           border border-slate-300
                           bg-white
                           px-4 py-3
                           text-slate-800
                           shadow-sm
                           outline-none
                           transition duration-200
                           focus:border-sky-500
                           focus:ring-2
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
                            {{ old('university_id') == $university->id ? 'selected' : '' }}>

                            {{ $university->name }}

                        </option>

                    @endforeach

                </select>


                @error('university_id')

                    <p class="text-sm text-red-600 mt-2">
                        {{ $message }}
                    </p>

                @else

                    <p class="text-xs text-slate-400 mt-2">
                        Students registered under this university will receive a notification.
                    </p>

                @enderror

            </div>

        </div>


        {{-- =====================================================
             ANNOUNCEMENT DETAILS
        ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-md
                    border-2 border-slate-200
                    overflow-hidden">

            {{-- Section Header --}}

            <div class="px-6 py-5
                        border-b-2 border-slate-100
                        bg-slate-50">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-red-100
                                border border-red-200
                                flex items-center justify-center">

                        📢

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Announcement Details
                        </h2>

                        <p class="text-sm text-slate-500">
                            Write the message students will see.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 space-y-6">


                {{-- =================================================
                     TITLE
                ================================================== --}}

                <div>

                    <label
                        for="title"
                        class="block text-sm font-semibold text-slate-700 mb-2">

                        Announcement Title
                        <span class="text-red-500">*</span>

                    </label>


                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        maxlength="255"
                        required
                        autocomplete="off"
                        placeholder="e.g. Semester Examination Timetable Released"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-slate-800
                               placeholder-slate-400
                               shadow-sm
                               outline-none
                               transition duration-200
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-100
                               @error('title')
                                   !border-red-400
                                   !focus:border-red-500
                                   !focus:ring-red-100
                               @enderror">


                    <div class="flex justify-between
                                items-start
                                mt-2
                                gap-4">

                        <div>

                            @error('title')

                                <p class="text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="text-xs text-slate-400">
                                    Keep the title short and clear.
                                </p>

                            @enderror

                        </div>

                        <span
                            id="titleCounter"
                            class="text-xs text-slate-400
                                   whitespace-nowrap">

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
                        class="block text-sm font-semibold text-slate-700 mb-2">

                        Announcement Message
                        <span class="text-red-500">*</span>

                    </label>


                    <textarea
                        id="content"
                        name="content"
                        rows="10"
                        required
                        placeholder="Write your announcement here..."
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-slate-800
                               placeholder-slate-400
                               shadow-sm
                               outline-none
                               transition duration-200
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-100
                               resize-y
                               @error('content')
                                   !border-red-400
                                   !focus:border-red-500
                                   !focus:ring-red-100
                               @enderror">{{ old('content') }}</textarea>


                    <div class="flex justify-between
                                items-start
                                mt-2
                                gap-4">

                        <div>

                            @error('content')

                                <p class="text-sm text-red-600">
                                    {{ $message }}
                                </p>

                            @else

                                <p class="text-xs text-slate-400">
                                    Provide all important information students need to know.
                                </p>

                            @enderror

                        </div>

                        <span
                            id="contentCounter"
                            class="text-xs text-slate-400
                                   whitespace-nowrap">

                            0 characters

                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             LIVE PREVIEW
        ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-md
                    border-2 border-slate-200
                    overflow-hidden">

            <div class="px-6 py-5
                        border-b-2 border-slate-100
                        bg-slate-50">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-purple-100
                                border border-purple-200
                                flex items-center justify-center">

                        👁

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Announcement Preview
                        </h2>

                        <p class="text-sm text-slate-500">
                            See how the announcement will look before publishing.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                <div class="rounded-2xl
                            border-2 border-slate-200
                            overflow-hidden
                            shadow-sm">

                    {{-- Preview Header --}}

                    <div class="bg-gradient-to-r
                                from-red-500 to-red-600
                                px-6 py-5">

                        <div class="flex items-start gap-4">

                            <div class="w-12 h-12 rounded-xl
                                        bg-white/20
                                        border border-white/30
                                        flex items-center justify-center
                                        text-2xl
                                        flex-shrink-0">

                                📢

                            </div>

                            <div class="min-w-0">

                                <span class="inline-flex
                                             items-center
                                             px-3 py-1
                                             rounded-full
                                             bg-white/20
                                             border border-white/30
                                             text-white
                                             text-xs
                                             font-semibold">

                                    ANNOUNCEMENT

                                </span>

                                <h3
                                    id="previewTitle"
                                    class="text-xl sm:text-2xl
                                           font-bold text-white
                                           mt-3
                                           break-words">

                                    Your announcement title will appear here

                                </h3>

                            </div>

                        </div>

                    </div>


                    {{-- Preview Body --}}

                    <div class="p-6 bg-white">

                        <div class="flex items-center gap-3 mb-4">

                            <div class="w-9 h-9 rounded-lg
                                        bg-sky-100
                                        border border-sky-200
                                        flex items-center justify-center">

                                🎓

                            </div>

                            <div>

                                <p
                                    id="previewUniversity"
                                    class="font-semibold text-slate-700">

                                    Select a university

                                </p>

                                <p class="text-xs text-slate-400">
                                    Target audience
                                </p>

                            </div>

                        </div>


                        <div
                            id="previewContent"
                            class="text-slate-600
                                   leading-7
                                   whitespace-pre-line
                                   break-words">

                            Your announcement message will appear here.

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             NOTIFICATION INFORMATION
        ====================================================== --}}

        <div class="bg-sky-50
                    border-2 border-sky-200
                    rounded-2xl
                    p-6
                    shadow-sm">

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-xl
                            bg-white
                            border border-sky-200
                            flex items-center justify-center
                            shadow-sm
                            text-xl
                            flex-shrink-0">

                    🔔

                </div>

                <div>

                    <h3 class="font-bold text-sky-900">
                        Student Notification
                    </h3>

                    <p class="text-sm text-sky-700 mt-1 leading-6">

                        When this announcement is published, students belonging
                        to the selected university will receive a notification.

                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
             ACTIONS
        ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-md
                    border-2 border-slate-200
                    p-6">

            <div class="flex flex-col lg:flex-row
                        lg:items-center
                        lg:justify-between
                        gap-5">

                <div>

                    <p class="font-semibold text-slate-700">
                        Ready to publish?
                    </p>

                    <p class="text-sm text-slate-500 mt-1">
                        Make sure the university and announcement details are correct.
                    </p>

                </div>


                <div class="flex flex-col sm:flex-row gap-3">

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


                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2
                               px-7 py-3 rounded-xl
                               bg-red-600
                               hover:bg-red-700
                               border-2 border-red-600
                               text-white
                               font-semibold
                               shadow-lg
                               hover:shadow-xl
                               transition duration-200">

                        📢

                        Publish Announcement

                    </button>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection


@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | Form Elements
    |--------------------------------------------------------------------------
    */

    const title = document.getElementById('title');
    const titleCounter = document.getElementById('titleCounter');

    const content = document.getElementById('content');
    const contentCounter = document.getElementById('contentCounter');

    const university = document.getElementById('university_id');

    const previewTitle = document.getElementById('previewTitle');
    const previewContent = document.getElementById('previewContent');
    const previewUniversity = document.getElementById('previewUniversity');


    /*
    |--------------------------------------------------------------------------
    | Update Title Counter
    |--------------------------------------------------------------------------
    */

    function updateTitleCounter() {

        if (!title || !titleCounter) {
            return;
        }

        const length = title.value.length;

        titleCounter.textContent = length + ' / 255';


        if (length >= 255) {

            titleCounter.classList.remove(
                'text-slate-400',
                'text-amber-500'
            );

            titleCounter.classList.add(
                'text-red-500',
                'font-semibold'
            );

        } else if (length >= 220) {

            titleCounter.classList.remove(
                'text-slate-400',
                'text-red-500'
            );

            titleCounter.classList.add(
                'text-amber-500',
                'font-semibold'
            );

        } else {

            titleCounter.classList.remove(
                'text-amber-500',
                'text-red-500',
                'font-semibold'
            );

            titleCounter.classList.add(
                'text-slate-400'
            );

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Update Content Counter
    |--------------------------------------------------------------------------
    */

    function updateContentCounter() {

        if (!content || !contentCounter) {
            return;
        }

        const length = content.value.length;

        contentCounter.textContent =
            length + ' characters';

    }


    /*
    |--------------------------------------------------------------------------
    | Update Title Preview
    |--------------------------------------------------------------------------
    */

    function updateTitlePreview() {

        if (!title || !previewTitle) {
            return;
        }

        const value = title.value.trim();

        if (value === '') {

            previewTitle.textContent =
                'Your announcement title will appear here';

        } else {

            previewTitle.textContent = value;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Update Content Preview
    |--------------------------------------------------------------------------
    */

    function updateContentPreview() {

        if (!content || !previewContent) {
            return;
        }

        const value = content.value.trim();

        if (value === '') {

            previewContent.textContent =
                'Your announcement message will appear here.';

        } else {

            previewContent.textContent = value;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Update University Preview
    |--------------------------------------------------------------------------
    */

    function updateUniversityPreview() {

        if (!university || !previewUniversity) {
            return;
        }

        const selectedOption =
            university.options[university.selectedIndex];

        if (
            !selectedOption ||
            !selectedOption.value
        ) {

            previewUniversity.textContent =
                'Select a university';

        } else {

            previewUniversity.textContent =
                selectedOption.textContent.trim();

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Event Listeners
    |--------------------------------------------------------------------------
    */

    if (title) {

        title.addEventListener(
            'input',
            function () {

                updateTitleCounter();
                updateTitlePreview();

            }
        );

    }


    if (content) {

        content.addEventListener(
            'input',
            function () {

                updateContentCounter();
                updateContentPreview();

            }
        );

    }


    if (university) {

        university.addEventListener(
            'change',
            updateUniversityPreview
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Initial State
    |--------------------------------------------------------------------------
    */

    updateTitleCounter();
    updateContentCounter();
    updateTitlePreview();
    updateContentPreview();
    updateUniversityPreview();

});

</script>

@endpush