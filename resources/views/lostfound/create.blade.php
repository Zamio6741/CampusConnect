<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            <div class="bg-gradient-to-r from-orange-600 to-amber-500 text-white p-8">

                <h1 class="text-4xl font-bold">
                    🔍 Lost & Found
                </h1>

                <p class="mt-2 text-orange-100">
                    Report a lost item or an item you found.
                </p>

            </div>

            <form
                action="{{ route('lostfound.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="p-8 space-y-6">

                @csrf

                <div>

                    <label class="font-bold block mb-2">
                        Item Name
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="w-full rounded-xl border-gray-300"
                        required>

                </div>

                <div>

                    <label class="font-bold block mb-2">
                        Type
                    </label>

                    <select
                        name="type"
                        class="w-full rounded-xl border-gray-300"
                        required>

                        <option value="lost">
                            Lost Item
                        </option>

                        <option value="found">
                            Found Item
                        </option>

                    </select>

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
                            Location
                        </label>

                        <input
                            type="text"
                            name="location"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            Date
                        </label>

                        <input
                            type="date"
                            name="date"
                            class="w-full rounded-xl border-gray-300"
                            required>

                    </div>

                </div>

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
                        Upload Image (Optional)
                    </label>

                    <input
                        type="file"
                        name="image"
                        class="w-full rounded-xl border-gray-300">

                </div>

                <button
                    type="submit"
                    class="w-full bg-orange-600 hover:bg-orange-700 text-white py-4 rounded-2xl font-bold">

                    Post Lost/Found Item

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>