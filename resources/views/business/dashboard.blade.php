<x-app-layout>

<div
    x-data="{ sidebarOpen: true }"
    class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="flex">

        <!-- ================= SIDEBAR ================= -->

        <aside
            :class="sidebarOpen ? 'w-72' : 'w-24'"
            class="bg-white shadow-2xl min-h-screen transition-all duration-300 overflow-hidden">

            <!-- Logo -->

            <div class="h-20 border-b flex items-center justify-center">

                <h1
                    x-show="sidebarOpen"
                    x-transition
                    class="text-3xl font-extrabold text-sky-700">

                    CampusConnect

                </h1>

                <span
                    x-show="!sidebarOpen"
                    x-transition
                    class="text-4xl">

                    🏫

                </span>

            </div>

            <!-- User -->

            <div class="py-8 border-b text-center">

                <div class="w-20 h-20 rounded-full bg-sky-100 flex items-center justify-center text-5xl mx-auto">

                    🏪

                </div>

                <div
                    x-show="sidebarOpen"
                    x-transition>

                    <h2 class="mt-5 text-2xl font-bold">

                        {{ auth()->user()->name }}

                    </h2>

                    <p class="text-gray-500">

                        Business Owner

                    </p>

                </div>

            </div>

            <!-- MENU -->

            <nav class="mt-6 space-y-2">

                <a
                    href="{{ route('business.dashboard') }}"
                    class="flex items-center gap-4 px-8 py-4 bg-sky-600 text-white font-semibold">

                    <span class="text-xl">🏠</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Dashboard

                    </span>

                </a>

                <a

                    href="{{ route('business.profile') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">🏪</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Business Profile

                    </span>

                </a>

                <a
                    href="{{ route('business.gallery',$business) }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">🖼</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Gallery

                    </span>

                </a>

                <a
                    href="{{ route('products.index') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">🛍</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Products

                    </span>

                </a>

                <a
                    href="{{ route('business.advertisements.index') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">📢</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Advertisements

                    </span>

                </a>

                <a
                    href="{{ route('business.analytics') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">📈</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Analytics

                    </span>

                </a>

                <a
                    href="{{ route('business.messages') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">💬</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Messages

                    </span>

                </a>

                <a
                    href="{{ route('business.reviews') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">⭐</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Reviews

                    </span>

                </a>

                <a
                    href="{{ route('business.notifications') }}"
                    class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    <span class="text-xl">🔔</span>

                    <span
                        x-show="sidebarOpen"
                        x-transition>

                        Notifications

                    </span>

                </a>

            </nav>

        </aside>

        <!-- ================= MAIN ================= -->

        <main class="flex-1">

            <!-- HEADER -->

            <div class="bg-white shadow-sm">

                <div class="px-10 py-8 flex justify-between items-center">

                    <div class="flex items-center gap-5">

                        <button
                            @click="sidebarOpen=!sidebarOpen"
                            class="bg-sky-100 hover:bg-sky-200 p-3 rounded-xl transition">

                            ☰

                        </button>

                        <div>

                            <h1 class="text-4xl font-bold text-slate-800">

                                Business Dashboard

                            </h1>

                            <p class="text-gray-500 mt-2">

                                Welcome back,

                                <span class="font-semibold">

                                    {{ auth()->user()->name }}

                                </span>

                            </p>

                        </div>

                    </div>

                    <div class="flex items-center gap-4">

                        <span class="bg-yellow-100 text-yellow-700 px-5 py-2 rounded-full font-semibold">

                            {{ $business->status }}

                        </span>

                    </div>

                </div>

            </div>

            <!-- CONTENT -->

            <div class="p-10">

                @if(session('success'))

                    <div class="mb-8 bg-green-100 text-green-700 p-5 rounded-xl">

                        {{ session('success') }}

                    </div>

                @endif

                <!-- Statistics -->

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <p class="text-gray-500">

                            Views

                        </p>

                        <h2 class="text-5xl font-bold mt-4">

                            {{ number_format($business->views) }}

                        </h2>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <p class="text-gray-500">

                            Rating

                        </p>

                        <h2 class="text-5xl font-bold mt-4">

                            {{ number_format($business->rating,1) }}

                        </h2>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <p class="text-gray-500">

                            Products

                        </p>

                        <h2 class="text-5xl font-bold mt-4">

                            {{ $productsCount }}

                        </h2>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <p class="text-gray-500">

                            Reviews

                        </p>

                        <h2 class="text-5xl font-bold mt-4">

                            {{ $reviewsCount }}

                        </h2>

                    </div>

                </div>

                <!-- SECTION 2 STARTS HERE -->
                 <!-- ================= MY BUSINESS ================= -->

