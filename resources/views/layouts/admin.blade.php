<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusConnect Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-100">

<div class="flex h-screen">

    {{-- Sidebar --}}
    <aside class="w-72 bg-slate-900 text-white flex flex-col">

        <div class="p-6 border-b border-slate-700">

            <h1 class="text-2xl font-bold">
                🎓 CampusConnect
            </h1>

            <p class="text-sm text-slate-400">
                Admin Panel
            </p>

        </div>

        <nav class="flex-1 p-4 space-y-2">

            <a href="{{ route('admin.dashboard') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Dashboard
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Users
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Businesses
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Accommodations
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Marketplace
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Notes
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Announcements
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Reports
            </a>

            <a href="{{ route('admin.users') }}"
               class="block px-4 py-3 rounded-xl hover:bg-slate-800">
                Settings
            </a>

        </nav>

    </aside>

    {{-- Content --}}
    <main class="flex-1 overflow-y-auto">

        {{-- Topbar --}}
        <header class="bg-white shadow px-8 py-5 flex justify-between items-center">

            <h2 class="text-2xl font-bold">
                @yield('title')
            </h2>

            <div class="flex items-center gap-4">

                🔔

                <span class="font-semibold">
                    Admin
                </span>

            </div>

        </header>

        <section class="p-8">

            @yield('content')

        </section>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

@stack('scripts')

</body>
</html>