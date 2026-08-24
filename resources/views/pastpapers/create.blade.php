<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-cyan-100 py-6 sm:py-8 lg:py-12">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden">

            {{-- ========================================================= --}}
            {{-- HEADER --}}
            {{-- ========================================================= --}}

            <div class="bg-gradient-to-r from-sky-700 via-blue-700 to-indigo-800 text-white px-5 sm:px-8 lg:px-10 py-7 sm:py-8 lg:py-10">

                <div class="flex items-start gap-4">

                    <div class="hidden sm:flex w-14 h-14 rounded-2xl bg-white/15 border border-white/20 items-center justify-center text-3xl shrink-0">
                        📄
                    </div>

                    <div>

                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold drop-shadow-md">
                            📄 Upload Past Paper
                        </h1>

                        <p class="mt-2 sm:mt-3 text-sky-100 text-sm sm:text-base lg:text-lg leading-relaxed max-w-3xl">
                            Help fellow students by sharing CATs, assignments, quizzes and examination papers.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- FORM CONTENT --}}
            {{-- ========================================================= --}}

            <div class="p-5 sm:p-7 lg:p-10">

                {{-- Errors --}}

                @if($errors->any())

                    <div class="mb-6 sm:mb-8 bg-red-50 border-2 border-red-300 rounded-2xl p-4 sm:p-5">

                        <div class="flex items-start gap-3">

                            <span class="text-xl shrink-0">
                                ⚠️
                            </span>

                            <div>

                                <h3 class="font-bold text-red-700 mb-2">
                                    Please correct the following errors:
                                </h3>

                                <ul class="list-disc list-inside text-red-600 space-y-1 text-sm sm:text-base">

                                    @foreach($errors->all() as $error)

                                        <li>
                                            {{ $error }}
                                        </li>

                                    @endforeach

                                </ul>

                            </div>

                        </div>

                    </div>

                @endif


                <form
                    action="{{ route('pastpapers.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-6 sm:space-y-7 lg:space-y-8"
                >

                    @csrf


                   {{-- ================================================= --}}
{{-- UNIT INFORMATION --}}
{{-- ================================================= --}}

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">

    {{-- UNIT CODE --}}

    <div>

        <label
            for="unit_code"
            class="block font-bold text-gray-700 mb-2"
        >
            📘 Unit Code
        </label>

        <input
            type="text"
            id="unit_code"
            name="unit_code"
            value="{{ old('unit_code') }}"
            required
            maxlength="100"
            placeholder="e.g. SST 102"
            class="w-full rounded-2xl
                   border-2 border-slate-300
                   bg-white
                   py-3.5 sm:py-4
                   px-4 sm:px-5
                   text-gray-700
                   shadow-sm
                   outline-none
                   transition
                   focus:border-sky-500
                   focus:ring-4
                   focus:ring-sky-100"
        >

    </div>


    {{-- UNIT NAME --}}

    <div>

        <label
            for="unit_name"
            class="block font-bold text-gray-700 mb-2"
        >
            📚 Unit Name
        </label>

        <input
            type="text"
            id="unit_name"
            name="unit_name"
            value="{{ old('unit_name') }}"
            required
            maxlength="255"
            placeholder="e.g. Discrete Mathematics"
            class="w-full rounded-2xl
                   border-2 border-slate-300
                   bg-white
                   py-3.5 sm:py-4
                   px-4 sm:px-5
                   text-gray-700
                   shadow-sm
                   outline-none
                   transition
                   focus:border-sky-500
                   focus:ring-4
                   focus:ring-sky-100"
        >

    </div>

