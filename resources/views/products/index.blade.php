<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="max-w-7xl mx-auto py-6 sm:py-8 lg:py-10 px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-5 mb-8 sm:mb-10">

            <div class="min-w-0">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-slate-800 break-words">
                    🛍 Products
                </h1>

                <p class="text-gray-500 mt-2 text-sm sm:text-base">
                    Manage your business products.
                </p>

            </div>

            <a href="{{ route('products.create') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white px-5 sm:px-6 py-3 sm:py-4 rounded-2xl font-bold shadow transition text-sm sm:text-base">

                + Add Product

            </a>

        </div>

        @if(session('success'))
            <div class="mb-6 sm:mb-8 bg-green-100 text-green-700 px-4 sm:px-6 py-3 sm:py-4 rounded-xl text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        @if($products->count())

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6 lg:gap-8">

            @foreach($products as $product)

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                @if($product->image)

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-48 sm:h-56 object-cover">

                @else

                    <div class="w-full h-48 sm:h-56 bg-sky-100 flex items-center justify-center text-5xl sm:text-6xl">
                        📦
                    </div>

                @endif

                <div class="p-4 sm:p-6">

                    <div class="flex flex-col xs:flex-row sm:flex-row justify-between items-start gap-3">

                        <div class="min-w-0 flex-1">

                            <h2 class="text-xl sm:text-2xl font-bold break-words">
                                {{ $product->name }}
                            </h2>

                            <p class="text-gray-500 text-sm sm:text-base break-words">
                                {{ $product->category }}
                            </p>

                        </div>

                        @if($product->featured)
                            <span class="inline-flex shrink-0 bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs sm:text-sm font-semibold">
                                ⭐ Featured
                            </span>
                        @endif

                    </div>

                    <div class="mt-5 sm:mt-6 flex flex-col xs:flex-row xs:justify-between xs:items-center gap-2">

                        <span class="font-bold text-green-600 text-lg sm:text-xl">
                            KES {{ number_format($product->price) }}
                        </span>

                        <span class="text-gray-600 text-sm sm:text-base">
                            Stock: {{ $product->quantity }}
                        </span>

                    </div>

                    <div class="mt-4 sm:mt-5">

                        @if($product->available)

                            <span class="inline-flex bg-green-100 text-green-700 px-3 sm:px-4 py-2 rounded-full text-sm">
                                ✅ In Stock
                            </span>

                        @else

                            <span class="inline-flex bg-red-100 text-red-700 px-3 sm:px-4 py-2 rounded-full text-sm">
                                ❌ Out of Stock
                            </span>

                        @endif

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-6 sm:mt-8">

                        <a href="{{ route('products.edit',$product) }}"
                           class="bg-sky-600 hover:bg-sky-700 text-white py-3 rounded-xl text-center font-semibold transition">

                            ✏ Edit

                        </a>

                        <form action="{{ route('products.destroy',$product) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete this product?')"
                                class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-xl font-semibold transition">

                                🗑 Delete

                            </button>

                        </form>

                        <form
                            action="{{ route('products.featured',$product) }}"
                            method="POST"
                            class="col-span-1 sm:col-span-2">

                            @csrf
                            @method('PATCH')

                            <button
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-xl font-semibold transition">

                                ⭐ Set as Featured

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @else

        <div class="bg-white rounded-3xl shadow-xl p-8 sm:p-12 lg:p-20 text-center">

            <div class="text-6xl sm:text-7xl">
                📦
            </div>

            <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mt-5 sm:mt-6">
                No Products Yet
            </h2>

            <p class="text-gray-500 mt-3 sm:mt-4 text-sm sm:text-base">
                Add your first product to start selling.
            </p>

            <a href="{{ route('products.create') }}"
               class="inline-flex items-center justify-center mt-6 sm:mt-8 bg-orange-500 hover:bg-orange-600 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-bold transition text-sm sm:text-base">

                Add Product

            </a>

        </div>

        @endif

    </div>

</div>

</x-business-layout>