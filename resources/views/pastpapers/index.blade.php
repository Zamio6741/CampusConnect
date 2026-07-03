<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-green-50 via-emerald-100 to-teal-100">

    <!-- Hero -->
<div class="bg-gradient-to-r from-sky-700 via-blue-700 to-indigo-800 text-white shadow-xl">

    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

            <div>

                <h1 class="text-5xl font-extrabold drop-shadow-md">
                    📄 Past Papers Library
                </h1>

                <p class="mt-4 text-sky-100 text-lg max-w-3xl">
                    Browse CATs, Main Exams, Supplementary Exams,
                    Assignments and Quizzes uploaded by students.
                </p>

            </div>

            <a href="{{ route('pastpapers.create') }}"
               class="bg-white text-sky-700 font-bold px-8 py-4 rounded-2xl shadow-xl hover:scale-105 transition">

                + Upload Paper

            </a>

        </div>

    </div>

</div>

    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- Success --}}
        @if(session('success'))

            <div class="mb-8 bg-green-100 border border-green-300 rounded-2xl px-6 py-4 text-green-700 shadow">

                {{ session('success') }}

            </div>

        @endif


        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            <div class="bg-white rounded-3xl shadow-xl p-7">

                <div class="text-5xl">📄</div>

                <h2 class="text-4xl font-extrabold mt-4 text-green-700">

                    {{ $papers->count() }}

                </h2>

                <p class="text-gray-500 mt-2">

                    Total Papers

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-7">

                <div class="text-5xl">👨‍🎓</div>

                <h2 class="text-4xl font-extrabold mt-4 text-blue-700">

                    {{ $papers->unique('user_id')->count() }}

                </h2>

                <p class="text-gray-500 mt-2">

                    Contributors

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-7">

                <div class="text-5xl">📚</div>

                <h2 class="text-4xl font-extrabold mt-4 text-purple-700">

                    {{ $papers->pluck('unit_id')->unique()->count() }}

                </h2>

                <p class="text-gray-500 mt-2">

                    Units Covered

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-7">

                <div class="text-5xl">📝</div>

                <h2 class="text-4xl font-extrabold mt-4 text-orange-600">

                    {{ $papers->where('type','Main Exam')->count() }}

                </h2>

                <p class="text-gray-500 mt-2">

                    Main Exams

                </p>

            </div>

        </div>


        {{-- Search & Filters --}}
        <div class="bg-white rounded-3xl shadow-xl p-6 mb-10">

            <form
                action="{{ route('pastpapers.index') }}"
                method="GET">

                <div class="grid lg:grid-cols-4 gap-4">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search title or unit..."
                        class="rounded-2xl border-gray-300 py-4 px-5">

                    <input
                        type="text"
                        name="year"
                        value="{{ request('year') }}"
                        placeholder="Year"
                        class="rounded-2xl border-gray-300 py-4 px-5">

                    <select
                        name="type"
                        class="rounded-2xl border-gray-300 py-4 px-5">

                        <option value="">All Types</option>

                        <option value="CAT">CAT</option>

                        <option value="Main Exam">Main Exam</option>

                        <option value="Supplementary">Supplementary</option>

                        <option value="Assignment">Assignment</option>

                        <option value="Quiz">Quiz</option>

                    </select>

                    <button
                        class="bg-gradient-to-r from-green-600 to-emerald-600 text-white rounded-2xl font-bold">

                        Search

                    </button>

                </div>

            </form>

        </div>


        {{-- Papers Grid --}}
        <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

            @forelse($papers as $paper)
                        <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-2 hover:shadow-2xl duration-300">

                <div class="bg-gradient-to-r from-green-600 to-emerald-700 h-3"></div>

                <div class="p-7">

                    {{-- Unit --}}
                    <div class="flex justify-between items-start">

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-bold">

                            {{ $paper->unit->unit_code }}

                        </span>

                        <span class="text-2xl">

                            📄

                        </span>

                    </div>

                    {{-- Icon --}}
                    <div class="mt-6 flex justify-center">

                        <div class="w-24 h-24 rounded-full bg-red-100 flex items-center justify-center">

                            <span class="text-5xl">

                                📄

                            </span>

                        </div>

                    </div>

                    {{-- Title --}}
                    <h2 class="text-2xl font-bold text-center mt-6">

                        {{ $paper->title }}

                    </h2>

                    {{-- Unit --}}
                    <p class="text-center text-gray-500 mt-2">

                        {{ $paper->unit->unit_name }}

                    </p>

                    {{-- Description --}}
                    <p class="text-gray-600 text-center mt-5 line-clamp-3">

                        {{ $paper->description }}

                    </p>

                    {{-- Details --}}
                    <div class="border-t mt-6 pt-5 space-y-3">

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                📅 Year

                            </span>

                            <span>

                                {{ $paper->year }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                📖 Semester

                            </span>

                            <span>

                                {{ $paper->semester }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                📝 Type

                            </span>

                            <span class="font-semibold text-green-700">

                                {{ $paper->type }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span class="text-gray-500">

                                👤 Uploaded By

                            </span>

                            <span>

                                {{ $paper->user->name }}

                            </span>

                        </div>

                    </div>

                    {{-- Buttons --}}
                    <div class="grid grid-cols-2 gap-3 mt-8">

                        <a
                            href="{{ route('pastpapers.preview', $paper) }}"
                            target="_blank"
                            class="bg-green-100 hover:bg-green-200 text-green-700 py-3 rounded-xl text-center font-semibold transition">

                            👁 Preview

                        </a>

                        <a
                            href="{{ asset('storage/'.$paper->file_path) }}"
                            download
                            class="bg-gradient-to-r from-blue-600 to-sky-600 text-white py-3 rounded-xl text-center font-bold hover:scale-105 transition">

                            📥 Download

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-span-3">

                <div class="bg-white rounded-3xl shadow-xl p-20 text-center">

                    <div class="text-8xl">

                        📄

                    </div>

                    <h2 class="text-4xl font-bold mt-8">

                        No Past Papers Found

                    </h2>

                    <p class="text-gray-500 mt-4 text-lg">

                        No past papers have been uploaded yet.

                    </p>

                    <a
                        href="{{ route('pastpapers.create') }}"
                        class="inline-block mt-8 bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-2xl font-bold">

                        Upload First Paper

                    </a>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>