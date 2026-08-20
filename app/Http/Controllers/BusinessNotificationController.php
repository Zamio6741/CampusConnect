<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class BusinessNotificationController extends Controller
{
    /**
     * Display business notifications.
     *
     * Read notifications are automatically removed after 7 days.
     * Unread notifications remain available.
     */
    public function index(Request $request)
    {
        $userId = auth()->id();

        /*
        |--------------------------------------------------------------------------
        | Remove old read notifications
        |--------------------------------------------------------------------------
        |
        | We use updated_at as the read timestamp.
        |
        | When a notification is marked as read and saved, Laravel updates
        | updated_at automatically.
        |
        | Therefore:
        |
        | - unread notifications are never deleted
        | - read notifications remain for 7 days
        | - read notifications older than 7 days are deleted
        |
        */

        Notification::where('user_id', $userId)
            ->where('is_read', true)
            ->where('updated_at', '<=', now()->subDays(7))
            ->delete();


        /*
        |--------------------------------------------------------------------------
        | Get all remaining notifications
        |--------------------------------------------------------------------------
        */

        $notifications = Notification::where('user_id', $userId)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Notification counts
        |--------------------------------------------------------------------------
        */

        $unreadCount = $notifications
            ->where('is_read', false)
            ->count();

        $messageCount = $notifications
            ->where('type', 'message')
            ->count();

        $announcementCount = $notifications
            ->where('type', 'announcement')
            ->count();

        $bookingCount = $notifications
            ->where('type', 'booking')
            ->count();

        $reviewCount = $notifications
            ->where('type', 'review')
            ->count();

        $productCount = $notifications
            ->where('type', 'product')
            ->count();

        $adsCount = $notifications
            ->where('type', 'ad')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | Return notifications page
        |--------------------------------------------------------------------------
        |
        | No filters are used.
        | The Blade receives the complete notification collection.
        |
        */

        return view('business.notifications.index', compact(
            'notifications',
            'unreadCount',
            'messageCount',
            'announcementCount',
            'bookingCount',
            'reviewCount',
            'productCount',
            'adsCount'
        ));
    }
}