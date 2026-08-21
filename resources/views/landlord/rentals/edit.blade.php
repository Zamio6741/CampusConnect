<x-landlord-layout>

<div class="min-h-screen bg-slate-50 py-6 sm:py-8 lg:py-10">


<div class="w-full max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-6 sm:mb-8">

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div class="min-w-0">

                <div class="flex items-center gap-3">

                    <div class="flex h-11 w-11 sm:h-12 sm:w-12 shrink-0 items-center justify-center rounded-2xl bg-sky-100 text-xl sm:text-2xl">
                        ✏️
                    </div>

                    <div class="min-w-0">

                        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-slate-800">
                            Edit Rental
                        </h1>

                        <p class="mt-1 text-sm sm:text-base text-slate-500">
                            Update your property information and manage its photos.
                        </p>

                    </div>

                </div>

            </div>

            <a
                href="{{ route('rentals.index') }}"
                class="inline-flex w-full sm:w-auto items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm sm:text-base font-semibold text-slate-700 shadow-sm transition hover:bg-slate-50 hover:border-slate-300">

                <span>←</span>
                <span>Back to Rentals</span>

            </a>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- VALIDATION ERRORS --}}
    {{-- ========================================================= --}}

    @if ($errors->any())

        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-4 sm:p-5 shadow-sm">

            <div class="flex items-start gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-red-100 text-red-600">
                    !
                </div>

                <div class="min-w-0">

                    <h2 class="font-bold text-red-800">
                        Please correct the following errors
                    </h2>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-red-700">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- SUCCESS MESSAGE --}}
    {{-- ========================================================= --}}

    @if(session('success'))

        <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 p-4 sm:p-5 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-green-100 text-green-600">
                    ✓
                </div>

                <p class="text-sm sm:text-base font-medium text-green-700">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- MAIN FORM CARD --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-2xl sm:rounded-3xl border border-slate-200 bg-white shadow-sm">

        {{-- FORM HEADER --}}

        <div class="border-b border-slate-100 bg-gradient-to-r from-sky-50 to-white px-5 py-5 sm:px-8 sm:py-6">

            <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                Property Information
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Keep your rental details accurate so students can find your property easily.
            </p>

        </div>


        <div class="p-5 sm:p-8">

            <form
                method="POST"
                action="{{ route('rentals.update',$accommodation) }}"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')


                {{-- ================================================= --}}
                {{-- BASIC INFORMATION --}}
                {{-- ================================================= --}}

                <div>

                    <div class="mb-5">

                        <h3 class="text-base sm:text-lg font-bold text-slate-800">
                            Basic Information
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Update the main details of your rental property.
                        </p>

                    </div>


                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                        {{-- Property Type --}}

                        <div>

                            <label
                                for="property_type"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Property Type

                            </label>

                            <select
                                id="property_type"
                                name="property_type"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

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
                                        @selected($accommodation->property_type == $type)>

                                        {{ ucwords(str_replace('_',' ',$type)) }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- University --}}

                        <div>

                            <label
                                for="university_id"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                University

                            </label>

                            <select
                                id="university_id"
                                name="university_id"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                                @foreach($universities as $university)

                                    <option
                                        value="{{ $university->id }}"
                                        @selected($accommodation->university_id == $university->id)>

                                        {{ $university->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Nearby Area --}}

                        <div>

                            <label
                                for="nearby_area_id"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Nearby Area

                            </label>

                            <select
                                id="nearby_area_id"
                                name="nearby_area_id"
                                class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm text-slate-700 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                                @foreach($areas as $area)

                                    <option
                                        value="{{ $area->id }}"
                                        @selected($accommodation->nearby_area_id == $area->id)>

                                        {{ $area->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- Location --}}

                        <div>

                            <label
                                for="location"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Location

                            </label>

                            <input
                                id="location"
                                type="text"
                                name="location"
                                value="{{ old('location',$accommodation->location) }}"
                                autocomplete="street-address"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        </div>


                        {{-- Monthly Rent --}}

                        <div>

                            <label
                                for="price"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Monthly Rent

                            </label>

                            <div class="relative">

                                <span class="pointer-events-none absolute inset-y-0 left-4 flex items-center text-sm font-medium text-slate-500">
                                    KES
                                </span>

                                <input
                                    id="price"
                                    type="number"
                                    name="price"
                                    min="0"
                                    value="{{ old('price',$accommodation->price) }}"
                                    class="w-full rounded-xl border border-slate-300 py-3 pl-14 pr-4 text-sm text-slate-700 outline-none transition focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                            </div>

                        </div>


                        {{-- Phone --}}

                        <div>

                            <label
                                for="phone"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                Phone

                            </label>

                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone',$accommodation->phone) }}"
                                autocomplete="tel"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        </div>


                        {{-- WhatsApp --}}

                        <div class="sm:col-span-2">

                            <label
                                for="whatsapp"
                                class="mb-2 block text-sm font-semibold text-slate-700">

                                WhatsApp

                            </label>

                            <input
                                id="whatsapp"
                                type="tel"
                                name="whatsapp"
                                value="{{ old('whatsapp',$accommodation->whatsapp) }}"
                                autocomplete="tel"
                                class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- DESCRIPTION --}}
                {{-- ================================================= --}}

                <div class="mt-8 border-t border-slate-100 pt-8">

                    <div class="mb-5">

                        <h3 class="text-base sm:text-lg font-bold text-slate-800">
                            Property Description
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Give students useful information about the property.
                        </p>

                    </div>

                    <textarea
                        id="description"
                        name="description"
                        rows="6"
                        placeholder="Describe the property, rooms, surroundings, security, accessibility and other useful information..."
                        class="w-full resize-y rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100">{{ old('description',$accommodation->description) }}</textarea>

                </div>


                {{-- ================================================= --}}
                {{-- FACILITIES --}}
                {{-- ================================================= --}}

                <div class="mt-8 border-t border-slate-100 pt-8">

                    <div class="mb-5">

                        <h3 class="text-base sm:text-lg font-bold text-slate-800">
                            Property Facilities
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Separate multiple facilities with commas.
                        </p>

                    </div>

                    <input
                        id="facilities"
                        type="text"
                        name="facilities"
                        value="{{ $accommodation->facilities->pluck('name')->implode(', ') }}"
                        placeholder="WiFi, Water, Parking, Security, Electricity..."
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm text-slate-700 outline-none transition placeholder:text-slate-400 focus:border-sky-500 focus:ring-4 focus:ring-sky-100">

                </div>


                {{-- ================================================= --}}
                {{-- ADD PHOTOS --}}
                {{-- ================================================= --}}

                <div class="mt-8 border-t border-slate-100 pt-8">

                    <div class="mb-5">

                        <h3 class="text-base sm:text-lg font-bold text-slate-800">
                            Add New Photos
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Select one or more photos to add to this rental.
                        </p>

                    </div>

                    <label
                        for="photos"
                        class="flex cursor-pointer flex-col items-center justify-center rounded-2xl border-2 border-dashed border-slate-300 bg-slate-50 px-5 py-8 text-center transition hover:border-sky-400 hover:bg-sky-50">

                        <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-2xl bg-sky-100 text-2xl">
                            📸
                        </div>

                        <span class="text-sm font-semibold text-slate-700">
                            Choose photos
                        </span>

                        <span class="mt-1 text-xs text-slate-500">
                            You can select multiple photos
                        </span>

                        <input
                            id="photos"
                            type="file"
                            name="photos[]"
                            multiple
                            accept="image/*"
                            class="sr-only">

                    </label>

                    <p
                        id="photoCount"
                        class="mt-2 text-xs text-slate-500">
                    </p>

                </div>


                {{-- ================================================= --}}
                {{-- SAVE BUTTON --}}
                {{-- ================================================= --}}

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-slate-100 pt-8 sm:flex-row sm:items-center sm:justify-between">

                    <a
                        href="{{ route('rentals.index') }}"
                        class="inline-flex w-full items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3.5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50 sm:w-auto">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="inline-flex w-full items-center justify-center gap-2 rounded-xl bg-sky-600 px-7 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-4 focus:ring-sky-200 sm:w-auto">

                        <span>💾</span>
                        <span>Save Changes</span>

                    </button>

                </div>

            </form>


            {{-- ========================================================= --}}
            {{-- EXISTING PHOTOS --}}
            {{-- ========================================================= --}}

            <div class="mt-10 border-t border-slate-100 pt-8">

                <div class="mb-6">

                    <h2 class="text-xl sm:text-2xl font-bold text-slate-800">
                        Property Photos
                    </h2>

                    <p class="mt-1 text-sm text-slate-500">
                        Review and remove photos currently attached to this property.
                    </p>

                </div>


                @if($accommodation->photos->count())

                    <div class="grid grid-cols-1 gap-4 xs:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">

                        @foreach($accommodation->photos as $photo)

                            <div class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-slate-100 shadow-sm">

                                <img
                                    src="{{ asset('storage/'.$photo->image_path) }}"
                                    alt="Property photo"
                                    class="h-48 w-full object-cover transition duration-300 group-hover:scale-105 sm:h-40">

                                <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/60 to-transparent p-3 pt-10">

                                    <span class="text-xs font-medium text-white">
                                        Property Photo
                                    </span>

                                </div>

                                <form
                                    action="{{ route('rentals.photo.delete',$photo) }}"
                                    method="POST"
                                    class="absolute right-2 top-2">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Delete this photo?')"
                                        aria-label="Delete photo"
                                        class="flex h-9 w-9 items-center justify-center rounded-full bg-red-600 text-sm font-bold text-white shadow-lg transition hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-200">

                                        ✕

                                    </button>

                                </form>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 px-5 py-10 text-center">

                        <div class="text-4xl">
                            🏘️
                        </div>

                        <h3 class="mt-3 font-semibold text-slate-700">
                            No photos uploaded yet
                        </h3>

                        <p class="mt-1 text-sm text-slate-500">
                            Add photos above to showcase this property.
                        </p>

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- FOOTER NOTE --}}
    {{-- ========================================================= --}}

    <div class="mt-5 flex items-start gap-3 rounded-2xl border border-sky-100 bg-sky-50 p-4">

        <div class="shrink-0 text-lg">
            💡
        </div>

        <p class="text-xs sm:text-sm leading-5 text-sky-700">
            Keep your rental information and photos up to date. Accurate listings help students make better booking decisions.
        </p>

    </div>

</div>


</div>

{{-- ========================================================= --}}
{{-- PHOTO SELECTION FEEDBACK --}}
{{-- ========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const photoInput = document.getElementById('photos');
    const photoCount = document.getElementById('photoCount');

    if (!photoInput || !photoCount) {
        return;
    }

    photoInput.addEventListener('change', function () {

        const count = this.files.length;

        if (count === 0) {
            photoCount.textContent = '';
            return;
        }

        photoCount.textContent =
            count === 1
                ? '1 photo selected.'
                : `${count} photos selected.`;

    });

});

</script>

</x-landlord-layout>