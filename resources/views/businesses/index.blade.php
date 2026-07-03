<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-10">

            <div>

                <h1 class="text-5xl font-bold text-orange-600">
                    🏪 Local Businesses
                </h1>

                <p class="text-gray-500 mt-2">
                    Discover businesses around campus.
                </p>

            </div>

            <a href="{{ route('businesses.create') }}"
               class="bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 rounded-xl font-bold">

                ➕ Post Business

            </a>

        </div>

        @if(session('success'))

            <div class="bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-xl mb-8">

                {{ session('success') }}

            </div>

        @endif
        <form method="GET" action="{{ route('businesses.index') }}" class="mb-10">

    <div class="grid md:grid-cols-3 gap-4">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="🔍 Search businesses..."
            class="border rounded-xl p-3">

        <select
            name="category"
            class="border rounded-xl p-3">

            <option value="">All Categories</option>

            <option value="Restaurant">Restaurant</option>
            <option value="Hostel">Hostel</option>
            <option value="Cyber">Cyber Café</option>
            <option value="Salon">Salon</option>
            <option value="Barbershop">Barbershop</option>
            <option value="Laundry">Laundry</option>
            <option value="Electronics">Electronics</option>
            <option value="Printing">Printing</option>
            <option value="Other">Other</option>

        </select>

        <button
            class="bg-orange-600 hover:bg-orange-700 text-white rounded-xl font-bold">

            Search

        </button>

    </div>

</form>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse($businesses as $business)

                <div class="bg-white rounded-3xl shadow-xl p-6 hover:shadow-2xl transition">

                    <div class="text-5xl mb-4">
                        🏪
                    </div>

                    <h2 class="text-2xl font-bold">

                        {{ $business->name }}

                    </h2>

                    <p class="text-orange-600 font-semibold mt-2">

                        {{ $business->category }}

                    </p>

                    <p class="text-gray-600 mt-4">

                        {{ \Illuminate\Support\Str::limit($business->description,120) }}

                    </p>

                    <div class="mt-5 space-y-2 text-sm text-gray-500">

                        <p>📍 {{ $business->location }}</p>

                        <p>📞 {{ $business->phone }}</p>

                    </div>

                    <a href="{{ route('businesses.show',$business) }}"
                       class="inline-block mt-6 text-orange-600 font-bold hover:underline">

                        View Details →

                    </a>

                </div>

            @empty

                <div class="col-span-3 bg-white rounded-3xl shadow-xl p-16 text-center">

                    <div class="text-7xl">

                        🏪

                    </div>

                    <h2 class="text-3xl font-bold mt-5">

                        No businesses yet

                    </h2>

                    <p class="text-gray-500 mt-3">

                        Be the first student to advertise your business.

                    </p>

                </div>

            @endforelse

        </div>
        <div class="mt-10">

    {{ $businesses->links() }}

</div>

    </div>

</div>

</x-app-layout>