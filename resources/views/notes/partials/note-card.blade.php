<div
    class="bg-white
           rounded-3xl
           shadow-xl
           overflow-hidden
           border border-slate-200
           hover:-translate-y-1
           hover:shadow-2xl
           transition
           duration-300"
>

    {{-- ========================================================= --}}
    {{-- TOP ACCENT --}}
    {{-- ========================================================= --}}

    <div class="bg-gradient-to-r from-sky-600 to-blue-700 h-2 sm:h-3"></div>


    <div class="p-5 sm:p-6 lg:p-7">

        {{-- ========================================================= --}}
        {{-- UNIT + FAVOURITE --}}
        {{-- ========================================================= --}}

        <div class="flex items-start justify-between gap-4">

            <span
                class="inline-flex
                       items-center
                       bg-sky-100
                       text-sky-700
                       px-3 sm:px-4
                       py-2
                       rounded-full
                       text-xs sm:text-sm
                       font-bold
                       max-w-[75%]
                       truncate"
            >
                {{ $note->unit_code ?? $note->unit?->unit_code ?? 'N/A' }}
            </span>


            <form
                action="{{ route('favorites.toggle', $note) }}"
                method="POST"
                class="shrink-0"
            >

                @csrf

                <button
                    type="submit"
                    aria-label="Toggle favourite"
                    class="w-10 h-10 sm:w-11 sm:h-11
                           rounded-xl
                           flex
                           items-center
                           justify-center
                           text-2xl sm:text-3xl
                           hover:bg-red-50
                           hover:scale-110
                           transition
                           duration-200
                           focus:outline-none
                           focus:ring-4
                           focus:ring-red-100"
                >

                    @if($note->isFavoritedBy(auth()->user()))

                        ❤️

                    @else

                        🤍

                    @endif

                </button>

            </form>

        </div>


        {{-- ========================================================= --}}
        {{-- PDF ICON --}}
        {{-- ========================================================= --}}

        <div class="mt-5 sm:mt-6 flex justify-center">

            <div
                class="w-20 h-20
                       sm:w-24 sm:h-24
                       rounded-full
                       bg-red-100
                       flex
                       items-center
                       justify-center
                       shadow-sm"
            >

                <span class="text-4xl sm:text-5xl">
                    📄
                </span>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- TITLE --}}
        {{-- ========================================================= --}}

        <h2
            class="text-xl
                   sm:text-2xl
                   font-bold
                   text-center
                   mt-5 sm:mt-6
                   text-gray-800
                   break-words"
        >
            {{ $note->title }}
        </h2>


        {{-- ========================================================= --}}
        {{-- UNIT NAME --}}
        {{-- ========================================================= --}}

        <p
            class="text-center
                   text-gray-500
                   text-sm sm:text-base
                   mt-2
                   break-words"
        >
            {{ $note->unit_name ?? $note->unit?->unit_name ?? 'Unit name not provided' }}
        </p>


        {{-- ========================================================= --}}
        {{-- DESCRIPTION --}}
        {{-- ========================================================= --}}

        @if($note->description)

            <p
                class="text-gray-600
                       text-center
                       text-sm sm:text-base
                       mt-4 sm:mt-5
                       line-clamp-3
                       leading-relaxed"
            >
                {{ $note->description }}
            </p>

        @else

            <p
                class="text-gray-400
                       text-center
                       text-sm
                       italic
                       mt-4 sm:mt-5"
            >
                No description provided.
            </p>

        @endif


        {{-- ========================================================= --}}
        {{-- RATINGS --}}
        {{-- ========================================================= --}}

        <div class="mt-5 sm:mt-6">

            <div
                class="flex
                       justify-center
                       items-center
                       gap-0.5 sm:gap-1"
            >

                @for($i = 1; $i <= 5; $i++)

                    <form
                        action="{{ route('ratings.store', $note) }}"
                        method="POST"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="rating"
                            value="{{ $i }}"
                        >

                        <button
                            type="submit"
                            aria-label="Rate {{ $i }} out of 5"
                            class="w-9 h-9 sm:w-10 sm:h-10
                                   flex
                                   items-center
                                   justify-center
                                   rounded-lg
                                   text-xl sm:text-2xl
                                   hover:bg-amber-50
                                   hover:scale-110
                                   transition
                                   duration-200
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-amber-200"
                        >

                            @if($i <= round($note->averageRating()))

                                ⭐

                            @else

                                ☆

                            @endif

                        </button>

                    </form>

                @endfor

            </div>


            <p
                class="text-center
                       text-xs sm:text-sm
                       text-gray-500
                       mt-2"
            >

                <strong class="text-gray-700">
                    {{ $note->averageRating() }}
                </strong>/5

                <span class="mx-1">
                    •
                </span>

                {{ $note->ratingsCount() }}

                {{ $note->ratingsCount() == 1 ? 'Rating' : 'Ratings' }}

            </p>

        </div>


        {{-- ========================================================= --}}
        {{-- FAVOURITE COUNTER --}}
        {{-- ========================================================= --}}

        <div
            class="mt-3
                   text-center
                   text-xs sm:text-sm"
        >

            <span class="text-red-500 font-semibold">
                ❤️ {{ $note->favorites()->count() }}
            </span>

            <span class="text-gray-500">
                {{ $note->favorites()->count() == 1 ? 'student' : 'students' }}
                saved this
            </span>

        </div>


        {{-- ========================================================= --}}
        {{-- INFORMATION --}}
        {{-- ========================================================= --}}

        <div
            class="border-t
                   border-slate-200
                   mt-5 sm:mt-6
                   pt-5
                   space-y-3"
        >

            {{-- Uploaded By --}}

            <div
                class="flex
                       flex-col
                       sm:flex-row
                       sm:items-center
                       sm:justify-between
                       gap-1 sm:gap-3"
            >

                <span class="text-gray-500 text-sm">
                    👤 Uploaded By
                </span>

                <span
                    class="font-semibold
                           text-gray-700
                           text-sm
                           break-words
                           sm:text-right"
                >
                    {{ $note->user->name }}
                </span>

            </div>


            {{-- Uploaded Date --}}

            <div
                class="flex
                       flex-col
                       sm:flex-row
                       sm:items-center
                       sm:justify-between
                       gap-1 sm:gap-3"
            >

                <span class="text-gray-500 text-sm">
                    📅 Uploaded
                </span>

                <span
                    class="text-gray-700
                           text-sm
                           sm:text-right"
                >
                    {{ $note->created_at->format('d M Y') }}
                </span>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- ACTION BUTTONS --}}
        {{-- ========================================================= --}}

        <div
            class="grid
                   grid-cols-1
                   sm:grid-cols-2
                   gap-3
                   mt-6 sm:mt-8"
        >

            {{-- PREVIEW --}}

            <button
                type="button"
                onclick="openPreview('{{ route('notes.preview', $note) }}')"
                class="w-full
                       bg-sky-100
                       hover:bg-sky-200
                       text-sky-700
                       py-3
                       px-4
                       rounded-xl
                       font-semibold
                       text-sm sm:text-base
                       transition
                       duration-200
                       focus:outline-none
                       focus:ring-4
                       focus:ring-sky-100"
            >

                👁 Preview

            </button>


            {{-- DOWNLOAD --}}

            <a
                href="{{ asset('storage/'.$note->file_path) }}"
                download
                class="w-full
                       bg-gradient-to-r
                       from-green-500
                       to-emerald-600
                       text-white
                       py-3
                       px-4
                       rounded-xl
                       text-center
                       font-bold
                       text-sm sm:text-base
                       hover:from-green-600
                       hover:to-emerald-700
                       hover:scale-[1.02]
                       transition
                       duration-200
                       focus:outline-none
                       focus:ring-4
                       focus:ring-green-100"
            >

                📥 Download

            </a>

        </div>

    </div>

</div>