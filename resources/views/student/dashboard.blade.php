<x-student-layout>

@php
    $semesterProgress = isset($semesterProgress)
        ? max(0, min(100, (int) $semesterProgress))
        : 0;

    $semesterStartDate = $semesterStartDate ?? null;
    $semesterEndDate = $semesterEndDate ?? null;

    $semesterMessages = $semesterMessages ?? [
        '💪 Keep pushing!',
        '📚 Stay consistent with your studies.',
        '🎯 Every small step counts.',
        '🚀 You are making progress!',
    ];
@endphp


<!-- ========================================================= -->
<!-- DASHBOARD CONTENT -->
<!-- ========================================================= -->

<div
    x-data="{
        semesterMessages: @js($semesterMessages),
        semesterMessageIndex: 0,
        semesterMessageVisible: true,

        init() {
            if (this.semesterMessages.length > 1) {
                setInterval(() => {
                    this.semesterMessageVisible = false;

                    setTimeout(() => {
                        this.semesterMessageIndex =
                            (this.semesterMessageIndex + 1) % this.semesterMessages.length;

                        this.semesterMessageVisible = true;
                    }, 300);
                }, 5000);
            }
        }
    }"
    class="min-h-screen bg-slate-100"
>


<!-- ========================================================= -->
<!-- SEARCH BAR -->
<!-- ========================================================= -->

<div class="bg-slate-100">

    <div class="px-4 sm:px-6 lg:px-8 py-4">

        <form
            method="GET"
            action="{{ route('student.search') }}"
            class="flex items-center gap-4"
        >

            <div class="relative flex-1 max-w-4xl mx-auto">

                <!-- Search Icon -->

                <svg
                    class="absolute left-5 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400 pointer-events-none"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14"
                    />

                </svg>


                <input
                    type="search"
                    name="q"
                    id="dashboard_search"
                    value="{{ request('q') }}"
                    autocomplete="off"
                    placeholder="Search notes, hostels, businesses, marketplace..."
                    class="w-full pl-14 pr-5 py-3.5 rounded-2xl
                           border border-gray-200
                           bg-gray-50
                           text-gray-700
                           placeholder-gray-400
                           focus:bg-white
                           focus:ring-4
                           focus:ring-blue-100
                           focus:border-blue-500
                           transition
                           shadow-sm"
                >

            </div>

        </form>

    </div>

