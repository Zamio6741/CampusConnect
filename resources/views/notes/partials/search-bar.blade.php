<div class="bg-white rounded-3xl shadow-xl p-6 mb-10">

    <form action="{{ route('notes.index') }}" method="GET">

        <div class="flex gap-4">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search by title, unit code, unit name..."
                class="flex-1 rounded-2xl border-gray-200 py-4 px-6 text-lg focus:ring-2 focus:ring-sky-500 focus:border-sky-500">

            <button
                class="bg-sky-600 hover:bg-sky-700 text-white px-8 rounded-2xl font-bold">

                🔍 Search

            </button>

        </div>

    </form>

</div>