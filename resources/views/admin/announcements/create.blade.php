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
                        flex items-center justify-center text-2xl">
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
                   border border-slate-300
                   bg-white
                   text-slate-700
                   font-semibold
                   shadow-sm
                   hover:bg-slate-50
                   hover:border-slate-400
                   transition">

            ← Back to Announcements

        </a>

    </div>


    {{-- =========================================================
         VALIDATION ERRORS
    ========================================================== --}}

    @if($errors->any())

        <div class="bg-red-50 border border-red-200 rounded-2xl p-5">

            <div class="flex items-start gap-3">

                <div class="text-xl">
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
                    border border-slate-100 overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-sky-100
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
                           transition
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
                    border border-slate-100 overflow-hidden">

            <div class="px-6 py-5 border-b border-slate-100">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-red-100
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
                        placeholder="e.g. Semester Examination Timetable Released"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-slate-800
                               placeholder-slate-400
                               shadow-sm
                               outline-none
                               transition
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-100
                               @error('title')
                                   !border-red-400
                                   !focus:border-red-500
                                   !focus:ring-red-100
                               @enderror">


                    <div class="flex justify-between mt-2 gap-4">

                        @error('title')

                            <p class="text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @else

                            <p class="text-xs text-slate-400">
                                Keep the title short and clear.
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
                               transition
                               focus:border-sky-500
                               focus:ring-2
                               focus:ring-sky-100
                               resize-y
                               @error('content')
                                   !border-red-400
                                   !focus:border-red-500
                                   !focus:ring-red-100
                               @enderror">{{ old('content') }}</textarea>


                    <div class="flex justify-between mt-2 gap-4">

                        @error('content')

                            <p class="text-sm text-red-600">
                                {{ $message }}
                            </p>

                        @else

                            <p class="text-xs text-slate-400">
                                Provide all important information students need to know.
                            </p>

                        @enderror

                        <span
                            id="contentCounter"
                            class="text-xs text-slate-400 whitespace-nowrap">

                            0 characters

                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             NOTIFICATION PREVIEW
        ====================================================== --}}

        <div class="bg-sky-50 border border-sky-100
                    rounded-2xl p-6">

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-xl bg-white
                            flex items-center justify-center
                            shadow-sm text-xl flex-shrink-0">

                    🔔

                </div>

                <div>

                    <h3 class="font-bold text-sky-900">
                        Student Notification
                    </h3>

                    <p class="text-sm text-sky-700 mt-1">
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
                    border border-slate-100 p-6">

            <div class="flex flex-col sm:flex-row
                        sm:items-center sm:justify-between gap-4">

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
                               border border-slate-300
                               bg-white
                               text-slate-700
                               font-semibold
                               shadow-sm
                               hover:bg-slate-50
                               hover:border-slate-400
                               transition">

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2
                               px-7 py-3 rounded-xl
                               bg-red-600 hover:bg-red-700
                               text-white
                               font-semibold
                               shadow-lg hover:shadow-xl
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

    const title = document.getElementById('title');
    const titleCounter = document.getElementById('titleCounter');

    const content = document.getElementById('content');
    const contentCounter = document.getElementById('contentCounter');


    function updateTitleCounter() {

        if (title && titleCounter) {

            titleCounter.textContent =
                title.value.length + ' / 255';

        }

    }


    function updateContentCounter() {

        if (content && contentCounter) {

            contentCounter.textContent =
                content.value.length + ' characters';

        }

    }


    if (title) {
        title.addEventListener('input', updateTitleCounter);
    }

    if (content) {
        content.addEventListener('input', updateContentCounter);
    }


    updateTitleCounter();

    updateContentCounter();

});

</script>

@endpush