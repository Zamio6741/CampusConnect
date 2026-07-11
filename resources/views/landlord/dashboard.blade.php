<x-app-layout>

<div class="min-h-screen bg-slate-100">

    <div class="flex">

        <!-- ================= SIDEBAR ================= -->

        <aside class="w-80 bg-slate-900 text-white min-h-screen shadow-2xl">

            <div class="px-8 py-8 border-b border-slate-700">

                <h1 class="text-3xl font-extrabold text-sky-400">
                    CampusConnect
                </h1>

                <p class="text-slate-400 mt-2">
                    Landlord Portal
                </p>

            </div>

            <div class="px-5 py-6">

                <p class="text-xs uppercase text-slate-500 font-bold tracking-wider mb-4">
                    Main Menu
                </p>

                <nav class="space-y-2">

                    <a href="{{ route('landlord.dashboard') }}"
                       class="flex items-center gap-4 px-5 py-4 rounded-xl bg-sky-600 hover:bg-sky-700 transition">

                        <span class="text-xl">🏘️</span>

                        <span class="font-semibold">
                            Dashboard
                        </span>

                    </a>

                    <a href="{{ route('rental.step1') }}"
                       class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 hover:translate-x-1 transition-all duration-200">

                        <span class="text-xl">➕</span>

                        <span>
                            Add Rental
                        </span>

                    </a>

                    <a href="{{ route('rentals.index') }}"
                       class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 hover:translate-x-1 transition-all duration-200">

                        <span class="text-xl">🏢</span>

                        <span>
                            My Rentals
                        </span>

                    </a>

                    <a href="#"
                       class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 hover:translate-x-1 transition-all duration-200">

                        <span class="text-xl">📅</span>

                        <span>
                            Bookings
                        </span>

                    </a>

                    <a href="#"
                       class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 hover:translate-x-1 transition-all duration-200">

                        <span class="text-xl">📈</span>

                        <span>
                            Analytics
                        </span>

                    </a>

                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 hover:translate-x-1 transition-all duration-200">

                        <span class="text-xl">👤</span>

                        <span>
                            Profile
                        </span>

                    </a>

                </nav>

            </div>

        </aside>

        <!-- ================= MAIN CONTENT ================= -->

        <main class="flex-1">

            <!-- TOP NAVBAR -->

            <div class="bg-white shadow-sm border-b">

                <div class="flex items-center justify-between px-10 py-6">

                    <div>

                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800">

                            Welcome back,

                            <span class="text-sky-600">
                                {{ Auth::user()->name }}
                            </span>

                            👋

                        </h2>

                        <p class="text-slate-500 mt-1">

                            Manage your rentals, bookings and tenants from one place.

                        </p>

                    </div>

                    <div class="flex items-center gap-5">

                        <button class="relative bg-slate-100 p-3 rounded-xl hover:bg-slate-200 transition hover:scale-105">

                            🔔

                            <span class="absolute -top-1 -right-1 w-5 h-5 rounded-full bg-red-500 text-white text-xs flex items-center justify-center">
                                3
                            </span>

                        </button>

                        <a href="{{ route('rental.step1') }}"
                           class="bg-sky-600 hover:bg-sky-700 text-white px-7 py-3 rounded-xl font-semibold shadow">

                            + Add Rental

                        </a>

                    </div>

                </div>

            </div>

            <!-- PAGE CONTENT START -->

<div class="p-8 lg:p-10">

<div class="mb-8">

    <p class="text-gray-400 text-sm">

        Dashboard /
        <span class="text-sky-600 font-semibold">
            Landlord
        </span>

    </p>

