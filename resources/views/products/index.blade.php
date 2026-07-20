<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="max-w-7xl mx-auto py-10 px-8">

        <div class="flex justify-between items-center mb-10">

            <div>
                <h1 class="text-5xl font-bold text-slate-800">
                    🛍 Products
                </h1>

                <p class="text-gray-500 mt-2">
                    Manage your business products.
                </p>
            </div>

            <a href="{{ route('products.create') }}"
               class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-4 rounded-2xl font-bold shadow">

                + Add Product

            </a>

        </div>

        @if(session('success'))
            <div class="mb-8 bg-green-100 text-green-700 px-6 py-4 rounded-xl">
                {{ session('success') }}
            </div>
        @endif

        @if($products->count())

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @foreach($products as $product)

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                @if($product->image)

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-56 object-cover">

                @else

                    <div class="w-full h-56 bg-sky-100 flex items-center justify-center text-6xl">
                        📦
                    </div>

                @endif

                <div class="p-6">

                    <div class="flex justify-between items-start">

                        <div>

                            <h2 class="text-2xl font-bold">
                                {{ $product->name }}
                            </h2>

                            <p class="text-gray-500">
                                {{ $product->category }}
                            </p>

                        </div>

                        @if($product->featured)
                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">
                                ⭐ Featured
                            </span>
                        @endif

                    </div>

                    <div class="mt-6 flex justify-between">

                        <span class="font-bold text-green-600 text-xl">
                            KES {{ number_format($product->price) }}
                        </span>

                        <span class="text-gray-600">
                            Stock: {{ $product->quantity }}
                        </span>

                    </div>

                    <div class="mt-5">

                        @if($product->available)

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">
                                ✅ In Stock
                            </span>

                        @else

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">
                                ❌ Out of Stock
                            </span>

                        @endif

                    </div>

                    <div class="grid grid-cols-2 gap-3 mt-8">

                        <a href="{{ route('products.edit',$product) }}"
                           class="bg-sky-600 text-white py-3 rounded-xl text-center font-semibold">

                            ✏ Edit

                        </a>

                        <form action="{{ route('products.destroy',$product) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete this product?')"
                                class="w-full bg-red-600 text-white py-3 rounded-xl font-semibold">

                                🗑 Delete

                            </button>

                        </form>

                        <form
                            action="{{ route('products.featured',$product) }}"
                            method="POST"
                            class="col-span-2">

                            @csrf
                            @method('PATCH')

                            <button
                                class="w-full bg-yellow-500 hover:bg-yellow-600 text-white py-3 rounded-xl font-semibold">

                                ⭐ Set as Featured

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @else

        <div class="bg-white rounded-3xl shadow-xl p-20 text-center">

            <div class="text-7xl">
                📦
            </div>

            <h2 class="text-4xl font-bold mt-6">
                No Products Yet
            </h2>

            <p class="text-gray-500 mt-4">
                Add your first product to start selling.
            </p>

            <a href="{{ route('products.create') }}"
               class="inline-block mt-8 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold">

                Add Product

            </a>

        </div>

        @endif

    </div>

</div>

</x-app-layout>