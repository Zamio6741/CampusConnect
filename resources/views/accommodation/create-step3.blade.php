<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-6 sm:py-10 lg:py-12">

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- HEADER --}}
        <div class="text-center mb-7 sm:mb-10">

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-orange-600 leading-tight">
                📸 Upload Property Photos
            </h1>

            <p class="text-gray-500 mt-3 text-sm sm:text-base lg:text-lg">
                Step 3 of 5 • Upload clear photos of your rental
            </p>

        </div>


        {{-- PROGRESS --}}
        <div class="w-full bg-gray-200 rounded-full h-2.5 sm:h-3 mb-7 sm:mb-10 overflow-hidden">

            <div
                class="bg-orange-500 h-full rounded-full"
                style="width:60%">
            </div>

        </div>


        {{-- FORM CARD --}}
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-gray-200 overflow-hidden">

            <div class="p-5 sm:p-8 lg:p-10">

                {{-- ERRORS --}}
                @if ($errors->any())

                    <div class="mb-7 sm:mb-8 bg-red-50 border border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                        <div class="font-bold mb-2">
                            Please correct the following:
                        </div>

                        <ul class="list-disc list-inside space-y-1 text-sm sm:text-base">

                            @foreach ($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('rental.step3.store') }}"
                    enctype="multipart/form-data"
                    class="space-y-7 sm:space-y-8">

                    @csrf


                    {{-- PHOTO UPLOAD --}}
                    <div>

                        <label
                            for="photos"
                            class="block text-lg sm:text-xl font-bold text-gray-800 mb-3">

                            Property Photos

                        </label>

                        <div
                            class="rounded-2xl border-2 border-dashed border-orange-300 bg-orange-50/50 p-4 sm:p-6">

                            <input
                                id="photos"
                                type="file"
                                name="photos[]"
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
                                       focus:border-orange-500
                                       focus:ring-2
                                       focus:ring-orange-200">

                        </div>

                        <p class="text-gray-500 mt-3 text-sm sm:text-base leading-relaxed">

                            Upload at least 5 clear photos of the property.
                            You can select multiple photos at once.

                        </p>

                    </div>


                    {{-- PHOTO REQUIREMENTS --}}
                    <div class="bg-orange-50 border border-orange-200 rounded-2xl p-4 sm:p-5">

                        <h3 class="font-bold text-orange-700 mb-3">
                            📷 Photo Tips
                        </h3>

                        <ul class="space-y-2 text-sm sm:text-base text-gray-600">

                            <li>✓ Upload clear and well-lit photos.</li>

                            <li>✓ Include the bedroom, bathroom and kitchen where applicable.</li>

                            <li>✓ Show the exterior and surrounding area if possible.</li>

                            <li>✓ Avoid blurry or extremely dark photos.</li>

                        </ul>

                    </div>


                    {{-- BUTTONS --}}
                    <div
                        class="flex flex-col-reverse sm:flex-row
                               justify-between
                               gap-3 sm:gap-4
                               pt-3 sm:pt-5">

                        <a
                            href="{{ route('rental.step2') }}"
                            class="w-full sm:w-auto
                                   inline-flex items-center justify-center
                                   px-6 sm:px-8
                                   py-3.5 sm:py-4
                                   bg-gray-200
                                   hover:bg-gray-300
                                   text-gray-800
                                   rounded-xl
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

</x-app-layout>