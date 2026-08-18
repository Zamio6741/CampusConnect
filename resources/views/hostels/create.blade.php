<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-orange-100 via-amber-50 to-yellow-100 py-8 sm:py-12 px-4 sm:px-6">

        <div class="max-w-5xl mx-auto">

            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                <!-- HEADER -->
                <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white p-6 sm:p-8">

                    <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight">
                        🏫 Add Campus Hostel
                    </h1>

                    <p class="mt-2 text-orange-100 text-base sm:text-lg">
                        Add a university hostel for students to discover.
                    </p>

                </div>

                <!-- FORM CONTENT -->
                <div class="p-5 sm:p-8 lg:p-10">

                    <!-- VALIDATION ERRORS -->
                    @if($errors->any())

                        <div class="mb-8 bg-red-50 border-2 border-red-300 rounded-2xl p-4 sm:p-5">

                            <div class="flex items-start gap-3">

                                <span class="text-xl">
                                    ⚠️
                                </span>

                                <div class="flex-1">

                                    <h3 class="font-bold text-red-700 mb-2">
                                        Please correct the following errors:
                                    </h3>

                                    <ul class="list-disc list-inside text-red-600 space-y-1 text-sm sm:text-base">

                                        @foreach($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif

                    <form
                        action="{{ route('hostels.store') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-7 sm:space-y-8">

                        @csrf

                        <!-- UNIVERSITY -->
                        <div>

                            <label
                                for="university"
                                class="block font-bold text-gray-700 mb-2">

                                University

                            </label>

                            <input
                                id="university"
                                type="text"
                                name="university"
                                value="{{ old('university') }}"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                placeholder="Example: Kenyatta University"
                                required>

                        </div>

                        <!-- HOSTEL NAME -->
                        <div>

                            <label
                                for="hostel_name"
                                class="block font-bold text-gray-700 mb-2">

                                Hostel Name

                            </label>

                            <input
                                id="hostel_name"
                                type="text"
                                name="hostel_name"
                                value="{{ old('hostel_name') }}"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                placeholder="Example: Nyayo Hostel"
                                required>

                        </div>

                        <!-- GENDER -->
                        <div>

                            <label
                                for="gender"
                                class="block font-bold text-gray-700 mb-2">

                                Gender

                            </label>

                            <select
                                id="gender"
                                name="gender"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                required>

                                <option value="">
                                    Choose Gender
                                </option>

                                <option
                                    value="Male"
                                    @selected(old('gender') === 'Male')>

                                    Male

                                </option>

                                <option
                                    value="Female"
                                    @selected(old('gender') === 'Female')>

                                    Female

                                </option>

                            </select>

                        </div>

                        <!-- ROOM NUMBER -->
                        <div>

                            <label
                                for="room_number"
                                class="block font-bold text-gray-700 mb-2">

                                Room Number

                            </label>

                            <input
                                id="room_number"
                                type="text"
                                name="room_number"
                                value="{{ old('room_number') }}"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                placeholder="Example: A-203"
                                required>

                        </div>

                        <!-- CAPACITY + AVAILABLE SPACES -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                            <!-- CAPACITY -->
                            <div>

                                <label
                                    for="capacity"
                                    class="block font-bold text-gray-700 mb-2">

                                    Total Capacity

                                </label>

                                <input
                                    id="capacity"
                                    type="number"
                                    name="capacity"
                                    value="{{ old('capacity') }}"
                                    min="1"
                                    class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                    placeholder="Example: 4"
                                    required>

                            </div>

                            <!-- AVAILABLE SPACES -->
                            <div>

                                <label
                                    for="available_spaces"
                                    class="block font-bold text-gray-700 mb-2">

                                    Available Spaces

                                </label>

                                <input
                                    id="available_spaces"
                                    type="number"
                                    name="available_spaces"
                                    value="{{ old('available_spaces') }}"
                                    min="0"
                                    class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                    placeholder="Example: 2"
                                    required>

                            </div>

                        </div>

                        <!-- DESCRIPTION -->
                        <div>

                            <label
                                for="description"
                                class="block font-bold text-gray-700 mb-2">

                                Description

                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="5"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition resize-y"
                                placeholder="Hostel facilities, internet, water, security...">{{ old('description') }}</textarea>

                        </div>

                        <!-- WARDEN -->
                        <div>

                            <label
                                for="warden_name"
                                class="block font-bold text-gray-700 mb-2">

                                Warden Name

                            </label>

                            <input
                                id="warden_name"
                                type="text"
                                name="warden_name"
                                value="{{ old('warden_name') }}"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                placeholder="Enter warden's name">

                        </div>

                        <!-- WARDEN PHONE -->
                        <div>

                            <label
                                for="warden_phone"
                                class="block font-bold text-gray-700 mb-2">

                                Warden Phone

                            </label>

                            <input
                                id="warden_phone"
                                type="text"
                                name="warden_phone"
                                value="{{ old('warden_phone') }}"
                                class="w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-800 py-3.5 sm:py-4 px-4 sm:px-5 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                placeholder="+254712345678">

                        </div>

                        <!-- HOSTEL PHOTO -->
                        <div>

                            <label
                                for="image"
                                class="block font-bold text-gray-700 mb-2">

                                Hostel Photo

                            </label>

                            <input
                                id="image"
                                type="file"
                                name="image"
                                accept="image/*"
                                class="block w-full rounded-2xl border-2 border-gray-300 bg-white text-gray-700 py-3 px-3 sm:px-4 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition file:mr-4 file:rounded-xl file:border-0 file:bg-orange-100 file:px-4 file:py-2 file:font-semibold file:text-orange-700 hover:file:bg-orange-200">

                            <p class="mt-2 text-sm text-gray-500">
                                Upload a clear photo of the hostel.
                            </p>

                        </div>

                        <!-- BUTTONS -->
                        <div class="flex flex-col-reverse sm:flex-row gap-4 pt-2">

                            <a
                                href="{{ route('hostels.index') }}"
                                class="w-full sm:w-auto sm:flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center px-6 sm:px-8 py-4 rounded-2xl font-bold transition">

                                Cancel

                            </a>

                            <button
                                type="submit"
                                class="w-full sm:flex-[2] bg-gradient-to-r from-orange-600 to-yellow-500 hover:from-orange-700 hover:to-yellow-600 text-white px-6 sm:px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition">

                                🏫 Save Hostel

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>