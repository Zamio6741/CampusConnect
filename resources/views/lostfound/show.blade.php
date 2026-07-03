<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-6xl mx-auto px-8">

        <a href="{{ route('lostfound.index') }}"
           class="text-orange-600 font-bold hover:underline">

            ← Back to Lost & Found

        </a>

        <div class="grid lg:grid-cols-3 gap-10 mt-6">

            <!-- LEFT -->

            <div class="lg:col-span-2">

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                    @if($item->image)

                        <img
                            src="{{ asset('storage/'.$item->image) }}"
                            class="w-full h-[500px] object-cover">

                    @else

                        <div class="h-[500px] bg-orange-100 flex items-center justify-center text-8xl">

                            🎒

                        </div>

                    @endif

                </div>

                <div class="bg-white rounded-3xl shadow-xl mt-8 p-8">

                    <div class="flex justify-between items-center">

                        <h1 class="text-4xl font-bold">

                            {{ $item->title }}

                        </h1>

                        @if($item->type == 'lost')

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold">

                                LOST

                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold">

                                FOUND

                            </span>

                        @endif

                    </div>

                    <p class="mt-8 text-gray-700 leading-8">

                        {{ $item->description }}

                    </p>

                </div>

            </div>

            <!-- RIGHT -->

            <div>

                <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-6">

                    <h2 class="text-2xl font-bold text-orange-700">

                        Details

                    </h2>

                    <div class="space-y-5 mt-8">

                        <div>

                            <p class="text-gray-500">

                                Location

                            </p>

                            <h3 class="font-bold">

                                {{ $item->location }}

                            </h3>

                        </div>

                        <div>

                            <p class="text-gray-500">

                                Date

                            </p>

                            <h3 class="font-bold">

                                {{ $item->date->format('d M Y') }}

                            </h3>

                        </div>

                        <div>

                            <p class="text-gray-500">

                                Posted By

                            </p>

                            <h3 class="font-bold">

                                {{ $item->user->name }}

                            </h3>

                        </div>

                        <div>

                            <p class="text-gray-500">

                                Contact

                            </p>

                            <h3 class="font-bold">

                                {{ $item->phone }}

                            </h3>

                        </div>

                    </div>

                    <a href="tel:{{ $item->phone }}"
                       class="block mt-8 bg-orange-600 hover:bg-orange-700 text-white text-center py-4 rounded-2xl font-bold">

                        📞 Contact

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>