<x-app-layout>

<div class="min-h-screen bg-slate-100">

    <!-- Cover -->

    @php
        $cover = $business->images->where('cover', true)->first();
    @endphp

    @if($cover)

        <img
            src="{{ asset('storage/'.$cover->image) }}"
            class="w-full h-80 object-cover">

    @else

        <div class="w-full h-80 bg-sky-200"></div>

    @endif


    <div class="max-w-7xl mx-auto -mt-20 relative z-10">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <div class="flex gap-8">

                <!-- Logo -->

                @if($business->logo)

                    <img
                        src="{{ asset('storage/'.$business->logo) }}"
                        class="w-36 h-36 rounded-3xl object-cover border-4 border-white shadow-lg">

                @else

                    <div
                        class="w-36 h-36 rounded-3xl bg-sky-100 flex items-center justify-center text-6xl">

                        🏪

                    </div>

                @endif


                <div class="flex-1">

                    <h1 class="text-5xl font-bold">

                        {{ $business->business_name }}

                    </h1>

                    <p class="text-gray-500 text-xl mt-2">

                        {{ $business->category }}

                    </p>

                    <div class="flex gap-6 mt-5">

                        <span>⭐ {{ number_format($business->rating,1) }}</span>

                        <span>👀 {{ $business->views }} views</span>

                        <span>📍 {{ $business->location }}</span>

                    </div>

                </div>

            </div>

            <hr class="my-10">

            <h2 class="text-2xl font-bold mb-4">

                About

            </h2>

            <p class="leading-8 text-gray-600">

                {{ $business->description }}

            </p>

            <hr class="my-10">

            <h2 class="text-2xl font-bold mb-6">

                Products

            </h2>

            <div class="grid md:grid-cols-3 gap-6">

                @forelse($business->products as $product)

                    <div class="border rounded-2xl p-5">

                        <h3 class="font-bold text-lg">

                            {{ $product->name }}

                        </h3>

                        <p class="text-gray-500 mt-2">

                            {{ $product->description }}

                        </p>

                        <div class="mt-4 font-bold text-sky-600">

                            KSh {{ number_format($product->price) }}

                        </div>

                    </div>

                @empty

                    <p>No products uploaded.</p>

                @endforelse

            </div>

            <hr class="my-10">

            <h2 class="text-2xl font-bold mb-6">

                Contact

            </h2>

            <div class="space-y-4">

                <p>📞 {{ $business->phone }}</p>

                <p>💬 {{ $business->whatsapp }}</p>

                <p>📧 {{ $business->email }}</p>

                <p>🌍 {{ $business->website }}</p>

                <p>📍 {{ $business->location }}</p>

            </div>

            <hr class="my-10">

<h2 class="text-2xl font-bold mb-6">
    💬 Contact Business
</h2>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('messages.store', $business) }}" method="POST">

    @csrf

    <textarea
        name="message"
        rows="5"
        class="w-full border rounded-2xl p-4"
        placeholder="Type your message..."
        required></textarea>

    <button
        type="submit"
        class="mt-5 bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-2xl font-bold">

        Send Message

    </button>

</form>

        </div>

    </div>

</div>

</x-app-layout>