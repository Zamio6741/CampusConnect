<x-business-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100">

    <div class="max-w-5xl mx-auto py-6 sm:py-8 lg:py-10 px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-xl overflow-hidden border border-slate-200">

            {{-- ========================================================= --}}
            {{-- HEADER --}}
            {{-- ========================================================= --}}

            <div class="bg-sky-600 px-5 sm:px-8 py-6 sm:py-7">

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white">
                    📢 Create Advertisement
                </h1>

                <p class="text-sky-100 mt-2 text-sm sm:text-base">
                    Promote your business to more students.
                </p>

            </div>


            {{-- ========================================================= --}}
            {{-- FORM --}}
            {{-- ========================================================= --}}

            <div class="p-5 sm:p-8 lg:p-10">

                @if ($errors->any())

                    <div class="mb-6 bg-red-50 border border-red-300 text-red-700 rounded-xl sm:rounded-2xl p-4 sm:p-5">

                        <p class="font-bold mb-2">
                            Please correct the following errors:
                        </p>

                        <ul class="list-disc pl-5 space-y-1 text-sm sm:text-base">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('business.advertisements.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf


                    {{-- ================================================= --}}
                    {{-- ADVERTISEMENT TITLE --}}
                    {{-- ================================================= --}}

                    <div class="mb-6">

                        <label
                            for="title"
                            class="block font-semibold text-slate-700 mb-2">

                            Advertisement Title

                        </label>

                        <input
                            id="title"
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="Enter advertisement title"
                            class="w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3.5 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 placeholder:text-slate-400"
                            required>

                    </div>


                    {{-- ================================================= --}}
                    {{-- DESCRIPTION --}}
                    {{-- ================================================= --}}

                    <div class="mb-6">

                        <label
                            for="description"
                            class="block font-semibold text-slate-700 mb-2">

                            Description

                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="5"
                            placeholder="Describe your advertisement..."
                            class="w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3.5 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100 placeholder:text-slate-400 resize-y">{{ old('description') }}</textarea>

                    </div>


                    {{-- ================================================= --}}
                    {{-- IMAGE --}}
                    {{-- ================================================= --}}

                    <div class="mb-6">

                        <label
                            for="image"
                            class="block font-semibold text-slate-700 mb-2">

                            Advertisement Image

                        </label>

                        <div
                            class="
                                w-full
                                rounded-xl
                                border-2
                                border-dashed
                                border-slate-400
                                bg-slate-50
                                p-3
                                sm:p-4
                                transition
                                hover:border-sky-500
                                hover:bg-sky-50
                            "
                        >

                            <input
                                id="image"
                                type="file"
                                name="image"
                                accept="image/*"
                                class="
                                    block
                                    w-full
                                    text-sm
                                    text-slate-700
                                    file:mr-3
                                    file:rounded-lg
                                    file:border-0
                                    file:bg-sky-600
                                    file:px-4
                                    file:py-2.5
                                    file:text-sm
                                    file:font-semibold
                                    file:text-white
                                    hover:file:bg-sky-700
                                    cursor-pointer
                                ">

                        </div>

                        <p class="text-xs sm:text-sm text-gray-500 mt-2">
                            Upload a clear image for your advertisement.
                        </p>

                    </div>


                    {{-- ================================================= --}}
                    {{-- DATES --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">

                        {{-- Start Date --}}

                        <div>

                            <label
                                for="start_date"
                                class="block font-semibold text-slate-700 mb-2">

                                Start Date

                            </label>

                            <input
                                id="start_date"
                                type="date"
                                name="start_date"
                                value="{{ old('start_date') }}"
                                class="w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3.5 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                                required>

                        </div>


                        {{-- End Date --}}

                        <div>

                            <label
                                for="end_date"
                                class="block font-semibold text-slate-700 mb-2">

                                End Date

                            </label>

                            <input
                                id="end_date"
                                type="date"
                                name="end_date"
                                value="{{ old('end_date') }}"
                                class="w-full rounded-xl border-2 border-slate-300 bg-white px-4 py-3.5 text-slate-800 shadow-sm outline-none transition focus:border-sky-500 focus:ring-2 focus:ring-sky-100"
                                required>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- ACTIVE CHECKBOX --}}
                    {{-- ================================================= --}}

                    <div class="mt-7 sm:mt-8">

                        <label
                            for="is_active"
                            class="
                                flex
                                items-center
                                gap-3
                                w-full
                                rounded-xl
                                border-2
                                border-slate-200
                                bg-slate-50
                                px-4
                                py-4
                                cursor-pointer
                                hover:border-sky-300
                                hover:bg-sky-50
                                transition
                            "
                        >

                            <input
                                id="is_active"
                                type="checkbox"
                                name="is_active"
                                value="1"
                                checked
                                class="
                                    w-5
                                    h-5
                                    rounded
                                    border-2
                                    border-slate-400
                                    text-sky-600
                                    focus:ring-sky-500
                                    shrink-0
                                ">

                            <span class="font-semibold text-slate-700 text-sm sm:text-base">

                                Activate Advertisement

                            </span>

                        </label>

                    </div>


                    {{-- ================================================= --}}
                    {{-- BUTTON --}}
                    {{-- ================================================= --}}

                    <div class="mt-7 sm:mt-8">

                        <button
                            type="submit"
                            class="
                                w-full
                                sm:w-auto
                                bg-sky-600
                                hover:bg-sky-700
                                active:bg-sky-800
                                text-white
                                px-6
                                sm:px-8
                                py-3.5
                                rounded-xl
                                sm:rounded-2xl
                                font-bold
                                shadow-md
                                hover:shadow-lg
                                transition
                                focus:outline-none
                                focus:ring-2
                                focus:ring-sky-500
                                focus:ring-offset-2
                            "
                        >

                            🚀 Publish Advertisement

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</x-business-layout>