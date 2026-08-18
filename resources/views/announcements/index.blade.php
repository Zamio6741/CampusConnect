<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-6 sm:py-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-8 sm:mb-10">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5 sm:gap-6">

                <div class="min-w-0">

                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-sky-700 leading-tight">
                        📢 Campus Announcements
                    </h1>

                    <p class="text-gray-600 mt-2 sm:mt-3 text-sm sm:text-base lg:text-lg leading-relaxed">
                        Stay updated with the latest university news.
                    </p>

                </div>

                {{-- ADMIN ONLY --}}

                @if(auth()->user()->is_admin)

                    <a
                        href="{{ route('announcements.create') }}"
                        class="w-full sm:w-auto inline-flex items-center justify-center
                               bg-sky-600 hover:bg-sky-700
                               text-white
                               px-5 sm:px-6
                               py-3 sm:py-3.5
                               rounded-xl
                               font-bold
                               shadow-lg
                               hover:shadow-xl
                               transition
                               text-sm sm:text-base">

                        <span class="mr-2">+</span>

                        New Announcement

                    </a>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ANNOUNCEMENT LIST --}}
        {{-- ========================================================= --}}

        @if($announcements->count() > 0)

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 sm:gap-6 lg:gap-8">

                @foreach($announcements as $announcement)

                    <a
                        href="{{ route('announcements.show', $announcement) }}"
                        class="block
                               bg-white
                               rounded-2xl sm:rounded-3xl
                               shadow-lg
                               border border-slate-200
                               hover:border-sky-300
                               hover:shadow-2xl
                               transition
                               duration-300
                               hover:-translate-y-1
                               p-5 sm:p-7 lg:p-8
                               overflow-hidden">

                        {{-- Announcement Header --}}

                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-3">

                            <h2
                                class="text-xl sm:text-2xl
                                       font-bold
                                       text-sky-700
                                       leading-snug
                                       break-words">

                                {{ $announcement->title }}

                            </h2>

                            <span
                                class="text-xs sm:text-sm
                                       text-gray-400
                                       whitespace-nowrap
                                       self-start">

                                {{ $announcement->created_at->format('M d') }}

                            </span>

                        </div>


                        {{-- Announcement Preview --}}

                        <p
                            class="text-gray-600
                                   mt-4 sm:mt-5
                                   leading-6 sm:leading-7
                                   text-sm sm:text-base
                                   break-words">

                            {{ Str::limit($announcement->content, 180) }}

                        </p>


                        {{-- Bottom Information --}}

                        <div
                            class="mt-5 sm:mt-6
                                   pt-4 sm:pt-5
                                   border-t border-gray-100
                                   flex flex-col
                                   sm:flex-row
                                   sm:justify-between
                                   sm:items-center
                                   gap-3">

                            <span
                                class="text-xs sm:text-sm
                                       text-gray-400">

                                {{ $announcement->created_at->diffForHumans() }}

                            </span>

                            <span
                                class="font-bold
                                       text-sky-600
                                       text-sm sm:text-base
                                       self-start
                                       sm:self-auto">

                                Read More →

                            </span>

                        </div>

                    </a>

                @endforeach

            </div>


        @else

            {{-- ===================================================== --}}
            {{-- EMPTY STATE --}}
            {{-- ===================================================== --}}

            <div
                class="bg-white
                       rounded-2xl sm:rounded-3xl
                       shadow-lg
                       border border-slate-200
                       p-8 sm:p-12 lg:p-16
                       text-center">

                <div class="text-6xl sm:text-7xl lg:text-8xl">
                    📭
                </div>

                <h2
                    class="text-2xl sm:text-3xl lg:text-4xl
                           font-bold
                           mt-5 sm:mt-6">

                    No announcements yet

                </h2>

                <p
                    class="text-gray-500
                           mt-3
                           text-sm sm:text-base lg:text-lg">

                    Check back later for the latest university announcements.

                </p>


                {{-- ADMIN ONLY --}}

                @if(auth()->user()->is_admin)

                    <a
                        href="{{ route('announcements.create') }}"
                        class="inline-flex
                               items-center
                               justify-center
                               mt-6 sm:mt-8
                               bg-sky-600
                               hover:bg-sky-700
                               text-white
                               px-6 sm:px-8
                               py-3 sm:py-4
                               rounded-xl sm:rounded-2xl
                               font-bold
                               shadow-lg
                               transition">

                        + Create Announcement

                    </a>

                @endif

            </div>

        @endif

    </div>

</div>

</x-app-layout>