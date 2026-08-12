<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Notification;

class MessageController extends Controller
{
    // Student sends message
    public function store(Request $request, Business $business)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

       Message::create([
    'business_id' => $business->id,
    'student_id' => auth()->id(),
    'sender_id' => auth()->id(),
    'message' => $request->message,
]);

        Notification::create([
    'user_id' => $business->user_id,
    'title' => 'New Message',
    'message' => auth()->user()->name . ' sent you a message.',
    'type' => 'message',
    'link' => route('business.messages'),
]);

        return redirect()
    ->route('business.preview', $business)
    ->with('success', 'Message sent successfully.');
    }

    // Business owner's inbox
    public function index()
    {
        $messages = Message::whereHas('business', function ($query) {
            $query->where('user_id', auth()->id());
        })
        ->with(['student', 'business'])
        ->latest()
        ->get();

        return view('business.messages.index', compact('messages'));
    }

    // Business replies
    public function reply(Request $request, Message $message)
    {
        $request->validate([
            'reply' => 'required|string|max:1000',
        ]);

        $message->update([
            'reply' => $request->reply,
            'is_read' => true,
        ]);

        return redirect('/businesses/' . $business->id)
    ->with('success', 'Message sent successfully.');
    }
}