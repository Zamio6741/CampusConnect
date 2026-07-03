<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <!-- Hero -->
    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-8 py-12">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

                <div>

                    <h1 class="text-5xl font-extrabold">
                        🛍️ Campus Marketplace
                    </h1>

                    <p class="mt-4 text-xl text-orange-100">
                        Buy and sell items with fellow students.
                    </p>

                </div>

                <a href="{{ route('marketplace.create') }}"
                   class="bg-white text-orange-600 px-8 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">

                    ➕ Sell an Item

                </a>

            </div>

        </div>

    </section>

    <!-- Search -->

    <div class="max-w-7xl mx-auto px-8 mt-10">

        <div class="bg-white rounded-3xl shadow-xl p-6">

            <input
                type="text"
                placeholder="🔍 Search books, laptops, furniture..."
                class="w-full rounded-2xl border-gray-300">

        </div>

    </div>

    <!-- Categories -->

    <div class="max-w-7xl mx-auto px-8 mt-8">

        <div class="flex flex-wrap gap-4">

            @foreach([
                '📚 Books',
                '💻 Electronics',
                '🪑 Furniture',
                '👕 Clothes',
                '📱 Phones',
                '🎮 Gaming',
                '🚲 Bicycles',
                '🎒 Others'
            ] as $category)

                <span class="bg-white px-5 py-3 rounded-full shadow font-semibold">

                    {{ $category }}

                </span>

            @endforeach

        </div>

    </div>

    <!-- Products -->

    <div class="max-w-7xl mx-auto px-8 py-12">

        @if(session('success'))

            <div class="bg-green-500 text-white rounded-2xl p-5 mb-8">

                {{ session('success') }}

            </div>

        @endif

        @if($items->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                @foreach($items as $item)

                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:shadow-2xl transition">

                        @if($item->images->count())

                            <img
                                src="{{ asset('storage/'.$item->images->first()->image) }}"
                                class="w-full h-56 object-cover">

                        @else

                            <div class="h-56 bg-orange-100 flex items-center justify-center text-7xl">

                                📦

                            </div>

                        @endif

                        <div class="p-6">

                            <div class="flex justify-between items-center">

                                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-bold">

                                    {{ $item->category }}

                                </span>

                                @if($item->sold)

                                    <span class="text-red-600 font-bold">
                                        SOLD
                                    </span>

                                @endif

                            </div>

                            <h2 class="text-2xl font-bold mt-4">

                                {{ $item->title }}

                            </h2>

                            <p class="text-gray-600 mt-3 line-clamp-2">

                                {{ $item->description }}

                            </p>

                            <div class="mt-6">

                                <div class="text-3xl font-extrabold text-orange-600">

                                    KSh {{ number_format($item->price) }}

                                </div>

                            </div>

                            <div class="mt-4 text-gray-500">

                                📍 {{ $item->location }}

                            </div>

                            <div class="mt-2 text-gray-500">

                                👤 {{ $item->user->name }}

                            </div>

                            <!-- Buttons -->

                            <div class="mt-6 space-y-3">

                                <a href="{{ route('marketplace.show',$item) }}"
                                   class="block bg-orange-600 hover:bg-orange-700 text-white text-center py-3 rounded-2xl font-bold">

                                    View Item

                                </a>

                                <form action="{{ route('marketplace.favorite',$item) }}"
                                      method="POST">

                                    @csrf

                                    <button
                                        class="w-full bg-pink-500 hover:bg-pink-600 text-white py-3 rounded-2xl font-bold">

                                        ❤️ Save Item

                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="mt-10">

                {{ $items->links() }}

            </div>

        @else

            <div class="bg-white rounded-3xl shadow-xl p-20 text-center">

                <div class="text-8xl">

                    🛒

                </div>

                <h2 class="text-4xl font-bold mt-6">

                    No Items Yet

                </h2>

                <p class="text-gray-500 mt-4">

                    Be the first student to sell something.

                </p>

                <a href="{{ route('marketplace.create') }}"
                   class="mt-8 inline-block bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-2xl font-bold">

                    Sell First Item

                </a>

            </div>

        @endif

    </div>

</div>

</x-app-layout>