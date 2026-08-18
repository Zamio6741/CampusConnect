<div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-4 sm:p-6 mb-8 sm:mb-10">

    <form action="{{ route('notes.index') }}" method="GET">

        <div class="flex flex-col sm:flex-row gap-3 sm:gap-4">

            <!-- SEARCH INPUT -->

            <div class="relative flex-1">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by title, unit code, unit name..."
                    class="w-full
                           rounded-2xl
                           border-2
                           border-slate-300
                           bg-white
                           py-3.5 sm:py-4
                           px-4 sm:px-6
                           text-base sm:text-lg
                           text-slate-800
                           placeholder-slate-400
                           shadow-sm
                           outline-none
                           transition-all duration-200
                           focus:border-sky-500
                           focus:ring-4
                           focus:ring-sky-100"
                >

            </div>


            <!-- SEARCH BUTTON -->

            <button
                type="submit"
                class="w-full sm:w-auto
                       min-h-[52px]
                       sm:min-h-[56px]
                       bg-sky-600
                       hover:bg-sky-700
                       active:bg-sky-800
                       text-white
                       px-6 sm:px-8
                       rounded-2xl
                       font-bold
                       text-base sm:text-lg
                       shadow-md
                       hover:shadow-lg
                       transition-all duration-200
                       whitespace-nowrap
                       flex items-center justify-center gap-2"
            >

                <span>🔍</span>

                <span>
                    Search
                </span>

            </button>

        </div>

    </form>

</div>