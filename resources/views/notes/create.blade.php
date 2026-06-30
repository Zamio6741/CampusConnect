<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl p-10">

            <div class="text-center">

                <div class="text-7xl mb-4">
                    📚
                </div>

                <h1 class="text-4xl font-bold text-sky-700">
                    Upload Lecture Notes
                </h1>

                <p class="text-gray-500 mt-3">
                    Share your notes with fellow students.
                </p>

            </div>

            @if ($errors->any())
                <div class="mt-8 bg-red-100 border border-red-300 text-red-700 rounded-2xl p-5">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form
                action="{{ route('notes.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="mt-10 space-y-7">

                @csrf

                {{-- Unit --}}
                <div>

                    <label class="block font-semibold mb-2">
                        📘 Select Unit
                    </label>

                    <select
                        name="unit_id"
                        required
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500">

                        <option value="">
                            -- Select Unit --
                        </option>

                        @foreach($units as $unit)

                            <option
                                value="{{ $unit->id }}"
                                {{ old('unit_id') == $unit->id ? 'selected' : '' }}>

                                {{ $unit->unit_code }}
                                —
                                {{ $unit->unit_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                {{-- Title --}}
                <div>

                    <label class="block font-semibold mb-2">
                        📝 Note Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Introduction to Programming"
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500">

                </div>

                {{-- Description --}}
                <div>

                    <label class="block font-semibold mb-2">
                        📖 Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        placeholder="Briefly describe what these notes contain..."
                        class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-sky-500 focus:border-sky-500">{{ old('description') }}</textarea>

                </div>

                {{-- PDF Upload --}}
                <div>

                    <label class="block font-semibold mb-3">

                        📄 Upload PDF

                    </label>

                    <div class="rounded-3xl border-2 border-dashed border-sky-300 bg-sky-50 p-10 text-center hover:border-sky-500 hover:bg-sky-100 transition">

                        <div class="text-6xl mb-4">
                            📚
                        </div>

                        <h3 class="text-2xl font-bold text-gray-700">

                            Upload Lecture Notes

                        </h3>

                        <p class="text-gray-500 mt-2">

                            PDF only • Maximum size 25 MB

                        </p>

                        <input
                            type="file"
                            name="pdf"
                            accept=".pdf"
                            required
                            class="mt-6 block w-full rounded-xl border border-gray-300 bg-white p-3">

                    </div>

                </div>

                {{-- Upload Button --}}
                <button
                    type="submit"
                    class="w-full rounded-2xl bg-gradient-to-r from-sky-600 to-blue-700 py-4 text-lg font-bold text-white shadow-lg transition duration-300 hover:scale-[1.02] hover:from-sky-700 hover:to-blue-800">

                    🚀 Upload Notes

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>