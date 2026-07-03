<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-100 via-amber-50 to-yellow-100">

    <!-- Hero -->
    <div class="bg-gradient-to-r from-orange-600 via-amber-600 to-yellow-500 text-white">

        <div class="max-w-7xl mx-auto px-6 py-12">

            <div class="flex justify-between items-center">

                <div>

                    <h1 class="text-5xl font-extrabold">
                        🏫 Campus Hostels
                    </h1>

                    <p class="mt-4 text-orange-100 text-lg">

                        Browse available university hostels from different institutions.

                    </p>

                </div>

                <a href="{{ route('hostels.create') }}"
                   class="bg-white text-orange-700 px-8 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">

                    + Add Hostel

                </a>

            </div>

        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 py-10">

        @if(session('success'))

            <div class="mb-8 bg-green-100 border border-green-300 rounded-2xl p-5 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        <!-- Search -->

        <div class="bg-white rounded-3xl shadow-xl p-6 mb-10">

            <form class="grid md:grid-cols-4 gap-5">

                <input
                    type="text"
                    placeholder="Search hostel..."
                    class="rounded-xl border-gray-300">

                <select class="rounded-xl border-gray-300">

                    <option>All Universities</option>

                </select>

                <select class="rounded-xl border-gray-300">

                    <option>All Genders</option>
                    <option>Male</option>
                    <option>Female</option>

                </select>

                <button
                    class="bg-orange-600 text-white rounded-xl font-bold">

                    Search

                </button>

            </form>

        </div>

        <!-- Hostel Cards -->

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($hostels as $hostel)

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                    @if($hostel->image)

                        <img
                            src="{{ asset('storage/'.$hostel->image) }}"
                            class="w-full h-56 object-cover">

                    @else

                        <div class="h-56 bg-orange-100 flex items-center justify-center text-7xl">

                            🏫

                        </div>

                    @endif

                    <div class="p-6">

                        <span class="bg-orange-100 text-orange-700 px-4 py-2 rounded-full text-sm font-bold">

                            {{ $hostel->university }}

                        </span>

                        <h2 class="text-2xl font-bold mt-5">

                            {{ $hostel->hostel_name }}

                        </h2>

                        <div class="space-y-2 mt-5 text-gray-600">

                            <p>🚻 {{ $hostel->gender }}</p>

                            <p>🚪 Room {{ $hostel->room_number }}</p>

                            <p>🛏 {{ $hostel->available_spaces }} Spaces Left</p>

                            <p>👮 {{ $hostel->warden_name }}</p>

                        </div>

                        <button
                            class="w-full mt-8 bg-orange-600 text-white py-3 rounded-xl font-bold hover:bg-orange-700 transition">

                            View Hostel

                        </button>

                    </div>

                </div>

            @empty

                <div class="col-span-3 bg-white rounded-3xl shadow-xl p-16 text-center">

                    <div class="text-8xl">

                        🏫

                    </div>

                    <h2 class="text-4xl font-bold mt-6">

                        No Hostels Yet

                    </h2>

                    <p class="text-gray-500 mt-4">

                        Be the first to upload a campus hostel.

                    </p>

                    <a
                        href="{{ route('hostels.create') }}"
                        class="inline-block mt-8 bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold">

                        Add Hostel

                    </a>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>