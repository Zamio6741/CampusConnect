<x-app-layout>

<div class="min-h-screen bg-slate-100">

    <div class="flex">

        {{-- ================= SIDEBAR ================= --}}

        <aside class="w-80 bg-slate-900 text-white min-h-screen shadow-2xl">

            <div class="px-8 py-8 border-b border-slate-700">

                <h1 class="text-3xl font-extrabold text-sky-400">
                    CampusConnect
                </h1>

                <p class="text-slate-400 mt-2">
                    Landlord Portal
                </p>

            </div>

            <nav class="p-6 space-y-2">

                <a href="{{ route('landlord.dashboard') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl bg-sky-600">

                    <span class="text-2xl">🏠</span>

                    <span class="font-semibold">
                        Dashboard
                    </span>

                </a>

                <a href="{{ route('rental.step1') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 transition">

                    <span class="text-2xl">➕</span>

                    <span>Add Rental</span>

                </a>

                <a href="{{ route('rentals.index') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 transition">

                    <span class="text-2xl">🏢</span>

                    <span>My Rentals</span>

                </a>

                <a href="{{ route('landlord.bookings') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 transition">

                    <span class="text-2xl">📅</span>

                    <span>Bookings</span>

                </a>

                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-slate-800 transition">

                    <span class="text-2xl">👤</span>

                    <span>Profile</span>

                </a>

            </nav>

        </aside>

        {{-- ================= MAIN CONTENT ================= --}}

        <main class="flex-1">

            {{-- TOP BAR --}}

            <div class="bg-white shadow-sm border-b">

                <div class="px-10 py-6 flex justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-extrabold text-slate-800">

                            Welcome,

                            <span class="text-sky-600">

                                {{ Auth::user()->name }}

                            </span>

                            👋

                        </h1>

                        <p class="text-gray-500 mt-2">

                            Manage all your rentals from one place.

                        </p>

                    </div>

                    <div class="flex items-center gap-5">

                        <div class="relative">

    <button id="notificationBtn"
        class="bg-gray-100 rounded-xl p-3 hover:bg-gray-200 relative">

        🔔

        @if($notifications->where('is_read', false)->count())
            <span
                class="absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center">

                {{ $notifications->where('is_read', false)->count() }}

            </span>
        @endif

    </button>

    <div
        id="notificationMenu"
        class="hidden absolute right-0 mt-3 w-96 bg-white rounded-2xl shadow-2xl border z-50">

        <div class="flex justify-between items-center p-5 border-b">

            <h2 class="font-bold text-lg">
                Notifications
            </h2>

            <form method="POST"
                  action="{{ route('notifications.readAll') }}">

                @csrf
                @method('PATCH')

                <button
                    class="text-sky-600 text-sm font-semibold">

                    Mark all read

                </button>

            </form>

        </div>

        <div class="max-h-96 overflow-y-auto">

            @forelse($notifications->take(8) as $notification)

                <div class="p-4 border-b">

                    <div class="flex justify-between">

                        <div>

                            <h3 class="font-bold">

                                {{ $notification->title }}

                            </h3>

                            <p class="text-gray-500 text-sm">

                                {{ $notification->message }}

                            </p>

                        </div>

                        <div class="flex gap-2">

                            @unless($notification->is_read)

                            <form
                                method="POST"
                                action="{{ route('notifications.read',$notification) }}">

                                @csrf
                                @method('PATCH')

                                <button>
                                    ✔
                                </button>

                            </form>

                            @endunless

                            <form
                                method="POST"
                                action="{{ route('notifications.destroy',$notification) }}">

                                @csrf
                                @method('DELETE')

                                <button class="text-red-600">
                                    🗑
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="p-10 text-center text-gray-500">

                    No notifications.

                </div>

            @endforelse

        </div>

    </div>

