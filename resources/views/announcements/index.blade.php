<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-10">

            <div>
                <h1 class="text-5xl font-bold text-sky-700">
                    📢 Campus Announcements
                </h1>

                <p class="text-gray-600 mt-2">
                    Stay updated with the latest university news.
                </p>
            </div>

            @if(auth()->user()->is_admin)
                <a href="{{ route('announcements.create') }}"
                   class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-bold shadow-lg">
                    + New Announcement
                </a>
            @endif

        </div>

        @if($announcements->count())

            <div class="grid lg:grid-cols-2 gap-8">

                @foreach($announcements as $announcement)

                    <a href="{{ route('announcements.show',$announcement) }}"
                       class="block bg-white rounded-3xl shadow-lg hover:shadow-2xl transition hover:-translate-y-2 p-8">

                        <div class="flex justify-between items-start">

                            <h2 class="text-2xl font-bold text-sky-700">
                                {{ $announcement->title }}
                            </h2>

                            <span class="text-sm text-gray-400">
                                {{ $announcement->created_at->format('M d') }}
                            </span>

                        </div>

                        <p class="text-gray-600 mt-5 leading-7">
                            {{ Str::limit($announcement->content,180) }}
                        </p>

                        <div class="mt-6 flex justify-between items-center">

                            <span class="text-sm text-gray-400">
                                {{ $announcement->created_at->diffForHumans() }}
                            </span>

                            <span class="font-bold text-sky-600">
                                Read More →
                            </span>

                        </div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="bg-white rounded-3xl shadow-lg p-16 text-center">

                <div class="text-7xl">
                    📭
                </div>

                <h2 class="text-3xl font-bold mt-6">
                    No announcements yet
                </h2>

                <p class="text-gray-500 mt-3">
                    Check back later.
                </p>

            </div>

        @endif

    </div>

</div>

</x-app-layout>