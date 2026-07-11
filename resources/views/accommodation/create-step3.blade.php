<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-amber-50 to-yellow-50 py-12">

    <div class="max-w-5xl mx-auto">

        <div class="text-center mb-10">

            <h1 class="text-5xl font-extrabold text-orange-600">
                Create Rental Listing
            </h1>

            <p class="text-gray-500 mt-3 text-lg">
                Step 3 of 5 • Upload Photos
            </p>

        </div>

        <div class="w-full bg-gray-200 rounded-full h-3 mb-10">
            <div class="bg-orange-500 h-3 rounded-full" style="width:60%"></div>
        </div>

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <form action="#" method="POST" enctype="multipart/form-data">

                @csrf

                <label class="block text-xl font-bold mb-5">

                    Property Photos

                </label>

                <input
                    type="file"
                    multiple
                    class="block w-full border rounded-xl p-4">

                <p class="text-gray-500 mt-4">

                    Upload at least 5 clear photos.

                </p>

                <div class="flex justify-between mt-10">

                    <a href="{{ route('rental.step2') }}"
                       class="px-8 py-4 bg-gray-300 rounded-xl font-bold">

                        ← Back

                    </a>

                    <a href="{{ route('rental.step4') }}"
                       class="px-8 py-4 bg-orange-600 hover:bg-orange-700 text-white rounded-xl font-bold">

                        Next →

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>