</div>

                        <a href="{{ route('rental.step1') }}"
                           class="bg-sky-600 hover:bg-sky-700 text-white px-7 py-3 rounded-xl font-semibold">

                            + Add Rental

                        </a>

                    </div>

                </div>

            </div>

            {{-- PAGE CONTENT --}}

            <div class="p-10">

                <div class="mb-8">

                    <p class="text-gray-500">

                        Dashboard /

                        <span class="text-sky-600 font-bold">

                            Landlord

                        </span>

                    </p>

                </div>

                {{-- ================= STATISTICS ================= --}}

                <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="text-5xl mb-4">
                            🏠
                        </div>

                        <h2 class="text-5xl font-bold text-blue-600">

                            {{ $stats['rentals'] }}

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Properties

                        </p>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="text-5xl mb-4">
                            📅
                        </div>

                        <h2 class="text-5xl font-bold text-orange-600">

                            {{ $stats['bookings'] }}

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Bookings

                        </p>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="text-5xl mb-4">
                            ⏳
                        </div>

                        <h2 class="text-5xl font-bold text-yellow-500">

                            {{ $stats['pending'] }}

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Pending

                        </p>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="text-5xl mb-4">
                            ✅
                        </div>

                        <h2 class="text-5xl font-bold text-green-600">

                            {{ $stats['approved'] }}

                        </h2>

                        <p class="text-gray-500 mt-2">

                            Approved

                        </p>

                    </div>

                </div>

                                <!-- ================================================= -->
                <!-- QUICK ACTIONS -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10">

                    <a href="{{ route('rental.step1') }}"
                       class="bg-gradient-to-r from-sky-600 to-blue-700 text-white rounded-3xl p-8 shadow-lg hover:scale-105 transition">

                        <div class="text-5xl mb-4">
                            ➕
                        </div>

                        <h2 class="text-2xl font-bold">
                            Add Property
                        </h2>

                        <p class="mt-2 text-sky-100">
                            Publish a new rental property.
                        </p>

                    </a>

                    <a href="{{ route('rentals.index') }}"
                       class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition">

                        <div class="text-5xl mb-4">
                            🏘️
                        </div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            My Rentals
                        </h2>

                        <p class="mt-2 text-gray-500">
                            Manage your listed properties.
                        </p>

                    </a>

                    <a href="{{ route('landlord.bookings') }}"
                       class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-xl transition">

                        <div class="text-5xl mb-4">
                            📅
                        </div>

                        <h2 class="text-2xl font-bold text-slate-800">
                            Booking Requests
                        </h2>

                        <p class="mt-2 text-gray-500">
                            Review student booking requests.
                        </p>

                    </a>

                </div>

                <!-- ================================================= -->
                <!-- RECENT BOOKINGS -->
                <!-- ================================================= -->

                <div class="bg-white rounded-3xl shadow-lg mt-10 overflow-hidden">

                    <div class="px-8 py-6 border-b flex justify-between items-center">

                        <div>

                            <h2 class="text-2xl font-bold text-slate-800">

                                📅 Recent Booking Requests

                            </h2>

                            <p class="text-gray-500 mt-1">

                                Latest booking activity.

                            </p>

                        </div>

                    </div>

                    @forelse($recentBookings as $booking)

                        <div class="flex justify-between items-center px-8 py-5 border-b hover:bg-slate-50">

                            <div>

                                <h3 class="font-bold text-lg">

                                    {{ $booking->student->name ?? 'Student' }}

                                </h3>

                                <p class="text-gray-500">

                                    {{ $booking->accommodation->title ?? 'Rental' }}

                                </p>

                            </div>

                            <div>

                                @if($booking->status == 'Pending')

                                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">

                                        Pending

                                    </span>

                                @elseif($booking->status == 'Approved')

                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                                        Approved

                                    </span>

                                @elseif($booking->status == 'Rejected')

                                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                                        Rejected

                                    </span>

                                @else

                                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">

                                        {{ $booking->status }}

                                    </span>

                                @endif

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-16">

                            <div class="text-6xl">

                                📭

                            </div>

                            <h3 class="text-2xl font-bold mt-4">

                                No Booking Requests Yet

                            </h3>

                            <p class="text-gray-500 mt-2">

                                Booking requests will appear here.

                            </p>

                        </div>

                    @endforelse

                </div>

                <!-- ================================================= -->
<!-- MY RENTALS -->
<!-- ================================================= -->

<div class="bg-white rounded-3xl shadow-lg overflow-hidden mt-10">

    <div class="flex justify-between items-center px-8 py-6 border-b">

        <div>

            <h2 class="text-2xl font-bold text-slate-800">
                🏘️ My Rentals
            </h2>

            <p class="text-gray-500 mt-1">
                Manage all your listed properties.
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

                <tr class="border-b hover:bg-sky-50 transition">

                    <td class="px-8 py-5">

                        <div class="flex items-center gap-4">

                            @if($rental->photos->count())

                                <img
                                    src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                    class="w-20 h-20 rounded-xl object-cover shadow">

                            @else

                                <div class="w-20 h-20 rounded-xl bg-slate-200 flex items-center justify-center">

                                    🏠

                                </div>

                            @endif

                            <div>

                                <h3 class="font-bold text-lg">

                                    {{ $rental->title }}

                                </h3>

                                <div class="flex gap-2 mt-2">

                                    <span class="text-xs bg-sky-100 text-sky-700 px-2 py-1 rounded-full">

                                        {{ ucfirst(str_replace('_',' ',$rental->property_type)) }}

                                    </span>

                                </div>

                            </div>

                        </div>

                    </td>

                    <td class="px-6">

                        {{ $rental->university->name ?? '-' }}

                    </td>

                    <td class="px-6">

                        {{ $rental->location }}

                    </td>

                    <td class="px-6">

    <span class="font-bold text-green-600">

        KES {{ number_format($rental->price) }}

    </span>

