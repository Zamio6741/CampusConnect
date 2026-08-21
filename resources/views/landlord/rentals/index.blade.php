<x-landlord-layout>


<div class="min-h-screen bg-slate-100 py-6 sm:py-8 lg:py-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-6 sm:mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="min-w-0">

                    <div class="flex items-center gap-3">

                        <div class="flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-2xl">
                            🏘️
                        </div>

                        <div class="min-w-0">

                            <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-800">
                                My Rentals
                            </h1>

                            <p class="mt-1 text-sm sm:text-base text-slate-500">
                                Manage all your published properties.
                            </p>

                        </div>

                    </div>

                </div>

                <a href="{{ route('rental.step1') }}"
                   class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-sky-600 px-5 sm:px-6 py-3 text-sm sm:text-base font-semibold text-white shadow-sm transition duration-200 hover:bg-sky-700 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">

                    <span class="text-lg leading-none">+</span>
                    <span>Add Rental</span>

                </a>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- SUCCESS MESSAGE --}}
        {{-- ========================================================= --}}

        @if(session('success'))

            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 sm:p-5 shadow-sm"
                 role="alert">

                <div class="flex items-start gap-3">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600">
                        ✓
                    </div>

                    <div class="min-w-0">

                        <p class="font-semibold text-green-800">
                            Success
                        </p>

                        <p class="mt-1 text-sm text-green-700 break-words">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- ========================================================= --}}
        {{-- RENTALS --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl sm:rounded-3xl border border-slate-200 bg-white shadow-sm">

            {{-- ===================================================== --}}
            {{-- DESKTOP TABLE --}}
            {{-- ===================================================== --}}

            <div class="hidden lg:block overflow-x-auto">

                <table class="w-full min-w-[1050px]">

                    <thead class="border-b border-slate-200 bg-slate-50">

                        <tr>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Photo
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Property
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                University
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Location
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Price
                            </th>

                            <th class="px-6 py-5 text-left text-xs font-bold uppercase tracking-wider text-slate-600">
                                Status
                            </th>

                            <th class="px-6 py-5 text-center text-xs font-bold uppercase tracking-wider text-slate-600">
                                Actions
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                    @forelse($rentals as $rental)

                        <tr class="transition duration-200 hover:bg-sky-50/50">

                            {{-- Photo --}}

                            <td class="px-6 py-5">

                                @if($rental->photos->count())

                                    <img
                                        src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                        alt="{{ $rental->title }}"
                                        class="h-20 w-20 rounded-2xl object-cover shadow-sm ring-1 ring-slate-200">

                                @else

                                    <div class="flex h-20 w-20 items-center justify-center rounded-2xl bg-slate-100 text-3xl ring-1 ring-slate-200">
                                        🏘️
                                    </div>

                                @endif

                            </td>


                            {{-- Property --}}

                            <td class="px-6 py-5">

                                <div class="max-w-[220px]">

                                    <h3 class="truncate font-bold text-slate-800">
                                        {{ $rental->title }}
                                    </h3>

                                    <p class="mt-1 text-sm capitalize text-slate-500">
                                        {{ ucfirst(str_replace('_',' ',$rental->property_type)) }}
                                    </p>

                                </div>

                            </td>


                            {{-- University --}}

                            <td class="px-6 py-5 text-sm font-medium text-slate-700">

                                {{ $rental->university->short_name ?? '-' }}

                            </td>


                            {{-- Location --}}

                            <td class="px-6 py-5">

                                <div class="flex max-w-[180px] items-center gap-2">

                                    <span class="text-slate-400">
                                        📍
                                    </span>

                                    <span class="truncate text-sm text-slate-600">
                                        {{ $rental->location }}
                                    </span>

                                </div>

                            </td>


                            {{-- Price --}}

                            <td class="px-6 py-5 whitespace-nowrap">

                                <span class="font-bold text-green-600">
                                    KES {{ number_format($rental->price) }}
                                </span>

                            </td>


                            {{-- Status --}}

                            <td class="px-6 py-5">

                                @if($rental->verified)

                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                        Verified

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-1.5 whitespace-nowrap rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700">

                                        <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>

                                        Pending

                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}

                            <td class="px-6 py-5">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('rentals.show',$rental) }}"
                                       class="inline-flex items-center justify-center rounded-lg bg-sky-600 px-3.5 py-2 text-sm font-semibold text-white transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">

                                        View

                                    </a>

                                    <a href="{{ route('rentals.edit',$rental) }}"
                                       class="inline-flex items-center justify-center rounded-lg bg-orange-500 px-3.5 py-2 text-sm font-semibold text-white transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('rentals.destroy',$rental) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this rental?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center rounded-lg bg-red-600 px-3.5 py-2 text-sm font-semibold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="px-6 py-20 text-center">

                                <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-5xl">
                                    🏘️
                                </div>

                                <h2 class="mt-5 text-2xl font-bold text-slate-800">
                                    No rentals found
                                </h2>

                                <p class="mx-auto mt-2 max-w-md text-slate-500">
                                    You haven't published any rental properties yet.
                                    Add your first property to start receiving bookings.
                                </p>

                                <a href="{{ route('rental.step1') }}"
                                   class="mt-6 inline-flex items-center gap-2 rounded-xl bg-sky-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-sky-700">

                                    <span>+</span>
                                    Add Your First Rental

                                </a>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>


            {{-- ===================================================== --}}
            {{-- MOBILE / TABLET CARDS --}}
            {{-- ===================================================== --}}

            <div class="lg:hidden">

                @forelse($rentals as $rental)

                    <div class="border-b border-slate-200 p-4 sm:p-6 last:border-b-0">

                        {{-- Property Header --}}

                        <div class="flex items-start gap-4">

                            @if($rental->photos->count())

                                <img
                                    src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                    alt="{{ $rental->title }}"
                                    class="h-20 w-20 sm:h-24 sm:w-24 shrink-0 rounded-2xl object-cover shadow-sm ring-1 ring-slate-200">

                            @else

                                <div class="flex h-20 w-20 sm:h-24 sm:w-24 shrink-0 items-center justify-center rounded-2xl bg-slate-100 text-3xl sm:text-4xl ring-1 ring-slate-200">
                                    🏘️
                                </div>

                            @endif

                            <div class="min-w-0 flex-1">

                                <div class="flex flex-col gap-2 sm:flex-row sm:items-start sm:justify-between">

                                    <div class="min-w-0">

                                        <h3 class="truncate text-base sm:text-lg font-bold text-slate-800">
                                            {{ $rental->title }}
                                        </h3>

                                        <p class="mt-1 text-sm capitalize text-slate-500">
                                            {{ ucfirst(str_replace('_',' ',$rental->property_type)) }}
                                        </p>

                                    </div>

                                    @if($rental->verified)

                                        <span class="inline-flex w-fit shrink-0 items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 text-xs font-bold text-green-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-green-500"></span>

                                            Verified

                                        </span>

                                    @else

                                        <span class="inline-flex w-fit shrink-0 items-center gap-1.5 rounded-full bg-yellow-100 px-3 py-1.5 text-xs font-bold text-yellow-700">

                                            <span class="h-1.5 w-1.5 rounded-full bg-yellow-500"></span>

                                            Pending

                                        </span>

                                    @endif

                                </div>

                                <div class="mt-3">

                                    <p class="text-base font-extrabold text-green-600">
                                        KES {{ number_format($rental->price) }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Property Details --}}

                        <div class="mt-5 grid grid-cols-1 gap-3 rounded-2xl bg-slate-50 p-4 sm:grid-cols-2">

                            <div class="flex items-start gap-3">

                                <span class="text-slate-400">
                                    🎓
                                </span>

                                <div class="min-w-0">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        University
                                    </p>

                                    <p class="mt-0.5 truncate text-sm font-semibold text-slate-700">
                                        {{ $rental->university->short_name ?? '-' }}
                                    </p>

                                </div>

                            </div>


                            <div class="flex items-start gap-3">

                                <span class="text-slate-400">
                                    📍
                                </span>

                                <div class="min-w-0">

                                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">
                                        Location
                                    </p>

                                    <p class="mt-0.5 break-words text-sm font-semibold text-slate-700">
                                        {{ $rental->location }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Actions --}}

                        <div class="mt-5 grid grid-cols-1 gap-2 sm:grid-cols-3">

                            <a href="{{ route('rentals.show',$rental) }}"
                               class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-sky-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">

                                View Property

                            </a>

                            <a href="{{ route('rentals.edit',$rental) }}"
                               class="inline-flex min-h-[44px] items-center justify-center rounded-xl bg-orange-500 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">

                                Edit Property

                            </a>

                            <form
                                action="{{ route('rentals.destroy',$rental) }}"
                                method="POST"
                                onsubmit="return confirm('Delete this rental?')"
                                class="w-full">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="inline-flex min-h-[44px] w-full items-center justify-center rounded-xl bg-red-600 px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">

                                    Delete Property

                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="px-5 py-16 text-center sm:px-8">

                        <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-slate-100 text-5xl">
                            🏘️
                        </div>

                        <h2 class="mt-5 text-xl sm:text-2xl font-bold text-slate-800">
                            No rentals found
                        </h2>

                        <p class="mx-auto mt-2 max-w-md text-sm sm:text-base text-slate-500">
                            You haven't published any rental properties yet.
                            Add your first property to start receiving bookings.
                        </p>

                        <a href="{{ route('rental.step1') }}"
                           class="mt-6 inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl bg-sky-600 px-6 py-3 font-semibold text-white shadow-sm transition hover:bg-sky-700">

                            <span>+</span>
                            Add Your First Rental

                        </a>

                    </div>

                @endforelse

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PAGINATION --}}
        {{-- ========================================================= --}}

        @if($rentals->hasPages())

            <div class="mt-6 overflow-x-auto rounded-2xl bg-white p-4 shadow-sm">

                {{ $rentals->links() }}

            </div>

        @endif

    </div>

</div>


</x-landlord-layout>
