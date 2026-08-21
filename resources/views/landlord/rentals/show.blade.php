<x-landlord-layout>


<div class="min-h-screen bg-slate-100 py-6 sm:py-8 lg:py-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-6 sm:mb-8">

            <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div class="flex items-center gap-3 min-w-0">

                    <div class="flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-2xl">
                        🏘️
                    </div>

                    <div class="min-w-0">

                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-800">
                            Rental Details
                        </h1>

                        <p class="mt-1 text-sm sm:text-base text-slate-500">
                            View your property information.
                        </p>

                    </div>

                </div>

                <a href="{{ route('rentals.index') }}"
                   class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl border border-slate-300 bg-white px-5 sm:px-6 py-3 text-sm sm:text-base font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 hover:shadow focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">

                    <span class="text-lg leading-none">←</span>
                    <span>Back to Rentals</span>

                </a>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PHOTO GALLERY --}}
        {{-- ========================================================= --}}

        <div class="mb-6 sm:mb-8 overflow-hidden rounded-2xl sm:rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-5 py-5 sm:px-8 sm:py-6">

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-sky-100 text-xl">
                        📸
                    </div>

                    <div>

                        <h2 class="text-lg sm:text-2xl font-bold text-slate-800">
                            Property Photos
                        </h2>

                        <p class="mt-0.5 text-xs sm:text-sm text-slate-500">
                            Photos uploaded for this rental property.
                        </p>

                    </div>

                </div>

            </div>

            <div class="p-4 sm:p-6 lg:p-8">

                @if($accommodation->photos->count())

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

                        @foreach($accommodation->photos as $photo)

                            <div class="group overflow-hidden rounded-2xl bg-slate-100 shadow-sm ring-1 ring-slate-200">

                                <img
                                    src="{{ asset('storage/'.$photo->image_path) }}"
                                    alt="{{ $accommodation->title }} property photo"
                                    class="h-56 w-full object-cover transition duration-300 group-hover:scale-105 sm:h-64">

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="flex flex-col items-center justify-center rounded-2xl bg-slate-50 px-5 py-12 text-center">

                        <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-100 text-3xl">
                            📷
                        </div>

                        <p class="mt-4 font-semibold text-slate-700">
                            No photos uploaded
                        </p>

                        <p class="mt-1 text-sm text-slate-500">
                            This property does not have any photos yet.
                        </p>

                    </div>

                @endif

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- PROPERTY INFORMATION --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl sm:rounded-3xl border border-slate-200 bg-white shadow-sm">

            <div class="border-b border-slate-200 px-5 py-5 sm:px-8 sm:py-6">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                    <div class="min-w-0">

                        <p class="text-xs font-bold uppercase tracking-wider text-sky-600">
                            Property Information
                        </p>

                        <h2 class="mt-1 break-words text-2xl sm:text-3xl font-extrabold text-slate-800">
                            {{ $accommodation->title }}
                        </h2>

                    </div>

                    <div class="shrink-0">

                        @if($accommodation->verified)

                            <span class="inline-flex items-center gap-2 rounded-full bg-green-100 px-4 py-2 text-sm font-bold text-green-700">

                                <span class="flex h-5 w-5 items-center justify-center rounded-full bg-green-500 text-xs text-white">
                                    ✓
                                </span>

                                Verified

                            </span>

                        @else

                            <span class="inline-flex items-center gap-2 rounded-full bg-yellow-100 px-4 py-2 text-sm font-bold text-yellow-700">

                                <span class="h-2 w-2 rounded-full bg-yellow-500"></span>

                                Pending Verification

                            </span>

                        @endif

                    </div>

                </div>

            </div>


            <div class="p-5 sm:p-8">

                <div class="grid grid-cols-1 gap-8 lg:grid-cols-2 lg:gap-12">


                    {{-- ================================================= --}}
                    {{-- LEFT: DETAILS --}}
                    {{-- ================================================= --}}

                    <div>

                        <h3 class="mb-5 flex items-center gap-2 text-lg sm:text-xl font-bold text-slate-800">

                            <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-100">
                                🏠
                            </span>

                            Property Details

                        </h3>


                        <div class="overflow-hidden rounded-2xl border border-slate-200">

                            {{-- Property Type --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Property Type
                                </span>

                                <span class="font-semibold capitalize text-slate-800 sm:text-right">
                                    {{ ucfirst(str_replace('_',' ',$accommodation->property_type)) }}
                                </span>

                            </div>


                            {{-- Price --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 bg-green-50/50 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Price
                                </span>

                                <span class="text-lg font-extrabold text-green-600 sm:text-right">
                                    KES {{ number_format($accommodation->price) }}
                                </span>

                            </div>


                            {{-- Location --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Location
                                </span>

                                <span class="break-words font-semibold text-slate-800 sm:max-w-[60%] sm:text-right">
                                    {{ $accommodation->location }}
                                </span>

                            </div>


                            {{-- University --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    University
                                </span>

                                <span class="break-words font-semibold text-slate-800 sm:max-w-[60%] sm:text-right">
                                    {{ $accommodation->university->name ?? '-' }}
                                </span>

                            </div>


                            {{-- Nearby Area --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Nearby Area
                                </span>

                                <span class="break-words font-semibold text-slate-800 sm:max-w-[60%] sm:text-right">
                                    {{ $accommodation->nearbyArea->name ?? '-' }}
                                </span>

                            </div>


                            {{-- Phone --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Phone
                                </span>

                                <span class="break-words font-semibold text-slate-800 sm:max-w-[60%] sm:text-right">
                                    {{ $accommodation->phone ?: '-' }}
                                </span>

                            </div>


                            {{-- WhatsApp --}}

                            <div class="flex flex-col gap-1 border-b border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    WhatsApp
                                </span>

                                <span class="break-words font-semibold text-slate-800 sm:max-w-[60%] sm:text-right">
                                    {{ $accommodation->whatsapp ?: '-' }}
                                </span>

                            </div>


                            {{-- Status --}}

                            <div class="flex flex-col gap-2 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Verification Status
                                </span>

                                <div>

                                    @if($accommodation->verified)

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-green-100 px-3 py-1.5 text-sm font-bold text-green-700">
                                            ✓ Verified
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-1.5 rounded-full bg-yellow-100 px-3 py-1.5 text-sm font-bold text-yellow-700">
                                            ⏳ Pending Verification
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Posted --}}

                            <div class="flex flex-col gap-1 border-t border-slate-200 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-5">

                                <span class="text-sm font-medium text-slate-500">
                                    Posted
                                </span>

                                <span class="font-semibold text-slate-800 sm:text-right">
                                    {{ $accommodation->created_at->format('d M Y') }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- RIGHT: DESCRIPTION & FACILITIES --}}
                    {{-- ================================================= --}}

                    <div>

                        {{-- Description --}}

                        <div>

                            <h3 class="mb-4 flex items-center gap-2 text-lg sm:text-xl font-bold text-slate-800">

                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-sky-100">
                                    📝
                                </span>

                                Description

                            </h3>

                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

                                <p class="whitespace-pre-line break-words text-sm sm:text-base leading-7 sm:leading-8 text-slate-600">

                                    {{ $accommodation->description ?: 'No description provided.' }}

                                </p>

                            </div>

                        </div>


                        {{-- Facilities --}}

                        <div class="mt-8">

                            <h3 class="mb-4 flex items-center gap-2 text-lg sm:text-xl font-bold text-slate-800">

                                <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-sky-100">
                                    ⚡
                                </span>

                                Facilities

                            </h3>

                            @if($accommodation->facilities->count())

                                <div class="flex flex-wrap gap-2.5">

                                    @foreach($accommodation->facilities as $facility)

                                        <span class="inline-flex items-center rounded-full border border-sky-200 bg-sky-50 px-3.5 py-2 text-sm font-semibold text-sky-700">

                                            {{ $facility->name }}

                                        </span>

                                    @endforeach

                                </div>

                            @else

                                <div class="rounded-2xl border border-slate-200 bg-slate-50 px-5 py-4">

                                    <p class="text-sm text-slate-500">
                                        No facilities added.
                                    </p>

                                </div>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- ACTION BUTTONS --}}
                {{-- ===================================================== --}}

                <div class="mt-8 border-t border-slate-200 pt-6 sm:mt-10 sm:pt-8">

                    <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">

                        <a href="{{ route('rentals.edit',$accommodation) }}"
                           class="inline-flex min-h-[48px] items-center justify-center gap-2 rounded-xl bg-orange-500 px-6 py-3 text-sm sm:text-base font-semibold text-white shadow-sm transition hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">

                            ✏
                            Edit Rental

                        </a>

                        <form
                            action="{{ route('rentals.destroy',$accommodation) }}"
                            method="POST"
                            onsubmit="return confirm('Delete this rental?')"
                            class="w-full">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="inline-flex min-h-[48px] w-full items-center justify-center gap-2 rounded-xl bg-red-600 px-6 py-3 text-sm sm:text-base font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">

                                🗑
                                Delete Rental

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- BOTTOM NAVIGATION --}}
        {{-- ========================================================= --}}

        <div class="mt-6 flex justify-center sm:mt-8">

            <a href="{{ route('rentals.index') }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-sky-600">

                ← Back to My Rentals

            </a>

        </div>

    </div>

</div>


</x-landlord-layout>
