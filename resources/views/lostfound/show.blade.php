<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- BACK BUTTON --}}
        <div class="mb-6">

            <a
                href="{{ route('lostfound.index') }}"
                class="inline-flex items-center gap-2 text-orange-600 font-bold hover:text-orange-700 hover:underline transition">

                ← Back to Lost & Found

            </a>

        </div>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))

            <div class="mb-6 bg-green-50 border-2 border-green-300 text-green-700 rounded-2xl p-5 font-semibold">

                {{ session('success') }}

            </div>

        @endif

        {{-- ERROR MESSAGE --}}
        @if($errors->any())

            <div class="mb-6 bg-red-50 border-2 border-red-300 text-red-700 rounded-2xl p-5">

                <p class="font-bold mb-2">
                    Please correct the following:
                </p>

                <ul class="list-disc ml-6 space-y-1">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="grid lg:grid-cols-3 gap-10">

            {{-- ===================================================== --}}
            {{-- LEFT SIDE --}}
            {{-- ===================================================== --}}

            <div class="lg:col-span-2">

                {{-- IMAGE CARD --}}
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-orange-100">

                    @if($item->image)

                        <img
                            src="{{ asset('storage/'.$item->image) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-[500px] object-cover">

                    @else

                        <div class="h-[500px] bg-gradient-to-br from-orange-100 to-amber-100 flex flex-col items-center justify-center">

                            <div class="text-8xl">
                                🎒
                            </div>

                            <p class="mt-5 text-gray-500 font-semibold">
                                No image available
                            </p>

                        </div>

                    @endif

                </div>

                {{-- DESCRIPTION CARD --}}
                <div class="bg-white rounded-3xl shadow-xl mt-8 p-8 border border-orange-100">

                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4">

                        <div>

                            <p class="text-sm uppercase tracking-wider text-orange-600 font-bold mb-2">
                                Lost & Found Item
                            </p>

                            <h1 class="text-4xl font-extrabold text-gray-800">
                                {{ $item->title }}
                            </h1>

                        </div>

                        @if($item->type === 'lost')

                            <span class="inline-flex w-fit bg-red-100 text-red-700 px-5 py-2 rounded-full font-extrabold border border-red-200">

                                🔴 LOST

                            </span>

                        @else

                            <span class="inline-flex w-fit bg-green-100 text-green-700 px-5 py-2 rounded-full font-extrabold border border-green-200">

                                🟢 FOUND

                            </span>

                        @endif

                    </div>

                    <div class="border-t border-gray-100 mt-8 pt-8">

                        <h2 class="text-2xl font-bold text-gray-800 mb-4">
                            Description
                        </h2>

                        <p class="text-gray-700 leading-8 whitespace-pre-line">

                            {{ $item->description }}

                        </p>

                    </div>

                </div>

            </div>

            {{-- ===================================================== --}}
            {{-- RIGHT SIDE --}}
            {{-- ===================================================== --}}

            <div>

                <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-6 border border-orange-100">

                    <div class="flex items-center gap-3">

                        <div class="w-12 h-12 bg-orange-100 rounded-2xl flex items-center justify-center text-2xl">
                            📋
                        </div>

                        <div>

                            <h2 class="text-2xl font-extrabold text-gray-800">
                                Item Details
                            </h2>

                            <p class="text-sm text-gray-500">
                                Information about this report
                            </p>

                        </div>

                    </div>

                    <div class="space-y-6 mt-8">

                        {{-- LOCATION --}}
                        <div class="border-b border-gray-100 pb-5">

                            <p class="text-sm text-gray-500 font-semibold">
                                📍 Location
                            </p>

                            <h3 class="font-bold text-lg text-gray-800 mt-1">
                                {{ $item->location }}
                            </h3>

                        </div>

                        {{-- DATE --}}
                        <div class="border-b border-gray-100 pb-5">

                            <p class="text-sm text-gray-500 font-semibold">
                                📅 Date
                            </p>

                            <h3 class="font-bold text-lg text-gray-800 mt-1">

                                {{ $item->date ? $item->date->format('d M Y') : 'Not provided' }}

                            </h3>

                        </div>

                        {{-- POSTED BY --}}
                        <div class="border-b border-gray-100 pb-5">

                            <p class="text-sm text-gray-500 font-semibold">
                                👤 Posted By
                            </p>

                            <h3 class="font-bold text-lg text-gray-800 mt-1">

                                {{ $item->user->name ?? 'Unknown User' }}

                            </h3>

                        </div>

                        {{-- CONTACT --}}
                        <div>

                            <p class="text-sm text-gray-500 font-semibold">
                                📞 Contact
                            </p>

                            <h3 class="font-bold text-lg text-gray-800 mt-1">

                                {{ $item->phone ?? 'Not provided' }}

                            </h3>

                        </div>

                    </div>

                    {{-- CONTACT BUTTON --}}
                    @if($item->phone)

                        <a
                            href="tel:{{ $item->phone }}"
                            class="block mt-8 bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white text-center py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition">

                            📞 Contact {{ $item->type === 'lost' ? 'Owner' : 'Reporter' }}

                        </a>

                    @else

                        <div class="mt-8 bg-gray-100 text-gray-600 text-center py-4 rounded-2xl font-bold">

                            📞 Contact information unavailable

                        </div>

                    @endif

                    {{-- WHATSAPP --}}
                    @if(!empty($item->whatsapp))

                        @php
                            $whatsappNumber = preg_replace('/[^0-9]/', '', $item->whatsapp);

                            if (str_starts_with($whatsappNumber, '0')) {
                                $whatsappNumber = '254' . substr($whatsappNumber, 1);
                            }
                        @endphp

                        <a
                            href="https://wa.me/{{ $whatsappNumber }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="block mt-4 bg-green-600 hover:bg-green-700 text-white text-center py-4 rounded-2xl font-bold shadow-lg transition">

                            💬 WhatsApp

                        </a>

                    @endif

                    {{-- OWNER INFORMATION --}}
                    @auth

                        @if(auth()->id() === $item->user_id)

                            <div class="mt-8 bg-orange-50 border border-orange-200 rounded-2xl p-5">

                                <p class="text-orange-700 font-bold">
                                    🔐 You posted this item
                                </p>

                                <p class="text-sm text-orange-600 mt-1">
                                    This listing belongs to your account.
                                </p>

                            </div>

                        @endif

                    @endauth

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>