<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-10">

            {{-- BACK LINK --}}
            <div class="mb-6">
                <a
                    href="{{ route('marketplace.index') }}"
                    class="inline-flex items-center gap-2 text-orange-600 font-bold hover:text-orange-700 hover:underline transition"
                >
                    ← Back to Marketplace
                </a>
            </div>

            {{-- MAIN PRODUCT SECTION --}}
            <div class="grid lg:grid-cols-3 gap-8 lg:gap-10">

                {{-- LEFT SIDE --}}
                <div class="lg:col-span-2 space-y-8">

                    {{-- IMAGE CARD --}}
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-orange-100">

                        @if($item->images->count())

                            <div class="relative">

                                <img
                                    src="{{ asset('storage/'.$item->images->first()->image) }}"
                                    alt="{{ $item->title }}"
                                    class="w-full h-72 sm:h-96 lg:h-[500px] object-cover"
                                >

                                {{-- Availability Badge --}}
                                <div class="absolute top-5 left-5">

                                    @if($item->sold)

                                        <span class="inline-flex items-center gap-2 bg-red-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                            🔴 Sold
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                            🟢 Available
                                        </span>

                                    @endif

                                </div>

                            </div>

                        @else

                            <div class="h-72 sm:h-96 lg:h-[500px] bg-gradient-to-br from-orange-100 to-amber-100 flex flex-col items-center justify-center text-orange-400">

                                <span class="text-7xl sm:text-8xl">
                                    📦
                                </span>

                                <p class="mt-4 font-semibold text-orange-500">
                                    No image available
                                </p>

                            </div>

                        @endif

                    </div>

                    {{-- THUMBNAILS --}}
                    @if($item->images->count() > 1)

                        <div>

                            <h3 class="text-lg font-bold text-gray-700 mb-4">
                                📸 More Photos
                            </h3>

                            <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-3">

                                @foreach($item->images as $image)

                                    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-200 hover:border-orange-400 transition">

                                        <img
                                            src="{{ asset('storage/'.$image->image) }}"
                                            alt="{{ $item->title }}"
                                            class="h-24 sm:h-28 w-full object-cover"
                                        >

                                    </div>

                                @endforeach

                            </div>

                        </div>

                    @endif

                    {{-- DESCRIPTION CARD --}}
                    <div class="bg-white rounded-3xl shadow-xl border border-orange-100 p-6 sm:p-8">

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">

                            <div>

                                <p class="text-sm font-bold text-orange-600 uppercase tracking-wide">
                                    Marketplace Item
                                </p>

                                <h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mt-2">
                                    {{ $item->title }}
                                </h1>

                            </div>

                            <div class="shrink-0">

                                @if($item->sold)

                                    <span class="inline-block bg-red-100 border border-red-200 text-red-700 px-4 py-2 rounded-full font-bold">
                                        Sold
                                    </span>

                                @else

                                    <span class="inline-block bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded-full font-bold">
                                        Available
                                    </span>

                                @endif

                            </div>

                        </div>

                        <div class="mt-8 border-t border-gray-100 pt-7">

                            <h2 class="text-xl font-bold text-gray-800 mb-4">
                                📝 Description
                            </h2>

                            <p class="text-gray-600 leading-8 whitespace-pre-line">
                                {{ $item->description }}
                            </p>

                        </div>

                    </div>

                </div>

                {{-- RIGHT SIDE --}}
                <div>

                    <div class="bg-white rounded-3xl shadow-xl border border-orange-100 p-6 sm:p-8 lg:sticky lg:top-6">

                        {{-- PRICE --}}
                        <div class="text-center pb-7 border-b border-gray-100">

                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">
                                Asking Price
                            </p>

                            <h2 class="text-4xl sm:text-5xl font-extrabold text-orange-600 mt-2">
                                KSh {{ number_format($item->price) }}
                            </h2>

                        </div>

                        {{-- DETAILS --}}
                        <div class="mt-7 space-y-5">

                            {{-- Category --}}
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-orange-50 border border-orange-100">

                                <div class="text-2xl">
                                    🏷️
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Category
                                    </p>

                                    <h3 class="font-bold text-gray-800 mt-1">
                                        {{ ucfirst($item->category) }}
                                    </h3>
                                </div>

                            </div>

                            {{-- Condition --}}
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-yellow-50 border border-yellow-100">

                                <div class="text-2xl">
                                    ✨
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Condition
                                    </p>

                                    <h3 class="font-bold text-gray-800 mt-1">
                                        {{ ucfirst($item->condition) }}
                                    </h3>
                                </div>

                            </div>

                            {{-- Seller --}}
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-blue-50 border border-blue-100">

                                <div class="text-2xl">
                                    👤
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Seller
                                    </p>

                                    <h3 class="font-bold text-gray-800 mt-1">
                                        {{ $item->user->name }}
                                    </h3>
                                </div>

                            </div>

                            {{-- Location --}}
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-green-50 border border-green-100">

                                <div class="text-2xl">
                                    📍
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">
                                        Location
                                    </p>

                                    <h3 class="font-bold text-gray-800 mt-1">
                                        {{ $item->location }}
                                    </h3>
                                </div>

                            </div>

                            {{-- Phone --}}
                            <div class="flex items-start gap-4 p-4 rounded-2xl bg-gray-50 border border-gray-200">

                                <div class="text-2xl">
                                    📞
                                </div>

                                <div>

                                    <p class="text-sm text-gray-500">
                                        Seller Phone
                                    </p>

                                    @if($item->sold)

                                        <h3 class="font-bold text-red-600 mt-1">
                                            Hidden — Item Sold
                                        </h3>

                                    @else

                                        <h3 class="font-bold text-gray-800 mt-1 break-all">
                                            {{ $item->phone }}
                                        </h3>

                                    @endif

                                </div>

                            </div>

                        </div>

                        {{-- CALL SELLER --}}
                        @if(!$item->sold)

                            <a
                                href="tel:{{ $item->phone }}"
                                class="flex items-center justify-center gap-2 mt-8 w-full bg-orange-600 hover:bg-orange-700 text-white text-center py-4 rounded-2xl font-bold shadow-lg hover:shadow-xl transition"
                            >
                                📞 Call Seller
                            </a>

                        @else

                            <div class="mt-8 bg-gray-100 border border-gray-200 text-gray-600 text-center py-4 rounded-2xl font-bold">
                                🚫 This item has already been sold
                            </div>

                        @endif

                        {{-- SELLER CONTROLS --}}
                        @auth

                            @if(auth()->id() == $item->user_id)

                                <div class="mt-7 border-t border-gray-100 pt-6">

                                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wide mb-4">
                                        Seller Controls
                                    </p>

                                    @if(!$item->sold)

                                        <form
                                            action="{{ route('marketplace.sold', $item) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                onclick="return confirm('Mark this item as sold?')"
                                                class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-bold transition"
                                            >
                                                ✅ Mark as Sold
                                            </button>

                                        </form>

                                    @else

                                        <div class="bg-gray-100 border border-gray-200 text-gray-700 text-center py-4 rounded-2xl font-bold">
                                            ✔ This item has been sold
                                        </div>

                                    @endif

                                </div>

                            @endif

                        @endauth

                        {{-- SAVE ITEM --}}
                        @if(!$item->sold)

                            <form
                                action="{{ route('marketplace.favorite', $item) }}"
                                method="POST"
                                class="mt-4"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="w-full bg-pink-600 hover:bg-pink-700 text-white py-4 rounded-2xl font-bold shadow-md hover:shadow-lg transition"
                                >
                                    ❤️ Save Item
                                </button>

                            </form>

                        @endif

                    </div>

                </div>

            </div>

            {{-- SIMILAR ITEMS --}}
            @if(isset($similarItems) && $similarItems->count())

                <div class="mt-16">

                    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-8">

                        <div>

                            <p class="text-sm font-bold text-orange-600 uppercase tracking-wide">
                                You may also like
                            </p>

                            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-800 mt-1">
                                Similar Items
                            </h2>

                        </div>

                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

                        @foreach($similarItems as $similar)

                            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-orange-100 hover:-translate-y-1 hover:shadow-2xl transition-all duration-300">

                                {{-- IMAGE --}}
                                @if($similar->images->count())

                                    <div class="relative">

                                        <img
                                            src="{{ asset('storage/'.$similar->images->first()->image) }}"
                                            alt="{{ $similar->title }}"
                                            class="h-52 w-full object-cover"
                                        >

                                        @if($similar->sold)

                                            <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                Sold
                                            </span>

                                        @else

                                            <span class="absolute top-3 left-3 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                Available
                                            </span>

                                        @endif

                                    </div>

                                @else

                                    <div class="relative h-52 bg-gradient-to-br from-orange-100 to-amber-100 flex items-center justify-center">

                                        <span class="text-6xl">
                                            📦
                                        </span>

                                        @if($similar->sold)

                                            <span class="absolute top-3 left-3 bg-red-600 text-white px-3 py-1 rounded-full text-xs font-bold">
                                                Sold
                                            </span>

                                        @endif

                                    </div>

                                @endif

                                {{-- CARD CONTENT --}}
                                <div class="p-5">

                                    <p class="text-sm text-gray-500 truncate">
                                        {{ ucfirst($similar->category) }}
                                    </p>

                                    <h3 class="font-bold text-xl text-gray-800 mt-1 line-clamp-2">
                                        {{ $similar->title }}
                                    </h3>

                                    <div class="text-orange-600 font-extrabold text-2xl mt-3">
                                        KSh {{ number_format($similar->price) }}
                                    </div>

                                    <p class="text-gray-500 text-sm mt-2 truncate">
                                        📍 {{ $similar->location }}
                                    </p>

                                    @if($similar->sold)

                                        <div class="mt-3 text-red-600 font-bold">
                                            Sold
                                        </div>

                                    @endif

                                    <a
                                        href="{{ route('marketplace.show',$similar) }}"
                                        class="block mt-5 bg-orange-600 hover:bg-orange-700 text-white text-center py-3 rounded-2xl font-bold transition"
                                    >
                                        View Item
                                    </a>

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>