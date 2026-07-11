<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50">

<div class="max-w-5xl mx-auto py-14">

<h1 class="text-5xl font-extrabold text-center text-orange-600">
📍 Property Location
</h1>

<p class="text-center text-gray-600 mt-3 text-lg">
Step 2 of 5 • Tell students where your property is located
</p>

<div class="w-full bg-gray-200 rounded-full h-3 mt-8">
    <div class="bg-orange-600 h-3 rounded-full w-2/5"></div>
</div>

<div class="bg-white rounded-3xl shadow-xl mt-10 p-10">

<form>

<div class="mb-8">

<label class="block font-bold mb-2">

University

</label>

<select
class="w-full rounded-xl border-gray-300">

<option>Kenyatta University</option>

</select>

<p class="text-sm text-gray-500 mt-2">

Students from this university will see your listing.

</p>

</div>

<div class="mb-8">

<label class="block font-bold mb-2">

Nearby Area

</label>

<select
class="w-full rounded-xl border-gray-300">

<option>Select Area</option>

<option>Kahawa Wendani</option>

<option>Kahawa Sukari</option>

<option>Zimmerman</option>

<option>Roysambu</option>

</select>

</div>

<div class="mb-8">

<label class="block font-bold mb-2">

Exact Location

</label>

<input
type="text"
placeholder="Example: Opposite QuickMart, 100m from Gate B"
class="w-full rounded-xl border-gray-300">

</div>

<div class="flex justify-between mt-10">

<a href="{{ route('rental.step1') }}"
class="px-8 py-4 rounded-xl bg-gray-200 hover:bg-gray-300 font-bold">

← Back

</a>

<a href="{{ route('rental.step3') }}"
class="px-8 py-4 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-bold">

Next →

</a>

</div>

</form>

</div>

</div>

</div>

</x-app-layout>