</td>

                    <td class="px-6">

                       @if($rental->bookings()->where('status', 'Moved In')->exists())

    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">
        🏠 Occupied
    </span>

@elseif($rental->bookings()->where('status', 'Approved')->exists())

    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm">
        📅 Reserved
    </span>

@else

    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm">
        🟢 Available
    </span>

@endif

                    </td>

                    <td class="px-6">

                        <div class="flex justify-center gap-3">

                            <a href="{{ route('rentals.show',$rental) }}"
                               class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-lg">

                                View

                            </a>

                            <a href="{{ route('rentals.edit',$rental) }}"
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form
                                action="{{ route('rentals.destroy',$rental) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this property?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center py-20">

                        <div class="text-6xl">

                            🏘️

                        </div>

                        <h3 class="text-2xl font-bold mt-4">

                            No Rentals Yet

                        </h3>

                        <p class="text-gray-500 mt-2">

                            Publish your first property to begin receiving bookings.

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

<!-- ================================================= -->
<!-- DASHBOARD FOOTER WIDGETS -->
<!-- ================================================= -->

<div class="grid grid-cols-1 xl:grid-cols-3 gap-8 mt-10">

    <!-- Notifications -->

    <div class="bg-white rounded-3xl shadow-lg">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                🔔 Notifications

            </h2>

        </div>

        <div class="divide-y">

            @forelse($notifications as $notification)

                <div class="px-8 py-5">

                    <h3 class="font-bold">

                        {{ $notification->title }}

                    </h3>

                    <p class="text-gray-500 mt-2">

                        {{ $notification->message }}

                    </p>

                </div>

            @empty

                <div class="text-center py-16">

                    @if($notifications->count())

    @foreach($notifications->take(5) as $notification)

        <div class="border-b py-3">

            <p class="font-semibold">

                {{ $notification->title }}

            </p>

            <p class="text-gray-500 text-sm">

                {{ $notification->message }}

            </p>

        </div>

    @endforeach

@else

    <div class="text-center py-10">


        <p class="text-gray-500">
            No new notifications.
        </p>

    </div>

@endif

                </div>

            @endforelse

        </div>

    </div>

  <!-- Rentals Occupied -->

<div class="bg-white rounded-3xl shadow-lg p-8">

    <div class="flex justify-between">

        <h2 class="text-2xl font-bold">
            🏠 Rentals Occupied
        </h2>

        <span class="text-5xl">
            🏘️
        </span>

    </div>

    <div class="mt-10 text-center">

        <h1 class="text-6xl font-extrabold text-sky-600">
            {{ $stats['occupiedRentals'] }}
        </h1>

        <p class="mt-3 text-gray-500">
            Rental(s) currently occupied
        </p>

    </div>

</div>

    <!-- Revenue -->

    <div class="bg-gradient-to-br from-sky-600 to-blue-700 rounded-3xl shadow-lg text-white p-8">

        <div class="text-5xl">

            💰

        </div>

        <h2 class="text-2xl font-bold mt-6">

            Revenue

        </h2>

        <h1 class="text-5xl font-extrabold mt-6">

            KES {{ number_format($stats['revenue']) }}

        </h1>

        <p class="mt-4 text-sky-100">

            Estimated earnings from approved bookings.

        </p>

    </div>

</div>

<!-- ================================================= -->
<!-- FOOTER -->
<!-- ================================================= -->

<footer class="mt-16 border-t pt-8 pb-10 text-center text-gray-500">

    <h3 class="font-bold text-lg">

        CampusConnect Landlord Portal

    </h3>

    <p class="mt-2">

        Manage rentals, bookings and tenants efficiently.

    </p>

    <p class="mt-5 text-sm">

        © {{ date('Y') }} CampusConnect. All Rights Reserved.

    </p>

</footer>
                               
            </div>

            </div>

        </main>

    </div>

</div>

<script>

const btn=document.getElementById('notificationBtn');

const menu=document.getElementById('notificationMenu');

btn.addEventListener('click',()=>{

menu.classList.toggle('hidden');

});

document.addEventListener('click',function(e){

if(!btn.contains(e.target)&&!menu.contains(e.target)){

menu.classList.add('hidden');

}

});

</script>

</x-app-layout>