<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-5xl mx-auto px-6">

        <!-- Header -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white p-8">

                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                    <div>

                        <div class="inline-flex items-center gap-2 bg-white/20 px-4 py-2 rounded-full text-sm font-bold mb-4">
                            ✏️ Business Management
                        </div>

                        <h1 class="text-4xl md:text-5xl font-extrabold">
                            Edit Business
                        </h1>

                        <p class="mt-2 text-orange-100 text-lg">
                            Update your business information and keep your listing accurate.
                        </p>

                    </div>

                    <div class="bg-white/20 rounded-2xl px-5 py-4 text-center">

                        <div class="text-3xl">
                            🏪
                        </div>

                        <p class="text-sm font-semibold mt-1">
                            {{ $business->name }}
                        </p>

                    </div>

                </div>

            </div>

            <!-- Form Content -->
            <div class="p-8 md:p-10">

                @if($errors->any())

                    <div class="mb-8 bg-red-50 border border-red-300 rounded-2xl p-5">

                        <div class="flex items-center gap-3 mb-3">

                            <span class="text-2xl">
                                ⚠️
                            </span>

                            <h2 class="font-bold text-red-700">
                                Please correct the following errors:
                            </h2>

                        </div>

                        <ul class="list-disc list-inside text-red-600 space-y-1">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                @if(session('success'))

                    <div class="mb-8 bg-green-50 border border-green-300 rounded-2xl p-5 text-green-700">

                        <div class="flex items-center gap-3">

                            <span class="text-xl">
                                ✅
                            </span>

                            <span class="font-semibold">
                                {{ session('success') }}
                            </span>

                        </div>

                    </div>

                @endif

                <form
                    action="{{ route('businesses.update', $business) }}"
                    method="POST"
                    class="space-y-7">

                    @csrf
                    @method('PUT')

                    <!-- Business Name -->
                    <div>

                        <label
                            for="name"
                            class="block font-bold text-gray-700 mb-2">

                            Business Name

                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name', $business->name) }}"
                            placeholder="Example: Campus Cyber Café"
                            class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500"
                            required>

                    </div>

                    <!-- Category -->
                    <div>

                        <label
                            for="category"
                            class="block font-bold text-gray-700 mb-2">

                            Business Category

                        </label>

                        <select
                            id="category"
                            name="category"
                            class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500"
                            required>

                            <option value="">
                                Select Category
                            </option>

                            <option
                                value="Restaurant"
                                {{ old('category', $business->category) == 'Restaurant' ? 'selected' : '' }}>
                                🍽 Restaurant
                            </option>

                            <option
                                value="Hostel"
                                {{ old('category', $business->category) == 'Hostel' ? 'selected' : '' }}>
                                🏠 Hostel
                            </option>

                            <option
                                value="Cyber"
                                {{ old('category', $business->category) == 'Cyber' ? 'selected' : '' }}>
                                💻 Cyber Café
                            </option>

                            <option
                                value="Salon"
                                {{ old('category', $business->category) == 'Salon' ? 'selected' : '' }}>
                                💇 Salon
                            </option>

                            <option
                                value="Barbershop"
                                {{ old('category', $business->category) == 'Barbershop' ? 'selected' : '' }}>
                                💈 Barbershop
                            </option>

                            <option
                                value="Laundry"
                                {{ old('category', $business->category) == 'Laundry' ? 'selected' : '' }}>
                                🧺 Laundry
                            </option>

                            <option
                                value="Electronics"
                                {{ old('category', $business->category) == 'Electronics' ? 'selected' : '' }}>
                                🔌 Electronics
                            </option>

                            <option
                                value="Printing"
                                {{ old('category', $business->category) == 'Printing' ? 'selected' : '' }}>
                                🖨 Printing
                            </option>

                            <option
                                value="Other"
                                {{ old('category', $business->category) == 'Other' ? 'selected' : '' }}>
                                🏪 Other
                            </option>

                        </select>

                    </div>

                    <!-- Description -->
                    <div>

                        <label
                            for="description"
                            class="block font-bold text-gray-700 mb-2">

                            Business Description

                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="Describe your business, products, services and what makes it useful to students..."
                            class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500"
                            required>{{ old('description', $business->description) }}</textarea>

                        <p class="text-sm text-gray-500 mt-2">
                            Give students enough information to understand what your business offers.
                        </p>

                    </div>

                    <!-- Contact Information -->
                    <div>

                        <div class="mb-4">

                            <h2 class="text-2xl font-bold text-gray-800">
                                📞 Contact Information
                            </h2>

                            <p class="text-gray-500 mt-1">
                                Make it easy for students to reach your business.
                            </p>

                        </div>

                        <div class="grid md:grid-cols-2 gap-6">

                            <!-- Phone -->
                            <div>

                                <label
                                    for="phone"
                                    class="block font-bold text-gray-700 mb-2">

                                    Phone Number

                                </label>

                                <input
                                    id="phone"
                                    type="text"
                                    name="phone"
                                    value="{{ old('phone', $business->phone) }}"
                                    placeholder="+254 7XX XXX XXX"
                                    class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500"
                                    required>

                            </div>

                            <!-- WhatsApp -->
                            <div>

                                <label
                                    for="whatsapp"
                                    class="block font-bold text-gray-700 mb-2">

                                    WhatsApp Number

                                </label>

                                <input
                                    id="whatsapp"
                                    type="text"
                                    name="whatsapp"
                                    value="{{ old('whatsapp', $business->whatsapp) }}"
                                    placeholder="+254 7XX XXX XXX"
                                    class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500">

                                <p class="text-sm text-gray-500 mt-2">
                                    Optional — leave blank if the WhatsApp number is the same as your phone or unavailable.
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Location -->
                    <div>

                        <label
                            for="location"
                            class="block font-bold text-gray-700 mb-2">

                            📍 Business Location

                        </label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ old('location', $business->location) }}"
                            placeholder="Example: Near KU Main Gate"
                            class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500"
                            required>

                        <p class="text-sm text-gray-500 mt-2">
                            Give students a clear landmark or area where they can find you.
                        </p>

                    </div>

                    <!-- Opening Hours -->
                    <div>

                        <label
                            for="opening_hours"
                            class="block font-bold text-gray-700 mb-2">

                            🕒 Opening Hours

                        </label>

                        <input
                            id="opening_hours"
                            type="text"
                            name="opening_hours"
                            value="{{ old('opening_hours', $business->opening_hours) }}"
                            placeholder="Example: Mon-Fri 8:00 AM - 6:00 PM"
                            class="w-full rounded-xl border-gray-300 p-4 focus:border-orange-500 focus:ring-orange-500">

                        <p class="text-sm text-gray-500 mt-2">
                            Let students know when your business is open.
                        </p>

                    </div>

                    <!-- Preview -->
                    <div class="bg-orange-50 border border-orange-200 rounded-2xl p-6">

                        <div class="flex items-start gap-4">

                            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-2xl">
                                🏪
                            </div>

                            <div>

                                <h3 class="font-bold text-orange-800 text-lg">
                                    Keep your listing accurate
                                </h3>

                                <p class="text-orange-700 mt-1 text-sm leading-6">
                                    Students will use this information to find and contact your business.
                                    Make sure your phone number, location and opening hours are correct.
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 pt-4">

                        <button
                            type="submit"
                            class="flex-1 bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg transition hover:-translate-y-1">

                            💾 Save Changes

                        </button>

                        <a
                            href="{{ route('businesses.show', $business) }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center px-8 py-4 rounded-2xl font-bold transition">

                            ← Cancel

                        </a>

                    </div>

                </form>

                <!-- Back Link -->
                <div class="mt-8 pt-6 border-t border-gray-200">

                    <a
                        href="{{ route('businesses.index') }}"
                        class="text-orange-600 font-bold hover:underline">

                        ← Back to Businesses

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-business-layout>