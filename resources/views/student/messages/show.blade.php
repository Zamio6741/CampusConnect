<x-app-layout>

    <div class="min-h-screen bg-slate-100">

        <div class="max-w-5xl mx-auto py-4 sm:py-6 lg:py-10 px-3 sm:px-5 lg:px-6">

            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden">

                {{-- ================= HEADER ================= --}}
                <div class="bg-sky-600 text-white px-4 sm:px-6 lg:px-8 py-4 sm:py-6">

                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">

                        <div class="min-w-0">

                            <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold truncate">
                                💬 {{ $message->business->business_name }}
                            </h1>

                            <p class="text-sky-100 text-sm sm:text-base mt-1">
                                Chat Conversation
                            </p>

                        </div>

                        <a
                            href="{{ route('student.messages') }}"
                            class="w-full sm:w-auto text-center bg-white text-sky-700 px-5 py-2.5 rounded-xl font-bold text-sm sm:text-base hover:bg-sky-50 transition">

                            ← Back

                        </a>

                    </div>

                </div>


                {{-- ================= CHAT ================= --}}
                <div
                    id="chat-box"
                    class="h-[60vh] min-h-[350px] max-h-[600px] overflow-y-auto bg-slate-50 p-3 sm:p-5 lg:p-8 space-y-4 sm:space-y-6">

                    @forelse($conversation as $chat)

                        @if($chat->sender_id == auth()->id())

                            {{-- Student Message --}}
                            <div class="flex justify-end">

                                <div class="max-w-[85%] sm:max-w-lg bg-sky-600 text-white rounded-2xl sm:rounded-3xl rounded-br-md px-4 sm:px-6 py-3 sm:py-4 shadow">

                                    <p class="text-sm sm:text-base leading-6 break-words">
                                        {{ $chat->message }}
                                    </p>

                                    <div class="text-[11px] sm:text-xs text-sky-200 mt-2 sm:mt-3">
                                        {{ $chat->created_at->format('d M • h:i A') }}
                                    </div>

                                </div>

                            </div>

                        @else

                            {{-- Business Message --}}
                            <div class="flex justify-start">

                                <div class="max-w-[85%] sm:max-w-lg bg-white border border-gray-200 rounded-2xl sm:rounded-3xl rounded-bl-md px-4 sm:px-6 py-3 sm:py-4 shadow">

                                    <div class="font-bold text-sky-700 mb-1 sm:mb-2 text-sm sm:text-base break-words">

                                        {{ $message->business->business_name }}

                                    </div>

                                    <p class="text-sm sm:text-base text-gray-700 leading-6 break-words">
                                        {{ $chat->message }}
                                    </p>

                                    <div class="text-[11px] sm:text-xs text-gray-500 mt-2 sm:mt-3">

                                        {{ $chat->created_at->format('d M • h:i A') }}

                                    </div>

                                </div>

                            </div>

                        @endif

                    @empty

                        <div class="h-full flex items-center justify-center text-center">

                            <div>

                                <div class="text-5xl sm:text-6xl">
                                    💬
                                </div>

                                <h2 class="text-lg sm:text-xl font-bold text-slate-700 mt-3">
                                    No messages yet
                                </h2>

                                <p class="text-gray-500 text-sm mt-1">
                                    Start the conversation below.
                                </p>

                            </div>

                        </div>

                    @endforelse

                </div>


                {{-- ================= SEND MESSAGE ================= --}}
                <div class="border-t border-gray-200 bg-white p-3 sm:p-5 lg:p-6">

                    <form
                        action="{{ route('student.messages.send', $message) }}"
                        method="POST"
                        class="flex flex-col sm:flex-row gap-3 sm:gap-4">

                        @csrf

                        <div class="flex-1">

                            <label for="message" class="sr-only">
                                Type your message
                            </label>

                            <input
                                id="message"
                                type="text"
                                name="message"
                                placeholder="Type your message..."
                                autocomplete="off"
                                class="w-full rounded-xl sm:rounded-2xl border border-gray-300 bg-white px-4 py-3 sm:py-4 text-sm sm:text-base text-gray-800 placeholder-gray-400 focus:border-sky-500 focus:ring-2 focus:ring-sky-200 outline-none"
                                required>

                        </div>

                        <button
                            type="submit"
                            class="w-full sm:w-auto bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-xl sm:rounded-2xl font-bold transition">

                            📩 <span class="sm:inline">Send</span>

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>


    {{-- Keep chat scrolled to the latest message --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chat = document.getElementById('chat-box');

            if (chat) {
                chat.scrollTop = chat.scrollHeight;
            }
        });
    </script>

</x-app-layout>