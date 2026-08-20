<x-business-layout>

<div class="min-h-screen bg-slate-100">


<div class="max-w-5xl mx-auto px-2 sm:px-4 lg:px-6 py-3 sm:py-6">

    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">

        <!-- ========================================================= -->
        <!-- HEADER -->
        <!-- ========================================================= -->

        <div class="bg-sky-700 text-white px-4 sm:px-6 py-4 border-b border-sky-800">

            <div class="flex items-center justify-between gap-3">

                <div class="flex items-center gap-3 min-w-0">

                    <div class="w-10 h-10 rounded-full bg-white/15 border border-white/30 flex items-center justify-center shrink-0">
                        👤
                    </div>

                    <div class="min-w-0">

                        <h1 class="text-base sm:text-xl font-bold truncate">
                            {{ $message->student->name }}
                        </h1>

                        <p class="text-xs text-sky-100">
                            Student Conversation
                        </p>

                    </div>

                </div>

                <a
                    href="{{ route('business.messages') }}"
                    class="shrink-0 bg-white text-sky-700 hover:bg-sky-50 border border-white px-3 py-2 rounded-lg font-semibold text-xs sm:text-sm transition"
                >
                    ← <span class="hidden sm:inline">Back</span>
                </a>

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- CHAT AREA -->
        <!-- ========================================================= -->

        <div
            id="chat-box"
            class="h-[calc(100vh-230px)] min-h-[420px] max-h-[650px] overflow-y-auto bg-slate-50 px-3 sm:px-5 py-4 space-y-2.5 border-x border-slate-200"
        >

            @foreach($conversation as $chat)

                @if($chat->sender_id == auth()->id())

                    <!-- ================================================= -->
                    <!-- SENT MESSAGE -->
                    <!-- ================================================= -->

                    <div class="flex justify-end">

                        <div class="flex-none max-w-[78%] sm:max-w-[65%]">

                            <div class="w-fit max-w-full bg-sky-600 text-white rounded-2xl rounded-br-sm px-3 py-2 shadow-sm border border-sky-700">

                                <div class="text-sm leading-5 whitespace-pre-wrap break-words">
                                    {{ $chat->message }}
                                </div>

                                <div class="flex justify-end items-center gap-1 mt-1">

                                    <span class="text-[9px] text-sky-100 whitespace-nowrap">
                                        {{ $chat->created_at->timezone('Africa/Nairobi')->format('h:i A') }}
                                    </span>

                                    <span class="text-[10px] text-sky-100">
                                        ✓✓
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                @else

                    <!-- ================================================= -->
                    <!-- RECEIVED MESSAGE -->
                    <!-- ================================================= -->

                    <div class="flex justify-start">

                        <div class="flex-none max-w-[78%] sm:max-w-[65%]">

                            <div class="w-fit max-w-full bg-white rounded-2xl rounded-bl-sm px-3 py-2 shadow-sm border border-slate-200">

                                <div class="text-xs font-semibold text-sky-700 mb-0.5">
                                    {{ $message->student->name }}
                                </div>

                                <div class="text-sm text-slate-700 leading-5 whitespace-pre-wrap break-words">
                                    {{ $chat->message }}
                                </div>

                                <div class="text-[9px] text-slate-400 mt-1">
                                    {{ $chat->created_at->timezone('Africa/Nairobi')->format('h:i A') }}
                                </div>

                            </div>

                        </div>

                    </div>

                @endif

            @endforeach

        </div>


        <!-- ========================================================= -->
        <!-- SENDING STATUS -->
        <!-- ========================================================= -->

        <div
            id="sending-status"
            class="hidden px-4 py-2 bg-slate-50 border-t border-slate-200"
        >

            <div class="flex items-center gap-2 text-xs text-slate-500">

                <span class="flex gap-1">

                    <span class="w-1.5 h-1.5 bg-sky-500 rounded-full animate-bounce"></span>

                    <span class="w-1.5 h-1.5 bg-sky-500 rounded-full animate-bounce [animation-delay:0.15s]"></span>

                    <span class="w-1.5 h-1.5 bg-sky-500 rounded-full animate-bounce [animation-delay:0.3s]"></span>

                </span>

                Sending...

            </div>

        </div>


        <!-- ========================================================= -->
        <!-- ERROR -->
        <!-- ========================================================= -->

        <div
            id="chat-error"
            class="hidden mx-3 mb-3 bg-red-50 border border-red-200 text-red-700 rounded-lg px-3 py-2 text-xs"
        ></div>


        <!-- ========================================================= -->
        <!-- MESSAGE COMPOSER -->
        <!-- ========================================================= -->

        <div class="border-t border-slate-200 bg-white p-3">

            <form
                id="reply-form"
                action="{{ route('business.messages.reply',$message) }}"
                method="POST"
                class="flex items-end gap-2"
            >

                @csrf

                <div class="flex-1">

                    <label
                        for="message-input"
                        class="sr-only"
                    >
                        Type your reply
                    </label>

                    <textarea
                        id="message-input"
                        name="message"
                        rows="1"
                        class="w-full resize-none rounded-xl border-2 border-slate-300 bg-slate-50 px-3 py-2.5 text-sm text-slate-800 placeholder-slate-400 focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none"
                        placeholder="Type a message..."
                        autocomplete="off"
                        required
                    ></textarea>

                </div>

                <button
                    id="send-button"
                    type="submit"
                    class="shrink-0 w-11 h-11 bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white rounded-xl font-bold flex items-center justify-center transition disabled:opacity-60"
                >

                    <span id="send-icon">
                        ➤
                    </span>

                </button>

            </form>

            <p class="text-[9px] text-slate-400 mt-1 px-1">
                Enter to send • Shift + Enter for a new line
            </p>

        </div>

    </div>

