@extends('layouts.admin')

@section('title','User Management')

@section('content')

<div class="space-y-8">

    {{-- ================= STATS ================= --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <p class="text-gray-500 text-sm">Total Users</p>
            <h2 class="text-4xl font-bold mt-3">
                {{ $users->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <p class="text-gray-500 text-sm">Students</p>
            <h2 class="text-4xl font-bold mt-3 text-sky-600">
                {{ $users->where('role.name','Student')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <p class="text-gray-500 text-sm">Landlords</p>
            <h2 class="text-4xl font-bold mt-3 text-green-600">
                {{ $users->where('role.name','Landlord')->count() }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">
            <p class="text-gray-500 text-sm">Business Owners</p>
            <h2 class="text-4xl font-bold mt-3 text-purple-600">
                {{ $users->where('role.name','Business Owner')->count() }}
            </h2>
        </div>

    </div>

    {{-- ================= SEARCH ================= --}}

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 p-6">

        <div class="flex flex-col lg:flex-row gap-4">

            <input
                type="text"
                placeholder="Search by name or email..."
                class="flex-1 rounded-xl border-gray-300 focus:ring-2 focus:ring-sky-500 focus:border-sky-500">

            <select
                class="w-full lg:w-64 rounded-xl border-gray-300 focus:ring-2 focus:ring-sky-500">

                <option>All Roles</option>
                <option>Student</option>
                <option>Landlord</option>
                <option>Business Owner</option>
                <option>Admin</option>

            </select>

        </div>

    </div>

    {{-- ================= TABLE ================= --}}

    <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-100">

                    <tr class="text-gray-700">

                        <th class="px-8 py-5 text-left font-semibold">
                            User
                        </th>

                        <th class="px-6 py-5 text-left font-semibold">
                            Email
                        </th>

                        <th class="px-6 py-5 text-center font-semibold">
                            Role
                        </th>

                        <th class="px-6 py-5 text-center font-semibold">
                                         Account
                                </th>

                                <th class="px-6 py-5 text-center font-semibold">
                                         Active status
                        </th>

                        <th class="px-8 py-5 text-center font-semibold">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody>

                @foreach($users as $user)

                    <tr class="border-t hover:bg-slate-50 transition">

                        {{-- USER --}}

                        <td class="px-8 py-6">

                            <div class="flex items-center gap-4">

                                <div class="w-14 h-14 rounded-full bg-sky-100 flex items-center justify-center text-2xl">

                                    👤

                                </div>

                                <div>

                                    <h3 class="font-bold text-lg">

                                        {{ $user->name }}

                                    </h3>

                                    <p class="text-sm text-gray-500">

                                        User ID #{{ $user->id }}

                                    </p>

                                </div>

                            </div>

                        </td>

                        {{-- EMAIL --}}

                        <td class="px-6 py-6">

                            <span class="text-gray-700">

                                {{ $user->email }}

                            </span>

                        </td>

                        {{-- ROLE --}}

                        <td class="px-6 py-6 text-center">

                            @php

                                $colors = [
                                    'Admin'=>'bg-red-100 text-red-700',
                                    'Student'=>'bg-sky-100 text-sky-700',
                                    'Landlord'=>'bg-green-100 text-green-700',
                                    'Business Owner'=>'bg-purple-100 text-purple-700'
                                ];

                            @endphp

                            <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $colors[$user->role->name] ?? 'bg-gray-100 text-gray-700' }}">

                                {{ $user->role->name }}

                            </span>

                        </td>

                       {{-- ACCOUNT STATUS --}}

<td class="px-6 py-6 text-center">

    @if($user->active)

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 text-sm font-semibold">

            ● Active

        </span>

    @else

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 text-sm font-semibold">

            ● Suspended

        </span>

    @endif

</td>
                      {{-- ONLINE STATUS --}}

<td class="px-6 py-6 text-center">

    @if($user->last_seen && $user->last_seen->gt(now()->subMinutes(5)))

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-semibold">

            🟢 Online

        </span>

    @else

        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-100 text-gray-600 text-sm font-semibold">

            ⚪ Offline

        </span>

    @endif

</td>

                        {{-- ACTIONS --}}

                       <td class="px-8 py-6">

    <div class="flex justify-center items-center gap-3">

        <!-- View -->
        <a href="{{ route('admin.users.show',$user) }}"
           class="w-24 text-center px-5 py-2.5 bg-sky-600 hover:bg-sky-700 text-white rounded-xl font-medium transition">
            View
        </a>

        <!-- Suspend -->
        <form method="POST"
              action="{{ route('admin.users.toggle',$user) }}">
            @csrf
            @method('PATCH')

            <button
                class="w-24 px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white rounded-xl font-medium transition">
                {{ $user->active ? 'Suspend' : 'Activate' }}
            </button>
        </form>

        <!-- Delete -->
        @if(!$user->is_admin)
            <form method="POST"
                  action="{{ route('admin.users.destroy',$user) }}"
                  onsubmit="return confirm('Delete this user permanently?')">
                @csrf
                @method('DELETE')

                <button
                    class="w-24 px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-xl font-medium transition">
                    Delete
                </button>
            </form>
        @else
            <!-- Empty placeholder so Admin row aligns -->
            <div class="w-24"></div>
        @endif

    </div>

</td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection