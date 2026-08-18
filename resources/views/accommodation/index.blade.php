<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <!-- HERO -->
    <div class="bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-400 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12 lg:py-14">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-8">

                <div class="min-w-0">

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                        🏠 Student Accommodation
                    </h1>

                    <p class="mt-4 text-orange-100 text-base sm:text-lg leading-relaxed max-w-3xl">
                        Find verified campus hostels and off-campus rentals
                        from universities across Kenya.
                    </p>

                </div>

                <div class="w-full lg:w-auto">

                    <a
                        href="{{ route('accommodation.create') }}"
                        class="w-full lg:w-auto inline-flex items-center justify-center
                               bg-white text-orange-600
                               font-bold
                               px-6 sm:px-8
                               py-3.5 sm:py-4
                               rounded-2xl
                               shadow-xl
                               hover:scale-105
                               transition">

                        ➕ Post Accommodation

                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- SEARCH -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6 sm:mt-10">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-6 lg:p-8">

            <form method="GET" action="{{ route('accommodation.index') }}">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">

                    <!-- Search -->
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search hostel or rental..."
                        class="w-full
                               rounded-xl sm:rounded-2xl
                               border-2 border-gray-300
                               bg-white
                               px-4 py-3.5
                               text-gray-800
                               placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2
                               focus:ring-orange-200
                               focus:outline-none">

                    <!-- Listing Type -->
                    <select
                        name="listing_type"
                        class="w-full
                               rounded-xl sm:rounded-2xl
                               border-2 border-gray-300
                               bg-white
                               px-4 py-3.5
                               text-gray-800
                               shadow-sm
                               focus:border-orange-500
                               focus:ring-2
                               focus:ring-orange-200
                               focus:outline-none">

                        <option value="">
                            All Listings
                        </option>

                        <option
                            value="campus"
                            @selected(request('listing_type') == 'campus')>
                            Campus Hostel
                        </option>

                        <option
                            value="rental"
                            @selected(request('listing_type') == 'rental')>
                            Off Campus Rental
                        </option>

                    </select>

                    <!-- Maximum Price -->
                    <input
                        type="number"
                        name="max_price"
                        value="{{ request('max_price') }}"
                        placeholder="Maximum Rent"
                        class="w-full
                               rounded-xl sm:rounded-2xl
                               border-2 border-gray-300
                               bg-white
                               px-4 py-3.5
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
                               rounded-xl sm:rounded-2xl
                               font-bold
                               py-3.5
                               px-5
                               shadow-md
                               transition">

                        🔍 Search

                    </button>

                </div>

            </form>

        </div>

    </div>


    <!-- FEATURED -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 sm:mt-14">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

            <h2 class="text-2xl sm:text-3xl font-bold text-orange-700">
                ⭐ Featured Listings
            </h2>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mt-6 sm:mt-8">

            @forelse($featured as $room)

                <div
                    class="bg-white
                           rounded-2xl sm:rounded-3xl
                           overflow-hidden
                           shadow-xl
                           border border-slate-200
                           hover:border-orange-300
                           hover:-translate-y-1
                           hover:shadow-2xl
                           transition
                           duration-300">

                    @if($room->images->count())

                        <img
                            src="{{ asset('storage/'.$room->images->first()->image) }}"
                            alt="{{ $room->title }}"
                            class="w-full h-52 sm:h-60 object-cover">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=No+Image"
                            alt="No image available"
                            class="w-full h-52 sm:h-60 object-cover">

                    @endif


                    <div class="p-5 sm:p-6">

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3">

                            <span
                                class="inline-flex self-start
                                       bg-orange-100
                                       border border-orange-200
                                       text-orange-700
                                       px-3 py-1
                                       rounded-full
                                       text-sm">

                                {{ ucfirst($room->listing_type) }}

                            </span>

                            <span class="font-bold text-green-600 whitespace-nowrap">

                                KES {{ number_format($room->price) }}

                            </span>

                        </div>


                        <h3 class="text-xl sm:text-2xl font-bold mt-4 break-words">
                            {{ $room->title }}
                        </h3>

                        <p class="text-gray-500 mt-2 break-words">
                            📍 {{ $room->location }}
                        </p>


                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-6">

                            <span class="text-sm text-gray-500">
                                {{ $room->gender }}
                            </span>

                            <a
                                href="{{ route('accommodation.show',$room) }}"
                                class="w-full sm:w-auto
                                       inline-flex items-center justify-center
                                       bg-orange-600
                                       hover:bg-orange-700
                                       text-white
                                       px-5 py-2.5
                                       rounded-xl
                                       font-bold
                                       transition">

                                View →

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="col-span-1 md:col-span-2 lg:col-span-3
                           bg-white
                           rounded-2xl sm:rounded-3xl
                           shadow
                           border border-slate-200
                           p-8 sm:p-10
                           text-center">

                    No featured accommodation yet.

                </div>

            @endforelse

        </div>

    </div>


    <!-- CAMPUS HOSTELS -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12 sm:mt-16">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

            <h2 class="text-2xl sm:text-3xl font-bold text-blue-700">
                🏫 Campus Hostels
            </h2>

            <span class="text-gray-500 text-sm sm:text-base">
                {{ $campus->count() }} Available
            </span>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mt-6 sm:mt-8">

            @forelse($campus as $room)

                <div
                    class="bg-white
                           rounded-2xl sm:rounded-3xl
                           overflow-hidden
                           shadow-xl
                           border border-slate-200
                           hover:border-blue-300
                           hover:shadow-2xl
                           hover:-translate-y-1
                           transition duration-300">

                    @if($room->images->count())

                        <img
                            src="{{ asset('storage/'.$room->images->first()->image) }}"
                            alt="{{ $room->title }}"
                            class="w-full h-52 sm:h-60 object-cover">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=Campus+Hostel"
                            alt="Campus Hostel"
                            class="w-full h-52 sm:h-60 object-cover">

                    @endif


                    <div class="p-5 sm:p-6">

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3">

                            <span
                                class="inline-flex self-start
                                       bg-blue-100
                                       border border-blue-200
                                       text-blue-700
                                       px-3 py-1
                                       rounded-full
                                       text-sm">

                                Campus Hostel

                            </span>

                            <span class="text-green-600 font-bold whitespace-nowrap">

                                KES {{ number_format($room->price) }}

                            </span>

                        </div>


                        <h3 class="text-xl sm:text-2xl font-bold mt-4 break-words">

                            {{ $room->title }}

                        </h3>


                        <p class="text-gray-500 mt-2 break-words">

                            📍 {{ $room->location }}

                        </p>


                        <div class="mt-4 flex flex-wrap gap-2">

                            @foreach($room->facilities->take(4) as $facility)

                                <span
                                    class="bg-gray-100
                                           border border-gray-200
                                           px-3 py-1
                                           rounded-full
                                           text-sm">

                                    {{ $facility->name }}

                                </span>

                            @endforeach

                        </div>


                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-6">

                            <span class="font-semibold text-orange-600">
                                {{ $room->gender }}
                            </span>

                            <a
                                href="{{ route('accommodation.show',$room) }}"
                                class="w-full sm:w-auto
                                       inline-flex items-center justify-center
                                       bg-blue-600
                                       hover:bg-blue-700
                                       text-white
                                       px-5 py-2.5
                                       rounded-xl
                                       font-bold
                                       transition">

                                View Details

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="col-span-1 md:col-span-2 lg:col-span-3
                           bg-white
                           rounded-2xl sm:rounded-3xl
                           shadow-lg
                           border border-slate-200
                           p-8 sm:p-10
                           text-center">

                    No campus hostels available.

                </div>

            @endforelse

        </div>

    </div>


    <!-- OFF CAMPUS RENTALS -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-14 sm:mt-20">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3">

            <h2 class="text-2xl sm:text-3xl font-bold text-green-700">
                🏡 Off-Campus Rentals
            </h2>

            <span class="text-gray-500 text-sm sm:text-base">
                {{ $rentals->count() }} Available
            </span>

        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mt-6 sm:mt-8">

            @forelse($rentals as $room)

                <div
                    class="bg-white
                           rounded-2xl sm:rounded-3xl
                           overflow-hidden
                           shadow-xl
                           border border-slate-200
                           hover:border-green-300
                           hover:shadow-2xl
                           hover:-translate-y-1
                           transition duration-300">

                    @if($room->images->count())

                        <img
                            src="{{ asset('storage/'.$room->images->first()->image) }}"
                            alt="{{ $room->title }}"
                            class="w-full h-52 sm:h-60 object-cover">

                    @else

                        <img
                            src="https://placehold.co/600x400?text=Rental"
                            alt="Rental"
                            class="w-full h-52 sm:h-60 object-cover">

                    @endif


                    <div class="p-5 sm:p-6">

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3">

                            <span
                                class="inline-flex self-start
                                       bg-green-100
                                       border border-green-200
                                       text-green-700
                                       px-3 py-1
                                       rounded-full
                                       text-sm">

                                Rental

                            </span>

                            <span class="font-bold text-green-600 whitespace-nowrap">

                                KES {{ number_format($room->price) }}

                            </span>

                        </div>


                        <h3 class="text-xl sm:text-2xl font-bold mt-4 break-words">

                            {{ $room->title }}

                        </h3>


                        <p class="text-gray-500 mt-2 break-words">

                            📍 {{ $room->location }}

                        </p>


                        <div class="mt-4 flex flex-wrap gap-2">

                            @foreach($room->facilities->take(4) as $facility)

                                <span
                                    class="bg-gray-100
                                           border border-gray-200
                                           px-3 py-1
                                           rounded-full
                                           text-sm">

                                    {{ $facility->name }}

                                </span>

                            @endforeach

                        </div>


                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mt-6">

                            <span class="font-semibold text-orange-600">

                                {{ $room->gender }}

                            </span>

                            <a
                                href="{{ route('accommodation.show',$room) }}"
                                class="w-full sm:w-auto
                                       inline-flex items-center justify-center
                                       bg-green-600
                                       hover:bg-green-700
                                       text-white
                                       px-5 py-2.5
                                       rounded-xl
                                       font-bold
                                       transition">

                                View Details

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="col-span-1 md:col-span-2 lg:col-span-3
                           bg-white
                           rounded-2xl sm:rounded-3xl
                           shadow-lg
                           border border-slate-200
                           p-8 sm:p-10
                           text-center">

                    No rentals available.

                </div>

            @endforelse

        </div>

    </div>


    <!-- FLOATING POST BUTTON -->
    <a
        href="{{ route('accommodation.create') }}"
        aria-label="Post Accommodation"
        class="fixed bottom-5 right-5 sm:bottom-8 sm:right-8
               bg-orange-600
               hover:bg-orange-700
               text-white
               rounded-full
               w-14 h-14 sm:w-16 sm:h-16
               flex items-center justify-center
               text-3xl
               shadow-2xl
               hover:scale-110
               transition duration-300
               z-40">

        +

    </a>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))

        <div
            x-data="{ show:true }"
            x-show="show"
            x-transition
            class="fixed
                   top-4 right-4 left-4
                   sm:left-auto
                   sm:right-6 sm:top-6
                   bg-green-600
                   text-white
                   px-5 sm:px-8
                   py-4
                   rounded-2xl
                   shadow-2xl
                   z-50
                   flex items-center justify-between
                   gap-3">

            <span class="break-words">
                {{ session('success') }}
            </span>

            <button
                type="button"
                @click="show=false"
                class="font-bold shrink-0">

                ✕

            </button>

        </div>

    @endif


    <!-- FOOTER -->
    <div class="mt-16 sm:mt-24 bg-white border-t">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-12">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 sm:gap-10">

                <!-- Brand -->
                <div>

                    <h2 class="text-2xl font-bold text-orange-600">
                        CampusConnect
                    </h2>

                    <p class="mt-4 text-gray-600 leading-relaxed">
                        Helping students find safe, verified and affordable
                        accommodation around their universities.
                    </p>

                </div>


                <!-- Accommodation -->
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


                <!-- Contact -->
                <div>

                    <h3 class="font-bold text-lg mb-4">
                        Contact
                    </h3>

                    <ul class="space-y-2 text-gray-600 break-words">

                        <li>📧 support@campusconnect.com</li>
                        <li>📞 +254 700 000 000</li>
                        <li>🌍 Kenya</li>

                    </ul>

                </div>

            </div>


            <div class="border-t mt-8 sm:mt-10 pt-5 sm:pt-6 text-center text-gray-500 text-sm sm:text-base">

                © {{ date('Y') }} CampusConnect. All Rights Reserved.

            </div>

        </div>

    </div>

</div>

</x-app-layout>