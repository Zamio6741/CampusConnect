<x-app-layout>

<div class="min-h-screen bg-slate-100">

<div class="flex">

<!-- SIDEBAR -->

<aside class="w-72 bg-white shadow-lg min-h-screen">

<div class="p-8">

<h1 class="text-3xl font-extrabold text-blue-700">
CampusConnect
</h1>

<p class="text-gray-500 mt-2">
Landlord Portal
</p>

</div>

<nav class="space-y-2 px-4">

<a href="{{ route('landlord.dashboard') }}"
class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-blue-600 text-white font-semibold">

🏠 Dashboard

</a>

<a href="{{ route('rentals.create') }}"
class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-blue-50">

➕ Add Rental

</a>

<a href="{{ route('rentals.index') }}"
class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-blue-50">

📋 My Rentals

</a>

<a href="{{ route('profile.edit') }}"
class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-blue-50">

👤 Profile

</a>

</nav>

</aside>

<!-- MAIN -->

<div class="flex-1">

<!-- TOP BAR -->

<div class="bg-white border-b">

<div class="flex justify-between items-center px-10 py-6">

<div>

<h2 class="text-3xl font-bold">

Welcome,

<span class="text-blue-600">

{{ Auth::user()->name }}

</span>

</h2>

<p class="text-gray-500">

Manage all your properties here.

</p>

</div>

<div>

<a href="{{ route('rentals.create') }}"
class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700">

+ New Listing

</a>

</div>

</div>

</div>

<div class="p-10">
    <div class="grid grid-cols-4 gap-8">

<div class="bg-white rounded-3xl shadow-lg p-8">

<p class="text-gray-500">Rentals</p>

<h1 class="text-5xl font-bold text-blue-600 mt-3">

{{ $stats['rentals'] }}

</h1>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<p class="text-gray-500">Property Views</p>

<h1 class="text-5xl font-bold text-purple-600 mt-3">

{{ $stats['views'] }}

</h1>

</div>

<div class="bg-white rounded-3xl shadow-lg p-8">

<p class="text-gray-500">Bookings</p>

<h1 class="text-5xl font-bold text-orange-500 mt-3">

{{ $stats['bookings'] }}

</h1>

</div>

<a href="{{ route('rentals.index') }}"
   class="bg-white rounded-3xl shadow-lg p-8 hover:shadow-xl transition block">

    <p class="text-gray-500">
         Property Views
    </p>

    <h1 class="text-5xl font-bold text-purple-600 mt-3">

        {{ $stats['views'] ?? 0 }}

    </h1>

</a>

</div>
<!-- MY RENTALS -->

<div class="mt-10 bg-white rounded-3xl shadow-lg p-8">

    <div class="flex justify-between items-center mb-8">

        <div>

            <h2 class="text-2xl font-bold">
                🏠 My Rentals
            </h2>

            <p class="text-gray-500">
                Manage all your rental listings.
            </p>

        </div>

        <a href="{{ route('rentals.create') }}"
           class="bg-blue-600 text-white px-5 py-3 rounded-xl hover:bg-blue-700">

            + Add Rental

        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

            <tr class="border-b">

                <th class="text-left py-4">Property</th>
                <th class="text-left py-4">Location</th>
                <th class="text-left py-4">Price</th>
                <th class="text-left py-4">Status</th>
                <th class="text-left py-4">Actions</th>

            </tr>

            </thead>

            <tbody>

            @forelse($rentals as $rental)

                <tr class="border-b hover:bg-gray-50">

                    <td class="py-5 font-semibold">

                        {{ $rental->title }}

                    </td>

                    <td>

                        {{ $rental->location }}

                    </td>

                    <td>

                        KES {{ number_format($rental->price) }}

                    </td>

                    <td>

                        @if($rental->is_available)

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700">

                                Available

                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700">

                                Occupied

                            </span>

                        @endif

                    </td>

                    <td class="space-x-2">

                        <button
    class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg cursor-not-allowed"
    disabled>
    Edit
</button>

<button
    class="bg-gray-300 text-gray-600 px-4 py-2 rounded-lg cursor-not-allowed"
    disabled>
    Delete
</button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center py-12 text-gray-400">

                        No rentals yet.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
</div>   {{-- End p-10 --}}
</div>   {{-- End flex-1 --}}
</div>   {{-- End flex --}}
</div>   {{-- End min-h-screen --}}

</x-app-layout>