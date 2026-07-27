<x-app-layout>
<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100 py-10">

    <div class="max-w-6xl mx-auto px-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-5xl font-extrabold text-slate-800">
                    🔔 Notifications
                </h1>

                <p class="text-gray-500 mt-2">
                    Stay updated with everything happening in your business.
                </p>
            </div>

            <a href="{{ route('business.dashboard') }}"
               class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl shadow">
                ← Dashboard
            </a>

        </div>

        <!-- Filters -->

        <div class="flex gap-3 mb-8">

            <button class="bg-sky-600 text-white px-5 py-2 rounded-full">
                All
            </button>

            <button class="bg-white px-5 py-2 rounded-full shadow">
                Unread
            </button>

            <button class="bg-white px-5 py-2 rounded-full shadow">
                Messages
            </button>

            <button class="bg-white px-5 py-2 rounded-full shadow">
                Reviews
            </button>

            <button class="bg-white px-5 py-2 rounded-full shadow">
                Products
            </button>

            <button class="bg-white px-5 py-2 rounded-full shadow">
                Ads
            </button>

        </div>

        @if($notifications->isEmpty())

<div class="bg-white rounded-3xl shadow-xl p-20 text-center">

    <div class="text-7xl mb-6">
        🔔
    </div>

    <h2 class="text-3xl font-bold text-slate-800">
        You're all caught up!
    </h2>

    <p class="text-gray-500 mt-4 text-lg">
        You don't have any business notifications yet.
    </p>

</div>

@else

<div class="space-y-5">

@foreach($notifications as $notification)

<div class="bg-white rounded-2xl shadow-lg p-6 border-l-4
    {{ $notification->is_read ? 'border-gray-300' : 'border-sky-500' }}">

    <div class="flex justify-between items-start">

        <div>

            <h3 class="text-xl font-bold text-slate-800">
                {{ $notification->title }}
            </h3>

            <p class="text-gray-600 mt-2">
                {{ $notification->message }}
            </p>

        </div>

        @if(!$notification->is_read)

            <span class="bg-sky-100 text-sky-700 px-3 py-1 rounded-full text-sm font-semibold">
                New
            </span>

        @endif

    </div>

    <div class="text-sm text-gray-400 mt-4">
        {{ $notification->created_at->diffForHumans() }}
    </div>

</div>

@endforeach

</div>

@endif

    </div>

</div>
</x-app-layout>