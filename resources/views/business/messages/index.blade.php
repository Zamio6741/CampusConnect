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

    @forelse($messages as $message)

        <div class="bg-white rounded-3xl shadow-lg p-6 mb-6 border border-gray-100 hover:shadow-xl transition">

            <div class="flex justify-between items-start">

                <div>

                    <h2 class="text-xl font-bold">
                        {{ $message->student->name }}
                    </h2>

                    <p class="text-gray-500">
                        {{ $message->student->email }}
                    </p>

                </div>

                <span class="text-sm text-gray-400">
                    {{ $message->created_at->diffForHumans() }}
                </span>

            </div>

            <div class="mt-5">

                <p class="text-gray-700 leading-7">
                    {{ $message->message }}
                </p>

            </div>

            @if($message->reply)

                <div class="mt-5 bg-green-50 border-l-4 border-green-500 rounded-xl p-4">

                    <div class="font-semibold text-green-700 mb-2">
                        Your Reply
                    </div>

                    <p class="text-gray-700">
                        {{ $message->reply }}
                    </p>

                </div>

            @else

                <div class="mt-5 bg-yellow-50 border-l-4 border-yellow-500 rounded-xl p-4">

                    <span class="font-semibold text-yellow-700">
                        Waiting for your reply
                    </span>

                </div>

            @endif

            <div class="mt-6">

                <a href="{{ route('business.messages.show',$message) }}"
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