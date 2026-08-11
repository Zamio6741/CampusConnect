@extends('layouts.admin')

@section('title', 'Marketplace Listing')

@section('content')

<div class="space-y-6">

    <div class="flex items-center justify-between">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Marketplace Listing
            </h1>

            <p class="text-slate-500 mt-1">
                View listing and seller information.
            </p>
        </div>

        <a href="{{ route('admin.marketplace') }}"
           class="bg-slate-600 hover:bg-slate-700 text-white px-5 py-3 rounded-xl">

            ← Back to Marketplace

        </a>

    </div>


    <div class="grid lg:grid-cols-3 gap-6">

        {{-- IMAGES --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-5">
                Listing Images
            </h2>

            @if($marketplace->images->count())

                <div class="grid sm:grid-cols-2 gap-5">

                    @foreach($marketplace->images as $image)

                        <img
                            src="{{ asset('storage/'.$image->image) }}"
                            class="w-full h-72 object-cover rounded-2xl">

                    @endforeach

                </div>

            @else

                <div class="h-72 bg-orange-100 rounded-2xl flex items-center justify-center text-7xl">
                    🛒
                </div>

            @endif

        </div>


        {{-- LISTING DETAILS --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-2xl font-bold text-slate-800">
                {{ $marketplace->title }}
            </h2>

            <div class="mt-4 text-3xl font-extrabold text-orange-600">
                KSh {{ number_format($marketplace->price) }}
            </div>


            <div class="mt-5">

                <span class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-sm font-semibold">
                    {{ $marketplace->category }}
                </span>

            </div>


            <div class="mt-6 space-y-3 text-slate-600">

                <p>
                    <strong>Condition:</strong>
                    {{ $marketplace->condition }}
                </p>

                <p>
                    <strong>Location:</strong>
                    {{ $marketplace->location ?? 'N/A' }}
                </p>

                <p>
                    <strong>Phone:</strong>
                    {{ $marketplace->phone }}
                </p>

                <p>
                    <strong>WhatsApp:</strong>
                    {{ $marketplace->whatsapp ?? 'N/A' }}
                </p>

                <p>
                    <strong>Listed:</strong>
                    {{ $marketplace->created_at->format('d M Y, h:i A') }}
                </p>

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
    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-4">
            Description
        </h2>

        <p class="text-slate-600 leading-relaxed whitespace-pre-line">
            {{ $marketplace->description }}
        </p>

    </div>


    {{-- SELLER --}}
    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-5">
            Seller Information
        </h2>

        <div class="grid md:grid-cols-3 gap-5">

            <div>
                <p class="text-sm text-slate-500">
                    Name
                </p>

                <p class="font-semibold">
                    {{ $marketplace->user?->name ?? 'Unknown' }}
                </p>
            </div>


            <div>
                <p class="text-sm text-slate-500">
                    Email
                </p>

                <p class="font-semibold">
                    {{ $marketplace->user?->email ?? 'N/A' }}
                </p>
            </div>


            <div>
                <p class="text-sm text-slate-500">
                    Seller Phone
                </p>

                <p class="font-semibold">
                    {{ $marketplace->phone }}
                </p>
            </div>

        </div>

    </div>


    {{-- ADMIN ACTIONS --}}
    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-xl font-bold mb-5">
            Admin Actions
        </h2>

        <div class="flex flex-wrap gap-3">

            @if($marketplace->sold)

                <form
                    action="{{ route('admin.marketplace.available', $marketplace) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-xl font-semibold">

                        Mark Available

                    </button>

                </form>

            @else

                <form
                    action="{{ route('admin.marketplace.sold', $marketplace) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        onclick="return confirm('Mark this listing as sold?')"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-3 rounded-xl font-semibold">

                        Mark Sold

                    </button>

                </form>

            @endif


            <form
                action="{{ route('admin.marketplace.destroy', $marketplace) }}"
                method="POST">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Delete this listing permanently?')"
                    class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-semibold">

                    Delete Listing

                </button>

            </form>

        </div>

    </div>

</div>

@endsection