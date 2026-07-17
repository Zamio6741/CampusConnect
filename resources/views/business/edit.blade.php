<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-sky-50 via-blue-50 to-slate-100 py-10">

    <div class="max-w-6xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <div class="bg-sky-600 text-white px-10 py-8">

                <h1 class="text-4xl font-bold">
                    ✏ Edit Business
                </h1>

                <p class="text-sky-100 mt-2">
                    Update your business information.
                </p>

            </div>

            <<form method="POST"
      action="{{ route('businesses.update',$business) }}"
      enctype="multipart/form-data"
      class="p-10">

                @csrf
                @method('PUT')

                <div class="md:col-span-2">

    <label class="font-semibold">
        Business Logo
    </label>

    @if($business->logo)

        <img
            src="{{ asset('storage/'.$business->logo) }}"
            class="w-32 h-32 rounded-2xl object-cover border mt-3 mb-4">

    @endif

    <input
        type="file"
        name="logo"
        class="w-full mt-2 border rounded-xl p-4">

</div>

                <div class="grid md:grid-cols-2 gap-8">

                    <div>

                        <label class="font-semibold">
                            Business Name
                        </label>

                        <input
                            type="text"
                            name="business_name"
                            value="{{ old('business_name',$business->business_name) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            Category
                        </label>

                        <input
                            type="text"
                            name="category"
                            value="{{ old('category',$business->category) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            University
                        </label>

                        <select
                            name="university_id"
                            class="w-full mt-2 border rounded-xl p-4">

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

                        <label class="font-semibold">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            value="{{ old('phone',$business->phone) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            WhatsApp
                        </label>

                        <input
                            type="text"
                            name="whatsapp"
                            value="{{ old('whatsapp',$business->whatsapp) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email',$business->email) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div class="md:col-span-2">

                        <label class="font-semibold">
                            Location
                        </label>

                        <input
                            type="text"
                            name="location"
                            value="{{ old('location',$business->location) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div class="md:col-span-2">

                        <label class="font-semibold">
                            Description
                        </label>

                        <textarea
                            rows="5"
                            name="description"
                            class="w-full mt-2 border rounded-xl p-4">{{ old('description',$business->description) }}</textarea>

                    </div>

                    <div>

                        <label class="font-semibold">
                            Facebook
                        </label>

                        <input
                            type="text"
                            name="facebook"
                            value="{{ old('facebook',$business->facebook) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            Instagram
                        </label>

                        <input
                            type="text"
                            name="instagram"
                            value="{{ old('instagram',$business->instagram) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            TikTok
                        </label>

                        <input
                            type="text"
                            name="tiktok"
                            value="{{ old('tiktok',$business->tiktok) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                    <div>

                        <label class="font-semibold">
                            Website
                        </label>

                        <input
                            type="text"
                            name="website"
                            value="{{ old('website',$business->website) }}"
                            class="w-full mt-2 border rounded-xl p-4">

                    </div>

                </div>

                <div class="mt-10 flex justify-between">

                    <a
                        href="{{ route('business.dashboard') }}"
                        class="bg-gray-300 hover:bg-gray-400 px-8 py-4 rounded-xl font-semibold">

                        Cancel

                    </a>

                    <button
                        class="bg-sky-600 hover:bg-sky-700 text-white px-10 py-4 rounded-xl font-bold">

                        Save Changes

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

</x-app-layout>