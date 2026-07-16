<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Auth::user()
            ->notifications()
            ->latest()
            ->get();

        return view('landlord.notifications', compact('notifications'));
    }

    public function markAsRead(Notification $notification)
    {
        abort_if($notification->user_id != Auth::id(), 403);

        $notification->update([
            'is_read' => true,
        ]);

        return back();
    }

    public function markAllAsRead()
    {
        Auth::user()
            ->notifications()
            ->where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        return back();
    }

    public function destroy(Notification $notification)
    {
        abort_if($notification->user_id != Auth::id(), 403);

        $notification->delete();

        return back();
    }
}