<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <!-- HERO -->

    <div class="bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-400 text-white">

        <div class="max-w-7xl mx-auto px-6 py-14">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">

                <div>

                    <h1 class="text-5xl font-extrabold">

                        🏠 Student Accommodation

                    </h1>

                    <p class="mt-4 text-orange-100 text-lg">

                        Find verified campus hostels and off-campus rentals
                        from universities across Kenya.

                    </p>

                </div>

                <div class="mt-8 lg:mt-0">

                    <a href="{{ route('accommodation.create') }}"

                       class="bg-white text-orange-600 font-bold px-8 py-4 rounded-2xl shadow-xl hover:scale-105 transition">

                        ➕ Post Accommodation

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- SEARCH -->

    <div class="max-w-7xl mx-auto px-6 mt-10">

        <div class="bg-white rounded-3xl shadow-xl p-8">

            <form method="GET" action="{{ route('accommodation.index') }}">

                <div class="grid lg:grid-cols-4 gap-5">

                    <input

                        type="text"

                        name="search"

                        placeholder="Search hostel or rental..."

                        class="rounded-2xl border-gray-300">

                    <select

                        name="listing_type"

                        class="rounded-2xl border-gray-300">

                        <option value="">All Listings</option>

                        <option value="campus">

                            Campus Hostel

                        </option>

                        <option value="rental">

                            Off Campus Rental

                        </option>

                    </select>

                    <input

                        type="number"

                        name="max_price"

                        placeholder="Maximum Rent"

                        class="rounded-2xl border-gray-300">

                    <button

                        class="bg-orange-600 hover:bg-orange-700 text-white rounded-2xl font-bold">

                        🔍 Search

                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- FEATURED -->

    <div class="max-w-7xl mx-auto px-6 mt-14">

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-orange-700">

                ⭐ Featured Listings

            </h2>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">

            @forelse($featured as $room)

            <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover:-translate-y-2 transition">

                @if($room->images->count())

                    <img

                        src="{{ asset('storage/'.$room->images->first()->image) }}"

                        class="w-full h-60 object-cover">

                @else

                    <img

                        src="https://placehold.co/600x400?text=No+Image"

                        class="w-full h-60 object-cover">

                @endif

                <div class="p-6">

                    <div class="flex justify-between">

                        <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm">

                            {{ ucfirst($room->listing_type) }}

                        </span>

                        <span class="font-bold text-green-600">

                            KES {{ number_format($room->price) }}

                        </span>

                    </div>

                    <h3 class="text-2xl font-bold mt-4">

                        {{ $room->title }}

                    </h3>

                    <p class="text-gray-500 mt-2">

                        📍 {{ $room->location }}

                    </p>

                    <div class="flex justify-between items-center mt-6">

                        <span class="text-sm text-gray-500">

                            {{ $room->gender }}

                        </span>

                        <a href="#"

                           class="bg-orange-600 text-white px-5 py-2 rounded-xl">

                            View

                        </a>

                    </div>

                </div>

            </div>

            @empty

                <div class="col-span-3 bg-white rounded-3xl shadow p-10 text-center">

                    No featured accommodation yet.

                </div>

            @endforelse

        </div>

    </div>
        <!-- CAMPUS HOSTELS -->

    <div class="max-w-7xl mx-auto px-6 mt-16">

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-blue-700">

                🏫 Campus Hostels

            </h2>

            <span class="text-gray-500">

                {{ $campus->count() }} Available

            </span>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">

            @forelse($campus as $room)

            <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                @if($room->images->count())

                    <img
                        src="{{ asset('storage/'.$room->images->first()->image) }}"
                        class="w-full h-60 object-cover">

                @else

                    <img
                        src="https://placehold.co/600x400?text=Campus+Hostel"
                        class="w-full h-60 object-cover">

                @endif

                <div class="p-6">

                    <div class="flex justify-between items-center">

                        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                            Campus Hostel

                        </span>

                        <span class="text-green-600 font-bold">

                            KES {{ number_format($room->price) }}

                        </span>

                    </div>

                    <h3 class="text-2xl font-bold mt-4">

                        {{ $room->title }}

                    </h3>

                    <p class="text-gray-500 mt-2">

                        📍 {{ $room->location }}

                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">

                        @foreach($room->facilities->take(4) as $facility)

                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">

                                {{ $facility->name }}

                            </span>

                        @endforeach

                    </div>

                    <div class="flex justify-between items-center mt-6">

                        <span class="font-semibold text-orange-600">

                            {{ $room->gender }}

                        </span>

                        <a
                            href="{{ route('accommodation.show',$room) }}"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

            @empty

                <div class="col-span-3 bg-white rounded-3xl shadow-lg p-10 text-center">

                    No campus hostels available.

                </div>

            @endforelse

        </div>

    </div>



    <!-- OFF CAMPUS RENTALS -->

    <div class="max-w-7xl mx-auto px-6 mt-20">

        <div class="flex justify-between items-center">

            <h2 class="text-3xl font-bold text-green-700">

                🏡 Off-Campus Rentals

            </h2>

            <span class="text-gray-500">

                {{ $rentals->count() }} Available

            </span>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-8">

            @forelse($rentals as $room)

            <div class="bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl hover:-translate-y-2 transition duration-300">

                @if($room->images->count())

                    <img
                        src="{{ asset('storage/'.$room->images->first()->image) }}"
                        class="w-full h-60 object-cover">

                @else

                    <img
                        src="https://placehold.co/600x400?text=Rental"
                        class="w-full h-60 object-cover">

                @endif

                <div class="p-6">

                    <div class="flex justify-between">

                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">

                            Rental

                        </span>

                        <span class="font-bold text-green-600">

                            KES {{ number_format($room->price) }}

                        </span>

                    </div>

                    <h3 class="text-2xl font-bold mt-4">

                        {{ $room->title }}

                    </h3>

                    <p class="text-gray-500 mt-2">

                        📍 {{ $room->location }}

                    </p>

                    <div class="mt-4 flex flex-wrap gap-2">

                        @foreach($room->facilities->take(4) as $facility)

                            <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">

                                {{ $facility->name }}

                            </span>

                        @endforeach

                    </div>

                    <div class="flex justify-between items-center mt-6">

                        <span class="font-semibold text-orange-600">

                            {{ $room->gender }}

                        </span>

                        <a
                            href="{{ route('accommodation.show',$room) }}"
                            class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl">

                            View Details

                        </a>

                    </div>

                </div>

            </div>

            @empty

                <div class="col-span-3 bg-white rounded-3xl shadow-lg p-10 text-center">

                    No rentals available.

                </div>

            @endforelse

        </div>

    </div>
        <!-- Floating Post Button -->

    <a href="{{ route('accommodation.create') }}"

       class="fixed bottom-8 right-8 bg-orange-600 hover:bg-orange-700 text-white rounded-full w-16 h-16 flex items-center justify-center text-3xl shadow-2xl hover:scale-110 transition duration-300">

        +

    </a>

    <!-- Success Message -->

    @if(session('success'))

        <div
            x-data="{ show:true }"
            x-show="show"
            x-transition
            class="fixed top-6 right-6 bg-green-600 text-white px-8 py-4 rounded-2xl shadow-2xl z-50">

            {{ session('success') }}

            <button
                @click="show=false"
                class="ml-4 font-bold">

                ✕

            </button>

        </div>

    @endif

    <!-- Footer -->

    <div class="mt-24 bg-white border-t">

        <div class="max-w-7xl mx-auto px-6 py-12">

            <div class="grid md:grid-cols-3 gap-10">

                <div>

                    <h2 class="text-2xl font-bold text-orange-600">

                        CampusConnect

                    </h2>

                    <p class="mt-4 text-gray-600">

                        Helping students find safe, verified and affordable accommodation around their universities.

                    </p>

                </div>

                <div>

                    <h3 class="font-bold text-lg mb-4">

                        Accommodation

                    </h3>

                    <ul class="space-y-2 text-gray-600">

                        <li>🏫 Campus Hostels</li>

                        <li>🏡 Off-Campus Rentals</li>

                        <li>⭐ Featured Listings</li>

                        <li>✔ Verified Rooms</li>

                    </ul>

                </div>

                <div>

                    <h3 class="font-bold text-lg mb-4">

                        Contact

                    </h3>

                    <ul class="space-y-2 text-gray-600">

                        <li>📧 support@campusconnect.com</li>

                        <li>📞 +254 700 000 000</li>

                        <li>🌍 Kenya</li>

                    </ul>

                </div>

            </div>

            <div class="border-t mt-10 pt-6 text-center text-gray-500">

                © {{ date('Y') }} CampusConnect. All Rights Reserved.

            </div>

        </div>

    </div>

</div>

</x-app-layout>