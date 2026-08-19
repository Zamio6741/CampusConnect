<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100">

<div class="max-w-7xl mx-auto px-8 py-10">

<div class="flex justify-between items-center mb-10">

<div>

<h1 class="text-5xl font-extrabold text-slate-800">
📊 Business Analytics
</h1>

<p class="text-gray-500 mt-2">
Real-time performance of your business.
</p>

</div>

<a href="{{ route('business.dashboard') }}"
class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl">

← Dashboard

</a>

</div>

<!-- KPI Cards -->

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

<div class="bg-white rounded-3xl shadow-lg p-8">

<div class="text-gray-500">Total Views</div>

<div class="text-5xl font-black mt-4 text-sky-600">

{{ $totalViews }}

</div>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<div class="text-gray-500">Products</div>

<div class="text-5xl font-black mt-4 text-indigo-600">

{{ $totalProducts }}

</div>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<div class="text-gray-500">Reviews</div>

<div class="text-5xl font-black mt-4 text-yellow-500">

{{ $totalReviews }}

</div>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<div class="text-gray-500">Average Rating</div>

<div class="text-5xl font-black mt-4 text-green-600">

{{ $averageRating }}

</div>

</div>

</div>

<!-- Second Row -->

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

<div class="bg-white rounded-3xl shadow-lg p-8">

<h2 class="font-bold text-xl">

💬 Messages

</h2>

<div class="mt-6 space-y-3">

<div class="flex justify-between">

<span>Total</span>

<strong>{{ $totalMessages }}</strong>

</div>

<div class="flex justify-between">

<span>Unread</span>

<strong>{{ $unreadMessages }}</strong>

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<h2 class="font-bold text-xl">

📢 Advertisements

</h2>

<div class="mt-6">

<div class="text-5xl font-black text-purple-600">

{{ $totalAds }}

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<h2 class="font-bold text-xl">

⭐ Featured Products

</h2>

<div class="mt-6">

<div class="text-5xl font-black text-orange-500">

{{ $featuredProducts }}

</div>

</div>

</div>

</div>

<!-- Performance -->

<div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

<h2 class="text-2xl font-bold mb-8">

📈 Performance Overview

</h2>

<div class="space-y-8">

<div>

<div class="flex justify-between">

<span>Business Visibility</span>

<span>{{ $totalViews }} Views</span>

</div>

<div class="w-full bg-gray-200 rounded-full h-4 mt-3">

<div class="bg-sky-600 h-4 rounded-full"
style="width: {{ min($totalViews,100) }}%">

</div>

</div>

</div>

<div>

<div class="flex justify-between">

<span>Customer Satisfaction</span>

<span>{{ $averageRating }}/5</span>

</div>

<div class="w-full bg-gray-200 rounded-full h-4 mt-3">

<div class="bg-yellow-400 h-4 rounded-full"
style="width: {{ $averageRating*20 }}%">

</div>

</div>

</div>

<div>

<div class="flex justify-between">

<span>Products Published</span>

<span>{{ $totalProducts }}</span>

</div>

<div class="w-full bg-gray-200 rounded-full h-4 mt-3">

<div class="bg-indigo-600 h-4 rounded-full"
style="width: {{ min($totalProducts*10,100) }}%">

</div>

</div>

</div>

<div>

<div class="flex justify-between">

<span>Average Views per Product</span>

<span>{{ $viewsPerProduct }}</span>

</div>

<div class="w-full bg-gray-200 rounded-full h-4 mt-3">

<div class="bg-green-600 h-4 rounded-full"
style="width: {{ min($viewsPerProduct*10,100) }}%">

</div>

</div>

</div>

</div>

</div>

</div>

</div>

<div class="grid lg:grid-cols-2 gap-8 mt-10">

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h2 class="text-2xl font-bold mb-6">
            📊 Business Growth
        </h2>

        <canvas id="growthChart" height="120"></canvas>

    </div>

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h2 class="text-2xl font-bold mb-6">
            🚀 Quick Insights
        </h2>

        <div class="space-y-5">

            <div class="flex justify-between">
                <span>Views Per Product</span>
                <strong>{{ $viewsPerProduct }}</strong>
            </div>

            <div class="flex justify-between">
                <span>Unread Messages</span>
                <strong>{{ $unreadMessages }}</strong>
            </div>

            <div class="flex justify-between">
                <span>Featured Products</span>
                <strong>{{ $featuredProducts }}</strong>
            </div>

            <div class="flex justify-between">
                <span>Advertisements</span>
                <strong>{{ $totalAds }}</strong>
            </div>

            <div class="flex justify-between">
                <span>Customer Rating</span>
                <strong>{{ $averageRating }}/5 ⭐</strong>
            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('growthChart');

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

            borderRadius: 12,
            borderSkipped: false
        }]
    },

    options: {

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {

            y: {
                beginAtZero: true,

                grid: {
                    color: '#e5e7eb'
                }
            },

            x: {

                grid: {
                    display: false
                }

            }

        }

    }

});
</script>

</x-business-layout>