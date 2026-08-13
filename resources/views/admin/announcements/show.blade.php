@extends('layouts.admin')

@section('title', 'View Announcement')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- =========================================================
         PAGE HEADER
    ========================================================== --}}

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-red-100
                        flex items-center justify-center text-2xl">
                📢
            </div>

            <div>

                <h1 class="text-3xl font-bold text-slate-800">
                    View Announcement
                </h1>

                <p class="text-slate-500 mt-1">
                    Review announcement details and publication information.
                </p>

            </div>

        </div>


        <div class="flex flex-col sm:flex-row gap-3">

            <a
                href="{{ route('admin.announcements') }}"
                class="inline-flex items-center justify-center gap-2
                       px-5 py-3 rounded-xl
                       border border-slate-300
                       bg-white
                       text-slate-700
                       font-semibold
                       hover:bg-slate-50
                       transition">

                ← Back

            </a>

            <a
                href="{{ route('admin.announcements.edit', $announcement) }}"
                class="inline-flex items-center justify-center gap-2
                       px-5 py-3 rounded-xl
                       bg-amber-500 hover:bg-amber-600
                       text-white
                       font-semibold
                       shadow-md
                       transition">

                ✏️ Edit Announcement

            </a>

        </div>

    </div>


    {{-- =========================================================
         SUCCESS MESSAGE
    ========================================================== --}}

    @if(session('success'))

        <div class="bg-green-50 border border-green-200
                    rounded-2xl p-5">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-full bg-green-100
                            flex items-center justify-center">

                    ✓

                </div>

                <div>

                    <p class="font-semibold text-green-800">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        </div>

    @endif


    {{-- =========================================================
         ANNOUNCEMENT CARD
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md
                border border-slate-100 overflow-hidden">


        {{-- Announcement Header --}}

        <div class="bg-gradient-to-r from-red-500 to-red-600
                    px-6 py-8 sm:px-8">

            <div class="flex items-start gap-5">

                <div class="w-16 h-16 rounded-2xl
                            bg-white/20
                            flex items-center justify-center
                            text-3xl
                            flex-shrink-0">

                    📢

                </div>


                <div class="min-w-0">

                    <div class="inline-flex items-center
                                px-3 py-1 rounded-full
                                bg-white/20
                                text-white
                                text-xs font-semibold
                                mb-3">

                        ANNOUNCEMENT

                    </div>

                    <h2 class="text-2xl sm:text-3xl
                               font-bold text-white">

                        {{ $announcement->title }}

                    </h2>

                    <p class="text-red-100 mt-3 text-sm">

                        Published
                        {{ $announcement->created_at->diffForHumans() }}

                    </p>

                </div>

            </div>

        </div>


        {{-- =====================================================
             META INFORMATION
        ====================================================== --}}

        <div class="grid grid-cols-1 md:grid-cols-3
                    divide-y md:divide-y-0
                    md:divide-x
                    border-b border-slate-100">


            {{-- University --}}

            <div class="p-6">

                <p class="text-xs uppercase tracking-wider
                          text-slate-400 font-semibold">

                    Target University

                </p>

                <div class="flex items-center gap-3 mt-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-sky-100
                                flex items-center justify-center">

                        🎓

                    </div>

                    <div>

                        <p class="font-bold text-slate-800">

                            {{ $announcement->university->name ?? 'Unknown University' }}

                        </p>

                        <p class="text-xs text-slate-400">
                            Selected audience
                        </p>

                    </div>

                </div>

            </div>


            {{-- Posted By --}}

            <div class="p-6">

                <p class="text-xs uppercase tracking-wider
                          text-slate-400 font-semibold">

                    Published By

                </p>

                <div class="flex items-center gap-3 mt-3">

                    <div class="w-10 h-10 rounded-full
                                bg-purple-100
                                flex items-center justify-center
                                text-purple-700
                                font-bold">

                        {{ strtoupper(substr($announcement->user->name ?? 'S', 0, 1)) }}

                    </div>

                    <div>

                        <p class="font-bold text-slate-800">

                            {{ $announcement->user->name ?? 'System' }}

                        </p>

                        @if($announcement->user)

                            <p class="text-xs text-slate-400">

                                {{ $announcement->user->email }}

                            </p>

                        @else

                            <p class="text-xs text-slate-400">
                                System account
                            </p>

                        @endif

                    </div>

                </div>

            </div>


            {{-- Date --}}

            <div class="p-6">

                <p class="text-xs uppercase tracking-wider
                          text-slate-400 font-semibold">

                    Publication Date

                </p>

                <div class="flex items-center gap-3 mt-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-green-100
                                flex items-center justify-center">

                        📅

                    </div>

                    <div>

                        <p class="font-bold text-slate-800">

                            {{ $announcement->created_at->format('d M Y') }}

                        </p>

                        <p class="text-xs text-slate-400">

                            {{ $announcement->created_at->format('h:i A') }}

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             MESSAGE
        ====================================================== --}}

        <div class="p-6 sm:p-8">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-10 h-10 rounded-xl
                            bg-red-100
                            flex items-center justify-center">

                    📝

                </div>

                <div>

                    <h3 class="text-xl font-bold text-slate-800">
                        Announcement Message
                    </h3>

                    <p class="text-sm text-slate-500">
                        Full message published to the selected university.
                    </p>

                </div>

            </div>


            <div class="bg-slate-50
                        border border-slate-200
                        rounded-2xl
                        p-6 sm:p-8">

                <div class="text-slate-700
                            leading-8
                            whitespace-pre-line
                            break-words">

                    {{ $announcement->content }}

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         NOTIFICATION INFORMATION
    ========================================================== --}}

    <div class="bg-sky-50 border border-sky-100
                rounded-2xl p-6">

        <div class="flex items-start gap-4">

            <div class="w-12 h-12 rounded-xl
                        bg-white
                        flex items-center justify-center
                        shadow-sm
                        text-xl
                        flex-shrink-0">

                🔔

            </div>

            <div>

                <h3 class="font-bold text-sky-900">
                    Notification Information
                </h3>

                <p class="text-sm text-sky-700 mt-1 leading-6">

                    This announcement was targeted to
                    <strong>
                        {{ $announcement->university->name ?? 'the selected university' }}
                    </strong>.
                    Students belonging to that university are notified when
                    the announcement is published.

                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MANAGEMENT ACTIONS
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md
                border border-slate-100 p-6">

        <div class="flex flex-col lg:flex-row
                    lg:items-center
                    lg:justify-between gap-5">

            <div>

                <h3 class="font-bold text-slate-800">
                    Manage Announcement
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Edit or permanently remove this announcement.
                </p>

            </div>


            <div class="flex flex-col sm:flex-row gap-3">

                {{-- Edit --}}

                <a
                    href="{{ route('admin.announcements.edit', $announcement) }}"
                    class="inline-flex items-center justify-center gap-2
                           px-6 py-3 rounded-xl
                           bg-amber-500 hover:bg-amber-600
                           text-white
                           font-semibold
                           transition">

                    ✏️ Edit

                </a>


                {{-- Delete --}}

                <form
                    method="POST"
                    action="{{ route('admin.announcements.destroy', $announcement) }}"
                    onsubmit="return confirm('Are you sure you want to permanently delete this announcement? This action cannot be undone.');">

                    @csrf

                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full inline-flex items-center justify-center gap-2
                               px-6 py-3 rounded-xl
                               bg-red-600 hover:bg-red-700
                               text-white
                               font-semibold
                               transition">

                        🗑 Delete

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection