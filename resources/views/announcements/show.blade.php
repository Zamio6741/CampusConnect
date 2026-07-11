<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-5xl mx-auto px-6">

        <a href="{{ route('announcements.index') }}"
           class="inline-flex items-center text-sky-600 font-bold hover:underline mb-8">
            ← Back to Announcements
        </a>

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <div class="flex justify-between items-center mb-6">

                <div>

                    <h1 class="text-5xl font-bold text-sky-700">
                        {{ $announcement->title }}
                    </h1>

                    <p class="text-gray-500 mt-3">
                        Posted {{ $announcement->created_at->diffForHumans() }}
                    </p>

                </div>

                <div class="text-6xl">
                    📢
                </div>

            </div>

            <hr class="my-8">

            <div class="prose max-w-none text-gray-700 leading-8 text-lg">

                {!! nl2br(e($announcement->content)) !!}

            </div>

            @if(auth()->user()->is_admin)

            <div class="mt-10 flex gap-4">

                <a href="{{ route('announcements.edit',$announcement) }}"
                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-bold">
                    ✏ Edit
                </a>

                <form action="{{ route('announcements.destroy',$announcement) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Delete this announcement?')"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-bold">

                        🗑 Delete

                    </button>

                </form>

            </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>