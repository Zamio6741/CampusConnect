<x-app-layout>

<div class="min-h-screen bg-slate-100 py-10">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-4xl font-bold">

                    🖼 Business Gallery

                </h1>

                <p class="text-gray-500 mt-2">

                    {{ $business->business_name }}

                </p>

            </div>

            <a href="{{ route('business.dashboard') }}"
               class="bg-gray-700 text-white px-5 py-3 rounded-xl">

                ← Dashboard

            </a>

        </div>

        @if(session('success'))

            <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6">

                {{ session('success') }}

            </div>

        @endif

        <!-- Upload -->

        <div class="bg-white rounded-3xl shadow-lg p-8 mb-10">

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
                    class="w-full border rounded-xl p-4">

                <button
                    class="mt-5 bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl">

                    Upload Images

                </button>

            </form>

        </div>

        <!-- Images -->

        <div class="grid md:grid-cols-3 xl:grid-cols-4 gap-8">

            @forelse($business->images as $image)

                <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

                    <img src="{{ asset('storage/'.$image->image) }}"
                         class="w-full h-56 object-cover">

                    <div class="p-5">

                        @if($image->cover)

                            <div class="bg-green-100 text-green-700 text-center py-2 rounded-lg mb-3">

                                ⭐ Cover Image

                            </div>

                        @endif

                        <form action="{{ route('business.gallery.cover',$image) }}"
                              method="POST">

                            @csrf
                            @method('PATCH')

                            <button
                                class="w-full bg-sky-600 text-white py-2 rounded-lg mb-3">

                                Set as Cover

                            </button>

                        </form>

                        <form action="{{ route('business.gallery.destroy',$image) }}"
                              method="POST">

                            @csrf
                            @method('DELETE')

                            <button
                                onclick="return confirm('Delete image?')"
                                class="w-full bg-red-600 text-white py-2 rounded-lg">

                                Delete

                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="col-span-full text-center py-20">

                    <div class="text-7xl">

                        🖼

                    </div>

                    <h2 class="text-3xl font-bold mt-5">

                        No images uploaded

                    </h2>

                </div>

            @endforelse

        </div>

    </div>

</div>

</x-app-layout>