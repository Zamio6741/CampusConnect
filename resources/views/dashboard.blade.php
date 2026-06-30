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
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">

                <!-- Notes -->
                <a href="{{ route('notes.index') }}" class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="text-5xl">📚</div>

                    <h2 class="text-2xl font-bold text-blue-700 mt-4">
                        Notes
                    </h2>

                    <div class="mt-6">

                        <h1 class="text-5xl font-extrabold text-sky-600">
                            145
                        </h1>

                        <p class="text-gray-500">
                            Available Notes
                        </p>

                    </div>

                    <p class="mt-6 text-sky-600 font-semibold">
                        View Notes →
                    </p>

                </a>

                <!-- Past Papers -->
                <a href="#" class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="text-5xl">📄</div>

                    <h2 class="text-2xl font-bold text-green-700 mt-4">
                        Past Papers
                    </h2>

                    <div class="mt-6">

                        <h1 class="text-5xl font-extrabold text-green-600">
                            38
                        </h1>

                        <p class="text-gray-500">
                            Available Papers
                        </p>

                    </div>

                    <p class="mt-6 text-green-600 font-semibold">
                        View Papers →
                    </p>

                </a>

                <!-- Hostels -->
                <a href="#" class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="text-5xl">🏠</div>

                    <h2 class="text-2xl font-bold text-orange-600 mt-4">
                        Hostels
                    </h2>

                    <div class="mt-6">

                        <h1 class="text-5xl font-extrabold text-orange-500">
                            21
                        </h1>

                        <p class="text-gray-500">
                            Available Rooms
                        </p>

                    </div>

                    <p class="mt-6 text-orange-600 font-semibold">
                        Find Hostels →
                    </p>

                </a>

                <!-- Marketplace -->
                <a href="#" class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="text-5xl">🛒</div>

                    <h2 class="text-2xl font-bold text-purple-700 mt-4">
                        Marketplace
                    </h2>

                    <div class="mt-6">

                        <h1 class="text-5xl font-extrabold text-purple-600">
                            17
                        </h1>

                        <p class="text-gray-500">
                            Items For Sale
                        </p>

                    </div>

                    <p class="mt-6 text-purple-600 font-semibold">
                        Visit Marketplace →
                    </p>

                </a>

                <!-- Timetable -->
                <a href="#" class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="text-5xl">📅</div>

                    <h2 class="text-2xl font-bold text-red-600 mt-4">
                        Timetable
                    </h2>

                    <div class="mt-6">

                        <h1 class="text-5xl font-extrabold text-red-500">
                            4
                        </h1>

                        <p class="text-gray-500">
                            Classes Today
                        </p>

                    </div>

                    <p class="mt-6 text-red-600 font-semibold">
                        View Schedule →
                    </p>

                </a>

                <!-- Profile -->
                <a href="{{ route('profile.edit') }}" class="bg-white rounded-3xl shadow-lg p-8 hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="text-5xl">👤</div>

                    <h2 class="text-2xl font-bold text-slate-700 mt-4">
                        My Profile
                    </h2>

                    <div class="mt-6">

                        <h1 class="text-4xl font-bold text-slate-700">
                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}
                        </h1>

                        <p class="text-gray-500">
                            Manage Account
                        </p>

                    </div>

                    <p class="mt-6 text-slate-700 font-semibold">
                        Open Profile →
                    </p>

                </a>

            </div>

            <!-- Announcements -->
            <div class="mt-14">

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

                    </div>

                @empty

                    <div class="bg-white rounded-2xl shadow p-6">
                        No announcements available.
                    </div>

                @endforelse

            </div>

        </div>

    </div>

</x-app-layout>