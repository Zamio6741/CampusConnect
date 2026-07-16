<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-4xl font-extrabold text-slate-800">

                    🏘️ Rental Details

                </h1>

                <p class="text-gray-500 mt-2">

                    View your property information.

                </p>

            </div>

           <a href="{{ route('rentals.index') }}"
   class="inline-flex items-center gap-2
          px-6 py-3
          bg-white
          border border-gray-300
          rounded-xl
          text-gray-700
          font-semibold
          shadow
          hover:bg-gray-100
          transition">

    ← Back

</a>

        </div>

        <!-- Photo Gallery -->

        <div class="bg-white rounded-3xl shadow-lg p-8 mb-8">

            <h2 class="text-2xl font-bold mb-6">

                📸 Property Photos

            </h2>

            @if($accommodation->photos->count())

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($accommodation->photos as $photo)

                        <img
                            src="{{ asset('storage/'.$photo->image_path) }}"
                            class="w-full h-64 object-cover rounded-2xl shadow">

                    @endforeach

                </div>

            @else

                <div class="text-center py-12 text-gray-500">

                    No photos uploaded.

                </div>

            @endif

        </div>

        <!-- Property Information -->

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <div class="grid md:grid-cols-2 gap-8">

                <div>

                    <h2 class="text-3xl font-bold text-slate-800 mb-6">

                        {{ $accommodation->title }}

                    </h2>

                    <div class="space-y-4">

                        <p>

                            <strong>Property Type:</strong>

                            {{ ucfirst(str_replace('_',' ',$accommodation->property_type)) }}

                        </p>

                        <p>

                            <strong>Price:</strong>

                            <span class="text-green-600 font-bold">

                                KES {{ number_format($accommodation->price) }}

                            </span>

                        </p>

                        <p>

                            <strong>Location:</strong>

                            {{ $accommodation->location }}

                        </p>

                        <p>

                            <strong>University:</strong>

                            {{ $accommodation->university->name ?? '-' }}

                        </p>

                        <p>

                            <strong>Nearby Area:</strong>

                            {{ $accommodation->nearbyArea->name ?? '-' }}

                        </p>

                        <p>

                            <strong>Phone:</strong>

                            {{ $accommodation->phone ?: '-' }}

                        </p>

                        <p>

                            <strong>WhatsApp:</strong>

                            {{ $accommodation->whatsapp ?: '-' }}

                        </p>

                        <p>

                            <strong>Status:</strong>

                            @if($accommodation->verified)

                                <span class="text-green-600 font-bold">

                                    ✔ Verified

                                </span>

                            @else

                                <span class="text-yellow-600 font-bold">

                                    Pending Verification

                                </span>

                            @endif

                        </p>

                        <p>

                            <strong>Posted:</strong>

                            {{ $accommodation->created_at->format('d M Y') }}

                        </p>

                    </div>

                </div>

                <div>

                    <h3 class="text-2xl font-bold mb-4">

                        📝 Description

                    </h3>

                    <p class="text-gray-700 leading-8">

                        {{ $accommodation->description ?: 'No description provided.' }}

                    </p>

                    <h3 class="text-2xl font-bold mt-10 mb-4">

                        ⚡ Facilities

                    </h3>

                    @if($accommodation->facilities->count())

                        <div class="flex flex-wrap gap-3">

                            @foreach($accommodation->facilities as $facility)

                                <span class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full">

                                    {{ $facility->name }}

                                </span>

                            @endforeach

                        </div>

                    @else

                        <p class="text-gray-500">

                            No facilities added.

                        </p>

                    @endif

                </div>

            </div>

            <!-- Buttons -->

            <div class="mt-10 flex gap-4">

                <a href="{{ route('rentals.edit',$accommodation) }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl">

                    ✏ Edit Rental

                </a>

                <form action="{{ route('rentals.destroy',$accommodation) }}"
                      method="POST"
                      onsubmit="return confirm('Delete this rental?')">

                    @csrf
                    @method('DELETE')

                    <button
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl">

                        🗑 Delete Rental

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>