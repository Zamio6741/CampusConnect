<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Display recent notifications.
     */
    public function index()
    {
        $notifications = Auth::user()
            ->notifications()
            ->where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->get();

        $notificationCount = Auth::user()
            ->notifications()
            ->where('created_at', '>=', now()->subDays(7))
            ->where('is_read', false)
            ->count();

        return view(
            'notifications.index',
            compact('notifications', 'notificationCount')
        );
    }

    /**
     * Mark one notification as read.
     */
    public function markAsRead(Notification $notification)
    {
        abort_if($notification->user_id != Auth::id(), 403);

        $notification->update([
            'is_read' => true,
        ]);

        if ($notification->link) {
            return redirect($notification->link);
        }

        return back();
    }

    /**
     * Mark all recent notifications as read.
     */
    public function markAllAsRead()
    {
        Auth::user()
            ->notifications()
            ->where('created_at', '>=', now()->subDays(7))
            ->where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        return back();
    }

    /**
     * Delete one notification.
     */
    public function destroy(Notification $notification)
    {
        abort_if($notification->user_id != Auth::id(), 403);

        $notification->delete();

        return back();
    }
}