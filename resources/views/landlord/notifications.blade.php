<x-app-layout>

<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-4xl font-bold text-slate-800 mb-2">
        🔔 Notifications
    </h1>

    <p class="text-gray-500 mb-8">
        All your recent landlord notifications.
    </p>

    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        @forelse($notifications ?? [] as $notification)

            <div class="p-6 border-b">

                <div class="flex justify-between">

                    <div>

                        <h2 class="font-bold text-lg">

                            {{ $notification->title }}

                        </h2>

                        <p class="text-gray-600 mt-2">

                            {{ $notification->message }}

                        </p>

                    </div>

                    <div class="text-sm text-gray-400">

                        {{ $notification->created_at->diffForHumans() }}

                    </div>

                </div>

            </div>

        @empty

            <div class="py-20 text-center">

                <div class="text-7xl mb-4">
                    🎉
                </div>

                <h2 class="text-3xl font-bold">
                    You're all caught up
                </h2>

                <p class="text-gray-500 mt-3">
                    No notifications available.
                </p>

            </div>

        @endforelse

    </div>

</div>

</x-app-layout>