<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <!-- Hero -->
    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-8 py-14">

            <div class="flex flex-col md:flex-row justify-between items-center gap-8">

                <div>

                    <h1 class="text-5xl font-extrabold">
                        🏫 Campus Hostels
                    </h1>

                    <p class="mt-4 text-xl text-orange-100">
                        Find verified university hostels near your campus.
                    </p>

                </div>

                <a href="{{ route('campus.create') }}"
                   class="bg-white text-orange-600 font-bold px-8 py-4 rounded-2xl shadow-xl hover:scale-105 transition">

                    + Post Hostel

                </a>

            </div>

        </div>

    </section>

    <!-- Search -->
    <div class="max-w-7xl mx-auto px-8 mt-10">

        <div class="bg-white rounded-3xl shadow-xl p-6">

            <form class="grid md:grid-cols-4 gap-5">

                <input
                    type="text"
                    placeholder="Search hostel..."
                    class="rounded-xl border-gray-300">

                <input
                    type="text"
                    placeholder="University"
                    class="rounded-xl border-gray-300">

                <select class="rounded-xl border-gray-300">

                    <option>Any Price</option>
                    <option>Below KSh 3,000</option>
                    <option>KSh 3,000 - 6,000</option>
                    <option>Above KSh 6,000</option>

                </select>

                <button
                    class="bg-orange-600 text-white rounded-xl font-bold">

                    Search

                </button>

            </form>

        </div>

    </div>

    <!-- Listings -->
    <div class="max-w-7xl mx-auto px-8 py-12">

        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse($hostels as $hostel)

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-2 hover:shadow-2xl transition-all duration-300">

                    <div class="relative">

                        @if($hostel->images->count())

                            <img
                                src="{{ asset('storage/'.$hostel->images->first()->image_path) }}"
                                class="w-full h-64 object-cover">

                        @else

                            <div class="h-64 bg-orange-100 flex items-center justify-center text-7xl">

                                🏫

                            </div>

                        @endif

                        <div class="absolute top-4 left-4 flex gap-2">

                            @if($hostel->verified)

                                <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-bold">

                                    ✅ Verified

                                </span>

                            @endif

                            @if($hostel->featured)

                                <span class="bg-yellow-400 text-black px-3 py-1 rounded-full text-sm font-bold">

                                    ⭐ Featured

                                </span>

                            @endif

                        </div>

                    </div>

                    <div class="p-6">

                        <h2 class="text-2xl font-bold text-gray-800">

                            {{ $hostel->title }}

                        </h2>

                        <p class="text-gray-500 mt-2">

                            📍 {{ $hostel->location }}

                        </p>

                        <div class="flex justify-between items-center mt-5">

                            <div>

                                <p class="text-orange-600 text-3xl font-extrabold">

                                    KSh {{ number_format($hostel->price) }}

                                </p>

                                <small class="text-gray-500">

                                    per month

                                </small>

                            </div>

                            <div class="text-right">

                                <div class="text-yellow-500 font-bold">

                                    ⭐ {{ number_format($hostel->reviews->avg('rating') ?? 0,1) }}

                                </div>

                                <small class="text-gray-500">

                                    {{ $hostel->reviews->count() }} Reviews

                                </small>

                            </div>

                        </div>

                        <div class="grid grid-cols-2 gap-3 mt-6">

                            <a
                                href="{{ route('accommodation.show',$hostel) }}"
                                class="bg-orange-600 hover:bg-orange-700 text-white py-3 rounded-xl text-center font-bold">

                                View Details

                            </a>

                            <form
                                action="{{ route('accommodation.save',$hostel) }}"
                                method="POST">

                                @csrf

                                <button
                                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-xl font-bold">

                                    ❤️ Save

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-span-3">

                    <div class="bg-white rounded-3xl shadow-xl p-20 text-center">

                        <div class="text-8xl">

                            🏫

                        </div>

                        <h2 class="text-4xl font-bold mt-6">

                            No Campus Hostels Yet

                        </h2>

                        <p class="text-gray-500 mt-4">

                            Be the first to post one.

                        </p>

                        <a
                            href="{{ route('campus.create') }}"
                            class="inline-block mt-8 bg-orange-600 text-white px-8 py-4 rounded-2xl font-bold">

                            Post Hostel

                        </a>

                    </div>

                </div>

            @endforelse

        </div>

        <div class="mt-10">

            {{ $hostels->links() }}

        </div>

    </div>

</div>

</x-app-layout>