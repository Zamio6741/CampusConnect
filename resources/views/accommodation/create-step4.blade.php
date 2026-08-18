<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-6 sm:py-10 lg:py-12">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="text-center mb-7 sm:mb-10">

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-orange-600 leading-tight">
                Create Rental Listing
            </h1>

            <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base lg:text-lg">
                Step 4 of 5 • Rental Details
            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- PROGRESS --}}
        {{-- ========================================================= --}}

        <div class="w-full bg-gray-200 rounded-full h-2.5 sm:h-3 mb-7 sm:mb-10">

            <div
                class="bg-orange-500 h-2.5 sm:h-3 rounded-full"
                style="width:80%">
            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- FORM CARD --}}
        {{-- ========================================================= --}}

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-orange-100 overflow-hidden">

            <div class="p-5 sm:p-7 lg:p-10">

                <form
                    method="POST"
                    action="{{ route('rental.step4.store') }}"
                    class="space-y-6 sm:space-y-7">

                    @csrf


                    {{-- ================================================= --}}
                    {{-- MONTHLY RENT --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="price"
                            class="block font-bold text-gray-700 mb-2">

                            Monthly Rent (KES)

                        </label>

                        <input
                            type="number"
                            id="price"
                            name="price"
                            value="{{ old('price') }}"
                            min="0"
                            placeholder="6000"
                            required
                            class="w-full rounded-xl sm:rounded-2xl
                                   border-2 border-gray-300
                                   bg-white
                                   px-4 py-3.5 sm:py-4
                                   text-gray-700
                                   placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500
                                   focus:ring-2 focus:ring-orange-200
                                   focus:outline-none
                                   transition">

                    </div>


                    {{-- ================================================= --}}
                    {{-- PHONE --}}
                    {{-- ================================================= --}}

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
                            placeholder="+254712345678"
                            class="w-full rounded-xl sm:rounded-2xl
                                   border-2 border-gray-300
                                   bg-white
                                   px-4 py-3.5 sm:py-4
                                   text-gray-700
                                   placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500
                                   focus:ring-2 focus:ring-orange-200
                                   focus:outline-none
                                   transition">

                    </div>


                    {{-- ================================================= --}}
                    {{-- WHATSAPP --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="whatsapp"
                            class="block font-bold text-gray-700 mb-2">

                            WhatsApp

                        </label>

                        <input
                            type="text"
                            id="whatsapp"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="+254712345678"
                            class="w-full rounded-xl sm:rounded-2xl
                                   border-2 border-gray-300
                                   bg-white
                                   px-4 py-3.5 sm:py-4
                                   text-gray-700
                                   placeholder-gray-400
                                   shadow-sm
                                   focus:border-orange-500
                                   focus:ring-2 focus:ring-orange-200
                                   focus:outline-none
                                   transition">

                    </div>


                    {{-- ================================================= --}}
                    {{-- FACILITIES --}}
                    {{-- ================================================= --}}

                    <div>

                        <label class="block font-bold text-gray-700 mb-3">

                            Facilities

                        </label>

                        <div
                            class="grid grid-cols-1
                                   sm:grid-cols-2
                                   gap-3 sm:gap-4
                                   border-2 border-gray-200
                                   rounded-2xl
                                   p-4 sm:p-5
                                   bg-gray-50">

                            @foreach([
                                'WiFi',
                                'Water',
                                'Electricity',
                                'CCTV',
                                'Parking',
                                'Security Guard',
                                'Laundry',
                                'Kitchen'
                            ] as $facility)

                                <label
                                    class="flex items-center gap-3
                                           bg-white
                                           border border-gray-200
                                           rounded-xl
                                           px-4 py-3
                                           cursor-pointer
                                           hover:border-orange-400
                                           hover:bg-orange-50
                                           transition">

                                    <input
                                        type="checkbox"
                                        name="facilities[]"
                                        value="{{ $facility }}"
                                        {{ in_array($facility, old('facilities', [])) ? 'checked' : '' }}
                                        class="h-4 w-4
                                               rounded
                                               border-2 border-gray-400
                                               text-orange-600
                                               focus:ring-orange-500">

                                    <span class="text-gray-700 font-medium text-sm sm:text-base">
                                        {{ $facility }}
                                    </span>

                                </label>

                            @endforeach

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- BUTTONS --}}
                    {{-- ================================================= --}}

                    <div
                        class="flex flex-col-reverse
                               sm:flex-row
                               sm:justify-between
                               gap-3 sm:gap-4
                               mt-8 sm:mt-12
                               pt-6 sm:pt-8
                               border-t border-gray-200">


                        {{-- BACK --}}

                        <a
                            href="{{ route('rental.step3') }}"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   px-6 sm:px-8
                                   py-3.5 sm:py-4
                                   rounded-xl
                                   bg-gray-200
                                   hover:bg-gray-300
                                   text-gray-800
                                   font-bold
                                   transition">

                            ←
                            <span class="ml-2">
                                Back
                            </span>

                        </a>


                        {{-- NEXT --}}

                        <button
                            type="submit"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   px-7 sm:px-8
                                   py-3.5 sm:py-4
                                   rounded-xl
                                   bg-orange-600
                                   hover:bg-orange-700
                                   text-white
                                   font-bold
                                   shadow-lg
                                   hover:shadow-xl
                                   transition">

                            Next
                            <span class="ml-2">
                                →
                            </span>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>