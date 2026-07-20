<x-app-layout>

<div class="min-h-screen bg-slate-100">

    <div class="flex">

        <!-- ================= SIDEBAR ================= -->

        <aside class="w-72 bg-white border-r border-gray-200 shadow-sm min-h-screen">

            <div class="px-8 py-8">

                <h1 class="text-3xl font-extrabold text-blue-700">
                    CampusConnect
                </h1>

                <p class="text-gray-500 mt-2">
                    Student Portal
                </p>

            </div>

            <nav class="mt-8 px-4 space-y-2">

    <a href="{{ route('dashboard') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold shadow-lg transition duration-300 hover:scale-[1.02]">

        <span class="text-xl">🏠</span>
        <span>Dashboard</span>

    </a>

    <a href="{{ route('notes.index') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

        <span class="text-xl">📚</span>
        <span>Notes</span>

    </a>

    <a href="{{ route('pastpapers.index') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

        <span class="text-xl">📄</span>
        <span>Past Papers</span>

    </a>

    <a href="{{ route('campus.index') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

        <span class="text-xl">🏫</span>
        <span>Campus Hostels</span>

    </a>

    <a href="{{ route('browse.rentals') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

        <span class="text-xl">🏡</span>
        <span>Rentals</span>

    </a>

   <a href="{{ route('student.marketplace') }}"
   class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

    <span class="text-xl">🛒</span>
    <span>Marketplace</span>

</a>

    <a href="{{ route('lostfound.index') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

        <span class="text-xl">🔍</span>
        <span>Lost & Found</span>

    </a>

    <a href="{{ route('student-services.index') }}"
       class="flex items-center gap-4 px-5 py-4 rounded-2xl text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition duration-300">

        <span class="text-xl">🎓</span>
        <span>Student Services</span>

    </a>