</div>

    <!-- DASHBOARD STATS -->

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <!-- Rentals -->

        <div class="bg-white rounded-3xl shadow-lg p-8 border-l-8 border-sky-500">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm uppercase">
                        Total Rentals
                    </p>

                    <h2 class="text-5xl font-bold mt-4 text-slate-800">
                        {{ $stats['rentals'] }}
                    </h2>

                </div>

                <div class="text-5xl">
                   🏘️
                </div>

            </div>

        </div>

        <!-- Views -->

        <div class="bg-white rounded-3xl shadow-lg p-8 border-l-8 border-purple-500">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm uppercase">
                        Property Views
                    </p>

                    <h2 class="text-5xl font-bold mt-4 text-purple-600">
                        {{ $stats['views'] }}
                    </h2>

                </div>

                <div class="text-5xl">
                    👀
                </div>

            </div>

        </div>

        <!-- Bookings -->

        <div class="bg-white rounded-3xl shadow-lg p-8 border-l-8 border-orange-500">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm uppercase">
                        Bookings
                    </p>

                    <h2 class="text-5xl font-bold mt-4 text-orange-500">
                        {{ $stats['bookings'] }}
                    </h2>

                </div>

                <div class="text-5xl">
                    📅
                </div>

            </div>

        </div>

        <!-- Revenue -->

        <div class="bg-white rounded-3xl shadow-lg p-8 border-l-8 border-green-500">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500 text-sm uppercase">
                        Revenue
                    </p>

                    <h2 class="text-4xl font-bold mt-4 text-green-600">

                        KES {{ number_format($stats['revenue'] ?? 0) }}

                    </h2>

                </div>

                <div class="text-5xl">
                    💰
                </div>

            </div>

        </div>

    </div>

    <!-- QUICK ACTIONS -->

    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">

        <a href="{{ route('rental.step1') }}"
           class="bg-sky-600 hover:bg-sky-700 text-white rounded-2xl p-6 shadow-lg transition">

            <div class="text-4xl mb-3">
                ➕
            </div>

            <h3 class="text-xl font-bold">
                Add New Rental
            </h3>

            <p class="mt-2 text-sky-100">
                Publish a new rental property.
            </p>

        </a>

        <a href="{{ route('rentals.index') }}"
           class="bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition">

            <div class="text-4xl mb-3">
                🏢
            </div>

            <h3 class="text-xl font-bold text-slate-800">
                Manage Rentals
            </h3>

            <p class="mt-2 text-gray-500">
                Edit or remove existing listings.
            </p>

        </a>

        <div class="bg-white rounded-2xl p-6 shadow-lg">

            <div class="text-4xl mb-3">
                ⭐
            </div>

            <h3 class="text-xl font-bold text-slate-800">
                Performance
            </h3>

            <p class="mt-2 text-gray-500">
                Your rentals are performing well.
            </p>

        </div>

    </div>

    <!-- ================= RECENT RENTALS ================= -->

<div class="mt-12 bg-white rounded-3xl shadow-lg overflow-hidden">

    <div class="flex justify-between items-center px-8 py-6 border-b">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">
               🏘️ Recent Rentals
            </h2>

            <p class="text-gray-500 mt-1">
                Manage all your published properties.
            </p>

        </div>

        <a href="{{ route('rental.step1') }}"
           class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-semibold">

            + Add Rental

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="text-left px-8 py-5 font-bold text-slate-700">
                        Property
                    </th>

                    <th class="text-left px-6 py-5 font-bold text-slate-700">
                        University
                    </th>

                    <th class="text-left px-6 py-5 font-bold text-slate-700">
                        Location
                    </th>

                    <th class="text-left px-6 py-5 font-bold text-slate-700">
                        Price
                    </th>

                    <th class="text-left px-6 py-5 font-bold text-slate-700">
                        Status
                    </th>

                    <th class="text-center px-6 py-5 font-bold text-slate-700">
                        Actions
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($rentals as $rental)

                <tr class="border-b hover:bg-sky-50 transition duration-200">

                    <!-- Property -->

                    <td class="px-8 py-6">

                        <div class="flex items-center gap-4">

                            @if($rental->photos && $rental->photos->count())

                                <img
                                    src="{{ asset('storage/'.$rental->photos->first()->photo_path) }}"
                                    class="w-20 h-20 rounded-xl object-cover shadow">

                            @else

                                <div class="w-20 h-20 rounded-xl bg-slate-200 flex items-center justify-center">

                                    🏘️

                                </div>

                            @endif

                            <div>

                                <h3 class="font-bold text-slate-800">

                                    {{ $rental->title }}

                                </h3>

                                <p class="text-gray-500 text-sm">

                                    {{ ucfirst(str_replace('_',' ', $rental->property_type)) }}

                                </p>

                            </div>

                        </div>

                    </td>

                    <!-- University -->

                    <td class="px-6">

                        {{ $rental->university->name ?? '-' }}

                    </td>

                    <!-- Location -->

                    <td class="px-6">

                        {{ $rental->location }}

                    </td>

                    <!-- Price -->

                    <td class="px-6">

                        <span class="font-bold text-green-600">

                            KES {{ number_format($rental->price) }}

                        </span>

                    </td>

                    <!-- Status -->

                    <td class="px-6">

                        @if($rental->verified)

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">

                                ✔ Verified

                            </span>

                        @else

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">

                                Pending

                            </span>

                        @endif

                    </td>

                    <!-- Actions -->

                    <td class="px-6">

                        <div class="flex justify-center gap-3">

                            <button
                                class="px-4 py-2 rounded-lg bg-slate-200 text-slate-600 cursor-not-allowed"
                                disabled>

                                Edit

                            </button>

                            <button
                                class="px-4 py-2 rounded-lg bg-red-100 text-red-600 cursor-not-allowed"
                                disabled>

                                Delete

                            </button>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="py-20 text-center">

                        <div class="text-6xl mb-4">

                           🏘️

                        </div>

                        <h3 class="text-2xl font-bold text-slate-700">

                            No Rentals Yet

                        </h3>

                        <p class="text-gray-500 mt-2">

                            Publish your first property and begin receiving booking requests.

                        </p>

                        <a href="{{ route('rental.step1') }}"
                           class="inline-block mt-6 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl">

                            + Add First Rental

                        </a>

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

