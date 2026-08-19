<x-business-layout>

    <!-- ========================================================= -->
    <!-- BUSINESS DASHBOARD -->
    <!-- ========================================================= -->

    <div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

        <!-- ===================================================== -->
        <!-- HEADER -->
        <!-- ===================================================== -->

        <div class="bg-white shadow-sm border-b border-gray-100">

            <div class="px-5 sm:px-8 lg:px-10 py-6 lg:py-8">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                    <!-- LEFT -->

                    <div>

                        <div class="flex items-center gap-4">

                            <div
                                class="w-14 h-14
                                       rounded-2xl
                                       bg-gradient-to-br
                                       from-sky-500
                                       to-blue-700
                                       flex items-center
                                       justify-center
                                       text-3xl
                                       shadow-lg"
                            >
                                🏪
                            </div>

                            <div>

                                <h1
                                    class="text-2xl sm:text-3xl lg:text-4xl
                                           font-extrabold
                                           text-slate-800"
                                >
                                    Business Dashboard
                                </h1>

                                <p class="text-gray-500 mt-1">

                                    Welcome back,

                                    <span class="font-semibold text-slate-700">
                                        {{ auth()->user()->name }}
                                    </span>

                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- STATUS -->

                    <div>

                        <span
                            class="inline-flex
                                   items-center
                                   gap-2
                                   bg-yellow-100
                                   text-yellow-700
                                   px-5 py-2.5
                                   rounded-full
                                   font-semibold
                                   shadow-sm"
                        >

                            <span class="w-2.5 h-2.5 bg-yellow-500 rounded-full"></span>

                            {{ $business->status }}

                        </span>

                    </div>

                </div>

            </div>

        </div>


        <!-- ===================================================== -->
        <!-- CONTENT -->
        <!-- ===================================================== -->

        <div class="px-5 sm:px-8 lg:px-10 py-8 lg:py-10">


            <!-- ================================================= -->
            <!-- SUCCESS MESSAGE -->
            <!-- ================================================= -->

            @if(session('success'))

                <div
                    class="mb-8
                           bg-green-50
                           border border-green-200
                           text-green-700
                           px-5 py-4
                           rounded-2xl
                           flex items-center gap-3"
                >

                    <span class="text-xl">
                        ✅
                    </span>

                    <span class="font-medium">
                        {{ session('success') }}
                    </span>

                </div>

            @endif


            <!-- ================================================= -->
            <!-- STATISTICS -->
            <!-- ================================================= -->

            <div
                class="grid
                       grid-cols-1
                       sm:grid-cols-2
                       xl:grid-cols-4
                       gap-5
                       lg:gap-7"
            >


                <!-- VIEWS -->

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-lg
                           p-6 lg:p-8
                           border border-gray-100
                           hover:-translate-y-1
                           hover:shadow-xl
                           transition-all duration-300"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Profile Views
                            </p>

                            <h2
                                class="text-4xl lg:text-5xl
                                       font-extrabold
                                       text-sky-600
                                       mt-3"
                            >
                                {{ number_format($business->views) }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-sky-100
                                   flex items-center
                                   justify-center
                                   text-2xl"
                        >
                            👀
                        </div>

                    </div>

                </div>


                <!-- RATING -->

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-lg
                           p-6 lg:p-8
                           border border-gray-100
                           hover:-translate-y-1
                           hover:shadow-xl
                           transition-all duration-300"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Rating
                            </p>

                            <h2
                                class="text-4xl lg:text-5xl
                                       font-extrabold
                                       text-yellow-500
                                       mt-3"
                            >
                                {{ number_format($business->rating, 1) }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-yellow-100
                                   flex items-center
                                   justify-center
                                   text-2xl"
                        >
                            ⭐
                        </div>

                    </div>

                </div>


                <!-- PRODUCTS -->

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-lg
                           p-6 lg:p-8
                           border border-gray-100
                           hover:-translate-y-1
                           hover:shadow-xl
                           transition-all duration-300"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Products
                            </p>

                            <h2
                                class="text-4xl lg:text-5xl
                                       font-extrabold
                                       text-green-600
                                       mt-3"
                            >
                                {{ $productsCount }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-green-100
                                   flex items-center
                                   justify-center
                                   text-2xl"
                        >
                            🛍
                        </div>

                    </div>

                </div>


                <!-- REVIEWS -->

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-lg
                           p-6 lg:p-8
                           border border-gray-100
                           hover:-translate-y-1
                           hover:shadow-xl
                           transition-all duration-300"
                >

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 text-sm font-medium">
                                Reviews
                            </p>

                            <h2
                                class="text-4xl lg:text-5xl
                                       font-extrabold
                                       text-purple-600
                                       mt-3"
                            >
                                {{ $reviewsCount }}
                            </h2>

                        </div>

                        <div
                            class="w-14 h-14
                                   rounded-2xl
                                   bg-purple-100
                                   flex items-center
                                   justify-center
                                   text-2xl"
                        >
                            ⭐
                        </div>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- MY BUSINESS -->
            <!-- ================================================= -->

            <div
                class="mt-8 lg:mt-10
                       bg-white
                       rounded-3xl
                       shadow-xl
                       overflow-hidden
                       border border-gray-100"
            >

                <!-- HEADER -->

                <div
                    class="px-6 sm:px-8
                           py-6
                           border-b border-gray-100"
                >

                    <h2
                        class="text-2xl lg:text-3xl
                               font-extrabold
                               text-slate-800"
                    >
                        🏪 My Business
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Manage your business profile, gallery and products.
                    </p>

                </div>


                <!-- BODY -->

                <div class="p-6 sm:p-8">

                    <div class="flex flex-col lg:flex-row gap-8">


                        <!-- COVER / LOGO -->

                        <div class="lg:w-1/3">

                            @php

                                $cover = $business
                                    ->images()
                                    ->where('cover', true)
                                    ->first();

                            @endphp


                            @if($cover)

                                <img
                                    src="{{ asset('storage/'.$cover->image) }}"
                                    alt="{{ $business->business_name }}"
                                    class="w-full h-72
                                           object-cover
                                           rounded-3xl
                                           shadow-lg"
                                >

                            @elseif($business->logo)

                                <img
                                    src="{{ asset('storage/'.$business->logo) }}"
                                    alt="{{ $business->business_name }}"
                                    class="w-full h-72
                                           object-cover
                                           rounded-3xl
                                           shadow-lg"
                                >

                            @else

                                <div
                                    class="w-full h-72
                                           rounded-3xl
                                           bg-gradient-to-br
                                           from-sky-100
                                           to-blue-100
                                           flex items-center
                                           justify-center
                                           text-8xl"
                                >
                                    🏪
                                </div>

                            @endif

                        </div>


                        <!-- DETAILS -->

                        <div class="flex-1">

                            <h2
                                class="text-3xl lg:text-4xl
                                       font-extrabold
                                       text-slate-800"
                            >
                                {{ $business->business_name }}
                            </h2>


                            <p
                                class="text-sky-600
                                       text-lg lg:text-xl
                                       font-semibold
                                       mt-2"
                            >
                                {{ $business->category }}
                            </p>


                            <p
                                class="text-gray-600
                                       mt-5
                                       leading-8"
                            >
                                {{ $business->description }}
                            </p>


                            <!-- BUSINESS INFORMATION -->

                            <div
                                class="grid
                                       sm:grid-cols-2
                                       gap-5
                                       mt-8"
                            >

                                <!-- PHONE -->

                                <div>

                                    <p class="text-gray-400 text-sm">
                                        Phone
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1">
                                        {{ $business->phone }}
                                    </p>

                                </div>


                                <!-- WHATSAPP -->

                                <div>

                                    <p class="text-gray-400 text-sm">
                                        WhatsApp
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1">
                                        {{ $business->whatsapp }}
                                    </p>

                                </div>


                                <!-- EMAIL -->

                                <div>

                                    <p class="text-gray-400 text-sm">
                                        Email
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1 break-words">
                                        {{ $business->email }}
                                    </p>

                                </div>


                                <!-- LOCATION -->

                                <div>

                                    <p class="text-gray-400 text-sm">
                                        Location
                                    </p>

                                    <p class="font-semibold text-slate-700 mt-1">
                                        {{ $business->location }}
                                    </p>

                                </div>

                            </div>


                            <!-- ACTION BUTTONS -->

                            <div
                                class="flex flex-wrap
                                       gap-3
                                       mt-8"
                            >

                                <a
                                    href="{{ route('business.profile') }}"
                                    class="bg-sky-600
                                           hover:bg-sky-700
                                           text-white
                                           px-5 py-3
                                           rounded-xl
                                           font-semibold
                                           transition
                                           shadow-sm
                                           hover:shadow-lg"
                                >
                                    👤 Business Profile
                                </a>


                                <a
                                    href="{{ route('business.gallery', $business) }}"
                                    class="bg-orange-500
                                           hover:bg-orange-600
                                           text-white
                                           px-5 py-3
                                           rounded-xl
                                           font-semibold
                                           transition
                                           shadow-sm
                                           hover:shadow-lg"
                                >
                                    🖼 Gallery
                                </a>


                                <a
                                    href="{{ route('products.index') }}"
                                    class="bg-green-600
                                           hover:bg-green-700
                                           text-white
                                           px-5 py-3
                                           rounded-xl
                                           font-semibold
                                           transition
                                           shadow-sm
                                           hover:shadow-lg"
                                >
                                    🛍 Products
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- ANALYTICS + RECENT ACTIVITY -->
            <!-- ================================================= -->

            <div
                class="grid
                       grid-cols-1
                       xl:grid-cols-2
                       gap-6
                       lg:gap-8
                       mt-8 lg:mt-10"
            >


                <!-- PERFORMANCE -->

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-xl
                           p-6 sm:p-8
                           border border-gray-100"
                >

                    <div class="flex items-center justify-between mb-8">

                        <div>

                            <h2
                                class="text-2xl
                                       font-extrabold
                                       text-slate-800"
                            >
                                📊 Performance
                            </h2>

                            <p class="text-gray-500 text-sm mt-1">
                                Overview of your business activity.
                            </p>

                        </div>

                    </div>


                    <div class="space-y-8">


                        <!-- VIEWS -->

                        <div>

                            <div
                                class="flex
                                       justify-between
                                       items-center
                                       mb-2"
                            >

                                <span class="font-medium text-gray-700">
                                    Views
                                </span>

                                <span class="font-semibold text-gray-800">
                                    {{ number_format($business->views) }}
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-200 overflow-hidden">

                                <div
                                    class="bg-sky-600
                                           h-3
                                           rounded-full
                                           transition-all"
                                    style="width: {{ min($business->views, 100) }}%"
                                ></div>

                            </div>

                        </div>


                        <!-- RATING -->

                        <div>

                            <div
                                class="flex
                                       justify-between
                                       items-center
                                       mb-2"
                            >

                                <span class="font-medium text-gray-700">
                                    Rating
                                </span>

                                <span class="font-semibold text-gray-800">
                                    {{ number_format($averageRating, 1) }}/5
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-200 overflow-hidden">

                                <div
                                    class="bg-yellow-400
                                           h-3
                                           rounded-full
                                           transition-all"
                                    style="width: {{ min($averageRating * 20, 100) }}%"
                                ></div>

                            </div>

                        </div>


                        <!-- PRODUCTS -->

                        <div>

                            <div
                                class="flex
                                       justify-between
                                       items-center
                                       mb-2"
                            >

                                <span class="font-medium text-gray-700">
                                    Products
                                </span>

                                <span class="font-semibold text-gray-800">
                                    {{ $productsCount }}
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-200 overflow-hidden">

                                <div
                                    class="bg-green-500
                                           h-3
                                           rounded-full
                                           transition-all"
                                    style="width: {{ min($productsCount * 10, 100) }}%"
                                ></div>

                            </div>

                        </div>


                        <!-- ADVERTISEMENTS -->

                        <div>

                            <div
                                class="flex
                                       justify-between
                                       items-center
                                       mb-2"
                            >

                                <span class="font-medium text-gray-700">
                                    Advertisements
                                </span>

                                <span class="font-semibold text-gray-800">
                                    {{ $advertisementsCount }}
                                </span>

                            </div>


                            <div class="h-3 rounded-full bg-gray-200 overflow-hidden">

                                <div
                                    class="bg-purple-500
                                           h-3
                                           rounded-full
                                           transition-all"
                                    style="width: {{ min($advertisementsCount * 10, 100) }}%"
                                ></div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RECENT ACTIVITY -->

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-xl
                           p-6 sm:p-8
                           border border-gray-100"
                >

                    <h2
                        class="text-2xl
                               font-extrabold
                               text-slate-800
                               mb-2"
                    >
                        📋 Recent Activity
                    </h2>

                    <p class="text-gray-500 text-sm mb-8">
                        Recent activity on your business account.
                    </p>


                    <div class="space-y-6">


                        <!-- VIEWS -->

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12
                                       rounded-2xl
                                       bg-sky-100
                                       flex items-center
                                       justify-center
                                       text-xl
                                       shrink-0"
                            >
                                👀
                            </div>

                            <div>

                                <p class="font-semibold text-slate-800">
                                    {{ number_format($business->views) }} profile views
                                </p>

                                <span class="text-gray-500 text-sm">
                                    Total profile visits
                                </span>

                            </div>

                        </div>


                        <!-- REVIEWS -->

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12
                                       rounded-2xl
                                       bg-yellow-100
                                       flex items-center
                                       justify-center
                                       text-xl
                                       shrink-0"
                            >
                                ⭐
                            </div>

                            <div>

                                <p class="font-semibold text-slate-800">
                                    {{ $reviewsCount }} customer reviews
                                </p>

                                <span class="text-gray-500 text-sm">
                                    Customer feedback received
                                </span>

                            </div>

                        </div>


                        <!-- MESSAGES -->

                        <div class="flex items-center gap-4">

                            <div
                                class="w-12 h-12
                                       rounded-2xl
                                       bg-green-100
                                       flex items-center
                                       justify-center
                                       text-xl
                                       shrink-0"
                            >
                                💬
                            </div>

                            <div>

                                <p class="font-semibold text-slate-800">
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


            <!-- ================================================= -->
            <!-- QUICK ACTIONS -->
            <!-- ================================================= -->

            <div
                class="bg-white
                       rounded-3xl
                       shadow-xl
                       mt-8 lg:mt-10
                       p-6 sm:p-8
                       border border-gray-100"
            >

                <div class="mb-8">

                    <h2
                        class="text-2xl
                               font-extrabold
                               text-slate-800"
                    >
                        ⚡ Quick Actions
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Quickly access the tools you use most.
                    </p>

                </div>


                <div
                    class="grid
                           grid-cols-1
                           sm:grid-cols-2
                           lg:grid-cols-4
                           gap-5"
                >


                    <!-- PROFILE -->

                    <a
                        href="{{ route('business.profile') }}"
                        class="group
                               bg-sky-600
                               hover:bg-sky-700
                               text-white
                               rounded-2xl
                               p-6
                               text-center
                               transition-all
                               duration-300
                               hover:-translate-y-1
                               hover:shadow-xl"
                    >

                        <div
                            class="text-5xl
                                   mb-3
                                   group-hover:scale-110
                                   transition"
                        >
                            👤
                        </div>

                        <div class="font-bold text-lg">
                            Business Profile
                        </div>

                        <p class="text-sky-100 text-sm mt-1">
                            Manage your business details
                        </p>

                    </a>


                    <!-- GALLERY -->

                    <a
                        href="{{ route('business.gallery', $business) }}"
                        class="group
                               bg-orange-500
                               hover:bg-orange-600
                               text-white
                               rounded-2xl
                               p-6
                               text-center
                               transition-all
                               duration-300
                               hover:-translate-y-1
                               hover:shadow-xl"
                    >

                        <div
                            class="text-5xl
                                   mb-3
                                   group-hover:scale-110
                                   transition"
                        >
                            🖼
                        </div>

                        <div class="font-bold text-lg">
                            Gallery
                        </div>

                        <p class="text-orange-100 text-sm mt-1">
                            Manage business images
                        </p>

                    </a>


                    <!-- PRODUCTS -->

                    <a
                        href="{{ route('products.index') }}"
                        class="group
                               bg-green-600
                               hover:bg-green-700
                               text-white
                               rounded-2xl
                               p-6
                               text-center
                               transition-all
                               duration-300
                               hover:-translate-y-1
                               hover:shadow-xl"
                    >

                        <div
                            class="text-5xl
                                   mb-3
                                   group-hover:scale-110
                                   transition"
                        >
                            🛍
                        </div>

                        <div class="font-bold text-lg">
                            Products
                        </div>

                        <p class="text-green-100 text-sm mt-1">
                            Manage your products
                        </p>

                    </a>


                    <!-- ADVERTISEMENTS -->

                    <a
                        href="{{ route('business.advertisements.index') }}"
                        class="group
                               bg-purple-600
                               hover:bg-purple-700
                               text-white
                               rounded-2xl
                               p-6
                               text-center
                               transition-all
                               duration-300
                               hover:-translate-y-1
                               hover:shadow-xl"
                    >

                        <div
                            class="text-5xl
                                   mb-3
                                   group-hover:scale-110
                                   transition"
                        >
                            📢
                        </div>

                        <div class="font-bold text-lg">
                            Advertisements
                        </div>

                        <p class="text-purple-100 text-sm mt-1">
                            Promote your business
                        </p>

                    </a>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- FOOTER -->
            <!-- ================================================= -->

            <div
                class="mt-10
                       text-center
                       text-gray-500
                       pb-8"
            >

                <p class="text-lg font-semibold text-slate-700">
                    CampusConnect Business Dashboard
                </p>

                <p class="mt-2 text-sm">
                    Built with ❤️ for CampusConnect
                </p>

            </div>

        </div>

    </div>

</x-business-layout>