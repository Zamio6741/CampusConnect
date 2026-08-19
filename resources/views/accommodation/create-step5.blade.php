<x-landlord-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-6 sm:py-10 lg:py-12">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- PAGE HEADER --}}
        {{-- ========================================================= --}}

        <div class="text-center mb-7 sm:mb-10">

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-orange-600 leading-tight">
                Review Your Listing
            </h1>

            <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base lg:text-lg">
                Step 5 of 5 • Publish Rental
            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- PROGRESS BAR --}}
        {{-- ========================================================= --}}

        <div class="w-full bg-gray-200 rounded-full h-2.5 sm:h-3 mb-7 sm:mb-10">

            <div class="bg-green-500 h-2.5 sm:h-3 rounded-full w-full"></div>

        </div>


        {{-- ========================================================= --}}
        {{-- MAIN CARD --}}
        {{-- ========================================================= --}}

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-orange-100 overflow-hidden">

            <div class="p-5 sm:p-7 lg:p-10">

                <h2 class="text-xl sm:text-2xl font-bold mb-6 sm:mb-8 text-gray-800">
                    Listing Preview
                </h2>


                {{-- ================================================= --}}
                {{-- PREVIEW CONTENT --}}
                {{-- ================================================= --}}

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-7 sm:gap-10">


                    {{-- ================================================= --}}
                    {{-- PHOTO PREVIEW --}}
                    {{-- ================================================= --}}

                    <div>

                        <div
                            class="w-full
                                   h-56 sm:h-72 lg:h-80
                                   bg-gray-100
                                   border-2 border-dashed border-gray-300
                                   rounded-2xl
                                   flex flex-col
                                   items-center
                                   justify-center
                                   text-gray-500
                                   text-center
                                   px-5">

                            <div class="text-5xl sm:text-6xl mb-3">
                                📷
                            </div>

                            <p class="font-semibold text-sm sm:text-base">
                                Photos will appear here after upload
                            </p>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- LISTING DETAILS --}}
                    {{-- ================================================= --}}

                    <div class="space-y-4 sm:space-y-5">


                        {{-- Property Type --}}

                        <div class="border border-gray-200 rounded-xl p-4 sm:p-5">

                            <h3 class="font-bold text-gray-700 text-sm sm:text-base">
                                Property Type
                            </h3>

                            <p class="text-gray-600 mt-1 break-words">
                                {{ ucfirst(str_replace('_',' ',$step1['property_type'] ?? '-')) }}
                            </p>

                        </div>


                        {{-- University --}}

                        <div class="border border-gray-200 rounded-xl p-4 sm:p-5">

                            <h3 class="font-bold text-gray-700 text-sm sm:text-base">
                                University
                            </h3>

                            <p class="text-gray-600 mt-1 break-words">
                                {{ $university->name ?? '-' }}
                            </p>

                        </div>


                        {{-- Nearby Area --}}

                        <div class="border border-gray-200 rounded-xl p-4 sm:p-5">

                            <h3 class="font-bold text-gray-700 text-sm sm:text-base">
                                Nearby Area
                            </h3>

                            <p class="text-gray-600 mt-1 break-words">
                                {{ $area->name ?? '-' }}
                            </p>

                        </div>


                        {{-- Monthly Rent --}}

                        <div class="border border-gray-200 rounded-xl p-4 sm:p-5">

                            <h3 class="font-bold text-gray-700 text-sm sm:text-base">
                                Monthly Rent
                            </h3>

                            <p class="text-2xl sm:text-3xl font-bold text-green-600 mt-1">
                                KES {{ number_format($step4['price'] ?? 0) }}
                            </p>

                        </div>


                        {{-- Description --}}

                        <div class="border border-gray-200 rounded-xl p-4 sm:p-5">

                            <h3 class="font-bold text-gray-700 text-sm sm:text-base">
                                Description
                            </h3>

                            <p class="text-gray-600 mt-2 leading-6 break-words">
                                {{ $step1['description'] ?? 'No description provided.' }}
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- ACTION BUTTONS --}}
                {{-- ================================================= --}}

                <div
                    class="mt-8 sm:mt-12
                           pt-6 sm:pt-8
                           border-t border-gray-200
                           flex flex-col-reverse sm:flex-row
                           gap-3 sm:gap-4
                           sm:justify-between">


                    {{-- Back --}}

                    <a
                        href="{{ route('rental.step4') }}"
                        class="w-full sm:w-auto
                               inline-flex items-center justify-center
                               px-6 sm:px-8
                               py-3.5 sm:py-4
                               rounded-xl
                               bg-gray-200 hover:bg-gray-300
                               text-gray-800
                               font-bold
                               transition">

                        ←
                        <span class="ml-2">
                            Back
                        </span>

                    </a>


                    {{-- Publish --}}

                    <form
                        action="{{ route('rental.publish') }}"
                        method="POST"
                        class="w-full sm:w-auto">

                        @csrf

                        <button
                            type="submit"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   px-7 sm:px-10
                                   py-3.5 sm:py-4
                                   rounded-xl
                                   bg-green-600 hover:bg-green-700
                                   text-white
                                   font-bold
                                   shadow-lg
                                   hover:shadow-xl
                                   transition">

                            🚀
                            <span class="ml-2">
                                Publish Rental
                            </span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</x-landlord-layout>