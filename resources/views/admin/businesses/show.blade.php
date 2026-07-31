@extends('layouts.admin')

@section('title', 'Business Details')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- HERO --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-sky-600 via-blue-700 to-indigo-700 shadow-2xl">

        <div class="absolute inset-0 opacity-10">

            @if($business->cover_image)
                <img src="{{ asset('storage/'.$business->cover_image) }}"
                     class="w-full h-full object-cover">
            @endif

        </div>

        <div class="relative p-10">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-8">

                <div class="flex items-center gap-8">

                    {{-- Logo --}}
                    @if($business->logo)

                        <img
                            src="{{ asset('storage/'.$business->logo) }}"
                            class="w-36 h-36 rounded-3xl bg-white object-cover shadow-xl border-4 border-white">

                    @else

                        <div
                            class="w-36 h-36 rounded-3xl bg-white flex items-center justify-center text-6xl shadow-xl">

                            🏪

                        </div>

                    @endif

                    {{-- Name --}}
                    <div>

                        <p class="uppercase tracking-widest text-sky-100 text-sm">

                            CampusConnect Business

                        </p>

                        <h1 class="text-5xl font-bold text-white mt-2">

                            {{ $business->business_name }}

                        </h1>

                        <p class="text-sky-100 text-xl mt-2">

                            {{ $business->category }}

                        </p>

                        <div class="flex flex-wrap gap-4 mt-6">

                            <span
                                class="bg-white/20 backdrop-blur text-white px-5 py-2 rounded-full">

                                👀 {{ number_format($business->views) }} Views

                            </span>

                            <span
                                class="bg-yellow-400 text-black px-5 py-2 rounded-full font-semibold">

                                ⭐ {{ number_format($business->rating,1) }}

                            </span>

                            @if($business->featured)

                                <span
                                    class="bg-pink-500 text-white px-5 py-2 rounded-full">

                                    🔥 Featured

                                </span>

                            @endif

                        </div>

                    </div>

                </div>

                {{-- Status --}}
                <div>

                    @if($business->status=='Approved')

                        <span
                            class="bg-green-500 text-white px-8 py-4 rounded-full text-lg shadow-lg">

                            ✅ Approved

                        </span>

                    @elseif($business->status=='Rejected')

                        <span
                            class="bg-red-500 text-white px-8 py-4 rounded-full text-lg shadow-lg">

                            ❌ Rejected

                        </span>

                    @else

                        <span
                            class="bg-yellow-400 text-black px-8 py-4 rounded-full text-lg shadow-lg">

                            ⏳ Pending Review

                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>

    {{-- DASHBOARD --}}
    <div class="grid lg:grid-cols-3 gap-8 mt-8">

        {{-- LEFT --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- BUSINESS INFORMATION --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div
                    class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">

                    <h2 class="text-2xl font-bold text-slate-800">

                        📋 Business Information

                    </h2>

                    <p class="text-gray-500 mt-1">

                        Registered business profile

                    </p>

                </div>

                <div class="p-8">

                    <div class="grid md:grid-cols-2 gap-8">

                        <div>

                            <p class="text-gray-400 text-sm">

                                Owner

                            </p>

                            <p class="text-xl font-semibold mt-2">

                                {{ $business->user?->name }}

                            </p>

                        </div>

                        <div>

                            <p class="text-gray-400 text-sm">

                                University

                            </p>

                            <p class="text-xl font-semibold mt-2">

                                {{ $business->university?->name }}

                            </p>

                        </div>

                        <div>

                            <p class="text-gray-400 text-sm">

                                Phone

                            </p>

                            <p class="text-lg mt-2">

                                {{ $business->phone }}

                            </p>

                        </div>

                        <div>

                            <p class="text-gray-400 text-sm">

                                WhatsApp

                            </p>

                            <p class="text-lg mt-2">

                                {{ $business->whatsapp }}

                            </p>

                        </div>

                        <div>

                            <p class="text-gray-400 text-sm">

                                Email

                            </p>

                            <p class="text-lg mt-2">

                                {{ $business->email }}

                            </p>

                        </div>

                        <div>

                            <p class="text-gray-400 text-sm">

                                Location

                            </p>

                            <p class="text-lg mt-2">

                                {{ $business->location }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>
                        {{-- DESCRIPTION --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">

                    <h2 class="text-2xl font-bold text-slate-800">
                        📝 About This Business
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Description submitted by the business owner
                    </p>

                </div>

                <div class="p-8">

                    <p class="leading-8 text-gray-700 text-lg">

                        {{ $business->description ?: 'No description provided.' }}

                    </p>

                </div>

            </div>


            {{-- CONTACT + ONLINE PRESENCE --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">

                    <h2 class="text-2xl font-bold text-slate-800">

                        🌐 Contact & Online Presence

                    </h2>

                    <p class="text-gray-500 mt-1">

                        Ways students can reach this business

                    </p>

                </div>

                <div class="p-8">

                    <div class="grid md:grid-cols-2 gap-5">

                        @if($business->website)

                            <a href="{{ $business->website }}"
                               target="_blank"
                               class="flex items-center justify-between rounded-2xl bg-slate-50 hover:bg-sky-50 border p-5 transition">

                                <div>

                                    <h4 class="font-bold">
                                        🌍 Website
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Visit Official Website
                                    </p>

                                </div>

                                <span>↗</span>

                            </a>

                        @endif


                        @if($business->facebook)

                            <a href="{{ $business->facebook }}"
                               target="_blank"
                               class="flex items-center justify-between rounded-2xl bg-slate-50 hover:bg-blue-50 border p-5 transition">

                                <div>

                                    <h4 class="font-bold">
                                        📘 Facebook
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Open Facebook Page
                                    </p>

                                </div>

                                <span>↗</span>

                            </a>

                        @endif


                        @if($business->instagram)

                            <a href="{{ $business->instagram }}"
                               target="_blank"
                               class="flex items-center justify-between rounded-2xl bg-slate-50 hover:bg-pink-50 border p-5 transition">

                                <div>

                                    <h4 class="font-bold">
                                        📷 Instagram
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        View Instagram
                                    </p>

                                </div>

                                <span>↗</span>

                            </a>

                        @endif


                        @if($business->tiktok)

                            <a href="{{ $business->tiktok }}"
                               target="_blank"
                               class="flex items-center justify-between rounded-2xl bg-slate-50 hover:bg-gray-100 border p-5 transition">

                                <div>

                                    <h4 class="font-bold">
                                        🎵 TikTok
                                    </h4>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Watch TikTok
                                    </p>

                                </div>

                                <span>↗</span>

                            </a>

                        @endif


                        <a href="tel:{{ $business->phone }}"
                           class="flex items-center justify-between rounded-2xl bg-green-50 border border-green-100 p-5">

                            <div>

                                <h4 class="font-bold text-green-700">

                                    📞 Call Business

                                </h4>

                                <p class="text-sm text-green-600 mt-1">

                                    {{ $business->phone }}

                                </p>

                            </div>

                        </a>


                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$business->whatsapp) }}"
                           target="_blank"
                           class="flex items-center justify-between rounded-2xl bg-emerald-50 border border-emerald-100 p-5">

                            <div>

                                <h4 class="font-bold text-emerald-700">

                                    💬 WhatsApp

                                </h4>

                                <p class="text-sm text-emerald-600 mt-1">

                                    Chat Instantly

                                </p>

                            </div>

                        </a>

                    </div>

                </div>

            </div>


           {{-- BUSINESS GALLERY --}}
<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">

        <h2 class="text-2xl font-bold">
            🖼 Business Gallery
        </h2>

        <p class="text-gray-500 mt-1">
            Images uploaded by the business owner
        </p>

    </div>

    <div class="p-8">

        @if($business->images->count())

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

                @foreach($business->images as $image)

                    <div class="relative group overflow-hidden rounded-2xl shadow-lg">

                        <img
                            src="{{ asset('storage/'.$image->image) }}"
                            alt="Business Image"
                            class="w-full h-52 object-cover transition duration-300 group-hover:scale-110">

                        @if($image->cover)

                            <div class="absolute top-3 left-3 bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold shadow">
                                ⭐ Cover
                            </div>

                        @endif

                    </div>

                @endforeach

            </div>

        @else

            <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                @for($i=0;$i<4;$i++)

                    <div class="aspect-square rounded-2xl bg-slate-100 flex items-center justify-center text-5xl text-gray-400">
                        📷
                    </div>

                @endfor

            </div>

        @endif

    </div>

</div>

        </div>


        {{-- RIGHT SIDEBAR STARTS --}}
        <div class="space-y-8">
            {{-- ADMIN INSIGHTS --}}
<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">
        <h2 class="text-2xl font-bold text-slate-800">
            📊 Admin Insights
        </h2>
    </div>

    <div class="grid grid-cols-2 gap-4 p-8">

        <div class="bg-blue-50 rounded-2xl p-5 text-center">
            <div class="text-4xl">👁</div>
            <div class="text-3xl font-bold mt-3">
                {{ number_format($business->views) }}
            </div>
            <div class="text-gray-500 mt-2">
                Views
            </div>
        </div>

        <div class="bg-yellow-50 rounded-2xl p-5 text-center">
            <div class="text-4xl">⭐</div>
            <div class="text-3xl font-bold mt-3">
                {{ number_format($business->rating,1) }}
            </div>
            <div class="text-gray-500 mt-2">
                Rating
            </div>
        </div>

        <div class="bg-green-50 rounded-2xl p-5 text-center">
            <div class="text-4xl">🏆</div>

            <div class="text-xl font-bold mt-3">
                {{ $business->featured ? 'YES' : 'NO' }}
            </div>

            <div class="text-gray-500 mt-2">
                Featured
            </div>
        </div>

        <div class="bg-indigo-50 rounded-2xl p-5 text-center">
            <div class="text-4xl">📅</div>

            <div class="font-bold mt-3">
                {{ $business->created_at->format('d M Y') }}
            </div>

            <div class="text-gray-500 mt-2">
                Created
            </div>
        </div>

    </div>

</div>


{{-- QUICK ACTIONS --}}
<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">

        <h2 class="text-2xl font-bold">

            ⚡ Quick Actions

        </h2>

    </div>

    <div class="space-y-4 p-8">

        <form action="{{ route('admin.businesses.approve',$business) }}" method="POST">

            @csrf
            @method('PATCH')

            <button
                class="w-full py-4 rounded-2xl bg-green-600 hover:bg-green-700 text-white font-semibold transition">

                ✅ Approve Business

            </button>

        </form>

        <form action="{{ route('admin.businesses.reject',$business) }}" method="POST">

            @csrf
            @method('PATCH')

            <button
                class="w-full py-4 rounded-2xl bg-red-600 hover:bg-red-700 text-white font-semibold transition">

                ❌ Reject Business

            </button>

        </form>

        <a href="{{ route('admin.businesses') }}"
           class="block text-center py-4 rounded-2xl bg-sky-600 hover:bg-sky-700 text-white font-semibold transition">

            ← Back to Businesses

        </a>

    </div>

</div>


{{-- ACTIVITY --}}
<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <div class="bg-gradient-to-r from-slate-50 to-slate-100 px-8 py-6 border-b">

        <h2 class="text-2xl font-bold">

            📅 Activity Timeline

        </h2>

    </div>

    <div class="p-8 space-y-8">

        <div class="flex gap-4">

            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center">

                🏪

            </div>

            <div>

                <div class="font-semibold">

                    Business Registered

                </div>

                <div class="text-gray-500 text-sm">

                    {{ $business->created_at->format('d M Y • h:i A') }}

                </div>

            </div>

        </div>

        <div class="flex gap-4">

            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                🔄

            </div>

            <div>

                <div class="font-semibold">

                    Last Updated

                </div>

                <div class="text-gray-500 text-sm">

                    {{ $business->updated_at->diffForHumans() }}

                </div>

            </div>

        </div>

        <div class="flex gap-4">

            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">

                📌

            </div>

            <div>

                <div class="font-semibold">

                    Current Status

                </div>

                <div class="text-gray-500 text-sm">

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