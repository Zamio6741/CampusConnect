<x-landlord-layout>

    <div class="min-h-screen w-full">
        {{-- ================= MAIN CONTENT ================= --}}

        <main class="w-full min-w-0">

            {{-- ========================================================= --}}
            {{-- TOP BAR --}}
            {{-- ========================================================= --}}

            <div class="border-b border-slate-200 bg-white">

                <div class="px-4 sm:px-6 lg:px-8 xl:px-10 py-5 sm:py-6">

                    <div class="flex flex-col gap-5 lg:flex-row lg:items-center lg:justify-between">

                        {{-- Welcome --}}
                        <div class="min-w-0">

                            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800 leading-tight">
                                Welcome,

                                <span class="text-sky-600 break-words">
                                    {{ Auth::user()->name }}
                                </span>

                                <span class="inline-block">👋</span>
                            </h1>

                            <p class="text-gray-500 mt-2 text-sm sm:text-base">
                                Manage all your rentals from one place.
                            </p>

                        </div>

                        {{-- Top Actions --}}
                        <div class="flex items-center gap-3 sm:gap-4">

                            {{-- Notifications --}}
                            <div class="relative">

                                <button
                                    id="notificationBtn"
                                    type="button"
                                    aria-label="Open notifications"
                                    aria-expanded="false"
                                    class="bg-gray-100 hover:bg-gray-200 active:bg-gray-300 rounded-xl p-3 sm:p-3.5 relative transition duration-200 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2"
                                >

                                    <span class="text-lg sm:text-xl">
                                        🔔
                                    </span>

                                    @if($notifications->where('is_read', false)->count())

                                        <span
                                            class="absolute -top-1.5 -right-1.5 bg-red-600 text-white text-[10px] sm:text-xs font-bold rounded-full min-w-5 h-5 sm:min-w-6 sm:h-6 px-1 flex items-center justify-center border-2 border-white"
                                        >
                                            {{ $notifications->where('is_read', false)->count() }}
                                        </span>

                                    @endif

                                </button>

                                {{-- Notification Menu --}}
                                <div
                                    id="notificationMenu"
                                    class="hidden absolute right-0 mt-3 w-[calc(100vw-2rem)] max-w-sm sm:w-96 bg-white rounded-2xl shadow-2xl border border-slate-200 z-50 overflow-hidden"
                                >

                                    <div class="flex justify-between items-center gap-3 p-4 sm:p-5 border-b">

                                        <h2 class="font-bold text-base sm:text-lg text-slate-800">
                                            Notifications
                                        </h2>

                                        <form
                                            method="POST"
                                            action="{{ route('notifications.readAll') }}"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                class="text-sky-600 hover:text-sky-700 text-xs sm:text-sm font-semibold whitespace-nowrap"
                                            >
                                                Mark all read
                                            </button>

                                        </form>

                                    </div>

                                    <div class="max-h-[70vh] sm:max-h-96 overflow-y-auto">

                                        @forelse($notifications->take(8) as $notification)

                                            <div class="p-4 border-b hover:bg-slate-50 transition">

                                                <div class="flex justify-between items-start gap-3">

                                                    <div class="min-w-0">

                                                        <h3 class="font-bold text-sm sm:text-base text-slate-800 break-words">
                                                            {{ $notification->title }}
                                                        </h3>

                                                        <p class="text-gray-500 text-xs sm:text-sm mt-1 break-words leading-relaxed">
                                                            {{ $notification->message }}
                                                        </p>

                                                    </div>

                                                    <div class="flex gap-2 shrink-0">

                                                        @unless($notification->is_read)

                                                            <form
                                                                method="POST"
                                                                action="{{ route('notifications.read',$notification) }}"
                                                            >
                                                                @csrf
                                                                @method('PATCH')

                                                                <button
                                                                    type="submit"
                                                                    aria-label="Mark notification as read"
                                                                    class="w-8 h-8 rounded-lg hover:bg-green-50 text-green-600 transition"
                                                                >
                                                                    ✔
                                                                </button>

                                                            </form>

                                                        @endunless

                                                        <form
                                                            method="POST"
                                                            action="{{ route('notifications.destroy',$notification) }}"
                                                        >
                                                            @csrf
                                                            @method('DELETE')

                                                            <button
                                                                type="submit"
                                                                aria-label="Delete notification"
                                                                class="w-8 h-8 rounded-lg hover:bg-red-50 text-red-600 transition"
                                                            >
                                                                🗑
                                                            </button>

                                                        </form>

                                                    </div>

                                                </div>

                                            </div>

                                        @empty

                                            <div class="p-8 sm:p-10 text-center text-gray-500">
                                                No notifications.
                                            </div>

                                        @endforelse

                                    </div>

                                </div>

                            </div>

                            {{-- Add Rental --}}
                            <a
                                href="{{ route('rental.step1') }}"
                                class="bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white px-4 sm:px-6 lg:px-7 py-3 rounded-xl font-semibold text-sm sm:text-base whitespace-nowrap shadow-sm hover:shadow transition duration-200"
                            >
                                <span class="sm:hidden">+ Rental</span>
                                <span class="hidden sm:inline">+ Add Rental</span>
                            </a>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ========================================================= --}}
            {{-- PAGE CONTENT --}}
            {{-- ========================================================= --}}

            <div class="px-4 sm:px-6 lg:px-8 xl:px-10 py-6 sm:py-8 lg:py-10">

                {{-- Breadcrumb --}}
                <div class="mb-6 sm:mb-8">

                    <p class="text-sm sm:text-base text-gray-500">
                        Dashboard /

                        <span class="text-sky-600 font-bold">
                            Landlord
                        </span>
                    </p>

                </div>

                {{-- ========================================================= --}}
                {{-- STATISTICS --}}
                {{-- ========================================================= --}}

                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 sm:gap-5 lg:gap-6">

                    {{-- Properties --}}
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-md border border-slate-100 p-5 sm:p-6 lg:p-8 transition">

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            🏠
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-blue-600">
                            {{ $stats['rentals'] }}
                        </h2>

                        <p class="text-gray-500 mt-2 text-sm sm:text-base">
                            Properties
                        </p>

                    </div>

                    {{-- Bookings --}}
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-md border border-slate-100 p-5 sm:p-6 lg:p-8 transition">

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            📅
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-orange-600">
                            {{ $stats['bookings'] }}
                        </h2>

                        <p class="text-gray-500 mt-2 text-sm sm:text-base">
                            Bookings
                        </p>

                    </div>

                    {{-- Pending --}}
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-md border border-slate-100 p-5 sm:p-6 lg:p-8 transition">

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            ⏳
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-yellow-500">
                            {{ $stats['pending'] }}
                        </h2>

                        <p class="text-gray-500 mt-2 text-sm sm:text-base">
                            Pending
                        </p>

                    </div>

                    {{-- Approved --}}
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm hover:shadow-md border border-slate-100 p-5 sm:p-6 lg:p-8 transition">

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            ✅
                        </div>

                        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-green-600">
                            {{ $stats['approved'] }}
                        </h2>

                        <p class="text-gray-500 mt-2 text-sm sm:text-base">
                            Approved
                        </p>

                    </div>

                </div>

                {{-- ========================================================= --}}
                {{-- QUICK ACTIONS --}}
                {{-- ========================================================= --}}

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-5 lg:gap-6 mt-8 sm:mt-10">

                    {{-- Add Property --}}
                    <a
                        href="{{ route('rental.step1') }}"
                        class="group bg-gradient-to-r from-sky-600 to-blue-700 text-white rounded-2xl sm:rounded-3xl p-6 sm:p-7 lg:p-8 shadow-lg hover:shadow-xl hover:-translate-y-1 transition duration-200"
                    >

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            ➕
                        </div>

                        <h2 class="text-xl sm:text-2xl font-bold">
                            Add Property
                        </h2>

                        <p class="mt-2 text-sky-100 text-sm sm:text-base">
                            Publish a new rental property.
                        </p>

                    </a>

                    {{-- My Rentals --}}
                    <a
                        href="{{ route('rentals.index') }}"
                        class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-7 lg:p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition duration-200"
                    >

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            🏘️
                        </div>

                        <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                            My Rentals
                        </h2>

                        <p class="mt-2 text-gray-500 text-sm sm:text-base">
                            Manage your listed properties.
                        </p>

                    </a>

                    {{-- Booking Requests --}}
                    <a
                        href="{{ route('landlord.bookings') }}"
                        class="bg-white rounded-2xl sm:rounded-3xl p-6 sm:p-7 lg:p-8 shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1 transition duration-200"
                    >

                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">
                            📅
                        </div>

                        <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                            Booking Requests
                        </h2>

                        <p class="mt-2 text-gray-500 text-sm sm:text-base">
                            Review student booking requests.
                        </p>

                    </a>

                </div>

                {{-- ========================================================= --}}
                {{-- RECENT BOOKINGS --}}
                {{-- ========================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm border border-slate-100 mt-8 sm:mt-10 overflow-hidden">

                    <div class="px-5 sm:px-6 lg:px-8 py-5 sm:py-6 border-b">

                        <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                            📅 Recent Booking Requests
                        </h2>

                        <p class="text-gray-500 mt-1 text-sm sm:text-base">
                            Latest booking activity.
                        </p>

                    </div>

                    @forelse($recentBookings as $booking)

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 px-5 sm:px-6 lg:px-8 py-5 border-b hover:bg-slate-50 transition">

                            <div class="min-w-0">

                                <h3 class="font-bold text-base sm:text-lg text-slate-800 break-words">
                                    {{ $booking->student->name ?? 'Student' }}
                                </h3>

                                <p class="text-gray-500 text-sm sm:text-base break-words">
                                    {{ $booking->accommodation->title ?? 'Rental' }}
                                </p>

                            </div>

                            <div class="shrink-0">

                                @if($booking->status == 'Pending')

                                    <span class="inline-flex bg-yellow-100 text-yellow-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-semibold">
                                        Pending
                                    </span>

                                @elseif($booking->status == 'Approved')

                                    <span class="inline-flex bg-green-100 text-green-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-semibold">
                                        Approved
                                    </span>

                                @elseif($booking->status == 'Rejected')

                                    <span class="inline-flex bg-red-100 text-red-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-semibold">
                                        Rejected
                                    </span>

                                @else

                                    <span class="inline-flex bg-blue-100 text-blue-700 px-3 sm:px-4 py-2 rounded-full text-xs sm:text-sm font-semibold">
                                        {{ $booking->status }}
                                    </span>

                                @endif

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-12 sm:py-16 px-5">

                            <div class="text-5xl sm:text-6xl">
                                📭
                            </div>

                            <h3 class="text-xl sm:text-2xl font-bold mt-4">
                                No Booking Requests Yet
                            </h3>

                            <p class="text-gray-500 mt-2 text-sm sm:text-base">
                                Booking requests will appear here.
                            </p>

                        </div>

                    @endforelse

                </div>

                {{-- ========================================================= --}}
                {{-- MY RENTALS --}}
                {{-- ========================================================= --}}

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm border border-slate-100 overflow-hidden mt-8 sm:mt-10">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 px-5 sm:px-6 lg:px-8 py-5 sm:py-6 border-b">

                        <div>

                            <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                                🏘️ My Rentals
                            </h2>

                            <p class="text-gray-500 mt-1 text-sm sm:text-base">
                                Manage all your listed properties.
                            </p>

                        </div>

                        <a
                            href="{{ route('rental.step1') }}"
                            class="inline-flex justify-center bg-sky-600 hover:bg-sky-700 text-white px-5 sm:px-6 py-3 rounded-xl font-semibold text-sm sm:text-base transition"
                        >
                            + Add Rental
                        </a>

                    </div>

                    {{-- Responsive table --}}
                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[950px]">

                            <thead class="bg-slate-50">

                                <tr>

                                    <th class="text-left px-6 lg:px-8 py-4 sm:py-5 font-bold text-slate-700 text-sm">
                                        Property
                                    </th>

                                    <th class="text-left px-6 py-4 sm:py-5 font-bold text-slate-700 text-sm">
                                        University
                                    </th>

                                    <th class="text-left px-6 py-4 sm:py-5 font-bold text-slate-700 text-sm">
                                        Location
                                    </th>

                                    <th class="text-left px-6 py-4 sm:py-5 font-bold text-slate-700 text-sm">
                                        Price
                                    </th>

                                    <th class="text-left px-6 py-4 sm:py-5 font-bold text-slate-700 text-sm">
                                        Status
                                    </th>

                                    <th class="text-center px-6 py-4 sm:py-5 font-bold text-slate-700 text-sm">
                                        Actions
                                    </th>

                                </tr>

                            </thead>

                            <tbody>

                            @forelse($rentals as $rental)

                                <tr class="border-b hover:bg-sky-50 transition">

                                    {{-- Property --}}
                                    <td class="px-6 lg:px-8 py-5">

                                        <div class="flex items-center gap-4">

                                            @if($rental->photos->count())

                                                <img
                                                    src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                                    alt="{{ $rental->title }}"
                                                    class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl object-cover shadow shrink-0"
                                                >

                                            @else

                                                <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-xl bg-slate-200 flex items-center justify-center shrink-0 text-2xl">
                                                    🏠
                                                </div>

                                            @endif

                                            <div class="min-w-0">

                                                <h3 class="font-bold text-base sm:text-lg text-slate-800 truncate max-w-[230px]">
                                                    {{ $rental->title }}
                                                </h3>

                                                <div class="flex gap-2 mt-2">

                                                    <span class="text-xs bg-sky-100 text-sky-700 px-2 py-1 rounded-full whitespace-nowrap">
                                                        {{ ucfirst(str_replace('_',' ',$rental->property_type)) }}
                                                    </span>

                                                </div>

                                            </div>

                                        </div>

                                    </td>

                                    {{-- University --}}
                                    <td class="px-6 py-5 text-sm text-slate-700">
                                        {{ $rental->university->name ?? '-' }}
                                    </td>

                                    {{-- Location --}}
                                    <td class="px-6 py-5 text-sm text-slate-700">
                                        {{ $rental->location }}
                                    </td>

                                    {{-- Price --}}
                                    <td class="px-6 py-5">

                                        <span class="font-bold text-green-600 whitespace-nowrap">
                                            KES {{ number_format($rental->price) }}
                                        </span>

                                    </td>

                                    {{-- Status --}}
                                    <td class="px-6 py-5">

                                        @if($rental->bookings()->where('status', 'Moved In')->exists())

                                            <span class="inline-flex bg-green-100 text-green-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap">
                                                🏠 Occupied
                                            </span>

                                        @elseif($rental->bookings()->where('status', 'Approved')->exists())

                                            <span class="inline-flex bg-blue-100 text-blue-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap">
                                                📅 Reserved
                                            </span>

                                        @else

                                            <span class="inline-flex bg-yellow-100 text-yellow-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold whitespace-nowrap">
                                                🟢 Available
                                            </span>

                                        @endif

                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-6 py-5">

                                        <div class="flex justify-center gap-2">

                                            <a
                                                href="{{ route('rentals.show',$rental) }}"
                                                class="bg-sky-600 hover:bg-sky-700 text-white px-3 sm:px-4 py-2 rounded-lg text-sm font-semibold transition"
                                            >
                                                View
                                            </a>

                                            <a
                                                href="{{ route('rentals.edit',$rental) }}"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 sm:px-4 py-2 rounded-lg text-sm font-semibold transition"
                                            >
                                                Edit
                                            </a>

                                            <form
                                                action="{{ route('rentals.destroy',$rental) }}"
                                                method="POST"
                                                onsubmit="return confirm('Delete this property?')"
                                            >

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="bg-red-600 hover:bg-red-700 text-white px-3 sm:px-4 py-2 rounded-lg text-sm font-semibold transition"
                                                >
                                                    Delete
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center py-16 sm:py-20 px-5">

                                        <div class="text-5xl sm:text-6xl">
                                            🏘️
                                        </div>

                                        <h3 class="text-xl sm:text-2xl font-bold mt-4">
                                            No Rentals Yet
                                        </h3>

                                        <p class="text-gray-500 mt-2 text-sm sm:text-base">
                                            Publish your first property to begin receiving bookings.
                                        </p>

                                        <a
                                            href="{{ route('rental.step1') }}"
                                            class="inline-flex mt-6 bg-sky-600 hover:bg-sky-700 text-white px-5 sm:px-6 py-3 rounded-xl text-sm sm:text-base font-semibold transition"
                                        >
                                            + Add First Rental
                                        </a>

                                    </td>

                                </tr>

                            @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

                {{-- ========================================================= --}}
                {{-- DASHBOARD FOOTER WIDGETS --}}
                {{-- ========================================================= --}}

                <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-5 sm:gap-6 lg:gap-8 mt-8 sm:mt-10">

                    {{-- Notifications --}}
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm border border-slate-100 overflow-hidden">

                        <div class="px-5 sm:px-6 lg:px-8 py-5 sm:py-6 border-b">

                            <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                                🔔 Notifications
                            </h2>

                        </div>

                        <div class="divide-y">

                            @forelse($notifications as $notification)

                                <div class="px-5 sm:px-6 lg:px-8 py-5">

                                    <h3 class="font-bold text-slate-800 text-sm sm:text-base">
                                        {{ $notification->title }}
                                    </h3>

                                    <p class="text-gray-500 mt-2 text-sm leading-relaxed">
                                        {{ $notification->message }}
                                    </p>

                                </div>

                            @empty

                                <div class="text-center py-10 sm:py-16 px-5">

                                    @if($notifications->count())

                                        @foreach($notifications->take(5) as $notification)

                                            <div class="border-b py-3 text-left">

                                                <p class="font-semibold text-sm sm:text-base">
                                                    {{ $notification->title }}
                                                </p>

                                                <p class="text-gray-500 text-sm mt-1">
                                                    {{ $notification->message }}
                                                </p>

                                            </div>

                                        @endforeach

                                    @else

                                        <div class="text-center py-4">

                                            <div class="text-4xl mb-3">
                                                🔔
                                            </div>

                                            <p class="text-gray-500 text-sm sm:text-base">
                                                No new notifications.
                                            </p>

                                        </div>

                                    @endif

                                </div>

                            @endforelse

                        </div>

                    </div>

                    {{-- Rentals Occupied --}}
                    <div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm border border-slate-100 p-5 sm:p-6 lg:p-8">

                        <div class="flex justify-between items-start gap-4">

                            <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                                🏠 Rentals Occupied
                            </h2>

                            <span class="text-4xl sm:text-5xl shrink-0">
                                🏘️
                            </span>

                        </div>

                        <div class="mt-8 sm:mt-10 text-center">

                            <h1 class="text-5xl sm:text-6xl font-extrabold text-sky-600">
                                {{ $stats['occupiedRentals'] }}
                            </h1>

                            <p class="mt-3 text-gray-500 text-sm sm:text-base">
                                Rental(s) currently occupied
                            </p>

                        </div>

                    </div>

                    {{-- Revenue --}}
                    <div class="bg-gradient-to-br from-sky-600 to-blue-700 rounded-2xl sm:rounded-3xl shadow-lg text-white p-5 sm:p-6 lg:p-8 lg:col-span-2 xl:col-span-1">

                        <div class="text-4xl sm:text-5xl">
                            💰
                        </div>

                        <h2 class="text-xl sm:text-2xl font-bold mt-5 sm:mt-6">
                            Revenue
                        </h2>

                        <h1 class="text-4xl sm:text-5xl font-extrabold mt-5 sm:mt-6 break-words">
                            KES {{ number_format($stats['revenue']) }}
                        </h1>

                        <p class="mt-4 text-sky-100 text-sm sm:text-base leading-relaxed">
                            Estimated earnings from approved bookings.
                        </p>

                    </div>

                </div>

                {{-- ========================================================= --}}
                {{-- FOOTER --}}
                {{-- ========================================================= --}}

                <footer class="mt-12 sm:mt-16 border-t pt-7 sm:pt-8 pb-8 sm:pb-10 text-center text-gray-500">

                    <h3 class="font-bold text-base sm:text-lg text-slate-700">
                        CampusConnect Landlord Portal
                    </h3>

                    <p class="mt-2 text-sm sm:text-base">
                        Manage rentals, bookings and tenants efficiently.
                    </p>

                    <p class="mt-4 sm:mt-5 text-xs sm:text-sm">
                        © {{ date('Y') }} CampusConnect. All Rights Reserved.
                    </p>

                </footer>

            </div>

        </main>

    </div>

    {{-- ========================================================= --}}
    {{-- NOTIFICATION SCRIPT --}}
    {{-- ========================================================= --}}

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const btn = document.getElementById('notificationBtn');
            const menu = document.getElementById('notificationMenu');

            if (!btn || !menu) {
                return;
            }

            btn.addEventListener('click', function (event) {

                event.stopPropagation();

                const isHidden = menu.classList.contains('hidden');

                menu.classList.toggle('hidden');

                btn.setAttribute('aria-expanded', isHidden ? 'true' : 'false');

            });

            menu.addEventListener('click', function (event) {
                event.stopPropagation();
            });

            document.addEventListener('click', function () {

                menu.classList.add('hidden');

                btn.setAttribute('aria-expanded', 'false');

            });

        });
    </script>

</x-landlord-layout>