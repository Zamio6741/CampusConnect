<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="bg-orange-600 text-white p-8">

                <h1 class="text-4xl font-bold">
                    🏫 Post Campus Hostel
                </h1>

                <p class="mt-2 text-orange-100">
                    Create a university hostel listing.
                </p>

            </div>

          <form
    action="{{ route('campus.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="p-8 space-y-6">

    @csrf

    <input
        type="hidden"
        name="listing_type"
        value="campus">

    <input
        type="hidden"
        name="property_type"
        value="hostel">

                @csrf

                <input type="hidden"
                       name="listing_type"
                       value="campus">

                <input type="hidden"
                       name="property_type"
                       value="hostel">

                <div>

                    <label class="font-bold block mb-2">
                        Hostel Name
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="w-full rounded-xl border-gray-300"
                        required>

                </div>

                <div>

                    <label class="font-bold block mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full rounded-xl border-gray-300"
                        required></textarea>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="font-bold block mb-2">
                            Available Spaces
                        </label>

                        <input
                            type="number"
                            name="available_spaces"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            Monthly Fee
                        </label>

                        <input
                            type="number"
                            name="price"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                </div>

                <div>

                    <label class="font-bold block mb-2">
                        Hostel Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        class="w-full rounded-xl border-gray-300"
                        required>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="font-bold block mb-2">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            class="w-full rounded-xl border-gray-300">

                    </div>

                </div>

                <div>

                    <label class="font-bold block mb-2">
                        Hostel Photos
                    </label>

                    <input
                        type="file"
                        name="images[]"
                        multiple
                        class="w-full rounded-xl border-gray-300">

                </div>

                <div class="flex gap-4">

                    <button
                        class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-xl font-bold">

                        Publish Hostel

                    </button>

                    <a href="{{ route('campus.index') }}"
                       class="bg-gray-300 px-8 py-4 rounded-xl font-bold">

                        Cancel

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>