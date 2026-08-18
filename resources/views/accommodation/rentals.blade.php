<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50">

    <!-- HERO -->
    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 lg:py-16">

            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-8 lg:gap-10">

                <div class="min-w-0">

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                        🏠 Off-Campus Rentals
                    </h1>

                    <p class="text-orange-100 text-base sm:text-lg lg:text-xl mt-4 sm:mt-5 max-w-2xl leading-relaxed">
                        Discover verified bedsitters, apartments and student houses
                        near your university. Safe, affordable and trusted.
                    </p>

                </div>

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-8 text-center text-gray-800 w-full sm:w-auto lg:min-w-[280px]">

                    <div class="text-4xl sm:text-5xl font-extrabold text-orange-600">
                        {{ $rentals->total() }}
                    </div>

                    <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base">
                        Available Rentals
                    </p>

                </div>

            </div>

        </div>

    </section>


    <!-- SEARCH + FILTERS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6 sm:-mt-10 relative z-10">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-6 lg:p-8">

            <form method="GET" action="{{ route('browse.rentals') }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 sm:gap-5">

                    <!-- Search -->
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="🔍 Search rentals..."
                        class="w-full lg:col-span-2
                               rounded-xl
                               border-2 border-gray-300
                               bg-white
                               px-4 py-3 sm:py-3.5
                               text-gray-800
                               placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2
                               focus:ring-orange-200
                               focus:outline-none">

                    <!-- Area -->
                    <select
                        name="area"
                        class="w-full
                               rounded-xl
                               border-2 border-gray-300
                               bg-white
                               px-4 py-3 sm:py-3.5
                               text-gray-800
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2
                               focus:ring-orange-200
                               focus:outline-none">

                        <option value="">
                            All Areas
                        </option>

                        @foreach($areas as $area)

                            <option
                                value="{{ $area->id }}"
                                @selected(request('area') == $area->id)>

                                {{ $area->name }}

                            </option>

                        @endforeach

                    </select>

                    <!-- Price -->
                    <input
                        type="number"
                        name="price"
                        value="{{ request('price') }}"
                        placeholder="Max Rent (KSh)"
                        class="w-full
                               rounded-xl
                               border-2 border-gray-300
                               bg-white
                               px-4 py-3 sm:py-3.5
                               text-gray-800
                               placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2
                               focus:ring-orange-200
                               focus:outline-none">

                    <!-- Search Button -->
                    <button
                        type="submit"
                        class="w-full
                               bg-orange-600
                               hover:bg-orange-700
                               text-white
                               rounded-xl
                               font-bold
                               px-5
                               py-3 sm:py-3.5
                               shadow-md
                               transition
                               duration-200">

                        🔍 Search

                    </button>

                </div>

            </form>

        </div>

    </section>


    <!-- RENTAL LIST -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-12">

        @if($rentals->count())

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">

                @foreach($rentals as $rental)

                    <div
                        class="bg-white
                               rounded-2xl sm:rounded-3xl
                               shadow-lg
                               border border-slate-200
                               overflow-hidden
                               hover:border-orange-300
                               hover:shadow-2xl
                               hover:-translate-y-1
                               transition
                               duration-300">

                        <!-- Image -->

                        @if($rental->photos->count())

                            <img
                                src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                alt="{{ $rental->title }}"
                                class="h-52 sm:h-60 lg:h-64 w-full object-cover">

                        @else

                            <div class="h-52 sm:h-60 lg:h-64 bg-orange-100 flex items-center justify-center text-6xl sm:text-7xl">

                                🏠

                            </div>

                        @endif


                        <!-- Content -->

                        <div class="p-5 sm:p-6">

                            <div class="flex flex-col sm:flex-row justify-between items-start gap-3">

                                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 leading-snug break-words">

                                    {{ $rental->title }}

                                </h2>

                                @if($rental->verified)

                                    <span
                                        class="bg-green-100
                                               border border-green-200
                                               text-green-700
                                               text-xs
                                               font-bold
                                               px-3 py-1.5
                                               rounded-full
                                               whitespace-nowrap">

                                        ✅ Verified

                                    </span>

                                @endif

                            </div>


                            <p class="text-gray-500 mt-2 text-sm sm:text-base break-words">

                                📍 {{ $rental->location }}

                            </p>


                            <!-- Rent -->

                            <div class="mt-4">

                                <p class="text-sm text-gray-500">
                                    Monthly Rent
                                </p>

                                <h3 class="text-2xl sm:text-3xl font-extrabold text-orange-600 mt-1">

                                    KSh {{ number_format($rental->price) }}

                                </h3>

                            </div>


                            <!-- Bottom Information -->

                            <div
                                class="mt-5 sm:mt-6
                                       pt-4 sm:pt-5
                                       border-t border-gray-100
                                       flex flex-col sm:flex-row
                                       justify-between
                                       items-start sm:items-center
                                       gap-4">

                                <span class="text-gray-500 text-sm sm:text-base">

                                    🏘 {{ $rental->available_units }} Units

                                </span>

                                <a
                                    href="{{ route('browse.rental.show', $rental) }}"
                                    class="w-full sm:w-auto
                                           inline-flex
                                           items-center
                                           justify-center
                                           bg-orange-600
                                           hover:bg-orange-700
                                           text-white
                                           px-5 py-3
                                           rounded-xl
                                           font-bold
                                           text-sm sm:text-base
                                           transition">

                                    View Details →

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>


        @else

            <!-- EMPTY STATE -->

            <div
                class="bg-white
                       rounded-2xl sm:rounded-3xl
                       shadow-lg
                       border border-slate-200
                       text-center
                       py-12 sm:py-16 lg:py-20
                       px-5 sm:px-8">

                <div class="text-6xl sm:text-7xl">
                    🏠
                </div>

                <h2 class="text-2xl sm:text-3xl font-bold mt-5 sm:mt-6">

                    No Rentals Found

                </h2>

                <p class="text-gray-500 mt-3 text-sm sm:text-base">

                    There are currently no rentals matching your search.

                </p>

            </div>

        @endif

    </section>


    <!-- PAGINATION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-10 sm:pb-16">

        @if($rentals->hasPages())

            <div
                class="bg-white
                       rounded-2xl
                       shadow-md
                       border border-slate-200
                       p-4 sm:p-5
                       overflow-x-auto">

                {{ $rentals->withQueryString()->links() }}

            </div>

        @endif

    </section>

</div>

</x-app-layout>