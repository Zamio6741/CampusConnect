<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-100 to-teal-100">

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <div class="bg-gradient-to-r from-sky-700 via-blue-700 to-indigo-800 text-white shadow-xl">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-12">

            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 lg:gap-8">

                <div class="w-full">

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold drop-shadow-md">
                        📄 Past Papers Library
                    </h1>

                    <p class="mt-3 sm:mt-4 text-sky-100 text-base sm:text-lg max-w-3xl leading-relaxed">
                        Browse CATs, Main Exams, Supplementary Exams,
                        Assignments and Quizzes uploaded by students.
                    </p>

                </div>

                <a
                    href="{{ route('pastpapers.create') }}"
                    class="w-full sm:w-auto text-center bg-white text-sky-700 font-bold px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl shadow-xl hover:scale-105 transition duration-300"
                >
                    + Upload Paper
                </a>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">


        {{-- ===================================================== --}}
        {{-- SUCCESS MESSAGE --}}
        {{-- ===================================================== --}}

        @if(session('success'))

            <div class="mb-6 sm:mb-8 bg-green-100 border-2 border-green-300 rounded-2xl px-4 sm:px-6 py-4 text-green-700 shadow">

                {{ session('success') }}

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- STATISTICS --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8 sm:mb-10">

            {{-- TOTAL PAPERS --}}

            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

                <div class="text-4xl sm:text-5xl">
                    📄
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-green-700">
                    {{ $papers->count() }}
                </h2>

                <p class="text-gray-500 mt-2">
                    Total Papers
                </p>

            </div>


            {{-- CONTRIBUTORS --}}

            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

                <div class="text-4xl sm:text-5xl">
                    👨‍🎓
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-blue-700">
                    {{ $papers->unique('user_id')->count() }}
                </h2>

                <p class="text-gray-500 mt-2">
                    Contributors
                </p>

            </div>


            {{-- UNITS --}}

            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

                <div class="text-4xl sm:text-5xl">
                    📚
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-purple-700">
                    {{ $papers->pluck('unit_id')->unique()->count() }}
                </h2>

                <p class="text-gray-500 mt-2">
                    Units Covered
                </p>

            </div>


            {{-- MAIN EXAMS --}}

            <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

                <div class="text-4xl sm:text-5xl">
                    📝
                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-orange-600">
                    {{ $papers->where('type','Main Exam')->count() }}
                </h2>

                <p class="text-gray-500 mt-2">
                    Main Exams
                </p>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- SEARCH & FILTERS --}}
        {{-- ===================================================== --}}

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-4 sm:p-6 mb-8 sm:mb-10">

            <form
                action="{{ route('pastpapers.index') }}"
                method="GET"
            >

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    {{-- SEARCH --}}

                    <div class="w-full">

                        <label
                            for="search"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Search
                        </label>

                        <input
                            type="text"
                            id="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search title or unit..."
                            class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 px-4 sm:px-5 text-gray-700 placeholder-gray-400 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
                        >

                    </div>


                    {{-- YEAR --}}

                    <div class="w-full">

                        <label
                            for="year"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Year
                        </label>

                        <input
                            type="text"
                            id="year"
                            name="year"
                            value="{{ request('year') }}"
                            placeholder="e.g. 2025"
                            class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 px-4 sm:px-5 text-gray-700 placeholder-gray-400 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
                        >

                    </div>


                    {{-- TYPE --}}

                    <div class="w-full">

                        <label
                            for="type"
                            class="block text-sm font-semibold text-gray-700 mb-2"
                        >
                            Paper Type
                        </label>

                        <select
                            id="type"
                            name="type"
                            class="w-full rounded-2xl border-2 border-slate-300 bg-white py-3.5 px-4 sm:px-5 text-gray-700 shadow-sm outline-none transition focus:border-green-500 focus:ring-4 focus:ring-green-100"
                        >

                            <option value="">
                                All Types
                            </option>

                            <option
                                value="CAT"
                                {{ request('type') == 'CAT' ? 'selected' : '' }}
                            >
                                CAT
                            </option>

                            <option
                                value="Main Exam"
                                {{ request('type') == 'Main Exam' ? 'selected' : '' }}
                            >
                                Main Exam
                            </option>

                            <option
                                value="Supplementary"
                                {{ request('type') == 'Supplementary' ? 'selected' : '' }}
                            >
                                Supplementary
                            </option>

                            <option
                                value="Assignment"
                                {{ request('type') == 'Assignment' ? 'selected' : '' }}
                            >
                                Assignment
                            </option>

                            <option
                                value="Quiz"
                                {{ request('type') == 'Quiz' ? 'selected' : '' }}
                            >
                                Quiz
                            </option>

                        </select>

                    </div>


                    {{-- SEARCH BUTTON --}}

                    <div class="w-full flex items-end">

                        <button
                            type="submit"
                            class="w-full min-h-[52px] bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white rounded-2xl font-bold shadow-md hover:shadow-lg transition duration-300"
                        >
                            🔍 Search
                        </button>

                    </div>

                </div>

            </form>

        </div>


        {{-- ===================================================== --}}
        {{-- PAPERS GRID --}}
        {{-- ===================================================== --}}

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">

            @forelse($papers as $paper)

                {{-- ================================================= --}}
                {{-- PAPER CARD --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden hover:-translate-y-1 hover:shadow-2xl duration-300">

                    <div class="bg-gradient-to-r from-green-600 to-emerald-700 h-3"></div>

                    <div class="p-5 sm:p-7">


                        {{-- UNIT + ICON --}}

                        <div class="flex justify-between items-start gap-4">

                            <span class="bg-green-100 border border-green-200 text-green-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-bold break-all">
                                {{ $paper->unit->unit_code }}
                            </span>

                            <span class="text-2xl shrink-0">
                                📄
                            </span>

                        </div>


                        {{-- ICON --}}

                        <div class="mt-6 flex justify-center">

                            <div class="w-20 h-20 sm:w-24 sm:h-24 rounded-full bg-red-100 border-4 border-red-50 flex items-center justify-center">

                                <span class="text-4xl sm:text-5xl">
                                    📄
                                </span>

                            </div>

                        </div>


                        {{-- TITLE --}}

                        <h2 class="text-xl sm:text-2xl font-bold text-center mt-6 break-words">
                            {{ $paper->title }}
                        </h2>


                        {{-- UNIT NAME --}}

                        <p class="text-center text-gray-500 mt-2 break-words">
                            {{ $paper->unit->unit_name }}
                        </p>


                        {{-- DESCRIPTION --}}

                        <p class="text-gray-600 text-center mt-5 line-clamp-3 leading-relaxed">
                            {{ $paper->description }}
                        </p>


                        {{-- DETAILS --}}

                        <div class="border-t-2 border-slate-200 mt-6 pt-5 space-y-3">

                            {{-- YEAR --}}

                            <div class="flex flex-col xs:flex-row sm:flex-row justify-between gap-1 sm:gap-3">

                                <span class="text-gray-500">
                                    📅 Year
                                </span>

                                <span class="font-medium text-gray-800 sm:text-right">
                                    {{ $paper->year }}
                                </span>

                            </div>


                            {{-- SEMESTER --}}

                            <div class="flex flex-col sm:flex-row justify-between gap-1 sm:gap-3">

                                <span class="text-gray-500">
                                    📖 Semester
                                </span>

                                <span class="font-medium text-gray-800 sm:text-right">
                                    {{ $paper->semester }}
                                </span>

                            </div>


                            {{-- TYPE --}}

                            <div class="flex flex-col sm:flex-row justify-between gap-1 sm:gap-3">

                                <span class="text-gray-500">
                                    📝 Type
                                </span>

                                <span class="font-semibold text-green-700 sm:text-right">
                                    {{ $paper->type }}
                                </span>

                            </div>


                            {{-- UPLOADER --}}

                            <div class="flex flex-col sm:flex-row justify-between gap-1 sm:gap-3">

                                <span class="text-gray-500">
                                    👤 Uploaded By
                                </span>

                                <span class="font-medium text-gray-800 sm:text-right break-words">
                                    {{ $paper->user->name }}
                                </span>

                            </div>

                        </div>


                        {{-- BUTTONS --}}

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-8">

                            <a
                                href="{{ route('pastpapers.preview', $paper) }}"
                                target="_blank"
                                class="w-full bg-green-100 border border-green-200 hover:bg-green-200 text-green-700 py-3 rounded-xl text-center font-semibold transition duration-300"
                            >
                                👁 Preview
                            </a>

                            <a
                                href="{{ asset('storage/'.$paper->file_path) }}"
                                download
                                class="w-full bg-gradient-to-r from-blue-600 to-sky-600 text-white py-3 rounded-xl text-center font-bold hover:scale-[1.02] transition duration-300"
                            >
                                📥 Download
                            </a>

                        </div>

                    </div>

                </div>


            @empty


                {{-- ================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ================================================= --}}

                <div class="col-span-1 md:col-span-2 lg:col-span-3">

                    <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 sm:p-12 lg:p-20 text-center">

                        <div class="text-6xl sm:text-7xl lg:text-8xl">
                            📄
                        </div>

                        <h2 class="text-3xl sm:text-4xl font-bold mt-6 sm:mt-8">
                            No Past Papers Found
                        </h2>

                        <p class="text-gray-500 mt-3 sm:mt-4 text-base sm:text-lg">
                            No past papers have been uploaded yet.
                        </p>

                        <a
                            href="{{ route('pastpapers.create') }}"
                            class="inline-block mt-6 sm:mt-8 bg-green-600 hover:bg-green-700 text-white px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl font-bold transition"
                        >
                            Upload First Paper
                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>