<?php

namespace App\Http\Middleware;

use App\Models\Setting;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Always allow the application health check
        if ($request->is('up')) {
            return $next($request);
        }

        // Always allow admin routes so administrators can manage the platform
        if ($request->is('admin/*')) {
            return $next($request);
        }

        // Check whether maintenance mode is enabled
        $maintenanceMode = Setting::get('maintenance_mode', '0');

        if (filter_var($maintenanceMode, FILTER_VALIDATE_BOOLEAN)) {
            return response()->view('errors.maintenance', [], 503);
        }

        return $next($request);
    }
}