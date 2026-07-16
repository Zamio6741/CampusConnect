<x-app-layout>

<div class="min-h-screen bg-slate-100 py-8">

    <div class="max-w-7xl mx-auto px-6">

        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-slate-800">
                📅 Booking Management
            </h1>

            <p class="text-gray-500 mt-2">
                Manage all property viewing requests from students.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-100 border border-green-300 text-green-700 rounded-2xl p-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-4 gap-6 mb-10">

            <div class="bg-white rounded-3xl shadow-lg p-6">
                <p class="text-gray-500">Total Requests</p>
                <h2 class="text-4xl font-bold text-blue-600 mt-2">
                    {{ $totalBookings }}
                </h2>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-6">
                <p class="text-gray-500">Pending</p>
                <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                    {{ $pendingBookings }}
                </h2>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-6">
                <p class="text-gray-500">Approved</p>
                <h2 class="text-4xl font-bold text-green-600 mt-2">
                    {{ $approvedBookings }}
                </h2>
            </div>

            <div class="bg-white rounded-3xl shadow-lg p-6">
                <p class="text-gray-500">Moved In</p>
                <h2 class="text-4xl font-bold text-blue-700 mt-2">
                    {{ $movedInBookings }}
                </h2>
            </div>

        </div>

        <div class="mb-8">
            <input
                id="bookingSearch"
                type="text"
                placeholder="Search student or property..."
                class="w-full bg-white rounded-2xl shadow border border-gray-200 px-6 py-4">
        </div>

        <div id="bookingContainer" class="space-y-8">

            @forelse($bookings as $booking)

            <div class="booking-card bg-white rounded-3xl shadow-lg overflow-hidden">

                <div class="grid lg:grid-cols-[280px_1fr]">

                    <div>

                        @if($booking->accommodation->photos->first())

                            <img src="{{ asset('storage/'.$booking->accommodation->photos->first()->image_path) }}"
                                 class="h-full w-full object-cover">

                        @else

                            <div class="h-full min-h-[250px] bg-gray-200 flex items-center justify-center text-6xl">
                                🏠
                            </div>

                        @endif

                    </div>

                    <div class="p-8">

                        <div class="flex justify-between">

                            <div>

                                <h2 class="property-title text-3xl font-bold">
                                    {{ $booking->accommodation->title }}
                                </h2>

                                <p class="text-gray-500 mt-2">
                                    📍 {{ $booking->accommodation->location }}
                                </p>

                            </div>

                            @if($booking->status=="Pending")

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full font-bold">
                                    Pending
                                </span>

                            @elseif($booking->status=="Approved")

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-bold">
                                    Approved
                                </span>

                            @elseif($booking->status=="Rejected")

                                <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full font-bold">
                                    Rejected
                                </span>

                            @elseif($booking->status=="Moved In")

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-bold">
                                    🏠 Moved In
                                </span>

                            @endif

                        </div>

                        <div class="mt-8 grid md:grid-cols-3 gap-6">

                            <div class="bg-slate-50 rounded-2xl p-4">
                                <p class="text-gray-500 text-sm">Student</p>
                                <p class="student-name font-bold text-lg">
                                    {{ $booking->student->name }}
                                </p>
                            </div>

                            <div class="bg-slate-50 rounded-2xl p-4">
                                <p class="text-gray-500 text-sm">Phone</p>
                                <p class="font-bold">
                                    {{ $booking->phone }}
                                </p>
                            </div>

                            <div class="bg-slate-50 rounded-2xl p-4">
                                <p class="text-gray-500 text-sm">Visit Date</p>
                                <p class="font-bold">
                                    {{ \Carbon\Carbon::parse($booking->visit_date)->format('d M Y') }}
                                </p>
                            </div>

                        </div>

                        @if($booking->message)

                        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-5">

                            <h3 class="font-bold mb-2">
                                💬 Student Message
                            </h3>

                            {{ $booking->message }}

                        </div>

                        @endif

                        <div class="mt-8 flex gap-4 flex-wrap">

                            @if($booking->status=="Pending")

                            <form method="POST" action="{{ route('landlord.bookings.update',$booking) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Approved">
                                <button class="px-6 py-3 rounded-xl bg-green-600 text-white">
                                    ✅ Approve
                                </button>
                            </form>

                            <form method="POST" action="{{ route('landlord.bookings.update',$booking) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Rejected">
                                <button class="px-6 py-3 rounded-xl bg-red-600 text-white">
                                    ❌ Reject
                                </button>
                            </form>

                            @elseif($booking->status=="Approved")

                            <form method="POST" action="{{ route('landlord.bookings.update',$booking) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="Moved In">
                                <button class="px-6 py-3 rounded-xl bg-blue-600 text-white">
                                    🏠 Mark Moved In
                                </button>
                            </form>

                            @elseif($booking->status=="Moved In")

                            <div class="px-6 py-3 rounded-xl bg-blue-100 text-blue-700 font-bold">
                                🏠 Tenant Moved In
                            </div>

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            @empty

                <div class="bg-white rounded-3xl shadow-lg p-16 text-center">
                    <h2 class="text-3xl font-bold text-gray-500">
                        📭 No booking requests yet.
                    </h2>
                </div>

            @endforelse

        </div>

    </div>

</div>

<script>
document.getElementById('bookingSearch').addEventListener('keyup', function () {

    let value = this.value.toLowerCase();

    document.querySelectorAll('.booking-card').forEach(card => {

        let student = card.querySelector('.student-name').innerText.toLowerCase();
        let property = card.querySelector('.property-title').innerText.toLowerCase();

        card.style.display =
            student.includes(value) || property.includes(value)
            ? ''
            : 'none';

    });

});
</script>

</x-app-layout>
