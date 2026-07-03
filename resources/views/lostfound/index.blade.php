<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <!-- Hero -->

    <section class="bg-gradient-to-r from-orange-600 to-amber-500 text-white">

        <div class="max-w-7xl mx-auto px-8 py-12">

            <div class="flex justify-between items-center">

                <div>

                    <h1 class="text-5xl font-extrabold">
                        🔍 Lost & Found
                    </h1>

                    <p class="mt-3 text-orange-100 text-xl">
                        Helping students recover lost belongings.
                    </p>

                </div>

                <a href="{{ route('lostfound.create') }}"
                   class="bg-white text-orange-600 px-8 py-4 rounded-2xl font-bold shadow-lg">

                    ➕ Report Item

                </a>

            </div>

        </div>

    </section>

    <div class="max-w-7xl mx-auto px-8 py-10">

        @if(session('success'))

            <div class="bg-green-500 text-white rounded-2xl p-5 mb-8">

                {{ session('success') }}

            </div>

        @endif

        @if($items->count())

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($items as $item)

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                    @if($item->image)

                        <img
                            src="{{ asset('storage/'.$item->image) }}"
                            class="w-full h-60 object-cover">

                    @else

                        <div class="h-60 bg-orange-100 flex items-center justify-center text-7xl">

                            🎒

                        </div>

                    @endif

                    <div class="p-6">

                        <div class="flex justify-between">

                            @if($item->type=="lost")

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full font-bold">

                                    LOST

                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full font-bold">

                                    FOUND

                                </span>

                            @endif

                            <span class="text-gray-500">

                                {{ $item->date->format('d M Y') }}

                            </span>

                        </div>

                        <h2 class="text-2xl font-bold mt-5">

                            {{ $item->title }}

                        </h2>

                        <p class="text-gray-600 mt-3 line-clamp-3">

                            {{ $item->description }}

                        </p>

                        <div class="mt-4 text-gray-500">

                            📍 {{ $item->location }}

                        </div>

                        <a href="{{ route('lostfound.show',$item) }}"
                           class="block mt-6 bg-orange-600 hover:bg-orange-700 text-white text-center py-3 rounded-2xl font-bold">

                            View Details

                        </a>

                    </div>

                </div>

                @endforeach

            </div>

            <div class="mt-10">

                {{ $items->links() }}

            </div>

        @else

            <div class="bg-white rounded-3xl shadow-xl p-20 text-center">

                <div class="text-8xl">

                    🎒

                </div>

                <h2 class="text-4xl font-bold mt-5">

                    No Items Posted

                </h2>

                <p class="text-gray-500 mt-3">

                    Report the first lost or found item.

                </p>

            </div>

        @endif

    </div>

</div>

</x-app-layout>