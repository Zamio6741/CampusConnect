<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">

        {{-- ========================================================= --}}
        {{-- PAGE HEADER --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8 sm:mb-10">

            <div class="min-w-0">

                <div class="flex items-center gap-3">

                    <div class="
                        w-11 h-11 sm:w-12 sm:h-12
                        rounded-2xl
                        bg-sky-100
                        border border-sky-200
                        flex items-center justify-center
                        text-xl sm:text-2xl
                        shrink-0
                    ">
                        📊
                    </div>

                    <div class="min-w-0">

                        <h1 class="
                            text-2xl
                            sm:text-3xl
                            lg:text-4xl
                            font-extrabold
                            text-slate-800
                            tracking-tight
                            truncate
                        ">
                            Business Analytics
                        </h1>

                        <p class="text-gray-500 mt-1 text-sm sm:text-base">
                            Real-time performance of your business.
                        </p>

                    </div>

                </div>

            </div>


            <a
                href="{{ route('business.dashboard') }}"
                class="
                    inline-flex
                    items-center
                    justify-center
                    w-full
                    sm:w-auto
                    px-5
                    py-3
                    rounded-xl
                    bg-sky-600
                    hover:bg-sky-700
                    text-white
                    font-semibold
                    border-2
                    border-sky-600
                    hover:border-sky-700
                    shadow-sm
                    hover:shadow-md
                    transition-all
                    duration-200
                "
            >
                ← Dashboard
            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- KPI CARDS --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 lg:gap-6">


            {{-- TOTAL VIEWS --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                hover:shadow-lg
                p-4 sm:p-6 lg:p-8
                transition
            ">

                <div class="flex items-center justify-between gap-2">

                    <span class="text-xs sm:text-sm font-semibold text-gray-500">
                        Total Views
                    </span>

                    <span class="hidden sm:flex w-9 h-9 rounded-xl bg-sky-50 items-center justify-center">
                        👀
                    </span>

                </div>

                <div class="text-2xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-sky-600 break-words">
                    {{ $totalViews }}
                </div>

                <p class="text-xs text-gray-400 mt-2">
                    Business visibility
                </p>

            </div>


            {{-- PRODUCTS --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                hover:shadow-lg
                p-4 sm:p-6 lg:p-8
                transition
            ">

                <div class="flex items-center justify-between gap-2">

                    <span class="text-xs sm:text-sm font-semibold text-gray-500">
                        Products
                    </span>

                    <span class="hidden sm:flex w-9 h-9 rounded-xl bg-indigo-50 items-center justify-center">
                        🛍️
                    </span>

                </div>

                <div class="text-2xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-indigo-600">
                    {{ $totalProducts }}
                </div>

                <p class="text-xs text-gray-400 mt-2">
                    Published products
                </p>

            </div>


            {{-- REVIEWS --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                hover:shadow-lg
                p-4 sm:p-6 lg:p-8
                transition
            ">

                <div class="flex items-center justify-between gap-2">

                    <span class="text-xs sm:text-sm font-semibold text-gray-500">
                        Reviews
                    </span>

                    <span class="hidden sm:flex w-9 h-9 rounded-xl bg-yellow-50 items-center justify-center">
                        ⭐
                    </span>

                </div>

                <div class="text-2xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-yellow-500">
                    {{ $totalReviews }}
                </div>

                <p class="text-xs text-gray-400 mt-2">
                    Customer reviews
                </p>

            </div>


            {{-- RATING --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                hover:shadow-lg
                p-4 sm:p-6 lg:p-8
                transition
            ">

                <div class="flex items-center justify-between gap-2">

                    <span class="text-xs sm:text-sm font-semibold text-gray-500">
                        Average Rating
                    </span>

                    <span class="hidden sm:flex w-9 h-9 rounded-xl bg-green-50 items-center justify-center">
                        ⭐
                    </span>

                </div>

                <div class="text-2xl sm:text-4xl lg:text-5xl font-black mt-3 sm:mt-4 text-green-600">
                    {{ $averageRating }}
                </div>

                <p class="text-xs text-gray-400 mt-2">
                    Out of 5.0
                </p>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SECONDARY METRICS --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mt-6 sm:mt-8">


            {{-- MESSAGES --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                p-5 sm:p-7 lg:p-8
            ">

                <div class="flex items-center gap-3">

                    <div class="
                        w-11 h-11
                        rounded-xl
                        bg-blue-50
                        border border-blue-100
                        flex items-center justify-center
                        text-xl
                    ">
                        💬
                    </div>

                    <h2 class="font-bold text-lg sm:text-xl text-slate-800">
                        Messages
                    </h2>

                </div>

                <div class="mt-6 space-y-4">

                    <div class="flex justify-between items-center border-b border-slate-100 pb-3">
                        <span class="text-gray-500">Total</span>
                        <strong class="text-slate-800">
                            {{ $totalMessages }}
                        </strong>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-gray-500">Unread</span>
                        <strong class="text-blue-600">
                            {{ $unreadMessages }}
                        </strong>
                    </div>

                </div>

            </div>


            {{-- ADVERTISEMENTS --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                p-5 sm:p-7 lg:p-8
            ">

                <div class="flex items-center gap-3">

                    <div class="
                        w-11 h-11
                        rounded-xl
                        bg-purple-50
                        border border-purple-100
                        flex items-center justify-center
                        text-xl
                    ">
                        📢
                    </div>

                    <h2 class="font-bold text-lg sm:text-xl text-slate-800">
                        Advertisements
                    </h2>

                </div>

                <div class="mt-6">

                    <div class="text-4xl sm:text-5xl font-black text-purple-600">
                        {{ $totalAds }}
                    </div>

                    <p class="text-sm text-gray-400 mt-2">
                        Total advertisements
                    </p>

                </div>

            </div>


            {{-- FEATURED PRODUCTS --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                p-5 sm:p-7 lg:p-8
            ">

                <div class="flex items-center gap-3">

                    <div class="
                        w-11 h-11
                        rounded-xl
                        bg-orange-50
                        border border-orange-100
                        flex items-center justify-center
                        text-xl
                    ">
                        ⭐
                    </div>

                    <h2 class="font-bold text-lg sm:text-xl text-slate-800">
                        Featured Products
                    </h2>

                </div>

                <div class="mt-6">

                    <div class="text-4xl sm:text-5xl font-black text-orange-500">
                        {{ $featuredProducts }}
                    </div>

                    <p class="text-sm text-gray-400 mt-2">
                        Featured products
                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PERFORMANCE OVERVIEW --}}
        {{-- ========================================================= --}}

        <div class="
            bg-white
            rounded-2xl sm:rounded-3xl
            border border-slate-200
            shadow-sm
            mt-6 sm:mt-8
            p-5 sm:p-7 lg:p-8
        ">

            <div class="flex items-center gap-3 mb-7 sm:mb-8">

                <div class="
                    w-11 h-11
                    rounded-xl
                    bg-sky-50
                    border border-sky-100
                    flex items-center justify-center
                    text-xl
                ">
                    📈
                </div>

                <div>

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        Performance Overview
                    </h2>

                    <p class="text-sm text-gray-400 mt-1">
                        Track the key areas of your business.
                    </p>

                </div>

            </div>


            <div class="space-y-7 sm:space-y-8">


                {{-- BUSINESS VISIBILITY --}}

                <div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 text-sm">

                        <span class="font-semibold text-slate-700">
                            Business Visibility
                        </span>

                        <span class="text-gray-500">
                            {{ $totalViews }} Views
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3 sm:h-4 mt-3 overflow-hidden">

                        <div
                            class="bg-sky-600 h-full rounded-full transition-all duration-500"
                            style="width: {{ min($totalViews,100) }}%"
                        ></div>

                    </div>

                </div>


                {{-- CUSTOMER SATISFACTION --}}

                <div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 text-sm">

                        <span class="font-semibold text-slate-700">
                            Customer Satisfaction
                        </span>

                        <span class="text-gray-500">
                            {{ $averageRating }}/5
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3 sm:h-4 mt-3 overflow-hidden">

                        <div
                            class="bg-yellow-400 h-full rounded-full transition-all duration-500"
                            style="width: {{ $averageRating*20 }}%"
                        ></div>

                    </div>

                </div>


                {{-- PRODUCTS PUBLISHED --}}

                <div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 text-sm">

                        <span class="font-semibold text-slate-700">
                            Products Published
                        </span>

                        <span class="text-gray-500">
                            {{ $totalProducts }}
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3 sm:h-4 mt-3 overflow-hidden">

                        <div
                            class="bg-indigo-600 h-full rounded-full transition-all duration-500"
                            style="width: {{ min($totalProducts*10,100) }}%"
                        ></div>

                    </div>

                </div>


                {{-- AVERAGE VIEWS PER PRODUCT --}}

                <div>

                    <div class="flex flex-col sm:flex-row sm:justify-between gap-1 text-sm">

                        <span class="font-semibold text-slate-700">
                            Average Views per Product
                        </span>

                        <span class="text-gray-500">
                            {{ $viewsPerProduct }}
                        </span>

                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-3 sm:h-4 mt-3 overflow-hidden">

                        <div
                            class="bg-green-600 h-full rounded-full transition-all duration-500"
                            style="width: {{ min($viewsPerProduct*10,100) }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- CHART + QUICK INSIGHTS --}}
        {{-- ========================================================= --}}

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 sm:gap-8 mt-6 sm:mt-8">


            {{-- BUSINESS GROWTH --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                p-5 sm:p-7 lg:p-8
                min-w-0
            ">

                <div class="flex items-center gap-3 mb-6">

                    <div class="
                        w-11 h-11
                        rounded-xl
                        bg-sky-50
                        border border-sky-100
                        flex items-center justify-center
                        text-xl
                        shrink-0
                    ">
                        📊
                    </div>

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                            Business Growth
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            Current business metrics
                        </p>

                    </div>

                </div>

                <div class="relative w-full h-64 sm:h-72">

                    <canvas id="growthChart"></canvas>

                </div>

            </div>


            {{-- QUICK INSIGHTS --}}

            <div class="
                bg-white
                rounded-2xl sm:rounded-3xl
                border border-slate-200
                shadow-sm
                p-5 sm:p-7 lg:p-8
            ">

                <div class="flex items-center gap-3 mb-6">

                    <div class="
                        w-11 h-11
                        rounded-xl
                        bg-indigo-50
                        border border-indigo-100
                        flex items-center justify-center
                        text-xl
                    ">
                        🚀
                    </div>

                    <div>

                        <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                            Quick Insights
                        </h2>

                        <p class="text-sm text-gray-400 mt-1">
                            A quick look at your business.
                        </p>

                    </div>

                </div>


                <div class="space-y-1">


                    <div class="flex items-center justify-between gap-4 py-4 border-b border-slate-100">

                        <span class="text-sm sm:text-base text-gray-600">
                            Views Per Product
                        </span>

                        <strong class="text-slate-800">
                            {{ $viewsPerProduct }}
                        </strong>

                    </div>


                    <div class="flex items-center justify-between gap-4 py-4 border-b border-slate-100">

                        <span class="text-sm sm:text-base text-gray-600">
                            Unread Messages
                        </span>

                        <strong class="text-blue-600">
                            {{ $unreadMessages }}
                        </strong>

                    </div>


                    <div class="flex items-center justify-between gap-4 py-4 border-b border-slate-100">

                        <span class="text-sm sm:text-base text-gray-600">
                            Featured Products
                        </span>

                        <strong class="text-orange-500">
                            {{ $featuredProducts }}
                        </strong>

                    </div>


                    <div class="flex items-center justify-between gap-4 py-4 border-b border-slate-100">

                        <span class="text-sm sm:text-base text-gray-600">
                            Advertisements
                        </span>

                        <strong class="text-purple-600">
                            {{ $totalAds }}
                        </strong>

                    </div>


                    <div class="flex items-center justify-between gap-4 py-4">

                        <span class="text-sm sm:text-base text-gray-600">
                            Customer Rating
                        </span>

                        <strong class="text-yellow-500">
                            {{ $averageRating }}/5 ⭐
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- ========================================================= --}}
{{-- CHART.JS --}}
{{-- ========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const ctx = document.getElementById('growthChart');

    if (!ctx) {
        return;
    }

    new Chart(ctx, {

        type: 'bar',

        data: {

            labels: [
                'Views',
                'Products',
                'Reviews',
                'Messages',
                'Ads'
            ],

            datasets: [{

                data: [
                    {{ $totalViews }},
                    {{ $totalProducts }},
                    {{ $totalReviews }},
                    {{ $totalMessages }},
                    {{ $totalAds }}
                ],

                backgroundColor: [
                    '#0ea5e9',
                    '#6366f1',
                    '#facc15',
                    '#10b981',
                    '#a855f7'
                ],

                borderRadius: 10,

                borderSkipped: false

            }]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            plugins: {

                legend: {
                    display: false
                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    ticks: {
                        precision: 0
                    },

                    grid: {
                        color: '#e5e7eb'
                    }

                },

                x: {

                    grid: {
                        display: false
                    },

                    ticks: {

                        font: {
                            size: 11
                        }

                    }

                }

            }

        }

    });

});

</script>

</x-business-layout>