</nav>
<div class="mt-10 px-8">

    <div class="border-t pt-8">

        <h3 class="text-xs font-bold tracking-widest text-gray-400 uppercase mb-5">
            Your Activity
        </h3>

        <div class="space-y-4">

            <div class="flex justify-between">
                <span class="text-gray-600">📚 Notes</span>
                <span class="font-bold text-blue-600">{{ $stats['notes'] ?? 0 }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-600">🏡 Rentals</span>
                <span class="font-bold text-green-600">{{ $stats['accommodations'] ?? 0 }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-600">🛒 Marketplace</span>
                <span class="font-bold text-orange-500">{{ $stats['marketplace'] ?? 0 }}</span>
            </div>

            <div class="flex justify-between">
                <span class="text-gray-600">📢 Announcements</span>
                <span class="font-bold text-red-500">{{ $stats['announcements'] ?? 0 }}</span>
            </div>

        </div>

    </div>

</div>
<div class="px-8 mt-8">

    <!-- Semester Progress -->

    <div class="mb-8">

        <div class="flex justify-between text-xs text-gray-500 mb-2">

            <span>Semester Progress</span>

            <span>78%</span>

        </div>

        <div class="w-full h-2 bg-gray-200 rounded-full">

            <div class="h-2 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600"
                 style="width:78%">
            </div>

        </div>

    </div>

    <!-- Daily Tip -->

    <div class="rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-50 p-5 shadow-sm border">

        <div class="text-blue-600 font-bold mb-2">
            💡 Daily Tip
        </div>

        <p class="text-sm text-gray-600 leading-6">

            Stay consistent.

            Small progress every day becomes huge success.

        </p>

    </div>

    <!-- Footer -->

    <div class="text-center text-xs text-gray-400 mt-8">

        CampusConnect v2.0

    </div>

</div>

</aside>

        <!-- ================= MAIN CONTENT ================= -->

      <div class="px-6 py-6">
    <div class="bg-white rounded-2xl shadow-sm p-6">

           <!-- ================= TOP BAR ================= -->

<div class="bg-white border-b border-gray-200">

    <div class="flex items-center justify-between px-10 py-6">

        <!-- Left -->

        <div>

            <h2 class="text-3xl font-bold text-gray-800">

                Welcome back,

                <span class="text-blue-600">
                    {{ Auth::user()->name }}
                </span>

            </h2>

            <p class="text-gray-500 mt-1">

                Let's make today productive 🚀

            </p>

        </div>

        <!-- Right -->

        <div class="flex items-center gap-5">

            <!-- Search -->


                <div class="relative hidden lg:block">

    <svg class="absolute left-5 top-4 h-5 w-5 text-gray-400"
         fill="none"
         stroke="currentColor"
         viewBox="0 0 24 24">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14"/>

    </svg>

    <input
        type="text"
        placeholder="Search notes, hostels, businesses..."
        class="w-96 pl-14 pr-5 py-3 rounded-2xl border border-gray-200 bg-gray-50
               focus:bg-white focus:ring-4 focus:ring-blue-100
               focus:border-blue-500 transition shadow-sm">

</div>

            <!-- Notification -->

            <div class="relative">

<button
    id="notificationButton"
    type="button"
    class="relative w-12 h-12 rounded-xl bg-gray-100 hover:bg-blue-50 hover:shadow-lg transition duration-300">

                🔔

                @if($notificationCount>0)

                <span
                    class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center">

                    {{ $notificationCount }}

                </span>

                @endif

            </button>
            <div
    id="notificationMenu"
    class="hidden absolute right-0 mt-4 w-96 bg-white rounded-3xl shadow-2xl border border-gray-100 overflow-hidden z-50">

    <div class="px-6 py-5 border-b bg-gray-50">

        <h3 class="font-bold text-lg">
            Notifications
        </h3>

        <p class="text-sm text-gray-500">
            Recent activity
        </p>

    </div>

    <div class="max-h-96 overflow-y-auto">

        @forelse($notifications as $notification)

            <div class="px-6 py-4 border-b transition
                     {{ $notification->is_read
                      ? 'bg-white hover:bg-gray-50'
                    : 'bg-blue-50 hover:bg-blue-100 border-l-4 border-blue-600' }}">

                <h4 class="font-semibold text-gray-800">
                    {{ $notification->title }}
                </h4>

                <p class="text-sm text-gray-500 mt-1">
                    {{ $notification->message }}
                </p>

                <small class="text-xs text-gray-500">
                    {{ $notification->created_at->diffForHumans() }}
                </small>

            </div>

        @empty

            <div class="p-8 text-center text-gray-400">

                No notifications

            </div>

        @endforelse

    </div>

</div>

</div>

            <!-- User -->

            <div
                class="flex items-center gap-3 bg-gray-50 rounded-2xl px-4 py-2 shadow-sm hover:shadow transition">

                <div
                    class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white flex items-center justify-center font-bold text-lg">

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

</div>
            <!-- CONTENT AREA -->

            <div class="px-0 py-8">
                <!-- ================= HERO CARD ================= -->

<div class="bg-gradient-to-r from-blue-600 via-blue-700 to-indigo-700 rounded-3xl shadow-2xl overflow-hidden mb-10">

    <div class="px-10 py-10 flex flex-col lg:flex-row justify-between items-center">

        <!-- Left Side -->

        <div>

            <h1 class="text-4xl font-extrabold text-white">

                👋 Hello, {{ Auth::user()->name }}

            </h1>

            <p class="text-blue-100 mt-3 text-lg">

                Welcome back to CampusConnect.

                Stay organized, productive and ahead of your semester.

            </p>

            <div class="mt-8 flex gap-4">

                <a href="{{ route('notes.index') }}"
                   class="bg-white text-blue-700 px-6 py-3 rounded-xl font-bold hover:scale-105 transition">

                    Browse Notes

                </a>

                <a href="{{ route('student.marketplace')  }}"
                   class="bg-blue-500 hover:bg-blue-400 text-white px-6 py-3 rounded-xl font-bold transition">

                    Marketplace

                </a>

            </div>

        </div>

        <!-- Right Side -->

        <div class="mt-10 lg:mt-0 w-80">

            <div class="bg-white/15 backdrop-blur-lg rounded-3xl p-6">

                <h3 class="text-white font-bold text-lg">

                    Semester Progress

                </h3>

                <p class="text-blue-100 text-sm mt-1">

                    Keep pushing 💪

                </p>

                <div class="mt-6">

                    <div class="flex justify-between text-sm text-blue-100 mb-2">

                        <span>Completed</span>

                        <span>78%</span>

                    </div>

                    <div class="w-full bg-white/20 rounded-full h-3">

                        <div
                            class="bg-white rounded-full h-3"
                            style="width:78%">
                        </div>

                    </div>

                </div>

                <div class="grid grid-cols-2 gap-4 mt-8">

                    <div>

                        <p class="text-3xl font-bold text-white">

                            {{ $stats['notes'] }}

                        </p>

                        <p class="text-blue-100 text-sm">

                            Notes

                        </p>

                    </div>

                    <div>

                        <p class="text-3xl font-bold text-white">

                            {{ $stats['announcements'] }}

                        </p>

                        <p class="text-blue-100 text-sm">

                            Updates

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</div>
<!-- ================= QUICK STATS ================= -->

<div class="grid grid-cols-2 lg:grid-cols-4 gap-8 mt-10">

    <!-- Notes -->

    <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Total Notes
                </p>

                <h2 class="text-4xl font-extrabold text-blue-600 mt-3">

                    {{ $stats['notes'] }}

                </h2>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">

                📚

            </div>

        </div>

    </div>

    <!-- Businesses -->

    <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Businesses
                </p>

                <h2 class="text-4xl font-extrabold text-orange-500 mt-3">

                    {{ $stats['businesses'] }}

                </h2>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-3xl">

                🏪

            </div>

        </div>

    </div>

    <!-- Rentals -->

    <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Rentals
                </p>

                <h2 class="text-4xl font-extrabold text-green-600 mt-3">

                    {{ $stats['accommodations'] }}

                </h2>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-3xl">

                🏡

            </div>

        </div>

    </div>

    <!-- Announcements -->

    <div class="bg-white rounded-3xl shadow-lg p-7 hover:-translate-y-2 hover:shadow-2xl transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-gray-500 text-sm">
                    Announcements
                </p>

                <h2 class="text-4xl font-extrabold text-red-500 mt-3">

                    {{ $stats['announcements'] }}

                </h2>

            </div>

            <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center text-3xl">

                📢

            </div>

        </div>

    </div>

</div>
<!-- ================= QUICK ACCESS ================= -->

<div class="mt-14">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h2 class="text-4xl font-extrabold text-gray-800">

                Quick Access

            </h2>

            <p class="text-gray-500 mt-2">

                Everything you need in one place.

            </p>

        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

        <!-- NOTES -->

        <a href="{{ route('notes.index') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center text-4xl">

                📚

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Notes

            </h3>

            <p class="text-gray-500 mt-3">

                Browse lecture notes uploaded by students.

            </p>

        </a>

        <!-- PAST PAPERS -->

        <a href="{{ route('pastpapers.index') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-4xl">

                📄

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Past Papers

            </h3>

            <p class="text-gray-500 mt-3">

                Prepare using previous CATs and exams.

            </p>

        </a>

        <!-- MARKETPLACE -->

        <a href="{{ route('student.marketplace') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-4xl">

                🛒

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Marketplace

            </h3>

            <p class="text-gray-500 mt-3">

                Buy and sell with fellow students.

            </p>

        </a>

        <!-- RENTALS -->

        <a href="{{ route('browse.rentals') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-4xl">

                🏡

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Rentals

            </h3>

            <p class="text-gray-500 mt-3">

                Find affordable off-campus housing.

            </p>

        </a>

        <!-- HOSTELS -->

        <a href="{{ route('campus.index') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center text-4xl">

                🏫

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Hostels

            </h3>

            <p class="text-gray-500 mt-3">

                View available campus hostels.

            </p>

        </a>

        <!-- LOST & FOUND -->

        <a href="{{ route('lostfound.index') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-yellow-100 flex items-center justify-center text-4xl">

                🔍

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Lost & Found

            </h3>

            <p class="text-gray-500 mt-3">

                Recover or report lost items.

            </p>

        </a>

        <!-- BUSINESSES -->

        <a href="{{ route('businesses.index') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-pink-100 flex items-center justify-center text-4xl">

                🏪

            </div>

            <h3 class="text-2xl font-bold mt-6">

                Businesses

            </h3>

            <p class="text-gray-500 mt-3">

                Discover student businesses nearby.

            </p>

        </a>

        <!-- PROFILE -->

        <a href="{{ route('profile.edit') }}"
           class="bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl hover:-translate-y-2 duration-300">

            <div class="w-16 h-16 rounded-2xl bg-sky-100 flex items-center justify-center text-4xl">

                👤

            </div>

            <h3 class="text-2xl font-bold mt-6">

                My Profile

            </h3>

            <p class="text-gray-500 mt-3">

                Update your account and settings.

            </p>

        </a>

    </div>

</div>
<!-- ================= RECENT ACTIVITY ================= -->

<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mt-16">

    <!-- RECENT ANNOUNCEMENTS -->

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-2xl font-bold">
                    📢 Recent Announcements
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Latest campus updates
                </p>

            </div>

            <a href="#"
               class="text-blue-600 font-semibold hover:underline">
                View All →
            </a>

        </div>

        <div class="space-y-6">

            @forelse($announcements->take(4) as $announcement)

                <div class="border-b pb-5 last:border-none">

                    <h3 class="font-bold text-lg">
                        {{ $announcement->title }}
                    </h3>

                    <p class="text-gray-500 mt-2">
                        {{ \Illuminate\Support\Str::limit($announcement->content,90) }}
                    </p>

                    <small class="text-gray-400">
                        {{ $announcement->created_at->diffForHumans() }}
                    </small>

                </div>

            @empty

                <p class="text-gray-400">
                    No announcements available.
                </p>

            @endforelse

        </div>

    </div>

    <!-- TRENDING NOTES -->

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h2 class="text-2xl font-bold">
                    🔥 Trending Notes
                </h2>

                <p class="text-gray-500 text-sm mt-1">
                    Most viewed study materials
                </p>

            </div>

            <a href="{{ route('notes.index') }}"
               class="text-blue-600 font-semibold hover:underline">

                Browse →

            </a>

        </div>

        <div class="space-y-5">

           @forelse($trendingNotes as $note)

<div class="flex justify-between items-center border-b pb-5 last:border-none">

    <div>

        <h3 class="font-bold">
            {{ $note->title }}
        </h3>

        <p class="text-gray-500 text-sm mt-2">
            By {{ $note->user->name }}
        </p>

    </div>

    <a href="{{ route('notes.preview', $note) }}"
       class="text-blue-600 font-semibold">

        Open →

    </a>

</div>

@empty

<p class="text-gray-400">
    No notes available.
</p>

@endforelse

                         </div>

                      </div>
                    </div>
            <!-- ================= FOOTER ================= -->

<footer class="mt-16 bg-white border-t">

    <div class="px-10 py-8 flex flex-col md:flex-row justify-between items-center">

        <div class="flex items-center gap-4">

    <div class="w-12 h-12 rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white text-xl shadow-lg">

        🎓

    </div>

    <div>

        <h3 class="text-xl font-bold text-gray-800">
            CampusConnect
        </h3>

        <p class="text-gray-500 text-sm">
            Your complete student companion.
        </p>

    </div>

</div>

        <div class="flex items-center gap-4 mt-6 md:mt-0">

    <a href="#"
       class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-blue-600 hover:text-white transition duration-300 flex items-center justify-center">

        🌐

    </a>

    <a href="#"
       class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-sky-500 hover:text-white transition duration-300 flex items-center justify-center">

        💬

    </a>

    <a href="#"
       class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-indigo-600 hover:text-white transition duration-300 flex items-center justify-center">

        📧

    </a>

    <a href="#"
       class="w-11 h-11 rounded-xl bg-gray-100 hover:bg-red-500 hover:text-white transition duration-300 flex items-center justify-center">

        ❤️

    </a>

</div>

    </div>

    <div class="border-t border-gray-100 px-10 py-5 flex flex-col md:flex-row justify-between items-center gap-3">

    <p class="text-sm text-gray-500">
        © {{ date('Y') }}
        <span class="font-semibold text-gray-700">CampusConnect</span>.
        Built for students with LOVE.
    </p>

    <div class="flex items-center gap-5 text-sm text-gray-500">

        <span class="hover:text-blue-600 cursor-pointer transition">
            Privacy
        </span>

        <span class="hover:text-blue-600 cursor-pointer transition">
            Terms
        </span>

        <span class="hover:text-blue-600 cursor-pointer transition">
            Help
        </span>

        <span class="font-semibold text-blue-600">
            v2.0
        </span>

    </div>

</div>

</footer>

        </main>

    </div>

</div>

<script>

window.addEventListener('DOMContentLoaded', function () {

    const notificationButton = document.getElementById('notificationButton');
    const notificationMenu = document.getElementById('notificationMenu');

    if (!notificationButton || !notificationMenu) {
        console.log('Notification elements not found');
        return;
    }

    notificationButton.addEventListener('click', function(e){

        e.stopPropagation();

        notificationMenu.classList.toggle('hidden');

    });

    document.addEventListener('click', function(){

        notificationMenu.classList.add('hidden');

    });

    notificationMenu.addEventListener('click', function(e){

        e.stopPropagation();

    });

});
</script>

</x-app-layout>