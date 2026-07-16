<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10">

            <h1 class="text-5xl font-extrabold text-sky-700">

                🏠 Find Student Accommodation

            </h1>

            <p class="text-gray-600 mt-2">

                Browse verified hostels, bedsitters and apartments near your university.

            </p>

        </div>

        @if($rentals->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($rentals as $rental)

                    <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                        @if($rental->photos->first())

                            <img
                                src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                class="w-full h-56 object-cover">

                        @else

                            <div class="w-full h-56 bg-slate-200 flex items-center justify-center">

                                No Image

                            </div>

                        @endif

                        <div class="p-6">

                            <h2 class="text-2xl font-bold">

                                {{ $rental->title }}

                            </h2>

                            <p class="text-gray-500 mt-2">

                                {{ $rental->university->name }}

                            </p>

                            <p class="text-gray-500">

                                {{ $rental->nearbyArea->name }}

                            </p>

                            <div class="mt-5 flex justify-between items-center">

                                <span class="text-sky-700 font-extrabold text-2xl">

                                    KSh {{ number_format($rental->price) }}

                                </span>

                                <a
                                    href="{{ route('browse.rental.show',$rental) }}"
                                    class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-2 rounded-xl">

                                    View

                                </a>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="mt-10">

                {{ $rentals->links() }}

            </div>

        @else

            <div class="bg-white rounded-3xl p-12 text-center shadow">

                <h2 class="text-3xl font-bold text-slate-600">

                    No rentals available yet.

                </h2>

            </div>

        @endif

    </div>

</div>

</x-app-layout>