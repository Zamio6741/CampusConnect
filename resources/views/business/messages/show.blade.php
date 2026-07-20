<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-sky-100 py-10">

    <div class="max-w-5xl mx-auto">

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Header -->

            <div class="bg-sky-600 text-white px-8 py-6 flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-bold">
                        💬 Conversation
                    </h1>

                    <p class="text-sky-100 mt-1">
                        {{ $message->student->name }}
                    </p>

                </div>

                <a href="{{ route('business.messages') }}"
                   class="bg-white text-sky-600 px-5 py-2 rounded-xl font-semibold hover:bg-sky-100 transition">

                    ← Back

                </a>

            </div>

            <div class="p-8">

                <!-- Student -->

                <div class="flex justify-start mb-8">

                    <div class="max-w-xl bg-sky-100 rounded-3xl rounded-bl-md p-5">

                        <div class="font-bold text-sky-700 mb-2">
                            {{ $message->student->name }}
                        </div>

                        <p class="text-gray-700 leading-7">
                            {{ $message->message }}
                        </p>

                        <div class="text-xs text-gray-500 mt-3">
                            {{ $message->created_at->format('d M Y • h:i A') }}
                        </div>

                    </div>

                </div>

                <!-- Business Reply -->

                @if($message->reply)

                    <div class="flex justify-end mb-8">

                        <div class="max-w-xl bg-green-100 rounded-3xl rounded-br-md p-5">

                            <div class="font-bold text-green-700 mb-2">
                                You
                            </div>

                            <p class="text-gray-700 leading-7">
                                {{ $message->reply }}
                            </p>

                            <div class="text-xs text-gray-500 mt-3">
                                Replied
                            </div>

                        </div>

                    </div>

                @endif

                <hr class="my-8">

                <h2 class="text-xl font-bold mb-5">

                    @if($message->reply)
                        Update Reply
                    @else
                        Send Reply
                    @endif

                </h2>

                <form action="{{ route('business.messages.reply',$message) }}"
                      method="POST">

                    @csrf

                    <textarea
                        name="reply"
                        rows="6"
                        class="w-full rounded-2xl border-gray-300 focus:border-sky-500 focus:ring-sky-500"
                        placeholder="Type your reply here...">{{ old('reply',$message->reply) }}</textarea>

                    @error('reply')

                        <p class="text-red-600 mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                    <button
                        type="submit"
                        class="mt-6 bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-2xl font-semibold transition">

                        📩 Send Reply

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>