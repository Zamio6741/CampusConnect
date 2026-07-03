<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-100 via-amber-50 to-yellow-100 py-12">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white p-8">

                <h1 class="text-4xl font-extrabold">
                    🏫 Add Campus Hostel
                </h1>

                <p class="mt-2 text-orange-100 text-lg">
                    Add a university hostel for students to discover.
                </p>

            </div>

            <div class="p-10">

                @if($errors->any())

                    <div class="mb-8 bg-red-100 border border-red-300 rounded-2xl p-5">

                        <ul class="list-disc list-inside text-red-600">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form
                    action="{{ route('hostels.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-8">

                    @csrf

                    <!-- University -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            University
                        </label>

                        <input
                            type="text"
                            name="university"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5 focus:ring-2 focus:ring-orange-500"
                            placeholder="Example: Kenyatta University"
                            required>

                    </div>

                    <!-- Hostel Name -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Hostel Name
                        </label>

                        <input
                            type="text"
                            name="hostel_name"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            placeholder="Example: Nyayo Hostel"
                            required>

                    </div>

                    <!-- Gender -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Gender
                        </label>

                        <select
                            name="gender"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            required>

                            <option value="">Choose Gender</option>

                            <option value="Male">Male</option>

                            <option value="Female">Female</option>

                        </select>

                    </div>

                    <!-- Room Number -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Room Number
                        </label>

                        <input
                            type="text"
                            name="room_number"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            placeholder="Example: A-203"
                            required>

                    </div>

                    <!-- Capacity -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Total Capacity
                        </label>

                        <input
                            type="number"
                            name="capacity"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            required>

                    </div>

                    <!-- Available Spaces -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Available Spaces
                        </label>

                        <input
                            type="number"
                            name="available_spaces"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            required>

                    </div>

                    <!-- Description -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="5"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5"
                            placeholder="Hostel facilities, internet, water, security..."></textarea>

                    </div>

                    <!-- Warden -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Warden Name
                        </label>

                        <input
                            type="text"
                            name="warden_name"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5">

                    </div>

                    <!-- Phone -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Warden Phone
                        </label>

                        <input
                            type="text"
                            name="warden_phone"
                            class="w-full rounded-2xl border-gray-300 py-4 px-5">

                    </div>

                    <!-- Image -->
                    <div>

                        <label class="block font-bold text-gray-700 mb-2">
                            Hostel Photo
                        </label>

                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                            class="w-full rounded-2xl border-gray-300 py-3 px-4">

                    </div>

                    <!-- Buttons -->
                    <div class="flex gap-4">

                        <button
                            type="submit"
                            class="bg-gradient-to-r from-orange-600 to-yellow-500 text-white px-8 py-4 rounded-2xl font-bold hover:scale-105 transition">

                            🏫 Save Hostel

                        </button>

                        <a
                            href="{{ route('hostels.index') }}"
                            class="bg-gray-200 px-8 py-4 rounded-2xl font-bold hover:bg-gray-300 transition">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>