<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class BusinessMessageController extends Controller
{
    public function index()
    {
        $messages = Message::whereHas('business', function ($query) {
            $query->where('user_id', Auth::id());
        })
        ->latest()
        ->get();

        return view('business.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        abort_if(
            $message->business->user_id != Auth::id(),
            403
        );

        return view(
            'business.messages.show',
            compact('message')
        );
    }

    public function reply(Message $message)
    {
        abort_if(
            $message->business->user_id != Auth::id(),
            403
        );

        request()->validate([
            'reply' => 'required|string'
        ]);

        $message->update([
            'reply' => request('reply'),
            'is_read' => true
        ]);

        return back()->with(
            'success',
            'Reply sent successfully.'
        );
    }
}