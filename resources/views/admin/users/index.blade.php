@extends('layouts.admin')

@section('title','User Management')

@section('content')

<div class="bg-white rounded-2xl shadow p-6">

    <h2 class="text-3xl font-bold mb-6">
        👥 User Management
    </h2>

    <table class="w-full">

        <thead class="border-b">

            <tr>

                <th class="text-left py-3">Name</th>

                <th>Email</th>

                <th>Role</th>

                <th>Status</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

            <tr class="border-b">

                <td class="py-4">
                    {{ $user->name }}
                </td>

                <td>
                    {{ $user->email }}
                </td>

                <td>
                    {{ $user->role->name }}
                </td>

                <td>

                    @if($user->active)
                         <span class="text-green-600 font-semibold">
                             Active
                        </span>
                    @else
                         <span class="text-red-600 font-semibold">
                              Suspended
                         </span>
                    @endif

                </td>

              <td>

    <div class="flex gap-2">

        <a href="{{ route('admin.users.show',$user) }}"
           class="bg-blue-600 text-white px-3 py-2 rounded-lg">
            View
        </a>

        <form method="POST"
              action="{{ route('admin.users.toggle',$user) }}">
            @csrf
            @method('PATCH')

            <button class="bg-yellow-500 text-white px-3 py-2 rounded-lg">
                {{ $user->active ? 'Suspend' : 'Activate' }}
            </button>
        </form>

        @if(!$user->is_admin)

        <form method="POST"
              action="{{ route('admin.users.destroy',$user) }}"
              onsubmit="return confirm('Delete this user?')">

            @csrf
            @method('DELETE')

            <button class="bg-red-600 text-white px-3 py-2 rounded-lg">
                Delete
            </button>

        </form>

        @endif

    </div>

</td>

            @endforeach

        </tbody>

    </table>

</div>

@endsection