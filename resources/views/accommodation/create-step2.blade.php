<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <div class="max-w-5xl mx-auto py-14">

        <h1 class="text-5xl font-extrabold text-center text-orange-600">
            📍 Property Location
        </h1>

        <p class="text-center text-gray-600 mt-3 text-lg">
            Step 2 of 5 • Tell students exactly where your property is located
        </p>

        <div class="w-full bg-gray-200 rounded-full h-3 mt-8">
            <div class="bg-orange-600 h-3 rounded-full" style="width:40%"></div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl mt-10 p-10">

            <form method="POST" action="{{ route('rental.step2.store') }}">
                @csrf

                <div class="mb-8">

                    <label class="block font-bold mb-2">
                        Exact Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location') }}"
                        placeholder="Example: Opposite QuickMart, 100m from Gate B"
                        class="w-full rounded-xl border-gray-300">

                </div>

                <div class="flex justify-between mt-10">

                    <a href="{{ route('rental.step1') }}"
                       class="px-8 py-4 rounded-xl bg-gray-300 hover:bg-gray-400 font-bold">

                        ← Back

                    </a>

                    <button
                        type="submit"
                        class="px-8 py-4 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-bold">

                        Next →

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>