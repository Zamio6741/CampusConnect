<x-app-layout>

<div class="min-h-screen bg-gray-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <h1 class="text-5xl font-bold text-red-600 mb-10">
            🛠 Admin Dashboard
        </h1>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <a href="{{ route('announcements.index') }}"
               class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">

                <div class="text-5xl">📢</div>

                <h2 class="text-2xl font-bold mt-4">
                    Manage Announcements
                </h2>

            </a>

            <a href="{{ route('businesses.index') }}"
               class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">

                <div class="text-5xl">🏪</div>

                <h2 class="text-2xl font-bold mt-4">
                    Manage Businesses
                </h2>

            </a>

            <a href="{{ route('notes.index') }}"
               class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition">

                <div class="text-5xl">📚</div>

                <h2 class="text-2xl font-bold mt-4">
                    Manage Notes
                </h2>

            </a>

        </div>

    </div>

</div>

</x-app-layout>