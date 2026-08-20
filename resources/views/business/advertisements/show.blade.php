<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="max-w-6xl mx-auto py-6 sm:py-8 lg:py-10 px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden border border-slate-200">

            {{-- ========================================================= --}}
            {{-- HEADER --}}
            {{-- ========================================================= --}}

            <div class="bg-sky-600 px-5 sm:px-8 py-6">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div class="min-w-0">

                        <h1 class="text-2xl sm:text-3xl font-bold text-white">
                            📢 Advertisement Details
                        </h1>

                        <p class="text-sky-100 mt-2 text-sm sm:text-base">
                            View your advertisement information.
                        </p>

                    </div>

                    <a
                        href="{{ route('business.advertisements.index') }}"
                        class="
                            inline-flex
                            items-center
                            justify-center
                            w-full
                            sm:w-auto
                            bg-white
                            text-sky-600
                            px-5
                            py-3
                            rounded-xl
                            font-semibold
                            border-2
                            border-white
                            hover:bg-sky-50
                            transition
                            shrink-0
                        "
                    >

                        ← Back

                    </a>

                </div>

            </div>


            {{-- ========================================================= --}}
            {{-- CONTENT --}}
            {{-- ========================================================= --}}

            <div class="p-5 sm:p-8 lg:p-10">


                {{-- ===================================================== --}}
                {{-- ADVERTISEMENT IMAGE --}}
                {{-- ===================================================== --}}

                @if($advertisement->image)

                    <div class="mb-7 sm:mb-8 rounded-2xl sm:rounded-3xl border-2 border-slate-200 bg-slate-50 p-2 sm:p-3 shadow-sm">

                        <img
                            src="{{ asset('storage/'.$advertisement->image) }}"
                            class="
                                w-full
                                h-56
                                sm:h-72
                                lg:h-96
                                object-cover
                                rounded-xl
                                sm:rounded-2xl
                            "
                            alt="{{ $advertisement->title }}">

                    </div>

                @endif


                {{-- ===================================================== --}}
                {{-- TITLE --}}
                {{-- ===================================================== --}}

                <div class="border-b-2 border-slate-100 pb-6">

                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-slate-800 break-words">

                        {{ $advertisement->title }}

                    </h2>


                    {{-- ================================================= --}}
                    {{-- STATUS BADGES --}}
                    {{-- ================================================= --}}

                    <div class="flex flex-wrap gap-2 sm:gap-3 mt-5">

                        @if($advertisement->status=='Approved')

                            <span class="inline-flex items-center bg-green-100 border border-green-300 text-green-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold">

                                ✅ Approved

                            </span>

                        @elseif($advertisement->status=='Rejected')

                            <span class="inline-flex items-center bg-red-100 border border-red-300 text-red-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold">

                                ❌ Rejected

                            </span>

                        @else

                            <span class="inline-flex items-center bg-yellow-100 border border-yellow-300 text-yellow-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold">

                                ⏳ Pending Approval

                            </span>

                        @endif


                        @if($advertisement->is_active)

                            <span class="inline-flex items-center bg-sky-100 border border-sky-300 text-sky-700 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold">

                                Active

                            </span>

                        @else

                            <span class="inline-flex items-center bg-gray-100 border border-gray-300 text-gray-600 px-3 sm:px-4 py-2 rounded-full text-sm font-semibold">

                                Inactive

                            </span>

                        @endif

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- DESCRIPTION --}}
                {{-- ===================================================== --}}

                <div class="py-7 sm:py-8">

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-4">

                        Description

                    </h3>

                    <div class="border-2 border-slate-200 rounded-2xl bg-slate-50 p-4 sm:p-6">

                        <p class="text-gray-700 leading-7 sm:leading-8 whitespace-pre-line break-words">

                            {{ $advertisement->description }}

                        </p>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- STATISTICS --}}
                {{-- ===================================================== --}}

                <div class="border-t-2 border-slate-100 pt-7 sm:pt-8">

                    <h3 class="text-xl sm:text-2xl font-bold text-slate-800 mb-5">

                        Advertisement Statistics

                    </h3>

                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-5 lg:gap-6">

                        {{-- Views --}}

                        <div class="bg-slate-50 border-2 border-slate-200 rounded-2xl p-4 sm:p-6 text-center shadow-sm">

                            <div class="text-3xl sm:text-4xl">
                                👀
                            </div>

                            <div class="text-2xl sm:text-3xl font-bold mt-2 sm:mt-3 text-slate-800">

                                {{ $advertisement->views ?? 0 }}

                            </div>

                            <small class="text-slate-500 font-medium">
                                Views
                            </small>

                        </div>


                        {{-- Clicks --}}

                        <div class="bg-slate-50 border-2 border-slate-200 rounded-2xl p-4 sm:p-6 text-center shadow-sm">

                            <div class="text-3xl sm:text-4xl">
                                🖱
                            </div>

                            <div class="text-2xl sm:text-3xl font-bold mt-2 sm:mt-3 text-slate-800">

                                {{ $advertisement->clicks ?? 0 }}

                            </div>

                            <small class="text-slate-500 font-medium">
                                Clicks
                            </small>

                        </div>


                        {{-- Start Date --}}

                        <div class="bg-slate-50 border-2 border-slate-200 rounded-2xl p-4 sm:p-6 text-center shadow-sm">

                            <div class="text-3xl sm:text-4xl">
                                📅
                            </div>

                            <div class="font-bold mt-2 sm:mt-3 text-sm sm:text-base text-slate-800 break-words">

                                {{ $advertisement->start_date }}

                            </div>

                            <small class="text-slate-500 font-medium">
                                Start Date
                            </small>

                        </div>


                        {{-- End Date --}}

                        <div class="bg-slate-50 border-2 border-slate-200 rounded-2xl p-4 sm:p-6 text-center shadow-sm">

                            <div class="text-3xl sm:text-4xl">
                                🏁
                            </div>

                            <div class="font-bold mt-2 sm:mt-3 text-sm sm:text-base text-slate-800 break-words">

                                {{ $advertisement->end_date }}

                            </div>

                            <small class="text-slate-500 font-medium">
                                End Date
                            </small>

                        </div>

                    </div>

                </div>


                {{-- ===================================================== --}}
                {{-- ACTION BUTTONS --}}
                {{-- ===================================================== --}}

                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 mt-8 sm:mt-10 pt-6 sm:pt-8 border-t-2 border-slate-100">

                    <a
                        href="{{ route('business.advertisements.edit',$advertisement) }}"
                        class="
                            w-full
                            sm:w-auto
                            inline-flex
                            items-center
                            justify-center
                            bg-orange-500
                            hover:bg-orange-600
                            text-white
                            px-6
                            py-3.5
                            rounded-xl
                            font-semibold
                            border-2
                            border-orange-500
                            hover:border-orange-600
                            shadow-sm
                            transition
                        "
                    >

                        ✏ Edit

                    </a>


                    <form
                        action="{{ route('business.advertisements.destroy',$advertisement) }}"
                        method="POST"
                        class="w-full sm:w-auto"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            onclick="return confirm('Delete this advertisement?')"
                            class="
                                w-full
                                sm:w-auto
                                bg-red-600
                                hover:bg-red-700
                                text-white
                                px-6
                                py-3.5
                                rounded-xl
                                font-semibold
                                border-2
                                border-red-600
                                hover:border-red-700
                                shadow-sm
                                transition
                            "
                        >

                            🗑 Delete

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</x-business-layout>