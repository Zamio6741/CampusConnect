<?php

namespace App\Http\Controllers;

use App\Models\AccommodationPass;
use Illuminate\Support\Facades\Auth;

class AccommodationPassController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Pass
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $pass = AccommodationPass::where('user_id', Auth::id())
            ->latest()
            ->first();

        $active = false;

        if ($pass) {

            $active = $pass->status === 'paid'
                && $pass->expires_at
                && $pass->expires_at->isFuture();

        }
        $daysRemaining = 0;

if ($pass && $pass->expires_at) {
    $daysRemaining = ceil(now()->floatDiffInDays($pass->expires_at));
}

        return view('pass.index', compact(
    'pass',
    'active',
    'daysRemaining'
));
    }

    /*
    |--------------------------------------------------------------------------
    | Purchase Pass
    |--------------------------------------------------------------------------
    */

    public function purchase()
    {
        $existing = AccommodationPass::where('user_id', Auth::id())
            ->where('status', 'paid')
            ->where('expires_at', '>', now())
            ->first();

        if ($existing) {

            return redirect()
                ->route('pass.index')
                ->with(
                    'success',
                    'You already have an active Accommodation Pass.'
                );

        }
AccommodationPass::create([
    'user_id' => Auth::id(),

    'phone' => Auth::user()->phone ?? '0700000000',

    'amount' => 199,

    'transaction_id' => 'DEMO-' . time(),

    'paid_at' => now(),

    'expires_at' => now()->addDays(30),

    'status' => 'paid',
]);

        return redirect()
            ->route('pass.index')
            ->with(
                'success',
                '🎉 Accommodation Pass activated successfully!'
            );
    }
}