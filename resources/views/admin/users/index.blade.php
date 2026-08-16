@extends('layouts.admin')

@section('title', 'User Management')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
         STATS
    ========================================================== --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Total Users --}}
        <div class="bg-white rounded-2xl shadow-md border-2 border-gray-200 p-6">
            <p class="text-gray-500 text-sm">
                Total Users
            </p>

            <h2 class="text-4xl font-bold mt-3 text-gray-800">
                {{ $users->total() }}
            </h2>
        </div>


        {{-- Students --}}
        <div class="bg-white rounded-2xl shadow-md border-2 border-gray-200 p-6">
            <p class="text-gray-500 text-sm">
                Students
            </p>

            <h2 class="text-4xl font-bold mt-3 text-sky-600">
                {{ $users->where('role.name','Student')->count() }}
            </h2>
        </div>


        {{-- Landlords --}}
        <div class="bg-white rounded-2xl shadow-md border-2 border-gray-200 p-6">
            <p class="text-gray-500 text-sm">
                Landlords
            </p>

            <h2 class="text-4xl font-bold mt-3 text-green-600">
                {{ $users->where('role.name','Landlord')->count() }}
            </h2>
        </div>


        {{-- Business Owners --}}
        <div class="bg-white rounded-2xl shadow-md border-2 border-gray-200 p-6">
            <p class="text-gray-500 text-sm">
                Business Owners
            </p>

            <h2 class="text-4xl font-bold mt-3 text-purple-600">
                {{ $users->where('role.name','Business Owner')->count() }}
            </h2>
        </div>

    </div>


    {{-- =========================================================
         SEARCH / FILTER
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md border-2 border-gray-200 p-6">

        <div class="flex flex-col lg:flex-row gap-4">

            <form
                method="GET"
                class="flex flex-col lg:flex-row gap-4 w-full"
            >

                {{-- Search --}}
                <input
                    name="search"
                    value="{{ request('search') }}"
                    type="text"
                    placeholder="Search name or email..."
                    class="flex-1 rounded-xl border-2 border-gray-300
                           bg-white px-4 py-3
                           text-gray-700
                           focus:border-sky-500
                           focus:ring-2
                           focus:ring-sky-100
                           outline-none"
                >


                {{-- Role --}}
                <select
                    name="role"
                    class="w-full lg:w-64 rounded-xl
                           border-2 border-gray-300
                           bg-white px-4 py-3
                           text-gray-700
                           focus:border-sky-500
                           focus:ring-2
                           focus:ring-sky-100
                           outline-none"
                >

                    <option value="">
                        All Roles
                    </option>

                    <option
                        value="Student"
                        {{ request('role') == 'Student' ? 'selected' : '' }}
                    >
                        Student
                    </option>

                    <option
                        value="Landlord"
                        {{ request('role') == 'Landlord' ? 'selected' : '' }}
                    >
                        Landlord
                    </option>

                    <option
                        value="Business Owner"
                        {{ request('role') == 'Business Owner' ? 'selected' : '' }}
                    >
                        Business Owner
                    </option>

                    <option
                        value="Admin"
                        {{ request('role') == 'Admin' ? 'selected' : '' }}
                    >
                        Admin
                    </option>

                </select>


                {{-- Search Button --}}
                <button
                    type="submit"
                    class="bg-sky-600 hover:bg-sky-700
                           text-white
                           px-7 py-3
                           rounded-xl
                           font-semibold
                           border-2 border-sky-600
                           transition
                           shadow-sm"
                >
                    Search
                </button>

            </form>

        </div>

    </div>


    {{-- =========================================================
         USERS TABLE
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-md
                border-2 border-gray-200
                overflow-hidden">

        <div class="overflow-x-auto">

            <table
                class="w-full border-collapse
                       border border-gray-300"
            >

                {{-- =================================================
                     TABLE HEADER
                ================================================== --}}

                <thead class="bg-slate-100">

                    <tr class="text-gray-700">

                        {{-- User --}}
                        <th
                            class="px-8 py-5
                                   text-left
                                   font-semibold
                                   border border-gray-300
                                   whitespace-nowrap"
                        >

                            <a
                                href="{{ request()->fullUrlWithQuery([
                                    'sort' => 'name',
                                    'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}"
                                class="hover:text-sky-600 transition"
                            >
                                User ↕
                            </a>

                        </th>


                        {{-- Email --}}
                        <th
                            class="px-6 py-5
                                   text-left
                                   font-semibold
                                   border border-gray-300
                                   whitespace-nowrap"
                        >

                            <a
                                href="{{ request()->fullUrlWithQuery([
                                    'sort' => 'email',
                                    'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}"
                                class="hover:text-sky-600 transition"
                            >
                                Email ↕
                            </a>

                        </th>


                        {{-- Role --}}
                        <th
                            class="px-6 py-5
                                   text-center
                                   font-semibold
                                   border border-gray-300
                                   whitespace-nowrap"
                        >
                            Role
                        </th>


                        {{-- Account --}}
                        <th
                            class="px-6 py-5
                                   text-center
                                   font-semibold
                                   border border-gray-300
                                   whitespace-nowrap"
                        >

                            <a
                                href="{{ request()->fullUrlWithQuery([
                                    'sort' => 'active',
                                    'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}"
                                class="hover:text-sky-600 transition"
                            >
                                Account ↕
                            </a>

                        </th>


                        {{-- Activity --}}
                        <th
                            class="px-6 py-5
                                   text-center
                                   font-semibold
                                   border border-gray-300
                                   whitespace-nowrap"
                        >

                            <a
                                href="{{ request()->fullUrlWithQuery([
                                    'sort' => 'last_seen',
                                    'direction' => request('direction') == 'asc' ? 'desc' : 'asc'
                                ]) }}"
                                class="hover:text-sky-600 transition"
                            >
                                Activity ↕
                            </a>

                        </th>


                        {{-- Actions --}}
                        <th
                            class="px-8 py-5
                                   text-center
                                   font-semibold
                                   border border-gray-300
                                   whitespace-nowrap"
                        >
                            Actions
                        </th>

                    </tr>

                </thead>


                {{-- =================================================
                     TABLE BODY
                ================================================== --}}

                <tbody>

                @forelse($users as $user)

                    <tr
                        class="border border-gray-300
                               hover:bg-slate-50
                               transition"
                    >

                        {{-- =================================================
                             USER
                        ================================================== --}}

                        <td
                            class="px-8 py-6
                                   border border-gray-300"
                        >

                            <div class="flex items-center gap-4">

                                {{-- Profile --}}
                                @if($user->profile_photo)

                                    <img
                                        src="{{ asset('storage/'.$user->profile_photo) }}"
                                        alt="{{ $user->name }}"
                                        class="w-14 h-14
                                               rounded-full
                                               object-cover
                                               border-2 border-gray-300
                                               shadow-sm"
                                    >

                                @else

                                    <div
                                        class="w-14 h-14
                                               rounded-full
                                               bg-sky-100
                                               border-2 border-sky-200
                                               flex items-center
                                               justify-center
                                               text-lg
                                               font-bold
                                               text-sky-700"
                                    >

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>

                                @endif


                                {{-- User Details --}}
                                <div>

                                    <h3 class="font-bold text-lg text-gray-800">
                                        {{ $user->name }}
                                    </h3>

                                    <p class="text-sm text-gray-500 mt-1">
                                        User ID #{{ $user->id }}
                                    </p>

                                </div>

                            </div>

                        </td>


                        {{-- =================================================
                             EMAIL
                        ================================================== --}}

                        <td
                            class="px-6 py-6
                                   border border-gray-300"
                        >

                            <span class="text-gray-700">
                                {{ $user->email }}
                            </span>

                        </td>


                        {{-- =================================================
                             ROLE
                        ================================================== --}}

                        <td
                            class="px-6 py-6
                                   text-center
                                   border border-gray-300"
                        >

                            @php

                                $colors = [
                                    'Admin' => 'bg-red-100 text-red-700 border-red-200',
                                    'Student' => 'bg-sky-100 text-sky-700 border-sky-200',
                                    'Landlord' => 'bg-green-100 text-green-700 border-green-200',
                                    'Business Owner' => 'bg-purple-100 text-purple-700 border-purple-200',
                                ];

                            @endphp


                            <span
                                class="inline-flex
                                       items-center
                                       px-4 py-2
                                       rounded-full
                                       border
                                       text-sm
                                       font-semibold
                                       {{ $colors[$user->role->name] ?? 'bg-gray-100 text-gray-700 border-gray-200' }}"
                            >

                                {{ $user->role->name }}

                            </span>

                        </td>


                        {{-- =================================================
                             ACCOUNT STATUS
                        ================================================== --}}

                        <td
                            class="px-6 py-6
                                   text-center
                                   border border-gray-300"
                        >

                            @if($user->active)

                                <span
                                    class="inline-flex
                                           items-center
                                           gap-2
                                           px-4 py-2
                                           rounded-full
                                           bg-green-100
                                           text-green-700
                                           border border-green-200
                                           text-sm
                                           font-semibold"
                                >

                                    <span>●</span>
                                    Active

                                </span>

                            @else

                                <span
                                    class="inline-flex
                                           items-center
                                           gap-2
                                           px-4 py-2
                                           rounded-full
                                           bg-red-100
                                           text-red-700
                                           border border-red-200
                                           text-sm
                                           font-semibold"
                                >

                                    <span>●</span>
                                    Suspended

                                </span>

                            @endif

                        </td>


                        {{-- =================================================
                             ONLINE STATUS
                        ================================================== --}}

                        <td
                            class="px-6 py-6
                                   text-center
                                   border border-gray-300"
                        >

                            @if($user->isOnline())

                                <div class="flex flex-col items-center">

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-4 py-2
                                               rounded-full
                                               bg-emerald-100
                                               text-emerald-700
                                               border border-emerald-200
                                               text-sm
                                               font-semibold"
                                    >

                                        🟢 Online

                                    </span>

                                    <span
                                        class="text-xs
                                               text-gray-500
                                               mt-2"
                                    >
                                        Active now
                                    </span>

                                </div>

                            @else

                                <div class="flex flex-col items-center">

                                    <span
                                        class="inline-flex
                                               items-center
                                               gap-2
                                               px-4 py-2
                                               rounded-full
                                               bg-gray-100
                                               text-gray-600
                                               border border-gray-200
                                               text-sm
                                               font-semibold"
                                    >

                                        ⚪ Offline

                                    </span>

                                    <span
                                        class="text-xs
                                               text-gray-500
                                               mt-2"
                                    >

                                        {{ $user->last_seen
                                            ? $user->last_seen->diffForHumans()
                                            : 'Never logged in' }}

                                    </span>

                                </div>

                            @endif

                        </td>


                        {{-- =================================================
                             ACTIONS
                        ================================================== --}}

                        <td
                            class="px-8 py-6
                                   border border-gray-300"
                        >

                            <div
                                class="flex
                                       justify-center
                                       items-center
                                       gap-3"
                            >

                                {{-- View --}}
                                <a
                                    href="{{ route('admin.users.show', $user) }}"
                                    class="w-24
                                           text-center
                                           px-5 py-2.5
                                           bg-sky-600
                                           hover:bg-sky-700
                                           text-white
                                           rounded-xl
                                           font-medium
                                           border-2 border-sky-700
                                           transition
                                           shadow-sm"
                                >
                                    View
                                </a>


                                {{-- Suspend / Activate --}}
                                <form
                                    method="POST"
                                    action="{{ route('admin.users.toggle', $user) }}"
                                >

                                    @csrf

                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="w-24
                                               px-5 py-2.5
                                               bg-yellow-500
                                               hover:bg-yellow-600
                                               text-white
                                               rounded-xl
                                               font-medium
                                               border-2 border-yellow-600
                                               transition
                                               shadow-sm"
                                    >

                                        {{ $user->active ? 'Suspend' : 'Activate' }}

                                    </button>

                                </form>


                                {{-- Delete --}}
                                @if(!$user->is_admin)

                                    <form
                                        method="POST"
                                        action="{{ route('admin.users.destroy', $user) }}"
                                        onsubmit="return confirm('Delete this user permanently?')"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-24
                                                   px-5 py-2.5
                                                   bg-red-600
                                                   hover:bg-red-700
                                                   text-white
                                                   rounded-xl
                                                   font-medium
                                                   border-2 border-red-700
                                                   transition
                                                   shadow-sm"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                @else

                                    {{-- Empty placeholder so Admin row aligns --}}
                                    <div class="w-24"></div>

                                @endif

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-20
                                   text-center
                                   border border-gray-300"
                        >

                            <div class="flex flex-col items-center">

                                <div
                                    class="w-20 h-20
                                           rounded-full
                                           bg-slate-100
                                           border-2 border-slate-200
                                           flex items-center
                                           justify-center
                                           text-3xl"
                                >
                                    👥
                                </div>

                                <h3
                                    class="text-xl
                                           font-bold
                                           text-gray-800
                                           mt-5"
                                >
                                    No Users Found
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    No users match your current search or filter.
                                </p>

                            </div>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =========================================================
         PAGINATION
    ========================================================== --}}

    <div
        class="bg-white
               rounded-2xl
               shadow-md
               border-2 border-gray-200
               px-6 py-5"
    >

        <div
            class="flex
                   flex-col
                   md:flex-row
                   md:items-center
                   md:justify-between
                   gap-4"
        >

            {{-- Results Information --}}
            <div class="text-sm text-gray-600">

                @if($users->total() > 0)

                    Showing

                    <span class="font-bold text-gray-900">
                        {{ $users->firstItem() }}
                    </span>

                    to

                    <span class="font-bold text-gray-900">
                        {{ $users->lastItem() }}
                    </span>

                    of

                    <span class="font-bold text-gray-900">
                        {{ $users->total() }}
                    </span>

                    users

                @else

                    No users found.

                @endif

            </div>


            {{-- Pagination Links --}}
            <div>

                {{ $users->withQueryString()->links() }}

            </div>

        </div>

    </div>

</div>

@endsection