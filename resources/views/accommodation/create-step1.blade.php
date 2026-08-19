<x-landlord-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-6 sm:py-10 lg:py-12">

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}

        <div class="text-center mb-7 sm:mb-10">

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-orange-600 leading-tight">
                Create Rental Listing
            </h1>

            <p class="text-gray-500 mt-3 text-sm sm:text-base lg:text-lg">
                Step 1 of 4 • Property Details
            </p>

        </div>


        {{-- PROGRESS BAR --}}

        <div class="w-full bg-gray-200 rounded-full h-2.5 sm:h-3 mb-7 sm:mb-10 overflow-hidden">

            <div
                class="bg-orange-500 h-full rounded-full"
                style="width:25%">
            </div>

        </div>


        {{-- CARD --}}

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-gray-200 overflow-hidden">

            <div class="p-5 sm:p-8 lg:p-10">

                {{-- VALIDATION ERRORS --}}

                @if ($errors->any())

                    <div class="mb-7 sm:mb-8 bg-red-50 border border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                        <h3 class="font-bold mb-2">
                            Please correct the following:
                        </h3>

                        <ul class="list-disc list-inside space-y-1 text-sm sm:text-base">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('rental.step1.store') }}"
                    method="POST"
                    class="space-y-7 sm:space-y-8">

                    @csrf


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
                            class="w-full
                                   rounded-xl
                                   border-2 border-gray-300
                                   bg-white
                                   text-gray-800
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base
                                   shadow-sm
                                   focus:border-orange-500
                                   focus:ring-2
                                   focus:ring-orange-200
                                   focus:outline-none
                                   transition">

                            <option value="bedsitter" @selected(old('property_type') === 'bedsitter')>
                                Bedsitter
                            </option>

                            <option value="single_room" @selected(old('property_type') === 'single_room')>
                                Single Room
                            </option>

                            <option value="one_bedroom" @selected(old('property_type') === 'one_bedroom')>
                                One Bedroom
                            </option>

                            <option value="two_bedroom" @selected(old('property_type') === 'two_bedroom')>
                                Two Bedroom
                            </option>

                            <option value="hostel" @selected(old('property_type') === 'hostel')>
                                Hostel Room
                            </option>

                            <option value="shared_room" @selected(old('property_type') === 'shared_room')>
                                Shared Room
                            </option>

                        </select>

                    </div>


                    {{-- UNIVERSITY --}}

                    <div>

                        <label
                            for="university_id"
                            class="block font-bold text-gray-800 mb-2">

                            University

                        </label>

                        <select
                            id="university_id"
                            name="university_id"
                            required
                            class="w-full
                                   rounded-xl
                                   border-2 border-gray-300
                                   bg-white
                                   text-gray-800
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base
                                   shadow-sm
                                   focus:border-orange-500
                                   focus:ring-2
                                   focus:ring-orange-200
                                   focus:outline-none
                                   transition">

                            <option value="">
                                Select University
                            </option>

                            @foreach($universities as $university)

                                <option
                                    value="{{ $university->id }}"
                                    @selected(old('university_id') == $university->id)>

                                    {{ $university->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- NEARBY AREA --}}

                    <div>

                        <label
                            for="nearby_area_id"
                            class="block font-bold text-gray-800 mb-2">

                            Nearby Area

                        </label>

                        <select
                            id="nearby_area_id"
                            name="nearby_area_id"
                            required
                            class="w-full
                                   rounded-xl
                                   border-2 border-gray-300
                                   bg-white
                                   text-gray-800
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base
                                   shadow-sm
                                   focus:border-orange-500
                                   focus:ring-2
                                   focus:ring-orange-200
                                   focus:outline-none
                                   transition">

                            <option value="">
                                Select Nearby Area
                            </option>

                            @foreach($areas as $area)

                                <option
                                    value="{{ $area->id }}"
                                    @selected(old('nearby_area_id') == $area->id)>

                                    {{ $area->name }}

                                </option>

                            @endforeach

                        </select>

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
                            rows="6"
                            required
                            placeholder="Describe your rental..."
                            class="w-full
                                   rounded-xl
                                   border-2 border-gray-300
                                   bg-white
                                   text-gray-800
                                   px-4 py-3.5 sm:px-5 sm:py-4
                                   text-sm sm:text-base
                                   shadow-sm
                                   resize-y
                                   focus:border-orange-500
                                   focus:ring-2
                                   focus:ring-orange-200
                                   focus:outline-none
                                   transition">{{ old('description') }}</textarea>

                        <p class="mt-2 text-sm text-gray-500">
                            Include useful details such as the room, security, distance from campus and nearby amenities.
                        </p>

                    </div>


                    {{-- NEXT BUTTON --}}

                    <div class="flex justify-end pt-2">

                        <button
                            type="submit"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   bg-orange-600
                                   hover:bg-orange-700
                                   text-white
                                   px-8 sm:px-10
                                   py-3.5 sm:py-4
                                   rounded-xl
                                   font-bold
                                   shadow-lg
                                   transition">

                            Next →

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-landlord-layout>