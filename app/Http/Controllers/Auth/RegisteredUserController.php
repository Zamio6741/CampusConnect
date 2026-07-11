<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\University;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register', [
            'roles' => Role::all(),
            'universities' => University::all(),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'role_id' => [
                'required',
                'exists:roles,id',
            ],

            'university_id' => [
                'required',
                'exists:universities,id',
            ],

            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);
        $role = Role::findOrFail($request->role_id);

if ($role->name === 'Admin') {
    abort(403, 'Admin accounts cannot be created through registration.');
}

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,

            'role_id' => $request->role_id,
            'university_id' => $request->university_id,

            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return match ($user->role->name) {

    'Admin' => redirect()->route('admin.dashboard'),

    'Student' => redirect()->route('student.dashboard'),

    'Landlord' => redirect()->route('landlord.dashboard'),

    'Business Owner' => redirect()->route('business.dashboard'),

    default => redirect()->route('student.dashboard'),

};
    }
}