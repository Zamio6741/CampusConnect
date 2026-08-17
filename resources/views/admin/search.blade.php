@extends('layouts.admin')

@section('title', 'Search Results')

@section('content')

<div class="py-8">

    {{-- HEADER --}}
    <div class="mb-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>

                <h1 class="text-3xl font-bold text-slate-800">
                    Search Results
                </h1>

                @if($query)

                    <p class="text-slate-500 mt-2">
                        Showing results for:
                        <span class="font-semibold text-slate-700">
                            "{{ $query }}"
                        </span>
                    </p>

                @else

                    <p class="text-slate-500 mt-2">
                        Enter something in the search bar to begin searching.
                    </p>

                @endif

            </div>

            @if($query)

                <div class="bg-sky-100 text-sky-700 px-5 py-3 rounded-xl font-semibold">

                    {{ $totalResults }}
                    {{ $totalResults === 1 ? 'result' : 'results' }}

                </div>

            @endif

        </div>

    </div>


    {{-- EMPTY SEARCH --}}
    @if(!$query)

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 py-20 text-center">

            <div class="text-6xl mb-5">
                🔍
            </div>

            <h2 class="text-2xl font-bold text-slate-800">
                Search CampusConnect
            </h2>

            <p class="text-slate-500 mt-2">
                Search for users, businesses, accommodations, notes or announcements.
            </p>

        </div>

    @elseif($totalResults === 0)

        {{-- NO RESULTS --}}

        <div class="bg-white rounded-3xl shadow-sm border border-slate-200 py-20 text-center">

            <div class="text-6xl mb-5">
                😕
            </div>

            <h2 class="text-2xl font-bold text-slate-800">
                No results found
            </h2>

            <p class="text-slate-500 mt-2">
                We couldn't find anything matching
                <strong>"{{ $query }}"</strong>.
            </p>

        </div>

    @else


        {{-- USERS --}}

        @if($users->count())

            <div class="mb-8">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold text-slate-800">
                        👥 Users
                    </h2>

                    <span class="text-sm text-slate-500">
                        {{ $users->count() }} found
                    </span>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    @foreach($users as $user)

                        <a
                            href="{{ route('admin.users.show', $user) }}"
                            class="block px-6 py-5 border-b last:border-b-0 hover:bg-sky-50 transition"
                        >

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-full bg-sky-100 text-sky-700 flex items-center justify-center font-bold">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                                <div class="flex-1">

                                    <h3 class="font-bold text-slate-800">
                                        {{ $user->name }}
                                    </h3>

                                    <p class="text-sm text-slate-500">
                                        {{ $user->email }}
                                    </p>

                                </div>

                                <span class="text-sky-600 font-semibold">
                                    View →
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- BUSINESSES --}}

        @if($businesses->count())

            <div class="mb-8">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold text-slate-800">
                        🏪 Businesses
                    </h2>

                    <span class="text-sm text-slate-500">
                        {{ $businesses->count() }} found
                    </span>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    @foreach($businesses as $business)

                        <a
                            href="{{ route('admin.businesses.show', $business) }}"
                            class="block px-6 py-5 border-b last:border-b-0 hover:bg-sky-50 transition"
                        >

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center text-2xl">

                                    🏪

                                </div>

                                <div class="flex-1">

                                    <h3 class="font-bold text-slate-800">
                                        {{ $business->business_name }}
                                    </h3>

                                    <p class="text-sm text-slate-500">

                                        {{ $business->category }}

                                        @if($business->location)
                                            • {{ $business->location }}
                                        @endif

                                    </p>

                                </div>

                                <span class="text-sky-600 font-semibold">
                                    View →
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- ACCOMMODATIONS --}}

        @if($accommodations->count())

            <div class="mb-8">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold text-slate-800">
                        🏢 Accommodations
                    </h2>

                    <span class="text-sm text-slate-500">
                        {{ $accommodations->count() }} found
                    </span>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    @foreach($accommodations as $accommodation)

                        <a
                            href="{{ route('admin.accommodations.show', $accommodation) }}"
                            class="block px-6 py-5 border-b last:border-b-0 hover:bg-sky-50 transition"
                        >

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-2xl">

                                    🏢

                                </div>

                                <div class="flex-1">

                                    <h3 class="font-bold text-slate-800">
                                        {{ $accommodation->title }}
                                    </h3>

                                    <p class="text-sm text-slate-500">

                                        {{ $accommodation->property_type }}

                                        @if($accommodation->location)
                                            • {{ $accommodation->location }}
                                        @endif

                                    </p>

                                </div>

                                <span class="text-sky-600 font-semibold">
                                    View →
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- NOTES --}}

        @if($notes->count())

            <div class="mb-8">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold text-slate-800">
                        📚 Notes
                    </h2>

                    <span class="text-sm text-slate-500">
                        {{ $notes->count() }} found
                    </span>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    @foreach($notes as $note)

                        <a
                            href="{{ route('admin.notes.show', $note) }}"
                            class="block px-6 py-5 border-b last:border-b-0 hover:bg-sky-50 transition"
                        >

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl">

                                    📚

                                </div>

                                <div class="flex-1">

                                    <h3 class="font-bold text-slate-800">
                                        {{ $note->title }}
                                    </h3>

                                    <p class="text-sm text-slate-500">

                                        {{ Str::limit($note->description, 100) }}

                                    </p>

                                </div>

                                <span class="text-sky-600 font-semibold">
                                    View →
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        @endif


        {{-- ANNOUNCEMENTS --}}

        @if($announcements->count())

            <div class="mb-8">

                <div class="flex items-center justify-between mb-4">

                    <h2 class="text-xl font-bold text-slate-800">
                        📢 Announcements
                    </h2>

                    <span class="text-sm text-slate-500">
                        {{ $announcements->count() }} found
                    </span>

                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">

                    @foreach($announcements as $announcement)

                        <a
                            href="{{ route('admin.announcements.show', $announcement) }}"
                            class="block px-6 py-5 border-b last:border-b-0 hover:bg-sky-50 transition"
                        >

                            <div class="flex items-center gap-4">

                                <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center text-2xl">

                                    📢

                                </div>

                                <div class="flex-1">

                                    <h3 class="font-bold text-slate-800">
                                        {{ $announcement->title }}
                                    </h3>

                                    <p class="text-sm text-slate-500">

                                        {{ Str::limit($announcement->content, 120) }}

                                    </p>

                                </div>

                                <span class="text-sky-600 font-semibold">
                                    View →
                                </span>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>

        @endif


    @endif

</div>

@endsection