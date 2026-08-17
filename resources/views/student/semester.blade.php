<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10 px-4 sm:px-6 lg:px-8">

    <div class="max-w-3xl mx-auto">

        <!-- Header -->

        <div class="mb-8">

            <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-800">
                📅 Semester Settings
            </h1>

            <p class="text-gray-500 mt-2">
                Tell CampusConnect when your semester starts and ends.
                Your dashboard progress will then update automatically.
            </p>

        </div>


        <!-- Card -->

        <div class="bg-white rounded-3xl shadow-xl p-6 lg:p-10">

            <form
                method="POST"
                action="{{ route('semester.update') }}"
            >

                @csrf

                <!-- Start Date -->

                <div class="mb-7">

                    <label
                        for="start_date"
                        class="block text-sm font-bold text-gray-700 mb-2"
                    >
                        Semester Start Date
                    </label>

                    <input
                        type="date"
                        id="start_date"
                        name="start_date"
                        value="{{ old('start_date', $semester?->start_date?->format('Y-m-d')) }}"
                        class="w-full rounded-2xl border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-4 focus:ring-blue-100
                               focus:border-blue-500 px-5 py-4"
                        required
                    >

                    @error('start_date')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- End Date -->

                <div class="mb-8">

                    <label
                        for="end_date"
                        class="block text-sm font-bold text-gray-700 mb-2"
                    >
                        Semester End Date
                    </label>

                    <input
                        type="date"
                        id="end_date"
                        name="end_date"
                        value="{{ old('end_date', $semester?->end_date?->format('Y-m-d')) }}"
                        class="w-full rounded-2xl border-gray-200 bg-gray-50
                               focus:bg-white focus:ring-4 focus:ring-blue-100
                               focus:border-blue-500 px-5 py-4"
                        required
                    >

                    @error('end_date')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                <!-- Information -->

                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5 mb-8">

                    <div class="flex gap-4">

                        <div class="text-2xl">
                            💡
                        </div>

                        <div>

                            <h3 class="font-bold text-blue-800">
                                How Semester Progress Works
                            </h3>

                            <p class="text-sm text-blue-700 mt-2 leading-6">
                                CampusConnect calculates your progress based
                                on the number of days that have passed between
                                your semester start and end dates.
                            </p>

                            <p class="text-sm text-blue-700 mt-2 leading-6">
                                When your semester ends, the progress
                                automatically resets and you can enter dates
                                for your next semester.
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Submit -->

                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-indigo-600
                           text-white font-bold py-4 rounded-2xl
                           hover:from-blue-700 hover:to-indigo-700
                           hover:shadow-xl transition duration-300"
                >
                    💾 Save Semester Dates
                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>