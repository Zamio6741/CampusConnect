<x-landlord-layout>

<div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-10">


<div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-6 sm:mb-8 lg:mb-10">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex items-start gap-3 sm:gap-4">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-xl sm:h-12 sm:w-12 sm:text-2xl">
                    📅
                </div>

                <div class="min-w-0">

                    <h1 class="text-2xl font-extrabold tracking-tight text-slate-800 sm:text-3xl lg:text-4xl">
                        Booking Management
                    </h1>

                    <p class="mt-1.5 text-sm leading-6 text-slate-500 sm:text-base">
                        Manage all property viewing requests from students.
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SUCCESS MESSAGE --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 shadow-sm sm:p-5">

            <div class="flex items-start gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600">
                    ✓
                </div>

                <div>

                    <p class="text-sm font-semibold text-green-800 sm:text-base">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- STATISTICS --}}
    {{-- ========================================================= --}}

    <div class="mb-6 grid grid-cols-2 gap-3 sm:gap-5 lg:mb-8 lg:grid-cols-4">

        {{-- Total --}}

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">

            <div class="flex items-start justify-between gap-2">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500 sm:text-sm">
                        Total Requests
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold text-sky-600 sm:text-4xl">
                        {{ $totalBookings }}
                    </h2>

                </div>

                <div class="hidden h-10 w-10 items-center justify-center rounded-xl bg-sky-50 text-lg sm:flex">
                    📋
                </div>

            </div>

        </div>


        {{-- Pending --}}

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">

            <div class="flex items-start justify-between gap-2">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500 sm:text-sm">
                        Pending
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold text-yellow-500 sm:text-4xl">
                        {{ $pendingBookings }}
                    </h2>

                </div>

                <div class="hidden h-10 w-10 items-center justify-center rounded-xl bg-yellow-50 text-lg sm:flex">
                    ⏳
                </div>

            </div>

        </div>


        {{-- Approved --}}

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">

            <div class="flex items-start justify-between gap-2">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500 sm:text-sm">
                        Approved
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold text-green-600 sm:text-4xl">
                        {{ $approvedBookings }}
                    </h2>

                </div>

                <div class="hidden h-10 w-10 items-center justify-center rounded-xl bg-green-50 text-lg sm:flex">
                    ✅
                </div>

            </div>

        </div>


        {{-- Moved In --}}

        <div class="rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:rounded-3xl sm:p-6">

            <div class="flex items-start justify-between gap-2">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500 sm:text-sm">
                        Moved In
                    </p>

                    <h2 class="mt-2 text-2xl font-extrabold text-blue-700 sm:text-4xl">
                        {{ $movedInBookings }}
                    </h2>

                </div>

                <div class="hidden h-10 w-10 items-center justify-center rounded-xl bg-blue-50 text-lg sm:flex">
                    🏠
                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SEARCH --}}
    {{-- ========================================================= --}}

    <div class="mb-6 sm:mb-8">

        <div class="relative">

            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                🔎
            </div>

            <input
                id="bookingSearch"
                type="search"
                autocomplete="off"
                placeholder="Search student or property..."
                class="w-full rounded-2xl border border-slate-200 bg-white py-3.5 pl-11 pr-4 text-sm text-slate-700 shadow-sm outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100 sm:py-4 sm:text-base">

        </div>

        <p class="mt-2 text-xs text-slate-400 sm:text-sm">
            Search by student name or property name.
        </p>

    </div>


    {{-- ========================================================= --}}
    {{-- BOOKING CONTAINER --}}
    {{-- ========================================================= --}}

    <div id="bookingContainer" class="space-y-5 sm:space-y-6 lg:space-y-8">

        @forelse($bookings as $booking)

            <div class="booking-card overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-200 hover:shadow-md sm:rounded-3xl">

                <div class="grid grid-cols-1 lg:grid-cols-[280px_1fr]">

                    {{-- ================================================= --}}
                    {{-- PROPERTY IMAGE --}}
                    {{-- ================================================= --}}

                    <div class="relative h-56 bg-slate-100 sm:h-64 lg:h-full lg:min-h-[360px]">

                        @if($booking->accommodation->photos->first())

                            <img
                                src="{{ asset('storage/'.$booking->accommodation->photos->first()->image_path) }}"
                                alt="{{ $booking->accommodation->title }}"
                                class="h-full w-full object-cover">

                        @else

                            <div class="flex h-full min-h-[220px] items-center justify-center bg-gradient-to-br from-slate-100 to-slate-200 text-6xl">
                                🏠
                            </div>

                        @endif

                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent p-4 pt-12 lg:hidden">

                            <p class="text-xs font-medium uppercase tracking-wide text-white/80">
                                Rental Property
                            </p>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- BOOKING INFORMATION --}}
                    {{-- ================================================= --}}

                    <div class="min-w-0 p-5 sm:p-7 lg:p-8">

                        {{-- Property heading --}}

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                            <div class="min-w-0">

                                <p class="mb-1 text-xs font-semibold uppercase tracking-wider text-sky-600">
                                    Booking Request
                                </p>

                                <h2 class="property-title break-words text-xl font-extrabold leading-tight text-slate-800 sm:text-2xl lg:text-3xl">
                                    {{ $booking->accommodation->title }}
                                </h2>

                                <p class="mt-2 flex items-start gap-2 text-sm leading-5 text-slate-500 sm:text-base">

                                    <span class="shrink-0">
                                        📍
                                    </span>

                                    <span>
                                        {{ $booking->accommodation->location }}
                                    </span>

                                </p>

                            </div>


                            {{-- Status --}}

                            <div class="shrink-0">

                                @if($booking->status == "Pending")

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-50 px-3.5 py-2 text-xs font-bold text-yellow-700 ring-1 ring-inset ring-yellow-200 sm:px-4 sm:text-sm">
                                        <span>⏳</span>
                                        Pending
                                    </span>

                                @elseif($booking->status == "Approved")

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-green-50 px-3.5 py-2 text-xs font-bold text-green-700 ring-1 ring-inset ring-green-200 sm:px-4 sm:text-sm">
                                        <span>✓</span>
                                        Approved
                                    </span>

                                @elseif($booking->status == "Rejected")

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-red-50 px-3.5 py-2 text-xs font-bold text-red-700 ring-1 ring-inset ring-red-200 sm:px-4 sm:text-sm">
                                        <span>✕</span>
                                        Rejected
                                    </span>

                                @elseif($booking->status == "Moved In")

                                    <span class="inline-flex items-center gap-1.5 rounded-full bg-blue-50 px-3.5 py-2 text-xs font-bold text-blue-700 ring-1 ring-inset ring-blue-200 sm:px-4 sm:text-sm">
                                        <span>🏠</span>
                                        Moved In
                                    </span>

                                @else

                                    <span class="inline-flex rounded-full bg-slate-100 px-4 py-2 text-xs font-bold text-slate-700 sm:text-sm">
                                        {{ $booking->status }}
                                    </span>

                                @endif

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- STUDENT DETAILS --}}
                        {{-- ================================================= --}}

                        <div class="mt-6 grid grid-cols-1 gap-3 sm:grid-cols-3 sm:gap-4 lg:mt-8">

                            {{-- Student --}}

                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Student
                                </p>

                                <p class="student-name mt-1.5 break-words text-sm font-bold text-slate-800 sm:text-base">
                                    {{ $booking->student->name }}
                                </p>

                            </div>


                            {{-- Phone --}}

                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Phone
                                </p>

                                <p class="mt-1.5 break-all text-sm font-bold text-slate-800 sm:text-base">
                                    {{ $booking->phone }}
                                </p>

                            </div>


                            {{-- Visit Date --}}

                            <div class="rounded-2xl border border-slate-100 bg-slate-50 p-4">

                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                    Visit Date
                                </p>

                                <p class="mt-1.5 text-sm font-bold text-slate-800 sm:text-base">

                                    {{ \Carbon\Carbon::parse($booking->visit_date)->format('d M Y') }}

                                </p>

                            </div>

                        </div>


                        {{-- ================================================= --}}
                        {{-- STUDENT MESSAGE --}}
                        {{-- ================================================= --}}

                        @if($booking->message)

                            <div class="mt-5 rounded-2xl border border-blue-100 bg-blue-50 p-4 sm:mt-6 sm:p-5">

                                <div class="flex items-start gap-3">

                                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-white text-base shadow-sm">
                                        💬
                                    </div>

                                    <div class="min-w-0">

                                        <h3 class="text-sm font-bold text-slate-800 sm:text-base">
                                            Student Message
                                        </h3>

                                        <p class="mt-1.5 break-words text-sm leading-6 text-slate-600">
                                            {{ $booking->message }}
                                        </p>

                                    </div>

                                </div>

                            </div>

                        @endif


                        {{-- ================================================= --}}
                        {{-- ACTIONS --}}
                        {{-- ================================================= --}}

                        <div class="mt-6 border-t border-slate-100 pt-5 sm:mt-8 sm:pt-6">

                            @if($booking->status == "Pending")

                                <div class="grid grid-cols-1 gap-3 sm:flex sm:flex-wrap">

                                    <form
                                        method="POST"
                                        action="{{ route('landlord.bookings.update',$booking) }}"
                                        class="w-full sm:w-auto">

                                        @csrf
                                        @method('PATCH')

                                        <input
                                            type="hidden"
                                            name="status"
                                            value="Approved">

                                        <button
                                            type="submit"
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-green-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-100 sm:w-auto">

                                            <span>✅</span>
                                            <span>Approve</span>

                                        </button>

                                    </form>


                                    <form
                                        method="POST"
                                        action="{{ route('landlord.bookings.update',$booking) }}"
                                        class="w-full sm:w-auto">

                                        @csrf
                                        @method('PATCH')

                                        <input
                                            type="hidden"
                                            name="status"
                                            value="Rejected">

                                        <button
                                            type="submit"
                                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-100 sm:w-auto">

                                            <span>❌</span>
                                            <span>Reject</span>

                                        </button>

                                    </form>

                                </div>


                            @elseif($booking->status == "Approved")

                                <form
                                    method="POST"
                                    action="{{ route('landlord.bookings.update',$booking) }}"
                                    class="w-full sm:w-auto">

                                    @csrf
                                    @method('PATCH')

                                    <input
                                        type="hidden"
                                        name="status"
                                        value="Moved In">

                                    <button
                                        type="submit"
                                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-600 px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-100 sm:w-auto">

                                        <span>🏠</span>
                                        <span>Mark Moved In</span>

                                    </button>

                                </form>


                            @elseif($booking->status == "Moved In")

                                <div class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-blue-50 px-5 py-3 text-sm font-bold text-blue-700 ring-1 ring-inset ring-blue-200 sm:w-auto">

                                    <span>🏠</span>
                                    <span>Tenant Moved In</span>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        @empty

            {{-- ================================================= --}}
            {{-- EMPTY STATE --}}
            {{-- ================================================= --}}

            <div class="rounded-2xl border border-slate-200 bg-white px-5 py-14 text-center shadow-sm sm:rounded-3xl sm:p-16">

                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-4xl">
                    📭
                </div>

                <h2 class="mt-5 text-xl font-bold text-slate-700 sm:text-2xl">
                    No booking requests yet
                </h2>

                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500 sm:text-base">
                    Student booking requests will appear here when someone requests to view or book one of your properties.
                </p>

            </div>

        @endforelse

    </div>


    {{-- ========================================================= --}}
    {{-- NO SEARCH RESULTS --}}
    {{-- ========================================================= --}}

    <div
        id="noSearchResults"
        class="hidden rounded-2xl border border-slate-200 bg-white px-5 py-12 text-center shadow-sm sm:rounded-3xl sm:p-14">

        <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl">
            🔎
        </div>

        <h2 class="mt-4 text-lg font-bold text-slate-700 sm:text-xl">
            No matching bookings
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            Try searching with a different student or property name.
        </p>

    </div>

</div>


</div>

{{-- ========================================================= --}}
{{-- SEARCH SCRIPT --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('bookingSearch');
    const noResults = document.getElementById('noSearchResults');

    if (!searchInput) {
        return;
    }

    searchInput.addEventListener('input', function () {

        const value = this.value.trim().toLowerCase();

        const cards = document.querySelectorAll('.booking-card');

        let visibleCards = 0;

        cards.forEach(function (card) {

            const studentElement = card.querySelector('.student-name');
            const propertyElement = card.querySelector('.property-title');

            const student = studentElement
                ? studentElement.innerText.toLowerCase()
                : '';

            const property = propertyElement
                ? propertyElement.innerText.toLowerCase()
                : '';

            const matches =
                value === '' ||
                student.includes(value) ||
                property.includes(value);

            if (matches) {

                card.style.display = '';

                visibleCards++;

            } else {

                card.style.display = 'none';

            }

        });

        if (noResults) {

            noResults.classList.toggle(
                'hidden',
                visibleCards !== 0 || value === ''
            );

        }

    });

});

</script>

</x-landlord-layout>