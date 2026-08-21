<x-landlord-layout>


<div class="min-h-screen bg-slate-50">
    <div class="mx-auto w-full max-w-6xl px-4 py-6 sm:px-6 sm:py-8 lg:px-8 lg:py-10">

        {{-- ========================================================= --}}
        {{-- HEADER --}}
        {{-- ========================================================= --}}

        <div class="mb-6 sm:mb-8">
            <div class="flex items-start gap-3 sm:gap-4">

                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-xl shadow-sm sm:h-12 sm:w-12 sm:text-2xl">
                    🔔
                </div>

                <div class="min-w-0">
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl lg:text-4xl">
                        Notifications
                    </h1>

                    <p class="mt-1 text-sm leading-6 text-slate-500 sm:text-base">
                        Stay updated with your latest landlord notifications and activity.
                    </p>
                </div>

            </div>
        </div>

        {{-- ========================================================= --}}
        {{-- NOTIFICATIONS --}}
        {{-- ========================================================= --}}

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm sm:rounded-3xl">

            @forelse($notifications ?? [] as $notification)

                <div class="border-b border-slate-100 last:border-b-0">
                    <div class="p-4 sm:p-6">

                        <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">

                            {{-- Notification content --}}
                            <div class="flex min-w-0 gap-3 sm:gap-4">

                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-sky-50 text-lg text-sky-600 sm:h-11 sm:w-11">
                                    🔔
                                </div>

                                <div class="min-w-0">
                                    <h2 class="break-words text-base font-semibold text-slate-800 sm:text-lg">
                                        {{ $notification->title }}
                                    </h2>

                                    <p class="mt-1.5 break-words text-sm leading-6 text-slate-600 sm:mt-2 sm:text-base">
                                        {{ $notification->message }}
                                    </p>
                                </div>

                            </div>

                            {{-- Timestamp --}}
                            <div class="shrink-0 pl-13 text-xs font-medium text-slate-400 sm:pl-0 sm:text-sm">
                                {{ $notification->created_at->diffForHumans() }}
                            </div>

                        </div>

                    </div>
                </div>

            @empty

                {{-- ================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ================================================= --}}

                <div class="px-5 py-16 text-center sm:px-8 sm:py-20">

                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-emerald-50 text-4xl shadow-sm sm:h-24 sm:w-24 sm:text-5xl">
                        🎉
                    </div>

                    <h2 class="mt-6 text-xl font-bold tracking-tight text-slate-900 sm:text-2xl lg:text-3xl">
                        You're all caught up
                    </h2>

                    <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-slate-500 sm:text-base">
                        You don't have any new notifications right now. We'll let you know when something needs your attention.
                    </p>

                </div>

            @endforelse

        </div>

    </div>
</div>


</x-landlord-layout>
