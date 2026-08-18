<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-orange-100">

            <!-- Header -->
            <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white p-8 sm:p-10">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center text-3xl">
                        🔍
                    </div>

                    <div>

                        <h1 class="text-3xl sm:text-4xl font-extrabold">
                            Lost & Found
                        </h1>

                        <p class="mt-2 text-orange-100">
                            Report a lost item or an item you found.
                        </p>

                    </div>

                </div>

            </div>

            <!-- Validation Errors -->
            @if($errors->any())

                <div class="mx-8 mt-8 bg-red-50 border-2 border-red-200 rounded-2xl p-5 text-red-700">

                    <div class="flex items-center gap-2 font-bold mb-3">
                        <span>⚠️</span>
                        <span>Please correct the following errors:</span>
                    </div>

                    <ul class="list-disc ml-6 space-y-1">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <!-- Success Message -->
            @if(session('success'))

                <div class="mx-8 mt-8 bg-green-50 border-2 border-green-200 rounded-2xl p-5 text-green-700">

                    <div class="flex items-center gap-2 font-bold">

                        <span>✅</span>

                        <span>{{ session('success') }}</span>

                    </div>

                </div>

            @endif

            <!-- Form -->
            <form
                action="{{ route('lostfound.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 sm:p-10 space-y-8">

                @csrf

                <!-- Item Name -->
                <div>

                    <label
                        for="title"
                        class="block text-sm font-extrabold text-gray-700 mb-2">

                        Item Name
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Example: Black Samsung Phone"
                        class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100 @error('title') border-red-500 @enderror"
                        required>

                    @error('title')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Type -->
                <div>

                    <label
                        for="type"
                        class="block text-sm font-extrabold text-gray-700 mb-2">

                        Report Type
                        <span class="text-red-500">*</span>

                    </label>

                    <select
                        id="type"
                        name="type"
                        class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100 @error('type') border-red-500 @enderror"
                        required>

                        <option value="">Choose Report Type</option>

                        <option
                            value="lost"
                            {{ old('type') == 'lost' ? 'selected' : '' }}>
                            🔴 Lost Item
                        </option>

                        <option
                            value="found"
                            {{ old('type') == 'found' ? 'selected' : '' }}>
                            🟢 Found Item
                        </option>

                    </select>

                    @error('type')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Description -->
                <div>

                    <label
                        for="description"
                        class="block text-sm font-extrabold text-gray-700 mb-2">

                        Description
                        <span class="text-red-500">*</span>

                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Describe the item clearly. Include colour, brand, identifying marks or anything else that may help..."
                        class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100 resize-y @error('description') border-red-500 @enderror"
                        required>{{ old('description') }}</textarea>

                    @error('description')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Location + Date -->
                <div class="grid md:grid-cols-2 gap-6">

                    <!-- Location -->
                    <div>

                        <label
                            for="location"
                            class="block text-sm font-extrabold text-gray-700 mb-2">

                            Location
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ old('location') }}"
                            placeholder="Example: KU Main Gate"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100 @error('location') border-red-500 @enderror"
                            required>

                        @error('location')
                            <p class="mt-2 text-sm text-red-600 font-medium">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <!-- Date -->
                    <div>

                        <label
                            for="date"
                            class="block text-sm font-extrabold text-gray-700 mb-2">

                            Date
                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            id="date"
                            type="date"
                            name="date"
                            value="{{ old('date') }}"
                            class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100 @error('date') border-red-500 @enderror"
                            required>

                        @error('date')
                            <p class="mt-2 text-sm text-red-600 font-medium">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

                <!-- Phone -->
                <div>

                    <label
                        for="phone"
                        class="block text-sm font-extrabold text-gray-700 mb-2">

                        Phone Number
                        <span class="text-red-500">*</span>

                    </label>

                    <input
                        id="phone"
                        type="text"
                        name="phone"
                        value="{{ old('phone', auth()->user()->phone ?? '') }}"
                        placeholder="+254712345678"
                        class="w-full rounded-xl border-2 border-gray-300 bg-white px-4 py-3.5 text-gray-800 shadow-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-100 @error('phone') border-red-500 @enderror"
                        required>

                    <p class="mt-2 text-sm text-gray-500">
                        Students can use this number to contact you about the item.
                    </p>

                    @error('phone')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Image -->
                <div>

                    <label
                        for="image"
                        class="block text-sm font-extrabold text-gray-700 mb-2">

                        Upload Image
                        <span class="text-gray-400 font-normal">(Optional)</span>

                    </label>

                    <div class="border-2 border-dashed border-gray-300 rounded-2xl p-6 bg-gray-50 hover:border-orange-400 hover:bg-orange-50 transition">

                        <input
                            id="image"
                            type="file"
                            name="image"
                            accept="image/*"
                            class="block w-full text-sm text-gray-600
                                   file:mr-4 file:py-3 file:px-5
                                   file:rounded-xl file:border-0
                                   file:bg-orange-100 file:text-orange-700
                                   file:font-bold
                                   hover:file:bg-orange-200">

                        <p class="mt-3 text-sm text-gray-500">
                            Upload a clear photo that can help identify the item.
                        </p>

                    </div>

                    @error('image')
                        <p class="mt-2 text-sm text-red-600 font-medium">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <!-- Notice -->
                <div class="bg-orange-50 border-2 border-orange-200 rounded-2xl p-5">

                    <div class="flex gap-3">

                        <span class="text-2xl">
                            💡
                        </span>

                        <div>

                            <h3 class="font-extrabold text-orange-800">
                                Help other students identify the item
                            </h3>

                            <p class="text-sm text-orange-700 mt-1">
                                Provide accurate details and a clear location so the owner or finder can easily recognize the item.

                            </p>

                        </div>

                    </div>

                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-2">

                    <button
                        type="submit"
                        class="flex-1 bg-gradient-to-r from-orange-600 to-amber-500 hover:from-orange-700 hover:to-amber-600 text-white py-4 px-8 rounded-2xl font-extrabold shadow-lg hover:shadow-xl transition-all duration-200">

                        🔍 Post Lost/Found Item

                    </button>

                    <a
                        href="{{ route('lostfound.index') }}"
                        class="sm:w-40 bg-gray-100 hover:bg-gray-200 border-2 border-gray-200 text-gray-700 py-4 px-8 rounded-2xl font-bold text-center transition">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>