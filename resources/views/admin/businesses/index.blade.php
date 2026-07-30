@extends('layouts.admin')

@section('title','Business Management')

@section('content')

<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-4xl font-bold">🏪 Business Management</h1>
        <p class="text-gray-500 mt-2">
            Approve, reject and monitor businesses.
        </p>
    </div>

</div>

<div class="bg-white rounded-2xl shadow overflow-hidden">

<table class="w-full">

    <thead class="bg-slate-100">

        <tr>

            <th class="text-left p-4">Business</th>

            <th>Category</th>

            <th>Owner</th>

            <th>Status</th>

            <th>Actions</th>

        </tr>

    </thead>

    <tbody>

    @foreach($businesses as $business)

    <tr class="border-b hover:bg-slate-50">

        <td class="p-4">

            <div class="font-bold">
                {{ $business->business_name }}
            </div>

            <div class="text-sm text-gray-500">
                {{ $business->location }}
            </div>

        </td>

        <td>
            {{ $business->category }}
        </td>

        <td>
            {{ $business->user->name }}
        </td>

        <td>

            @if($business->status == 'Approved')

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                    Approved
                </span>

            @elseif($business->status == 'Rejected')

                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                    Rejected
                </span>

            @else

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                    Pending
                </span>

            @endif

        </td>

        <td>

            <div class="flex gap-2 justify-center">

                <form method="POST"
                      action="{{ route('admin.businesses.approve',$business) }}">
                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700">
                        ✔
                    </button>

                </form>

                <form method="POST"
                      action="{{ route('admin.businesses.reject',$business) }}">
                    @csrf
                    @method('PATCH')

                    <button
                        class="bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700">
                        ✖
                    </button>

                </form>

            </div>

        </td>

    </tr>

    @endforeach

    </tbody>

</table>

</div>

<div class="mt-6">
    {{ $businesses->links() }}
</div>

@endsection