<x-app-layout>

    <div class="max-w-6xl mx-auto py-10 px-4">

        {{-- HEADER --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">

            <div>

                <h1 class="text-4xl font-bold text-slate-800">
                    🔔 Notifications
                </h1>

                <p class="text-gray-500 mt-2">
                    Stay updated with what's happening on CampusConnect.
                </p>

            </div>

            @if($notifications->where('is_read', false)->count() > 0)

                <form
                    action="{{ route('notifications.readAll') }}"
                    method="POST"
                >

                    @csrf
                    @method('PATCH')

                    <button
                        type="submit"
                        class="px-5 py-3 bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition"
                    >
                        Mark all as read
                    </button>

                </form>

            @endif

        </div>


        {{-- NOTIFICATIONS --}}
        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            @forelse($notifications as $notification)

                <div
                    class="
                        p-6
                        border-b
                        last:border-b-0
                        transition
                        {{ $notification->is_read
                            ? 'bg-white'
                            : 'bg-blue-50'
                        }}
                    "
                >

                    <div class="flex items-start gap-4">

                        {{-- ICON --}}
                        <div
                            class="
                                w-12 h-12
                                rounded-2xl
                                flex items-center justify-center
                                text-xl
                                shrink-0
                                {{ $notification->is_read
                                    ? 'bg-gray-100'
                                    : 'bg-blue-100'
                                }}
                            "
                        >

                            @switch($notification->type)

                                @case('booking')
                                    🏠
                                    @break

                                @case('business')
                                    🏪
                                    @break

                                @case('announcement')
                                    📢
                                    @break

                                @case('note')
                                    📚
                                    @break

                                @case('message')
                                    💬
                                    @break

                                @case('system')
                                    ⚙️
                                    @break

                                @default
                                    🔔

                            @endswitch

                        </div>


                        {{-- CONTENT --}}
                        <div class="flex-1 min-w-0">

                            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-2">

                                <div>

                                    <h2
                                        class="
                                            font-bold
                                            text-lg
                                            {{ $notification->is_read
                                                ? 'text-slate-700'
                                                : 'text-slate-900'
                                            }}
                                        "
                                    >
                                        {{ $notification->title }}
                                    </h2>

                                    <p class="text-gray-600 mt-2">
                                        {{ $notification->message }}
                                    </p>

                                </div>

                                <span class="text-sm text-gray-400 whitespace-nowrap">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>

                            </div>


                            {{-- ACTIONS --}}
                            <div class="flex flex-wrap items-center gap-3 mt-4">

                                @if($notification->link)

                                    <form
                                        action="{{ route('notifications.read', $notification) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="text-sm font-semibold text-blue-600 hover:text-blue-800"
                                        >
                                            View →
                                        </button>

                                    </form>

                                @elseif(!$notification->is_read)

                                    <form
                                        action="{{ route('notifications.read', $notification) }}"
                                        method="POST"
                                    >

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="text-sm font-semibold text-blue-600 hover:text-blue-800"
                                        >
                                            Mark as read
                                        </button>

                                    </form>

                                @endif


                                <form
                                    action="{{ route('notifications.destroy', $notification) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this notification?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="text-sm font-semibold text-red-500 hover:text-red-700"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="py-20 text-center">

                    <div class="text-7xl mb-4">
                        🎉
                    </div>

                    <h2 class="text-3xl font-bold text-slate-800">
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