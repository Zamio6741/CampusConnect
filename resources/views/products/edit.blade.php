<x-app-layout>

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-xl p-10">

        <h1 class="text-4xl font-bold mb-10">
            ✏ Edit Product
        </h1>

        <form action="{{ route('products.update', $product) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-8">

                <!-- Product Name -->
                <div>
                    <label class="font-semibold">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $product->name) }}"
                        class="w-full border rounded-xl mt-2 p-4"
                        required>
                </div>

                <!-- Category -->
                <div>
                    <label class="font-semibold">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        value="{{ old('category', $product->category) }}"
                        class="w-full border rounded-xl mt-2 p-4">
                </div>

                <!-- Price -->
                <div>
                    <label class="font-semibold">
                        Price (KES)
                    </label>

                    <input
                        type="number"
                        step="0.01"
                        name="price"
                        value="{{ old('price', $product->price) }}"
                        class="w-full border rounded-xl mt-2 p-4"
                        required>
                </div>

                <!-- Quantity -->
                <div>
                    <label class="font-semibold">
                        Quantity
                    </label>

                    <input
                        type="number"
                        name="quantity"
                        value="{{ old('quantity', $product->quantity) }}"
                        class="w-full border rounded-xl mt-2 p-4"
                        required>
                </div>

            </div>

            <!-- Description -->
            <div class="mt-8">

                <label class="font-semibold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded-xl mt-2 p-4">{{ old('description', $product->description) }}</textarea>

            </div>

            <!-- Current Image -->
            <div class="mt-8">

                <label class="font-semibold block mb-3">
                    Current Product Image
                </label>

                @if($product->image)
                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="w-48 h-48 object-cover rounded-2xl border shadow">
                @else
                    <div class="w-48 h-48 rounded-2xl bg-gray-100 flex items-center justify-center text-5xl border">
                        🛍
                    </div>
                @endif

            </div>

            <!-- Upload New Image -->
            <div class="mt-8">

                <label class="font-semibold">
                    Replace Image (Optional)
                </label>

                <input
                    type="file"
                    name="image"
                    class="block mt-3">

                <p class="text-sm text-gray-500 mt-2">
                    Leave this empty if you don't want to change the current image.
                </p>

            </div>

            <!-- Buttons -->
            <div class="mt-10 flex gap-4">

                <button
                    type="submit"
                    class="bg-sky-600 hover:bg-sky-700 text-white px-10 py-4 rounded-2xl font-bold">

                    💾 Update Product

                </button>

                <a href="{{ route('products.index') }}"
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-10 py-4 rounded-2xl font-bold">

                    Cancel

                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>