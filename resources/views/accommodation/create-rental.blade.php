<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-blue-50 via-sky-50 to-cyan-50 py-10">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="bg-gradient-to-r from-blue-600 to-cyan-500 p-8 text-white">

                <h1 class="text-4xl font-extrabold">
                    🏠 Post Off-Campus Rental
                </h1>

                <p class="mt-2 text-blue-100">
                    List your bedsitter, apartment or house.
                </p>

            </div>

            @if ($errors->any())

                <div class="m-6 bg-red-100 border border-red-300 text-red-700 rounded-xl p-5">

                    <ul class="list-disc ml-6">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                action="{{ route('rentals.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 space-y-8">

                @csrf

                <input type="hidden" name="listing_type" value="rental">

                {{-- PROPERTY TYPE --}}
                <div>

                    <label class="block font-bold mb-2">
                        Property Type
                    </label>

                    <select
                        name="property_type"
                        class="w-full rounded-xl border-gray-300"
                        required>

                        <option value="">Select Property Type</option>

                        <option value="bedsitter"
                            {{ old('property_type') == 'bedsitter' ? 'selected' : '' }}>
                            Bedsitter
                        </option>

                        <option value="single_room"
                            {{ old('property_type') == 'single_room' ? 'selected' : '' }}>
                            Single Room
                        </option>

                        <option value="one_bedroom"
                            {{ old('property_type') == 'one_bedroom' ? 'selected' : '' }}>
                            One Bedroom
                        </option>

                        <option value="two_bedroom"
                            {{ old('property_type') == 'two_bedroom' ? 'selected' : '' }}>
                            Two Bedroom
                        </option>

                        <option value="shared_room"
                            {{ old('property_type') == 'shared_room' ? 'selected' : '' }}>
                            Shared Room
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        Property Name
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full rounded-xl border-gray-300"
                        required>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-xl border-gray-300"
                        required>{{ old('description') }}</textarea>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-bold mb-2">
                            Available Units
                        </label>

                        <input
                            type="number"
                            name="available_spaces"
                            value="{{ old('available_spaces') }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="block font-bold mb-2">
                            Monthly Rent (KSh)
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price') }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        Area Near University
                    </label>

                    <select
                        name="location"
                        class="w-full rounded-xl border-gray-300"
                        required>

                        <option value="">Select Area</option>

                        @foreach($locations as $location)

                            <option
                                value="{{ $location->name }}"
                                {{ old('location') == $location->name ? 'selected' : '' }}>

                                {{ $location->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-bold mb-2">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="block font-bold mb-2">
                            WhatsApp Number
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-3">
                        Facilities
                    </label>

                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">

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

                            <label class="flex items-center gap-2">

                                <input
                                    type="checkbox"
                                    name="facilities[]"
                                    value="{{ $facility }}">

                                {{ $facility }}

                            </label>

                        @endforeach

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        Upload Photos
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        class="w-full rounded-xl border-gray-300">

                </div>

                <div class="flex gap-5">

                    <button
                        type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-bold">

                        📤 Publish Rental

                    </button>

                    <a
                        href="{{ route('rentals.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 px-8 py-4 rounded-xl font-bold">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>