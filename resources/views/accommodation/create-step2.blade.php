<x-landlord-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-6 sm:py-10 lg:py-14">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="text-center mb-7 sm:mb-10">

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-orange-600 leading-tight">
                📍 Property Location
            </h1>

            <p class="text-center text-gray-600 mt-3 text-sm sm:text-base lg:text-lg leading-relaxed">
                Step 2 of 5 • Tell students exactly where your property is located
            </p>

        </div>


        {{-- PROGRESS BAR --}}
        <div class="w-full bg-gray-200 rounded-full h-2.5 sm:h-3 mb-7 sm:mb-10 overflow-hidden">

            <div
                class="bg-orange-600 h-full rounded-full"
                style="width:40%">
            </div>

        </div>


        {{-- FORM CARD --}}
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-gray-200 overflow-hidden">

            <div class="p-5 sm:p-8 lg:p-10">

                {{-- VALIDATION ERRORS --}}
                @if ($errors->any())

                    <div class="mb-7 sm:mb-8 bg-red-50 border border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                        <h3 class="font-bold mb-2">
                            Please correct the following:
                        </h3>

                        <ul class="list-disc list-inside space-y-1 text-sm sm:text-base">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('rental.step2.store') }}"
                    class="space-y-7 sm:space-y-8">

                    @csrf


                    {{-- LOCATION --}}
                    <div>

                        <label
                            for="location"
                            class="block font-bold text-gray-800 mb-2">

                            Exact Location

                        </label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            placeholder="Example: Opposite QuickMart, 100m from Gate B"
                            autocomplete="street-address"
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

                        <p class="mt-2 text-sm text-gray-500 leading-relaxed">

                            Provide a clear landmark, road, estate or nearby location
                            so students can easily find the property.

                        </p>

                    </div>


                    {{-- LOCATION TIP --}}
                    <div class="bg-orange-50 border border-orange-200 rounded-2xl p-4 sm:p-5">

                        <div class="flex items-start gap-3">

                            <span class="text-2xl shrink-0">
                                💡
                            </span>

                            <div>

                                <h3 class="font-bold text-orange-700">
                                    Location Tip
                                </h3>

                                <p class="text-sm sm:text-base text-gray-600 mt-1 leading-relaxed">
                                    Mention nearby landmarks such as a university gate,
                                    supermarket, road, shopping centre or popular building.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- BUTTONS --}}
                    <div
                        class="flex flex-col-reverse sm:flex-row
                               justify-between
                               gap-3 sm:gap-4
                               pt-2 sm:pt-4">

                        <a
                            href="{{ route('rental.step1') }}"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   px-6 sm:px-8
                                   py-3.5 sm:py-4
                                   rounded-xl
                                   bg-gray-200
                                   hover:bg-gray-300
                                   text-gray-800
                                   font-bold
                                   border border-gray-300
                                   shadow-sm
                                   transition">

                            ← Back

                        </a>


                        <button
                            type="submit"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   px-6 sm:px-8
                                   py-3.5 sm:py-4
                                   rounded-xl
                                   bg-orange-600
                                   hover:bg-orange-700
                                   text-white
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