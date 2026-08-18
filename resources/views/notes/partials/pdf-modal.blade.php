<div
    id="pdfModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/70 p-3 sm:p-4 lg:p-6"
    role="dialog"
    aria-modal="true"
    aria-labelledby="pdfModalTitle"
>

    {{-- ========================================================= --}}
    {{-- MODAL CONTAINER --}}
    {{-- ========================================================= --}}

    <div
        class="bg-white
               rounded-2xl sm:rounded-3xl
               shadow-2xl
               w-full
               max-w-6xl
               h-[92vh] sm:h-[90vh]
               flex flex-col
               overflow-hidden"
    >

        {{-- ===================================================== --}}
        {{-- HEADER --}}
        {{-- ===================================================== --}}

        <div
            class="bg-gradient-to-r
                   from-sky-700
                   to-blue-700
                   text-white
                   flex
                   items-center
                   justify-between
                   gap-4
                   px-4 sm:px-6
                   py-3 sm:py-4
                   shrink-0"
        >

            <div class="flex items-center gap-3 min-w-0">

                <div
                    class="w-9 h-9 sm:w-10 sm:h-10
                           rounded-xl
                           bg-white/15
                           flex
                           items-center
                           justify-center
                           shrink-0"
                >
                    📄
                </div>

                <h2
                    id="pdfModalTitle"
                    class="text-base sm:text-xl
                           font-bold
                           truncate"
                >
                    PDF Preview
                </h2>

            </div>


            {{-- CLOSE BUTTON --}}

            <button
                type="button"
                onclick="closePreview()"
                aria-label="Close PDF preview"
                class="w-10 h-10
                       rounded-xl
                       flex
                       items-center
                       justify-center
                       text-2xl sm:text-3xl
                       font-light
                       text-white
                       hover:bg-white/15
                       hover:text-red-200
                       transition
                       shrink-0
                       focus:outline-none
                       focus:ring-2
                       focus:ring-white/60"
            >
                &times;
            </button>

        </div>


        {{-- ===================================================== --}}
        {{-- PDF VIEWER --}}
        {{-- ===================================================== --}}

        <div class="relative flex-1 min-h-0 bg-slate-100">

            {{-- Loading indicator --}}

            <div
                id="pdfLoading"
                class="absolute inset-0
                       flex items-center justify-center
                       bg-slate-100
                       z-10"
            >

                <div class="text-center px-6">

                    <div
                        class="w-10 h-10
                               mx-auto
                               border-4
                               border-sky-200
                               border-t-sky-600
                               rounded-full
                               animate-spin"
                    ></div>

                    <p class="mt-4 text-sm text-gray-500">
                        Loading PDF preview...
                    </p>

                </div>

            </div>


            <iframe
                id="pdfFrame"
                class="w-full h-full border-0"
                src=""
                title="PDF Preview"
                loading="lazy"
            ></iframe>

        </div>


        {{-- ===================================================== --}}
        {{-- FOOTER --}}
        {{-- ===================================================== --}}

        <div
            class="bg-white
                   border-t
                   border-slate-200
                   px-4 sm:px-6
                   py-3
                   flex
                   items-center
                   justify-between
                   gap-3
                   shrink-0"
        >

            <p class="text-xs sm:text-sm text-gray-500 truncate">
                PDF Preview
            </p>

            <button
                type="button"
                onclick="closePreview()"
                class="shrink-0
                       rounded-xl
                       bg-slate-100
                       hover:bg-slate-200
                       text-slate-700
                       px-4 py-2
                       text-sm
                       font-semibold
                       transition
                       focus:outline-none
                       focus:ring-4
                       focus:ring-slate-200"
            >
                Close
            </button>

        </div>

    </div>

</div>


<script>

function openPreview(url) {

    const modal = document.getElementById('pdfModal');
    const frame = document.getElementById('pdfFrame');
    const loading = document.getElementById('pdfLoading');

    if (!modal || !frame) {
        return;
    }

    // Show loading state
    if (loading) {
        loading.classList.remove('hidden');
    }

    // Set PDF
    frame.src = url;

    // Show modal
    modal.classList.remove('hidden');
    modal.classList.add('flex');

    // Prevent background scrolling
    document.body.classList.add('overflow-hidden');

}


function closePreview() {

    const modal = document.getElementById('pdfModal');
    const frame = document.getElementById('pdfFrame');
    const loading = document.getElementById('pdfLoading');

    if (!modal) {
        return;
    }

    // Hide modal
    modal.classList.add('hidden');
    modal.classList.remove('flex');

    // Stop PDF from continuing to load
    if (frame) {
        frame.src = '';
    }

    // Reset loading state
    if (loading) {
        loading.classList.remove('hidden');
    }

    // Restore background scrolling
    document.body.classList.remove('overflow-hidden');

}


// Hide loading indicator once PDF iframe loads
document.addEventListener('DOMContentLoaded', function () {

    const frame = document.getElementById('pdfFrame');
    const loading = document.getElementById('pdfLoading');

    if (frame) {

        frame.addEventListener('load', function () {

            if (loading) {
                loading.classList.add('hidden');
            }

        });

    }

});


// Close when clicking outside the modal content
document.addEventListener('click', function (event) {

    const modal = document.getElementById('pdfModal');

    if (!modal || modal.classList.contains('hidden')) {
        return;
    }

    if (event.target === modal) {
        closePreview();
    }

});


// Close with Escape key
document.addEventListener('keydown', function (event) {

    if (event.key === 'Escape') {

        const modal = document.getElementById('pdfModal');

        if (modal && !modal.classList.contains('hidden')) {
            closePreview();
        }

    }

});

</script>