<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-cyan-100 py-12">

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-sky-700 via-blue-700 to-indigo-800 text-white p-8 shadow-xl">

                <h1 class="text-4xl font-extrabold drop-shadow-md">
                    📄 Upload Past Paper
                </h1>

                <p class="mt-3 text-sky-100 text-lg">
                    Help fellow students by sharing CATs, assignments, quizzes and examination papers.
                </p>

            </div>

            <div class="p-10">

                @if($errors->any())

                    <div class="mb-8 bg-red-100 border border-red-300 rounded-2xl p-5">

                        <ul class="list-disc list-inside text-red-600">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form
                    action="{{ route('pastpapers.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-8">

                    @csrf

                    <!-- Unit -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Unit
                        </label>

                        <select
                            name="unit_id"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5 focus:ring-2 focus:ring-green-500"
                            required>

                            <option value="">Choose Unit</option>

                            @foreach($units as $unit)

                                <option value="{{ $unit->id }}">

                                    {{ $unit->unit_code }} - {{ $unit->unit_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Title -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Paper Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            placeholder="Example: Data Structures CAT 1"
                            required>

                    </div>

                    <!-- Year -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Academic Year
                        </label>

                        <input
                            type="text"
                            name="year"
                            placeholder="2025"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            required>

                    </div>

                    <!-- Semester -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Semester
                        </label>

                        <select
                            name="semester"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5">

                            <option>Semester 1</option>
                            <option>Semester 2</option>
                            <option>Semester 3</option>

                        </select>

                    </div>

                    <!-- Type -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Paper Type
                        </label>

                        <select
                            name="type"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5">

                            <option>CAT</option>
                            <option>Main Exam</option>
                            <option>Supplementary</option>
                            <option>Assignment</option>
                            <option>Quiz</option>

                        </select>

                    </div>

                    <!-- Description -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            placeholder="Anything students should know..."></textarea>

                    </div>

                    <!-- PDF -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Upload PDF
                        </label>

                        <input
                            type="file"
                            name="pdf"
                            accept=".pdf"
                            class="w-full rounded-2xl border-gray-300 py-3 px-4"
                            required>

                    </div>

                   <!-- Buttons -->
<div class="flex gap-4 pt-4">

 <button
    type="submit"
    style="background:#2563eb;color:white;font-weight:700;padding:16px 32px;border-radius:16px;display:flex;align-items:center;gap:10px;cursor:pointer;">

    <span style="font-size:20px;">📤</span>

    <span style="color:white;font-size:16px;font-weight:700;">
        Upload Paper
    </span>

</button>

    <a
        href="{{ route('pastpapers.index') }}"
        class="inline-flex items-center justify-center
               bg-gray-200 hover:bg-gray-300
               text-gray-800 font-bold
               px-8 py-4
               rounded-2xl
               shadow">

        Cancel

    </a>

</div>
                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>