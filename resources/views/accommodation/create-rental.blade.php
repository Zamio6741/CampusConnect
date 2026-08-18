<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-sky-50 to-cyan-50 py-6 sm:py-10 lg:py-12">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- CARD --}}

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl border border-gray-200 overflow-hidden">

            {{-- HEADER --}}

            <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-5 sm:p-8 lg:p-10 text-white">

                <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight">
                    🏠 Post Off-Campus Rental
                </h1>

                <p class="mt-2 text-blue-100 text-sm sm:text-base lg:text-lg">
                    List your bedsitter, apartment or house.
                </p>

            </div>


            {{-- VALIDATION ERRORS --}}

            @if ($errors->any())

                <div class="mx-4 sm:mx-6 mt-5 sm:mt-6 bg-red-50 border border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                    <h3 class="font-bold mb-2">
                        Please correct the following:
                    </h3>

                    <ul class="list-disc ml-5 sm:ml-6 space-y-1 text-sm sm:text-base">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FORM --}}

            <form
                action="{{ route('rentals.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-5 sm:p-8 lg:p-10 space-y-6 sm:space-y-8">

                @csrf

                <input type="hidden" name="listing_type" value="rental">


                {{-- PROPERTY TYPE --}}

                <div>

                    <label
                        for="property_type"
                        class="block font-bold text-gray-800 mb-2">

                        Property Type

                    </label>

                    <select
                        id="property_type"
                        name="property_type"
                        required
                        class="w-full rounded-xl border-2 border-gray-300 bg-white
                               px-4 py-3.5 sm:px-5 sm:py-4
                               text-sm sm:text-base text-gray-800
                               shadow-sm
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                               focus:outline-none transition">

                        <option value="">
                            Select Property Type
                        </option>

                        <option value="bedsitter"
                            @selected(old('property_type') == 'bedsitter')>
                            Bedsitter
                        </option>

                        <option value="single_room"
                            @selected(old('property_type') == 'single_room')>
                            Single Room
                        </option>

                        <option value="one_bedroom"
                            @selected(old('property_type') == 'one_bedroom')>
                            One Bedroom
                        </option>

                        <option value="two_bedroom"
                            @selected(old('property_type') == 'two_bedroom')>
                            Two Bedroom
                        </option>

                        <option value="shared_room"
                            @selected(old('property_type') == 'shared_room')>
                            Shared Room
                        </option>

                    </select>

                </div>


                {{-- PROPERTY NAME --}}

                <div>

                    <label
                        for="title"
                        class="block font-bold text-gray-800 mb-2">

                        Property Name

                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Example: Sunrise Apartments"
                        required
                        class="w-full rounded-xl border-2 border-gray-300 bg-white
                               px-4 py-3.5 sm:px-5 sm:py-4
                               text-sm sm:text-base text-gray-800
                               shadow-sm
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                               focus:outline-none transition">

                </div>


                {{-- DESCRIPTION --}}

                <div>

                    <label
                        for="description"
                        class="block font-bold text-gray-800 mb-2">

                        Description

                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Describe the property, rooms, security, surroundings and other important details..."
                        required
                        class="w-full rounded-xl border-2 border-gray-300 bg-white
                               px-4 py-3.5 sm:px-5 sm:py-4
                               text-sm sm:text-base text-gray-800
                               shadow-sm resize-y
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                               focus:outline-none transition">{{ old('description') }}</textarea>

                </div>


                {{-- AVAILABLE UNITS + RENT --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label
                            for="available_spaces"
                            class="block font-bold text-gray-800 mb-2">

                            Available Units

                        </label>

                        <input
                            id="available_spaces"
                            type="number"
                            name="available_spaces"
                            value="{{ old('available_spaces') }}"
                            min="1"
                            placeholder="Example: 10"
                            required
                            class="w-full rounded-xl border-2 border-gray-300 bg-white
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base text-gray-800
                                   shadow-sm
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                                   focus:outline-none transition">

                    </div>


                    <div>

                        <label
                            for="price"
                            class="block font-bold text-gray-800 mb-2">

                            Monthly Rent (KSh)

                        </label>

                        <input
                            id="price"
                            type="number"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            placeholder="Example: 6000"
                            required
                            class="w-full rounded-xl border-2 border-gray-300 bg-white
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base text-gray-800
                                   shadow-sm
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                                   focus:outline-none transition">

                    </div>

                </div>


                {{-- LOCATION --}}

                <div>

                    <label
                        for="location"
                        class="block font-bold text-gray-800 mb-2">

                        Area Near University

                    </label>

                    <select
                        id="location"
                        name="location"
                        required
                        class="w-full rounded-xl border-2 border-gray-300 bg-white
                               px-4 py-3.5 sm:px-5 sm:py-4
                               text-sm sm:text-base text-gray-800
                               shadow-sm
                               focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                               focus:outline-none transition">

                        <option value="">
                            Select Area
                        </option>

                        @foreach($locations as $location)

                            <option
                                value="{{ $location->name }}"
                                @selected(old('location') == $location->name)>

                                {{ $location->name }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- CONTACTS --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label
                            for="phone"
                            class="block font-bold text-gray-800 mb-2">

                            Phone Number

                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="+254712345678"
                            autocomplete="tel"
                            required
                            class="w-full rounded-xl border-2 border-gray-300 bg-white
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base text-gray-800
                                   shadow-sm
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                                   focus:outline-none transition">

                    </div>


                    <div>

                        <label
                            for="whatsapp"
                            class="block font-bold text-gray-800 mb-2">

                            WhatsApp Number

                        </label>

                        <input
                            id="whatsapp"
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="+254712345678"
                            autocomplete="tel"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base text-gray-800
                                   shadow-sm
                                   focus:border-blue-500 focus:ring-2 focus:ring-blue-200
                                   focus:outline-none transition">

                    </div>

                </div>


                {{-- FACILITIES --}}

                <div>

                    <label class="block font-bold text-gray-800 mb-3">

                        Facilities

                    </label>

                    <div
                        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3">

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
                                       bg-gray-50 hover:bg-blue-50
                                       border-2 border-gray-200
                                       rounded-xl
                                       px-4 py-3
                                       cursor-pointer
                                       transition">

                                <input
                                    type="checkbox"
                                    name="facilities[]"
                                    value="{{ $facility }}"
                                    @checked(in_array($facility, old('facilities', []))) 
                                    class="h-5 w-5 rounded border-2 border-gray-400
                                           text-blue-600
                                           focus:ring-blue-500">

                                <span class="text-sm sm:text-base font-medium text-gray-700">
                                    {{ $facility }}
                                </span>

                            </label>

                        @endforeach

                    </div>

                </div>


                {{-- PHOTOS --}}

                <div>

                    <label
                        for="images"
                        class="block font-bold text-gray-800 mb-2">

                        Upload Photos

                    </label>

                    <div
                        class="rounded-2xl border-2 border-dashed border-blue-300
                               bg-blue-50 p-4 sm:p-6">

                        <input
                            id="images"
                            type="file"
                            name="images[]"
                            multiple
                            accept="image/*"
                            class="block w-full
                                   text-sm sm:text-base
                                   text-gray-700
                                   bg-white
                                   border-2 border-gray-300
                                   rounded-xl
                                   p-2 sm:p-3
                                   cursor-pointer
                                   focus:outline-none
                                   focus:border-blue-500
                                   focus:ring-2 focus:ring-blue-200">

                    </div>

                    <p class="text-gray-500 mt-2 text-sm">
                        You can select multiple property photos at once.
                    </p>

                </div>


                {{-- BUTTONS --}}

                <div
                    class="flex flex-col-reverse sm:flex-row
                           gap-3 sm:gap-5
                           pt-3">

                    <a
                        href="{{ route('rentals.index') }}"
                        class="w-full sm:w-auto
                               inline-flex items-center justify-center
                               bg-gray-200 hover:bg-gray-300
                               text-gray-800
                               px-8 py-3.5 sm:py-4
                               rounded-xl
                               font-bold
                               border border-gray-300
                               shadow-sm
                               transition">

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="w-full sm:w-auto
                               inline-flex items-center justify-center
                               bg-blue-600 hover:bg-blue-700
                               text-white
                               px-8 py-3.5 sm:py-4
                               rounded-xl
                               font-bold
                               shadow-lg
                               transition">

                        📤 Publish Rental

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>