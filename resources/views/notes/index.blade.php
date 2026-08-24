<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-cyan-100">


{{-- HERO --}}
<div class="bg-gradient-to-r from-sky-700 via-blue-700 to-cyan-600 text-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10 lg:py-12">

        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6 lg:gap-8">

            <div class="w-full">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold">
                    📚 Notes Library
                </h1>

                <p class="mt-3 sm:mt-4 text-sky-100 text-base sm:text-lg max-w-2xl leading-relaxed">

                    Discover lecture notes uploaded by students from your programme.
                    Search instantly, preview PDFs and download quality revision materials.

                </p>

            </div>

            <a href="{{ route('notes.create') }}"
               class="w-full sm:w-auto text-center bg-white text-sky-700 font-bold px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl shadow-xl hover:scale-105 transition">

                + Upload Notes

            </a>

        </div>

    </div>

</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6 sm:py-8 lg:py-10">

    {{-- Success Message --}}
    @if(session('success'))

        <div class="mb-6 sm:mb-8 rounded-2xl bg-green-100 border-2 border-green-300 px-4 sm:px-6 py-4 text-green-700 shadow">

            {{ session('success') }}

        </div>

    @endif


    {{-- Statistics --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8 sm:mb-10">

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

            <div class="text-4xl sm:text-5xl">📄</div>

            <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-sky-700">

                {{ $notes->count() }}

            </h2>

            <p class="text-gray-500 mt-2">

                Total Notes

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

            <div class="text-4xl sm:text-5xl">👨‍🎓</div>

            <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-blue-700">

                {{ $notes->unique('user_id')->count() }}

            </h2>

            <p class="text-gray-500 mt-2">

                Contributors

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

            <div class="text-4xl sm:text-5xl">📚</div>

            <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-purple-700">

                {{ $notes->pluck('unit_code')->filter()->unique()->count() }}

            </h2>

            <p class="text-gray-500 mt-2">

                Units Covered

            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7">

            <div class="text-4xl sm:text-5xl">⭐</div>

            <h2 class="text-3xl sm:text-4xl font-extrabold mt-4 text-amber-500">

                4.9

            </h2>

            <p class="text-gray-500 mt-2">

                Community Rating

            </p>

        </div>

    </div>


    {{-- Search --}}
    @include('notes.partials.search-bar')


    {{-- Notes Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">

        @forelse($notes as $note)

            @include('notes.partials.note-card')

        @empty

            <div class="col-span-1 md:col-span-2 lg:col-span-3">

                <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8 sm:p-12 lg:p-20 text-center">

                    <div class="text-6xl sm:text-7xl lg:text-8xl">

                        📚

                    </div>

                    <h2 class="text-3xl sm:text-4xl font-bold mt-6 sm:mt-8">

                        No Notes Found

                    </h2>

                    <p class="text-gray-500 mt-3 sm:mt-4 text-base sm:text-lg">

                        There are no notes matching your search yet.

                    </p>

                    <a href="{{ route('notes.create') }}"
                       class="inline-block mt-6 sm:mt-8 bg-sky-600 hover:bg-sky-700 text-white px-6 sm:px-8 py-3.5 sm:py-4 rounded-2xl font-bold">

                        Upload the First Note

                    </a>

                </div>

            </div>

        @endforelse

    </div>

</div>


</div>

{{-- PDF Modal --}}
@include('notes.partials.pdf-modal')

</x-app-layout>
