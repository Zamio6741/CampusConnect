<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <h1 class="text-4xl font-bold text-blue-700 mb-8">

                ✏ Edit Announcement

            </h1>

            <form action="{{ route('announcements.update',$announcement) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-6">

                    <label class="block font-bold mb-2">

                        Title

                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title',$announcement->title) }}"
                        class="w-full border rounded-xl p-4">

                </div>

                <div class="mb-8">

                    <label class="block font-bold mb-2">

                        Content

                    </label>

                    <textarea
                        name="content"
                        rows="8"
                        class="w-full border rounded-xl p-4">{{ old('content',$announcement->content) }}</textarea>

                </div>

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-bold">

                    💾 Save Changes

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>