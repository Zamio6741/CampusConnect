<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-sky-100 py-10">

    <div class="max-w-6xl mx-auto">

        <h1 class="text-4xl font-bold text-slate-800 mb-8">
            💬 My Messages
        </h1>

        @forelse($messages as $conversation)

            @php
                $first = $conversation->first();
                $last = $conversation->last();
            @endphp

            <div class="bg-white rounded-3xl shadow-lg p-6 mb-6 hover:shadow-xl transition">

                <div class="flex justify-between items-center">

                    <div>

                        <h2 class="text-2xl font-bold">
                            {{ $first->business->business_name }}
                        </h2>

                        <p class="text-gray-500 mt-1">
                            {{ \Illuminate\Support\Str::limit($last->message,70) }}
                        </p>

                        <small class="text-gray-400">
                            {{ $last->created_at->diffForHumans() }}
                        </small>

                    </div>

                    <div>

                        @if($last->sender_id == auth()->id())

                            <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl font-semibold">
                                Waiting
                            </span>

                        @else

                            <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl font-semibold">
                                ✔ Replied
                            </span>

                        @endif

                    </div>

                </div>

                <div class="mt-6">

                    <a href="{{ route('student.messages.show',$first) }}"
                       class="inline-flex items-center px-6 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-xl font-semibold">

                        Open Conversation

                    </a>

                </div>

            </div>

        @empty

            <div class="bg-white rounded-3xl shadow-xl p-20 text-center">

                <div class="text-7xl">
                    💬
                </div>

                <h2 class="text-3xl font-bold mt-6">
                    No conversations yet
                </h2>

            </div>

        @endforelse

    </div>

</div>

</x-app-layout>