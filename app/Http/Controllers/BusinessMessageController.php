<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessMessageController extends Controller
{
    public function index()
    {
        $messages = Message::whereHas('business', function ($q) {

                $q->where('user_id', Auth::id());

            })
            ->with(['business', 'student', 'sender'])
            ->orderBy('created_at')
            ->get()
            ->groupBy(function ($item) {

                return $item->business_id . '-' . $item->student_id;

            });

        return view('business.messages.index', compact('messages'));
    }

    public function show(Message $message)
{
    abort_if($message->business->user_id != auth()->id(), 403);

    Message::where('business_id', $message->business_id)
        ->where('student_id', $message->student_id)
        ->where('sender_id', '!=', auth()->id())
        ->where('is_read', false)
        ->update([
            'is_read' => true,
        ]);

    $conversation = Message::where('business_id', $message->business_id)
        ->where('student_id', $message->student_id)
        ->orderBy('created_at')
        ->get();

    return view('business.messages.show', compact(
        'message',
        'conversation'
    ));
}

    public function reply(Request $request, Message $message)
    {
        abort_if($message->business->user_id != Auth::id(), 403);

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'business_id' => $message->business_id,
            'student_id' => $message->student_id,
            'sender_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back();
    }
}