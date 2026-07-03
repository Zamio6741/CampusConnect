<div class="bg-white rounded-3xl shadow-xl overflow-hidden hover:-translate-y-2 hover:shadow-2xl duration-300">

    <div class="bg-gradient-to-r from-sky-600 to-blue-700 h-3"></div>

    <div class="p-7">

        {{-- Unit + Favourite --}}
        <div class="flex justify-between items-start">

            <span class="bg-sky-100 text-sky-700 px-4 py-2 rounded-full text-sm font-bold">
                {{ $note->unit->unit_code }}
            </span>

            <form action="{{ route('favorites.toggle', $note) }}" method="POST">

                @csrf

                <button
                    type="submit"
                    class="text-3xl hover:scale-125 transition">

                    @if($note->isFavoritedBy(auth()->user()))

                        ❤️

                    @else

                        🤍

                    @endif

                </button>

            </form>

        </div>

        {{-- PDF Icon --}}
        <div class="mt-6 flex justify-center">

            <div class="w-24 h-24 rounded-full bg-red-100 flex items-center justify-center">

                <span class="text-5xl">

                    📄

                </span>

            </div>

        </div>

        {{-- Title --}}
        <h2 class="text-2xl font-bold text-center mt-6">

            {{ $note->title }}

        </h2>

        {{-- Unit --}}
        <p class="text-center text-gray-500 mt-2">

            {{ $note->unit->unit_name }}

        </p>

        {{-- Description --}}
        <p class="text-gray-600 text-center mt-5 line-clamp-3">

            {{ $note->description }}

        </p>

        {{-- Ratings --}}
        <div class="mt-6">

            <div class="flex justify-center gap-1">

                @for($i = 1; $i <= 5; $i++)

                    <form
                        action="{{ route('ratings.store',$note) }}"
                        method="POST">

                        @csrf

                        <input
                            type="hidden"
                            name="rating"
                            value="{{ $i }}">

                        <button
                            class="text-2xl hover:scale-125 transition">

                            @if($i <= round($note->averageRating()))

                                ⭐

                            @else

                                ☆

                            @endif

                        </button>

                    </form>

                @endfor

            </div>

            <p class="text-center text-sm text-gray-500 mt-2">

                <strong>{{ $note->averageRating() }}</strong>/5

                •

                {{ $note->ratingsCount() }}

                Ratings

            </p>

        </div>

        {{-- Favourite Counter --}}
        <div class="mt-3 text-center">

            <span class="text-red-500 font-semibold">

                ❤️ {{ $note->favorites()->count() }}

            </span>

            <span class="text-gray-500">

                students saved this

            </span>

        </div>

        {{-- Information --}}
        <div class="border-t mt-6 pt-5 space-y-3">

            <div class="flex justify-between">

                <span class="text-gray-500">

                    👤 Uploaded By

                </span>

                <span class="font-semibold">

                    {{ $note->user->name }}

                </span>

            </div>

            <div class="flex justify-between">

                <span class="text-gray-500">

                    📅 Uploaded

                </span>

                <span>

                    {{ $note->created_at->format('d M Y') }}

                </span>

            </div>

        </div>

        {{-- Buttons --}}
        <div class="grid grid-cols-2 gap-3 mt-8">

            <button
                onclick="openPreview('{{ route('notes.preview',$note) }}')"
                class="bg-sky-100 hover:bg-sky-200 text-sky-700 py-3 rounded-xl font-semibold">

                👁 Preview

            </button>

            <a
                href="{{ asset('storage/'.$note->file_path) }}"
                download
                class="bg-gradient-to-r from-green-500 to-emerald-600 text-white py-3 rounded-xl text-center font-bold hover:scale-105 transition">

                📥 Download

            </a>

        </div>

    </div>

</div>