<!-- ================= BOOKINGS + NOTIFICATIONS ================= -->

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mt-10">

    <!-- ================= RECENT BOOKINGS ================= -->

    <div class="xl:col-span-2 bg-white rounded-3xl shadow-lg">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold text-slate-800">
                📅 Recent Bookings
            </h2>

            <p class="text-gray-500 mt-1">
                Latest booking activity.
            </p>

        </div>

        <div class="divide-y">

            @forelse($recentBookings ?? [] as $booking)

                <div class="flex items-center justify-between px-8 py-5">

                    <div>

                        <h3 class="font-bold text-slate-800">

                            {{ $booking->user->name ?? 'Student' }}

                        </h3>

                        <p class="text-gray-500 text-sm">

                            {{ $booking->accommodation->title ?? 'Rental' }}

                        </p>

                    </div>

                    <div class="text-right">

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">

                            {{ ucfirst($booking->status ?? 'Pending') }}

                        </span>

                    </div>

                </div>

            @empty

                <div class="text-center py-16">

                    <div class="text-6xl">

                        📭

                    </div>

                    <h3 class="text-xl font-bold mt-4">

                        No bookings yet

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Booking requests will appear here.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

    <!-- ================= NOTIFICATIONS ================= -->

    <div class="bg-white rounded-3xl shadow-lg">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                🔔 Notifications

            </h2>

        </div>

        <div class="divide-y">

            @forelse($notifications ?? [] as $notification)

                <div class="px-8 py-5">

                    <p class="font-semibold text-slate-800">

                        {{ $notification->title }}

                    </p>

                    <p class="text-gray-500 text-sm mt-2">

                        {{ $notification->message }}

                    </p>

                </div>

            @empty

                <div class="text-center py-16">

                    <div class="text-6xl">

                        🎉

                    </div>

                    <p class="text-gray-500 mt-4">

                        You're all caught up.

                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>
<!-- ================= PERFORMANCE & INSIGHTS ================= -->

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-10">

    <!-- Occupancy -->

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex items-center justify-between">

            <h2 class="text-2xl font-bold text-slate-800">
                📊 Occupancy
            </h2>

            <span class="text-4xl">
                🏘️
            </span>

        </div>

        @php
            $occupied = $stats['bookings'] ?? 0;
            $rentalsCount = max($stats['rentals'] ?? 1, 1);
            $occupancy = min(100, round(($occupied / $rentalsCount) * 100));
        @endphp

        <div class="mt-8">

            <div class="flex justify-between mb-2">

                <span class="text-gray-500">

                    Occupied

                </span>

                <span class="font-bold text-sky-600">

                    {{ $occupancy }}%

                </span>

            </div>

            <div class="w-full bg-gray-200 rounded-full h-4">

                <div
                    class="bg-sky-600 h-4 rounded-full"
                    style="width: {{ $occupancy }}%;">

                </div>

            </div>

        </div>

    </div>

    <!-- Revenue -->

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-center">

            <h2 class="text-2xl font-bold">

                💰 Revenue

            </h2>

            <span class="text-4xl">

                💵

            </span>

        </div>

        <h1 class="text-4xl font-extrabold text-green-600 mt-8">

            KES {{ number_format($stats['revenue'] ?? 0) }}

        </h1>

        <p class="text-gray-500 mt-2">

            Total revenue generated.

        </p>

    </div>

    <!-- Performance -->

    <div class="bg-gradient-to-br from-sky-600 to-blue-700 text-white rounded-3xl shadow-lg p-8">

        <div class="text-5xl">

            ⭐

        </div>

        <h2 class="text-2xl font-bold mt-6">

            Performance Score

        </h2>

        <h1 class="text-6xl font-extrabold mt-6">

            {{ min(100, 70 + ($stats['rentals'] * 3)) }}

        </h1>

        <p class="mt-3 text-sky-100">

            Great work! Keep your listings active.

        </p>

    </div>

</div>

<!-- ================= FOOTER ================= -->

<footer class="mt-16 border-t pt-6 text-center text-gray-500">

    <p class="font-semibold">
        CampusConnect Landlord Portal
    </p>

    <p class="text-sm mt-1">
        Helping landlords manage rentals efficiently.
    </p>

</footer>

</div>

        </main>

    </div>

</div>

</x-app-layout>