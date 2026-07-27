<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class BusinessNotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('business.notifications.index', compact('notifications'));
    }
}