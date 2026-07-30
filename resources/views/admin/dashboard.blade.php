@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

{{-- Welcome Header --}}

<div class="flex items-center justify-between mb-8">

    <div>

        <h1 class="text-4xl font-bold text-slate-800">
            Welcome back, Admin! 👋
        </h1>

        <p class="text-slate-500 mt-2">
            Here's what's happening on CampusConnect today.
        </p>

    </div>

    <div class="bg-white shadow rounded-xl px-5 py-3">

        {{ now()->format('F d, Y') }}

    </div>

</div>

{{-- Statistics --}}

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Total Users
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($users) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Students
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($students) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Businesses
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($businesses) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Accommodations
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($accommodations) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Notes
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($notes) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Past Papers
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($pastpapers) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Announcements
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($announcements) }}
        </h2>

    </div>

    <div class="bg-white rounded-2xl shadow-lg p-6">

        <p class="text-gray-500">
            Universities
        </p>

        <h2 class="text-4xl font-bold mt-2">
            {{ number_format($universities) }}
        </h2>

    </div>

</div>

<div class="mt-10">

    <h2 class="text-2xl font-bold text-slate-800 mb-6">
        🚀 System Overview
    </h2>

    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-2xl p-6 text-white shadow-xl">

            <div class="text-5xl">
                👥
            </div>

            <h3 class="text-xl font-bold mt-4">
                {{ number_format($users) }}
            </h3>

            <p class="opacity-80">
                Registered Users
            </p>

        </div>

        <div class="bg-gradient-to-r from-green-500 to-green-700 rounded-2xl p-6 text-white shadow-xl">

            <div class="text-5xl">
                🏪
            </div>

            <h3 class="text-xl font-bold mt-4">
                {{ number_format($businesses) }}
            </h3>

            <p class="opacity-80">
                Active Businesses
            </p>

        </div>

        <div class="bg-gradient-to-r from-purple-500 to-purple-700 rounded-2xl p-6 text-white shadow-xl">

            <div class="text-5xl">
                🏠
            </div>

            <h3 class="text-xl font-bold mt-4">
                {{ number_format($accommodations) }}
            </h3>

            <p class="opacity-80">
                Rental Listings
            </p>

        </div>

    </div>

</div>

<div class="mt-8 grid md:grid-cols-4 gap-6">

    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex justify-between">
            <span>Server</span>
            <span class="text-green-600 font-bold">● Online</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex justify-between">
            <span>Database</span>
            <span class="text-green-600 font-bold">● Connected</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex justify-between">
            <span>Storage</span>
            <span class="text-blue-600 font-bold">Healthy</span>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-6">
        <div class="flex justify-between">
            <span>Security</span>
            <span class="text-green-600 font-bold">Protected</span>
        </div>
    </div>

</div>

<div class="grid xl:grid-cols-3 gap-6 mt-8">

    <!-- Left Side -->
    <div class="xl:col-span-2 space-y-6">

        <!-- User Growth -->
        <div class="bg-white rounded-2xl shadow p-6">
            <h2 class="text-xl font-bold mb-6">
                User Growth
            </h2>

            <div style="height:320px;">
    <canvas id="usersChart"></canvas>
</div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-2xl shadow p-6">

           <div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-xl font-bold mb-6">
        📈 Recent Activity
    </h2>

    <div class="space-y-5">

        @foreach($recentUsers as $user)

        <div class="flex items-start gap-4">

            <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-xl">
                👤
            </div>

            <div>

                <div class="font-semibold">
                    {{ $user->name }}
                </div>

                <div class="text-gray-500 text-sm">
                    Registered a new account
                </div>

                <div class="text-xs text-gray-400 mt-1">
                    {{ $user->created_at->diffForHumans() }}
                </div>

            </div>

        </div>

        @endforeach

        @foreach($recentBusinesses as $business)

        <div class="flex items-start gap-4">

            <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-xl">
                🏪
            </div>

            <div>

                <div class="font-semibold">
                    {{ $business->business_name }}
                </div>

                <div class="text-gray-500 text-sm">
                    Registered a business
                </div>

                <div class="text-xs text-gray-400 mt-1">
                    {{ $business->created_at->diffForHumans() }}
                </div>

            </div>

        </div>

        @endforeach

        @foreach($recentNotes as $note)

        <div class="flex items-start gap-4">

            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-xl">
                📚
            </div>

            <div>

                <div class="font-semibold">
                    {{ $note->title }}
                </div>

                <div class="text-gray-500 text-sm">
                    Uploaded new notes
                </div>

                <div class="text-xs text-gray-400 mt-1">
                    {{ $note->created_at->diffForHumans() }}
                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>


        </div>

    </div>

    <!-- Right Side -->
    <div class="space-y-6">

        <div class="bg-white rounded-2xl shadow p-6">

            <h2 class="text-xl font-bold mb-6">
                Users by Role
            </h2>

            <canvas id="rolesChart"></canvas>

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-xl font-bold mb-6">
        🏆 Top Universities
    </h2>

    <div class="space-y-5">

        @foreach($topUniversities as $university)

            <div>

                <div class="flex justify-between mb-2">

                    <span class="font-semibold">
                        {{ $university->name }}
                    </span>

                    <span class="text-slate-500">
                        {{ $university->users_count }} users
                    </span>

                </div>

                <div class="w-full bg-slate-200 rounded-full h-3">

                    <div
                        class="bg-blue-600 h-3 rounded-full"
                        style="width: {{ min(($university->users_count / max(1,$users))*100,100) }}%">
                    </div>

                </div>

            </div>

        @endforeach

    </div>