<div class="mt-10 bg-white rounded-3xl shadow-xl overflow-hidden">

    <div class="px-8 py-6 border-b">

        <h2 class="text-3xl font-bold text-slate-800">
            🏪 My Business
        </h2>

        <p class="text-gray-500 mt-2">
            Manage your business profile, gallery and products.
        </p>

    </div>

    <div class="p-8">

        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Cover / Logo -->

            <div class="lg:w-1/3">

                @php
                    $cover = $business->images()->where('cover', true)->first();
                @endphp

                @if($cover)

                    <img
                        src="{{ asset('storage/'.$cover->image) }}"
                        class="w-full h-72 object-cover rounded-3xl shadow-lg">

                @elseif($business->logo)

                    <img
                        src="{{ asset('storage/'.$business->logo) }}"
                        class="w-full h-72 object-cover rounded-3xl shadow-lg">

                @else

                    <div class="w-full h-72 rounded-3xl bg-sky-100 flex items-center justify-center text-8xl">

                        🏪

                    </div>

                @endif

            </div>

            <!-- Details -->

            <div class="flex-1">

                <h2 class="text-4xl font-bold">

                    {{ $business->business_name }}

                </h2>

                <p class="text-sky-600 text-xl mt-2">

                    {{ $business->category }}

                </p>

                <p class="text-gray-600 mt-5 leading-8">

                    {{ $business->description }}

                </p>

                <div class="grid md:grid-cols-2 gap-5 mt-8">

                    <div>

                        <p class="text-gray-400 text-sm">

                            Phone

                        </p>

                        <p class="font-semibold">

                            {{ $business->phone }}

                        </p>

                    </div>

                    <div>

                        <p class="text-gray-400 text-sm">

                            WhatsApp

                        </p>

                        <p class="font-semibold">

                            {{ $business->whatsapp }}

                        </p>

                    </div>

                    <div>

                        <p class="text-gray-400 text-sm">

                            Email

                        </p>

                        <p class="font-semibold">

                            {{ $business->email }}

                        </p>

                    </div>

                    <div>

                        <p class="text-gray-400 text-sm">

                            Location

                        </p>

                        <p class="font-semibold">

                            {{ $business->location }}

                        </p>

                    </div>

                </div>

                <div class="flex flex-wrap gap-4 mt-10">

                    <a
    href="{{ route('business.profile') }}"
    class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-semibold">

    👤 Business Profile

</a>

                    <a
                        href="{{ route('business.gallery',$business) }}"
                        class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold">

                        🖼 Gallery

                    </a>

                    <a
                        href="{{ route('products.index') }}"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold">

                        🛍 Products

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= ANALYTICS ================= -->

