<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            abort(403);
        }

        if ($request->user()->role->name !== 'Student') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}