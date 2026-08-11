<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CampusConnect Admin</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/alpinejs" defer></script>

    <style>
        body{
            font-family:'Inter',sans-serif;
        }

        .sidebar-scroll::-webkit-scrollbar{
            width:5px;
        }

        .sidebar-scroll::-webkit-scrollbar-thumb{
            background:#334155;
            border-radius:20px;
        }
    </style>

</head>

<body class="bg-slate-100">

<div
    x-data="{ sidebar:true }"
    class="flex min-h-screen">

    <!-- ================= SIDEBAR ================= -->

    <aside
        :class="sidebar ? 'w-72' : 'w-24'"
        class="bg-slate-900 text-white transition-all duration-300 flex flex-col shadow-2xl">

        <!-- Logo -->

        <div class="h-20 border-b border-slate-800 flex items-center justify-center">

            <div x-show="sidebar" x-transition>

                <h1 class="text-2xl font-black tracking-wide">

                    🎓 CampusConnect

                </h1>

                <p class="text-xs text-slate-400 text-center mt-1">

                    Admin Control Center

                </p>

            </div>

            <div
                x-show="!sidebar"
                x-transition
                class="text-4xl">

                🎓

            </div>

        </div>

        <!-- Navigation -->

        <nav class="flex-1 overflow-y-auto sidebar-scroll py-6 px-4 space-y-2">

           <a href="{{ route('admin.dashboard') }}"
   class="group flex items-center gap-4 px-5 py-3 rounded-xl transition-all duration-300
   {{ request()->routeIs('admin.dashboard') ? 'bg-sky-600 text-white shadow-xl scale-[1.02]' : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}">
                <span class="text-xl">🏠</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Dashboard

                </span>

            </a>

<a href="{{ route('admin.users') }}"
class="flex items-center gap-4 px-5 py-3 rounded-xl transition-all duration-300
{{ request()->routeIs('admin.users*') ? 'bg-sky-600 text-white shadow-xl scale-[1.02]' : 'text-slate-300 hover:bg-slate-800 hover:text-white hover:translate-x-2 hover:shadow-lg' }}">

    <span class="text-xl">👥</span>

    <span
        x-show="sidebar"
        x-transition>
        Users
    </span>

</a>

            <a href="{{ route('admin.businesses') }}"
               class="flex items-center gap-4 px-5 py-3 rounded-xl transition
               {{ request()->routeIs('admin.businesses*') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-slate-800 text-slate-200' }}">

                <span class="text-xl">🏪</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Businesses

                </span>

            </a>

            <a href="{{ route('admin.marketplace') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl transition
   {{ request()->routeIs('admin.marketplace*')
       ? 'bg-orange-600 text-white shadow-lg'
       : 'hover:bg-slate-800 text-slate-200' }}">

    <span class="text-xl">🛒</span>

    <span class="font-medium">
        Marketplace
    </span>

</a>

            <a href="{{ route('admin.accommodations') }}"
               class="flex items-center gap-4 px-5 py-3 rounded-xl transition
               {{ request()->routeIs('admin.accommodations*') ? 'bg-sky-600 text-white shadow-lg' : 'hover:bg-slate-800 text-slate-200' }}">

                <span class="text-xl">🏢</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Accommodations

                </span>

            </a>

           <a href="{{ route('admin.notes') }}"
               class="flex items-center gap-4 px-5 py-3 rounded-xl hover:bg-slate-800 transition">

                <span class="text-xl">📚</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Notes

                </span>

            </a>

            <a href="#"
               class="flex items-center gap-4 px-5 py-3 rounded-xl hover:bg-slate-800 transition">

                <span class="text-xl">📢</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Announcements

                </span>

            </a>

            <a href="#"
               class="flex items-center gap-4 px-5 py-3 rounded-xl hover:bg-slate-800 transition">

                <span class="text-xl">📊</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Reports

                </span>

            </a>

            <a href="#"
               class="flex items-center gap-4 px-5 py-3 rounded-xl hover:bg-slate-800 transition">

                <span class="text-xl">⚙️</span>

                <span
                    x-show="sidebar"
                    x-transition>

                    Settings

                </span>

            </a>

        </nav>
    
        <!-- Bottom User -->

        <div class="border-t border-slate-800 p-5">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-full bg-sky-600 flex items-center justify-center text-xl">

                    👤

                </div>

                <div
                    x-show="sidebar"
                    x-transition
                    class="flex-1">

                    <p class="font-semibold">

                        Administrator

                    </p>

                    <p class="text-xs text-green-400">

                        ● Online

                    </p>

                </div>

            </div>

            <form
                action="{{ route('admin.logout') }}"
                method="POST"
                class="mt-5">

                @csrf

                <button
                    class="w-full bg-red-600 hover:bg-red-700 py-3 rounded-xl font-semibold transition">

                    <span x-show="sidebar">

                        🚪 Logout

                    </span>

                    <span x-show="!sidebar">

                        🚪

                    </span>

                </button>

            </form>

        </div>

    </aside>

    <!-- ================= MAIN ================= -->

    <main class="flex-1 flex flex-col">

        <!-- Top Navigation -->

        <header class="bg-white shadow-sm border-b">

            <div class="h-20 px-8 flex items-center justify-between">

                <div class="flex items-center gap-5">

                    <button
                        @click="sidebar=!sidebar"
                        class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

                        ☰

                    </button>

                    <div>

                        <h2 class="text-3xl font-bold text-slate-800">

                            @yield('title')

                        </h2>

                        <p class="text-gray-500 text-sm">

                            CampusConnect Administration

                        </p>

                    </div>

                </div>

                <div class="flex items-center gap-6">

                    <!-- Search -->

                    <div class="hidden md:flex">

                        <input
                            type="text"
                            placeholder="Search..."
                            class="w-80 rounded-xl border border-slate-300 px-4 py-2 focus:ring-2 focus:ring-sky-500 focus:outline-none">

                    </div>

                    <!-- Notification -->

                    <button class="relative">

                        <div class="text-2xl">

                            🔔

                        </div>

                        <span class="absolute -top-1 -right-2 w-5 h-5 rounded-full bg-red-600 text-white text-xs flex items-center justify-center">

                            3

                        </span>

                    </button>

                    <!-- Admin -->

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-full bg-sky-600 flex items-center justify-center text-white font-bold">

                            A

                        </div>

                        <div class="hidden md:block">

                            <p class="font-semibold">

                                Admin

                            </p>

                            <p class="text-xs text-gray-500">

                                Super Administrator

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </header>

        <!-- Page Content -->

        <section class="w-full px-8">
          
        @yield('content')

         </section>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@stack('scripts')

</body>
</html>