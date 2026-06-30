<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-blue-50 to-cyan-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        {{-- Header --}}
        <div class="flex flex-col lg:flex-row justify-between items-center gap-6 mb-10">

            <div>

                <h1 class="text-5xl font-extrabold text-sky-700">
                    📚 Notes Library
                </h1>

                <p class="text-gray-600 mt-3 text-lg">
                    Browse lecture notes shared by students in your university.
                </p>

            </div>

            <a href="{{ route('notes.create') }}"
               class="bg-gradient-to-r from-sky-600 to-blue-700 hover:from-sky-700 hover:to-blue-800 text-white px-8 py-4 rounded-2xl shadow-xl font-semibold transition">

                + Upload Notes

            </a>

        </div>

        {{-- Success --}}
        @if(session('success'))

        <div class="bg-green-100 border border-green-300 text-green-700 rounded-2xl p-5 shadow mb-8">

            {{ session('success') }}

        </div>

        @endif

        {{-- Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <div class="text-5xl">📄</div>

                <h2 class="text-4xl font-bold mt-4">

                    {{ $notes->total() }}

                </h2>

                <p class="text-gray-500">

                    Notes

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <div class="text-5xl">👨‍🎓</div>

                <h2 class="text-4xl font-bold mt-4">

                    {{ $notes->pluck('user_id')->unique()->count() }}

                </h2>

                <p class="text-gray-500">

                    Contributors

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <div class="text-5xl">📚</div>

                <h2 class="text-4xl font-bold mt-4">

                    {{ $units->count() }}

                </h2>

                <p class="text-gray-500">

                    Units

                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-xl p-6">

                <div class="text-5xl">⭐</div>

                <h2 class="text-4xl font-bold mt-4">

                    Premium

                </h2>

                <p class="text-gray-500">

                    Student Community

                </p>

            </div>

        </div>

        {{-- Search --}}
        <form action="{{ route('notes.index') }}" method="GET">

            <div class="bg-white rounded-3xl shadow-xl p-6 mb-10">

                <div class="grid lg:grid-cols-3 gap-5">

                    <div>

                        <label class="block font-semibold mb-2">

                            Search

                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search title, uploader..."
                            class="w-full rounded-2xl border-gray-300 shadow-sm">

                    </div>

                    <div>

                        <label class="block font-semibold mb-2">

                            Unit

                        </label>

                        <select
                            name="unit"
                            class="w-full rounded-2xl border-gray-300 shadow-sm">

                            <option value="">

                                All Units

                            </option>

                            @foreach($units as $unit)

                            <option
                                value="{{ $unit->id }}"
                                @selected(request('unit')==$unit->id)>

                                {{ $unit->unit_code }} - {{ $unit->unit_name }}

                            </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="flex items-end gap-3">

                        <button
                            class="flex-1 bg-sky-600 hover:bg-sky-700 text-white rounded-2xl py-3 font-semibold">

                            🔍 Search

                        </button>

                        <a
                            href="{{ route('notes.index') }}"
                            class="bg-gray-200 px-5 rounded-2xl flex items-center">

                            Reset

                        </a>

                    </div>

                </div>

            </div>

        </form>

        {{-- Notes Grid --}}
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse($notes as $note)

            <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition duration-300">

                <div class="bg-gradient-to-r from-sky-500 to-blue-600 h-3"></div>

                <div class="p-7">

                    <div class="flex justify-center">

                        <div class="w-24 h-24 rounded-full bg-red-100 flex items-center justify-center">

                            <span class="text-5xl">

                                📄

                            </span>

                        </div>

                    </div>

                    <div class="text-center mt-5">

                        <span class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full font-bold">

                            {{ optional($note->unit)->unit_code }}

                        </span>

                    </div>

                    <h2 class="text-2xl font-bold text-center mt-5">

                        {{ $note->title }}

                    </h2>

                    <p class="text-center text-gray-500 mt-3">

                        {{ $note->description }}

                    </p>

                    <div class="border-t mt-6 pt-5 space-y-3">

                        <div class="flex justify-between">

                            <span>👤 Uploaded by</span>

                            <span class="font-semibold">

                                {{ $note->user->name }}

                            </span>

                        </div>

                        <div class="flex justify-between">

                            <span>📅 Date</span>

                            <span>

                                {{ $note->created_at->format('d M Y') }}

                            </span>

                        </div>
                                            </div>

                    {{-- Rating --}}
                    <div class="flex justify-center mt-5">

                        <div class="text-yellow-400 text-xl">

                            ⭐⭐⭐⭐⭐

                        </div>

                    </div>

                    <p class="text-center text-sm text-gray-400">

                        Community Favourite

                    </p>

                    {{-- Buttons --}}
                    <div class="grid grid-cols-2 gap-3 mt-8">

                        <button
                            class="bg-pink-100 hover:bg-pink-200 text-pink-600 rounded-xl py-3 font-semibold transition">

                            ❤️ Save

                        </button>

                        <a
                            href="{{ asset('storage/'.$note->file_path) }}"
                            target="_blank"
                            class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl py-3 text-center font-bold hover:scale-105 transition">

                            📥 Download

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-span-3">

                <div class="bg-white rounded-3xl shadow-xl p-16 text-center">

                    <div class="text-8xl">

                        📚

                    </div>

                    <h2 class="text-4xl font-bold mt-6">

                        No Notes Found

                    </h2>

                    <p class="text-gray-500 mt-4">

                        No lecture notes match your search.

                    </p>

                    <a href="{{ route('notes.create') }}"
                       class="inline-block mt-8 bg-sky-600 hover:bg-sky-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg">

                        Upload the First Note

                    </a>

                </div>

            </div>

            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-12">

            {{ $notes->links() }}

        </div>

    </div>

</div>

</x-app-layout>
