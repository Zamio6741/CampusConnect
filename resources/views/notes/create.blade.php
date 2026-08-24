<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-6 sm:py-8 lg:py-10">

        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-3xl shadow-2xl p-5 sm:p-8 lg:p-10">

                {{-- ===================================================== --}}
                {{-- HEADER --}}
                {{-- ===================================================== --}}

                <div class="text-center">

                    <div class="text-5xl sm:text-6xl lg:text-7xl mb-4">
                        📚
                    </div>

                    <h1 class="text-3xl sm:text-4xl font-bold text-sky-700">
                        Upload Lecture Notes
                    </h1>

                    <p class="text-gray-500 mt-3 text-sm sm:text-base">
                        Share your notes with fellow students.
                    </p>

                </div>


                {{-- ===================================================== --}}
                {{-- ERRORS --}}
                {{-- ===================================================== --}}

                @if ($errors->any())

                    <div class="mt-8 bg-red-50 border-2 border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                        <p class="font-bold mb-2">
                            Please fix the following errors:
                        </p>

                        <ul class="list-disc list-inside space-y-1 text-sm sm:text-base">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- ===================================================== --}}
                {{-- FORM --}}
                {{-- ===================================================== --}}

                <form
                    action="{{ route('notes.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="mt-8 sm:mt-10 space-y-6 sm:space-y-7"
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
            class="block font-semibold text-gray-700 mb-2"
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
            placeholder="e.g. SMA 191"
            class="w-full rounded-xl
                   border-2 border-slate-300
                   bg-white
                   text-gray-700
                   px-4 py-3.5
                   shadow-sm
                   outline-none
                   transition
                   duration-200
                   hover:border-slate-400
                   focus:border-sky-500
                   focus:ring-4
                   focus:ring-sky-100"
        >

    </div>


    {{-- UNIT NAME --}}

    <div>

        <label
            for="unit_name"
            class="block font-semibold text-gray-700 mb-2"
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
            placeholder="e.g. Introduction to Computer Programming"
            class="w-full rounded-xl
                   border-2 border-slate-300
                   bg-white
                   text-gray-700
                   px-4 py-3.5
                   shadow-sm
                   outline-none
                   transition
                   duration-200
                   hover:border-slate-400
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
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            📝 Note Title
                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Introduction to Programming"
                            required
                            class="w-full rounded-xl
                                   border-2 border-slate-300
                                   bg-white
                                   text-gray-700
                                   placeholder-gray-400
                                   px-4 py-3.5
                                   shadow-sm
                                   outline-none
                                   transition
                                   duration-200
                                   hover:border-slate-400
                                   focus:border-sky-500
                                   focus:ring-4
                                   focus:ring-sky-100"
                        >

                    </div>


                    {{-- ================================================= --}}
                    {{-- DESCRIPTION --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="description"
                            class="block font-semibold text-gray-700 mb-2"
                        >
                            📖 Description
                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Briefly describe what these notes contain..."
                            class="w-full rounded-xl
                                   border-2 border-slate-300
                                   bg-white
                                   text-gray-700
                                   placeholder-gray-400
                                   px-4 py-3.5
                                   shadow-sm
                                   outline-none
                                   resize-y
                                   transition
                                   duration-200
                                   hover:border-slate-400
                                   focus:border-sky-500
                                   focus:ring-4
                                   focus:ring-sky-100"
                        >{{ old('description') }}</textarea>

                    </div>


                    {{-- ================================================= --}}
                    {{-- PDF UPLOAD --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="pdf"
                            class="block font-semibold text-gray-700 mb-3"
                        >
                            📄 Upload PDF
                        </label>


                        <div
                            class="rounded-3xl
                                   border-2 border-dashed border-sky-300
                                   bg-sky-50
                                   p-5 sm:p-8 lg:p-10
                                   text-center
                                   hover:border-sky-500
                                   hover:bg-sky-100
                                   transition"
                        >

                            <div class="text-5xl sm:text-6xl mb-4">
                                📚
                            </div>

                            <h3 class="text-xl sm:text-2xl font-bold text-gray-700">
                                Upload Lecture Notes
                            </h3>

                            <p class="text-gray-500 mt-2 text-sm sm:text-base">
                                PDF only • Maximum size 25 MB
                            </p>


                            <input
                                id="pdf"
                                type="file"
                                name="pdf"
                                accept=".pdf,application/pdf"
                                required
                                class="mt-6 block w-full
                                       rounded-xl
                                       border-2 border-slate-300
                                       bg-white
                                       text-sm sm:text-base
                                       text-gray-600
                                       shadow-sm
                                       cursor-pointer
                                       file:mr-3
                                       file:rounded-lg
                                       file:border-0
                                       file:bg-sky-600
                                       file:px-4
                                       file:py-2.5
                                       file:text-sm
                                       file:font-semibold
                                       file:text-white
                                       hover:file:bg-sky-700
                                       focus:outline-none
                                       focus:ring-4
                                       focus:ring-sky-100"
                            >

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- UPLOAD BUTTON --}}
                    {{-- ================================================= --}}

                    <button
                        type="submit"
                        class="w-full
                               rounded-2xl
                               bg-gradient-to-r
                               from-sky-600
                               to-blue-700
                               py-3.5 sm:py-4
                               px-6
                               text-base sm:text-lg
                               font-bold
                               text-white
                               shadow-lg
                               transition
                               duration-300
                               hover:scale-[1.01]
                               hover:from-sky-700
                               hover:to-blue-800
                               focus:outline-none
                               focus:ring-4
                               focus:ring-sky-200"
                    >

                        🚀 Upload Notes

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>