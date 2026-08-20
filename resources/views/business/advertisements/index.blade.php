<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 px-3 sm:px-5 lg:px-8">

    <div class="max-w-7xl mx-auto py-5 sm:py-8 lg:py-10">

        @if(session('success'))
            <div class="mb-5 sm:mb-6 bg-green-100 border border-green-300 text-green-700 px-4 sm:px-6 py-3 sm:py-4 rounded-2xl text-sm sm:text-base">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-5 mb-6 sm:mb-8">

            <div class="min-w-0">

                <h1 class="text-3xl sm:text-4xl font-bold text-sky-700 break-words">
                    📢 My Advertisements
                </h1>

                <p class="text-gray-500 mt-2 text-sm sm:text-base">
                    Promote your business across CampusConnect.
                </p>

            </div>

            <a href="{{ route('business.advertisements.create') }}"
               class="w-full sm:w-auto inline-flex items-center justify-center bg-sky-600 hover:bg-sky-700 text-white px-5 sm:px-6 py-3 rounded-2xl font-semibold text-sm sm:text-base shadow-sm transition">

                + New Advertisement

            </a>

        </div>

        @forelse($advertisements as $advertisement)

            <div class="bg-white border border-slate-200 rounded-2xl sm:rounded-3xl shadow-lg p-4 sm:p-6 lg:p-8 mb-5 sm:mb-6">

                <div class="flex flex-col lg:flex-row lg:justify-between gap-5 lg:gap-8">

                    <div class="flex flex-col sm:flex-row gap-4 sm:gap-6 min-w-0">

                        @if($advertisement->image)

                            <img
                                src="{{ asset('storage/'.$advertisement->image) }}"
                                class="w-full sm:w-36 h-48 sm:h-24 rounded-2xl object-cover border border-gray-200 shrink-0">

                        @else

                            <div class="w-full sm:w-36 h-48 sm:h-24 rounded-2xl bg-sky-100 border border-sky-200 flex items-center justify-center text-5xl shrink-0">

                                📢

                            </div>

                        @endif

                        <div class="min-w-0">

                            <h2 class="text-xl sm:text-2xl font-bold text-slate-800 break-words">

                                {{ $advertisement->title }}

                            </h2>

                            <p class="text-gray-600 mt-2 text-sm sm:text-base leading-relaxed break-words">

                               {{ \Illuminate\Support\Str::limit($advertisement->description,120) }}

                            </p>

                            <div class="mt-4 flex flex-col xs:flex-row sm:flex-wrap gap-2 sm:gap-4">

                                <span class="inline-flex items-center w-fit bg-gray-100 border border-gray-200 px-3 py-1.5 rounded-full text-xs sm:text-sm">

                                    📅 {{ $advertisement->start_date }}

                                </span>

                                <span class="inline-flex items-center w-fit bg-gray-100 border border-gray-200 px-3 py-1.5 rounded-full text-xs sm:text-sm">

                                    ➜ {{ $advertisement->end_date }}

                                </span>

                            </div>

                        </div>

                    </div>

                    <div class="text-left lg:text-right shrink-0">

                        @if($advertisement->status=='Approved')

                            <span class="inline-flex bg-green-100 border border-green-200 text-green-700 px-4 py-2 rounded-full text-sm">

                                ✅ Approved

                            </span>

                        @elseif($advertisement->status=='Rejected')

                            <span class="inline-flex bg-red-100 border border-red-200 text-red-700 px-4 py-2 rounded-full text-sm">

                                ❌ Rejected

                            </span>

                        @else

                            <span class="inline-flex bg-yellow-100 border border-yellow-200 text-yellow-700 px-4 py-2 rounded-full text-sm">

                                ⏳ Pending

                            </span>

                        @endif

                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-5 mt-6 sm:mt-8">

                    <div class="bg-slate-100 border border-slate-200 rounded-2xl p-4 text-center">

                        <div class="text-2xl sm:text-3xl">👀</div>

                        <div class="font-bold text-lg sm:text-xl">

                            {{ $advertisement->views ?? 0 }}

                        </div>

                        <small class="text-gray-500">Views</small>

                    </div>

                    <div class="bg-slate-100 border border-slate-200 rounded-2xl p-4 text-center">

                        <div class="text-2xl sm:text-3xl">🖱</div>

                        <div class="font-bold text-lg sm:text-xl">

                            {{ $advertisement->clicks ?? 0 }}

                        </div>

                        <small class="text-gray-500">Clicks</small>

                    </div>

                    <div class="bg-slate-100 border border-slate-200 rounded-2xl p-4 text-center">

                        <div class="text-2xl sm:text-3xl">📈</div>

                        <div class="font-bold text-lg sm:text-xl">

                            {{ $advertisement->is_active ? 'Active' : 'Inactive' }}

                        </div>

                        <small class="text-gray-500">Status</small>

                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4 mt-6 sm:mt-8">

                    <a href="{{ route('business.advertisements.show',$advertisement) }}"
                       class="w-full bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl text-center font-semibold transition">

                        View

                    </a>

                    <a href="{{ route('business.advertisements.edit',$advertisement) }}"
                       class="w-full bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl text-center font-semibold transition">

                        Edit

                    </a>

                    <form
                        action="{{ route('business.advertisements.destroy',$advertisement) }}"
                        method="POST"
                        class="w-full">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Delete advertisement?')"
                            class="w-full bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl font-semibold transition">

                            Delete

                        </button>

                    </form>

                </div>

            </div>

        @empty

            <div class="bg-white border border-slate-200 rounded-2xl sm:rounded-3xl shadow-lg p-8 sm:p-12 lg:p-16 text-center">

                <div class="text-6xl sm:text-8xl">

                    📢

                </div>

                <h2 class="text-2xl sm:text-3xl font-bold mt-5 sm:mt-6">

                    No Advertisements Yet

                </h2>

                <p class="text-gray-500 mt-3 text-sm sm:text-base">

                    Start promoting your business.

                </p>

                <a
                    href="{{ route('business.advertisements.create') }}"
                    class="inline-flex items-center justify-center mt-6 sm:mt-8 bg-sky-600 hover:bg-sky-700 text-white px-6 sm:px-8 py-3 sm:py-4 rounded-2xl font-semibold transition text-sm sm:text-base">

                    Create Advertisement

                </a>

            </div>

        @endforelse

    </div>

</div>

</x-business-layout>