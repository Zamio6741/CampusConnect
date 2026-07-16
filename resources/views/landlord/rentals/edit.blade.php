<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10">

    <div class="max-w-5xl mx-auto px-6">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-4xl font-extrabold text-slate-800">
                    ✏ Edit Rental
                </h1>

                <p class="text-gray-500 mt-2">
                    Update your property information.
                </p>
            </div>

            <a href="{{ route('rentals.index') }}"
               class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-300 rounded-xl text-gray-700 font-semibold shadow hover:bg-gray-100 transition">

                ← Back

            </a>

        </div>

        @if ($errors->any())

            <div class="mb-6 rounded-xl bg-red-100 border border-red-300 p-4">

                <ul class="list-disc pl-5 text-red-700">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        @if(session('success'))

            <div class="mb-6 rounded-xl bg-green-100 border border-green-300 p-4 text-green-700">

                {{ session('success') }}

            </div>

        @endif

        <div class="bg-white rounded-3xl shadow-lg p-8">

            <form
                method="POST"
                action="{{ route('rentals.update',$accommodation) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="font-bold block mb-2">
                            Property Type
                        </label>

                        <select
                            name="property_type"
                            class="w-full border rounded-xl p-3">

                            @foreach([
                                'hostel',
                                'bedsitter',
                                'single_room',
                                'one_bedroom',
                                'two_bedroom',
                                'shared_room'
                            ] as $type)

                                <option
                                    value="{{ $type }}"
                                    @selected($accommodation->property_type==$type)>

                                    {{ ucwords(str_replace('_',' ',$type)) }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            University
                        </label>

                        <select
                            name="university_id"
                            class="w-full border rounded-xl p-3">

                            @foreach($universities as $university)

                                <option
                                    value="{{ $university->id }}"
                                    @selected($accommodation->university_id==$university->id)>

                                    {{ $university->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            Nearby Area
                        </label>

                        <select
                            name="nearby_area_id"
                            class="w-full border rounded-xl p-3">

                            @foreach($areas as $area)

                                <option
                                    value="{{ $area->id }}"
                                    @selected($accommodation->nearby_area_id==$area->id)>

                                    {{ $area->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            Location
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location',$accommodation->location) }}"
                            class="w-full border rounded-xl p-3">

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            Monthly Rent
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price',$accommodation->price) }}"
                            class="w-full border rounded-xl p-3">

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone',$accommodation->phone) }}"
                            class="w-full border rounded-xl p-3">

                    </div>

                    <div>

                        <label class="font-bold block mb-2">
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp',$accommodation->whatsapp) }}"
                            class="w-full border rounded-xl p-3">

                    </div>

                </div>

                <div class="mt-6">

                    <label class="font-bold block mb-2">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="6"
                        class="w-full border rounded-xl p-4">{{ old('description',$accommodation->description) }}</textarea>

                </div>

                <div class="mt-8">

                    <label class="font-bold block mb-2">
                        Facilities (comma separated)
                    </label>

                    <input
                        type="text"
                        name="facilities"
                        value="{{ $accommodation->facilities->pluck('name')->implode(', ') }}"
                        class="w-full border rounded-xl p-3">

                </div>

                <div class="mt-8">

                    <label class="block font-bold mb-3">
                        Add New Photos
                    </label>

                    <input
                        type="file"
                        name="photos[]"
                        multiple
                        class="block w-full border rounded-xl p-3">

                    <p class="text-sm text-gray-500 mt-2">

                        You can select multiple photos.

                    </p>

                </div>

                <div class="mt-10">

                    <button
                        type="submit"
                        class="bg-sky-600 hover:bg-sky-700 text-white px-8 py-4 rounded-xl font-bold">

                        💾 Save Changes

                    </button>

                </div>

            </form>

            <hr class="my-10">
                        <h2 class="text-2xl font-bold mb-6">
                Property Photos
            </h2>

            @if($accommodation->photos->count())

                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

                    @foreach($accommodation->photos as $photo)

                        <div class="relative">

                            <img
                                src="{{ asset('storage/'.$photo->image_path) }}"
                                class="w-full h-40 rounded-xl object-cover shadow">

                            <form
                                action="{{ route('rentals.photo.delete',$photo) }}"
                                method="POST"
                                class="absolute top-2 right-2">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Delete this photo?')"
                                    class="w-8 h-8 rounded-full bg-red-600 hover:bg-red-700 text-white shadow">

                                    ✕

                                </button>

                            </form>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="rounded-xl bg-slate-100 p-6 text-center text-slate-500">

                    No photos uploaded yet.

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>