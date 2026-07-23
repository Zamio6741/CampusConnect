<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMessageController extends Controller
{
    public function index()
    {
        $messages = Message::where('student_id', Auth::id())
            ->with(['business', 'sender'])
            ->orderBy('created_at')
            ->get()
            ->groupBy('business_id');

        return view('student.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        abort_if($message->student_id != auth()->id(), 403);

        // Mark business replies as read
        Message::where('business_id', $message->business_id)
            ->where('student_id', auth()->id())
            ->where('sender_id', '!=', auth()->id())
            ->where('is_read', false)
            ->update([
                'is_read' => true,
            ]);

        $conversation = Message::where('business_id', $message->business_id)
            ->where('student_id', $message->student_id)
            ->orderBy('created_at')
            ->get();

        return view('student.messages.show', compact(
            'message',
            'conversation'
        ));
    }

    public function send(Request $request, Message $message)
    {
        abort_if($message->student_id != Auth::id(), 403);

        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'business_id' => $message->business_id,
            'student_id' => Auth::id(),
            'sender_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back();
    }
}