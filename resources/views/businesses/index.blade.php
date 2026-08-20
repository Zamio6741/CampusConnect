<x-student-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-8">

    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

            <!-- Header -->
            <div class="bg-orange-600 text-white p-6 sm:p-8">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 bg-white/20 rounded-xl flex items-center justify-center text-3xl">
                        🏪
                    </div>

                    <div>
                        <h1 class="text-3xl sm:text-4xl font-bold">
                            Post Your Business
                        </h1>

                        <p class="mt-1 text-orange-100">
                            Reach students around campus.
                        </p>
                    </div>

                </div>

            </div>

            <!-- Form -->
            <div class="p-6 sm:p-8">

                @if($errors->any())

                    <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4">

                        <p class="font-bold text-red-700 mb-2">
                            Please fix the following:
                        </p>

                        <ul class="list-disc list-inside text-red-600 text-sm space-y-1">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form
                    action="{{ route('businesses.store') }}"
                    method="POST"
                    class="space-y-6">

                    @csrf

                    <!-- Business Name -->
                    <div>

                        <label
                            for="name"
                            class="block font-semibold text-gray-700 mb-2">

                            Business Name

                        </label>

                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Example: Campus Tech Solutions"
                            class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            required>

                    </div>

                    <!-- Category -->
                    <div>

                        <label
                            for="category"
                            class="block font-semibold text-gray-700 mb-2">

                            Category

                        </label>

                        <select
                            id="category"
                            name="category"
                            class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            required>

                            <option value="">Select Category</option>

                            @foreach([
                                'Restaurant',
                                'Hostel',
                                'Barbershop',
                                'Salon',
                                'Laundry',
                                'Electronics',
                                'Bookshop',
                                'Cyber Cafe',
                                'Supermarket',
                                'Printing',
                                'Other'
                            ] as $category)

                                <option
                                    value="{{ $category }}"
                                    @selected(old('category') === $category)>

                                    {{ $category }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- Description -->
                    <div>

                        <label
                            for="description"
                            class="block font-semibold text-gray-700 mb-2">

                            Business Description

                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Describe your products or services..."
                            class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            required>{{ old('description') }}</textarea>

                    </div>

                    <!-- Contact -->
                    <div class="grid sm:grid-cols-2 gap-5">

                        <div>

                            <label
                                for="phone"
                                class="block font-semibold text-gray-700 mb-2">

                                Phone Number

                            </label>

                            <input
                                id="phone"
                                type="text"
                                name="phone"
                                value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                placeholder="+254 7XX XXX XXX"
                                class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                                required>

                        </div>

                        <div>

                            <label
                                for="whatsapp"
                                class="block font-semibold text-gray-700 mb-2">

                                WhatsApp

                            </label>

                            <input
                                id="whatsapp"
                                type="text"
                                name="whatsapp"
                                value="{{ old('whatsapp') }}"
                                placeholder="+254 7XX XXX XXX"
                                class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500">

                        </div>

                    </div>

                    <!-- Location -->
                    <div>

                        <label
                            for="location"
                            class="block font-semibold text-gray-700 mb-2">

                            📍 Location

                        </label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            placeholder="Example: Near KU Main Gate"
                            class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500"
                            required>

                    </div>

                    <!-- Opening Hours -->
                    <div>

                        <label
                            for="opening_hours"
                            class="block font-semibold text-gray-700 mb-2">

                            🕒 Opening Hours

                        </label>

                        <input
                            id="opening_hours"
                            type="text"
                            name="opening_hours"
                            value="{{ old('opening_hours') }}"
                            placeholder="Example: Mon-Fri 8:00 AM - 8:00 PM"
                            class="w-full rounded-xl border-gray-300 focus:border-orange-500 focus:ring-orange-500">

                    </div>

                    <!-- Notice -->
                    <div class="bg-orange-50 border border-orange-200 rounded-xl p-4">

                        <div class="flex gap-3">

                            <span class="text-xl">💡</span>

                            <p class="text-sm text-orange-800">
                                Use accurate contact and location details so students can easily find and reach your business.
                            </p>

                        </div>

                    </div>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-2">

                        <button
                            type="submit"
                            class="flex-1 bg-orange-600 hover:bg-orange-700 text-white py-4 rounded-xl font-bold transition">

                            🚀 Post Business

                        </button>

                        <a
                            href="{{ route('businesses.index') }}"
                            class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center py-4 rounded-xl font-bold transition">

                            ← Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-student-layout>