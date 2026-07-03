<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

    <div class="max-w-7xl mx-auto px-8 py-10">

        <a href="{{ route('marketplace.index') }}"
           class="text-orange-600 font-bold hover:underline">
            ← Back to Marketplace
        </a>

        <div class="grid lg:grid-cols-3 gap-10 mt-6">

            <!-- LEFT SIDE -->

            <div class="lg:col-span-2">

                <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                    @if($item->images->count())

                        <img
                            src="{{ asset('storage/'.$item->images->first()->image) }}"
                            class="w-full h-[500px] object-cover">

                    @else

                        <div class="h-[500px] bg-orange-100 flex items-center justify-center text-8xl">

                            📦

                        </div>

                    @endif

                </div>

                @if($item->images->count() > 1)

                    <div class="grid grid-cols-4 gap-4 mt-5">

                        @foreach($item->images as $image)

                            <img
                                src="{{ asset('storage/'.$image->image) }}"
                                class="h-28 w-full object-cover rounded-2xl shadow">

                        @endforeach

                    </div>

                @endif

                <!-- Description -->

                <div class="bg-white rounded-3xl shadow-xl mt-8 p-8">

                    <div class="flex justify-between items-center">

                        <h2 class="text-4xl font-bold text-orange-700">

                            {{ $item->title }}

                        </h2>

                        @if($item->sold)

                            <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold">

                                Sold

                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold">

                                Available

                            </span>

                        @endif

                    </div>

                    <p class="text-gray-600 leading-8 mt-8">

                        {{ $item->description }}

                    </p>

                </div>

            </div>

            <!-- RIGHT SIDE -->
             <div>

    <div class="bg-white rounded-3xl shadow-xl p-8 sticky top-6">

        <div class="text-center">

            <h2 class="text-5xl font-extrabold text-orange-600">

                KSh {{ number_format($item->price) }}

            </h2>

        </div>

        <div class="mt-8 space-y-5">

            <div>
                <p class="text-gray-500">Category</p>
                <h3 class="font-bold text-lg">
                    {{ ucfirst($item->category) }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500">Condition</p>
                <h3 class="font-bold text-lg">
                    {{ ucfirst($item->condition) }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500">Seller</p>
                <h3 class="font-bold text-lg">
                    {{ $item->user->name }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500">Location</p>
                <h3 class="font-bold text-lg">
                    {{ $item->location }}
                </h3>
            </div>

            <div>
                <p class="text-gray-500">Phone</p>

                @if($item->sold)

                    <h3 class="font-bold text-red-600">
                        Hidden (Item Sold)
                    </h3>

                @else

                    <h3 class="font-bold text-lg">
                        {{ $item->phone }}
                    </h3>

                @endif

            </div>

        </div>

        {{-- Call Seller --}}

        @if(!$item->sold)

            <a href="tel:{{ $item->phone }}"
               class="block mt-8 bg-orange-600 hover:bg-orange-700 text-white text-center py-4 rounded-2xl font-bold">

                📞 Call Seller

            </a>

        @else

            <div class="mt-8 bg-gray-200 text-gray-700 text-center py-4 rounded-2xl font-bold">

                🚫 This item has already been sold

            </div>

        @endif

        {{-- Seller Controls --}}

        @auth

            @if(auth()->id() == $item->user_id)

                @if(!$item->sold)

                    <form action="{{ route('marketplace.sold', $item) }}"
                          method="POST"
                          class="mt-4">

                        @csrf
                        @method('PATCH')

                        <button
                            type="submit"
                            onclick="return confirm('Mark this item as sold?')"
                            class="w-full bg-red-600 hover:bg-red-700 text-white py-4 rounded-2xl font-bold">

                            ✅ Mark as Sold

                        </button>

                    </form>

                @else

                    <div class="mt-4 bg-gray-100 text-gray-700 text-center py-4 rounded-2xl font-bold">

                        ✔ This item has been sold

                    </div>

                @endif

            @endif

        @endauth

        {{-- Save Item --}}

        @if(!$item->sold)

            <form action="{{ route('marketplace.favorite', $item) }}"
                  method="POST"
                  class="mt-4">

                @csrf

                <button
                    class="w-full bg-pink-600 hover:bg-pink-700 text-white py-4 rounded-2xl font-bold">

                    ❤️ Save Item

                </button>

            </form>

        @endif

    </div>

</div>

        </div>
        <!-- Similar Items -->

        @if(isset($similarItems) && $similarItems->count())

        <div class="mt-16">

            <h2 class="text-3xl font-bold text-orange-700 mb-8">

                Similar Items

            </h2>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach($similarItems as $similar)

                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

                        @if($similar->images->count())

                            <img
                                src="{{ asset('storage/'.$similar->images->first()->image) }}"
                                class="h-52 w-full object-cover">

                        @else

                            <div class="h-52 bg-orange-100 flex items-center justify-center text-6xl">

                                📦

                            </div>

                        @endif

                        <div class="p-5">

                            <h3 class="font-bold text-xl">

                                {{ $similar->title }}

                            </h3>

                            <div class="text-orange-600 font-bold text-2xl mt-3">

                                KSh {{ number_format($similar->price) }}

                            </div>

                            @if($similar->sold)

                                <div class="mt-3 text-red-600 font-bold">

                                    Sold

                                </div>

                            @endif

                            <a href="{{ route('marketplace.show',$similar) }}"
                               class="block mt-5 bg-orange-600 hover:bg-orange-700 text-white text-center py-3 rounded-2xl font-bold">

                                View

                            </a>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

        @endif

    </div>

</div>

</x-app-layout>