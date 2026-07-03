<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <h1 class="text-4xl font-bold text-orange-600 mb-8">
                🏪 Post Your Business
            </h1>

            <form action="{{ route('businesses.store') }}" method="POST">

                @csrf

                <div class="mb-5">
                    <label class="font-semibold">Business Name</label>

                    <input type="text"
                           name="name"
                           class="w-full mt-2 border rounded-xl p-3"
                           required>
                </div>

                <div class="mb-5">
                    <label class="font-semibold">Category</label>

                    <select name="category"
                            class="w-full mt-2 border rounded-xl p-3"
                            required>

                        <option>Restaurant</option>
                        <option>Hostel</option>
                        <option>Barbershop</option>
                        <option>Salon</option>
                        <option>Laundry</option>
                        <option>Electronics</option>
                        <option>Bookshop</option>
                        <option>Cyber Cafe</option>
                        <option>Supermarket</option>
                        <option>Other</option>

                    </select>
                </div>

                <div class="mb-5">

                    <label class="font-semibold">Description</label>

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full mt-2 border rounded-xl p-3"
                        required></textarea>

                </div>

                <div class="grid grid-cols-2 gap-5">

                    <div>

                        <label class="font-semibold">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="w-full mt-2 border rounded-xl p-3"
                            required>

                    </div>

                    <div>

                        <label class="font-semibold">
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            class="w-full mt-2 border rounded-xl p-3">

                    </div>

                </div>

                <div class="mt-5">

                    <label class="font-semibold">
                        Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        class="w-full mt-2 border rounded-xl p-3"
                        required>

                </div>

                <div class="mt-5">

                    <label class="font-semibold">
                        Opening Hours
                    </label>

                    <input
                        type="text"
                        name="opening_hours"
                        placeholder="8:00 AM - 8:00 PM"
                        class="w-full mt-2 border rounded-xl p-3">

                </div>

                <button
                    class="mt-8 bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-2xl font-bold">

                    🚀 Post Business

                </button>

            </form>

        </div>

    </div>

</div>

</x-app-layout>