</div>


                    {{-- ================================================= --}}
                    {{-- TITLE --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="title"
                            class="block font-bold text-gray-700 mb-2"
                        >
                            📝 Paper Title
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Example: Data Structures CAT 1"
                            required
                            class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 sm:py-4 px-4 sm:px-5 text-gray-700 placeholder-gray-400 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >

                    </div>


                    {{-- ================================================= --}}
                    {{-- YEAR + SEMESTER --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                        {{-- YEAR --}}

                        <div>

                            <label
                                for="year"
                                class="block font-bold text-gray-700 mb-2"
                            >
                                📅 Academic Year
                            </label>

                            <input
                                id="year"
                                type="text"
                                name="year"
                                value="{{ old('year') }}"
                                placeholder="2025"
                                required
                                class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 sm:py-4 px-4 sm:px-5 text-gray-700 placeholder-gray-400 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                            >

                        </div>


                        {{-- SEMESTER --}}

                        <div>

                            <label
                                for="semester"
                                class="block font-bold text-gray-700 mb-2"
                            >
                                📖 Semester
                            </label>

                            <select
                                id="semester"
                                name="semester"
                                class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 sm:py-4 px-4 sm:px-5 text-gray-700 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                            >

                                <option
                                    value="Semester 1"
                                    {{ old('semester', 'Semester 1') == 'Semester 1' ? 'selected' : '' }}
                                >
                                    Semester 1
                                </option>

                                <option
                                    value="Semester 2"
                                    {{ old('semester') == 'Semester 2' ? 'selected' : '' }}
                                >
                                    Semester 2
                                </option>

                                <option
                                    value="Semester 3"
                                    {{ old('semester') == 'Semester 3' ? 'selected' : '' }}
                                >
                                    Semester 3
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- TYPE --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="type"
                            class="block font-bold text-gray-700 mb-2"
                        >
                            📝 Paper Type
                        </label>

                        <select
                            id="type"
                            name="type"
                            class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 sm:py-4 px-4 sm:px-5 text-gray-700 shadow-sm outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >

                            <option
                                value="CAT"
                                {{ old('type', 'CAT') == 'CAT' ? 'selected' : '' }}
                            >
                                CAT
                            </option>

                            <option
                                value="Main Exam"
                                {{ old('type') == 'Main Exam' ? 'selected' : '' }}
                            >
                                Main Exam
                            </option>

                            <option
                                value="Supplementary"
                                {{ old('type') == 'Supplementary' ? 'selected' : '' }}
                            >
                                Supplementary
                            </option>

                            <option
                                value="Assignment"
                                {{ old('type') == 'Assignment' ? 'selected' : '' }}
                            >
                                Assignment
                            </option>

                            <option
                                value="Quiz"
                                {{ old('type') == 'Quiz' ? 'selected' : '' }}
                            >
                                Quiz
                            </option>

                        </select>

                    </div>


                    {{-- ================================================= --}}
                    {{-- DESCRIPTION --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="description"
                            class="block font-bold text-gray-700 mb-2"
                        >
                            📖 Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Anything students should know..."
                            class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 sm:py-4 px-4 sm:px-5 text-gray-700 placeholder-gray-400 shadow-sm outline-none transition resize-y focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                        >{{ old('description') }}</textarea>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PDF UPLOAD --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="pdf"
                            class="block font-bold text-gray-700 mb-2"
                        >
                            📄 Upload PDF
                        </label>

                        <div class="rounded-2xl sm:rounded-3xl border-2 border-dashed border-sky-300 bg-sky-50 p-5 sm:p-8 text-center transition hover:border-sky-500 hover:bg-sky-100">

                            <div class="text-4xl sm:text-5xl mb-3">
                                📄
                            </div>

                            <h3 class="text-lg sm:text-xl font-bold text-gray-700">
                                Choose your past paper
                            </h3>

                            <p class="text-gray-500 text-sm sm:text-base mt-2">
                                PDF files only
                            </p>

                            <input
                                id="pdf"
                                type="file"
                                name="pdf"
                                accept=".pdf,application/pdf"
                                required
                                class="mt-5 block w-full rounded-xl border-2 border-slate-300 bg-white px-3 py-3 text-sm text-gray-700 shadow-sm cursor-pointer file:mr-3 file:rounded-lg file:border-0 file:bg-sky-100 file:px-4 file:py-2 file:font-semibold file:text-sky-700 hover:file:bg-sky-200 focus:outline-none focus:border-sky-500 focus:ring-4 focus:ring-sky-100"
                            >

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- BUTTONS --}}
                    {{-- ================================================= --}}

                    <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-2 sm:pt-4">

                        <button
                            type="submit"
                            class="w-full sm:w-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-sky-600 to-blue-700 hover:from-sky-700 hover:to-blue-800 text-white font-bold px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl shadow-lg hover:shadow-xl transition duration-300"
                        >

                            <span class="text-xl">
                                📤
                            </span>

                            <span>
                                Upload Paper
                            </span>

                        </button>


                        <a
                            href="{{ route('pastpapers.index') }}"
                            class="w-full sm:w-auto inline-flex items-center justify-center bg-gray-200 hover:bg-gray-300 border-2 border-gray-300 text-gray-800 font-bold px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl shadow-sm hover:shadow transition duration-300"
                        >
                            Cancel
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>