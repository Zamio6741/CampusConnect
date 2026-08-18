<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-8 sm:py-10 px-4 sm:px-6">

        <div class="max-w-3xl mx-auto">

            <!-- Main Card -->
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <!-- Header -->
                <div class="bg-gradient-to-r from-orange-600 to-amber-500 p-6 sm:p-8 text-white">

                    <h1 class="text-3xl sm:text-4xl font-extrabold">
                        📅 Request Property Viewing
                    </h1>

                    <p class="mt-2 text-orange-100 text-sm sm:text-base">
                        Choose your preferred visit date and send a message to the landlord.
                    </p>

                </div>

                <!-- Form Content -->
                <div class="p-5 sm:p-8">

                    <!-- Validation Errors -->
                    @if ($errors->any())

                        <div class="mb-6 bg-red-50 border-2 border-red-300 text-red-700 rounded-2xl p-4 sm:p-5">

                            <div class="flex items-start gap-3">

                                <span class="text-xl">
                                    ⚠️
                                </span>

                                <div class="flex-1">

                                    <h3 class="font-bold mb-2">
                                        Please correct the following:
                                    </h3>

                                    <ul class="list-disc pl-5 space-y-1 text-sm sm:text-base">

                                        @foreach ($errors->all() as $error)

                                            <li>
                                                {{ $error }}
                                            </li>

                                        @endforeach

                                    </ul>

                                </div>

                            </div>

                        </div>

                    @endif

                    <!-- Success Message -->
                    @if(session('success'))

                        <div class="mb-6 bg-green-50 border-2 border-green-300 text-green-700 rounded-2xl p-4 sm:p-5">

                            <div class="flex items-center gap-3">

                                <span class="text-xl">
                                    ✅
                                </span>

                                <p class="font-semibold">
                                    {{ session('success') }}
                                </p>

                            </div>

                        </div>

                    @endif

                    <form
                        method="POST"
                        action="{{ route('bookings.store',$accommodation) }}"
                        class="space-y-6">

                        @csrf

                        <!-- Preferred Visit Date -->
                        <div>

                            <label
                                for="visit_date"
                                class="block font-bold text-gray-800 mb-2">

                                Preferred Visit Date

                            </label>

                            <input
                                id="visit_date"
                                type="date"
                                name="visit_date"
                                value="{{ old('visit_date') }}"
                                min="{{ date('Y-m-d') }}"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 bg-white text-gray-800 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                required>

                        </div>

                        <!-- Phone Number -->
                        <div>

                            <label
                                for="phone"
                                class="block font-bold text-gray-800 mb-2">

                                Phone Number

                            </label>

                            <input
                                id="phone"
                                type="text"
                                name="phone"
                                value="{{ old('phone', auth()->user()->phone) }}"
                                placeholder="+254712345678"
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 bg-white text-gray-800 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition"
                                required>

                        </div>

                        <!-- Message -->
                        <div>

                            <label
                                for="message"
                                class="block font-bold text-gray-800 mb-2">

                                Message

                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="5"
                                placeholder="Tell the landlord anything important..."
                                class="w-full px-4 py-3 rounded-xl border-2 border-gray-300 bg-white text-gray-800 placeholder-gray-400 shadow-sm focus:border-orange-500 focus:ring-2 focus:ring-orange-200 focus:outline-none transition resize-y">{{ old('message') }}</textarea>

                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col-reverse sm:flex-row gap-4 pt-2">

                            <a
                                href="{{ url()->previous() }}"
                                class="w-full sm:w-auto flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 text-center font-bold py-4 px-6 rounded-xl transition">

                                ← Back

                            </a>

                            <button
                                type="submit"
                                class="w-full sm:flex-[2] bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transition">

                                📅 Send Viewing Request

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>