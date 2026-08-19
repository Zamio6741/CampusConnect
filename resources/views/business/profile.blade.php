<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Header -->

            <div class="bg-gradient-to-r from-sky-600 to-blue-700 text-white p-10">

                <div class="flex justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-bold">
                            🏪 Business Profile
                        </h1>

                        <p class="mt-2 text-sky-100">
                            View your business information.
                        </p>

                    </div>

                    <a href="{{ route('businesses.edit',$business) }}"
                       class="bg-white text-sky-700 px-6 py-3 rounded-xl font-bold hover:bg-sky-100">

                        ✏ Edit Profile

                    </a>

                </div>

            </div>

            <div class="p-10">
                <div class="grid lg:grid-cols-3 gap-10">

    <!-- Logo -->

    <div class="text-center">

        @php
            $cover = $business->images()->where('cover', true)->first();
        @endphp

        @if($cover)

            <img src="{{ asset('storage/'.$cover->image) }}"
                 class="w-64 h-64 mx-auto rounded-3xl object-cover shadow-lg">

        @elseif($business->logo)

            <img src="{{ asset('storage/'.$business->logo) }}"
                 class="w-64 h-64 mx-auto rounded-3xl object-cover shadow-lg">

        @else

            <div class="w-64 h-64 mx-auto rounded-3xl bg-sky-100 flex items-center justify-center text-8xl shadow-lg">
                🏪
            </div>

        @endif

        <h2 class="text-3xl font-bold mt-6">
            {{ $business->business_name }}
        </h2>

        <p class="text-gray-500 text-lg">
            {{ $business->category }}
        </p>

        <div class="mt-6">

            @if($business->status == 'Approved')

                <span class="bg-green-100 text-green-700 px-5 py-2 rounded-full font-semibold">
                    ✅ Approved
                </span>

            @elseif($business->status == 'Rejected')

                <span class="bg-red-100 text-red-700 px-5 py-2 rounded-full font-semibold">
                    ❌ Rejected
                </span>

            @else

                <span class="bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full font-semibold">
                    ⏳ Pending Approval
                </span>

            @endif

        </div>

    </div>

    <!-- Details -->

    <div class="lg:col-span-2">

        <h3 class="text-2xl font-bold mb-6">
            Business Information
        </h3>

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <p class="text-gray-500">Business Name</p>
                <p class="font-bold text-lg">{{ $business->business_name }}</p>
            </div>

            <div>
                <p class="text-gray-500">Category</p>
                <p class="font-bold text-lg">{{ $business->category }}</p>
            </div>

            <div>
                <p class="text-gray-500">Phone</p>
                <p class="font-bold text-lg">{{ $business->phone }}</p>
            </div>

            <div>
                <p class="text-gray-500">WhatsApp</p>
                <p class="font-bold text-lg">{{ $business->whatsapp }}</p>
            </div>

            <div>
                <p class="text-gray-500">Email</p>
                <p class="font-bold text-lg">{{ $business->email }}</p>
            </div>

            <div>
                <p class="text-gray-500">Location</p>
                <p class="font-bold text-lg">{{ $business->location }}</p>
            </div>

        </div>

        <div class="mt-8">

            <h3 class="text-2xl font-bold mb-4">
                Description
            </h3>

            <div class="bg-slate-50 rounded-2xl p-6 text-gray-700 leading-relaxed">

                {{ $business->description ?: 'No description added yet.' }}

            </div>

        </div>
                <div class="mt-10">

            <h3 class="text-2xl font-bold mb-4">
                🌐 Social Media
            </h3>

            <div class="grid md:grid-cols-2 gap-4">

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-gray-500">Facebook</p>
                    <p class="font-semibold">
                        {{ $business->facebook ?: 'Not provided' }}
                    </p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-gray-500">Instagram</p>
                    <p class="font-semibold">
                        {{ $business->instagram ?: 'Not provided' }}
                    </p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-gray-500">TikTok</p>
                    <p class="font-semibold">
                        {{ $business->tiktok ?: 'Not provided' }}
                    </p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-gray-500">Website</p>
                    <p class="font-semibold">
                        {{ $business->website ?: 'Not provided' }}
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>

<!-- Statistics -->

<div class="grid md:grid-cols-4 gap-6 mt-10">

    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="text-5xl mb-3">👀</div>
        <div class="text-4xl font-bold">{{ $business->views }}</div>
        <div class="text-gray-500 mt-2">Views</div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="text-5xl mb-3">⭐</div>
        <div class="text-4xl font-bold">
            {{ number_format($business->rating,1) }}
        </div>
        <div class="text-gray-500 mt-2">Rating</div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="text-5xl mb-3">📢</div>
        <div class="text-2xl font-bold">
            {{ $business->status }}
        </div>
        <div class="text-gray-500 mt-2">Status</div>
    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
        <div class="text-5xl mb-3">🚀</div>
        <div class="text-2xl font-bold">
            {{ $business->featured ? 'YES' : 'NO' }}
        </div>
        <div class="text-gray-500 mt-2">Featured</div>
    </div>

</div>

<!-- Quick Actions -->

<div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

    <h2 class="text-2xl font-bold mb-6">
        ⚡ Quick Actions
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <a href="{{ route('businesses.edit',$business) }}"
           class="bg-sky-600 hover:bg-sky-700 text-white rounded-2xl p-6 text-center transition">

            <div class="text-4xl mb-3">✏</div>
            <div class="font-bold">Edit Business</div>

        </a>

        <a href="{{ route('business.gallery',$business) }}"
           class="bg-orange-500 hover:bg-orange-600 text-white rounded-2xl p-6 text-center transition">

            <div class="text-4xl mb-3">🖼</div>
            <div class="font-bold">Manage Gallery</div>

        </a>

        <a href="{{ route('products.index') }}"
           class="bg-green-600 hover:bg-green-700 text-white rounded-2xl p-6 text-center transition">

            <div class="text-4xl mb-3">📦</div>
            <div class="font-bold">Manage Products</div>

        </a>

    </div>

</div>

        </div>

    </div>

</div>

</x-business-layout>