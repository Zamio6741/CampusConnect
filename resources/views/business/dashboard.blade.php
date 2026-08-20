<x-business-layout title="Business Dashboard">

    {{-- ========================================================= --}}
    {{-- BUSINESS DASHBOARD --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 overflow-x-hidden">

        {{-- ===================================================== --}}
        {{-- HEADER --}}
        {{-- ===================================================== --}}

        <div class="bg-white/95 backdrop-blur-xl shadow-sm border-b border-slate-200/70">

            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 py-5 sm:py-7">

                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

                    {{-- LEFT --}}

                    <div class="min-w-0">

                        <div class="flex items-center gap-3 sm:gap-4">

                            <div class="relative w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-gradient-to-br from-sky-500 via-blue-600 to-indigo-700 flex items-center justify-center text-2xl sm:text-3xl shadow-lg shadow-sky-200 shrink-0">
                                🏪

                                <span class="absolute -right-1 -bottom-1 w-4 h-4 bg-green-500 border-2 border-white rounded-full"></span>
                            </div>

                            <div class="min-w-0">

                                <p class="text-xs sm:text-sm font-bold uppercase tracking-wider text-sky-600 mb-1">
                                    CampusConnect
                                </p>

                                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-900 break-words">
                                    Business Dashboard
                                </h1>

                                <p class="text-slate-500 mt-1 text-sm sm:text-base break-words">
                                    Welcome back,
                                    <span class="font-bold text-slate-700">
                                        {{ auth()->user()->name }}
                                    </span>
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- STATUS --}}

                    <div class="self-start lg:self-auto">

                        <span class="inline-flex items-center justify-center gap-2.5 bg-gradient-to-r from-yellow-50 to-amber-50 text-yellow-700 border border-yellow-200 px-4 sm:px-5 py-2.5 rounded-full font-bold shadow-sm text-sm sm:text-base">

                            <span class="relative flex h-2.5 w-2.5">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-yellow-500"></span>
                            </span>

                            {{ $business->status }}

                        </span>

                    </div>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- CONTENT --}}
        {{-- ===================================================== --}}

        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 py-6 sm:py-8 lg:py-10">


            {{-- ================================================= --}}
            {{-- SUCCESS MESSAGE --}}
            {{-- ================================================= --}}

            @if(session('success'))

                <div class="mb-6 sm:mb-8 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-700 px-4 sm:px-5 py-4 rounded-2xl flex items-start gap-3 shadow-sm">

                    <div class="w-9 h-9 rounded-xl bg-green-100 flex items-center justify-center shrink-0">
                        ✅
                    </div>

                    <div class="min-w-0 pt-1">

                        <p class="text-xs font-bold uppercase tracking-wide text-green-600 mb-0.5">
                            Success
                        </p>

                        <span class="font-medium break-words">
                            {{ session('success') }}
                        </span>

                    </div>

                </div>

            @endif



            {{-- ================================================= --}}
            {{-- STATISTICS --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">


                {{-- VIEWS --}}

                <div class="group relative bg-white rounded-3xl shadow-md hover:shadow-xl p-5 sm:p-6 lg:p-7 border border-slate-200/80 overflow-hidden transition-all duration-300 hover:-translate-y-1">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-sky-50 rounded-full -translate-y-10 translate-x-10"></div>

                    <div class="relative flex items-center justify-between gap-4">

                        <div class="min-w-0">

                            <p class="text-slate-500 text-sm font-semibold">
                                Profile Views
                            </p>

                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-sky-600 mt-2 sm:mt-3 tracking-tight">
                                {{ number_format($business->views) }}
                            </h2>

                            <p class="text-xs text-slate-400 mt-2">
                                Total visits
                            </p>

                        </div>

                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-sky-100 group-hover:bg-sky-600 group-hover:text-white flex items-center justify-center text-xl sm:text-2xl shrink-0 transition-all duration-300">
                            👀
                        </div>

                    </div>

                </div>



                {{-- RATING --}}

                <div class="group relative bg-white rounded-3xl shadow-md hover:shadow-xl p-5 sm:p-6 lg:p-7 border border-slate-200/80 overflow-hidden transition-all duration-300 hover:-translate-y-1">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-yellow-50 rounded-full -translate-y-10 translate-x-10"></div>

                    <div class="relative flex items-center justify-between gap-4">

                        <div class="min-w-0">

                            <p class="text-slate-500 text-sm font-semibold">
                                Rating
                            </p>

                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-yellow-500 mt-2 sm:mt-3 tracking-tight">
                                {{ number_format($business->rating, 1) }}
                            </h2>

                            <p class="text-xs text-slate-400 mt-2">
                                Average rating
                            </p>

                        </div>

                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-yellow-100 group-hover:bg-yellow-500 group-hover:text-white flex items-center justify-center text-xl sm:text-2xl shrink-0 transition-all duration-300">
                            ⭐
                        </div>

                    </div>

                </div>



                {{-- PRODUCTS --}}

                <div class="group relative bg-white rounded-3xl shadow-md hover:shadow-xl p-5 sm:p-6 lg:p-7 border border-slate-200/80 overflow-hidden transition-all duration-300 hover:-translate-y-1">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-green-50 rounded-full -translate-y-10 translate-x-10"></div>

                    <div class="relative flex items-center justify-between gap-4">

                        <div class="min-w-0">

                            <p class="text-slate-500 text-sm font-semibold">
                                Products
                            </p>

                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-green-600 mt-2 sm:mt-3 tracking-tight">
                                {{ $productsCount }}
                            </h2>

                            <p class="text-xs text-slate-400 mt-2">
                                Listed products
                            </p>

                        </div>

                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-green-100 group-hover:bg-green-600 group-hover:text-white flex items-center justify-center text-xl sm:text-2xl shrink-0 transition-all duration-300">
                            🛍
                        </div>

                    </div>

                </div>



                {{-- REVIEWS --}}

                <div class="group relative bg-white rounded-3xl shadow-md hover:shadow-xl p-5 sm:p-6 lg:p-7 border border-slate-200/80 overflow-hidden transition-all duration-300 hover:-translate-y-1">

                    <div class="absolute top-0 right-0 w-24 h-24 bg-purple-50 rounded-full -translate-y-10 translate-x-10"></div>

                    <div class="relative flex items-center justify-between gap-4">

                        <div class="min-w-0">

                            <p class="text-slate-500 text-sm font-semibold">
                                Reviews
                            </p>

                            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-purple-600 mt-2 sm:mt-3 tracking-tight">
                                {{ $reviewsCount }}
                            </h2>

                            <p class="text-xs text-slate-400 mt-2">
                                Customer feedback
                            </p>

                        </div>

                        <div class="w-12 h-12 sm:w-14 sm:h-14 rounded-2xl bg-purple-100 group-hover:bg-purple-600 group-hover:text-white flex items-center justify-center text-xl sm:text-2xl shrink-0 transition-all duration-300">
                            ⭐
                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- MY BUSINESS --}}
            {{-- ================================================= --}}

            <div class="mt-6 sm:mt-8 lg:mt-10 bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200/80">

                {{-- HEADER --}}

                <div class="px-5 sm:px-8 py-5 sm:py-6 border-b border-slate-100 bg-gradient-to-r from-white to-slate-50">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl">
                            🏪
                        </div>

                        <div>

                            <h2 class="text-2xl lg:text-3xl font-extrabold text-slate-800">
                                My Business
                            </h2>

                            <p class="text-gray-500 mt-1 text-sm sm:text-base">
                                Manage your business profile, gallery and products.
                            </p>

                        </div>

                    </div>

                </div>



                {{-- BODY --}}

                <div class="p-5 sm:p-8">

                    <div class="flex flex-col lg:flex-row gap-6 lg:gap-10">


                        {{-- COVER / LOGO --}}

                        <div class="w-full lg:w-[36%]">

                            @php

                                $cover = $business
                                    ->images()
                                    ->where('cover', true)
                                    ->first();

                            @endphp


                            <div class="relative group">

                                @if($cover)

                                    <img
                                        src="{{ asset('storage/'.$cover->image) }}"
                                        alt="{{ $business->business_name }}"
                                        class="w-full h-56 sm:h-72 lg:h-80 object-cover rounded-3xl shadow-lg transition-transform duration-500 group-hover:scale-[1.01]"
                                    >

                                @elseif($business->logo)

                                    <img
                                        src="{{ asset('storage/'.$business->logo) }}"
                                        alt="{{ $business->business_name }}"
                                        class="w-full h-56 sm:h-72 lg:h-80 object-cover rounded-3xl shadow-lg transition-transform duration-500 group-hover:scale-[1.01]"
                                    >

                                @else

                                    <div class="w-full h-56 sm:h-72 lg:h-80 rounded-3xl bg-gradient-to-br from-sky-100 via-blue-100 to-indigo-100 flex items-center justify-center text-7xl sm:text-8xl shadow-inner">
                                        🏪
                                    </div>

                                @endif

                                <div class="absolute inset-0 rounded-3xl bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>

                            </div>

                        </div>



                        {{-- DETAILS --}}

                        <div class="flex-1 min-w-0">

                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">

                                <div class="min-w-0">

                                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800 break-words tracking-tight">
                                        {{ $business->business_name }}
                                    </h2>

                                    <p class="text-sky-600 text-lg lg:text-xl font-bold mt-2 break-words">
                                        {{ $business->category }}
                                    </p>

                                </div>

                                <span class="self-start inline-flex items-center gap-2 bg-green-50 text-green-700 border border-green-200 px-4 py-2 rounded-full text-sm font-bold shrink-0">
                                    <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                    {{ $business->status }}
                                </span>

                            </div>


                            <p class="text-gray-600 mt-4 sm:mt-5 leading-7 sm:leading-8 break-words">
                                {{ $business->description }}
                            </p>



                            {{-- BUSINESS INFORMATION --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mt-6 sm:mt-8">

                                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wide">
                                        Phone
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1 break-words">
                                        {{ $business->phone }}
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wide">
                                        WhatsApp
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1 break-words">
                                        {{ $business->whatsapp }}
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wide">
                                        Email
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1 break-all">
                                        {{ $business->email }}
                                    </p>

                                </div>


                                <div class="rounded-2xl bg-slate-50 border border-slate-100 p-4">

                                    <p class="text-gray-400 text-xs font-bold uppercase tracking-wide">
                                        Location
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1 break-words">
                                        {{ $business->location }}
                                    </p>

                                </div>

                            </div>



                            {{-- ACTION BUTTONS --}}

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:flex lg:flex-wrap gap-3 mt-6 sm:mt-8">

                                <a
                                    href="{{ route('business.profile') }}"
                                    class="group bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-bold transition-all shadow-sm hover:shadow-lg text-center flex items-center justify-center gap-2"
                                >
                                    <span class="group-hover:scale-110 transition-transform">👤</span>
                                    Business Profile
                                </a>


                                <a
                                    href="{{ route('business.gallery', $business) }}"
                                    class="group bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl font-bold transition-all shadow-sm hover:shadow-lg text-center flex items-center justify-center gap-2"
                                >
                                    <span class="group-hover:scale-110 transition-transform">🖼</span>
                                    Gallery
                                </a>


                                <a
                                    href="{{ route('products.index') }}"
                                    class="group bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-bold transition-all shadow-sm hover:shadow-lg text-center flex items-center justify-center gap-2"
                                >
                                    <span class="group-hover:scale-110 transition-transform">🛍</span>
                                    Products
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- ANALYTICS + RECENT ACTIVITY --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-6 lg:gap-8 mt-6 sm:mt-8 lg:mt-10">


                {{-- PERFORMANCE --}}

                <div class="bg-white rounded-3xl shadow-xl p-5 sm:p-8 border border-slate-200/80">

                    <div class="flex items-start justify-between gap-4 mb-7 sm:mb-8">

                        <div>

                            <h2 class="text-2xl font-extrabold text-slate-800">
                                📊 Performance
                            </h2>

                            <p class="text-gray-500 text-sm mt-1">
                                Overview of your business activity.
                            </p>

                        </div>

                        <div class="hidden sm:flex w-11 h-11 rounded-xl bg-sky-50 text-sky-600 items-center justify-center">
                            📈
                        </div>

                    </div>


                    <div class="space-y-7 sm:space-y-8">


                        {{-- VIEWS --}}

                        <div>

                            <div class="flex justify-between items-center gap-3 mb-2.5">

                                <span class="font-semibold text-gray-700">
                                    Views
                                </span>

                                <span class="font-bold text-gray-800 shrink-0">
                                    {{ number_format($business->views) }}
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-100 overflow-hidden">

                                <div
                                    class="bg-gradient-to-r from-sky-500 to-blue-600 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ min($business->views, 100) }}%"
                                ></div>

                            </div>

                        </div>



                        {{-- RATING --}}

                        <div>

                            <div class="flex justify-between items-center gap-3 mb-2.5">

                                <span class="font-semibold text-gray-700">
                                    Rating
                                </span>

                                <span class="font-bold text-gray-800 shrink-0">
                                    {{ number_format($averageRating, 1) }}/5
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-100 overflow-hidden">

                                <div
                                    class="bg-gradient-to-r from-yellow-400 to-amber-500 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ min($averageRating * 20, 100) }}%"
                                ></div>

                            </div>

                        </div>



                        {{-- PRODUCTS --}}

                        <div>

                            <div class="flex justify-between items-center gap-3 mb-2.5">

                                <span class="font-semibold text-gray-700">
                                    Products
                                </span>

                                <span class="font-bold text-gray-800 shrink-0">
                                    {{ $productsCount }}
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-100 overflow-hidden">

                                <div
                                    class="bg-gradient-to-r from-green-500 to-emerald-600 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ min($productsCount * 10, 100) }}%"
                                ></div>

                            </div>

                        </div>



                        {{-- ADVERTISEMENTS --}}

                        <div>

                            <div class="flex justify-between items-center gap-3 mb-2.5">

                                <span class="font-semibold text-gray-700">
                                    Advertisements
                                </span>

                                <span class="font-bold text-gray-800 shrink-0">
                                    {{ $advertisementsCount }}
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-100 overflow-hidden">

                                <div
                                    class="bg-gradient-to-r from-purple-500 to-violet-600 h-3 rounded-full transition-all duration-500"
                                    style="width: {{ min($advertisementsCount * 10, 100) }}%"
                                ></div>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- RECENT ACTIVITY --}}

                <div class="bg-white rounded-3xl shadow-xl p-5 sm:p-8 border border-slate-200/80">

                    <div class="mb-7 sm:mb-8">

                        <h2 class="text-2xl font-extrabold text-slate-800">
                            📋 Recent Activity
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Recent activity on your business account.
                        </p>

                    </div>


                    <div class="space-y-4">


                        {{-- VIEWS --}}

                        <div class="group flex items-start gap-4 min-w-0 p-4 rounded-2xl hover:bg-sky-50 transition-colors duration-200">

                            <div class="w-12 h-12 rounded-2xl bg-sky-100 text-sky-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-105 transition-transform">
                                👀
                            </div>

                            <div class="min-w-0 pt-1">

                                <p class="font-bold text-slate-800 break-words">
                                    {{ number_format($business->views) }} profile views
                                </p>

                                <span class="text-gray-500 text-sm">
                                    Total profile visits
                                </span>

                            </div>

                        </div>



                        {{-- REVIEWS --}}

                        <div class="group flex items-start gap-4 min-w-0 p-4 rounded-2xl hover:bg-yellow-50 transition-colors duration-200">

                            <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-105 transition-transform">
                                ⭐
                            </div>

                            <div class="min-w-0 pt-1">

                                <p class="font-bold text-slate-800 break-words">
                                    {{ $reviewsCount }} customer reviews
                                </p>

                                <span class="text-gray-500 text-sm">
                                    Customer feedback received
                                </span>

                            </div>

                        </div>



                        {{-- MESSAGES --}}

                        <div class="group flex items-start gap-4 min-w-0 p-4 rounded-2xl hover:bg-green-50 transition-colors duration-200">

                            <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-xl shrink-0 group-hover:scale-105 transition-transform">
                                💬
                            </div>

                            <div class="min-w-0 pt-1">

                                <p class="font-bold text-slate-800 break-words">
                                    {{ $unreadMessages }} unread messages
                                </p>

                                <span class="text-gray-500 text-sm">
                                    Messages waiting for your attention
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- QUICK ACTIONS --}}
            {{-- ================================================= --}}

            <div class="bg-white rounded-3xl shadow-xl mt-6 sm:mt-8 lg:mt-10 p-5 sm:p-8 border border-slate-200/80">

                <div class="mb-6 sm:mb-8">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl bg-slate-100 text-slate-700 flex items-center justify-center text-xl">
                            ⚡
                        </div>

                        <div>

                            <h2 class="text-2xl font-extrabold text-slate-800">
                                Quick Actions
                            </h2>

                            <p class="text-gray-500 mt-1 text-sm sm:text-base">
                                Quickly access the tools you use most.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">


                    {{-- PROFILE --}}

                    <a
                        href="{{ route('business.profile') }}"
                        class="group relative overflow-hidden bg-gradient-to-br from-sky-500 to-blue-700 hover:from-sky-600 hover:to-blue-800 text-white rounded-2xl p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <div class="absolute -top-10 -right-10 w-28 h-28 bg-white/10 rounded-full"></div>

                        <div class="relative">

                            <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">
                                👤
                            </div>

                            <div class="font-bold text-lg">
                                Business Profile
                            </div>

                            <p class="text-sky-100 text-sm mt-1">
                                Manage your business details
                            </p>

                        </div>

                    </a>



                    {{-- GALLERY --}}

                    <a
                        href="{{ route('business.gallery', $business) }}"
                        class="group relative overflow-hidden bg-gradient-to-br from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white rounded-2xl p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <div class="absolute -top-10 -right-10 w-28 h-28 bg-white/10 rounded-full"></div>

                        <div class="relative">

                            <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">
                                🖼
                            </div>

                            <div class="font-bold text-lg">
                                Gallery
                            </div>

                            <p class="text-orange-100 text-sm mt-1">
                                Manage business images
                            </p>

                        </div>

                    </a>



                    {{-- PRODUCTS --}}

                    <a
                        href="{{ route('products.index') }}"
                        class="group relative overflow-hidden bg-gradient-to-br from-green-500 to-emerald-700 hover:from-green-600 hover:to-emerald-800 text-white rounded-2xl p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <div class="absolute -top-10 -right-10 w-28 h-28 bg-white/10 rounded-full"></div>

                        <div class="relative">

                            <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">
                                🛍
                            </div>

                            <div class="font-bold text-lg">
                                Products
                            </div>

                            <p class="text-green-100 text-sm mt-1">
                                Manage your products
                            </p>

                        </div>

                    </a>



                    {{-- ADVERTISEMENTS --}}

                    <a
                        href="{{ route('business.advertisements.index') }}"
                        class="group relative overflow-hidden bg-gradient-to-br from-purple-500 to-violet-700 hover:from-purple-600 hover:to-violet-800 text-white rounded-2xl p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
                    >

                        <div class="absolute -top-10 -right-10 w-28 h-28 bg-white/10 rounded-full"></div>

                        <div class="relative">

                            <div class="text-5xl mb-3 group-hover:scale-110 transition-transform duration-300">
                                📢
                            </div>

                            <div class="font-bold text-lg">
                                Advertisements
                            </div>

                            <p class="text-purple-100 text-sm mt-1">
                                Promote your business
                            </p>

                        </div>

                    </a>

                </div>

            </div>



            {{-- ================================================= --}}
            {{-- FOOTER --}}
            {{-- ================================================= --}}

            <div class="mt-8 sm:mt-10 text-center pb-6 sm:pb-8">

                <div class="inline-flex items-center gap-2 text-slate-700">

                    <span class="w-8 h-8 rounded-lg bg-sky-100 flex items-center justify-center">
                        🏪
                    </span>

                    <p class="text-base sm:text-lg font-bold">
                        CampusConnect Business Dashboard
                    </p>

                </div>

                <p class="mt-2 text-sm text-gray-400">
                    Built with ❤️ for CampusConnect
                </p>

            </div>

        </div>

    </div>

</x-business-layout>