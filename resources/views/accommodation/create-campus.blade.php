<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-6 sm:py-10">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r from-orange-600 to-amber-500 text-white p-5 sm:p-8">

                <h1 class="text-3xl sm:text-4xl font-bold leading-tight">
                    🏫 Post Campus Hostel
                </h1>

                <p class="mt-2 text-orange-100 text-sm sm:text-base">
                    Create a university hostel listing.
                </p>

            </div>

            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())

                <div class="mx-4 sm:mx-6 mt-5 bg-red-50 border border-red-300 text-red-700 rounded-xl p-4 sm:p-5">

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

            {{-- FORM --}}
            <form
                action="{{ route('campus.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-5 sm:p-8 space-y-6 sm:space-y-8">

                @csrf

                {{-- Hidden Values --}}
                <input
                    type="hidden"
                    name="listing_type"
                    value="campus">

                <input
                    type="hidden"
                    name="property_type"
                    value="hostel">


                {{-- HOSTEL NAME --}}
                <div>

                    <label
                        for="title"
                        class="font-bold block mb-2 text-gray-700">

                        Hostel Name

                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Enter hostel name"
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                               text-gray-800 placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition"
                        required>

                </div>


                {{-- DESCRIPTION --}}
                <div>

                    <label
                        for="description"
                        class="font-bold block mb-2 text-gray-700">

                        Description

                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Describe the hostel, rooms, environment and other important details..."
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                               text-gray-800 placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition
                               resize-y"
                        required>{{ old('description') }}</textarea>

                </div>


                {{-- SPACES + PRICE --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label
                            for="available_spaces"
                            class="font-bold block mb-2 text-gray-700">

                            Available Spaces

                        </label>

                        <input
                            id="available_spaces"
                            type="number"
                            name="available_spaces"
                            value="{{ old('available_spaces') }}"
                            min="1"
                            placeholder="e.g. 20"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                                   text-gray-800 placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>


                    <div>

                        <label
                            for="price"
                            class="font-bold block mb-2 text-gray-700">

                            Monthly Fee

                        </label>

                        <input
                            id="price"
                            type="number"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            placeholder="e.g. 5000"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                                   text-gray-800 placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>

                </div>


                {{-- LOCATION --}}
                <div>

                    <label
                        for="location"
                        class="font-bold block mb-2 text-gray-700">

                        Hostel Location

                    </label>

                    <input
                        id="location"
                        type="text"
                        name="location"
                        value="{{ old('location') }}"
                        placeholder="e.g. Near University Gate"
                        class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                               text-gray-800 placeholder-gray-400
                               shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition"
                        required>

                </div>


                {{-- CONTACTS --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>

                        <label
                            for="phone"
                            class="font-bold block mb-2 text-gray-700">

                            Phone Number

                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            placeholder="+254 712 345 678"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                                   text-gray-800 placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>


                    <div>

                        <label
                            for="whatsapp"
                            class="font-bold block mb-2 text-gray-700">

                            WhatsApp

                        </label>

                        <input
                            id="whatsapp"
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="+254 712 345 678"
                            class="w-full rounded-xl border border-gray-300 bg-white px-4 py-3
                                   text-gray-800 placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition">

                    </div>

                </div>


                {{-- PHOTOS --}}
                <div>

                    <label
                        for="images"
                        class="font-bold block mb-2 text-gray-700">

                        Hostel Photos

                    </label>

                    <input
                        id="images"
                        type="file"
                        name="images[]"
                        multiple
                        accept="image/*"
                        class="w-full rounded-xl border border-gray-300 bg-white
                               px-3 py-3 text-gray-700
                               shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition">

                    <p class="text-sm text-gray-500 mt-2">
                        You can select multiple photos of the hostel.
                    </p>

                </div>


                {{-- ACTIONS --}}
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 pt-2">

                    <button
                        type="submit"
                        class="w-full sm:w-auto inline-flex items-center justify-center
                               bg-orange-600 hover:bg-orange-700
                               text-white
                               px-8 py-4
                               rounded-xl
                               font-bold
                               shadow-lg
                               hover:shadow-xl
                               transition">

                        📤 Publish Hostel

                    </button>


                    <a
                        href="{{ route('campus.index') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center
                               bg-gray-200 hover:bg-gray-300
                               text-gray-800
                               px-8 py-4
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

</x-app-layout>