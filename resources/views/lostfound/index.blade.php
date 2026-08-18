<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <section class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

                <div class="text-center lg:text-left">

                    <div class="inline-flex items-center gap-2 bg-white/15 border border-white/20
                                px-4 py-2 rounded-full text-sm font-bold mb-5">

                        🔎 CampusConnect Lost & Found

                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight">

                        🔍 Lost & Found

                    </h1>

                    <p class="mt-4 text-orange-100 text-lg sm:text-xl max-w-2xl">

                        Helping students recover lost belongings and return found items
                        to their rightful owners.

                    </p>

                </div>

                <a
                    href="{{ route('lostfound.create') }}"
                    class="inline-flex items-center justify-center gap-2
                           bg-white text-orange-600 px-8 py-4 rounded-2xl
                           font-bold shadow-xl hover:shadow-2xl hover:scale-105
                           transition-all duration-300 whitespace-nowrap">

                    ➕ Report Item

                </a>

            </div>

        </div>

    </section>

    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        {{-- SUCCESS MESSAGE --}}

        @if(session('success'))

            <div class="mb-8 bg-green-50 border-2 border-green-300
                        text-green-700 rounded-2xl p-5 shadow-sm">

                <div class="flex items-start gap-3">

                    <span class="text-xl">
                        ✅
                    </span>

                    <div>

                        <p class="font-bold">
                            Success
                        </p>

                        <p class="mt-1">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif

        {{-- ERROR MESSAGE --}}

        @if($errors->any())

            <div class="mb-8 bg-red-50 border-2 border-red-300
                        text-red-700 rounded-2xl p-5 shadow-sm">

                <p class="font-bold mb-2">
                    Please correct the following errors:
                </p>

                <ul class="list-disc ml-6 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- ========================================================= --}}
        {{-- INTRO / QUICK ACTIONS --}}
        {{-- ========================================================= --}}

        <div class="grid md:grid-cols-3 gap-6 mb-10">

            <div class="bg-white rounded-3xl shadow-lg border border-orange-100 p-6">

                <div class="w-14 h-14 bg-red-100 rounded-2xl flex items-center justify-center text-3xl">
                    🔴
                </div>

                <h3 class="text-xl font-bold mt-5 text-gray-800">
                    Lost Something?
                </h3>

                <p class="text-gray-500 mt-2 leading-6">
                    Report your lost item so other students can help you find it.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-orange-100 p-6">

                <div class="w-14 h-14 bg-green-100 rounded-2xl flex items-center justify-center text-3xl">
                    🟢
                </div>

                <h3 class="text-xl font-bold mt-5 text-gray-800">
                    Found Something?
                </h3>

                <p class="text-gray-500 mt-2 leading-6">
                    Post a found item and help get it back to its owner.
                </p>

            </div>

            <div class="bg-white rounded-3xl shadow-lg border border-orange-100 p-6">

                <div class="w-14 h-14 bg-orange-100 rounded-2xl flex items-center justify-center text-3xl">
                    🤝
                </div>

                <h3 class="text-xl font-bold mt-5 text-gray-800">
                    Help Each Other
                </h3>

                <p class="text-gray-500 mt-2 leading-6">
                    Check recent reports before replacing something you've lost.
                </p>

            </div>

        </div>

        {{-- ========================================================= --}}
        {{-- SECTION HEADER --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col sm:flex-row justify-between sm:items-end gap-4 mb-8">

            <div>

                <p class="text-orange-600 font-bold uppercase tracking-wider text-sm">
                    Recent Reports
                </p>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mt-1">
                    Lost & Found Items
                </h2>

                <p class="text-gray-500 mt-2">
                    Browse the latest items reported by students.
                </p>

            </div>

            <a
                href="{{ route('lostfound.create') }}"
                class="inline-flex items-center gap-2 text-orange-600 font-bold
                       hover:text-orange-700 hover:underline">

                + Report an Item

            </a>

        </div>

        {{-- ========================================================= --}}
        {{-- ITEMS --}}
        {{-- ========================================================= --}}

        @if($items->count())

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($items as $item)

                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden
                                border border-orange-100
                                hover:-translate-y-2 hover:shadow-2xl
                                transition-all duration-300">

                        {{-- IMAGE --}}

                        <div class="relative">

                            @if($item->image)

                                <img
                                    src="{{ asset('storage/'.$item->image) }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-60 object-cover">

                            @else

                                <div class="h-60 bg-gradient-to-br from-orange-100 to-amber-100
                                            flex flex-col items-center justify-center">

                                    <div class="text-7xl">
                                        🎒
                                    </div>

                                    <p class="text-gray-500 font-semibold mt-3">
                                        No image available
                                    </p>

                                </div>

                            @endif

                            {{-- TYPE BADGE --}}

                            <div class="absolute top-4 left-4">

                                @if($item->type === 'lost')

                                    <span class="inline-flex items-center gap-1
                                                 bg-red-500 text-white
                                                 px-4 py-2 rounded-full
                                                 font-extrabold text-sm shadow-lg">

                                        🔴 LOST

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1
                                                 bg-green-500 text-white
                                                 px-4 py-2 rounded-full
                                                 font-extrabold text-sm shadow-lg">

                                        🟢 FOUND

                                    </span>

                                @endif

                            </div>

                            {{-- DATE BADGE --}}

                            <div class="absolute top-4 right-4">

                                <span class="bg-white/95 backdrop-blur-sm
                                             text-gray-700 px-3 py-2 rounded-xl
                                             text-sm font-bold shadow">

                                    📅
                                    {{ $item->date ? $item->date->format('d M Y') : 'No date' }}

                                </span>

                            </div>

                        </div>

                        {{-- CARD CONTENT --}}

                        <div class="p-6">

                            <h2 class="text-2xl font-extrabold text-gray-800">

                                {{ $item->title }}

                            </h2>

                            <p class="text-gray-600 mt-3 leading-6 line-clamp-3">

                                {{ $item->description }}

                            </p>

                            {{-- LOCATION --}}

                            <div class="mt-5 flex items-start gap-3
                                        bg-orange-50 rounded-xl p-3">

                                <span class="text-xl">
                                    📍
                                </span>

                                <div>

                                    <p class="text-xs text-gray-500 font-semibold uppercase">
                                        Location
                                    </p>

                                    <p class="text-gray-800 font-bold">
                                        {{ $item->location }}
                                    </p>

                                </div>

                            </div>

                            {{-- POSTED BY --}}

                            @if($item->user)

                                <div class="mt-4 flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-full bg-orange-100
                                                flex items-center justify-center">

                                        👤

                                    </div>

                                    <div>

                                        <p class="text-xs text-gray-500">
                                            Reported by
                                        </p>

                                        <p class="font-bold text-gray-700">
                                            {{ $item->user->name }}
                                        </p>

                                    </div>

                                </div>

                            @endif

                            {{-- VIEW BUTTON --}}

                            <a
                                href="{{ route('lostfound.show', $item) }}"
                                class="flex items-center justify-center gap-2
                                       mt-6 bg-orange-600 hover:bg-orange-700
                                       active:bg-orange-800
                                       text-white text-center py-3.5 rounded-2xl
                                       font-bold shadow-md hover:shadow-lg
                                       transition-all duration-200">

                                View Details
                                <span>→</span>

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

            {{-- ===================================================== --}}
            {{-- PAGINATION --}}
            {{-- ===================================================== --}}

            @if(method_exists($items, 'links'))

                <div class="mt-10">

                    {{ $items->links() }}

                </div>

            @endif

        @else

            {{-- ===================================================== --}}
            {{-- EMPTY STATE --}}
            {{-- ===================================================== --}}

            <div class="bg-white rounded-3xl shadow-xl border border-orange-100
                        p-12 sm:p-20 text-center">

                <div class="w-28 h-28 mx-auto rounded-full bg-orange-100
                            flex items-center justify-center">

                    <span class="text-7xl">
                        🎒
                    </span>

                </div>

                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mt-7">

                    No Items Posted Yet

                </h2>

                <p class="text-gray-500 mt-4 max-w-xl mx-auto text-lg">

                    There are currently no lost or found items reported.
                    Be the first student to make a report.

                </p>

                <a
                    href="{{ route('lostfound.create') }}"
                    class="inline-flex items-center gap-2 mt-8
                           bg-orange-600 hover:bg-orange-700
                           text-white px-8 py-4 rounded-2xl
                           font-bold shadow-lg hover:shadow-xl
                           transition">

                    ➕ Report First Item

                </a>

            </div>

        @endif

    </div>

</div>

</x-app-layout>