<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100">

    <div class="max-w-5xl mx-auto px-3 sm:px-5 lg:px-8 py-5 sm:py-8 lg:py-10">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6 sm:mb-8">

            <div class="flex items-center gap-3 min-w-0">

                <div class="w-11 h-11 sm:w-13 sm:h-13 rounded-2xl
                            bg-sky-100 border border-sky-200
                            flex items-center justify-center
                            text-xl sm:text-2xl shrink-0">

                    🔔

                </div>

                <div class="min-w-0">

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl
                               font-extrabold text-slate-800">

                        Notifications

                    </h1>

                    <p class="text-gray-500 text-sm sm:text-base mt-1">

                        Stay updated with everything happening in your business.

                    </p>

                </div>

            </div>


            {{-- Dashboard Button --}}

            <a
                href="{{ route('business.dashboard') }}"
                class="w-full sm:w-auto
                       inline-flex items-center justify-center gap-2
                       bg-sky-600 hover:bg-sky-700
                       active:bg-sky-800
                       text-white
                       px-5 py-2.5 sm:py-3
                       rounded-xl
                       border border-sky-700
                       shadow-sm hover:shadow-md
                       font-semibold text-sm
                       transition">

                <span>←</span>

                <span>Dashboard</span>

            </a>

        </div>


        {{-- ========================================================= --}}
        {{-- RETENTION NOTICE --}}
        {{-- ========================================================= --}}

        <div class="mb-5 sm:mb-7
                    bg-white
                    rounded-2xl
                    border border-sky-200
                    shadow-sm
                    px-4 sm:px-5 py-4">

            <div class="flex items-start gap-3">

                <div class="w-9 h-9 rounded-xl
                            bg-sky-50 border border-sky-100
                            flex items-center justify-center
                            shrink-0">

                    ℹ️

                </div>

                <div class="min-w-0">

                    <p class="text-sm font-semibold text-slate-700">

                        Notification history

                    </p>

                    <p class="text-xs sm:text-sm text-gray-500 mt-1 leading-5">

                        Read notifications are automatically removed after
                        7 days. Unread notifications remain available until
                        they are read.

                    </p>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- NOTIFICATIONS --}}
        {{-- ========================================================= --}}

        @if($notifications->isEmpty())

            {{-- Empty State --}}

            <div class="bg-white
                        rounded-2xl sm:rounded-3xl
                        border border-slate-200
                        shadow-sm
                        px-5 py-16 sm:py-20
                        text-center">

                <div class="w-20 h-20 sm:w-24 sm:h-24
                            mx-auto
                            rounded-full
                            bg-sky-50
                            border border-sky-200
                            flex items-center justify-center
                            text-4xl sm:text-5xl">

                    🔔

                </div>

                <h2 class="text-2xl sm:text-3xl
                           font-bold text-slate-800 mt-6">

                    You're all caught up!

                </h2>

                <p class="text-gray-500
                          text-sm sm:text-base
                          max-w-md mx-auto
                          mt-3 leading-6">

                    You don't have any notifications right now.

                </p>

            </div>

        @else

            {{-- ===================================================== --}}
            {{-- NOTIFICATION LIST --}}
            {{-- ===================================================== --}}

            <div class="space-y-3 sm:space-y-4">

                @foreach($notifications as $notification)

                    @php

                        $isUnread = !$notification->is_read;

                        /*
                        |--------------------------------------------------------------------------
                        | Notification Icon
                        |--------------------------------------------------------------------------
                        */

                        $icon = match($notification->type) {

                            'message' => '💬',

                            'announcement' => '📢',

                            'booking' => '📅',

                            'review' => '⭐',

                            'product' => '📦',

                            'ad' => '📣',

                            default => '🔔',

                        };


                        /*
                        |--------------------------------------------------------------------------
                        | Notification Icon Styling
                        |--------------------------------------------------------------------------
                        */

                        $iconClasses = match($notification->type) {

                            'message' =>
                                'bg-sky-50 border-sky-200',

                            'announcement' =>
                                'bg-indigo-50 border-indigo-200',

                            'booking' =>
                                'bg-orange-50 border-orange-200',

                            'review' =>
                                'bg-yellow-50 border-yellow-200',

                            'product' =>
                                'bg-purple-50 border-purple-200',

                            'ad' =>
                                'bg-pink-50 border-pink-200',

                            default =>
                                'bg-slate-50 border-slate-200',

                        };

                    @endphp


                    {{-- ================================================= --}}
                    {{-- NOTIFICATION CARD --}}
                    {{-- ================================================= --}}

                    <div
                        class="bg-white
                               rounded-2xl
                               border
                               shadow-sm
                               hover:shadow-md
                               transition-all
                               duration-200
                               overflow-hidden
                               {{ $isUnread
                                    ? 'border-sky-200'
                                    : 'border-slate-200' }}">

                        <div class="p-4 sm:p-5">

                            <div class="flex items-start gap-3 sm:gap-4">


                                {{-- ================================================= --}}
                                {{-- ICON --}}
                                {{-- ================================================= --}}

                                <div
                                    class="w-10 h-10 sm:w-11 sm:h-11
                                           rounded-xl
                                           flex items-center justify-center
                                           text-lg sm:text-xl
                                           shrink-0
                                           border
                                           {{ $iconClasses }}">

                                    {{ $icon }}

                                </div>


                                {{-- ================================================= --}}
                                {{-- CONTENT --}}
                                {{-- ================================================= --}}

                                <div class="flex-1 min-w-0">

                                    {{-- Title + Status --}}

                                    <div class="flex items-start
                                                justify-between
                                                gap-3">

                                        <h2
                                            class="font-bold
                                                   text-sm sm:text-base
                                                   leading-5
                                                   break-words
                                                   {{ $isUnread
                                                        ? 'text-slate-900'
                                                        : 'text-slate-700' }}">

                                            {{ $notification->title }}

                                        </h2>


                                        {{-- Status --}}

                                        @if($isUnread)

                                            <span
                                                class="shrink-0
                                                       inline-flex
                                                       items-center
                                                       gap-1.5
                                                       px-2.5 py-1
                                                       rounded-full
                                                       bg-sky-50
                                                       text-sky-700
                                                       border border-sky-200
                                                       text-[10px]
                                                       sm:text-xs
                                                       font-bold">

                                                <span
                                                    class="w-1.5 h-1.5
                                                           bg-sky-500
                                                           rounded-full">
                                                </span>

                                                New

                                            </span>

                                        @else

                                            <span
                                                class="shrink-0
                                                       inline-flex
                                                       items-center
                                                       gap-1
                                                       px-2.5 py-1
                                                       rounded-full
                                                       bg-slate-50
                                                       text-slate-400
                                                       border border-slate-200
                                                       text-[10px]
                                                       sm:text-xs
                                                       font-medium">

                                                ✓ Read

                                            </span>

                                        @endif

                                    </div>


                                    {{-- ================================================= --}}
                                    {{-- MESSAGE --}}
                                    {{-- ================================================= --}}

                                    <p
                                        class="mt-1.5
                                               text-sm
                                               text-slate-600
                                               leading-5 sm:leading-6
                                               break-words">

                                        {{ $notification->message }}

                                    </p>


                                    {{-- ================================================= --}}
                                    {{-- META --}}
                                    {{-- ================================================= --}}

                                    <div
                                        class="flex flex-wrap
                                               items-center
                                               gap-x-3 gap-y-1
                                               mt-2.5
                                               text-[10px]
                                               sm:text-xs
                                               text-gray-400">

                                        <span>

                                            {{ $notification->created_at->diffForHumans() }}

                                        </span>


                                        <span class="text-slate-300">
                                            •
                                        </span>


                                        <span class="capitalize">

                                            {{ $notification->type }}

                                        </span>

                                    </div>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- UNREAD INDICATOR --}}
                            {{-- ================================================= --}}

                            @if($isUnread)

                                <div
                                    class="mt-3
                                           pt-3
                                           border-t
                                           border-sky-100">

                                    <div
                                        class="flex items-center gap-2
                                               text-[11px]
                                               sm:text-xs
                                               text-sky-600
                                               font-medium">

                                        <span
                                            class="w-1.5 h-1.5
                                                   bg-sky-500
                                                   rounded-full">
                                        </span>

                                        <span>
                                            Unread notification
                                        </span>

                                    </div>

                                </div>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>


            {{-- ========================================================= --}}
            {{-- FOOTER --}}
            {{-- ========================================================= --}}

            <div class="mt-6 sm:mt-8
                        pt-4
                        border-t border-slate-200
                        text-center">

                <p class="text-[10px] sm:text-xs text-gray-400">

                    Read notifications are kept for 7 days before automatic removal.

                </p>

            </div>

        @endif

    </div>

</div>

</x-business-layout>