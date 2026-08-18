<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

        {{-- HERO --}}
        <section class="bg-gradient-to-r from-orange-600 via-amber-500 to-yellow-400 text-white">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">

                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-8">

                    <div>

                        <span class="inline-flex items-center bg-white/20 backdrop-blur-sm border border-white/30 px-4 py-2 rounded-full text-sm font-bold">
                            🎓 Student Marketplace
                        </span>

                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mt-4">
                            🛍️ Campus Marketplace
                        </h1>

                        <p class="mt-4 text-lg sm:text-xl text-orange-100 max-w-2xl">
                            Buy and sell books, electronics, furniture, phones and other items with fellow students.
                        </p>

                    </div>

                    <a
                        href="{{ route('marketplace.create') }}"
                        class="inline-flex items-center justify-center bg-white text-orange-600 px-7 sm:px-8 py-4 rounded-2xl font-bold shadow-xl hover:scale-105 hover:shadow-2xl transition duration-300"
                    >
                        ➕ Sell an Item
                    </a>

                </div>

            </div>

        </section>


        {{-- SEARCH --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-7 relative z-10">

            <div class="bg-white rounded-3xl shadow-2xl p-4 sm:p-6 border border-orange-100">

                <form
                    method="GET"
                    action="{{ route('marketplace.index') }}"
                    class="flex flex-col md:flex-row gap-4"
                >

                    <div class="relative flex-1">

                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl">
                            🔍
                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search books, laptops, furniture..."
                            class="w-full rounded-2xl border-2 border-gray-300 px-12 py-4 text-gray-700 placeholder-gray-400 focus:border-orange-500 focus:ring-2 focus:ring-orange-200 outline-none transition"
                        >

                    </div>

                    <button
                        type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-2xl font-bold shadow-md hover:shadow-lg transition"
                    >
                        Search
                    </button>

                </form>

            </div>

        </div>


        {{-- CATEGORIES --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-5">

                <div>

                    <p class="text-sm font-bold text-orange-600 uppercase tracking-wide">
                        Browse
                    </p>

                    <h2 class="text-2xl font-extrabold text-gray-800">
                        Shop by Category
                    </h2>

                </div>

            </div>

            <div class="flex flex-wrap gap-3">

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

                    <button
                        type="button"
                        class="bg-white border-2 border-gray-200 hover:border-orange-400 hover:bg-orange-50 px-5 py-3 rounded-full shadow-sm hover:shadow-md font-semibold text-gray-700 hover:text-orange-700 transition"
                    >
                        {{ $category }}
                    </button>

                @endforeach

            </div>

        </div>


        {{-- PRODUCTS --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    class="mb-8 bg-green-50 border-2 border-green-200 text-green-700 rounded-2xl p-5 shadow-sm flex items-start justify-between gap-4"
                >

                    <div class="flex items-center gap-3">

                        <span class="text-2xl">
                            ✅
                        </span>

                        <span class="font-semibold">
                            {{ session('success') }}
                        </span>

                    </div>

                    <button
                        type="button"
                        @click="show = false"
                        class="text-green-600 hover:text-green-800 font-bold text-xl"
                    >
                        ✕
                    </button>

                </div>

            @endif


            {{-- RESULTS HEADER --}}
            @if($items->count())

                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">

                    <div>

                        <p class="text-sm font-bold text-orange-600 uppercase tracking-wide">
                            Campus Deals
                        </p>

                        <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800">
                            Latest Items
                        </h2>

                    </div>

                    <div class="bg-white border border-gray-200 px-4 py-2 rounded-xl text-gray-600 font-semibold shadow-sm">

                        {{ $items->total() }} {{ $items->total() == 1 ? 'Item' : 'Items' }}

                    </div>

                </div>


                {{-- ITEM GRID --}}
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 lg:gap-8">

                    @foreach($items as $item)

                        <div class="group bg-white rounded-3xl shadow-lg overflow-hidden border border-orange-100 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                            {{-- IMAGE --}}
                            <div class="relative overflow-hidden">

                                @if($item->images->count())

                                    <img
                                        src="{{ asset('storage/'.$item->images->first()->image) }}"
                                        alt="{{ $item->title }}"
                                        class="w-full h-56 object-cover group-hover:scale-105 transition duration-500"
                                    >

                                @else

                                    <div class="h-56 bg-gradient-to-br from-orange-100 via-amber-50 to-yellow-100 flex items-center justify-center">

                                        <span class="text-7xl group-hover:scale-110 transition duration-300">
                                            📦
                                        </span>

                                    </div>

                                @endif


                                {{-- STATUS --}}
                                <div class="absolute top-4 left-4">

                                    @if($item->sold)

                                        <span class="bg-red-600 text-white px-3 py-1.5 rounded-full text-xs font-extrabold shadow-lg">
                                            🔴 SOLD
                                        </span>

                                    @else

                                        <span class="bg-green-600 text-white px-3 py-1.5 rounded-full text-xs font-extrabold shadow-lg">
                                            🟢 AVAILABLE
                                        </span>

                                    @endif

                                </div>


                                {{-- CATEGORY --}}
                                <div class="absolute top-4 right-4">

                                    <span class="bg-white/95 backdrop-blur-sm text-orange-700 px-3 py-1.5 rounded-full text-xs font-bold shadow">
                                        {{ ucfirst($item->category) }}
                                    </span>

                                </div>

                            </div>


                            {{-- CONTENT --}}
                            <div class="p-5 sm:p-6">

                                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-800 line-clamp-1">
                                    {{ $item->title }}
                                </h2>

                                <p class="text-gray-600 mt-3 text-sm leading-6 line-clamp-2 min-h-[48px]">
                                    {{ $item->description }}
                                </p>


                                {{-- PRICE --}}
                                <div class="mt-5">

                                    <p class="text-xs text-gray-500 uppercase font-bold tracking-wide">
                                        Price
                                    </p>

                                    <div class="text-2xl sm:text-3xl font-extrabold text-orange-600 mt-1">
                                        KSh {{ number_format($item->price) }}
                                    </div>

                                </div>


                                {{-- LOCATION --}}
                                <div class="mt-4 flex items-center gap-2 text-gray-500 text-sm">

                                    <span>
                                        📍
                                    </span>

                                    <span class="truncate">
                                        {{ $item->location }}
                                    </span>

                                </div>


                                {{-- SELLER --}}
                                <div class="mt-2 flex items-center gap-2 text-gray-500 text-sm">

                                    <span>
                                        👤
                                    </span>

                                    <span class="truncate">
                                        {{ $item->user->name }}
                                    </span>

                                </div>


                                {{-- BUTTONS --}}
                                <div class="mt-6 space-y-3">

                                    <a
                                        href="{{ route('marketplace.show',$item) }}"
                                        class="block bg-orange-600 hover:bg-orange-700 text-white text-center py-3.5 rounded-2xl font-bold shadow-md hover:shadow-lg transition"
                                    >
                                        👁️ View Item
                                    </a>


                                    @if(!$item->sold)

                                        <form
                                            action="{{ route('marketplace.favorite',$item) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="w-full bg-pink-600 hover:bg-pink-700 text-white py-3.5 rounded-2xl font-bold shadow-md hover:shadow-lg transition"
                                            >
                                                ❤️ Save Item
                                            </button>

                                        </form>

                                    @else

                                        <div class="w-full bg-gray-100 border border-gray-200 text-gray-500 text-center py-3.5 rounded-2xl font-bold">
                                            🚫 Item Sold
                                        </div>

                                    @endif

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


                {{-- PAGINATION --}}
                <div class="mt-10 bg-white rounded-2xl shadow-sm border border-gray-100 p-4 overflow-x-auto">

                    {{ $items->links() }}

                </div>


            @else

                {{-- EMPTY STATE --}}
                <div class="bg-white rounded-3xl shadow-xl border border-orange-100 p-10 sm:p-16 lg:p-20 text-center">

                    <div class="w-28 h-28 mx-auto rounded-full bg-orange-100 flex items-center justify-center">

                        <span class="text-6xl">
                            🛒
                        </span>

                    </div>

                    <p class="text-sm font-bold text-orange-600 uppercase tracking-wide mt-8">
                        Marketplace
                    </p>

                    <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mt-2">
                        No Items Found
                    </h2>

                    <p class="text-gray-500 mt-4 max-w-lg mx-auto leading-7">
                        There are currently no marketplace items matching your search.
                        Be the first student to put something up for sale.
                    </p>

                    <a
                        href="{{ route('marketplace.create') }}"
                        class="inline-flex items-center justify-center gap-2 mt-8 bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition"
                    >
                        ➕ Sell an Item
                    </a>

                </div>

            @endif

        </div>


        {{-- FLOATING SELL BUTTON --}}
        <a
            href="{{ route('marketplace.create') }}"
            class="fixed bottom-6 right-6 sm:bottom-8 sm:right-8 w-16 h-16 bg-orange-600 hover:bg-orange-700 text-white rounded-full flex items-center justify-center text-3xl font-bold shadow-2xl hover:scale-110 transition duration-300 z-40"
            title="Sell an Item"
        >
            +
        </a>

    </div>

</x-app-layout>