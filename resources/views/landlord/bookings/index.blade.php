<x-app-layout>

<div class="min-h-screen bg-slate-100 py-8">

    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
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

        <!-- Statistics -->
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
                <p class="text-gray-500">Completed</p>
                <h2 class="text-4xl font-bold text-blue-700 mt-2">
                    {{ $completedBookings }}
                </h2>
            </div>

        </div>

        <!-- Search -->
        <div class="mb-8">

            <input
                id="bookingSearch"
                type="text"
                placeholder="Search student or property..."
                class="w-full bg-white rounded-2xl shadow border border-gray-200 px-6 py-4 focus:ring-4 focus:ring-blue-100">

        </div>

        <!-- Booking Cards -->
        <div id="bookingContainer" class="space-y-8">

            @forelse($bookings as $booking)

            <div class="booking-card bg-white rounded-3xl shadow-lg overflow-hidden">

                <div class="grid lg:grid-cols-[280px_1fr]">

                    <!-- Image -->
                    <div>

                        @if($booking->accommodation->photos->first())

                            <img
                                src="{{ asset('storage/'.$booking->accommodation->photos->first()->image_path) }}"
                                class="h-full w-full object-cover">

                        @else

                            <div class="h-full min-h-[250px] bg-gray-200 flex items-center justify-center text-6xl">
                                🏠
                            </div>

                        @endif

                    </div>

                    <!-- Details -->
                    <div class="lg:col-span-3 p-8">

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

                            @else

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full font-bold">
                                    Completed
                                </span>

                            @endif

                        </div>

                      <div class="mt-8 space-y-4">

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-slate-50 rounded-2xl p-4">

            <p class="text-gray-500 text-sm">Student</p>

            <p class="font-bold text-lg">
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

        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">

            <h3 class="font-bold text-slate-700 mb-2">

                💬 Student Message

            </h3>

            <p class="text-gray-700">

                {{ $booking->message }}

            </p>

        </div>

    @endif

</div>

                       <div class="mt-8 flex flex-wrap gap-4">

@if($booking->status=="Pending")

<form method="POST" action="{{ route('landlord.bookings.update',$booking) }}">
@csrf
@method('PATCH')

<input type="hidden" name="status" value="Approved">

<button class="px-6 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white font-bold">
✅ Approve
</button>

</form>

<form method="POST" action="{{ route('landlord.bookings.update',$booking) }}">
@csrf
@method('PATCH')

<input type="hidden" name="status" value="Rejected">

<button class="px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold">
❌ Reject
</button>

</form>

@elseif($booking->status=="Approved")

<form method="POST" action="{{ route('landlord.bookings.update',$booking) }}">
@csrf
@method('PATCH')

<input type="hidden" name="status" value="Completed">

<button class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold">
✔ Mark Completed
</button>

</form>

@elseif($booking->status=="Completed")

<div class="px-6 py-3 rounded-xl bg-green-100 text-green-700 font-bold">
✔ Booking Completed
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
document.getElementById('bookingSearch').addEventListener('keyup', function(){

    let value=this.value.toLowerCase();

    document.querySelectorAll('.booking-card').forEach(card=>{

        let student=card.querySelector('.student-name').innerText.toLowerCase();

        let property=card.querySelector('.property-title').innerText.toLowerCase();

        if(student.includes(value)||property.includes(value)){
            card.style.display='';
        }else{
            card.style.display='none';
        }

    });

});
</script>

</x-app-layout>