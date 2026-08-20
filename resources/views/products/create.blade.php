<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 px-3 sm:px-5 lg:px-8">

    <div class="max-w-5xl mx-auto py-5 sm:py-8 lg:py-10">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl p-4 sm:p-6 md:p-8 lg:p-10">

            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-6 sm:mb-8 lg:mb-10 text-slate-800">
                🛍 Add New Product
            </h1>

            @if ($errors->any())
                <div class="mb-6 sm:mb-8 bg-red-100 border border-red-300 text-red-700 rounded-xl p-4 sm:p-5 text-sm sm:text-base">
                    <ul class="list-disc pl-5 space-y-1">
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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6 lg:gap-8">

                    <!-- Product Name -->
                    <div>

                        <label class="font-semibold text-sm sm:text-base text-gray-700 block">
                            Product Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 rounded-xl mt-2 p-3 sm:p-4 text-sm sm:text-base outline-none transition"
                            placeholder="Enter product name"
                            required>

                    </div>

                    <!-- Category -->
                    <div>

                        <label class="font-semibold text-sm sm:text-base text-gray-700 block">
                            Category
                        </label>

                        <input
                            type="text"
                            name="category"
                            value="{{ old('category') }}"
                            class="w-full border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 rounded-xl mt-2 p-3 sm:p-4 text-sm sm:text-base outline-none transition"
                            placeholder="Example: Electronics">

                    </div>

                    <!-- Price -->
                    <div>

                        <label class="font-semibold text-sm sm:text-base text-gray-700 block">
                            Price (KES)
                        </label>

                        <input
                            type="number"
                            name="price"
                            step="0.01"
                            value="{{ old('price') }}"
                            class="w-full border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 rounded-xl mt-2 p-3 sm:p-4 text-sm sm:text-base outline-none transition"
                            placeholder="0.00"
                            required>

                    </div>

                    <!-- Quantity -->
                    <div>

                        <label class="font-semibold text-sm sm:text-base text-gray-700 block">
                            Quantity
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            value="{{ old('quantity', 0) }}"
                            class="w-full border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 rounded-xl mt-2 p-3 sm:p-4 text-sm sm:text-base outline-none transition"
                            required>

                    </div>

                </div>

                <!-- Description -->
                <div class="mt-6 sm:mt-8">

                    <label class="font-semibold text-sm sm:text-base text-gray-700 block">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border border-gray-300 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 rounded-xl mt-2 p-3 sm:p-4 text-sm sm:text-base outline-none transition resize-y"
                        placeholder="Describe your product...">{{ old('description') }}</textarea>

                </div>

                <!-- Image -->
                <div class="mt-6 sm:mt-8">

                    <label class="font-semibold text-sm sm:text-base text-gray-700 block mb-3 text-gray-700">
                        Product Image
                    </label>

                    <div class="border-2 border-dashed border-sky-400 bg-sky-50/50 rounded-2xl p-4 sm:p-6 transition hover:border-sky-500 hover:bg-sky-50">

                        <label
                            for="product-image"
                            class="flex flex-col sm:flex-row items-center justify-center gap-3 sm:gap-4 cursor-pointer text-center sm:text-left">

                            <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-xl bg-white border border-sky-200 shadow-sm flex items-center justify-center text-2xl sm:text-3xl shrink-0">
                                📷
                            </div>

                            <div class="min-w-0">

                                <p class="font-semibold text-sky-700 text-sm sm:text-base">
                                    Choose Product Image
                                </p>

                                <p class="text-xs sm:text-sm text-gray-500 mt-1">
                                    Tap here to select an image from your device
                                </p>

                            </div>

                        </label>

                        <input
                            id="product-image"
                            type="file"
                            name="image"
                            accept="image/*"
                            class="mt-4 block w-full text-sm text-gray-700
                                   border-2 border-gray-300
                                   rounded-xl
                                   bg-white
                                   p-2
                                   shadow-sm
                                   cursor-pointer
                                   file:mr-3
                                   file:py-2
                                   file:px-3
                                   file:rounded-lg
                                   file:border-0
                                   file:bg-sky-600
                                   file:text-white
                                   file:font-semibold
                                   file:cursor-pointer
                                   hover:file:bg-sky-700
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-sky-300">

                        <p class="text-xs sm:text-sm text-gray-500 mt-3">
                            Upload a clear image of your product. JPG, JPEG, PNG or other supported image formats.
                        </p>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="mt-8 sm:mt-10 flex flex-col sm:flex-row gap-3 sm:gap-4">

                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white px-8 sm:px-10 py-3.5 sm:py-4 rounded-2xl font-bold text-sm sm:text-base shadow-md hover:shadow-lg transition">

                        💾 Save Product

                    </button>

                    <a
                        href="{{ route('products.index') }}"
                        class="w-full sm:w-auto text-center bg-gray-300 hover:bg-gray-400 active:bg-gray-500 text-gray-800 px-8 sm:px-10 py-3.5 sm:py-4 rounded-2xl font-bold text-sm sm:text-base transition">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-business-layout>