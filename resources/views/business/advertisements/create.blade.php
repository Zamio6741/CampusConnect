<x-app-layout>

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-sky-600 px-8 py-6">

            <h1 class="text-3xl font-bold text-white">
                📢 Create Advertisement
            </h1>

            <p class="text-sky-100 mt-2">
                Promote your business to more students.
            </p>

        </div>

        <div class="p-8">

            <form
                action="{{ route('business.advertisements.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Advertisement Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="w-full rounded-xl border-gray-300"
                        required>

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-xl border-gray-300">{{ old('description') }}</textarea>

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Advertisement Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="w-full rounded-xl">

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-semibold mb-2">
                            Start Date
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ old('start_date') }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="block font-semibold mb-2">
                            End Date
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ old('end_date') }}"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                </div>

                <div class="mt-8">

                    <label class="inline-flex items-center">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            checked>

                        <span class="ml-3">
                            Activate Advertisement
                        </span>

                    </label>

                </div>

                <button
                    class="mt-8 bg-sky-600 hover:bg-sky-700 text-white px-8 py-3 rounded-2xl font-bold">

                    🚀 Publish Advertisement

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>