<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
   public function index(Request $request)
{
    $sort = $request->get('sort', 'name');
    $direction = $request->get('direction', 'asc');

    // Allowed sortable columns
    $allowedSorts = [
        'name',
        'email',
        'active',
        'last_seen',
        'created_at',
    ];

    if (!in_array($sort, $allowedSorts)) {
        $sort = 'name';
    }

    $users = User::with('role')

        ->when($request->filled('search'), function ($query) use ($request) {

            $query->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');

            });

        })

        ->when($request->filled('role'), function ($query) use ($request) {

            $query->whereHas('role', function ($q) use ($request) {

                $q->where('name', $request->role);

            });

        })

        ->orderBy($sort, $direction)

        ->paginate(10)

        ->withQueryString();

    return view('admin.users.index', compact('users'));
}

    public function show(User $user)
    {
    return view('admin.users.show', compact('user'));

    }

    public function toggle(User $user)
{
    $user->active = !$user->active;
    $user->save();

    return back();
}

public function destroy(User $user)
{
    if ($user->is_admin) {
        return back();
    }

    $user->delete();

    return redirect()->route('admin.users');
}

}