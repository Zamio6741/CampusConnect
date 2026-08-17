@extends('layouts.admin')

@section('title', 'Business Details')

@section('content')

<div class="w-full max-w-7xl mx-auto px-3 sm:px-5 lg:px-6 py-4 sm:py-6 lg:py-8">

    {{-- =========================================================
         HERO
    ========================================================== --}}

    <div class="relative overflow-hidden rounded-2xl sm:rounded-3xl
                bg-gradient-to-r from-sky-600 via-blue-700 to-indigo-700
                shadow-2xl">

        {{-- Cover Image --}}
        <div class="absolute inset-0 opacity-10">

            @if($business->cover_image)

                <img
                    src="{{ asset('storage/'.$business->cover_image) }}"
                    class="w-full h-full object-cover"
                    alt="Business Cover">

            @endif

        </div>


        <div class="relative p-5 sm:p-7 lg:p-10">

            <div class="flex flex-col lg:flex-row
                        justify-between
                        items-center
                        lg:items-center
                        gap-7 lg:gap-8">


                {{-- BUSINESS IDENTITY --}}
                <div class="w-full flex flex-col sm:flex-row
                            items-center sm:items-center
                            gap-5 sm:gap-7 lg:gap-8
                            text-center sm:text-left">

                    {{-- Logo --}}
                    <div class="flex-shrink-0">

                        @if($business->logo)

                            <img
                                src="{{ asset('storage/'.$business->logo) }}"
                                alt="{{ $business->business_name }}"
                                class="w-24 h-24
                                       sm:w-28 sm:h-28
                                       lg:w-36 lg:h-36
                                       rounded-2xl lg:rounded-3xl
                                       bg-white
                                       object-cover
                                       shadow-xl
                                       border-4 border-white">

                        @else

                            <div
                                class="w-24 h-24
                                       sm:w-28 sm:h-28
                                       lg:w-36 lg:h-36
                                       rounded-2xl lg:rounded-3xl
                                       bg-white
                                       flex items-center justify-center
                                       text-4xl
                                       sm:text-5xl
                                       lg:text-6xl
                                       shadow-xl">

                                🏪

                            </div>

                        @endif

                    </div>


                    {{-- Business Name --}}
                    <div class="min-w-0">

                        <p class="uppercase
                                  tracking-widest
                                  text-sky-100
                                  text-xs
                                  sm:text-sm">

                            CampusConnect Business

                        </p>


                        <h1
                            class="text-2xl
                                   sm:text-3xl
                                   md:text-4xl
                                   lg:text-5xl
                                   font-bold
                                   text-white
                                   mt-2
                                   break-words">

                            {{ $business->business_name }}

                        </h1>


                        <p
                            class="text-sky-100
                                   text-base
                                   sm:text-lg
                                   lg:text-xl
                                   mt-2">

                            {{ $business->category }}

                        </p>


                        {{-- Stats --}}
                        <div
                            class="flex flex-wrap
                                   justify-center
                                   sm:justify-start
                                   gap-2 sm:gap-3
                                   mt-5">

                            <span
                                class="bg-white/20
                                       backdrop-blur
                                       text-white
                                       px-3 sm:px-5
                                       py-2
                                       rounded-full
                                       text-xs sm:text-sm">

                                👀 {{ number_format($business->views) }} Views

                            </span>


                            <span
                                class="bg-yellow-400
                                       text-black
                                       px-3 sm:px-5
                                       py-2
                                       rounded-full
                                       font-semibold
                                       text-xs sm:text-sm">

                                ⭐ {{ number_format($business->rating,1) }}

                            </span>


                            @if($business->featured)

                                <span
                                    class="bg-pink-500
                                           text-white
                                           px-3 sm:px-5
                                           py-2
                                           rounded-full
                                           text-xs sm:text-sm">

                                    🔥 Featured

                                </span>

                            @endif

                        </div>

                    </div>

                </div>


                {{-- STATUS --}}
                <div class="flex-shrink-0">

                    @if($business->status == 'Approved')

                        <span
                            class="inline-flex
                                   items-center
                                   justify-center
                                   bg-green-500
                                   text-white
                                   px-5 sm:px-8
                                   py-3 sm:py-4
                                   rounded-full
                                   text-sm sm:text-lg
                                   shadow-lg
                                   whitespace-nowrap">

                            ✅ Approved

                        </span>

                    @elseif($business->status == 'Rejected')

                        <span
                            class="inline-flex
                                   items-center
                                   justify-center
                                   bg-red-500
                                   text-white
                                   px-5 sm:px-8
                                   py-3 sm:py-4
                                   rounded-full
                                   text-sm sm:text-lg
                                   shadow-lg
                                   whitespace-nowrap">

                            ❌ Rejected

                        </span>

                    @else

                        <span
                            class="inline-flex
                                   items-center
                                   justify-center
                                   bg-yellow-400
                                   text-black
                                   px-5 sm:px-8
                                   py-3 sm:py-4
                                   rounded-full
                                   text-sm sm:text-lg
                                   shadow-lg
                                   whitespace-nowrap">

                            ⏳ Pending Review

                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         DASHBOARD
    ========================================================== --}}

    <div class="grid grid-cols-1 lg:grid-cols-3
                gap-5 sm:gap-6 lg:gap-8
                mt-5 sm:mt-8">


        {{-- =====================================================
             LEFT CONTENT
        ====================================================== --}}

        <div class="lg:col-span-2 space-y-5 sm:space-y-8">


            {{-- =================================================
                 BUSINESS INFORMATION
            ================================================== --}}

            <div class="bg-white rounded-2xl sm:rounded-3xl
                        shadow-xl overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold text-slate-800">

                        📋 Business Information

                    </h2>

                    <p class="text-gray-500 mt-1 text-sm sm:text-base">

                        Registered business profile

                    </p>

                </div>


                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-8">


                        {{-- Owner --}}
                        <div class="min-w-0">

                            <p class="text-gray-400 text-sm">
                                Owner
                            </p>

                            <p class="text-lg sm:text-xl
                                      font-semibold
                                      mt-2
                                      break-words">

                                {{ $business->user?->name ?? 'Unknown' }}

                            </p>

                        </div>


                        {{-- University --}}
                        <div class="min-w-0">

                            <p class="text-gray-400 text-sm">
                                University
                            </p>

                            <p class="text-lg sm:text-xl
                                      font-semibold
                                      mt-2
                                      break-words">

                                {{ $business->university?->name ?? 'N/A' }}

                            </p>

                        </div>


                        {{-- Phone --}}
                        <div class="min-w-0">

                            <p class="text-gray-400 text-sm">
                                Phone
                            </p>

                            <p class="text-base sm:text-lg
                                      mt-2
                                      break-all">

                                {{ $business->phone ?? 'N/A' }}

                            </p>

                        </div>


                        {{-- WhatsApp --}}
                        <div class="min-w-0">

                            <p class="text-gray-400 text-sm">
                                WhatsApp
                            </p>

                            <p class="text-base sm:text-lg
                                      mt-2
                                      break-all">

                                {{ $business->whatsapp ?? 'N/A' }}

                            </p>

                        </div>


                        {{-- Email --}}
                        <div class="min-w-0">

                            <p class="text-gray-400 text-sm">
                                Email
                            </p>

                            <p class="text-base sm:text-lg
                                      mt-2
                                      break-all">

                                {{ $business->email ?? 'N/A' }}

                            </p>

                        </div>


                        {{-- Location --}}
                        <div class="min-w-0">

                            <p class="text-gray-400 text-sm">
                                Location
                            </p>

                            <p class="text-base sm:text-lg
                                      mt-2
                                      break-words">

                                {{ $business->location ?? 'N/A' }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 DESCRIPTION
            ================================================== --}}

            <div class="bg-white rounded-2xl sm:rounded-3xl
                        shadow-xl overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold text-slate-800">

                        📝 About This Business

                    </h2>

                    <p class="text-gray-500 mt-1 text-sm sm:text-base">

                        Description submitted by the business owner

                    </p>

                </div>


                <div class="p-5 sm:p-8">

                    <p class="leading-7 sm:leading-8
                              text-gray-700
                              text-base sm:text-lg
                              break-words">

                        {{ $business->description ?: 'No description provided.' }}

                    </p>

                </div>

            </div>



            {{-- =================================================
                 CONTACT + ONLINE PRESENCE
            ================================================== --}}

            <div class="bg-white rounded-2xl sm:rounded-3xl
                        shadow-xl overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold text-slate-800">

                        🌐 Contact & Online Presence

                    </h2>

                    <p class="text-gray-500 mt-1 text-sm sm:text-base">

                        Ways students can reach this business

                    </p>

                </div>


                <div class="p-5 sm:p-8">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">


                        {{-- Website --}}
                        @if($business->website)

                            <a
                                href="{{ $business->website }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-between
                                       gap-4
                                       rounded-2xl
                                       bg-slate-50
                                       hover:bg-sky-50
                                       border
                                       p-4 sm:p-5
                                       transition">

                                <div class="min-w-0">

                                    <h4 class="font-bold">
                                        🌍 Website
                                    </h4>

                                    <p class="text-sm
                                              text-gray-500
                                              mt-1
                                              break-all">

                                        Visit Official Website

                                    </p>

                                </div>

                                <span class="flex-shrink-0">
                                    ↗
                                </span>

                            </a>

                        @endif


                        {{-- Facebook --}}
                        @if($business->facebook)

                            <a
                                href="{{ $business->facebook }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-between
                                       gap-4
                                       rounded-2xl
                                       bg-slate-50
                                       hover:bg-blue-50
                                       border
                                       p-4 sm:p-5
                                       transition">

                                <div class="min-w-0">

                                    <h4 class="font-bold">
                                        📘 Facebook
                                    </h4>

                                    <p class="text-sm
                                              text-gray-500
                                              mt-1">

                                        Open Facebook Page

                                    </p>

                                </div>

                                <span class="flex-shrink-0">
                                    ↗
                                </span>

                            </a>

                        @endif


                        {{-- Instagram --}}
                        @if($business->instagram)

                            <a
                                href="{{ $business->instagram }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-between
                                       gap-4
                                       rounded-2xl
                                       bg-slate-50
                                       hover:bg-pink-50
                                       border
                                       p-4 sm:p-5
                                       transition">

                                <div class="min-w-0">

                                    <h4 class="font-bold">
                                        📷 Instagram
                                    </h4>

                                    <p class="text-sm
                                              text-gray-500
                                              mt-1">

                                        View Instagram

                                    </p>

                                </div>

                                <span class="flex-shrink-0">
                                    ↗
                                </span>

                            </a>

                        @endif


                        {{-- TikTok --}}
                        @if($business->tiktok)

                            <a
                                href="{{ $business->tiktok }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="flex items-center justify-between
                                       gap-4
                                       rounded-2xl
                                       bg-slate-50
                                       hover:bg-gray-100
                                       border
                                       p-4 sm:p-5
                                       transition">

                                <div class="min-w-0">

                                    <h4 class="font-bold">
                                        🎵 TikTok
                                    </h4>

                                    <p class="text-sm
                                              text-gray-500
                                              mt-1">

                                        Watch TikTok

                                    </p>

                                </div>

                                <span class="flex-shrink-0">
                                    ↗
                                </span>

                            </a>

                        @endif


                        {{-- Call --}}
                        <a
                            href="tel:{{ $business->phone }}"
                            class="flex items-center justify-between
                                   gap-4
                                   rounded-2xl
                                   bg-green-50
                                   border border-green-100
                                   p-4 sm:p-5">

                            <div class="min-w-0">

                                <h4 class="font-bold text-green-700">
                                    📞 Call Business
                                </h4>

                                <p class="text-sm
                                          text-green-600
                                          mt-1
                                          break-all">

                                    {{ $business->phone }}

                                </p>

                            </div>

                        </a>


                        {{-- WhatsApp --}}
                        <a
                            href="https://wa.me/{{ preg_replace('/[^0-9]/','',$business->whatsapp) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex items-center justify-between
                                   gap-4
                                   rounded-2xl
                                   bg-emerald-50
                                   border border-emerald-100
                                   p-4 sm:p-5">

                            <div>

                                <h4 class="font-bold text-emerald-700">
                                    💬 WhatsApp
                                </h4>

                                <p class="text-sm
                                          text-emerald-600
                                          mt-1">

                                    Chat Instantly

                                </p>

                            </div>

                        </a>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 BUSINESS GALLERY
            ================================================== --}}

            <div class="bg-white rounded-2xl sm:rounded-3xl
                        shadow-xl overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold">

                        🖼 Business Gallery

                    </h2>

                    <p class="text-gray-500 mt-1 text-sm sm:text-base">

                        Images uploaded by the business owner

                    </p>

                </div>


                <div class="p-5 sm:p-8">

                    @if($business->images->count())

                        <div
                            class="grid
                                   grid-cols-2
                                   sm:grid-cols-3
                                   lg:grid-cols-4
                                   gap-3
                                   sm:gap-5
                                   lg:gap-6">

                            @foreach($business->images as $image)

                                <div
                                    class="relative
                                           group
                                           overflow-hidden
                                           rounded-xl
                                           sm:rounded-2xl
                                           shadow-lg">

                                    <img
                                        src="{{ asset('storage/'.$image->image) }}"
                                        alt="Business Image"
                                        class="w-full
                                               h-32
                                               sm:h-40
                                               md:h-48
                                               lg:h-52
                                               object-cover
                                               transition
                                               duration-300
                                               group-hover:scale-110">


                                    @if($image->cover)

                                        <div
                                            class="absolute
                                                   top-2
                                                   left-2
                                                   sm:top-3
                                                   sm:left-3
                                                   bg-green-600
                                                   text-white
                                                   px-2
                                                   sm:px-3
                                                   py-1
                                                   rounded-full
                                                   text-[10px]
                                                   sm:text-xs
                                                   font-semibold
                                                   shadow">

                                            ⭐ Cover

                                        </div>

                                    @endif

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div
                            class="grid
                                   grid-cols-2
                                   md:grid-cols-4
                                   gap-3
                                   sm:gap-5">

                            @for($i = 0; $i < 4; $i++)

                                <div
                                    class="aspect-square
                                           rounded-xl
                                           sm:rounded-2xl
                                           bg-slate-100
                                           flex items-center justify-center
                                           text-3xl
                                           sm:text-5xl
                                           text-gray-400">

                                    📷

                                </div>

                            @endfor

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- =====================================================
             RIGHT SIDEBAR
        ====================================================== --}}

        <div class="space-y-5 sm:space-y-8">


            {{-- =================================================
                 ADMIN INSIGHTS
            ================================================== --}}

            <div class="bg-white
                        rounded-2xl sm:rounded-3xl
                        shadow-xl
                        overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold text-slate-800">

                        📊 Admin Insights

                    </h2>

                </div>


                <div class="grid grid-cols-2 gap-3 sm:gap-4 p-5 sm:p-8">

                    {{-- Views --}}
                    <div class="bg-blue-50 rounded-xl sm:rounded-2xl
                                p-4 sm:p-5 text-center">

                        <div class="text-2xl sm:text-4xl">
                            👁
                        </div>

                        <div class="text-2xl sm:text-3xl
                                    font-bold mt-2 sm:mt-3">

                            {{ number_format($business->views) }}

                        </div>

                        <div class="text-gray-500 mt-1 sm:mt-2 text-sm">
                            Views
                        </div>

                    </div>


                    {{-- Rating --}}
                    <div class="bg-yellow-50
                                rounded-xl sm:rounded-2xl
                                p-4 sm:p-5
                                text-center">

                        <div class="text-2xl sm:text-4xl">
                            ⭐
                        </div>

                        <div class="text-2xl sm:text-3xl
                                    font-bold mt-2 sm:mt-3">

                            {{ number_format($business->rating,1) }}

                        </div>

                        <div class="text-gray-500 mt-1 sm:mt-2 text-sm">
                            Rating
                        </div>

                    </div>


                    {{-- Featured --}}
                    <div class="bg-green-50
                                rounded-xl sm:rounded-2xl
                                p-4 sm:p-5
                                text-center">

                        <div class="text-2xl sm:text-4xl">
                            🏆
                        </div>

                        <div class="text-lg sm:text-xl
                                    font-bold mt-2 sm:mt-3">

                            {{ $business->featured ? 'YES' : 'NO' }}

                        </div>

                        <div class="text-gray-500 mt-1 sm:mt-2 text-sm">
                            Featured
                        </div>

                    </div>


                    {{-- Created --}}
                    <div class="bg-indigo-50
                                rounded-xl sm:rounded-2xl
                                p-4 sm:p-5
                                text-center">

                        <div class="text-2xl sm:text-4xl">
                            📅
                        </div>

                        <div class="font-bold
                                    mt-2 sm:mt-3
                                    text-sm sm:text-base">

                            {{ $business->created_at->format('d M Y') }}

                        </div>

                        <div class="text-gray-500 mt-1 sm:mt-2 text-sm">
                            Created
                        </div>

                    </div>

                </div>

            </div>



            {{-- =================================================
                 QUICK ACTIONS
            ================================================== --}}

            <div class="bg-white
                        rounded-2xl sm:rounded-3xl
                        shadow-xl
                        overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold">

                        ⚡ Quick Actions

                    </h2>

                </div>


                <div class="space-y-3 sm:space-y-4 p-5 sm:p-8">


                    {{-- Approve --}}
                    <form
                        action="{{ route('admin.businesses.approve',$business) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                            class="w-full
                                   py-3.5 sm:py-4
                                   rounded-xl sm:rounded-2xl
                                   bg-green-600
                                   hover:bg-green-700
                                   text-white
                                   font-semibold
                                   transition">

                            ✅ Approve Business

                        </button>

                    </form>


                    {{-- Reject --}}
                    <form
                        action="{{ route('admin.businesses.reject',$business) }}"
                        method="POST">

                        @csrf
                        @method('PATCH')

                        <button
                            class="w-full
                                   py-3.5 sm:py-4
                                   rounded-xl sm:rounded-2xl
                                   bg-red-600
                                   hover:bg-red-700
                                   text-white
                                   font-semibold
                                   transition">

                            ❌ Reject Business

                        </button>

                    </form>


                    {{-- Back --}}
                    <a
                        href="{{ route('admin.businesses') }}"
                        class="block
                               text-center
                               py-3.5 sm:py-4
                               rounded-xl sm:rounded-2xl
                               bg-sky-600
                               hover:bg-sky-700
                               text-white
                               font-semibold
                               transition">

                        ← Back to Businesses

                    </a>

                </div>

            </div>



            {{-- =================================================
                 ACTIVITY TIMELINE
            ================================================== --}}

            <div class="bg-white
                        rounded-2xl sm:rounded-3xl
                        shadow-xl
                        overflow-hidden">

                <div
                    class="bg-gradient-to-r
                           from-slate-50 to-slate-100
                           px-5 sm:px-8
                           py-5 sm:py-6
                           border-b">

                    <h2 class="text-xl sm:text-2xl
                               font-bold">

                        📅 Activity Timeline

                    </h2>

                </div>


                <div class="p-5 sm:p-8 space-y-6 sm:space-y-8">


                    {{-- Registered --}}
                    <div class="flex gap-3 sm:gap-4">

                        <div
                            class="w-10 h-10
                                   sm:w-12 sm:h-12
                                   flex-shrink-0
                                   rounded-full
                                   bg-blue-100
                                   flex items-center
                                   justify-center">

                            🏪

                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold">
                                Business Registered
                            </div>

                            <div class="text-gray-500
                                        text-sm
                                        mt-1">

                                {{ $business->created_at->format('d M Y • h:i A') }}

                            </div>

                        </div>

                    </div>


                    {{-- Updated --}}
                    <div class="flex gap-3 sm:gap-4">

                        <div
                            class="w-10 h-10
                                   sm:w-12 sm:h-12
                                   flex-shrink-0
                                   rounded-full
                                   bg-green-100
                                   flex items-center
                                   justify-center">

                            🔄

                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold">
                                Last Updated
                            </div>

                            <div class="text-gray-500
                                        text-sm
                                        mt-1">

                                {{ $business->updated_at->diffForHumans() }}

                            </div>

                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="flex gap-3 sm:gap-4">

                        <div
                            class="w-10 h-10
                                   sm:w-12 sm:h-12
                                   flex-shrink-0
                                   rounded-full
                                   bg-purple-100
                                   flex items-center
                                   justify-center">

                            📌

                        </div>

                        <div class="min-w-0">

                            <div class="font-semibold">
                                Current Status
                            </div>

                            <div class="text-gray-500
                                        text-sm
                                        mt-1">

                                {{ $business->status }}

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection