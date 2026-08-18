<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    {{-- ========================================================= --}}
    {{-- HERO --}}
    {{-- ========================================================= --}}

    <section class="bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-400 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 sm:gap-8">

                <div class="min-w-0">

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                        🏫 Campus Hostels
                    </h1>

                    <p class="mt-3 sm:mt-4 text-base sm:text-lg lg:text-xl text-orange-100 leading-relaxed">
                        Find verified university hostels near your campus.
                    </p>

                </div>

                <a
                    href="{{ route('campus.create') }}"
                    class="w-full sm:w-auto inline-flex items-center justify-center
                           bg-white text-orange-600
                           font-bold
                           px-6 sm:px-8
                           py-3.5 sm:py-4
                           rounded-2xl
                           shadow-xl
                           hover:scale-105
                           transition">

                    <span class="mr-2">+</span>
                    Post Hostel

                </a>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- SEARCH --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 sm:mt-10">

        <div
            class="bg-white
                   rounded-2xl sm:rounded-3xl
                   shadow-xl
                   border border-slate-200
                   p-4 sm:p-6">

            <form class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">

                {{-- Search --}}
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Search
                    </label>

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search hostel..."
                        class="w-full rounded-xl
                               border border-gray-300
                               bg-white
                               px-4 py-3
                               text-gray-800
                               placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-200
                               focus:outline-none
                               transition">

                </div>


                {{-- University --}}
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        University
                    </label>

                    <input
                        type="text"
                        name="university"
                        value="{{ request('university') }}"
                        placeholder="University"
                        class="w-full rounded-xl
                               border border-gray-300
                               bg-white
                               px-4 py-3
                               text-gray-800
                               placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-200
                               focus:outline-none
                               transition">

                </div>


                {{-- Price --}}
                <div>

                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Price Range
                    </label>

                    <select
                        name="price"
                        class="w-full rounded-xl
                               border border-gray-300
                               bg-white
                               px-4 py-3
                               text-gray-800
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-200
                               focus:outline-none
                               transition">

                        <option value="">
                            Any Price
                        </option>

                        <option value="3000"
                            @selected(request('price') == '3000')>
                            Below KSh 3,000
                        </option>

                        <option value="6000"
                            @selected(request('price') == '6000')>
                            KSh 3,000 - 6,000
                        </option>

                        <option value="6001"
                            @selected(request('price') == '6001')>
                            Above KSh 6,000
                        </option>

                    </select>

                </div>


                {{-- Search Button --}}
                <div class="flex items-end">

                    <button
                        type="submit"
                        class="w-full
                               bg-orange-600
                               hover:bg-orange-700
                               text-white
                               py-3
                               rounded-xl
                               font-bold
                               shadow-sm
                               hover:shadow-md
                               transition">

                        🔍 Search

                    </button>

                </div>

            </form>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- LISTINGS --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">

            @forelse($hostels as $hostel)

                {{-- ================================================= --}}
                {{-- HOSTEL CARD --}}
                {{-- ================================================= --}}

                <div
                    class="bg-white
                           rounded-2xl sm:rounded-3xl
                           shadow-xl
                           border border-slate-200
                           overflow-hidden
                           hover:-translate-y-1
                           hover:shadow-2xl
                           transition-all duration-300">


                    {{-- IMAGE --}}
                    <div class="relative">

                        @if($hostel->images->count())

                            <img
                                src="{{ asset('storage/'.$hostel->images->first()->image_path) }}"
                                alt="{{ $hostel->title }}"
                                class="w-full h-56 sm:h-64 object-cover">

                        @else

                            <div
                                class="h-56 sm:h-64
                                       bg-orange-100
                                       flex items-center justify-center
                                       text-7xl sm:text-8xl">

                                🏫

                            </div>

                        @endif


                        {{-- BADGES --}}
                        @if($hostel->verified || $hostel->featured)

                            <div class="absolute top-3 sm:top-4 left-3 sm:left-4 flex flex-wrap gap-2">

                                @if($hostel->verified)

                                    <span
                                        class="bg-green-500
                                               text-white
                                               px-3 py-1.5
                                               rounded-full
                                               text-xs sm:text-sm
                                               font-bold
                                               shadow">

                                        ✅ Verified

                                    </span>

                                @endif


                                @if($hostel->featured)

                                    <span
                                        class="bg-yellow-400
                                               text-black
                                               px-3 py-1.5
                                               rounded-full
                                               text-xs sm:text-sm
                                               font-bold
                                               shadow">

                                        ⭐ Featured

                                    </span>

                                @endif

                            </div>

                        @endif

                    </div>


                    {{-- CARD CONTENT --}}
                    <div class="p-5 sm:p-6">

                        {{-- Title --}}
                        <h2
                            class="text-xl sm:text-2xl
                                   font-bold
                                   text-gray-800
                                   leading-snug
                                   break-words">

                            {{ $hostel->title }}

                        </h2>


                        {{-- Location --}}
                        <p class="text-gray-500 mt-2 text-sm sm:text-base break-words">

                            📍 {{ $hostel->location }}

                        </p>


                        {{-- PRICE + REVIEWS --}}
                        <div
                            class="flex flex-col sm:flex-row
                                   sm:justify-between
                                   sm:items-center
                                   gap-4
                                   mt-5">

                            <div>

                                <p
                                    class="text-orange-600
                                           text-2xl sm:text-3xl
                                           font-extrabold">

                                    KSh {{ number_format($hostel->price) }}

                                </p>

                                <small class="text-gray-500">
                                    per month
                                </small>

                            </div>


                            <div class="sm:text-right">

                                <div class="text-yellow-500 font-bold">

                                    ⭐
                                    {{ number_format($hostel->reviews->avg('rating') ?? 0, 1) }}

                                </div>

                                <small class="text-gray-500">

                                    {{ $hostel->reviews->count() }} Reviews

                                </small>

                            </div>

                        </div>


                        {{-- ACTIONS --}}
                        <div
                            class="grid grid-cols-1 sm:grid-cols-2
                                   gap-3
                                   mt-6">

                            <a
                                href="{{ route('accommodation.show',$hostel) }}"
                                class="inline-flex items-center justify-center
                                       bg-orange-600
                                       hover:bg-orange-700
                                       text-white
                                       py-3
                                       rounded-xl
                                       text-center
                                       font-bold
                                       transition">

                                View Details

                            </a>


                            <form
                                action="{{ route('accommodation.save',$hostel) }}"
                                method="POST">

                                @csrf

                                <button
                                    type="submit"
                                    class="w-full
                                           bg-blue-600
                                           hover:bg-blue-700
                                           text-white
                                           py-3
                                           rounded-xl
                                           font-bold
                                           transition">

                                    ❤️ Save

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                {{-- ================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ================================================= --}}

                <div class="col-span-1 md:col-span-2 xl:col-span-3">

                    <div
                        class="bg-white
                               rounded-2xl sm:rounded-3xl
                               shadow-xl
                               border border-slate-200
                               p-8 sm:p-12 lg:p-20
                               text-center">

                        <div class="text-6xl sm:text-8xl">
                            🏫
                        </div>

                        <h2
                            class="text-2xl sm:text-3xl lg:text-4xl
                                   font-bold
                                   mt-5 sm:mt-6">

                            No Campus Hostels Yet

                        </h2>

                        <p class="text-gray-500 mt-3 sm:mt-4 text-sm sm:text-base">

                            Be the first to post a campus hostel.

                        </p>

                        <a
                            href="{{ route('campus.create') }}"
                            class="inline-flex items-center justify-center
                                   mt-6 sm:mt-8
                                   bg-orange-600
                                   hover:bg-orange-700
                                   text-white
                                   px-6 sm:px-8
                                   py-3 sm:py-4
                                   rounded-xl sm:rounded-2xl
                                   font-bold
                                   shadow-lg
                                   transition">

                            + Post Hostel

                        </a>

                    </div>

                </div>

            @endforelse

        </div>


        {{-- ========================================================= --}}
        {{-- PAGINATION --}}
        {{-- ========================================================= --}}

        @if($hostels->hasPages())

            <div class="mt-8 sm:mt-10 overflow-x-auto">

                {{ $hostels->withQueryString()->links() }}

            </div>

        @endif

    </div>

</div>

</x-app-layout>