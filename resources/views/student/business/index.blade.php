<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="max-w-7xl mx-auto py-10 px-8">

        <!-- Header -->
        <div class="mb-10">

            <h1 class="text-5xl font-extrabold text-slate-800">
                🏪 Business Marketplace
            </h1>

            <p class="text-gray-500 mt-3">
                Discover trusted businesses around your campus.
            </p>

        </div>

        <!-- Search -->
        <form method="GET" class="bg-white rounded-3xl shadow-lg p-6 mb-8">

            <div class="grid md:grid-cols-3 gap-5">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search business..."
                    class="border rounded-2xl p-4">

                <select
                    name="category"
                    class="border rounded-2xl p-4">

                    <option value="">All Categories</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category }}"
                            @selected(request('category')==$category)>

                            {{ $category }}

                        </option>

                    @endforeach

                </select>

                <button
                    class="bg-sky-600 hover:bg-sky-700 text-white rounded-2xl font-bold">

                    🔍 Search

                </button>

            </div>

        </form>

        <!-- Business Cards -->
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

            @forelse($businesses as $business)

            <div class="bg-white rounded-3xl shadow-lg overflow-hidden hover:shadow-2xl transition">

                @php
                    $cover = $business->images->where('cover', true)->first();
                @endphp

                @if($cover)

                    <img
                        src="{{ asset('storage/'.$cover->image) }}"
                        class="w-full h-52 object-cover">

                @else

                    <div class="w-full h-52 bg-sky-200"></div>

                @endif

                <div class="p-6">

                    <div class="flex items-center gap-4">

                        @if($business->logo)

                            <img
                                src="{{ asset('storage/'.$business->logo) }}"
                                class="w-16 h-16 rounded-2xl object-cover">

                        @else

                            <div class="w-16 h-16 rounded-2xl bg-sky-100 flex items-center justify-center text-3xl">

                                🏪

                            </div>

                        @endif

                        <div>

                            <h2 class="text-2xl font-bold">

                                {{ $business->business_name }}

                            </h2>

                            <p class="text-gray-500">

                                {{ $business->category }}

                            </p>

                        </div>

                    </div>

                    <div class="mt-6 space-y-2">

                        <p>📍 {{ $business->location }}</p>

                        <p>⭐ {{ number_format($business->rating,1) }}</p>

                        <p>👀 {{ $business->views }} Views</p>

                    </div>

                    <a
                        href="{{ route('business.preview',$business) }}"
                        class="block mt-8 bg-sky-600 hover:bg-sky-700 text-white text-center py-3 rounded-2xl font-bold">

                        View Business

                    </a>

                </div>

            </div>

            @empty

                <div class="col-span-full bg-white rounded-3xl shadow-xl p-20 text-center">

                    <div class="text-7xl">
                        🏪
                    </div>

                    <h2 class="text-4xl font-bold mt-5">

                        No businesses found

                    </h2>

                </div>

            @endforelse

        </div>

        <!-- Pagination -->
        <div class="mt-10">

            {{ $businesses->withQueryString()->links() }}

        </div>

    </div>

</div>

</x-app-layout>