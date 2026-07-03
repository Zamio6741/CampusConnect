<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-5xl font-extrabold text-sky-700">
                    CampusConnect
                </h1>

                <p class="text-gray-600 mt-2 text-lg">
                    Your smart student companion
                </p>

            </div>

            <div class="flex items-center gap-6">

                <button class="relative text-3xl hover:scale-110 transition">

                    🔔

                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full px-2">
                        3
                    </span>

                </button>

                <div class="flex items-center gap-3 bg-white px-4 py-2 rounded-full shadow-lg">

                    <div class="w-11 h-11 rounded-full bg-sky-500 flex items-center justify-center text-white font-bold">

                        {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                    </div>

                    <div>

                        <p class="font-semibold">
                            {{ Auth::user()->name }}
                        </p>

                        <small class="text-gray-500">
                            Student
                        </small>

                    </div>

                </div>

            </div>

        </div>

        <!-- Welcome Card -->
        <div class="mt-10 bg-white rounded-3xl shadow-xl p-8">

            <h2 class="text-4xl font-bold text-sky-700">

                👋 Welcome back,
                {{ Auth::user()->name }}

            </h2>

            <p class="mt-3 text-gray-600 text-lg">

                Ready to conquer today's classes?

            </p>

        </div>

        <!-- Dashboard Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 mt-10">
                <!-- Notes -->
    <a href="{{ route('notes.index') }}"
       class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="text-5xl">📚</div>

        <h2 class="text-2xl font-bold text-blue-700 mt-4">
            Notes
        </h2>

        <p class="text-gray-500 mt-3">
            Study materials
        </p>

        <p class="mt-8 text-blue-700 font-semibold">
            Open →
        </p>

    </a>

    <!-- Past Papers -->
    <a href="{{ route('pastpapers.index') }}"
       class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="text-5xl">📄</div>

        <h2 class="text-2xl font-bold text-green-700 mt-4">
            Past Papers
        </h2>

        <p class="text-gray-500 mt-3">
            CATs & Exams
        </p>

        <p class="mt-8 text-green-700 font-semibold">
            Open →
        </p>

    </a>

    <!-- Campus Hostels -->
    <a href="{{ route('campus.index') }}"
       class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="text-5xl">🏫</div>

        <h2 class="text-2xl font-bold text-orange-600 mt-4">
            Campus Hostels
        </h2>

        <p class="text-gray-500 mt-3">
            University accommodation
        </p>

        <p class="mt-8 text-orange-600 font-semibold">
            Browse →
        </p>

    </a>

    <!-- Off Campus Rentals -->
    <a href="{{ route('rentals.index') }}"
       class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="text-5xl">🏡</div>

        <h2 class="text-2xl font-bold text-emerald-700 mt-4">
            Off-Campus Rentals
        </h2>

        <p class="text-gray-500 mt-3">
            Student housing
        </p>

        <p class="mt-8 text-emerald-700 font-semibold">
            Find Rooms →
        </p>

    </a>

   <!-- Marketplace -->
<a href="{{ route('marketplace.index') }}"
   class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

    <div class="text-5xl">🛒</div>

    <h2 class="text-2xl font-bold text-purple-700 mt-4">
        Marketplace
    </h2>

    <p class="text-gray-500 mt-3">
        Buy & Sell
    </p>

    <p class="mt-8 text-purple-700 font-semibold">
        Visit →
    </p>

</a>
       <!-- Lost & Found -->
<a href="{{ route('lostfound.index') }}"
   class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

    <div class="text-5xl">🔍</div>

    <h2 class="text-2xl font-bold text-black mt-4">
        Lost & Found
    </h2>

    <p class="text-gray-500 mt-3">
        Report lost items
    </p>

    <p class="mt-8 text-orange-600 font-semibold">
        Open →
    </p>

</a>

   <!-- Student Services -->

<a href="{{ route('student-services.index') }}"
   class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

    <div class="text-5xl">🎓</div>

    <h2 class="text-2xl font-bold text-blue-600 mt-4">
        Student Services
    </h2>

    <p class="text-gray-500 mt-3">
        HELB Services & Unit Registration
    </p>

    <p class="mt-8 text-blue-600 font-semibold">
        View Services →
    </p>

</a>
    <!-- Profile -->
    <a href="{{ route('profile.edit') }}"
       class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="text-5xl">👤</div>

        <h2 class="text-2xl font-bold text-slate-700 mt-4">
            My Profile
        </h2>

        <p class="text-gray-500 mt-3">
            Account settings
        </p>

        <p class="mt-8 text-slate-700 font-semibold">
            Open →
        </p>

    </a>

</div> {{-- END Dashboard Cards Grid --}}

<!-- Announcements + Featured Businesses -->

<div class="grid lg:grid-cols-3 gap-8 mt-14">

    <!-- Announcements -->
    <div class="lg:col-span-2">

        <h2 class="text-3xl font-bold text-blue-700 mb-6">
            📢 Campus Announcements
        </h2>

        @forelse($announcements as $announcement)

            <div class="bg-white rounded-2xl shadow-lg border-l-4 border-blue-500 p-6 mb-4">

                <h3 class="text-xl font-bold">
                    {{ $announcement->title }}
                </h3>

                <p class="text-gray-600 mt-2">
                    {{ $announcement->content }}
                </p>

                <p class="text-sm text-gray-400 mt-4">
                    {{ $announcement->created_at->diffForHumans() }}
                </p>

            </div>

        @empty

            <div class="bg-white rounded-2xl shadow-lg p-8 text-center">

                <div class="text-6xl mb-4">
                    📭
                </div>

                <h3 class="text-2xl font-bold text-gray-700">
                    No Announcements Yet
                </h3>

                <p class="text-gray-500 mt-2">
                    Check back later for campus updates.
                </p>

            </div>

        @endforelse

    </div>

    <!-- Businesses -->
    <div>

        <div class="flex justify-between items-center mb-6">

    <h2 class="text-3xl font-bold text-orange-600">
        🏪 Local Businesses
    </h2>

    <a href="{{ route('businesses.index') }}"
       class="text-orange-600 font-bold hover:underline">

        View All →

    </a>

</div>
@if(auth()->check())

<div class="mb-6">

    <a href="{{ route('businesses.create') }}"
       class="bg-orange-600 hover:bg-orange-700 text-white px-5 py-3 rounded-xl font-bold inline-block">

        ➕ Post Your Business

    </a>

</div>

@endif

       <div class="space-y-5">

@forelse($businesses as $business)

<div class="bg-white rounded-2xl shadow-lg p-5">

    <div class="text-4xl mb-3">

        🏪

    </div>

    <h3 class="font-bold text-xl">

        {{ $business->name }}

    </h3>

    <p class="text-sm text-orange-600 font-semibold">

        {{ $business->category }}

    </p>

    <p class="text-gray-600 mt-2">

        {{ Str::limit($business->description,80) }}

    </p>

    <a href="{{ route('businesses.show',$business) }}"
       class="inline-block mt-4 text-orange-600 font-bold hover:underline">

        View Details →

    </a>

</div>

@empty

<div class="bg-white rounded-2xl shadow-lg p-8 text-center">

    <div class="text-5xl">

        🏪

    </div>

    <h3 class="font-bold text-xl mt-3">

        No businesses yet

    </h3>

</div>

@endforelse

</div>
    </div>

</div>

</x-app-layout>