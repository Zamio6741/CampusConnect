<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-12">

    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-10">

            <h1 class="text-5xl font-extrabold text-orange-600">
                Create Rental Listing
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Step 4 of 5 • Rental Details
            </p>

        </div>

        <div class="w-full bg-gray-200 rounded-full h-3 mb-10">

            <div class="bg-orange-500 h-3 rounded-full" style="width:80%"></div>

        </div>

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <form method="POST">

                @csrf

                <!-- Monthly Rent -->

                <div class="mb-6">

                    <label class="block font-bold mb-2">

                        Monthly Rent (KES)

                    </label>

                    <input
                        type="number"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="6000">

                </div>

                <!-- Phone -->

                <div class="mb-6">

                    <label class="block font-bold mb-2">

                        Phone Number

                    </label>

                    <input
                        type="text"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="+254712345678">

                </div>

                <!-- WhatsApp -->

                <div class="mb-6">

                    <label class="block font-bold mb-2">

                        WhatsApp

                    </label>

                    <input
                        type="text"
                        class="w-full rounded-xl border-gray-300"
                        placeholder="+254712345678">

                </div>

                <!-- Facilities -->

                <div class="mt-10">

                    <h2 class="font-bold text-xl mb-5">

                        Available Facilities

                    </h2>

                    <div class="grid grid-cols-2 gap-4">

                        <label><input type="checkbox"> WiFi</label>

                        <label><input type="checkbox"> Water</label>

                        <label><input type="checkbox"> Electricity</label>

                        <label><input type="checkbox"> CCTV</label>

                        <label><input type="checkbox"> Parking</label>

                        <label><input type="checkbox"> Security Guard</label>

                        <label><input type="checkbox"> Laundry</label>

                        <label><input type="checkbox"> Kitchen</label>

                    </div>

                </div>

                <div class="flex justify-between mt-12">

                    <a
                        href="{{ route('rental.step3') }}"
                        class="px-8 py-4 rounded-xl bg-gray-300 font-bold">

                        ← Back

                    </a>

                    <a
                        href="{{ route('rental.step5') }}"
                        class="px-8 py-4 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-bold">

                        Next →

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>