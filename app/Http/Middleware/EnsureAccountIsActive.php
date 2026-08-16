<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class EnsureAccountIsActive
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /*
        |--------------------------------------------------------------------------
        | Allow guests
        |--------------------------------------------------------------------------
        */

        if (!auth()->check()) {
            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Always get the latest account information from the database
        |--------------------------------------------------------------------------
        */

        $user = User::with('role')->find(auth()->id());

        if (!$user) {
            auth()->logout();

            return redirect()->route('login');
        }

        /*
        |--------------------------------------------------------------------------
        | Admins are always allowed
        |--------------------------------------------------------------------------
        */

        if ($user->is_admin || optional($user->role)->name === 'Admin') {
            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Account Suspended Page
        |--------------------------------------------------------------------------
        |
        | If the user is currently on the suspension page, check the
        | database again.
        |
        | If the admin has activated the account, immediately send the
        | user back to their dashboard.
        |
        */

        if ($request->routeIs('account.suspended')) {

            if ($user->active) {

                return match (optional($user->role)->name) {
                    'Student' => redirect()->route('student.dashboard'),
                    'Landlord' => redirect()->route('landlord.dashboard'),
                    'Business Owner' => redirect()->route('business.dashboard'),
                    default => redirect()->route('dashboard'),
                };

            }

            return $next($request);
        }

        /*
        |--------------------------------------------------------------------------
        | Normal Account Protection
        |--------------------------------------------------------------------------
        */

        if (!$user->active) {
            return redirect()->route('account.suspended');
        }

        /*
        |--------------------------------------------------------------------------
        | Account is active
        |--------------------------------------------------------------------------
        */

        return $next($request);
    }
}