<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-sky-50 to-blue-100">

<div class="max-w-7xl mx-auto px-8 py-10">

<div class="flex justify-between items-center mb-10">

<div>

<h1 class="text-5xl font-extrabold text-slate-800">

⚙️ Business Settings

</h1>

<p class="text-gray-500 mt-2">

Manage your business information and branding.

</p>

</div>

<a href="{{ route('business.dashboard') }}"
class="bg-sky-600 hover:bg-sky-700 text-white px-6 py-3 rounded-xl">

← Dashboard

</a>

</div>

@if(session('success'))

<div class="bg-green-100 border border-green-300 text-green-700 rounded-xl p-5 mb-8">

{{ session('success') }}

</div>

@endif

<form
action="{{ route('business.settings.update') }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="grid lg:grid-cols-3 gap-8">

<!-- Left Card -->

<div class="bg-white rounded-3xl shadow-xl p-8">

<div class="flex flex-col items-center">

@if($business->logo)

<img
src="{{ asset('storage/'.$business->logo) }}"
class="w-44 h-44 rounded-full object-cover shadow">

@else

<div
class="w-44 h-44 rounded-full bg-sky-100 flex items-center justify-center text-7xl">

🏢

</div>

@endif

<label class="mt-8 font-semibold">

Business Logo

</label>

<input
type="file"
name="logo"
class="mt-4 w-full border rounded-xl p-3">

<h2 class="mt-8 text-3xl font-bold text-center">

{{ $business->business_name }}

</h2>

<p class="text-gray-500 mt-2">

{{ $business->category }}

</p>

<div class="mt-8 space-y-3 w-full">

<div class="flex justify-between">

<span>Status</span>

<span class="font-bold text-green-600">

{{ $business->status }}

</span>

</div>

<div class="flex justify-between">

<span>University</span>

<span>

{{ $business->university->name }}

</span>

</div>

</div>

</div>

</div> <!-- Close Left Card -->

<!-- Right Side -->

<div class="lg:col-span-2 bg-white rounded-3xl shadow-xl p-8">
    <h2 class="text-3xl font-bold mb-8">

        🏢 Business Information

    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>

            <label class="font-semibold">

                Business Name

            </label>

            <input
                type="text"
                name="business_name"
                value="{{ old('business_name',$business->business_name) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div>

            <label class="font-semibold">

                Category

            </label>

            <input
                type="text"
                name="category"
                value="{{ old('category',$business->category) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div class="md:col-span-2">

            <label class="font-semibold">

                Description

            </label>

            <textarea
                name="description"
                rows="5"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">{{ old('description',$business->description) }}</textarea>

        </div>

        <div>

            <label class="font-semibold">

                Phone

            </label>

            <input
                type="text"
                name="phone"
                value="{{ old('phone',$business->phone) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div>

            <label class="font-semibold">

                WhatsApp

            </label>

            <input
                type="text"
                name="whatsapp"
                value="{{ old('whatsapp',$business->whatsapp) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div>

            <label class="font-semibold">

                Email

            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email',$business->email) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div>

            <label class="font-semibold">

                Website

            </label>

            <input
                type="text"
                name="website"
                value="{{ old('website',$business->website) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div>

            <label class="font-semibold">

                Location

            </label>

            <input
                type="text"
                name="location"
                value="{{ old('location',$business->location) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

        </div>

        <div>

            <label class="font-semibold">

                University

            </label>

            <select
                name="university_id"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">

                @foreach($universities as $university)

                    <option
                        value="{{ $university->id }}"
                        {{ $business->university_id==$university->id ? 'selected' : '' }}>

                        {{ $university->name }}

                    </option>

                @endforeach

            </select>

        </div>

    </div>
</div>

</div> <!-- End Grid -->

<div class="bg-white rounded-3xl shadow-xl p-8 mt-8">

    <h2 class="text-3xl font-bold mb-8">
        🌐 Social Media & Location
    </h2>

    <div class="grid md:grid-cols-2 gap-6">

        <div>
            <label class="font-semibold">Facebook</label>

            <input
                type="text"
                name="facebook"
                value="{{ old('facebook',$business->facebook) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">
        </div>

        <div>
            <label class="font-semibold">Instagram</label>

            <input
                type="text"
                name="instagram"
                value="{{ old('instagram',$business->instagram) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">
        </div>

        <div>
            <label class="font-semibold">TikTok</label>

            <input
                type="text"
                name="tiktok"
                value="{{ old('tiktok',$business->tiktok) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">
        </div>

        <div>
            <label class="font-semibold">Google Maps Link</label>

            <input
                type="text"
                name="google_maps"
                value="{{ old('google_maps',$business->google_maps) }}"
                class="w-full mt-2 rounded-xl border border-gray-300 p-4">
        </div>

    </div>

    <div class="mt-10 flex justify-end">

        <button
            type="submit"
            class="bg-sky-600 hover:bg-sky-700 text-white px-10 py-4 rounded-xl font-bold text-lg shadow-lg">

            💾 Save Changes

        </button>

    </div>

</div>

</form>

</div>

</div>

</x-app-layout>