</div>


</div>

<!-- ============================================================= -->

<!-- AJAX CHAT -->

<!-- ============================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const chatBox = document.getElementById('chat-box');
    const form = document.getElementById('reply-form');
    const input = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');
    const sendIcon = document.getElementById('send-icon');
    const sendingStatus = document.getElementById('sending-status');
    const errorBox = document.getElementById('chat-error');

    let isSending = false;
    let refreshInProgress = false;


    /*
    |--------------------------------------------------------------------------
    | Scroll to bottom
    |--------------------------------------------------------------------------
    */

    function scrollToBottom(smooth = false) {

        chatBox.scrollTo({
            top: chatBox.scrollHeight,
            behavior: smooth ? 'smooth' : 'auto'
        });

    }

    scrollToBottom(false);


    /*
    |--------------------------------------------------------------------------
    | Input resizing
    |--------------------------------------------------------------------------
    */

    function resizeInput() {

        input.style.height = 'auto';

        input.style.height =
            Math.min(input.scrollHeight, 100) + 'px';

    }

    input.addEventListener('input', resizeInput);


    /*
    |--------------------------------------------------------------------------
    | Enter sends message
    |--------------------------------------------------------------------------
    */

    input.addEventListener('keydown', function (event) {

        if (
            event.key === 'Enter' &&
            !event.shiftKey &&
            !event.isComposing
        ) {

            event.preventDefault();

            form.requestSubmit();

        }

    });


    /*
    |--------------------------------------------------------------------------
    | Error handling
    |--------------------------------------------------------------------------
    */

    function showError(message) {

        errorBox.textContent = message;

        errorBox.classList.remove('hidden');

    }


    function clearError() {

        errorBox.textContent = '';

        errorBox.classList.add('hidden');

    }


    /*
    |--------------------------------------------------------------------------
    | Add message instantly
    |--------------------------------------------------------------------------
    |
    | The message is displayed immediately in the chat instead of waiting
    | for the whole conversation HTML to be downloaded again.
    |
    */

    function addMessageImmediately(message) {

        const wrapper = document.createElement('div');

        wrapper.className = 'flex justify-end';

        const outer = document.createElement('div');

        outer.className =
            'flex-none max-w-[78%] sm:max-w-[65%]';

        const bubble = document.createElement('div');

        bubble.className =
            'w-fit max-w-full bg-sky-600 text-white rounded-2xl rounded-br-sm px-3 py-2 shadow-sm border border-sky-700';

        const text = document.createElement('div');

        text.className =
            'text-sm leading-5 whitespace-pre-wrap break-words';

        text.textContent = message;

        const meta = document.createElement('div');

        meta.className =
            'flex justify-end items-center gap-1 mt-1';

        const time = document.createElement('span');

        time.className =
            'text-[9px] text-sky-100 whitespace-nowrap';

        time.textContent =
            new Date().toLocaleTimeString([], {
                hour: '2-digit',
                minute: '2-digit'
            });

        const ticks = document.createElement('span');

        ticks.className =
            'text-[10px] text-sky-100';

        ticks.textContent = '✓';

        meta.appendChild(time);

        meta.appendChild(ticks);

        bubble.appendChild(text);

        bubble.appendChild(meta);

        outer.appendChild(bubble);

        wrapper.appendChild(outer);

        chatBox.appendChild(wrapper);

        scrollToBottom(true);

    }


    /*
    |--------------------------------------------------------------------------
    | SEND MESSAGE
    |--------------------------------------------------------------------------
    */

    form.addEventListener('submit', async function (event) {

        event.preventDefault();

        if (isSending) {
            return;
        }

        const messageText = input.value.trim();

        if (!messageText) {

            input.focus();

            return;

        }

        clearError();

        /*
        |----------------------------------------------------------------------
        | Save message text before clearing input
        |----------------------------------------------------------------------
        */

        const messageToSend = messageText;

        /*
        |----------------------------------------------------------------------
        | Show message immediately
        |----------------------------------------------------------------------
        */

        addMessageImmediately(messageToSend);

        /*
        |----------------------------------------------------------------------
        | Clear composer immediately
        |----------------------------------------------------------------------
        */

        input.value = '';

        resizeInput();

        input.focus();

        /*
        |----------------------------------------------------------------------
        | Sending state
        |----------------------------------------------------------------------
        */

        isSending = true;

        sendButton.disabled = true;

        sendIcon.textContent = '⏳';

        sendingStatus.classList.remove('hidden');


        try {

            const formData = new FormData(form);

            /*
            |------------------------------------------------------------------
            | IMPORTANT
            |------------------------------------------------------------------
            |
            | The message is sent in the background.
            | The browser does NOT reload.
            |
            */

            const response = await fetch(form.action, {

                method: 'POST',

                body: formData,

                headers: {

                    'X-Requested-With': 'XMLHttpRequest',

                    'Accept': 'application/json'

                },

                credentials: 'same-origin'

            });


            if (!response.ok) {

                throw new Error(
                    'Message could not be sent.'
                );

            }


            /*
            |------------------------------------------------------------------
            | Mark message as delivered
            |------------------------------------------------------------------
            */

            const lastMessage =
                chatBox.lastElementChild;

            if (lastMessage) {

                const tick =
                    lastMessage.querySelector(
                        '.text-sky-100'
                    );

                if (tick) {

                    tick.textContent = '✓✓';

                }

            }


        } catch (error) {

            console.error(error);

            showError(
                'Message could not be sent. Please try again.'
            );

        } finally {

            isSending = false;

            sendButton.disabled = false;

            sendIcon.textContent = '➤';

            sendingStatus.classList.add('hidden');

        }

    });


    /*
    |--------------------------------------------------------------------------
    | BACKGROUND MESSAGE REFRESH
    |--------------------------------------------------------------------------
    |
    | Only refreshes the chat every few seconds.
    | The browser page itself is NEVER reloaded.
    |
    */

    async function refreshMessages() {

        if (refreshInProgress || isSending) {
            return;
        }

        refreshInProgress = true;

        try {

            const response = await fetch(
                window.location.href + '?chat_refresh=1',
                {
                    method: 'GET',

                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'text/html'
                    },

                    credentials: 'same-origin',

                    cache: 'no-store'
                }
            );


            if (!response.ok) {
                return;
            }


            const html = await response.text();

            const parser = new DOMParser();

            const remoteDocument =
                parser.parseFromString(
                    html,
                    'text/html'
                );

            const newChatBox =
                remoteDocument.getElementById(
                    'chat-box'
                );


            if (!newChatBox) {
                return;
            }


            /*
            |------------------------------------------------------------------
            | Only update if the server actually contains something different
            |------------------------------------------------------------------
            */

            if (
                newChatBox.innerHTML.trim() !==
                chatBox.innerHTML.trim()
            ) {

                const distanceFromBottom =
                    chatBox.scrollHeight -
                    chatBox.scrollTop -
                    chatBox.clientHeight;

                const wasNearBottom =
                    distanceFromBottom < 120;

                chatBox.innerHTML =
                    newChatBox.innerHTML;

                if (wasNearBottom) {

                    scrollToBottom(true);

                }

            }

        } catch (error) {

            console.log(
                'Background refresh failed:',
                error
            );

        } finally {

            refreshInProgress = false;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Check for incoming messages
    |--------------------------------------------------------------------------
    */

    setInterval(function () {

        if (!isSending) {

            refreshMessages();

        }

    }, 5000);

});

</script>

</x-business-layout>
