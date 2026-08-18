<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    {{-- ========================================================= --}}
    {{-- SUCCESS MESSAGE --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-5 sm:pt-6">

            <div class="bg-green-100 border-2 border-green-300 text-green-700 px-4 sm:px-6 py-4 rounded-2xl shadow-sm">
                {{ session('success') }}
            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- HERO SECTION --}}
    {{-- ========================================================= --}}

    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10 lg:py-12">

            <div class="flex flex-col lg:flex-row justify-between items-start gap-6 lg:gap-8">

                <div class="w-full min-w-0">

                    <div class="flex flex-wrap items-center gap-2 sm:gap-3">

                        @if($accommodation->verified)

                            <span class="bg-green-500 px-3 sm:px-4 py-2 rounded-full font-bold text-sm sm:text-base">
                                ✅ Verified
                            </span>

                        @endif

                        @if($accommodation->featured)

                            <span class="bg-yellow-400 text-black px-3 sm:px-4 py-2 rounded-full font-bold text-sm sm:text-base">
                                ⭐ Featured
                            </span>

                        @endif

                    </div>

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold mt-5 sm:mt-6 leading-tight break-words">

                        {{ $accommodation->title }}

                    </h1>

                    <p class="mt-3 sm:mt-5 text-base sm:text-xl text-orange-100 break-words">

                        📍 {{ $accommodation->location }}

                    </p>

                </div>


                {{-- Rent Card --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl text-center text-gray-800 p-5 sm:p-7 lg:p-8 w-full lg:w-auto lg:min-w-[280px]">

                    <p class="text-gray-500 font-semibold">
                        Monthly Rent
                    </p>

                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-orange-600 mt-2 sm:mt-3">

                        KSh {{ number_format($accommodation->price) }}

                    </h2>

                    <p class="text-gray-500 mt-2">
                        per month
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-7 sm:py-10 lg:py-12">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 lg:gap-10">


            {{-- ================================================= --}}
            {{-- LEFT SIDE --}}
            {{-- ================================================= --}}

            <div class="lg:col-span-2 min-w-0">


                {{-- ================================================= --}}
                {{-- MAIN IMAGE --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden border border-orange-100">

                    @if($accommodation->images->count())

                        <img
                            src="{{ asset('storage/'.$accommodation->images->first()->image_path) }}"
                            class="w-full h-64 sm:h-80 lg:h-[500px] object-cover"
                            alt="{{ $accommodation->title }}">

                    @else

                        <div class="h-64 sm:h-80 lg:h-[500px] bg-orange-100 flex items-center justify-center text-6xl sm:text-7xl lg:text-8xl">
                            🏠
                        </div>

                    @endif

                </div>


                {{-- ================================================= --}}
                {{-- GALLERY --}}
                {{-- ================================================= --}}

                @if($accommodation->images->count() > 1)

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 sm:gap-4 mt-4 sm:mt-6">

                        @foreach($accommodation->images as $image)

                            <img
                                src="{{ asset('storage/'.$image->image_path) }}"
                                class="h-24 sm:h-28 w-full object-cover rounded-xl sm:rounded-2xl shadow border border-orange-100 hover:scale-105 transition"
                                alt="Accommodation image">

                        @endforeach

                    </div>

                @endif


                {{-- ================================================= --}}
                {{-- DESCRIPTION --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 mt-6 sm:mt-10 p-5 sm:p-7 lg:p-8">

                    <h2 class="text-2xl sm:text-3xl font-bold text-orange-700">
                        About this Accommodation
                    </h2>

                    <p class="text-gray-600 leading-7 sm:leading-8 mt-4 sm:mt-6 break-words">
                        {{ $accommodation->description }}
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- FACILITIES --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 mt-6 sm:mt-10 p-5 sm:p-7 lg:p-8">

                    <h2 class="text-2xl sm:text-3xl font-bold text-orange-700">
                        Facilities
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mt-5 sm:mt-6">

                        @forelse($accommodation->facilities as $facility)

                            <div class="flex items-center gap-3 bg-orange-50 border border-orange-200 rounded-2xl p-4 min-w-0">

                                <div class="text-2xl shrink-0">
                                    ✅
                                </div>

                                <span class="font-semibold text-gray-700 break-words">
                                    {{ $facility->name }}
                                </span>

                            </div>

                        @empty

                            <p class="text-gray-500">
                                No facilities have been listed.
                            </p>

                        @endforelse

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- LOCATION --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 mt-6 sm:mt-10 p-5 sm:p-7 lg:p-8">

                    <h2 class="text-2xl sm:text-3xl font-bold text-orange-700">
                        Location
                    </h2>

                    <div class="mt-5 sm:mt-6 rounded-2xl sm:rounded-3xl overflow-hidden border-2 border-slate-200">

                        <iframe
                            width="100%"
                            height="400"
                            frameborder="0"
                            style="border:0"
                            loading="lazy"
                            allowfullscreen
                            src="https://maps.google.com/maps?q={{ urlencode($accommodation->location) }}&output=embed">
                        </iframe>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- RIGHT SIDEBAR --}}
            {{-- ================================================= --}}

            <div class="min-w-0">


                {{-- ================================================= --}}
                {{-- CONTACT / BOOKING CARD --}}
                {{-- ================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 p-5 sm:p-7 lg:p-8 lg:sticky lg:top-6">

                    <h2 class="text-xl sm:text-2xl font-bold text-orange-700">
                        Contact Landlord
                    </h2>


                    {{-- ================================================= --}}
                    {{-- CONTACTS UNLOCKED --}}
                    {{-- ================================================= --}}

                    @if($hasPass)

                        <div class="mt-6 sm:mt-8 space-y-5">

                            <div class="border border-slate-200 rounded-xl p-4">

                                <p class="text-gray-500 text-sm">
                                    Phone
                                </p>

                                <h3 class="font-bold text-lg sm:text-xl mt-1 break-all">
                                    {{ $accommodation->phone }}
                                </h3>

                            </div>


                            @if($accommodation->whatsapp)

                                <div class="border border-slate-200 rounded-xl p-4">

                                    <p class="text-gray-500 text-sm">
                                        WhatsApp
                                    </p>

                                    <h3 class="font-bold text-lg sm:text-xl mt-1 break-all">
                                        {{ $accommodation->whatsapp }}
                                    </h3>

                                </div>

                            @endif


                            <a
                                href="tel:{{ $accommodation->phone }}"
                                class="block w-full bg-orange-600 hover:bg-orange-700 text-white text-center py-3.5 sm:py-4 rounded-2xl font-bold transition">

                                📞 Call Landlord

                            </a>


                            @if($accommodation->whatsapp)

                                <a
                                    href="https://wa.me/{{ preg_replace('/[^0-9]/','',$accommodation->whatsapp) }}"
                                    target="_blank"
                                    class="block w-full bg-green-600 hover:bg-green-700 text-white text-center py-3.5 sm:py-4 rounded-2xl font-bold transition">

                                    💬 WhatsApp

                                </a>

                            @endif

                        </div>


                    {{-- ================================================= --}}
                    {{-- CONTACTS LOCKED --}}
                    {{-- ================================================= --}}

                    @else

                        <div class="mt-6 sm:mt-8 text-center">

                            <div class="text-5xl sm:text-6xl mb-4">
                                🔒
                            </div>

                            <h3 class="text-xl sm:text-2xl font-bold">
                                Contacts Locked
                            </h3>

                            <p class="text-gray-600 mt-4 leading-6 sm:leading-7 text-sm sm:text-base">
                                Buy the CampusConnect Accommodation Pass to unlock landlord phone numbers and WhatsApp contacts.
                            </p>

                            <a
                                href="{{ route('pass.index') }}"
                                class="mt-6 sm:mt-8 block bg-orange-600 hover:bg-orange-700 text-white py-3.5 sm:py-4 rounded-2xl font-bold transition">

                                Buy Pass - KSh 199

                            </a>

                        </div>

                    @endif


                    {{-- ================================================= --}}
                    {{-- SAVE ACCOMMODATION --}}
                    {{-- ================================================= --}}

                    <form
                        action="{{ route('accommodation.save', $accommodation) }}"
                        method="POST"
                        class="mt-6">

                        @csrf

                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3.5 sm:py-4 rounded-2xl font-bold transition">

                            ❤️ Save Accommodation

                        </button>

                    </form>


                    <hr class="my-7 sm:my-8 border-slate-200">


                    {{-- ================================================= --}}
                    {{-- BOOKING FORM --}}
                    {{-- ================================================= --}}

                    <h3 class="text-xl font-bold text-orange-700 mb-4">
                        📩 Book this Accommodation
                    </h3>


                    <form
                        action="{{ route('bookings.store', $accommodation) }}"
                        method="POST"
                        class="space-y-1">

                        @csrf


                        {{-- Move-in Date --}}

                        <div>

                            <label
                                for="move_in_date"
                                class="font-semibold block mb-2 text-gray-700">

                                Preferred Move-in Date

                            </label>

                            <input
                                id="move_in_date"
                                type="date"
                                name="move_in_date"
                                required
                                class="w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm
                                       focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                       outline-none transition">

                        </div>


                        {{-- Message --}}

                        <div class="mt-4">

                            <label
                                for="booking_message"
                                class="font-semibold block mb-2 text-gray-700">

                                Message to Landlord

                            </label>

                            <textarea
                                id="booking_message"
                                name="message"
                                rows="4"
                                class="w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm
                                       focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                       outline-none transition resize-y"
                                placeholder="Introduce yourself..."></textarea>

                        </div>


                        <button
                            type="submit"
                            class="w-full mt-5 bg-green-600 hover:bg-green-700 text-white py-3.5 sm:py-4 rounded-2xl font-bold transition">

                            📩 Send Booking Request

                        </button>

                    </form>

                </div>


                {{-- ================================================= --}}
                {{-- PREMIUM PASS --}}
                {{-- ================================================= --}}

                <div class="bg-gradient-to-r from-blue-700 to-indigo-700 rounded-2xl sm:rounded-3xl shadow-xl p-5 sm:p-7 lg:p-8 text-white mt-6 sm:mt-8">

                    <h2 class="text-2xl sm:text-3xl font-bold">
                        🚀 Premium Pass
                    </h2>

                    <p class="mt-3 sm:mt-4 text-blue-100 leading-6 sm:leading-7">
                        Buy the CampusConnect Premium Pass to unlock landlord contacts,
                        WhatsApp numbers, priority listings and exclusive accommodation offers.
                    </p>

                    <div class="mt-6 sm:mt-8 text-center">

                        <div class="text-4xl sm:text-5xl font-extrabold">
                            KSh 199
                        </div>

                        <p class="text-blue-200 mt-2">
                            One-time payment
                        </p>

                    </div>

                    <a
                        href="{{ route('pass.index') }}"
                        class="mt-6 sm:mt-8 block bg-white text-blue-700 font-bold text-center py-3.5 sm:py-4 rounded-2xl hover:bg-gray-100 transition">

                        Buy Premium Pass

                    </a>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- REVIEWS --}}
        {{-- ========================================================= --}}

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 mt-8 sm:mt-12 p-5 sm:p-7 lg:p-10">

            <h2 class="text-2xl sm:text-3xl font-bold text-orange-700">
                ⭐ Reviews
            </h2>


            @forelse($accommodation->reviews as $review)

                <div class="border-b border-slate-200 py-5 sm:py-6 last:border-b-0">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">

                        <h3 class="font-bold break-words">
                            {{ $review->user->name }}
                        </h3>

                        <span class="text-yellow-500 shrink-0">
                            ⭐ {{ $review->rating }}/5
                        </span>

                    </div>

                    <p class="text-gray-600 mt-3 leading-6 sm:leading-7 break-words">
                        {{ $review->review }}
                    </p>

                </div>

            @empty

                <div class="text-center py-10 sm:py-16">

                    <div class="text-6xl sm:text-7xl">
                        ⭐
                    </div>

                    <h3 class="text-xl sm:text-2xl font-bold mt-4 sm:mt-5">
                        No Reviews Yet
                    </h3>

                    <p class="text-gray-500 mt-2 text-sm sm:text-base">
                        Be the first student to review this accommodation.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>