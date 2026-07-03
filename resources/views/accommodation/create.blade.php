<x-app-layout>

<div class="min-h-screen bg-gradient-to-br from-orange-50 via-yellow-50 to-amber-50 py-10">

<div class="max-w-6xl mx-auto">

<div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

<div class="bg-gradient-to-r from-orange-600 to-amber-500 p-8 text-white">

<h1 class="text-5xl font-extrabold">
🏠 Post Accommodation
</h1>

<p class="mt-2 text-orange-100">
Campus Hostel or Off-Campus Rental
</p>

</div>

@if ($errors->any())

<div class="m-6 bg-red-100 border border-red-300 text-red-700 rounded-xl p-5">

<ul class="list-disc ml-6">

@foreach($errors->all() as $error)

<li>{{ $error }}</li>

@endforeach

</ul>

</div>

@endif

<form action="{{ route('accommodation.store') }}"
method="POST"
enctype="multipart/form-data"
class="p-8 space-y-8">

@csrf

{{-- Listing Type --}}

<div class="grid md:grid-cols-2 gap-8">

<div>

<label class="block font-bold mb-2">

Listing Type

</label>

<select
id="listing_type"
name="listing_type"
onchange="changeForm()"
class="w-full rounded-xl border-gray-300">

<option value="campus">🏫 Campus Hostel</option>

<option value="rental">🏠 Off Campus Rental</option>

</select>

</div>

<div>

<label class="block font-bold mb-2">

Property Type

</label>

<select
id="property_type"
name="property_type"
class="w-full rounded-xl border-gray-300">

<option value="Hostel">Hostel</option>

</select>

</div>

</div>

{{-- Title --}}

<div>

<label class="block font-bold mb-2">

Accommodation Name

</label>

<input
type="text"
name="title"
class="w-full rounded-xl border-gray-300">

</div>

{{-- Description --}}

<div>

<label class="block font-bold mb-2">

Description

</label>

<textarea
rows="5"
name="description"
class="w-full rounded-xl border-gray-300"></textarea>

</div>

{{-- Location --}}

<div>

<label class="block font-bold mb-2">

Location

</label>

<input
type="text"
name="location"
class="w-full rounded-xl border-gray-300">

</div>

{{-- Contacts --}}

<div class="grid md:grid-cols-2 gap-8">

<div>

<label class="block font-bold mb-2">

Phone Number

</label>

<input
type="text"
name="phone"
class="w-full rounded-xl border-gray-300">

</div>

<div>

<label class="block font-bold mb-2">

WhatsApp Number

</label>

<input
type="text"
name="whatsapp"
class="w-full rounded-xl border-gray-300">

</div>

</div>

{{-- Spaces & Price --}}

<div class="grid md:grid-cols-2 gap-8">

<div>

<label class="block font-bold mb-2">

Available Spaces

</label>

<input
type="number"
name="available_spaces"
class="w-full rounded-xl border-gray-300">

</div>

<div>

<label class="block font-bold mb-2">

Monthly Rent

</label>

<input
type="number"
name="price"
class="w-full rounded-xl border-gray-300">

</div>

</div>

{{-- Images --}}

<div>

<label class="block font-bold mb-2">

Upload Photos

</label>

<input
type="file"
multiple
name="images[]"
class="w-full rounded-xl border-gray-300">

</div>

{{-- Facilities (Hidden for Campus Hostels) --}}

<div id="facility_section">

<label class="block font-bold mb-3">

Facilities

</label>

<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">

@foreach([
'WiFi',
'Water',
'Electricity',
'Parking',
'Security',
'CCTV',
'Hot Shower',
'Laundry',
'Kitchen',
'Balcony',
'Wardrobe'
] as $facility)

<label class="flex items-center gap-2">

<input
type="checkbox"
name="facilities[]"
value="{{ $facility }}">

{{ $facility }}

</label>

@endforeach

</div>

</div>

<div class="flex gap-5">

<button
type="submit"
class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-xl font-bold">

📤 Publish Accommodation

</button>

<a
href="{{ route('dashboard') }}"
class="bg-gray-300 px-8 py-4 rounded-xl font-bold">

Cancel

</a>

</div>

</form>

</div>

</div>

</div>

<script>

function changeForm(){

let listing=document.getElementById("listing_type");

let property=document.getElementById("property_type");

let facilities=document.getElementById("facility_section");

if(listing.value==="campus"){

property.innerHTML=`
<option value="Hostel">Hostel</option>
`;

facilities.style.display="none";

}else{

property.innerHTML=`
<option value="Bedsitter">Bedsitter</option>
<option value="Single Room">Single Room</option>
<option value="Studio">Studio</option>
<option value="One Bedroom">One Bedroom</option>
<option value="Two Bedroom">Two Bedroom</option>
`;

facilities.style.display="block";

}

}

window.onload=changeForm;

</script>

</x-app-layout>