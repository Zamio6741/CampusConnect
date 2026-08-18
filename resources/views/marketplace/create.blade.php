<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-5xl mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r from-orange-600 to-amber-500 p-8 text-white">

                <h1 class="text-4xl font-extrabold">
                    🛍️ Sell an Item
                </h1>

                <p class="mt-2 text-orange-100">
                    Post your item and sell it to fellow students.
                </p>

            </div>

            {{-- VALIDATION ERRORS --}}
            @if($errors->any())

                <div class="m-6 bg-red-50 border-2 border-red-300 rounded-2xl p-5 text-red-700">

                    <div class="font-bold mb-2">
                        Please correct the following errors:
                    </div>

                    <ul class="list-disc ml-6 space-y-1">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div class="mx-6 mt-6 bg-green-50 border-2 border-green-300 rounded-2xl p-5 text-green-700 font-semibold">

                    {{ session('success') }}

                </div>

            @endif

            <form
                action="{{ route('marketplace.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 space-y-8">

                @csrf

                {{-- ITEM NAME --}}
                <div>

                    <label
                        for="title"
                        class="block font-bold text-gray-800 mb-2">

                        Item Name

                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="e.g. HP Laptop, Mathematics Book, Office Chair"
                        class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition"
                        required>

                </div>

                {{-- CATEGORY + CONDITION --}}
                <div class="grid md:grid-cols-2 gap-6">

                    {{-- CATEGORY --}}
                    <div>

                        <label
                            for="category"
                            class="block font-bold text-gray-800 mb-2">

                            Category

                        </label>

                        <select
                            id="category"
                            name="category"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                            <option value="">Choose Category</option>

                            <option value="Books"
                                {{ old('category') == 'Books' ? 'selected' : '' }}>
                                Books
                            </option>

                            <option value="Electronics"
                                {{ old('category') == 'Electronics' ? 'selected' : '' }}>
                                Electronics
                            </option>

                            <option value="Furniture"
                                {{ old('category') == 'Furniture' ? 'selected' : '' }}>
                                Furniture
                            </option>

                            <option value="Phones"
                                {{ old('category') == 'Phones' ? 'selected' : '' }}>
                                Phones
                            </option>

                            <option value="Laptops"
                                {{ old('category') == 'Laptops' ? 'selected' : '' }}>
                                Laptops
                            </option>

                            <option value="Clothes"
                                {{ old('category') == 'Clothes' ? 'selected' : '' }}>
                                Clothes
                            </option>

                            <option value="Shoes"
                                {{ old('category') == 'Shoes' ? 'selected' : '' }}>
                                Shoes
                            </option>

                            <option value="Bicycles"
                                {{ old('category') == 'Bicycles' ? 'selected' : '' }}>
                                Bicycles
                            </option>

                            <option value="Gaming"
                                {{ old('category') == 'Gaming' ? 'selected' : '' }}>
                                Gaming
                            </option>

                            <option value="Others"
                                {{ old('category') == 'Others' ? 'selected' : '' }}>
                                Others
                            </option>

                        </select>

                    </div>

                    {{-- CONDITION --}}
                    <div>

                        <label
                            for="condition"
                            class="block font-bold text-gray-800 mb-2">

                            Condition

                        </label>

                        <select
                            id="condition"
                            name="condition"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                            <option value="New"
                                {{ old('condition') == 'New' ? 'selected' : '' }}>
                                New
                            </option>

                            <option value="Used"
                                {{ old('condition', 'Used') == 'Used' ? 'selected' : '' }}>
                                Used
                            </option>

                        </select>

                    </div>

                </div>

                {{-- DESCRIPTION --}}
                <div>

                    <label
                        for="description"
                        class="block font-bold text-gray-800 mb-2">

                        Description

                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="5"
                        placeholder="Describe the item, its condition, features, and anything buyers should know..."
                        class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                               focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                               focus:outline-none transition resize-y"
                        required>{{ old('description') }}</textarea>

                </div>

                {{-- PRICE + LOCATION --}}
                <div class="grid md:grid-cols-2 gap-6">

                    {{-- PRICE --}}
                    <div>

                        <label
                            for="price"
                            class="block font-bold text-gray-800 mb-2">

                            Price (KES)

                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 font-bold text-gray-500">
                                KSh
                            </span>

                            <input
                                id="price"
                                type="number"
                                name="price"
                                value="{{ old('price') }}"
                                min="0"
                                step="1"
                                placeholder="5000"
                                class="w-full rounded-xl border-2 border-gray-300 bg-white pl-16 pr-4 py-3 shadow-sm
                                       focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                       focus:outline-none transition"
                                required>

                        </div>

                    </div>

                    {{-- LOCATION --}}
                    <div>

                        <label
                            for="location"
                            class="block font-bold text-gray-800 mb-2">

                            Location

                        </label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            placeholder="e.g. KU Main Gate"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>

                </div>

                {{-- PHONE + WHATSAPP --}}
                <div class="grid md:grid-cols-2 gap-6">

                    {{-- PHONE --}}
                    <div>

                        <label
                            for="phone"
                            class="block font-bold text-gray-800 mb-2">

                            Phone

                        </label>

                        <input
                            id="phone"
                            type="text"
                            name="phone"
                            value="{{ old('phone', auth()->user()->phone) }}"
                            placeholder="+254712345678"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition"
                            required>

                    </div>

                    {{-- WHATSAPP --}}
                    <div>

                        <label
                            for="whatsapp"
                            class="block font-bold text-gray-800 mb-2">

                            WhatsApp

                        </label>

                        <input
                            id="whatsapp"
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            placeholder="+254712345678"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3 shadow-sm
                                   focus:border-orange-500 focus:ring-2 focus:ring-orange-200
                                   focus:outline-none transition">

                    </div>

                </div>

                {{-- PHOTOS --}}
                <div>

                    <label
                        for="images"
                        class="block font-bold text-gray-800 mb-2">

                        Upload Photos

                    </label>

                    <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 bg-gray-50
                                hover:border-orange-400 hover:bg-orange-50 transition">

                        <input
                            id="images"
                            type="file"
                            name="images[]"
                            multiple
                            accept="image/*"
                            class="w-full text-gray-700
                                   file:mr-4 file:py-3 file:px-5
                                   file:rounded-xl file:border-0
                                   file:bg-orange-600 file:text-white
                                   file:font-bold
                                   hover:file:bg-orange-700
                                   file:cursor-pointer">

                        <p class="text-sm text-gray-500 mt-3">
                            You can upload multiple clear photos of your item.
                        </p>

                    </div>

                </div>

                {{-- ACTIONS --}}
                <div class="flex flex-col sm:flex-row gap-4 pt-4">

                    <button
                        type="submit"
                        class="bg-orange-600 hover:bg-orange-700 active:bg-orange-800
                               text-white px-8 py-4 rounded-xl font-bold shadow-lg
                               hover:shadow-xl transition">

                        🚀 Publish Item

                    </button>

                    <a
                        href="{{ route('marketplace.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800
                               px-8 py-4 rounded-xl font-bold text-center
                               border-2 border-gray-300 transition">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>