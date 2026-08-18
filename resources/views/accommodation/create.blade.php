<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-6 sm:py-10">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden border border-orange-100">

            {{-- ========================================================= --}}
            {{-- HEADER --}}
            {{-- ========================================================= --}}

            <div class="bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-500 p-6 sm:p-8 lg:p-10 text-white">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold leading-tight">
                    🏠 Post Accommodation
                </h1>

                <p class="mt-2 text-orange-100 text-sm sm:text-base lg:text-lg">
                    Campus Hostel or Off-Campus Rental
                </p>

            </div>


            {{-- ========================================================= --}}
            {{-- ERRORS --}}
            {{-- ========================================================= --}}

            @if ($errors->any())

                <div class="mx-4 sm:mx-6 mt-6 bg-red-50 border border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                    <p class="font-bold mb-2">
                        Please fix the following errors:
                    </p>

                    <ul class="list-disc ml-5 space-y-1 text-sm sm:text-base">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- ========================================================= --}}
            {{-- FORM --}}
            {{-- ========================================================= --}}

            <form
                action="{{ route('accommodation.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-5 sm:p-7 lg:p-10 space-y-7 sm:space-y-8">

                @csrf


                {{-- ===================================================== --}}
                {{-- LISTING TYPE + PROPERTY TYPE --}}
                {{-- ===================================================== --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

                    <div>

                        <label
                            for="listing_type"
                            class="block font-bold text-gray-700 mb-2">

                            Listing Type

                        </label>

                        <select
                            id="listing_type"
                            name="listing_type"
                            onchange="changeForm()"
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                                   text-gray-700 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                            <option value="campus" {{ old('listing_type', 'campus') == 'campus' ? 'selected' : '' }}>
                                🏫 Campus Hostel
                            </option>

                            <option value="rental" {{ old('listing_type') == 'rental' ? 'selected' : '' }}>
                                🏠 Off Campus Rental
                            </option>

                        </select>

                    </div>


                    <div>

                        <label
                            for="property_type"
                            class="block font-bold text-gray-700 mb-2">

                            Property Type

                        </label>

                        <select
                            id="property_type"
                            name="property_type"
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                                   text-gray-700 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                            <option value="Hostel">
                                Hostel
                            </option>

                        </select>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- TITLE --}}
                {{-- ===================================================== --}}

                <div>

                    <label
                        for="title"
                        class="block font-bold text-gray-700 mb-2">

                        Accommodation Name

                    </label>

                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="e.g. Sunrise Student Hostel"
                        class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                               text-gray-700 placeholder-gray-400 shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition"
                        required>

                </div>


                {{-- ===================================================== --}}
                {{-- DESCRIPTION --}}
                {{-- ===================================================== --}}

                <div>

                    <label
                        for="description"
                        class="block font-bold text-gray-700 mb-2">

                        Description

                    </label>

                    <textarea
                        id="description"
                        rows="5"
                        name="description"
                        placeholder="Describe the accommodation, location, environment and anything students should know..."
                        class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                               text-gray-700 placeholder-gray-400 shadow-sm resize-y
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition">{{ old('description') }}</textarea>

                </div>


                {{-- ===================================================== --}}
                {{-- LOCATION --}}
                {{-- ===================================================== --}}

                <div>

                    <label
                        for="location"
                        class="block font-bold text-gray-700 mb-2">

                        Location

                    </label>

                    <input
                        type="text"
                        id="location"
                        name="location"
                        value="{{ old('location') }}"
                        placeholder="e.g. Kahawa, Nairobi"
                        class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                               text-gray-700 placeholder-gray-400 shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition"
                        required>

                </div>


                {{-- ===================================================== --}}
                {{-- CONTACTS --}}
                {{-- ===================================================== --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

                    <div>

                        <label
                            for="phone"
                            class="block font-bold text-gray-700 mb-2">

                            Phone Number

                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="+254 700 000 000"
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                                   text-gray-700 placeholder-gray-400 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>


                    <div>

                        <label
                            for="whatsapp"
                            class="block font-bold text-gray-700 mb-2">

                            WhatsApp Number

                        </label>

                        <input
                            type="text"
                            id="whatsapp"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="+254 700 000 000"
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                                   text-gray-700 placeholder-gray-400 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition">

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- SPACES + PRICE --}}
                {{-- ===================================================== --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8">

                    <div>

                        <label
                            for="available_spaces"
                            class="block font-bold text-gray-700 mb-2">

                            Available Spaces

                        </label>

                        <input
                            type="number"
                            id="available_spaces"
                            name="available_spaces"
                            value="{{ old('available_spaces') }}"
                            min="0"
                            placeholder="e.g. 10"
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                                   text-gray-700 placeholder-gray-400 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>


                    <div>

                        <label
                            for="price"
                            class="block font-bold text-gray-700 mb-2">

                            Monthly Rent

                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            placeholder="e.g. 5000"
                            class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white px-4 py-3.5 sm:py-4
                                   text-gray-700 placeholder-gray-400 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- IMAGES --}}
                {{-- ===================================================== --}}

                <div>

                    <label
                        for="images"
                        class="block font-bold text-gray-700 mb-2">

                        Upload Photos

                    </label>

                    <input
                        type="file"
                        id="images"
                        multiple
                        name="images[]"
                        accept="image/*"
                        class="w-full rounded-xl sm:rounded-2xl border-2 border-gray-300 bg-white
                               px-3 sm:px-4 py-3
                               text-sm text-gray-700 shadow-sm
                               file:mr-3 sm:file:mr-4
                               file:rounded-lg
                               file:border-0
                               file:bg-orange-100
                               file:px-3 sm:file:px-4
                               file:py-2
                               file:font-semibold
                               file:text-orange-700
                               hover:file:bg-orange-200
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition">

                    <p class="text-xs sm:text-sm text-gray-500 mt-2">
                        You can select multiple accommodation photos.
                    </p>

                </div>


                {{-- ===================================================== --}}
                {{-- FACILITIES --}}
                {{-- ===================================================== --}}

                <div
                    id="facility_section"
                    class="border-2 border-orange-100 rounded-2xl sm:rounded-3xl p-5 sm:p-6 bg-orange-50">

                    <label class="block font-bold text-gray-700 mb-4">

                        Facilities

                    </label>

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">

                        @foreach([
                            'WiFi',
                            'Water',
                            'Electricity',
                            'Parking',
                            'Security',
                            'CCTV',
                            'Hot Shower',
                            'Laundry',
                            'Kitchen',
                            'Balcony',
                            'Wardrobe'
                        ] as $facility)

                            <label
                                class="flex items-center gap-3
                                       bg-white border border-gray-200
                                       rounded-xl px-3 py-3
                                       cursor-pointer
                                       hover:border-orange-400
                                       transition">

                                <input
                                    type="checkbox"
                                    name="facilities[]"
                                    value="{{ $facility }}"
                                    {{ in_array($facility, old('facilities', [])) ? 'checked' : '' }}
                                    class="h-4 w-4 rounded border-2 border-gray-400 text-orange-600
                                           focus:ring-orange-500">

                                <span class="text-sm sm:text-base text-gray-700">
                                    {{ $facility }}
                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- BUTTONS --}}
                {{-- ===================================================== --}}

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-5 pt-2">

                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               inline-flex items-center justify-center
                               bg-orange-600 hover:bg-orange-700
                               text-white
                               px-6 sm:px-8
                               py-3.5 sm:py-4
                               rounded-xl
                               font-bold
                               shadow-lg
                               hover:shadow-xl
                               transition">

                        📤
                        <span class="ml-2">
                            Publish Accommodation
                        </span>

                    </button>


                    <a
                        href="{{ route('dashboard') }}"
                        class="w-full sm:w-auto
                               inline-flex items-center justify-center
                               bg-gray-200 hover:bg-gray-300
                               text-gray-800
                               px-6 sm:px-8
                               py-3.5 sm:py-4
                               rounded-xl
                               font-bold
                               transition">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- FORM SWITCHING SCRIPT --}}
{{-- ========================================================= --}}

<script>

function changeForm() {

    const listing = document.getElementById("listing_type");
    const property = document.getElementById("property_type");
    const facilities = document.getElementById("facility_section");

    if (!listing || !property || !facilities) {
        return;
    }

    if (listing.value === "campus") {

        property.innerHTML = `
            <option value="Hostel">Hostel</option>
        `;

        facilities.style.display = "none";

    } else {

        property.innerHTML = `
            <option value="Bedsitter">Bedsitter</option>
            <option value="Single Room">Single Room</option>
            <option value="Studio">Studio</option>
            <option value="One Bedroom">One Bedroom</option>
            <option value="Two Bedroom">Two Bedroom</option>
        `;

        facilities.style.display = "block";

    }

}

document.addEventListener("DOMContentLoaded", function () {
    changeForm();
});

</script>

</x-app-layout>