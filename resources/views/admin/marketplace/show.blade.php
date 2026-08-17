@extends('layouts.admin')

@section('title', 'Marketplace Listing')

@section('content')

<div class="space-y-6 w-full max-w-full overflow-hidden">

    {{-- HEADER --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

        <div class="min-w-0">
            <h1 class="text-2xl sm:text-3xl font-bold text-slate-800">
                Marketplace Listing
            </h1>

            <p class="text-slate-500 mt-1 text-sm sm:text-base">
                View listing and seller information.
            </p>
        </div>

        <a href="{{ route('admin.marketplace') }}"
           class="w-full sm:w-auto text-center bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-xl transition">

            ← Back to Marketplace

        </a>

    </div>


    {{-- MAIN CONTENT --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- IMAGES --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-4 sm:p-6">

            <h2 class="text-xl font-bold mb-5">
                Listing Images
            </h2>

            @if($marketplace->images->count())

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-5">

                    @foreach($marketplace->images as $image)

                        <div class="rounded-2xl overflow-hidden bg-slate-100">

                            <img
                                src="{{ asset('storage/'.$image->image) }}"
                                alt="{{ $marketplace->title }}"
                                class="w-full h-56 sm:h-72 object-cover">

                        </div>

                    @endforeach

                </div>

            @else

                <div class="h-56 sm:h-72 bg-orange-100 rounded-2xl flex items-center justify-center text-6xl sm:text-7xl">
                    🛒
                </div>

            @endif

        </div>


        {{-- LISTING DETAILS --}}
        <div class="bg-white rounded-2xl shadow p-4 sm:p-6">

            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 break-words">
                {{ $marketplace->title }}
            </h2>

            <div class="mt-4 text-2xl sm:text-3xl font-extrabold text-orange-600 break-words">
                KSh {{ number_format($marketplace->price) }}
            </div>


            <div class="mt-5">

                <span class="inline-block bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $marketplace->category }}
                </span>

            </div>


            <div class="mt-6 space-y-4 text-slate-600">

                <div>
                    <p class="text-xs sm:text-sm text-slate-400">
                        Condition
                    </p>

                    <p class="font-medium break-words">
                        {{ $marketplace->condition }}
                    </p>
                </div>


                <div>
                    <p class="text-xs sm:text-sm text-slate-400">
                        Location
                    </p>

                    <p class="font-medium break-words">
                        {{ $marketplace->location ?? 'N/A' }}
                    </p>
                </div>


                <div>
                    <p class="text-xs sm:text-sm text-slate-400">
                        Phone
                    </p>

                    <p class="font-medium break-words">
                        {{ $marketplace->phone }}
                    </p>
                </div>


                <div>
                    <p class="text-xs sm:text-sm text-slate-400">
                        WhatsApp
                    </p>

                    <p class="font-medium break-words">
                        {{ $marketplace->whatsapp ?? 'N/A' }}
                    </p>
                </div>


                <div>
                    <p class="text-xs sm:text-sm text-slate-400">
                        Listed
                    </p>

                    <p class="font-medium">
                        {{ $marketplace->created_at->format('d M Y, h:i A') }}
                    </p>
                </div>

            </div>


            <div class="mt-6">

                @if($marketplace->sold)

                    <span class="inline-block bg-red-100 text-red-700 px-4 py-2 rounded-xl font-bold">
                        SOLD
                    </span>

                @else

                    <span class="inline-block bg-green-100 text-green-700 px-4 py-2 rounded-xl font-bold">
                        AVAILABLE
                    </span>

                @endif

            </div>

        </div>

    </div>


    {{-- DESCRIPTION --}}
    <div class="bg-white rounded-2xl shadow p-4 sm:p-6">

        <h2 class="text-xl font-bold mb-4">
            Description
        </h2>

        <p class="text-slate-600 leading-relaxed whitespace-pre-line break-words">
            {{ $marketplace->description }}
        </p>

    </div>


    {{-- SELLER --}}
    <div class="bg-white rounded-2xl shadow p-4 sm:p-6">

        <h2 class="text-xl font-bold mb-5">
            Seller Information
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">

            <div class="min-w-0">

                <p class="text-sm text-slate-500">
                    Name
                </p>

                <p class="font-semibold break-words">
                    {{ $marketplace->user?->name ?? 'Unknown' }}
                </p>

            </div>


            <div class="min-w-0">

                <p class="text-sm text-slate-500">
                    Email
                </p>

                <p class="font-semibold break-all">
                    {{ $marketplace->user?->email ?? 'N/A' }}
                </p>

            </div>


            <div class="min-w-0">

                <p class="text-sm text-slate-500">
                    Seller Phone
                </p>

                <p class="font-semibold break-words">
                    {{ $marketplace->phone }}
                </p>

            </div>

        </div>

    </div>


    {{-- ADMIN ACTIONS --}}
    <div class="bg-white rounded-2xl shadow p-4 sm:p-6">

        <h2 class="text-xl font-bold mb-5">
            Admin Actions
        </h2>

        <div class="flex flex-col sm:flex-row flex-wrap gap-3">

            @if($marketplace->sold)

                <form
                    action="{{ route('admin.marketplace.available', $marketplace) }}"
                    method="POST"
                    class="w-full sm:w-auto">

                    @csrf
                    @method('PATCH')

                    <button
                        class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                        Mark Available

                    </button>

                </form>

            @else

                <form
                    action="{{ route('admin.marketplace.sold', $marketplace) }}"
                    method="POST"
                    class="w-full sm:w-auto">

                    @csrf
                    @method('PATCH')

                    <button
                        onclick="return confirm('Mark this listing as sold?')"
                        class="w-full sm:w-auto bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-xl font-semibold transition">

                        Mark Sold

                    </button>

                </form>

            @endif


            <form
                action="{{ route('admin.marketplace.destroy', $marketplace) }}"
                method="POST"
                class="w-full sm:w-auto">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete this listing permanently?')"
                    class="w-full sm:w-auto bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                    Delete Listing

                </button>

            </form>

        </div>

    </div>

</div>

@endsection