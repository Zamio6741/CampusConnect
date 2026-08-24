<x-student-layout>

<div class="min-h-screen w-full overflow-x-hidden bg-slate-100">

    <!-- ========================================================= -->
    <!-- HEADER -->
    <!-- ========================================================= -->

    <div class="w-full bg-white border-b border-gray-200">

        <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

            <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 break-words">
                CampusConnect Search
            </h1>

            <p class="mt-1 text-sm sm:text-base text-gray-500">
                Search anything across CampusConnect.
            </p>

        </div>

    </div>


    <!-- ========================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ========================================================= -->

    <main class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5 sm:py-6">

        <!-- ===================================================== -->
        <!-- SEARCH FORM -->
        <!-- ===================================================== -->

        <form
            method="GET"
            action="{{ route('student.search') }}"
            class="w-full"
        >

            <div class="relative w-full">

                <!-- Search Icon -->

                <svg
                    class="absolute left-4 sm:left-5 top-1/2 -translate-y-1/2
                           h-5 w-5 text-gray-400 pointer-events-none z-10"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14"
                    />
                </svg>


                <!-- Search Input -->

                <input
                    type="search"
                    name="q"
                    value="{{ $query }}"
                    autofocus
                    autocomplete="off"
                    placeholder="Search anything..."
                    class="w-full h-14 sm:h-16
                           pl-12 sm:pl-14
                           pr-28 sm:pr-32
                           rounded-2xl
                           border border-gray-200
                           bg-white
                           text-sm sm:text-base text-gray-700
                           shadow-sm
                           outline-none
                           focus:ring-4 focus:ring-blue-100
                           focus:border-blue-500
                           transition"
                >


                <!-- Search Button -->

                <button
                    type="submit"
                    class="absolute right-1.5 sm:right-2
                           top-1.5 sm:top-2
                           bottom-1.5 sm:bottom-2
                           px-4 sm:px-6
                           rounded-xl
                           bg-blue-600
                           text-white
                           text-sm sm:text-base
                           font-semibold
                           hover:bg-blue-700
                           active:bg-blue-800
                           transition
                           whitespace-nowrap"
                >
                    Search
                </button>

            </div>

        </form>


        <!-- ===================================================== -->
        <!-- SEARCH COUNT -->
        <!-- ===================================================== -->

        @if($query !== '')

            <div class="mt-4 text-sm text-gray-500 break-words">

                Found

                <span class="font-bold text-gray-800">
                    {{ $totalResults }}
                </span>

                {{ Str::plural('result', $totalResults) }}

                for

                <span class="font-semibold text-blue-600">
                    "{{ $query }}"
                </span>

            </div>

        @endif


        <!-- ===================================================== -->
        <!-- EMPTY SEARCH -->
        <!-- ===================================================== -->

        @if($query === '')

            <div
                class="mt-8 sm:mt-10
                       w-full
                       bg-white
                       rounded-2xl
                       border border-gray-200
                       p-6 sm:p-10
                       text-center"
            >

                <div class="text-4xl sm:text-5xl mb-4">
                    🔎
                </div>

                <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                    Search CampusConnect
                </h2>

                <p class="mt-2 text-sm sm:text-base text-gray-500 max-w-2xl mx-auto">
                    Search notes, past papers, accommodation, businesses,
                    hostels, marketplace items, announcements and more.
                </p>

            </div>


        <!-- ===================================================== -->
        <!-- NO RESULTS -->
        <!-- ===================================================== -->

        @elseif($totalResults === 0)

            <div
                class="mt-8 sm:mt-10
                       w-full
                       bg-white
                       rounded-2xl
                       border border-gray-200
                       p-6 sm:p-10
                       text-center"
            >

                <div class="text-4xl sm:text-5xl mb-4">
                    🔍
                </div>

                <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                    No results found
                </h2>

                <p class="mt-2 text-sm sm:text-base text-gray-500 max-w-xl mx-auto">
                    Try using fewer letters, another word, a location,
                    unit code, accommodation name or business name.
                </p>

                <div class="mt-5 text-sm text-gray-400">

                    Example:

                    <span class="font-semibold text-blue-500">
                        prog
                    </span>

                    can find

                    <span class="font-semibold text-gray-600">
                        Programming
                    </span>

                </div>

            </div>


        @else


            <!-- ================================================= -->
            <!-- NOTES -->
            <!-- ================================================= -->

            @if($notes->count())

                <section class="mt-7 sm:mt-8">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            📚 Notes
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $notes->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($notes as $note)

                            <a
                                href="{{ route('notes.preview', $note) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $note->title }}
                                        </h3>

                                        @if($note->unit_code)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                {{ $note->unit_code }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        📚
                                    </span>

                                </div>


                                @if($note->unit_name)

                                    <p class="mt-3 text-sm text-gray-500 break-words">
                                        {{ $note->unit_name }}
                                    </p>

                                @endif


                                @if($note->description)

                                    <p class="mt-2 text-sm text-gray-400 line-clamp-2 break-words">
                                        {{ $note->description }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- PAST PAPERS -->
            <!-- ================================================= -->

            @if($pastPapers->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            📄 Past Papers
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $pastPapers->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($pastPapers as $paper)

                            <a
                                href="{{ route('pastpapers.preview', $paper) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $paper->title }}
                                        </h3>

                                        @if($paper->unit_code)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                {{ $paper->unit_code }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        📄
                                    </span>

                                </div>


                                <div class="mt-3 flex flex-wrap gap-2">

                                    @if($paper->year)

                                        <span class="px-2 py-1 text-xs rounded-lg bg-gray-100 text-gray-600">
                                            {{ $paper->year }}
                                        </span>

                                    @endif

                                    @if($paper->semester)

                                        <span class="px-2 py-1 text-xs rounded-lg bg-gray-100 text-gray-600">
                                            {{ $paper->semester }}
                                        </span>

                                    @endif

                                    @if($paper->type)

                                        <span class="px-2 py-1 text-xs rounded-lg bg-blue-50 text-blue-600">
                                            {{ $paper->type }}
                                        </span>

                                    @endif

                                </div>

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- BUSINESSES -->
            <!-- ================================================= -->

            @if($businesses->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            🏪 Businesses
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $businesses->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($businesses as $business)

                            <a
                                href="{{ route('business.preview', $business) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $business->business_name }}
                                        </h3>

                                        @if($business->category)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                {{ $business->category }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        🏪
                                    </span>

                                </div>


                                @if($business->location)

                                    <p class="mt-3 text-sm text-gray-500 break-words">
                                        📍 {{ $business->location }}
                                    </p>

                                @endif


                                @if($business->description)

                                    <p class="mt-2 text-sm text-gray-400 line-clamp-2 break-words">
                                        {{ $business->description }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- ACCOMMODATION -->
            <!-- ================================================= -->

            @if($accommodations->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            🏠 Accommodation
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $accommodations->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($accommodations as $accommodation)

                            <a
                                href="{{ route('accommodation.show', $accommodation) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $accommodation->title }}
                                        </h3>

                                        @if($accommodation->property_type)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                {{ $accommodation->property_type }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        🏠
                                    </span>

                                </div>


                                @if($accommodation->location)

                                    <p class="mt-3 text-sm text-gray-500 break-words">
                                        📍 {{ $accommodation->location }}
                                    </p>

                                @endif


                                @if($accommodation->nearbyArea)

                                    <p class="mt-1 text-sm text-gray-400 break-words">
                                        Near {{ $accommodation->nearbyArea->name }}
                                    </p>

                                @endif


                                @if($accommodation->price)

                                    <p class="mt-2 font-bold text-gray-900">
                                        KSh {{ number_format($accommodation->price, 0) }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- CAMPUS HOSTELS -->
            <!-- ================================================= -->

            @if($campusHostels->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            🏫 Campus Hostels
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $campusHostels->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($campusHostels as $hostel)

                            <a
                                href="{{ route('campus.index') }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $hostel->name }}
                                        </h3>

                                        @if($hostel->block)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                Block {{ $hostel->block }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        🏫
                                    </span>

                                </div>


                                @if($hostel->room_type)

                                    <p class="mt-3 text-sm text-gray-500 break-words">
                                        {{ $hostel->room_type }}
                                    </p>

                                @endif


                                @if($hostel->description)

                                    <p class="mt-2 text-sm text-gray-400 line-clamp-2 break-words">
                                        {{ $hostel->description }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- MARKETPLACE -->
            <!-- ================================================= -->

            @if($marketplaceItems->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            🛒 Marketplace
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $marketplaceItems->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($marketplaceItems as $item)

                            <a
                                href="{{ route('marketplace.show', $item) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $item->title }}
                                        </h3>

                                        @if($item->category)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                {{ $item->category }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        🛒
                                    </span>

                                </div>


                                @if($item->location)

                                    <p class="mt-3 text-sm text-gray-500 break-words">
                                        📍 {{ $item->location }}
                                    </p>

                                @endif


                                @if($item->price)

                                    <p class="mt-2 font-bold text-gray-900">
                                        KSh {{ number_format($item->price, 0) }}
                                    </p>

                                @endif


                                @if($item->description)

                                    <p class="mt-2 text-sm text-gray-400 line-clamp-2 break-words">
                                        {{ $item->description }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- LOST & FOUND -->
            <!-- ================================================= -->

            @if($lostItems->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            🔎 Lost & Found
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $lostItems->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($lostItems as $item)

                            <a
                                href="{{ route('lostfound.show', $item) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <div class="min-w-0 flex-1">

                                        <h3 class="font-bold text-gray-900 break-words">
                                            {{ $item->title }}
                                        </h3>

                                        @if($item->type)

                                            <p class="mt-1 text-sm font-semibold text-blue-600 break-words">
                                                {{ $item->type }}
                                            </p>

                                        @endif

                                    </div>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        🔎
                                    </span>

                                </div>


                                @if($item->location)

                                    <p class="mt-3 text-sm text-gray-500 break-words">
                                        📍 {{ $item->location }}
                                    </p>

                                @endif


                                @if($item->description)

                                    <p class="mt-2 text-sm text-gray-400 line-clamp-2 break-words">
                                        {{ $item->description }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- ANNOUNCEMENTS -->
            <!-- ================================================= -->

            @if($announcements->count())

                <section class="mt-8 sm:mt-10">

                    <div class="flex items-center justify-between gap-3 mb-4">

                        <h2 class="text-lg sm:text-xl font-bold text-gray-900">
                            📢 Announcements
                        </h2>

                        <span class="shrink-0 text-xs sm:text-sm text-gray-500">
                            {{ $announcements->count() }} found
                        </span>

                    </div>


                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">

                        @foreach($announcements as $announcement)

                            <a
                                href="{{ route('announcements.show', $announcement) }}"
                                class="block min-w-0
                                       bg-white
                                       rounded-2xl
                                       border border-gray-200
                                       p-4 sm:p-5
                                       hover:shadow-lg
                                       hover:border-blue-300
                                       active:scale-[0.99]
                                       transition"
                            >

                                <div class="flex items-start justify-between gap-3">

                                    <h3 class="min-w-0 flex-1 font-bold text-gray-900 break-words">
                                        {{ $announcement->title }}
                                    </h3>

                                    <span class="shrink-0 text-xl sm:text-2xl">
                                        📢
                                    </span>

                                </div>


                                @if($announcement->content)

                                    <p class="mt-3 text-sm text-gray-500 line-clamp-3 break-words">
                                        {{ $announcement->content }}
                                    </p>

                                @endif

                            </a>

                        @endforeach

                    </div>

                </section>

            @endif


            <!-- ================================================= -->
            <!-- SEARCH FOOTER -->
            <!-- ================================================= -->

            <div
                class="mt-10 sm:mt-12
                       mb-6 sm:mb-8
                       px-2
                       text-center
                       text-xs sm:text-sm
                       text-gray-400"
            >

                CampusConnect searches across your student resources,
                accommodation, businesses, marketplace, announcements
                and more.

            </div>

        @endif

    </main>

</div>

</x-student-layout>