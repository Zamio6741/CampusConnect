<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-12">

    <div class="max-w-4xl mx-auto">

        <!-- Header -->

        <div class="text-center mb-10">

            <h1 class="text-5xl font-extrabold text-orange-600">
                Create Rental Listing
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Step 1 of 4 • Property Details
            </p>

        </div>

        <!-- Progress Bar -->

        <div class="w-full bg-gray-200 rounded-full h-3 mb-10">

            <div class="bg-orange-500 h-3 rounded-full w-1/4"></div>

        </div>

        <!-- Card -->

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <form action="{{ route('rental.step1.store') }}" method="POST">

    @csrf

    <!-- Property Type -->

    <div class="mb-8">

        <label class="block font-bold mb-2">
            Property Type
        </label>

        <select name="property_type" class="w-full rounded-xl border-gray-300">

    <option value="bedsitter">Bedsitter</option>

    <option value="single_room">Single Room</option>

    <option value="one_bedroom">One Bedroom</option>

    <option value="two_bedroom">Two Bedroom</option>

    <option value="hostel">Hostel Room</option>

    <option value="shared_room">Shared Room</option>

</select>

    </div>

    <!-- University -->

    <div class="mb-8">

        <label class="block font-bold mb-2">
            University
        </label>

        <select
            name="university_id"
            class="w-full rounded-xl border-gray-300">

            @foreach($universities as $university)

                <option value="{{ $university->id }}">
                    {{ $university->name }}
                </option>

            @endforeach

        </select>

    </div>

    <!-- Nearby Area -->

    <div class="mb-8">

        <label class="block font-bold mb-2">
            Nearby Area
        </label>

        <select
            name="nearby_area_id"
            class="w-full rounded-xl border-gray-300">

            @foreach($areas as $area)

                <option value="{{ $area->id }}">
                    {{ $area->name }}
                </option>

            @endforeach

        </select>

    </div>

    <!-- Description -->

    <div class="mb-10">

        <label class="block font-bold mb-2">
            Description
        </label>

        <textarea
            name="description"
            rows="6"
            class="w-full rounded-xl border-gray-300"
            placeholder="Describe your rental..."></textarea>

    </div>

    <div class="flex justify-end">

        <button
            type="submit"
            class="bg-orange-600 hover:bg-orange-700 text-white px-10 py-4 rounded-xl font-bold">

            Next →

        </button>

    </div>

</form>
                @csrf

        </div>

    </div>

</div>

</x-app-layout>