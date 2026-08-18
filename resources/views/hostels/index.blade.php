<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-orange-100 via-amber-50 to-yellow-100">

        <!-- HERO -->
        <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 py-10 sm:py-12">

                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-8">

                    <div class="max-w-3xl">

                        <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
                            🏫 Campus Hostels
                        </h1>

                        <p class="mt-4 text-orange-100 text-base sm:text-lg">
                            Browse available university hostels from different institutions.
                        </p>

                    </div>

                    <a
                        href="{{ route('hostels.create') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center bg-white text-orange-700 px-6 sm:px-8 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">

                        + Add Hostel

                    </a>

                </div>

            </div>

        </div>

        <!-- MAIN CONTENT -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-10">

            <!-- SUCCESS MESSAGE -->
            @if(session('success'))

                <div class="mb-8 bg-green-50 border-2 border-green-300 rounded-2xl p-4 sm:p-5 text-green-700">

                    <div class="flex items-start gap-3">

                        <span class="text-xl">
                            ✅
                        </span>

                        <p class="font-semibold">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            @endif

            <!-- SEARCH -->
            <div class="bg-white rounded-3xl shadow-xl p-5 sm:p-6 mb-10">

                <form
                    method="GET"
                    action="{{ url()->current() }}"
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">

                    <!-- Search -->
                    <div>

                        <label
                            for="search"
                            class="block text-sm font-bold text-gray-700 mb-2">

                            Search

                        </label>

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search hostel..."
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 bg-white text-gray-800 placeholder-gray-400 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition">

                    </div>

                    <!-- University -->
                    <div>

                        <label
                            for="university"
                            class="block text-sm font-bold text-gray-700 mb-2">

                            University

                        </label>

                        <select
                            id="university"
                            name="university"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 bg-white text-gray-800 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition">

                            <option value="">
                                All Universities
                            </option>

                            @php
                                $universities = $hostels
                                    ->pluck('university')
                                    ->filter()
                                    ->unique()
                                    ->sort();
                            @endphp

                            @foreach($universities as $university)

                                <option
                                    value="{{ $university }}"
                                    @selected(request('university') == $university)>

                                    {{ $university }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Gender -->
                    <div>

                        <label
                            for="gender"
                            class="block text-sm font-bold text-gray-700 mb-2">

                            Gender

                        </label>

                        <select
                            id="gender"
                            name="gender"
                            class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 bg-white text-gray-800 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition">

                            <option value="">
                                All Genders
                            </option>

                            <option
                                value="Male"
                                @selected(request('gender') == 'Male')>

                                Male

                            </option>

                            <option
                                value="Female"
                                @selected(request('gender') == 'Female')>

                                Female

                            </option>

                        </select>

                    </div>

                    <!-- Search Button -->
                    <div class="flex items-end">

                        <button
                            type="submit"
                            class="w-full bg-orange-600 hover:bg-orange-700 text-white py-3 px-5 rounded-xl font-bold shadow-md transition">

                            🔍 Search

                        </button>

                    </div>

                </form>

            </div>

            <!-- HOSTEL CARDS -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">

                @forelse($hostels as $hostel)

                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">

                        <!-- IMAGE -->
                        <div class="relative">

                            @if($hostel->image)

                                <img
                                    src="{{ asset('storage/'.$hostel->image) }}"
                                    alt="{{ $hostel->hostel_name }}"
                                    class="w-full h-52 sm:h-56 object-cover">

                            @else

                                <div class="h-52 sm:h-56 bg-orange-100 flex items-center justify-center text-7xl">

                                    🏫

                                </div>

                            @endif

                        </div>

                        <!-- CARD CONTENT -->
                        <div class="p-5 sm:p-6">

                            <span class="inline-block max-w-full bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-bold truncate">

                                {{ $hostel->university }}

                            </span>

                            <h2 class="text-2xl font-bold mt-5 text-gray-800 break-words">

                                {{ $hostel->hostel_name }}

                            </h2>

                            <!-- Details -->
                            <div class="space-y-3 mt-5 text-gray-600">

                                <div class="flex items-center gap-3">

                                    <span class="text-lg">
                                        🚻
                                    </span>

                                    <span>
                                        <strong>Gender:</strong>
                                        {{ $hostel->gender }}
                                    </span>

                                </div>

                                <div class="flex items-center gap-3">

                                    <span class="text-lg">
                                        🚪
                                    </span>

                                    <span>
                                        <strong>Room:</strong>
                                        {{ $hostel->room_number }}
                                    </span>

                                </div>

                                <div class="flex items-center gap-3">

                                    <span class="text-lg">
                                        🛏
                                    </span>

                                    <span>
                                        <strong>Available:</strong>
                                        {{ $hostel->available_spaces }} Spaces Left
                                    </span>

                                </div>

                                <div class="flex items-center gap-3">

                                    <span class="text-lg">
                                        👮
                                    </span>

                                    <span class="break-words">
                                        <strong>Warden:</strong>
                                        {{ $hostel->warden_name }}
                                    </span>

                                </div>

                            </div>

                            <!-- ACTION -->
                            <button
                                type="button"
                                class="w-full mt-7 sm:mt-8 bg-orange-600 hover:bg-orange-700 text-white py-3.5 rounded-xl font-bold transition">

                                View Hostel

                            </button>

                        </div>

                    </div>

                @empty

                    <!-- EMPTY STATE -->
                    <div class="col-span-1 md:col-span-2 lg:col-span-3">

                        <div class="bg-white rounded-3xl shadow-xl p-10 sm:p-16 text-center">

                            <div class="text-7xl sm:text-8xl">
                                🏫
                            </div>

                            <h2 class="text-3xl sm:text-4xl font-bold mt-6 text-gray-800">

                                No Hostels Yet

                            </h2>

                            <p class="text-gray-500 mt-4 text-base sm:text-lg">

                                Be the first to upload a campus hostel.

                            </p>

                            <a
                                href="{{ route('hostels.create') }}"
                                class="inline-flex items-center justify-center mt-8 bg-orange-600 hover:bg-orange-700 text-white px-7 sm:px-8 py-4 rounded-2xl font-bold transition">

                                + Add Hostel

                            </a>

                        </div>

                    </div>

                @endforelse

            </div>

            <!-- PAGINATION -->
            @if(method_exists($hostels, 'links'))

                <div class="mt-10 overflow-x-auto">

                    {{ $hostels->withQueryString()->links() }}

                </div>

            @endif

        </div>

    </div>

</x-app-layout>