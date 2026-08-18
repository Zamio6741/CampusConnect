<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-sky-100 py-6 sm:py-8 lg:py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ================= HEADER ================= --}}
            <div class="mb-6 sm:mb-8 lg:mb-10">

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-800 leading-tight">
                    💬 My Messages
                </h1>

                <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base">
                    View and manage your conversations with businesses.
                </p>

            </div>


            {{-- ================= CONVERSATIONS ================= --}}
            @forelse($messages as $conversation)

                @php
                    $first = $conversation->first();
                    $last = $conversation->last();
                @endphp


                <div class="bg-white rounded-2xl sm:rounded-3xl border-2 border-slate-200 shadow-lg p-4 sm:p-6 lg:p-7 mb-5 sm:mb-6 hover:shadow-xl transition duration-300">

                    {{-- Conversation Header --}}
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">


                        {{-- Business Information --}}
                        <div class="min-w-0 flex-1">

                            <div class="flex items-start gap-3">

                                {{-- Business Icon --}}
                                <div class="w-12 h-12 sm:w-14 sm:h-14 flex-shrink-0 rounded-xl sm:rounded-2xl bg-sky-100 border border-sky-200 flex items-center justify-center text-2xl sm:text-3xl">
                                    🏪
                                </div>


                                <div class="min-w-0">

                                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800 break-words">

                                        {{ $first->business->business_name }}

                                    </h2>


                                    <p class="text-gray-500 mt-1 text-sm sm:text-base break-words">

                                        {{ \Illuminate\Support\Str::limit($last->message, 70) }}

                                    </p>


                                    <small class="text-gray-400 block mt-1 text-xs sm:text-sm">

                                        {{ $last->created_at->diffForHumans() }}

                                    </small>

                                </div>

                            </div>

                        </div>


                        {{-- Conversation Status --}}
                        <div class="flex-shrink-0">

                            @if($last->sender_id == auth()->id())

                                <span class="inline-flex items-center bg-yellow-100 border border-yellow-300 text-yellow-700 px-3 sm:px-4 py-2 rounded-xl font-semibold text-sm">

                                    ⏳ Waiting

                                </span>

                            @else

                                <span class="inline-flex items-center bg-green-100 border border-green-300 text-green-700 px-3 sm:px-4 py-2 rounded-xl font-semibold text-sm">

                                    ✔ Replied

                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Divider --}}
                    <div class="border-t border-slate-200 mt-5 sm:mt-6"></div>


                    {{-- Action --}}
                    <div class="mt-5 sm:mt-6">

                        <a
                            href="{{ route('student.messages.show', $first) }}"
                            class="flex items-center justify-center w-full sm:w-auto px-6 py-3 bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white rounded-xl font-semibold transition shadow-sm">

                            💬 Open Conversation

                        </a>

                    </div>

                </div>


            @empty


                {{-- ================= EMPTY STATE ================= --}}
                <div class="bg-white rounded-2xl sm:rounded-3xl border-2 border-slate-200 shadow-xl p-10 sm:p-16 lg:p-20 text-center">

                    <div class="w-20 h-20 sm:w-24 sm:h-24 mx-auto rounded-3xl bg-sky-100 border border-sky-200 flex items-center justify-center text-5xl sm:text-6xl">

                        💬

                    </div>


                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mt-5 sm:mt-6 text-slate-800">

                        No conversations yet

                    </h2>


                    <p class="text-gray-500 mt-2 sm:mt-3 text-sm sm:text-base max-w-md mx-auto">

                        When you contact a business, your conversations will appear here.

                    </p>


                    <a
                        href="{{ route('businesses.index') }}"
                        class="inline-flex items-center justify-center mt-6 bg-sky-600 hover:bg-sky-700 active:bg-sky-800 text-white px-6 py-3 rounded-xl font-bold transition">

                        🏪 Browse Businesses

                    </a>

                </div>


            @endforelse

        </div>

    </div>

</x-app-layout>