<div class="grid lg:grid-cols-2 gap-8 mt-10">

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h2 class="text-2xl font-bold mb-8">

            📊 Performance

        </h2>

        <div class="space-y-8">

            <div>

                <div class="flex justify-between mb-2">

                    <span>Views</span>

                    <span>{{ number_format($business->views) }}</span>

                </div>

                <div class="h-3 rounded-full bg-gray-200">

                    <div
                        class="bg-sky-600 h-3 rounded-full"
                        style="width: {{ min($business->views,100) }}%"></div>

                </div>

            </div>

            <div>

                <div class="flex justify-between mb-2">

                    <span>Rating</span>

                    <span>{{ number_format($averageRating,1) }}/5</span>

                </div>

                <div class="h-3 rounded-full bg-gray-200">

                    <div
                        class="bg-yellow-400 h-3 rounded-full"
                        style="width: {{ $averageRating*20 }}%"></div>

                </div>

            </div>

            <div>

                <div class="flex justify-between mb-2">

                    <span>Products</span>

                    <span>{{ $productsCount }}</span>

                </div>

                <div class="h-3 rounded-full bg-gray-200">

                    <div
                        class="bg-green-500 h-3 rounded-full"
                        style="width: {{ min($productsCount*10,100) }}%"></div>

                </div>

            </div>

            <div>

                <div class="flex justify-between mb-2">

                    <span>Advertisements</span>

                    <span>{{ $advertisementsCount }}</span>

                </div>

                <div class="h-3 rounded-full bg-gray-200">

                    <div
                        class="bg-purple-500 h-3 rounded-full"
                        style="width: {{ min($advertisementsCount*10,100) }}%"></div>

                </div>

            </div>

        </div>

    </div>

    <!-- Recent Activity -->

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h2 class="text-2xl font-bold mb-8">

            📋 Recent Activity

        </h2>

        <div class="space-y-6">

            <div class="flex gap-4">

                <div class="w-12 h-12 rounded-full bg-sky-100 flex items-center justify-center">

                    👀

                </div>

                <div>

                    <p class="font-semibold">

                        {{ number_format($business->views) }} profile views

                    </p>

                    <span class="text-gray-500 text-sm">

                        Total profile visits

                    </span>

                </div>

            </div>

            <div class="flex gap-4">

                <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">

                    ⭐

                </div>

                <div>

                    <p class="font-semibold">

                        {{ $reviewsCount }} customer reviews

                    </p>

                </div>

            </div>

            <div class="flex gap-4">

                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                    💬

                </div>

                <div>

                    <p class="font-semibold">

                        {{ $unreadMessages }} unread messages

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- SECTION 3 STARTS HERE -->
 <!-- ================= QUICK ACTIONS ================= -->

<div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

    <h2 class="text-2xl font-bold mb-8">
        ⚡ Quick Actions
    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

       <a href="{{ route('business.profile') }}"
   class="bg-sky-600 hover:bg-sky-700 text-white rounded-2xl p-6 text-center transition hover:scale-105">

    <div class="text-5xl mb-3">👤</div>

    <div class="font-bold text-lg">
        Business Profile
    </div>

</a>
        <a href="{{ route('business.gallery',$business) }}"
           class="bg-orange-500 hover:bg-orange-600 text-white rounded-2xl p-6 text-center transition hover:scale-105">

            <div class="text-5xl mb-3">🖼</div>

            <div class="font-bold text-lg">
                Gallery
            </div>

        </a>

        <a href="{{ route('products.index') }}"
           class="bg-green-600 hover:bg-green-700 text-white rounded-2xl p-6 text-center transition hover:scale-105">

            <div class="text-5xl mb-3">🛍</div>

            <div class="font-bold text-lg">
                Products
            </div>

        </a>

        <a href="{{ route('business.advertisements.index') }}"
           class="bg-purple-600 hover:bg-purple-700 text-white rounded-2xl p-6 text-center transition hover:scale-105">

            <div class="text-5xl mb-3">📢</div>

            <div class="font-bold text-lg">
                Advertisements
            </div>

        </a>

    </div>

</div>

<!-- ================= FOOTER ================= -->

<div class="mt-10 text-center text-gray-500 pb-10">

    <p class="text-lg">

        CampusConnect Business Dashboard

    </p>

    <p class="mt-2 text-sm">

        Built with ❤️ for CampusConnect

    </p>

</div>

</div>
</main>

</div>
</div>

</x-app-layout>