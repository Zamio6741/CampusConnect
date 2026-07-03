<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <div class="flex justify-between items-start">

                <div>

                    <h1 class="text-5xl font-bold text-orange-600">
                        {{ $business->name }}
                    </h1>

                    <p class="mt-2 text-orange-500 font-semibold text-lg">
                        {{ $business->category }}
                    </p>

                </div>

                @if(auth()->check() && auth()->id() == $business->user_id)

                    <div class="flex gap-3">

                        <a href="{{ route('businesses.edit',$business) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl font-bold">

                            ✏ Edit

                        </a>

                        <form action="{{ route('businesses.destroy',$business) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this business?')">

                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-bold">

                                🗑 Delete

                            </button>

                        </form>

                    </div>

                @endif

            </div>

            <p class="mt-8 text-gray-700 leading-8 text-lg">

                {{ $business->description }}

            </p>

            <div class="mt-10 space-y-4">

                <div class="flex items-center gap-3">
                    <span class="text-2xl">📍</span>
                    <span>{{ $business->location }}</span>
                </div>

                <div class="flex items-center gap-3">
                    <span class="text-2xl">📞</span>
                    <span>{{ $business->phone }}</span>
                </div>

                @if($business->whatsapp)

                <div class="flex items-center gap-3">
                    <span class="text-2xl">💬</span>
                    <span>{{ $business->whatsapp }}</span>
                </div>

                @endif

                @if($business->opening_hours)

                <div class="flex items-center gap-3">
                    <span class="text-2xl">🕒</span>
                    <span>{{ $business->opening_hours }}</span>
                </div>

                @endif

            </div>

            <div class="mt-10">

                <a href="{{ route('businesses.index') }}"
                   class="text-orange-600 font-bold hover:underline">

                    ← Back to Businesses

                </a>

            </div>

        </div>

    </div>

</div>

</x-app-layout>