<x-business-layout>

<div class="min-h-screen bg-slate-100">

    <div class="max-w-5xl mx-auto py-10">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Header -->
            <div class="bg-sky-700 text-white px-8 py-6 flex justify-between items-center">

                <div>

                    <h1 class="text-3xl font-bold">
                        💬 {{ $message->student->name }}
                    </h1>

                    <p class="text-sky-100">
                        Student Conversation
                    </p>

                </div>

                <a href="{{ route('business.messages') }}"
                   class="bg-white text-sky-700 px-5 py-2 rounded-xl font-bold">

                    ← Back

                </a>

            </div>

            <!-- Messages -->

            <div id="chat-box"
                 class="h-[550px] overflow-y-auto bg-slate-50 p-8 space-y-6">

                @foreach($conversation as $chat)

                    @if($chat->sender_id == auth()->id())

                        <div class="flex justify-end">

                            <div class="max-w-lg bg-sky-600 text-white rounded-3xl rounded-br-md px-6 py-4 shadow">

                                {{ $chat->message }}

                                <div class="text-xs text-sky-200 mt-3">

                                    {{ $chat->created_at->format('d M • h:i A') }}

                                </div>

                            </div>

                        </div>

                    @else

                        <div class="flex justify-start">

                            <div class="max-w-lg bg-white border rounded-3xl rounded-bl-md px-6 py-4 shadow">

                                <div class="font-bold text-sky-700 mb-2">

                                    {{ $message->student->name }}

                                </div>

                                {{ $chat->message }}

                                <div class="text-xs text-gray-500 mt-3">

                                    {{ $chat->created_at->format('d M • h:i A') }}

                                </div>

                            </div>

                        </div>

                    @endif

                @endforeach

            </div>

            <!-- Reply -->

            <div class="border-t bg-white p-6">

                <form action="{{ route('business.messages.reply',$message) }}"
                      method="POST"
                      class="flex gap-4">

                    @csrf

                    <input
                        type="text"
                        name="message"
                        class="flex-1 rounded-2xl border-gray-300"
                        placeholder="Type your reply..."
                        required>

                    <button
                        class="bg-sky-600 hover:bg-sky-700 text-white px-8 rounded-2xl font-bold">

                        Send

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<script>
let chat=document.getElementById('chat-box');
chat.scrollTop=chat.scrollHeight;
</script>

</x-business-layout>