@extends('layouts.admin')

@section('title', 'Accommodation Details')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-sky-600 via-blue-700 to-indigo-700 rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

        <div class="p-5 sm:p-8">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                {{-- TITLE --}}
                <div class="min-w-0">

                    <p class="text-sky-100 text-xs sm:text-sm uppercase tracking-widest">
                        Accommodation Listing
                    </p>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white mt-2 break-words">
                        🏠 {{ $accommodation->title }}
                    </h1>

                    <p class="text-sky-100 mt-2 text-sm sm:text-base">
                        {{ $accommodation->location }}
                    </p>

                </div>

                {{-- STATUS --}}
                <div class="flex-shrink-0">

                    @if($accommodation->status === 'Approved' || $accommodation->verified)

                        <span class="inline-flex items-center bg-green-500 text-white px-4 sm:px-6 py-2.5 sm:py-3 rounded-full font-semibold shadow-lg text-sm sm:text-base">
                            ✓ Approved
                        </span>

                    @elseif($accommodation->status === 'Rejected')

                        <span class="inline-flex items-center bg-red-500 text-white px-4 sm:px-6 py-2.5 sm:py-3 rounded-full font-semibold shadow-lg text-sm sm:text-base">
                            ✕ Rejected
                        </span>

                    @else

                        <span class="inline-flex items-center bg-yellow-400 text-black px-4 sm:px-6 py-2.5 sm:py-3 rounded-full font-semibold shadow-lg text-sm sm:text-base">
                            ⏳ Pending
                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- MAIN CONTENT --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 sm:gap-8 mt-6 sm:mt-8">

        {{-- LEFT CONTENT --}}
        <div class="lg:col-span-2 space-y-6 sm:space-y-8">

            {{-- PROPERTY INFORMATION --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-5 sm:px-8 py-5 sm:py-6 border-b">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        🏠 Property Information
                    </h2>

                    <p class="text-gray-500 text-sm sm:text-base mt-1">
                        Details about this accommodation listing
                    </p>

                </div>

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-8">

                        {{-- LANDLORD --}}
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                            <p class="text-xs sm:text-sm text-gray-400">
                                Landlord
                            </p>

                            <p class="font-semibold text-slate-800 mt-1 break-words">
                                {{ $accommodation->owner?->name ?? 'N/A' }}
                            </p>

                        </div>


                        {{-- UNIVERSITY --}}
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                            <p class="text-xs sm:text-sm text-gray-400">
                                University
                            </p>

                            <p class="font-semibold text-slate-800 mt-1 break-words">
                                {{ $accommodation->university?->name ?? 'N/A' }}
                            </p>

                        </div>


                        {{-- PROPERTY TYPE --}}
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                            <p class="text-xs sm:text-sm text-gray-400">
                                Property Type
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ ucfirst($accommodation->property_type) }}
                            </p>

                        </div>


                        {{-- LISTING TYPE --}}
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                            <p class="text-xs sm:text-sm text-gray-400">
                                Listing Type
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ ucfirst($accommodation->listing_type) }}
                            </p>

                        </div>


                        {{-- LOCATION --}}
                        <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 sm:col-span-2">

                            <p class="text-xs sm:text-sm text-gray-400">
                                Location
                            </p>

                            <p class="font-semibold text-slate-800 mt-1 break-words">
                                {{ $accommodation->location }}
                            </p>

                        </div>


                        {{-- PRICE --}}
                        <div class="bg-green-50 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                            <p class="text-xs sm:text-sm text-green-600">
                                Price
                            </p>

                            <p class="font-bold text-xl sm:text-2xl text-green-700 mt-1">
                                KSh {{ number_format($accommodation->price) }}
                            </p>

                        </div>


                        {{-- AVAILABILITY --}}
                        <div class="bg-blue-50 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                            <p class="text-xs sm:text-sm text-blue-600">
                                Availability
                            </p>

                            <p class="font-semibold text-slate-800 mt-1">
                                {{ $accommodation->available ? 'Available' : 'Not Available' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- DESCRIPTION --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-5 sm:px-8 py-5 sm:py-6 border-b">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        📝 Description
                    </h2>

                    <p class="text-gray-500 text-sm sm:text-base mt-1">
                        Description provided by the landlord
                    </p>

                </div>

                <div class="p-5 sm:p-8">

                    <div class="bg-slate-50 rounded-xl sm:rounded-2xl p-5 sm:p-6">

                        <p class="text-gray-700 leading-7 sm:leading-8 text-sm sm:text-base whitespace-pre-line break-words">
                            {{ $accommodation->description ?: 'No description provided.' }}
                        </p>

                    </div>

                </div>

            </div>


            {{-- CONTACT INFORMATION --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-5 sm:px-8 py-5 sm:py-6 border-b">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        📞 Contact Information
                    </h2>

                    <p class="text-gray-500 text-sm sm:text-base mt-1">
                        Contact details provided for this listing
                    </p>

                </div>

                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6">

                        {{-- PHONE --}}
                        <a href="tel:{{ $accommodation->phone }}"
                           class="bg-green-50 border border-green-100 rounded-xl sm:rounded-2xl p-5 hover:bg-green-100 transition">

                            <p class="text-sm text-green-600">
                                Phone
                            </p>

                            <p class="font-bold text-green-700 mt-1 break-all">
                                📞 {{ $accommodation->phone ?: 'N/A' }}
                            </p>

                        </a>


                        {{-- WHATSAPP --}}
                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $accommodation->whatsapp ?? '') }}"
                            target="_blank"
                            class="bg-emerald-50 border border-emerald-100 rounded-xl sm:rounded-2xl p-5 hover:bg-emerald-100 transition">

                            <p class="text-sm text-emerald-600">
                                WhatsApp
                            </p>

                            <p class="font-bold text-emerald-700 mt-1 break-all">
                                💬 {{ $accommodation->whatsapp ?: 'N/A' }}
                            </p>

                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6 sm:space-y-8">

            {{-- STATISTICS --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-5 sm:px-8 py-5 sm:py-6 border-b">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        📊 Listing Statistics
                    </h2>

                </div>

                <div class="grid grid-cols-2 gap-3 sm:gap-4 p-5 sm:p-8">

                    <div class="bg-blue-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 text-center">

                        <div class="text-3xl sm:text-4xl">
                            👁
                        </div>

                        <div class="text-xl sm:text-2xl font-bold mt-2">
                            {{ number_format($accommodation->views) }}
                        </div>

                        <div class="text-xs sm:text-sm text-gray-500 mt-1">
                            Views
                        </div>

                    </div>


                    <div class="bg-purple-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 text-center">

                        <div class="text-3xl sm:text-4xl">
                            📅
                        </div>

                        <div class="text-lg sm:text-xl font-bold mt-2">
                            {{ number_format($accommodation->bookings) }}
                        </div>

                        <div class="text-xs sm:text-sm text-gray-500 mt-1">
                            Bookings
                        </div>

                    </div>


                    <div class="bg-green-50 rounded-xl sm:rounded-2xl p-4 sm:p-5 text-center col-span-2">

                        <div class="text-3xl sm:text-4xl">
                            💰
                        </div>

                        <div class="text-xl sm:text-2xl font-bold text-green-700 mt-2">
                            KSh {{ number_format($accommodation->total_revenue) }}
                        </div>

                        <div class="text-xs sm:text-sm text-gray-500 mt-1">
                            Total Revenue
                        </div>

                    </div>

                </div>

            </div>


            {{-- TIMELINE --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-5 sm:px-8 py-5 sm:py-6 border-b">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        📅 Activity
                    </h2>

                </div>

                <div class="p-5 sm:p-8 space-y-6">

                    <div class="flex gap-4">

                        <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 rounded-full bg-blue-100 flex items-center justify-center">
                            🏠
                        </div>

                        <div class="min-w-0">

                            <p class="font-semibold text-slate-800">
                                Listing Created
                            </p>

                            <p class="text-xs sm:text-sm text-gray-500 mt-1 break-words">
                                {{ $accommodation->created_at->format('d M Y • h:i A') }}
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 rounded-full bg-green-100 flex items-center justify-center">
                            🔄
                        </div>

                        <div class="min-w-0">

                            <p class="font-semibold text-slate-800">
                                Last Updated
                            </p>

                            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                                {{ $accommodation->updated_at->diffForHumans() }}
                            </p>

                        </div>

                    </div>


                    <div class="flex gap-4">

                        <div class="w-10 h-10 sm:w-12 sm:h-12 flex-shrink-0 rounded-full bg-purple-100 flex items-center justify-center">
                            📌
                        </div>

                        <div class="min-w-0">

                            <p class="font-semibold text-slate-800">
                                Current Status
                            </p>

                            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                                {{ $accommodation->status ?? ($accommodation->verified ? 'Approved' : 'Pending') }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ADMIN ACTIONS --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-5 sm:px-8 py-5 sm:py-6 border-b">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        ⚡ Admin Actions
                    </h2>

                </div>

                <div class="p-5 sm:p-8 space-y-3">

                    <a href="{{ route('admin.accommodations') }}"
                       class="block w-full text-center bg-slate-600 hover:bg-slate-700 text-white px-5 py-3.5 rounded-xl font-semibold transition">

                        ← Back to Accommodations

                    </a>


                    @if($accommodation->status !== 'Approved' && !$accommodation->verified)

                        <form method="POST"
                              action="{{ route('admin.accommodations.approve', $accommodation) }}">

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                onclick="return confirm('Approve this accommodation?')"
                                class="w-full bg-green-600 hover:bg-green-700 text-white px-5 py-3.5 rounded-xl font-semibold transition">

                                ✓ Approve Accommodation

                            </button>

                        </form>

                    @endif


                    @if($accommodation->status !== 'Rejected')

                        <form method="POST"
                              action="{{ route('admin.accommodations.reject', $accommodation) }}">

                            @csrf
                            @method('PATCH')

                            <button
                                type="submit"
                                onclick="return confirm('Reject this accommodation?')"
                                class="w-full bg-red-600 hover:bg-red-700 text-white px-5 py-3.5 rounded-xl font-semibold transition">

                                ✕ Reject Accommodation

                            </button>

                        </form>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection