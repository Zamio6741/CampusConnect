<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="bg-gradient-to-r from-orange-600 to-amber-500 p-8 text-white">

                <h1 class="text-4xl font-extrabold">
                    🛍️ Sell an Item
                </h1>

                <p class="mt-2 text-orange-100">
                    Post your item and sell it to fellow students.
                </p>

            </div>

            @if($errors->any())

                <div class="m-6 bg-red-100 border border-red-300 rounded-xl p-5">

                    <ul class="list-disc ml-6 text-red-700">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form
                action="{{ route('marketplace.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 space-y-8">

                @csrf

                <div>

                    <label class="block font-bold mb-2">
                        Item Name
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full rounded-xl border-gray-300"
                        required>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-bold mb-2">
                            Category
                        </label>

                        <select
                            name="category"
                            class="w-full rounded-xl border-gray-300"
                            required>

                            <option value="">Choose Category</option>

                            <option>Books</option>
                            <option>Electronics</option>
                            <option>Furniture</option>
                            <option>Phones</option>
                            <option>Laptops</option>
                            <option>Clothes</option>
                            <option>Shoes</option>
                            <option>Bicycles</option>
                            <option>Gaming</option>
                            <option>Others</option>

                        </select>

                    </div>

                    <div>

                        <label class="block font-bold mb-2">
                            Condition
                        </label>

                        <select
                            name="condition"
                            class="w-full rounded-xl border-gray-300"
                            required>

                            <option>New</option>
                            <option selected>Used</option>

                        </select>

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-xl border-gray-300"
                        required>{{ old('description') }}</textarea>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-bold mb-2">
                            Price (KES)
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price') }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="block font-bold mb-2">
                            Location
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            class="w-full rounded-xl border-gray-300"
                            placeholder="e.g. KU Main Gate"
                            required>

                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-bold mb-2">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone', auth()->user()->phone) }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="block font-bold mb-2">
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp') }}"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                </div>

                <div>

                    <label class="block font-bold mb-2">
                        Upload Photos
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        class="w-full rounded-xl border-gray-300">

                </div>

                <div class="flex gap-4">

                    <button
                        type="submit"
                        class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-xl font-bold">

                        🚀 Publish Item

                    </button>

                    <a
                        href="{{ route('marketplace.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 px-8 py-4 rounded-xl font-bold">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>