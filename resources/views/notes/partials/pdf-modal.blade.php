<div
    id="pdfModal"
    class="fixed inset-0 bg-black/70 hidden z-50 flex items-center justify-center p-8">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-6xl h-[90vh] flex flex-col overflow-hidden">

        <div class="bg-gradient-to-r from-sky-700 to-blue-700 text-white flex justify-between items-center px-6 py-4">

            <h2 class="text-xl font-bold">

                📄 PDF Preview

            </h2>

            <button
                onclick="closePreview()"
                class="text-3xl hover:text-red-300">

                &times;

            </button>

        </div>

        <iframe
            id="pdfFrame"
            class="flex-1 w-full"
            src="">

        </iframe>

    </div>

</div>

<script>

function openPreview(url){

    document.getElementById('pdfFrame').src = url;

    document.getElementById('pdfModal').classList.remove('hidden');

}

function closePreview(){

    document.getElementById('pdfModal').classList.add('hidden');

    document.getElementById('pdfFrame').src='';

}

</script>