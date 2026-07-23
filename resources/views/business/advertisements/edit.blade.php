<x-app-layout>

<div class="max-w-5xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-orange-500 px-8 py-6">

            <h1 class="text-3xl font-bold text-white">
                ✏ Edit Advertisement
            </h1>

            <p class="text-orange-100 mt-2">
                Update your advertisement.
            </p>

        </div>

        <div class="p-8">

            <form
                action="{{ route('business.advertisements.update',$advertisement) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        value="{{ old('title',$advertisement->title) }}"
                        class="w-full rounded-xl border-gray-300">

                </div>

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-xl border-gray-300">{{ old('description',$advertisement->description) }}</textarea>

                </div>

                @if($advertisement->image)

                    <div class="mb-6">

                        <img
                            src="{{ asset('storage/'.$advertisement->image) }}"
                            class="w-72 rounded-2xl shadow">

                    </div>

                @endif

                <div class="mb-6">

                    <label class="block font-semibold mb-2">
                        Replace Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="w-full">

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="block font-semibold mb-2">
                            Start Date
                        </label>

                        <input
                            type="date"
                            name="start_date"
                            value="{{ $advertisement->start_date }}"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                    <div>

                        <label class="block font-semibold mb-2">
                            End Date
                        </label>

                        <input
                            type="date"
                            name="end_date"
                            value="{{ $advertisement->end_date }}"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                </div>

                <div class="mt-8">

                    <label class="inline-flex items-center">

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ $advertisement->is_active ? 'checked' : '' }}>

                        <span class="ml-3">

                            Advertisement Active

                        </span>

                    </label>

                </div>

                <button
                    class="mt-8 bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-2xl font-bold">

                    💾 Save Changes

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>