<x-business-layout>

<div class="min-h-screen bg-slate-100 py-5 sm:py-8 lg:py-10">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 sm:mb-8">

            <div class="min-w-0">

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold break-words">

                    🖼 Business Gallery

                </h1>

                <p class="text-gray-500 mt-2 text-sm sm:text-base break-words">

                    {{ $business->business_name }}

                </p>

            </div>

            <a href="{{ route('business.dashboard') }}"
               class="w-full sm:w-auto text-center bg-gray-700 hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">

                ← Dashboard

            </a>

        </div>

        @if(session('success'))

            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 break-words">

                {{ session('success') }}

            </div>

        @endif

        <!-- Upload -->

        <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg p-5 sm:p-8 mb-6 sm:mb-10">

            <form action="{{ route('business.gallery.store',$business) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <label class="block font-bold mb-3">

                    Upload Images

                </label>

                <input
                    type="file"
                    name="images[]"
                    multiple
                    class="w-full border rounded-xl p-3 sm:p-4 text-sm sm:text-base bg-white">

                <button
                    class="w-full sm:w-auto mt-5 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl transition">

                    Upload Images

                </button>

            </form>

        </div>

        <!-- Images -->

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-5 sm:gap-8">

            @forelse($business->images as $image)

                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-lg overflow-hidden">

                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="w-full h-52 sm:h-56 object-cover">

                    <div class="p-4 sm:p-5">

                        @if($image->cover)

                            <div class="bg-green-100 text-green-700 text-center py-2 rounded-lg mb-3 text-sm sm:text-base">

                                ⭐ Cover Image

                            </div>

                        @endif

                        <form action="{{ route('business.gallery.cover',$image) }}"
                              method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                class="w-full bg-sky-600 hover:bg-sky-700 text-white py-3 rounded-lg mb-3 transition">

                                Set as Cover

                            </button>

                        </form>

                        <form action="{{ route('business.gallery.destroy',$image) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete image?')"
                                class="w-full bg-red-600 hover:bg-red-700 text-white py-3 rounded-lg transition">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-12 sm:py-20 px-4">

                    <div class="text-6xl sm:text-7xl">

                        🖼

                    </div>

                    <h2 class="text-2xl sm:text-3xl font-bold mt-5">

                        No images uploaded

                    </h2>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-business-layout>