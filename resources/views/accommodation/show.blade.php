<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-8 py-12">

            <div class="flex flex-col lg:flex-row justify-between items-start gap-8">

                <div>

                    <div class="flex items-center gap-3">

                        @if($accommodation->verified)

                            <span class="bg-green-500 px-4 py-2 rounded-full font-bold">
                                ✅ Verified
                            </span>

                        @endif

                        @if($accommodation->featured)

                            <span class="bg-yellow-400 text-black px-4 py-2 rounded-full font-bold">
                                ⭐ Featured
                            </span>

                        @endif

                    </div>

                    <h1 class="text-5xl font-extrabold mt-6">

                        {{ $accommodation->title }}

                    </h1>

                    <p class="mt-5 text-xl text-orange-100">

                        📍 {{ $accommodation->location }}

                    </p>

                </div>

                <div class="bg-white rounded-3xl shadow-xl text-center text-gray-800 p-8 min-w-[280px]">

                    <p class="text-gray-500 font-semibold">

                        Monthly Rent

                    </p>

                    <h2 class="text-5xl font-extrabold text-orange-600 mt-3">

                        KSh {{ number_format($accommodation->price) }}

                    </h2>

                    <p class="text-gray-500 mt-2">

                        per month

                    </p>

                </div>

            </div>

        </div>

    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-8 py-12">

        <div class="grid lg:grid-cols-3 gap-10">

            <!-- LEFT SIDE -->
            <div class="lg:col-span-2">

                <!-- Images -->

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                    @if($accommodation->images->count())

                        <img
                            src="{{ asset('storage/'.$accommodation->images->first()->image_path) }}"
                            class="w-full h-[500px] object-cover">

                    @else

                        <div class="h-[500px] bg-orange-100 flex items-center justify-center text-8xl">

                            🏠

                        </div>

                    @endif

                </div>

                <!-- Gallery -->

                @if($accommodation->images->count() > 1)

                    <div class="grid grid-cols-4 gap-4 mt-6">

                        @foreach($accommodation->images as $image)

                            <img
                                src="{{ asset('storage/'.$image->image_path) }}"
                                class="h-28 w-full object-cover rounded-2xl shadow hover:scale-105 transition">

                        @endforeach

                    </div>

                @endif

                <!-- Description -->

                <div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

                    <h2 class="text-3xl font-bold text-orange-700">

                        About this Accommodation

                    </h2>

                    <p class="text-gray-600 leading-8 mt-6">

                        {{ $accommodation->description }}

                    </p>

                </div>

                <!-- Facilities -->

                <div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

                    <h2 class="text-3xl font-bold text-orange-700">

                        Facilities

                    </h2>

                    <div class="grid md:grid-cols-2 gap-4 mt-6">
                                                @forelse($accommodation->facilities as $facility)

                            <div class="flex items-center gap-3 bg-orange-50 rounded-2xl p-4">

                                <div class="text-2xl">
                                    ✅
                                </div>

                                <span class="font-semibold text-gray-700">

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

                <!-- Location -->

                <div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

                    <h2 class="text-3xl font-bold text-orange-700">

                        Location

                    </h2>

                    <div class="mt-6 rounded-3xl overflow-hidden">

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

            <!-- RIGHT SIDEBAR -->

            <div>

         <!-- Contact Card -->

<div class="bg-white rounded-3xl shadow-xl p-8 sticky top-6">

    <h2 class="text-2xl font-bold text-orange-700">
        Contact Landlord
    </h2>

    @if($hasPass)

        <div class="mt-8 space-y-5">

            <div>
                <p class="text-gray-500">Phone</p>

                <h3 class="font-bold text-xl">
                    {{ $accommodation->phone }}
                </h3>
            </div>

            @if($accommodation->whatsapp)

                <div>
                    <p class="text-gray-500">WhatsApp</p>

                    <h3 class="font-bold text-xl">
                        {{ $accommodation->whatsapp }}
                    </h3>
                </div>

            @endif

            <a href="tel:{{ $accommodation->phone }}"
               class="block w-full bg-orange-600 hover:bg-orange-700 text-white text-center py-4 rounded-2xl font-bold">

                📞 Call Landlord

            </a>

            @if($accommodation->whatsapp)

                <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$accommodation->whatsapp) }}"
                   target="_blank"
                   class="block w-full bg-green-600 hover:bg-green-700 text-white text-center py-4 rounded-2xl font-bold">

                    💬 WhatsApp

                </a>

            @endif

        </div>

    @else

        <div class="mt-8 text-center">

            <div class="text-6xl mb-4">
                🔒
            </div>

            <h3 class="text-2xl font-bold">
                Contacts Locked
            </h3>

            <p class="text-gray-600 mt-4">
                Buy the CampusConnect Accommodation Pass to unlock landlord phone numbers and WhatsApp contacts.
            </p>

            <a href="{{ route('pass.index') }}"
               class="mt-8 block bg-orange-600 hover:bg-orange-700 text-white py-4 rounded-2xl font-bold">

                Buy Pass - KSh 199

            </a>

        </div>

    @endif

    <form action="{{ route('accommodation.save', $accommodation) }}"
          method="POST"
          class="mt-6">

        @csrf

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-2xl font-bold">

            ❤️ Save Accommodation

        </button>

    </form>

</div>

                <!-- Premium Pass -->

                <div class="bg-gradient-to-r from-blue-700 to-indigo-700 rounded-3xl shadow-xl p-8 text-white mt-8">

                    <h2 class="text-3xl font-bold">

                        🚀 Premium Pass

                    </h2>

                    <p class="mt-4 text-blue-100">

                        Buy the CampusConnect Premium Pass to unlock landlord contacts,
                        WhatsApp numbers, priority listings and exclusive accommodation offers.

                    </p>

                    <div class="mt-8 text-center">

                        <div class="text-5xl font-extrabold">

                            KSh 199

                        </div>

                        <p class="text-blue-200 mt-2">

                            One-time payment

                        </p>

                    </div>

                    <a href="{{ route('pass.index') }}"
                       class="mt-8 block bg-white text-blue-700 font-bold text-center py-4 rounded-2xl hover:bg-gray-100 transition">

                        Buy Premium Pass

                    </a>

                </div>

            </div>

        </div>

        <!-- Reviews -->

        <div class="bg-white rounded-3xl shadow-xl mt-12 p-10">

            <h2 class="text-3xl font-bold text-orange-700">

                ⭐ Reviews

            </h2>

            @forelse($accommodation->reviews as $review)

                <div class="border-b py-6">

                    <div class="flex justify-between">

                        <h3 class="font-bold">

                            {{ $review->user->name }}

                        </h3>

                        <span class="text-yellow-500">

                            ⭐ {{ $review->rating }}/5

                        </span>

                    </div>

                    <p class="text-gray-600 mt-3">

                        {{ $review->review }}

                    </p>

                </div>

            @empty

                <div class="text-center py-16">

                    <div class="text-7xl">

                        ⭐

                    </div>

                    <h3 class="text-2xl font-bold mt-5">

                        No Reviews Yet

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Be the first student to review this accommodation.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>