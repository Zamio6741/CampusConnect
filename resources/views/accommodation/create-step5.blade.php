<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-12">

    <div class="max-w-6xl mx-auto">

        <div class="text-center mb-10">
            <h1 class="text-5xl font-extrabold text-orange-600">
                Review Your Listing
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Step 5 of 5 • Publish Rental
            </p>
        </div>

        <div class="w-full bg-gray-200 rounded-full h-3 mb-10">
            <div class="bg-green-500 h-3 rounded-full w-full"></div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <h2 class="text-2xl font-bold mb-8">
                Listing Preview
            </h2>

            <div class="grid md:grid-cols-2 gap-10">

                <div class="w-full h-72 bg-gray-100 rounded-xl flex items-center justify-center text-gray-500">
                    📷 Photos will appear here after upload
                </div>

                <div class="space-y-5">

                    <div>
                        <h3 class="font-bold text-gray-700">Property Type</h3>
                        <p>{{ ucfirst(str_replace('_',' ',$step1['property_type'] ?? '-')) }}</p>
                    </div>

                    <div>
                        <h3 class="font-bold text-gray-700">University</h3>
                        <p>{{ $university->name ?? '-' }}</p>
                    </div>

                    <div>
                        <h3 class="font-bold text-gray-700">Nearby Area</h3>
                        <p>{{ $area->name ?? '-' }}</p>
                    </div>

                    <div>
                        <h3 class="font-bold text-gray-700">Monthly Rent</h3>

                        <p class="text-3xl font-bold text-green-600">
                            KES {{ number_format($step3['price'] ?? 0) }}
                        </p>
                    </div>

                    <div>
                        <h3 class="font-bold text-gray-700">Description</h3>

                        <p>
                            {{ $step1['description'] ?? 'No description provided.' }}
                        </p>
                    </div>

                </div>

            </div>

            <div class="flex justify-between mt-12">

                <a href="{{ route('rental.step4') }}"
                   class="px-8 py-4 rounded-xl bg-gray-300 font-bold">

                    ← Back

                </a>

                <button
                    class="px-10 py-4 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold">

                    🚀 Publish Rental

                </button>

            </div>

        </div>

    </div>

</div>

</x-app-layout>