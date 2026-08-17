<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {

            if (!Auth::check()) {
                return;
            }

            $notifications = Notification::where('user_id', Auth::id())
                ->where('created_at', '>=', now()->subDays(7))
                ->latest()
                ->get();

            $notificationCount = $notifications
                ->where('is_read', false)
                ->count();

            $view->with([
                'notifications' => $notifications,
                'notificationCount' => $notificationCount,
            ]);
        });
    }
}