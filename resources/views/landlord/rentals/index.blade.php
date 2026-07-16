<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-4xl font-extrabold text-slate-800">

                    🏘️ My Rentals

                </h1>

                <p class="text-gray-500 mt-2">

                    Manage all your published properties.

                </p>

            </div>

            <a href="{{ route('rental.step1') }}"
               class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl font-semibold shadow">

                + Add Rental

            </a>

        </div>

        @if(session('success'))

            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-xl">

                {{ session('success') }}

            </div>

        @endif

        <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="text-left px-6 py-5">Photo</th>

                        <th class="text-left px-6 py-5">Property</th>

                        <th class="text-left px-6 py-5">University</th>

                        <th class="text-left px-6 py-5">Location</th>

                        <th class="text-left px-6 py-5">Price</th>

                        <th class="text-left px-6 py-5">Status</th>

                        <th class="text-center px-6 py-5">Actions</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($rentals as $rental)

                    <tr class="border-b hover:bg-sky-50">

                        <!-- Photo -->

                        <td class="px-6 py-5">

                            @if($rental->photos->count())

                                <img
                                    src="{{ asset('storage/'.$rental->photos->first()->image_path) }}"
                                    class="w-24 h-24 rounded-xl object-cover">

                            @else

                                <div class="w-24 h-24 rounded-xl bg-gray-200 flex items-center justify-center">

                                    🏘️

                                </div>

                            @endif

                        </td>

                        <!-- Property -->

                        <td class="px-6">

                            <h3 class="font-bold text-lg">

                                {{ $rental->title }}

                            </h3>

                            <p class="text-gray-500">

                                {{ ucfirst(str_replace('_',' ',$rental->property_type)) }}

                            </p>

                        </td>

                        <!-- University -->

                        <td class="px-6">

                            {{ $rental->university->short_name ?? '-' }}

                        </td>

                        <!-- Location -->

                        <td class="px-6">

                            {{ $rental->location }}

                        </td>

                        <!-- Price -->

                        <td class="px-6 font-bold text-green-600">

                            KES {{ number_format($rental->price) }}

                        </td>

                        <!-- Status -->

                        <td class="px-6">

                            @if($rental->verified)

                                <span class="bg-green-100 text-green-700 px-3 py-2 rounded-full text-sm">

                                    Verified

                                </span>

                            @else

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-2 rounded-full text-sm">

                                    Pending

                                </span>

                            @endif

                        </td>

                        <!-- Actions -->

                        <td class="px-6">

                            <div class="flex gap-2 justify-center">

                                <a href="{{ route('rentals.show',$rental) }}"
                                   class="bg-sky-600 text-white px-4 py-2 rounded-lg">

                                    View

                                </a>

                                <a href="{{ route('rentals.edit',$rental) }}"
                                   class="bg-orange-500 text-white px-4 py-2 rounded-lg">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('rentals.destroy',$rental) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this rental?')">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="bg-red-600 text-white px-4 py-2 rounded-lg">

                                        Delete

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center py-16">

                            <div class="text-6xl">

                                🏘️

                            </div>

                            <h2 class="text-2xl font-bold mt-4">

                                No rentals found

                            </h2>

                            <a href="{{ route('rental.step1') }}"
                               class="inline-block mt-6 bg-sky-600 text-white px-6 py-3 rounded-xl">

                                Add Your First Rental

                            </a>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-8">

            {{ $rentals->links() }}

        </div>

    </div>

</div>

</x-app-layout>