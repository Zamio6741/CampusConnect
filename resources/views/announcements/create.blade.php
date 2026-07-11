<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-100 via-sky-200 to-blue-100 py-10">

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <h1 class="text-4xl font-bold text-blue-700 mb-8">
                📢 Post New Announcement
            </h1>

            <form action="{{ route('announcements.store') }}" method="POST">

                @csrf

                <div class="mb-6">

                    <label class="block font-bold mb-2">
                        Title
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ old('title') }}"
                           class="w-full border rounded-xl p-4 focus:ring-2 focus:ring-blue-500">

                    @error('title')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <div class="mb-8">

                    <label class="block font-bold mb-2">
                        Announcement
                    </label>

                    <textarea
                        name="content"
                        rows="8"
                        class="w-full border rounded-xl p-4 focus:ring-2 focus:ring-blue-500">{{ old('content') }}</textarea>

                    @error('content')
                        <p class="text-red-500 mt-2">{{ $message }}</p>
                    @enderror

                </div>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl font-bold">

                    🚀 Publish Announcement

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>