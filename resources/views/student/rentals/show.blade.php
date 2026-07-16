<x-app-layout>

<div class="min-h-screen bg-slate-100">

    {{-- Hero Image --}}
    <div class="max-w-7xl mx-auto pt-10 px-6">

        @if($accommodation->photos->count())

            <img
                src="{{ asset('storage/'.$accommodation->photos->first()->image_path) }}"
                class="w-full h-[450px] object-cover rounded-3xl shadow-xl">

        @else

            <div class="h-[450px] bg-gray-200 rounded-3xl flex items-center justify-center text-8xl">
                🏠
            </div>

        @endif

    </div>

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="grid lg:grid-cols-3 gap-10">

            {{-- LEFT --}}
            <div class="lg:col-span-2">

                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <div class="flex justify-between items-start">

                        <div>

                            <h1 class="text-4xl font-extrabold text-slate-800">
                                {{ $accommodation->title }}
                            </h1>

                            <p class="text-gray-500 mt-2">
                                📍 {{ $accommodation->location }}
                            </p>

                        </div>

                        @if($accommodation->verified)

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold">
                                ✅ Verified
                            </span>

                        @endif

                    </div>

                    <div class="mt-8">

                        <h2 class="text-2xl font-bold mb-3">
                            Description
                        </h2>

                        <p class="text-gray-700 leading-8">
                            {{ $accommodation->description }}
                        </p>

                    </div>

                    <div class="mt-10">

                        <h2 class="text-2xl font-bold mb-4">
                            Facilities
                        </h2>

                        <div class="grid md:grid-cols-2 gap-3">

                            @forelse($accommodation->facilities as $facility)

                                <div class="bg-orange-50 border border-orange-200 rounded-xl px-4 py-3">

                                    ✅ {{ $facility->name }}

                                </div>

                            @empty

                                <p class="text-gray-500">
                                    No facilities listed.
                                </p>

                            @endforelse

                        </div>

                    </div>

                </div>

            </div>
                        {{-- RIGHT SIDEBAR --}}
            <div>

                <div class="bg-white rounded-3xl shadow-lg p-8 sticky top-6">

                    <h2 class="text-4xl font-extrabold text-orange-600">

                        KSh {{ number_format($accommodation->price) }}

                    </h2>

                    <p class="text-gray-500 mb-8">
                        Per Month
                    </p>

                    <div class="space-y-5">

                        <div class="flex justify-between">

                            <span class="font-semibold">
                                Property Type
                            </span>

                            <span>
                                {{ ucwords(str_replace('_',' ',$accommodation->property_type)) }}
                            </span>

                        </div>

                        <hr>

                        <div class="flex justify-between">

                            <span class="font-semibold">
                                University
                            </span>

                            <span>
                                {{ $accommodation->university->name ?? '-' }}
                            </span>

                        </div>

                        <hr>

                        <div class="flex justify-between">

                            <span class="font-semibold">
                                Nearby Area
                            </span>

                            <span>
                                {{ $accommodation->nearbyArea->name ?? '-' }}
                            </span>

                        </div>

                        <hr>

                        <div class="flex justify-between">

                            <span class="font-semibold">
                                Phone
                            </span>

                            <span>
                                {{ $accommodation->phone }}
                            </span>

                        </div>

                    </div>

                    <div class="mt-8">

    {{-- Booking Card --}}
    <div class="bg-orange-50 border border-orange-200 rounded-2xl p-5 mb-6">

        <h3 class="text-xl font-bold mb-2">
            📅 Schedule a Viewing
        </h3>

        <p class="text-gray-600 text-sm mb-4">
            Interested in this property?
            Request a viewing directly from the landlord.
        </p>

        <a href="{{ route('bookings.create', $accommodation) }}"
           class="block w-full text-center bg-orange-600 hover:bg-orange-700 text-white font-bold py-3 rounded-xl">

            Request Viewing

        </a>

    </div>

    <div class="space-y-4">

                        @if($accommodation->whatsapp)

                            <a
                                href="https://wa.me/{{ preg_replace('/[^0-9]/','',$accommodation->whatsapp) }}"
                                target="_blank"
                                class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-4 rounded-xl">

                                💬 Chat on WhatsApp

                            </a>

                        @endif

                        <a
                            href="tel:{{ $accommodation->phone }}"
                            class="block w-full text-center bg-sky-600 hover:bg-sky-700 text-white font-bold py-4 rounded-xl">

                            📞 Call Landlord

                        </a>

                        <button
                            class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 rounded-xl">

                            📅 Book Viewing

                        </button>

                      <a
    href="{{ route('browse.rentals') }}"
    class="block text-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-4 rounded-xl">

    ← Back to Rentals

</a>

</div>   

</div>  

</div>   

            </div>

        </div>

        {{-- PHOTO GALLERY --}}
        @if($accommodation->photos->count() > 1)

            <div class="mt-12">

                <h2 class="text-3xl font-bold mb-6">
                    More Photos
                </h2>

                <div class="grid md:grid-cols-4 gap-5">

                    @foreach($accommodation->photos as $photo)

                        <img
                            src="{{ asset('storage/'.$photo->image_path) }}"
                            class="h-48 w-full object-cover rounded-2xl shadow-md hover:scale-105 transition">

                    @endforeach

                </div>

            </div>

        @endif

    </div>

</div>

</x-app-layout>
@if(session('success'))
    <div class="max-w-7xl mx-auto mt-6 px-6">
        <div class="bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl shadow">
            ✅ {{ session('success') }}
        </div>
    </div>
@endif