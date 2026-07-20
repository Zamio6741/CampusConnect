<x-app-layout>

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-xl p-10">

        <h1 class="text-4xl font-bold mb-10">
            🛍 Add New Product
        </h1>

        @if ($errors->any())
            <div class="mb-8 bg-red-100 border border-red-300 text-red-700 rounded-xl p-5">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="grid md:grid-cols-2 gap-8">

                <!-- Product Name -->
                <div>

                    <label class="font-semibold">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border rounded-xl mt-2 p-4"
                        placeholder="Enter product name"
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
                        value="{{ old('category') }}"
                        class="w-full border rounded-xl mt-2 p-4"
                        placeholder="Example: Electronics">

                </div>

                <!-- Price -->
                <div>

                    <label class="font-semibold">
                        Price (KES)
                    </label>

                    <input
                        type="number"
                        name="price"
                        step="0.01"
                        value="{{ old('price') }}"
                        class="w-full border rounded-xl mt-2 p-4"
                        placeholder="0.00"
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
                        value="{{ old('quantity', 0) }}"
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
                    class="w-full border rounded-xl mt-2 p-4"
                    placeholder="Describe your product...">{{ old('description') }}</textarea>

            </div>

            <!-- Image -->
            <div class="mt-8">

                <label class="font-semibold block mb-3">
                    Product Image
                </label>

                <input
                    type="file"
                    name="image"
                    class="block">

                <p class="text-sm text-gray-500 mt-2">
                    Upload a clear image of your product.
                </p>

            </div>

            <!-- Buttons -->
            <div class="mt-10 flex gap-4">

                <button
                    type="submit"
                    class="bg-sky-600 hover:bg-sky-700 text-white px-10 py-4 rounded-2xl font-bold">

                    💾 Save Product

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