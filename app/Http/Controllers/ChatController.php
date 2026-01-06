<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Pusher\Pusher;
use App\Events\MessageSent;
use App\Events\MessageSeen;

class ChatController extends Controller
{
    public function getMessages($userId)
    {
        $authUserId = auth()->id();

        $messages = Message::where(function ($q) use ($authUserId, $userId) {
            $q->where('sender_id', $authUserId)->where('receiver_id', $userId);
        })->orWhere(function ($q) use ($authUserId, $userId) {
            $q->where('sender_id', $userId)->where('receiver_id', $authUserId);
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

        // Broadcast event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }


    public function markAsSeen($userId)
    {
        $authId = auth()->id();

        $messages = Message::where('sender_id', $userId)
            ->where('receiver_id', $authId)
            ->where('is_seen', false)
            ->get();

        foreach ($messages as $msg) {
            $msg->update([
                'is_seen' => true,
                'seen_at' => now(),
            ]);

            broadcast(new MessageSeen($msg))->toOthers();
        }

        return response()->json(['status' => true]);
    }

    public function unseen_count($userId){
        $auth_id = auth()->id();
        $count = Message::where('sender_id', $userId)
        ->where('receiver_id', auth()->id())
        ->where('is_seen', false)
        ->count();
         return response()->json([
            'count' => $count
        ]);
    }
}
