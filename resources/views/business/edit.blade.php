<x-business-profile-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 py-5 sm:py-8">

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

            {{-- Header --}}
            <div class="bg-gradient-to-r from-sky-600 to-blue-700 text-white px-5 sm:px-8 py-6 sm:py-8">

                <h1 class="text-2xl sm:text-3xl font-bold">
                    ✏ Edit Business
                </h1>

                <p class="text-sky-100 mt-2 text-sm sm:text-base">
                    Update your business information.
                </p>

            </div>

            <form method="POST"
                  action="{{ route('businesses.update',$business) }}"
                  enctype="multipart/form-data"
                  class="p-5 sm:p-8 lg:p-10">

                @csrf
                @method('PUT')

                {{-- Business Logo --}}
                <div class="mb-8 pb-8 border-b border-slate-200">

                    <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                        Business Logo
                    </h2>

                    <p class="text-sm text-slate-500 mt-1 mb-4">
                        Upload a clear logo for your business.
                    </p>

                    <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                        @if($business->logo)

                            <img
                                src="{{ asset('storage/'.$business->logo) }}"
                                class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl object-cover border border-slate-200 shadow-sm">

                        @else

                            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-2xl bg-sky-50 border border-sky-100 flex items-center justify-center text-4xl">
                                🏪
                            </div>

                        @endif

                        <div class="flex-1 min-w-0">

                            <label class="block text-sm font-semibold text-slate-700 mb-2">
                                Choose new logo
                            </label>

                            <input
                                type="file"
                                name="logo"
                                class="w-full border border-slate-300 rounded-xl p-3 text-sm bg-white
                                       file:mr-3 file:rounded-lg file:border-0
                                       file:bg-sky-50 file:px-3 file:py-2
                                       file:text-sm file:font-semibold file:text-sky-700
                                       hover:border-sky-400 focus:outline-none">

                        </div>

                    </div>

                </div>

                {{-- Basic Information --}}
                <div class="mb-8">

                    <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                        Business Information
                    </h2>

                    <p class="text-sm text-slate-500 mt-1 mb-5">
                        Keep your business details accurate and up to date.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Business Name
                            </label>

                            <input
                                type="text"
                                name="business_name"
                                value="{{ old('business_name',$business->business_name) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Category
                            </label>

                            <input
                                type="text"
                                name="category"
                                value="{{ old('category',$business->category) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                University
                            </label>

                            <select
                                name="university_id"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base bg-white
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">

                                @foreach($universities as $university)

                                    <option
                                        value="{{ $university->id }}"
                                        {{ $business->university_id==$university->id ? 'selected' : '' }}>

                                        {{ $university->name }}

                                    </option>

                                @endforeach

                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Phone
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone',$business->phone) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                WhatsApp
                            </label>

                            <input
                                type="text"
                                name="whatsapp"
                                value="{{ old('whatsapp',$business->whatsapp) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email',$business->email) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-slate-700">
                                Location
                            </label>

                            <input
                                type="text"
                                name="location"
                                value="{{ old('location',$business->location) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">

                        </div>

                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-slate-700">
                                Description
                            </label>

                            <textarea
                                rows="5"
                                name="description"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base resize-y
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">{{ old('description',$business->description) }}</textarea>

                        </div>

                    </div>

                </div>

                {{-- Social Media --}}
                <div class="pt-8 border-t border-slate-200">

                    <h2 class="text-lg sm:text-xl font-bold text-slate-800">
                        Social Media & Website
                    </h2>

                    <p class="text-sm text-slate-500 mt-1 mb-5">
                        Add your online business profiles.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 sm:gap-6">

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Facebook
                            </label>

                            <input
                                type="text"
                                name="facebook"
                                value="{{ old('facebook',$business->facebook) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Instagram
                            </label>

                            <input
                                type="text"
                                name="instagram"
                                value="{{ old('instagram',$business->instagram) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                TikTok
                            </label>

                            <input
                                type="text"
                                name="tiktok"
                                value="{{ old('tiktok',$business->tiktok) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700">
                                Website
                            </label>

                            <input
                                type="text"
                                name="website"
                                value="{{ old('website',$business->website) }}"
                                class="w-full mt-2 border border-slate-300 rounded-xl p-3 sm:p-3.5 text-sm sm:text-base
                                       focus:border-sky-500 focus:ring-2 focus:ring-sky-100 focus:outline-none transition">
                        </div>

                    </div>

                </div>

                {{-- Actions --}}
                <div class="mt-8 sm:mt-10 pt-6 border-t border-slate-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-3">

                    <a
                        href="{{ route('business.dashboard') }}"
                        class="w-full sm:w-auto text-center bg-slate-100 hover:bg-slate-200 text-slate-700
                               px-7 py-3 rounded-xl font-semibold transition border border-slate-200">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="w-full sm:w-auto bg-sky-600 hover:bg-sky-700 text-white
                               px-8 py-3 rounded-xl font-bold shadow-sm hover:shadow transition">

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-business-profile-layout>