</div>

        <div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-xl font-bold mb-6">
        ⚡ Admin Control Center
    </h2>

    <div class="grid grid-cols-2 gap-4">

        <a href="#" class="bg-blue-600 text-white rounded-xl p-5 text-center hover:scale-105 transition">
            👥
            <div class="mt-2 font-semibold">Users</div>
        </a>

        <a href="#" class="bg-green-600 text-white rounded-xl p-5 text-center hover:scale-105 transition">
            🏪
            <div class="mt-2 font-semibold">Businesses</div>
        </a>

        <a href="#" class="bg-purple-600 text-white rounded-xl p-5 text-center hover:scale-105 transition">
            🏠
            <div class="mt-2 font-semibold">Rentals</div>
        </a>

        <a href="#" class="bg-orange-500 text-white rounded-xl p-5 text-center hover:scale-105 transition">
            📚
            <div class="mt-2 font-semibold">Notes</div>
        </a>

        <a href="#" class="bg-red-600 text-white rounded-xl p-5 text-center hover:scale-105 transition">
            📢
            <div class="mt-2 font-semibold">Announcements</div>
        </a>

        <a href="#" class="bg-slate-700 text-white rounded-xl p-5 text-center hover:scale-105 transition">
            📊
            <div class="mt-2 font-semibold">Reports</div>
        </a>

    </div>

</div>

<div class="mt-8 grid md:grid-cols-2 xl:grid-cols-4 gap-6">

    <div class="bg-yellow-100 rounded-2xl p-6 border-l-8 border-yellow-500">
        <h3 class="text-lg font-bold">🏪 Businesses Pending</h3>
        <div class="text-5xl font-bold mt-3">
            {{ $pendingBusinesses }}
        </div>
    </div>

    <div class="bg-blue-100 rounded-2xl p-6 border-l-8 border-blue-500">
        <h3 class="text-lg font-bold">📚 Notes Pending</h3>
        <div class="text-5xl font-bold mt-3">
            {{ $pendingNotes }}
        </div>
    </div>

    <div class="bg-green-100 rounded-2xl p-6 border-l-8 border-green-500">
        <h3 class="text-lg font-bold">🏠 Rentals Pending</h3>
        <div class="text-5xl font-bold mt-3">
            {{ $pendingAccommodations }}
        </div>
    </div>

    <div class="bg-red-100 rounded-2xl p-6 border-l-8 border-red-500">
        <h3 class="text-lg font-bold">🚨 Reports</h3>
        <div class="text-5xl font-bold mt-3">
            {{ $pendingReports }}
        </div>
    </div>

</div>

    </div>

</div>

@endsection

@push('scripts')
<script>
new Chart(document.getElementById('usersChart'), {
    type: 'line',
    data: {
       labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul'],
        datasets: [{
            label: 'Users',
            data: [5,9,12,18,25,30,{{ $users }}],
            borderColor: '#2563eb',
            backgroundColor: 'rgba(37,99,235,.15)',
            fill: true,
            tension: .4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

new Chart(document.getElementById('rolesChart'), {
    type: 'doughnut',
    data: {
        labels: ['Students','Landlords','Businesses'],
        datasets: [{
            data: [
                {{ $students }},
                {{ \App\Models\User::where('role_id',3)->count() }},
                {{ \App\Models\User::where('role_id',4)->count() }}
            ]
        }]
    }
});
</script>
@endpush