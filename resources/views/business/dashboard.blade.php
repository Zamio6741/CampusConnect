<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="flex">

        <!-- ===================== SIDEBAR ===================== -->

        <aside class="w-72 min-h-screen bg-white shadow-2xl">

            <!-- Logo -->

            <div class="h-24 flex items-center justify-center border-b">

                <h1 class="text-3xl font-extrabold text-sky-700">

                    CampusConnect

                </h1>

            </div>

            <!-- User -->

            <div class="py-8 text-center border-b">

                <div class="w-24 h-24 rounded-full bg-sky-100 mx-auto flex items-center justify-center text-5xl">

                    🏪

                </div>

                <h2 class="mt-5 text-2xl font-bold">

                    {{ auth()->user()->name }}

                </h2>

                <p class="text-gray-500">

                    Business Owner

                </p>

            </div>

            <!-- Menu -->

            <nav class="mt-6 space-y-2">

                <a href="{{ route('business.dashboard') }}"
                   class="flex items-center gap-4 px-8 py-4 bg-sky-600 text-white font-semibold">

                    🏠 Dashboard

                </a>
<a href="{{ route('business.preview', $business) }}"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

    🏪 My Business

</a>

                <a href="{{ route('business.advertisements.index') }}"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

    📢 Advertisements

</a>
                <a href="{{ route('products.index') }}"
                   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">

                    🛍 Products

                </a>

                <a href="#"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">
    📈 Analytics
<a href="{{ route('business.messages') }}"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">
    💬 Messages
</a>

<a href="#"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">
    ⭐ Reviews
</a>
                <a href="#"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">
    🔔 Notifications
</a>

                <a href="#"
   class="flex items-center gap-4 px-8 py-4 hover:bg-slate-100 transition">
    ⚙ Settings
</a>

            </nav>

        </aside>

        <!-- ===================== MAIN CONTENT ===================== -->

        <main class="flex-1">

            <!-- Header -->

            <div class="bg-white shadow-sm">

                <div class="px-12 py-8 flex justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-bold text-slate-800">

                            Business Dashboard

                        </h1>

                        <p class="text-gray-500 mt-2">

                            Welcome back,

                            <span class="font-bold">

                                {{ auth()->user()->name }}

                            </span>

                        </p>

                    </div>

                    <div class="flex items-center gap-4">

                        <span class="bg-yellow-100 text-yellow-700 px-6 py-3 rounded-full font-semibold">

                            ⏳ Pending Approval

                        </span>

                    </div>

                </div>

            </div>

            <!-- Content -->

            <div class="p-10">

                @if(session('success'))

                    <div class="mb-8 bg-green-100 text-green-700 px-6 py-4 rounded-xl">

                        {{ session('success') }}

                    </div>

                @endif

                <!-- Statistics will go here -->
                <!-- ================= Statistics ================= -->

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8 mb-10">

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="flex justify-between items-center">

                            <div>

                                <p class="text-gray-500">

                                    Total Views

                                </p>

                                <h2 class="text-5xl font-extrabold mt-3">

                                    {{ $business->views }}

                                </h2>

                            </div>

                            <div class="text-6xl">

                                👀

                            </div>

                        </div>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="flex justify-between items-center">

                            <div>

                                <p class="text-gray-500">

                                    Rating

                                </p>

                                <h2 class="text-5xl font-extrabold mt-3">

                                    {{ number_format($business->rating,1) }}

                                </h2>

                            </div>

                            <div class="text-6xl text-yellow-400">

                                ⭐

                            </div>

                        </div>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="flex justify-between items-center">

                            <div>

                                <p class="text-gray-500">

                                    Status

                                </p>

                                <h2 class="text-3xl font-bold mt-4 text-sky-700">

                                    {{ $business->status }}

                                </h2>

                            </div>

                            <div class="text-6xl">

                                📢

                            </div>

                        </div>

                    </div>

                    <div class="bg-white rounded-3xl shadow-lg p-8">

                        <div class="flex justify-between items-center">

                            <div>

                                <p class="text-gray-500">

                                    Featured

                                </p>

                                <h2 class="text-3xl font-bold mt-4">

                                    {{ $business->featured ? 'YES' : 'NO' }}

                                </h2>

                            </div>

                            <div class="text-6xl">

                                🚀

                            </div>

                        </div>

                    </div>

                </div>



                 <!-- My Businesses -->

<div class="bg-white rounded-3xl shadow-xl overflow-hidden">

    <div class="flex justify-between items-center px-8 py-6 border-b">

        <h2 class="text-3xl font-bold">
            🏪 My Businesses
        </h2>

        <a href="{{ route('businesses.create') }}"
           class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl font-semibold">

            + Add Business

        </a>

    </div>

   @if($businesses->count())

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

@foreach($businesses as $business)

<div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

    <div class="p-6">

        <div class="flex items-center gap-5">

            @php
    $cover = $business->images()->where('cover', true)->first();
@endphp

@if($cover)

    <img
        src="{{ asset('storage/'.$cover->image) }}"
        class="w-24 h-24 rounded-2xl object-cover border">

@elseif($business->logo)

    <img
        src="{{ asset('storage/'.$business->logo) }}"
        class="w-24 h-24 rounded-2xl object-cover border">

