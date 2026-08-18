<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-6 sm:py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Back --}}
            <a
                href="{{ route('announcements.index') }}"
                class="inline-flex items-center text-sky-600 hover:text-sky-800 font-bold text-sm sm:text-base mb-6 sm:mb-8">

                ←
                <span class="ml-2">
                    Back to Announcements
                </span>

            </a>


            {{-- Announcement --}}
            <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

                {{-- Header --}}
                <div class="bg-gradient-to-r from-sky-700 via-blue-700 to-indigo-800 text-white p-5 sm:p-8 lg:p-10">

                    <div class="flex items-start justify-between gap-4">

                        <div class="min-w-0">

                            <h1 class="text-2xl sm:text-3xl lg:text-5xl font-bold leading-tight break-words">

                                {{ $announcement->title }}

                            </h1>

                            <p class="mt-3 text-sky-100 text-sm sm:text-base">

                                Posted {{ $announcement->created_at->diffForHumans() }}

                            </p>

                        </div>

                        <div class="text-4xl sm:text-5xl lg:text-6xl shrink-0">
                            📢
                        </div>

                    </div>

                </div>


                {{-- Content --}}
                <div class="p-5 sm:p-8 lg:p-10">

                    <div class="text-gray-700 text-base sm:text-lg leading-7 sm:leading-8 break-words">

                        {!! nl2br(e($announcement->content)) !!}

                    </div>


                    {{-- Admin Controls --}}
                    @if(auth()->user()->is_admin)

                        <div class="mt-8 pt-6 border-t border-gray-200">

                            <div class="flex flex-col sm:flex-row gap-3">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('announcements.edit', $announcement) }}"
                                    class="w-full sm:w-auto inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-bold transition">

                                    ✏️
                                    <span class="ml-2">
                                        Edit
                                    </span>

                                </a>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('announcements.destroy', $announcement) }}"
                                    method="POST"
                                    class="w-full sm:w-auto">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this announcement?')"
                                        class="w-full sm:w-auto inline-flex items-center justify-center bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold transition">

                                        🗑️
                                        <span class="ml-2">
                                            Delete
                                        </span>

                                    </button>

                                </form>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>