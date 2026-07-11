<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function markAsRead(Notification $notification)
    {
        abort_if($notification->user_id != auth()->id(), 403);

        $notification->update([
            'is_read' => true,
        ]);

        return redirect()->back();
    }
}