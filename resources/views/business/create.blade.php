<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10">

    <div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-xl p-10">

        <h1 class="text-4xl font-bold text-sky-700 mb-8">

            🏢 Register Your Business

        </h1>

        <form method="POST" action="{{ route('businesses.store') }}">

            @csrf

            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <label class="font-semibold">
                        Business Name
                    </label>

                    <input
                        type="text"
                        name="business_name"
                        class="w-full mt-2 border rounded-xl p-3">

                </div>

                <div>

                    <label class="font-semibold">
                        Category
                    </label>

                    <input
                        type="text"
                        name="category"
                        class="w-full mt-2 border rounded-xl p-3">

                </div>

                <div>

                    <label class="font-semibold">
                        University
                    </label>

                    <select
                        name="university_id"
                        class="w-full mt-2 border rounded-xl p-3">

                        <option value="">
                            None
                        </option>

                        @foreach($universities as $university)

                            <option value="{{ $university->id }}">
                                {{ $university->name }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="font-semibold">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        class="w-full mt-2 border rounded-xl p-3">

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

                <div>

                    <label class="font-semibold">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="w-full mt-2 border rounded-xl p-3">

                </div>

                <div class="md:col-span-2">

                    <label class="font-semibold">
                        Business Location
                    </label>

                    <input
                        type="text"
                        name="location"
                        class="w-full mt-2 border rounded-xl p-3">

                </div>

                <div class="md:col-span-2">

                    <label class="font-semibold">
                        Description
                    </label>

                    <textarea
                        rows="5"
                        name="description"
                        class="w-full mt-2 border rounded-xl p-3"></textarea>

                </div>

            </div>

            <div class="mt-8 text-right">

                <button
                    class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-4 rounded-xl">

                    Register Business

                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>