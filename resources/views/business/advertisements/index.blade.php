<x-app-layout>

<div class="max-w-7xl mx-auto py-10">

    @if(session('success'))
        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-8">

        <div>

            <h1 class="text-4xl font-bold text-sky-700">
                📢 My Advertisements
            </h1>

            <p class="text-gray-500 mt-2">
                Promote your business across CampusConnect.
            </p>

        </div>

        <a href="{{ route('business.advertisements.create') }}"
           class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-2xl font-semibold">

            + New Advertisement

        </a>

    </div>

    @forelse($advertisements as $advertisement)

        <div class="bg-white rounded-3xl shadow-lg p-8 mb-6">

            <div class="flex justify-between">

                <div class="flex gap-6">

                    @if($advertisement->image)

                        <img
                            src="{{ asset('storage/'.$advertisement->image) }}"
                            class="w-36 h-24 rounded-2xl object-cover">

                    @else

                        <div class="w-36 h-24 rounded-2xl bg-sky-100 flex items-center justify-center text-5xl">

                            📢

                        </div>

                    @endif

                    <div>

                        <h2 class="text-2xl font-bold">

                            {{ $advertisement->title }}

                        </h2>

                        <p class="text-gray-600 mt-2">

                           {{ \Illuminate\Support\Str::limit($advertisement->description,120) }}

                        </p>

                        <div class="mt-4 flex gap-4">

                            <span class="bg-gray-100 px-3 py-1 rounded-full">

                                📅 {{ $advertisement->start_date }}

                            </span>

                            <span class="bg-gray-100 px-3 py-1 rounded-full">

                                ➜ {{ $advertisement->end_date }}

                            </span>

                        </div>

                    </div>

                </div>

                <div class="text-right">

                    @if($advertisement->status=='Approved')

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full">

                            ✅ Approved

                        </span>

                    @elseif($advertisement->status=='Rejected')

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full">

                            ❌ Rejected

                        </span>

                    @else

                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full">

                            ⏳ Pending

                        </span>

                    @endif

                </div>

            </div>

            <div class="grid grid-cols-3 gap-5 mt-8">

                <div class="bg-slate-100 rounded-2xl p-4 text-center">

                    <div class="text-3xl">👀</div>

                    <div class="font-bold text-xl">

                        {{ $advertisement->views ?? 0 }}

                    </div>

                    <small>Views</small>

                </div>

                <div class="bg-slate-100 rounded-2xl p-4 text-center">

                    <div class="text-3xl">🖱</div>

                    <div class="font-bold text-xl">

                        {{ $advertisement->clicks ?? 0 }}

                    </div>

                    <small>Clicks</small>

                </div>

                <div class="bg-slate-100 rounded-2xl p-4 text-center">

                    <div class="text-3xl">📈</div>

                    <div class="font-bold text-xl">

                        {{ $advertisement->is_active ? 'Active' : 'Inactive' }}

                    </div>

                    <small>Status</small>

                </div>

            </div>

            <div class="flex gap-4 mt-8">

                <a href="{{ route('business.advertisements.show',$advertisement) }}"
                   class="bg-sky-600 hover:bg-sky-700 text-white px-5 py-3 rounded-xl">

                    View

                </a>

                <a href="{{ route('business.advertisements.edit',$advertisement) }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-xl">

                    Edit

                </a>

                <form
                    action="{{ route('business.advertisements.destroy',$advertisement) }}"
                    method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Delete advertisement?')"
                        class="bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-xl">

                        Delete

                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="bg-white rounded-3xl shadow-lg p-16 text-center">

            <div class="text-8xl">

                📢

            </div>

            <h2 class="text-3xl font-bold mt-6">

                No Advertisements Yet

            </h2>

            <p class="text-gray-500 mt-3">

                Start promoting your business.

            </p>

            <a
                href="{{ route('business.advertisements.create') }}"
                class="inline-block mt-8 bg-sky-600 text-white px-8 py-4 rounded-2xl">

                Create Advertisement

            </a>

        </div>

    @endforelse

</div>

</x-app-layout>