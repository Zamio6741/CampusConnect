<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = auth()->user();

        /*
         * The normal login page is only for:
         * - Student
         * - Landlord
         * - Business Owner
         *
         * Admins must use the dedicated /admin/login page.
         */
        if (optional($user->roleRelation)->name === 'Admin') {
            Auth::guard('web')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('login')
                ->withErrors([
                    'email' => 'Admin accounts must use the Admin login page.',
                ]);
        }

        return match (optional($user->roleRelation)->name) {

            'Student' => redirect()->route('student.dashboard'),

            'Landlord' => redirect()->route('landlord.dashboard'),

            'Business Owner' => redirect()->route('business.dashboard'),

            default => redirect()->route('dashboard'),

        };
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}