@else
                <div class="w-24 h-24 rounded-2xl bg-sky-100 flex items-center justify-center text-5xl">

                    🏪

                </div>

            @endif

            <div>

                <h2 class="text-2xl font-bold">

                    {{ $business->business_name }}

                </h2>

                <p class="text-gray-500">

                    {{ $business->category }}

                </p>

                <p class="text-sm text-gray-400">

                    {{ $business->location }}

                </p>

            </div>

        </div>

        <div class="grid grid-cols-2 gap-4 mt-8">

            <div class="bg-slate-100 rounded-xl p-4 text-center">

                👀

                <div class="font-bold text-xl">

                    {{ $business->views }}

                </div>

                <div class="text-sm text-gray-500">

                    Views

                </div>

            </div>

            <div class="bg-slate-100 rounded-xl p-4 text-center">

                ⭐

                <div class="font-bold text-xl">

                    {{ number_format($business->rating,1) }}

                </div>

                <div class="text-sm text-gray-500">

                    Rating

                </div>

            </div>

        </div>

        <div class="mt-6">

            @if($business->status=='Approved')

                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                    ✅ Approved

                </span>

            @elseif($business->status=='Rejected')

                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                    ❌ Rejected

                </span>

            @else

                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">

                    ⏳ Pending Review

                </span>

            @endif

        </div>

        <div class="grid grid-cols-2 gap-3 mt-8">

            <a href="{{ route('businesses.edit',$business) }}"
               class="bg-sky-600 text-white py-3 rounded-xl text-center font-semibold">

                ✏ Edit

            </a>

            <a href="{{ route('business.gallery', $business) }}"
                class="bg-orange-500 text-white py-3 rounded-xl text-center font-semibold">
                        🖼 Gallery
            </a>
            
            <form
                action="{{ route('businesses.destroy',$business) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete business?')"
                    class="w-full bg-red-600 text-white py-3 rounded-xl font-semibold">

                    🗑 Delete

                </button>

            </form>

        </div>

    </div>

</div>

@endforeach
@else

<div class="text-center py-20">

    <div class="text-7xl">🏪</div>

    <h2 class="text-3xl font-bold mt-5">
        No businesses yet
    </h2>

    <p class="text-gray-500 mt-3">
        Register your first business.
    </p>

    <a href="{{ route('businesses.create') }}"
       class="inline-block mt-8 bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold">
        Register Business
    </a>

</div>

@endif

</div>

</div>
<!-- ================= Analytics ================= -->

<div class="grid lg:grid-cols-2 gap-8 mt-10">

    <!-- Recent Activity -->

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h2 class="text-2xl font-bold mb-6">

            📋 Recent Activity

        </h2>

        <div class="space-y-5">

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">

                    ✔

                </div>

                <div>

                    <p class="font-semibold">

                        Business Registered

                    </p>

                    <p class="text-gray-500 text-sm">

                        Your business profile has been created successfully.

                    </p>

                </div>

            </div>

            <div class="flex items-start gap-4">

                <div class="w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">

                    ⏳

                </div>

                <div>

                    <p class="font-semibold">

                        Waiting for Approval

                    </p>

                    <p class="text-gray-500 text-sm">

                        Your business is pending administrator approval.

                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Performance -->

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h2 class="text-2xl font-bold mb-6">

            📈 Performance Overview

        </h2>

        <div class="space-y-6">

            <div>

                <div class="flex justify-between">

                    <span>Total Views</span>

                    <span>{{ $business->views }}</span>

                </div>

                <div class="w-full bg-gray-200 rounded-full h-3 mt-2">

                    <div class="bg-sky-600 h-3 rounded-full" style="width:10%"></div>

                </div>

            </div>

            <div>

                <div class="flex justify-between">

                    <span>Business Rating</span>

                    <span>{{ number_format($business->rating,1) }}/5</span>

                </div>

                <div class="w-full bg-gray-200 rounded-full h-3 mt-2">

                    <div class="bg-yellow-400 h-3 rounded-full" style="width:5%"></div>

                </div>

            </div>

            <div>

                <div class="flex justify-between">

                    <span>Profile Completion</span>

                    <span>80%</span>

                </div>

                <div class="w-full bg-gray-200 rounded-full h-3 mt-2">

                    <div class="bg-green-500 h-3 rounded-full" style="width:80%"></div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- ================= Quick Actions ================= -->

<div class="bg-white rounded-3xl shadow-xl mt-10 p-8">

    <h2 class="text-2xl font-bold mb-8">

        ⚡ Quick Actions

    </h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

        <a href="{{ route('businesses.edit',$business) }}"
           class="bg-sky-600 hover:bg-sky-700 text-white rounded-2xl p-6 text-center transition">

            <div class="text-4xl mb-3">✏</div>

            <div class="font-bold">

                Edit Business

            </div>

        </a>

        <a href="{{ route('business.advertisements.index') }}"
   class="bg-orange-500 hover:bg-orange-600 text-white rounded-2xl p-6 text-center transition">

    <div class="text-4xl mb-3">📢</div>

    <div class="font-bold">
        Advertisements
    </div>

<a href="{{ route('business.messages') }}"
   class="bg-green-600 hover:bg-green-700 text-white rounded-2xl p-6 text-center transition">

    <div class="text-4xl mb-3">💬</div>

    <div class="font-bold">
        Messages
    </div>

</a>

<a href="#"
   class="bg-purple-600 hover:bg-purple-700 text-white rounded-2xl p-6 text-center transition">

    <div class="text-4xl mb-3">⭐</div>

    <div class="font-bold">
        Reviews
    </div>

</a>

    </div>

</div>

</div>

</main>

</div>

</div>

</x-app-layout>