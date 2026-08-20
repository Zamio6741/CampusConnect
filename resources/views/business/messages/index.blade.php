<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-sky-50 to-blue-100">


<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8 lg:py-10">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6 sm:mb-8">

        <div class="min-w-0">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-2xl bg-sky-100 border border-sky-200 flex items-center justify-center text-xl sm:text-2xl shrink-0">
                    💬
                </div>

                <div>

                    <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-800">
                        Customer Messages
                    </h1>

                    <p class="text-sm sm:text-base text-gray-500 mt-1">
                        View and reply to messages from students.
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- Message Count -->
    <div class="mb-6 sm:mb-8 bg-white border border-slate-200 rounded-2xl shadow-sm px-4 sm:px-6 py-4">

        <div class="flex items-center justify-between gap-4">

            <div class="flex items-center gap-3 min-w-0">

                <div class="w-10 h-10 rounded-xl bg-sky-100 border border-sky-200 flex items-center justify-center text-lg shrink-0">
                    📨
                </div>

                <div>

                    <p class="text-xs sm:text-sm text-gray-500">
                        Total Conversations
                    </p>

                    <p class="text-xl sm:text-2xl font-extrabold text-slate-800">
                        {{ $messages->count() }}
                    </p>

                </div>

            </div>

            <span class="hidden sm:inline-flex bg-sky-50 border border-sky-200 text-sky-700 px-3 py-1.5 rounded-full text-sm font-semibold">
                {{ $messages->count() }} {{ Str::plural('conversation', $messages->count()) }}
            </span>

        </div>

    </div>

    <!-- Conversations -->
    @forelse($messages as $conversation)

        @php
            $first = $conversation->first();
            $last = $conversation->last();
            $messageCount = $conversation->count();
        @endphp

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-md border border-slate-200 p-4 sm:p-6 lg:p-7 mb-5 sm:mb-6 hover:shadow-xl hover:border-sky-200 transition duration-200">

            <!-- Conversation Header -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">

                <div class="flex items-start gap-3 sm:gap-4 min-w-0">

                    <!-- Student Avatar -->
                    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-full bg-sky-100 border border-sky-200 flex items-center justify-center text-lg sm:text-xl shrink-0">
                        👤
                    </div>

                    <div class="min-w-0">

                        <h2 class="text-lg sm:text-xl font-bold text-slate-800 truncate">
                            {{ $first->student->name }}
                        </h2>

                        <p class="text-sm text-gray-500 truncate max-w-full sm:max-w-md">
                            {{ $first->student->email }}
                        </p>

                    </div>

                </div>

                <div class="flex items-center justify-between sm:justify-end gap-3 sm:gap-4">

                    <span class="text-xs sm:text-sm text-gray-400 whitespace-nowrap">
                        {{ $last->created_at->diffForHumans() }}
                    </span>

                    <!-- Conversation Number -->
                    <span class="inline-flex items-center justify-center min-w-8 h-8 px-2 rounded-full bg-slate-100 border border-slate-200 text-slate-600 text-sm font-bold">
                        #{{ $loop->iteration }}
                    </span>

                </div>

            </div>

            <!-- Message Preview -->
            <div class="mt-5 sm:mt-6 bg-slate-50 border border-slate-200 rounded-2xl p-4 sm:p-5">

                <div class="flex items-center gap-2 mb-2">

                    <span class="text-sm">
                        💭
                    </span>

                    <span class="text-xs sm:text-sm font-semibold text-slate-500 uppercase tracking-wide">
                        Latest Message
                    </span>

                </div>

                <p class="text-sm sm:text-base text-gray-700 leading-6 sm:leading-7 break-words">
                    {{ Str::limit($last->message, 120) }}
                </p>

            </div>

            <!-- Conversation Statistics -->
            <div class="mt-4 sm:mt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">

                <div class="inline-flex items-center gap-2 bg-sky-50 border border-sky-200 text-sky-700 px-3 sm:px-4 py-2 rounded-xl w-fit">

                    <span>
                        💬
                    </span>

                    <span class="text-sm font-semibold">
                        {{ $messageCount }} {{ Str::plural('message', $messageCount) }}
                    </span>

                </div>

                <div class="text-xs sm:text-sm text-gray-400">
                    Conversation #{{ $loop->iteration }}
                </div>

            </div>

            <!-- Action -->
            <div class="mt-5 sm:mt-6">

                <a href="{{ route('business.messages.show', $first) }}"
                   class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white rounded-xl font-semibold shadow-sm hover:shadow transition">

                    <span>💬</span>

                    <span>
                        Open Conversation
                    </span>

                    <span>
                        →
                    </span>

                </a>

            </div>

        </div>

    @empty

        <!-- Empty State -->
        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg border border-slate-200 p-8 sm:p-12 lg:p-16 text-center">

            <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-full bg-sky-50 border border-sky-200 flex items-center justify-center text-5xl sm:text-6xl">
                📭
            </div>

            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-800 mt-6">
                No Messages Yet
            </h2>

            <p class="text-sm sm:text-base text-gray-500 mt-3 max-w-md mx-auto leading-6">
                Students haven't contacted your business yet. New conversations will appear here.
            </p>

        </div>

    @endforelse

</div>


</div>

</x-business-layout>
