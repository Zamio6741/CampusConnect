<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 py-4 sm:py-6 lg:py-10">

    <div class="max-w-7xl mx-auto px-3 sm:px-4 md:px-6">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

            <!-- Header -->

            <div class="bg-gradient-to-r from-sky-600 via-sky-600 to-blue-700 text-white p-5 sm:p-7 lg:p-10">

                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-5">

                    <div class="min-w-0">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-white/15 backdrop-blur-sm flex items-center justify-center text-xl sm:text-2xl shadow-inner shrink-0">
                                🏪
                            </div>

                            <div class="min-w-0">

                                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight break-words">
                                    Business Profile
                                </h1>

                                <p class="mt-1.5 text-sm sm:text-base text-sky-100">
                                    View your business information.
                                </p>

                            </div>

                        </div>

                    </div>

                    <a href="{{ route('businesses.edit',$business) }}"
                       class="w-full sm:w-auto inline-flex items-center justify-center gap-2 text-center bg-white text-sky-700 px-5 sm:px-6 py-3 rounded-xl font-bold hover:bg-sky-50 active:scale-[0.98] transition-all shadow-lg">

                        <span>✏</span>
                        <span>Edit Profile</span>

                    </a>

                </div>

            </div>

            <div class="p-4 sm:p-6 lg:p-10">

                <div class="grid lg:grid-cols-3 gap-8 lg:gap-10">

                    <!-- Logo -->

                    <div class="text-center">

                        <div class="relative inline-block">

                            @php
                                $cover = $business->images()->where('cover', true)->first();
                            @endphp

                            @if($cover)

                                <img src="{{ asset('storage/'.$cover->image) }}"
                                     alt="{{ $business->business_name }}"
                                     class="w-48 h-48 sm:w-56 sm:h-56 lg:w-64 lg:h-64 mx-auto rounded-3xl object-cover shadow-xl ring-4 ring-white">

                            @elseif($business->logo)

                                <img src="{{ asset('storage/'.$business->logo) }}"
                                     alt="{{ $business->business_name }}"
                                     class="w-48 h-48 sm:w-56 sm:h-56 lg:w-64 lg:h-64 mx-auto rounded-3xl object-cover shadow-xl ring-4 ring-white">

                            @else

                                <div class="w-48 h-48 sm:w-56 sm:h-56 lg:w-64 lg:h-64 mx-auto rounded-3xl bg-gradient-to-br from-sky-100 to-blue-100 flex items-center justify-center text-6xl sm:text-7xl lg:text-8xl shadow-xl ring-4 ring-white">
                                    🏪
                                </div>

                            @endif

                        </div>

                        <h2 class="text-2xl sm:text-3xl font-extrabold mt-5 sm:mt-6 text-slate-800 break-words">
                            {{ $business->business_name }}
                        </h2>

                        <p class="text-gray-500 text-base sm:text-lg mt-1 break-words">
                            {{ $business->category }}
                        </p>

                        <div class="mt-5 sm:mt-6">

                            @if($business->status == 'Approved')

                                <span class="inline-flex items-center gap-2 bg-green-100 text-green-700 px-4 sm:px-5 py-2 rounded-full font-bold text-sm sm:text-base ring-1 ring-green-200">
                                    <span>✅</span>
                                    Approved
                                </span>

                            @elseif($business->status == 'Rejected')

                                <span class="inline-flex items-center gap-2 bg-red-100 text-red-700 px-4 sm:px-5 py-2 rounded-full font-bold text-sm sm:text-base ring-1 ring-red-200">
                                    <span>❌</span>
                                    Rejected
                                </span>

                            @else

                                <span class="inline-flex items-center gap-2 bg-yellow-100 text-yellow-700 px-4 sm:px-5 py-2 rounded-full font-bold text-sm sm:text-base ring-1 ring-yellow-200">
                                    <span>⏳</span>
                                    Pending Approval
                                </span>

                            @endif

                        </div>

                    </div>

                    <!-- Details -->

                    <div class="lg:col-span-2 min-w-0">

                        <div class="flex items-center gap-3 mb-5 sm:mb-6">

                            <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-lg shrink-0">
                                ℹ️
                            </div>

                            <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800">
                                Business Information
                            </h3>

                        </div>

                        <div class="grid sm:grid-cols-2 gap-4 sm:gap-5">

                            <div class="group min-w-0 bg-slate-50 hover:bg-sky-50 border border-slate-100 hover:border-sky-100 rounded-2xl p-4 transition">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium uppercase tracking-wide">
                                    Business Name
                                </p>
                                <p class="font-bold text-base sm:text-lg text-slate-800 mt-1 break-words">
                                    {{ $business->business_name }}
                                </p>
                            </div>

                            <div class="group min-w-0 bg-slate-50 hover:bg-sky-50 border border-slate-100 hover:border-sky-100 rounded-2xl p-4 transition">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium uppercase tracking-wide">
                                    Category
                                </p>
                                <p class="font-bold text-base sm:text-lg text-slate-800 mt-1 break-words">
                                    {{ $business->category }}
                                </p>
                            </div>

                            <div class="group min-w-0 bg-slate-50 hover:bg-sky-50 border border-slate-100 hover:border-sky-100 rounded-2xl p-4 transition">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium uppercase tracking-wide">
                                    Phone
                                </p>
                                <p class="font-bold text-base sm:text-lg text-slate-800 mt-1 break-words">
                                    {{ $business->phone }}
                                </p>
                            </div>

                            <div class="group min-w-0 bg-slate-50 hover:bg-sky-50 border border-slate-100 hover:border-sky-100 rounded-2xl p-4 transition">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium uppercase tracking-wide">
                                    WhatsApp
                                </p>
                                <p class="font-bold text-base sm:text-lg text-slate-800 mt-1 break-words">
                                    {{ $business->whatsapp }}
                                </p>
                            </div>

                            <div class="group min-w-0 bg-slate-50 hover:bg-sky-50 border border-slate-100 hover:border-sky-100 rounded-2xl p-4 transition">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium uppercase tracking-wide">
                                    Email
                                </p>
                                <p class="font-bold text-base sm:text-lg text-slate-800 mt-1 break-all">
                                    {{ $business->email }}
                                </p>
                            </div>

                            <div class="group min-w-0 bg-slate-50 hover:bg-sky-50 border border-slate-100 hover:border-sky-100 rounded-2xl p-4 transition">
                                <p class="text-gray-500 text-xs sm:text-sm font-medium uppercase tracking-wide">
                                    Location
                                </p>
                                <p class="font-bold text-base sm:text-lg text-slate-800 mt-1 break-words">
                                    {{ $business->location }}
                                </p>
                            </div>

                        </div>

                        <div class="mt-7 sm:mt-8">

                            <div class="flex items-center gap-3 mb-4">

                                <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center text-lg shrink-0">
                                    📝
                                </div>

                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800">
                                    Description
                                </h3>

                            </div>

                            <div class="bg-gradient-to-br from-slate-50 to-blue-50/50 border border-slate-100 rounded-2xl p-4 sm:p-6 text-gray-700 leading-relaxed break-words">
                                {{ $business->description ?: 'No description added yet.' }}
                            </div>

                        </div>

                        <div class="mt-8 sm:mt-10">

                            <div class="flex items-center gap-3 mb-4">

                                <div class="w-10 h-10 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center text-lg shrink-0">
                                    🌐
                                </div>

                                <h3 class="text-xl sm:text-2xl font-extrabold text-slate-800">
                                    Social Media
                                </h3>

                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">

                                <div class="bg-slate-50 hover:bg-blue-50 border border-slate-100 rounded-2xl p-4 min-w-0 transition">
                                    <p class="text-gray-500 text-sm">Facebook</p>
                                    <p class="font-semibold text-slate-800 mt-1 break-all">
                                        {{ $business->facebook ?: 'Not provided' }}
                                    </p>
                                </div>

                                <div class="bg-slate-50 hover:bg-pink-50 border border-slate-100 rounded-2xl p-4 min-w-0 transition">
                                    <p class="text-gray-500 text-sm">Instagram</p>
                                    <p class="font-semibold text-slate-800 mt-1 break-all">
                                        {{ $business->instagram ?: 'Not provided' }}
                                    </p>
                                </div>

                                <div class="bg-slate-50 hover:bg-slate-100 border border-slate-100 rounded-2xl p-4 min-w-0 transition">
                                    <p class="text-gray-500 text-sm">TikTok</p>
                                    <p class="font-semibold text-slate-800 mt-1 break-all">
                                        {{ $business->tiktok ?: 'Not provided' }}
                                    </p>
                                </div>

                                <div class="bg-slate-50 hover:bg-green-50 border border-slate-100 rounded-2xl p-4 min-w-0 transition">
                                    <p class="text-gray-500 text-sm">Website</p>
                                    <p class="font-semibold text-slate-800 mt-1 break-all">
                                        {{ $business->website ?: 'Not provided' }}
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Statistics -->

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mt-8 sm:mt-10">

                    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl border border-slate-100 p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto rounded-2xl bg-sky-100 flex items-center justify-center text-3xl mb-3 group-hover:scale-110 transition">
                            👀
                        </div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-slate-800">
                            {{ $business->views }}
                        </div>
                        <div class="text-gray-500 mt-2 font-medium">
                            Views
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl border border-slate-100 p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto rounded-2xl bg-yellow-100 flex items-center justify-center text-3xl mb-3 group-hover:scale-110 transition">
                            ⭐
                        </div>
                        <div class="text-3xl sm:text-4xl font-extrabold text-slate-800">
                            {{ number_format($business->rating,1) }}
                        </div>
                        <div class="text-gray-500 mt-2 font-medium">
                            Rating
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl border border-slate-100 p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto rounded-2xl bg-purple-100 flex items-center justify-center text-3xl mb-3 group-hover:scale-110 transition">
                            📢
                        </div>
                        <div class="text-xl sm:text-2xl font-extrabold text-slate-800 break-words">
                            {{ $business->status }}
                        </div>
                        <div class="text-gray-500 mt-2 font-medium">
                            Status
                        </div>
                    </div>

                    <div class="group bg-white rounded-2xl shadow-md hover:shadow-xl border border-slate-100 p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1">
                        <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-100 flex items-center justify-center text-3xl mb-3 group-hover:scale-110 transition">
                            🚀
                        </div>
                        <div class="text-xl sm:text-2xl font-extrabold text-slate-800">
                            {{ $business->featured ? 'YES' : 'NO' }}
                        </div>
                        <div class="text-gray-500 mt-2 font-medium">
                            Featured
                        </div>
                    </div>

                </div>

                <!-- Quick Actions -->

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl mt-8 sm:mt-10 p-5 sm:p-6 lg:p-8 border border-slate-100">

                    <div class="mb-5 sm:mb-6">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center text-lg">
                                ⚡
                            </div>

                            <h2 class="text-xl sm:text-2xl font-extrabold text-slate-800">
                                Quick Actions
                            </h2>

                        </div>

                        <p class="text-gray-500 text-sm sm:text-base mt-2">
                            Quickly manage your business.
                        </p>

                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

                        <a href="{{ route('businesses.edit',$business) }}"
                           class="group bg-gradient-to-br from-sky-600 to-blue-700 hover:from-sky-700 hover:to-blue-800 text-white rounded-2xl p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div class="text-4xl mb-3 group-hover:scale-110 transition">
                                ✏
                            </div>

                            <div class="font-bold">
                                Edit Business
                            </div>

                            <p class="text-sky-100 text-sm mt-1">
                                Update business information
                            </p>

                        </a>

                        <a href="{{ route('business.gallery',$business) }}"
                           class="group bg-gradient-to-br from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white rounded-2xl p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div class="text-4xl mb-3 group-hover:scale-110 transition">
                                🖼
                            </div>

                            <div class="font-bold">
                                Manage Gallery
                            </div>

                            <p class="text-orange-100 text-sm mt-1">
                                Manage your business images
                            </p>

                        </a>

                        <a href="{{ route('products.index') }}"
                           class="group bg-gradient-to-br from-emerald-500 to-green-600 hover:from-emerald-600 hover:to-green-700 text-white rounded-2xl p-5 sm:p-6 text-center transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">

                            <div class="text-4xl mb-3 group-hover:scale-110 transition">
                                📦
                            </div>

                            <div class="font-bold">
                                Manage Products
                            </div>

                            <p class="text-green-100 text-sm mt-1">
                                Add and manage products
                            </p>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</x-business-layout>