<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50">

    <!-- HERO -->
    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-8 py-16">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-10">

                <div>

                    <h1 class="text-5xl font-extrabold leading-tight">

                        🏠 Off-Campus Rentals

                    </h1>

                    <p class="text-orange-100 text-xl mt-5 max-w-2xl">

                        Discover verified bedsitters, apartments and student houses
                        near your university. Safe, affordable and trusted.

                    </p>

                </div>

                <div class="bg-white rounded-3xl shadow-2xl p-8 text-center text-gray-800 min-w-[280px]">

                    <div class="text-5xl font-extrabold text-orange-600">

                        {{ $rentals->total() }}

                    </div>

                    <p class="text-gray-500 mt-3">

                        Available Rentals

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- SEARCH + FILTERS -->
    <section class="max-w-7xl mx-auto px-8 -mt-10 relative z-10">

        <div class="bg-white rounded-3xl shadow-xl p-8">

            <form method="GET" action="{{ route('browse.rentals') }}">

                <div class="grid lg:grid-cols-5 gap-5">

                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="🔍 Search rentals..."
                        class="lg:col-span-2 rounded-xl border-gray-300 focus:ring-orange-500 focus:border-orange-500">

                    <select
                        name="area"
                        class="rounded-xl border-gray-300">

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

                    <input
                        type="number"
                        name="price"
                        value="{{ request('price') }}"
                        placeholder="Max Rent (KSh)"
                        class="rounded-xl border-gray-300">

                    <button
                        class="bg-orange-600 hover:bg-orange-700 text-white rounded-xl font-bold transition">

                        Search

                    </button>

                </div>

            </form>
               <!-- RENTAL LIST -->
    <section class="max-w-7xl mx-auto px-8 py-12">

        @if($rentals->count())

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                @foreach($rentals as $rental)

                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition duration-300">

                        <!-- Image -->

                        @if($rental->photos->count())

                            <img
                                src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                class="h-64 w-full object-cover">

                        @else

                            <div class="h-64 bg-orange-100 flex items-center justify-center text-7xl">

                                🏠

                            </div>

                        @endif

                        <!-- Content -->

                        <div class="p-6">

                            <div class="flex justify-between items-start">

                                <h2 class="text-2xl font-bold text-gray-800">

                                    {{ $rental->title }}

                                </h2>

                                @if($rental->verified)

                                    <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">

                                        ✅ Verified

                                    </span>

                                @endif

                            </div>

                            <p class="text-gray-500 mt-2">

                                📍 {{ $rental->location }}

                            </p>

                            <div class="mt-4 flex justify-between items-center">

                                <div>

                                    <p class="text-sm text-gray-500">

                                        Monthly Rent

                                    </p>

                                    <h3 class="text-3xl font-extrabold text-orange-600">

                                        KSh {{ number_format($rental->price) }}

                                    </h3>

                                </div>

                            </div>

                            <div class="mt-6 flex justify-between items-center">

                                <span class="text-gray-500">

                                    🏘 {{ $rental->available_units }} Units

                                </span>

                                <a
                                    href="{{ route('browse.rental.show', $rental) }}"
                                    class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-3 rounded-xl font-bold">

                                    View Details →

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-3xl shadow-lg text-center py-20">

                <div class="text-7xl">

                    🏠

                </div>

                <h2 class="text-3xl font-bold mt-6">

                    No Rentals Found

                </h2>

                <p class="text-gray-500 mt-3">

                    There are currently no rentals matching your search.

                </p>

            </div>

        @endif

    </section> 

        </div>

    </section>
        <!-- PAGINATION -->
    <section class="max-w-7xl mx-auto px-8 pb-16">

        <div class="mt-10">

            {{ $rentals->withQueryString()->links() }}

        </div>

    </section>

</div>

</x-app-layout>