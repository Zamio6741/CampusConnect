<x-app-layout>

<div class="max-w-3xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h1 class="text-3xl font-bold mb-8">

            📅 Request Property Viewing

        </h1>
        @if ($errors->any())
    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-xl p-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 rounded-xl p-4">
        {{ session('success') }}
    </div>
@endif

        <form method="POST"
              action="{{ route('bookings.store',$accommodation) }}">

            @csrf

            <div class="mb-6">

                <label class="font-semibold">

                    Preferred Visit Date

                </label>

                <input
                    type="date"
                    name="visit_date"
                    class="w-full mt-2 rounded-xl border-gray-300">

            </div>

            <div class="mb-6">

                <label class="font-semibold">

                    Phone Number

                </label>

                <input
                    type="text"
                    name="phone"
                    class="w-full mt-2 rounded-xl border-gray-300"
                    value="{{ auth()->user()->phone }}">

            </div>

            <div class="mb-6">

                <label class="font-semibold">

                    Message

                </label>

                <textarea
                    name="message"
                    rows="5"
                    class="w-full mt-2 rounded-xl border-gray-300"
                    placeholder="Tell the landlord anything important..."></textarea>

            </div>

            <button
                class="w-full bg-orange-600 hover:bg-orange-700 text-white font-bold py-4 rounded-xl">

                Send Booking Request

            </button>

        </form>

    </div>

</div>

</x-app-layout>