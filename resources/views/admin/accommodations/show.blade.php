@extends('layouts.admin')

@section('title','Accommodation Details')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="bg-white rounded-2xl shadow-xl p-8">

        <div class="flex justify-between items-center mb-8">

            <h1 class="text-3xl font-bold">
                🏠 {{ $accommodation->title }}
            </h1>

            <span class="px-4 py-2 rounded-full
                {{ $accommodation->verified ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                {{ $accommodation->verified ? 'Verified' : 'Pending' }}
            </span>

        </div>

        <div class="grid md:grid-cols-2 gap-8">

            <div>

                <h3 class="font-bold text-lg mb-4">
                    Property Information
                </h3>

                <div class="space-y-3">

                    <p><strong>Landlord:</strong> {{ $accommodation->owner?->name ?? 'N/A' }}</p>

                    <p><strong>University:</strong> {{ $accommodation->university?->name ?? 'N/A' }}</p>

                    <p><strong>Property Type:</strong> {{ ucfirst($accommodation->property_type) }}</p>

                    <p><strong>Listing Type:</strong> {{ ucfirst($accommodation->listing_type) }}</p>

                    <p><strong>Location:</strong> {{ $accommodation->location }}</p>

                    <p><strong>Price:</strong> KSh {{ number_format($accommodation->price) }}</p>

                    <p><strong>Available:</strong>
                        {{ $accommodation->available ? 'Yes' : 'No' }}
                    </p>

                    <p><strong>Views:</strong> {{ $accommodation->views }}</p>

                    <p><strong>Bookings:</strong> {{ $accommodation->bookings }}</p>

                    <p><strong>Total Revenue:</strong>
                        KSh {{ number_format($accommodation->total_revenue) }}
                    </p>

                </div>

            </div>

            <div>

                <h3 class="font-bold text-lg mb-4">
                    Contact Information
                </h3>

                <div class="space-y-3">

                    <p><strong>Phone:</strong> {{ $accommodation->phone }}</p>

                    <p><strong>WhatsApp:</strong> {{ $accommodation->whatsapp }}</p>

                    <p><strong>Posted:</strong>
                        {{ $accommodation->created_at->format('d M Y') }}
                    </p>

                    <p><strong>Last Updated:</strong>
                        {{ $accommodation->updated_at->format('d M Y') }}
                    </p>

                </div>

            </div>

            <div class="md:col-span-2">

                <h3 class="font-bold text-lg mb-3">
                    Description
                </h3>

                <div class="bg-gray-50 rounded-xl p-5">

                    {{ $accommodation->description }}

                </div>

            </div>

        </div>

        <div class="mt-10 flex flex-wrap gap-3">

            <a href="{{ route('admin.accommodations') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-5 py-3 rounded-lg">
                ← Back
            </a>

            @if(!$accommodation->verified)

            <form method="POST"
                  action="{{ route('admin.accommodations.approve',$accommodation) }}">
                @csrf
                @method('PATCH')

                <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-3 rounded-lg">
                    ✓ Approve
                </button>

            </form>

            @endif

            @if($accommodation->verified)

            <form method="POST"
                  action="{{ route('admin.accommodations.reject',$accommodation) }}">
                @csrf
                @method('PATCH')

                <button class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg">
                    ✕ Reject
                </button>

            </form>

            @endif

        </div>

    </div>

</div>

@endsection