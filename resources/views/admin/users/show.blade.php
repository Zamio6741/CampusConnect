@extends('layouts.admin')

@section('title','User Details')

@section('content')

<div class="bg-white rounded-2xl shadow p-8">

    <h2 class="text-3xl font-bold mb-8">
        👤 User Profile
    </h2>

    <div class="grid md:grid-cols-2 gap-8">

        <div>

            <p class="text-gray-500">Name</p>
            <h3 class="text-xl font-bold">{{ $user->name }}</h3>

        </div>

        <div>

            <p class="text-gray-500">Email</p>
            <h3 class="text-xl font-bold">{{ $user->email }}</h3>

        </div>

        <div>

            <p class="text-gray-500">Role</p>
            <h3 class="text-xl font-bold">{{ $user->role->name }}</h3>

        </div>

        <div>

            <p class="text-gray-500">Joined</p>
            <h3 class="text-xl font-bold">
                {{ $user->created_at->format('d M Y') }}
            </h3>

        </div>

    </div>

</div>

@endsection