</div>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <div class="px-4 sm:px-6 lg:px-8 py-6 lg:py-8">


        <!-- ===================================================== -->
        <!-- HERO -->
        <!-- ===================================================== -->

        <div
            class="bg-gradient-to-r
                   from-blue-600
                   via-blue-700
                   to-indigo-700
                   rounded-3xl
                   shadow-2xl
                   overflow-hidden
                   mb-10"
        >

            <div
                class="px-6 lg:px-10
                       py-8 lg:py-10
                       flex flex-col
                       lg:flex-row
                       justify-between
                       items-center"
            >


                <!-- HERO LEFT -->

                <div class="w-full">

                    <h1
                        class="text-3xl lg:text-4xl
                               font-extrabold
                               text-white"
                    >
                        👋 Hello, {{ Auth::user()->name }}
                    </h1>


                    <p
                        class="text-blue-100
                               mt-3
                               text-base lg:text-lg"
                    >
                        Welcome back to CampusConnect.
                        Stay organized, productive and ahead of your semester.
                    </p>


                    <div class="mt-8 flex flex-wrap gap-4">

                        <a
                            href="{{ route('notes.index') }}"
                            class="bg-white
                                   text-blue-700
                                   px-6 py-3
                                   rounded-xl
                                   font-bold
                                   hover:scale-105
                                   transition"
                        >
                            Browse Notes
                        </a>


                        <a
                            href="{{ route('marketplace.index') }}"
                            class="bg-blue-500
                                   hover:bg-blue-400
                                   text-white
                                   px-6 py-3
                                   rounded-xl
                                   font-bold
                                   transition"
                        >
                            Marketplace
                        </a>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- SEMESTER PROGRESS -->
                <!-- ================================================= -->

                <div
                    class="mt-8
                           lg:mt-0
                           w-full
                           lg:w-80
                           lg:ml-8
                           shrink-0"
                >

                    <div
                        class="bg-white/15
                               backdrop-blur-lg
                               rounded-3xl
                               p-6"
                    >

                        <div
                            class="flex
                                   items-start
                                   justify-between
                                   gap-4"
                        >

                            <div>

                                <h3
                                    class="text-white
                                           font-bold
                                           text-lg"
                                >
                                    Semester Progress
                                </h3>


                                <p
                                    class="text-blue-100
                                           text-sm
                                           mt-1
                                           min-h-[40px]
                                           transition-opacity
                                           duration-300"
                                    :class="semesterMessageVisible
                                        ? 'opacity-100'
                                        : 'opacity-0'"
                                    x-text="semesterMessages[semesterMessageIndex]"
                                ></p>

                            </div>


                            <div
                                class="bg-white/20
                                       rounded-xl
                                       px-3 py-2"
                            >

                                <span
                                    class="text-white
                                           font-extrabold
                                           text-lg"
                                >
                                    {{ $semesterProgress }}%
                                </span>

                            </div>

                        </div>


                        <div class="mt-6">

                            <div
                                class="flex
                                       justify-between
                                       text-sm
                                       text-blue-100
                                       mb-2"
                            >

                                <span>
                                    Completed
                                </span>

                                <span class="font-semibold">
                                    {{ $semesterProgress }}%
                                </span>

                            </div>


                            <div
                                class="w-full
                                       bg-white/20
                                       rounded-full
                                       h-3
                                       overflow-hidden"
                            >

                                <div
                                    class="bg-white
                                           rounded-full
                                           h-3
                                           transition-all
                                           duration-700"
                                    style="width: {{ $semesterProgress }}%"
                                ></div>

                            </div>

                        </div>


                        @if($semesterStartDate && $semesterEndDate)

                            <div
                                class="mt-5
                                       flex
                                       items-center
                                       justify-between
                                       gap-3
                                       text-xs
                                       text-blue-100"
                            >

                                <div>

                                    <p class="opacity-70">
                                        Started
                                    </p>

                                    <p
                                        class="font-semibold
                                               text-white
                                               mt-1"
                                    >
                                        {{ \Carbon\Carbon::parse($semesterStartDate)->format('M d, Y') }}
                                    </p>

                                </div>


                                <div class="text-right">

                                    <p class="opacity-70">
                                        Ends
                                    </p>

                                    <p
                                        class="font-semibold
                                               text-white
                                               mt-1"
                                    >
                                        {{ \Carbon\Carbon::parse($semesterEndDate)->format('M d, Y') }}
                                    </p>

                                </div>

                            </div>

                        @endif


                        <div
                            class="grid
                                   grid-cols-2
                                   gap-4
                                   mt-8"
                        >

                            <div>

                                <p
                                    class="text-3xl
                                           font-bold
                                           text-white"
                                >
                                    {{ $stats['notes'] ?? 0 }}
                                </p>

                                <p
                                    class="text-blue-100
                                           text-sm"
                                >
                                    Notes
                                </p>

                            </div>


                            <div>

                                <p
                                    class="text-3xl
                                           font-bold
                                           text-white"
                                >
                                    {{ $stats['announcements'] ?? 0 }}
                                </p>

                                <p
                                    class="text-blue-100
                                           text-sm"
                                >
                                    Updates
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- QUICK STATS -->
        <!-- ========================================================= -->

        <div
            class="grid
                   grid-cols-1
                   sm:grid-cols-2
                   xl:grid-cols-4
                   gap-6
                   lg:gap-8"
        >


            <!-- NOTES -->

            <div
                class="bg-white
                       rounded-3xl
                       shadow-lg
                       p-7
                       hover:-translate-y-2
                       hover:shadow-2xl
                       transition"
            >

                <div
                    class="flex
                           justify-between
                           items-center"
                >

                    <div>

                        <p class="text-gray-500 text-sm">
                            Total Notes
                        </p>

                        <h2
                            class="text-4xl
                                   font-extrabold
                                   text-blue-600
                                   mt-3"
                        >
                            {{ $stats['notes'] ?? 0 }}
                        </h2>

                    </div>


                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-blue-100
                               flex
                               items-center
                               justify-center
                               text-3xl"
                    >
                        📚
                    </div>

                </div>

            </div>


            <!-- BUSINESSES -->

            <div
                class="bg-white
                       rounded-3xl
                       shadow-lg
                       p-7
                       hover:-translate-y-2
                       hover:shadow-2xl
                       transition"
            >

                <div
                    class="flex
                           justify-between
                           items-center"
                >

                    <div>

                        <p class="text-gray-500 text-sm">
                            Businesses
                        </p>

                        <h2
                            class="text-4xl
                                   font-extrabold
                                   text-orange-500
                                   mt-3"
                        >
                            {{ $stats['businesses'] ?? 0 }}
                        </h2>

                    </div>


                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-orange-100
                               flex
                               items-center
                               justify-center
                               text-3xl"
                    >
                        🏪
                    </div>

                </div>

            </div>


            <!-- RENTALS -->

            <div
                class="bg-white
                       rounded-3xl
                       shadow-lg
                       p-7
                       hover:-translate-y-2
                       hover:shadow-2xl
                       transition"
            >

                <div
                    class="flex
                           justify-between
                           items-center"
                >

                    <div>

                        <p class="text-gray-500 text-sm">
                            Rentals
                        </p>

                        <h2
                            class="text-4xl
                                   font-extrabold
                                   text-green-600
                                   mt-3"
                        >
                            {{ $stats['accommodations'] ?? 0 }}
                        </h2>

                    </div>


                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-green-100
                               flex
                               items-center
                               justify-center
                               text-3xl"
                    >
                        🏡
                    </div>

                </div>

            </div>


            <!-- ANNOUNCEMENTS -->

            <div
                class="bg-white
                       rounded-3xl
                       shadow-lg
                       p-7
                       hover:-translate-y-2
                       hover:shadow-2xl
                       transition"
            >

                <div
                    class="flex
                           justify-between
                           items-center"
                >

                    <div>

                        <p class="text-gray-500 text-sm">
                            Announcements
                        </p>

                        <h2
                            class="text-4xl
                                   font-extrabold
                                   text-red-500
                                   mt-3"
                        >
                            {{ $stats['announcements'] ?? 0 }}
                        </h2>

                    </div>


                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-red-100
                               flex
                               items-center
                               justify-center
                               text-3xl"
                    >
                        📢
                    </div>

                </div>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- QUICK ACCESS -->
        <!-- ========================================================= -->

        <div class="mt-14">

            <div class="mb-8">

                <h2
                    class="text-3xl
                           lg:text-4xl
                           font-extrabold
                           text-gray-800"
                >
                    Quick Access
                </h2>

                <p class="text-gray-500 mt-2">
                    Everything you need in one place.
                </p>

            </div>


            <div
                class="grid
                       grid-cols-1
                       md:grid-cols-2
                       xl:grid-cols-4
                       gap-6
                       lg:gap-8"
            >


                <!-- NOTES -->

                <a
                    href="{{ route('notes.index') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-blue-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        📚
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        Notes
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Browse lecture notes uploaded by students.
                    </p>

                </a>


                <!-- PAST PAPERS -->

                <a
                    href="{{ route('pastpapers.index') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-green-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        📄
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        Past Papers
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Prepare using previous CATs and exams.
                    </p>

                </a>


                <!-- MARKETPLACE -->

                <a
                    href="{{ route('marketplace.index') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-purple-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        🛒
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        Marketplace
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Buy and sell with fellow students.
                    </p>

                </a>


                <!-- RENTALS -->

                <a
                    href="{{ route('browse.rentals') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-orange-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        🏡
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        Rentals
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Find affordable off-campus housing.
                    </p>

                </a>


                <!-- HOSTELS -->

                <a
                    href="{{ route('campus.index') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-red-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        🏫
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        Hostels
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        View available campus hostels.
                    </p>

                </a>


                <!-- LOST & FOUND -->

                <a
                    href="{{ route('lostfound.index') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-yellow-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        🔍
                    </div>

                    <h3
                        class="text-2xl
                               font-bold"
                               mt-6"
                    >
                        Lost & Found
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Recover or report lost items.
                    </p>

                </a>


                <!-- BUSINESSES -->

                <a
                    href="{{ route('businesses.index') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-pink-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        🏪
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        Businesses
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Discover student businesses nearby.
                    </p>

                </a>


                <!-- PROFILE -->

                <a
                    href="{{ route('profile.edit') }}"
                    class="bg-white
                           rounded-3xl
                           p-8
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-2
                           duration-300"
                >

                    <div
                        class="w-16 h-16
                               rounded-2xl
                               bg-sky-100
                               flex
                               items-center
                               justify-center
                               text-4xl"
                    >
                        👤
                    </div>

                    <h3
                        class="text-2xl
                               font-bold
                               mt-6"
                    >
                        My Profile
                    </h3>

                    <p
                        class="text-gray-500
                               mt-3"
                    >
                        Update your account and settings.
                    </p>

                </a>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- RECENT ACTIVITY -->
        <!-- ========================================================= -->

        <div
            class="grid
                   grid-cols-1
                   xl:grid-cols-2
                   gap-6
                   lg:gap-8
                   mt-16"
        >


            <!-- RECENT ANNOUNCEMENTS -->

            <div
                class="bg-white
                       rounded-3xl
                       shadow-lg
                       p-8"
            >

                <div
                    class="flex
                           justify-between
                           items-center
                           mb-8"
                >

                    <div>

                        <h2 class="text-2xl font-bold">
                            📢 Recent Announcements
                        </h2>

                        <p
                            class="text-gray-500
                                   text-sm
                                   mt-1"
                        >
                            Latest campus updates
                        </p>

                    </div>


                    <a
                        href="{{ route('announcements.index') }}"
                        class="text-blue-600
                               font-semibold
                               hover:underline"
                    >
                        View All →
                    </a>

                </div>


                <div class="space-y-6">

                    @forelse($announcements->take(4) as $announcement)

                        <div
                            class="border-b
                                   pb-5
                                   last:border-none"
                        >

                            <h3 class="font-bold text-lg">
                                {{ $announcement->title }}
                            </h3>

                            <p
                                class="text-gray-500
                                       mt-2"
                            >
                                {{ \Illuminate\Support\Str::limit($announcement->content, 90) }}
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

            <div
                class="bg-white
                       rounded-3xl
                       shadow-lg
                       p-8"
            >

                <div
                    class="flex
                           justify-between
                           items-center
                           mb-8"
                >

                    <div>

                        <h2 class="text-2xl font-bold">
                            🔥 Trending Notes
                        </h2>

                        <p
                            class="text-gray-500
                                   text-sm
                                   mt-1"
                        >
                            Most viewed study materials
                        </p>

                    </div>


                    <a
                        href="{{ route('notes.index') }}"
                        class="text-blue-600
                               font-semibold
                               hover:underline"
                    >
                        Browse →
                    </a>

                </div>


                <div class="space-y-5">

                    @forelse($trendingNotes as $note)

                        <div
                            class="flex
                                   justify-between
                                   items-center
                                   border-b
                                   pb-5
                                   last:border-none"
                        >

                            <div>

                                <h3 class="font-bold">
                                    {{ $note->title }}
                                </h3>

                                <p
                                    class="text-gray-500
                                           text-sm
                                           mt-2"
                                >
                                    By {{ $note->user->name }}
                                </p>

                            </div>


                            <a
                                href="{{ route('notes.preview', $note) }}"
                                class="text-blue-600
                                       font-semibold"
                            >
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

    

        <!-- ========================================================= -->
        <!-- FOOTER -->
        <!-- ========================================================= -->

        <footer
            class="mt-16
                   bg-white
                   border-t
                   rounded-t-3xl"
        >

            <div
                class="px-6
                       lg:px-10
                       py-8
                       flex
                       flex-col
                       md:flex-row
                       justify-between
                       items-center"
            >

                <div
                    class="flex
                           items-center
                           gap-4"
                >

                    <div
                        class="w-12 h-12
                               rounded-2xl
                               bg-gradient-to-r
                               from-blue-600
                               to-indigo-600
                               flex
                               items-center
                               justify-center
                               text-white
                               text-xl
                               shadow-lg"
                    >
                        🎓
                    </div>


                    <div>

                        <h3
                            class="text-xl
                                   font-bold
                                   text-gray-800"
                        >
                            CampusConnect
                        </h3>

                        <p class="text-gray-500 text-sm">
                            Your complete student companion.
                        </p>

                    </div>

                </div>


                <div
                    class="flex
                           items-center
                           gap-4
                           mt-6
                           md:mt-0"
                >

                    <a
                        href="#"
                        class="w-11 h-11
                               rounded-xl
                               bg-gray-100
                               hover:bg-blue-600
                               hover:text-white
                               transition
                               duration-300
                               flex
                               items-center
                               justify-center"
                    >
                        🌐
                    </a>

                    <a
                        href="#"
                        class="w-11 h-11
                               rounded-xl
                               bg-gray-100
                               hover:bg-sky-500
                               hover:text-white
                               transition
                               duration-300
                               flex
                               items-center
                               justify-center"
                    >
                        💬
                    </a>

                    <a
                        href="#"
                        class="w-11 h-11
                               rounded-xl
                               bg-gray-100
                               hover:bg-indigo-600
                               hover:text-white
                               transition
                               duration-300
                               flex
                               items-center
                               justify-center"
                    >
                        📧
                    </a>

                    <a
                        href="#"
                        class="w-11 h-11
                               rounded-xl
                               bg-gray-100
                               hover:bg-red-500
                               hover:text-white
                               transition
                               duration-300
                               flex
                               items-center
                               justify-center"
                    >
                        ❤️
                    </a>

                </div>

            </div>


            <div
                class="border-t
                       border-gray-100
                       px-6
                       lg:px-10
                       py-5
                       flex
                       flex-col
                       md:flex-row
                       justify-between
                       items-center
                       gap-3"
            >

                <p class="text-sm text-gray-500">

                    © {{ date('Y') }}

                    <span class="font-semibold text-gray-700">
                        CampusConnect
                    </span>.

                    Built for students with LOVE.

                </p>


                <div
                    class="flex
                           items-center
                           gap-5
                           text-sm
                           text-gray-500"
                >

                    <span
                        class="hover:text-blue-600
                               cursor-pointer
                               transition"
                    >
                        Privacy
                    </span>

                    <span
                        class="hover:text-blue-600
                               cursor-pointer
                               transition"
                    >
                        Terms
                    </span>

                    <span
                        class="hover:text-blue-600
                               cursor-pointer
                               transition"
                    >
                        Help
                    </span>

                    <span class="font-semibold text-blue-600">
                        v2.0
                    </span>

                </div>

            </div>

        </footer>

    </div>

</div>

</x-student-layout>