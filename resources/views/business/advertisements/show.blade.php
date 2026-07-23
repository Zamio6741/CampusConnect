<x-app-layout>

<div class="max-w-6xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-sky-600 px-8 py-6 flex justify-between items-center">

            <div>

                <h1 class="text-3xl font-bold text-white">
                    📢 Advertisement Details
                </h1>

                <p class="text-sky-100 mt-2">
                    View your advertisement information.
                </p>

            </div>

            <a href="{{ route('business.advertisements.index') }}"
               class="bg-white text-sky-600 px-5 py-2 rounded-xl font-semibold">

                ← Back

            </a>

        </div>

        <div class="p-8">

            @if($advertisement->image)

                <img
                    src="{{ asset('storage/'.$advertisement->image) }}"
                    class="w-full h-96 object-cover rounded-3xl shadow mb-8">

            @endif

            <h2 class="text-4xl font-bold">

                {{ $advertisement->title }}

            </h2>

            <div class="flex gap-4 mt-5">

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

                        ⏳ Pending Approval

                    </span>

                @endif

                @if($advertisement->is_active)

                    <span class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full">

                        Active

                    </span>

                @else

                    <span class="bg-gray-100 text-gray-600 px-4 py-2 rounded-full">

                        Inactive

                    </span>

                @endif

            </div>

            <hr class="my-8">

            <h3 class="text-2xl font-bold mb-4">

                Description

            </h3>

            <p class="text-gray-700 leading-8">

                {{ $advertisement->description }}

            </p>

            <hr class="my-8">

            <div class="grid md:grid-cols-4 gap-6">

                <div class="bg-slate-100 rounded-2xl p-6 text-center">

                    <div class="text-4xl">👀</div>

                    <div class="text-3xl font-bold mt-3">

                        {{ $advertisement->views ?? 0 }}

                    </div>

                    <small>Views</small>

                </div>

                <div class="bg-slate-100 rounded-2xl p-6 text-center">

                    <div class="text-4xl">🖱</div>

                    <div class="text-3xl font-bold mt-3">

                        {{ $advertisement->clicks ?? 0 }}

                    </div>

                    <small>Clicks</small>

                </div>

                <div class="bg-slate-100 rounded-2xl p-6 text-center">

                    <div class="text-4xl">📅</div>

                    <div class="font-bold mt-3">

                        {{ $advertisement->start_date }}

                    </div>

                    <small>Start Date</small>

                </div>

                <div class="bg-slate-100 rounded-2xl p-6 text-center">

                    <div class="text-4xl">🏁</div>

                    <div class="font-bold mt-3">

                        {{ $advertisement->end_date }}

                    </div>

                    <small>End Date</small>

                </div>

            </div>

            <div class="flex gap-4 mt-10">

                <a href="{{ route('business.advertisements.edit',$advertisement) }}"
                   class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-xl font-semibold">

                    ✏ Edit

                </a>

                <form action="{{ route('business.advertisements.destroy',$advertisement) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Delete this advertisement?')"
                        class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-xl font-semibold">

                        🗑 Delete

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</x-app-layout>