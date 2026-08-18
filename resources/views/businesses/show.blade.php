<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-6xl mx-auto px-6">

        <!-- Back -->
        <div class="mb-6">

            <a
                href="{{ route('businesses.index') }}"
                class="inline-flex items-center gap-2 text-orange-600 font-bold hover:text-orange-700 hover:underline transition">

                ← Back to Businesses

            </a>

        </div>

        <!-- Main Card -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100">

            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white p-8 md:p-10">

                <div class="flex flex-col lg:flex-row justify-between gap-8">

                    <div>

                        <div class="flex items-center gap-3 mb-4">

                            <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-bold">
                                🏢 Campus Business
                            </span>

                            @if($business->category)

                                <span class="bg-white/20 px-4 py-2 rounded-full text-sm font-bold">
                                    {{ $business->category }}
                                </span>

                            @endif

                        </div>

                        <h1 class="text-4xl md:text-5xl font-extrabold">

                            {{ $business->name }}

                        </h1>

                        <p class="mt-3 text-orange-100 text-lg">

                            Find out more about this student-focused business.

                        </p>

                    </div>

                    <!-- Owner Controls -->
                    @if(auth()->check() && auth()->id() == $business->user_id)

                        <div class="flex flex-wrap gap-3 lg:self-start">

                            <a
                                href="{{ route('businesses.edit', $business) }}"
                                class="bg-white text-blue-600 hover:bg-blue-50 px-5 py-3 rounded-xl font-bold shadow-lg transition">

                                ✏️ Edit

                            </a>

                            <form
                                action="{{ route('businesses.destroy', $business) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this business? This action cannot be undone.')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-bold shadow-lg transition">

                                    🗑️ Delete

                                </button>

                            </form>

                        </div>

                    @endif

                </div>

            </div>

            <!-- Content -->
            <div class="p-8 md:p-10">

                <div class="grid lg:grid-cols-3 gap-10">

                    <!-- Description -->
                    <div class="lg:col-span-2">

                        <div>

                            <h2 class="text-2xl font-extrabold text-gray-800 flex items-center gap-3">

                                <span class="w-10 h-10 bg-orange-100 rounded-xl flex items-center justify-center">
                                    📖
                                </span>

                                About This Business

                            </h2>

                            <div class="mt-6 bg-orange-50 border border-orange-100 rounded-2xl p-6">

                                <p class="text-gray-700 leading-8 text-lg">

                                    {{ $business->description }}

                                </p>

                            </div>

                        </div>

                        <!-- Contact Information -->
                        <div class="mt-10">

                            <h2 class="text-2xl font-extrabold text-gray-800 flex items-center gap-3">

                                <span class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                                    📞
                                </span>

                                Contact Information

                            </h2>

                            <div class="grid md:grid-cols-2 gap-5 mt-6">

                                <!-- Location -->
                                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5">

                                    <div class="flex items-start gap-4">

                                        <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center text-2xl">
                                            📍
                                        </div>

                                        <div>

                                            <p class="text-sm text-gray-500 font-semibold">
                                                Location
                                            </p>

                                            <p class="font-bold text-gray-800 mt-1">
                                                {{ $business->location }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <!-- Phone -->
                                <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5">

                                    <div class="flex items-start gap-4">

                                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl">
                                            📞
                                        </div>

                                        <div>

                                            <p class="text-sm text-gray-500 font-semibold">
                                                Phone
                                            </p>

                                            <p class="font-bold text-gray-800 mt-1">
                                                {{ $business->phone }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <!-- WhatsApp -->
                                @if($business->whatsapp)

                                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5">

                                        <div class="flex items-start gap-4">

                                            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-2xl">
                                                💬
                                            </div>

                                            <div>

                                                <p class="text-sm text-gray-500 font-semibold">
                                                    WhatsApp
                                                </p>

                                                <p class="font-bold text-gray-800 mt-1">
                                                    {{ $business->whatsapp }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                @endif

                                <!-- Opening Hours -->
                                @if($business->opening_hours)

                                    <div class="bg-gray-50 border border-gray-200 rounded-2xl p-5">

                                        <div class="flex items-start gap-4">

                                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-2xl">
                                                🕒
                                            </div>

                                            <div>

                                                <p class="text-sm text-gray-500 font-semibold">
                                                    Opening Hours
                                                </p>

                                                <p class="font-bold text-gray-800 mt-1">
                                                    {{ $business->opening_hours }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                    <!-- Right Contact Card -->
                    <div>

                        <div class="bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 border-2 border-orange-100 rounded-3xl p-7 lg:sticky lg:top-6">

                            <div class="text-center">

                                <div class="w-20 h-20 mx-auto bg-orange-600 text-white rounded-3xl flex items-center justify-center text-4xl shadow-lg">

                                    🏢

                                </div>

                                <h2 class="text-2xl font-extrabold text-gray-800 mt-5">

                                    {{ $business->name }}

                                </h2>

                                <p class="text-orange-600 font-semibold mt-1">

                                    {{ $business->category }}

                                </p>

                            </div>

                            <div class="mt-8 space-y-4">

                                <!-- Call -->
                                @if($business->phone)

                                    <a
                                        href="tel:{{ $business->phone }}"
                                        class="flex items-center justify-center gap-3 w-full bg-orange-600 hover:bg-orange-700 text-white py-4 rounded-2xl font-bold shadow-lg transition">

                                        📞 Call Business

                                    </a>

                                @endif

                                <!-- WhatsApp -->
                                @if($business->whatsapp)

                                    @php
                                        $whatsappNumber = preg_replace('/[^0-9]/', '', $business->whatsapp);
                                    @endphp

                                    <a
                                        href="https://wa.me/{{ $whatsappNumber }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="flex items-center justify-center gap-3 w-full bg-green-600 hover:bg-green-700 text-white py-4 rounded-2xl font-bold shadow-lg transition">

                                        💬 WhatsApp

                                    </a>

                                @endif

                            </div>

                            @if($business->location)

                                <div class="mt-6 bg-white rounded-2xl p-5 border border-orange-100">

                                    <p class="text-sm text-gray-500 font-semibold">
                                        📍 Business Location
                                    </p>

                                    <p class="font-bold text-gray-800 mt-2">
                                        {{ $business->location }}
                                    </p>

                                </div>

                            @endif

                            @if($business->opening_hours)

                                <div class="mt-4 bg-white rounded-2xl p-5 border border-orange-100">

                                    <p class="text-sm text-gray-500 font-semibold">
                                        🕒 Opening Hours
                                    </p>

                                    <p class="font-bold text-gray-800 mt-2">
                                        {{ $business->opening_hours }}
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Bottom Navigation -->
        <div class="mt-8 flex flex-col sm:flex-row justify-between items-center gap-4">

            <a
                href="{{ route('businesses.index') }}"
                class="w-full sm:w-auto text-center bg-white border-2 border-orange-100 text-orange-600 px-7 py-3 rounded-xl font-bold hover:bg-orange-50 transition">

                ← Back to Businesses

            </a>

            @if(auth()->check() && auth()->id() == $business->user_id)

                <a
                    href="{{ route('businesses.edit', $business) }}"
                    class="w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 text-white px-7 py-3 rounded-xl font-bold transition">

                    ✏️ Edit Business

                </a>

            @endif

        </div>

    </div>

</div>

</x-app-layout>