<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::with('role')->latest()->get()
        ]);
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