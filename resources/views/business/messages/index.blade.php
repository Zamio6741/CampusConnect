<x-app-layout>

<div class="max-w-7xl mx-auto py-10">

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-4xl font-bold">
                💬 Customer Messages
            </h1>

            <p class="text-gray-500 mt-2">
                View and reply to messages from students.
            </p>
        </div>

    </div>

    @forelse($messages as $conversation)

        @php
            $first = $conversation->first();
            $last = $conversation->last();
        @endphp

        <div class="bg-white rounded-3xl shadow-lg p-6 mb-6 border border-gray-100 hover:shadow-xl transition">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-xl font-bold">
                        {{ $first->student->name }}
                    </h2>

                    <p class="text-gray-500">
                        {{ $first->student->email }}
                    </p>

                </div>

                <span class="text-sm text-gray-400">
                    {{ $last->created_at->diffForHumans() }}
                </span>

            </div>

            <div class="mt-5">

                <p class="text-gray-700 leading-7">
                    {{ Str::limit($last->message, 120) }}
                </p>

            </div>

            <div class="mt-4 text-sm text-gray-500">
                {{ $conversation->count() }} messages
            </div>

            <div class="mt-6">

                <a href="{{ route('business.messages.show', $first) }}"
                   class="inline-flex items-center px-5 py-3 bg-sky-600 hover:bg-sky-700 text-white rounded-xl">

                    Open Conversation

                </a>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-3xl shadow-lg p-12 text-center">

            <div class="text-6xl mb-4">
                📭
            </div>

            <h2 class="text-2xl font-bold mb-2">
                No Messages Yet
            </h2>

            <p class="text-gray-500">
                Students haven't contacted your business yet.
            </p>

        </div>

    @endforelse

</div>

</x-app-layout>