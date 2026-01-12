<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Pusher\Pusher;
use App\Events\MessageSent;
use App\Events\MessageSeen;
use App\Events\GroupMessageSent;
use App\Events\GroupMessageRead;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\MessageRead;
use Illuminate\Support\Facades\DB;
use App\Services\Customer\MemberService;
use App\Traits\HandlesFileUpload;

class ChatController extends Controller
{
    use HandlesFileUpload;
    protected $memberservice;
    public function __construct(MemberService $memberservice)
    {
        $this->memberservice = $memberservice;
    }
    //function for chat file
    public function index(Request $request)
    {
        $members = $this->memberservice->getAllMembers($request);
        $groups = auth()->user()
        ->groups()
        ->withCount('users')
        ->get();
        return view('chat',compact('members','groups'));
    }


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

    public function unread_count(){
        $auth_id = auth()->id();
        $count = Message::where('receiver_id', $auth_id)
        ->where('is_seen', false)
        ->count();
         return response()->json([
            'count' => $count
        ]);
    }

    //function for create group
    public function createGroup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'members' => 'required|array|min:1',
            'members.*' => 'exists:users,id'
        ]);

        DB::transaction(function () use ($request) {


            if ($request->hasFile('image')) {
                $filename = $this->uploadImage(
                    $request->file('image'),
                    'assets/customer/uploads/groups'
                );
            }

            $group = Group::create([
                'name' => $request->name,
                'created_by' => auth()->id(),
                'image' => $filename ?? null
            ]);

            // creator ko bhi member banao
            $members = array_unique(array_merge(
                $request->members,
                [auth()->id()]
            ));

            foreach ($members as $memberId) {
                GroupUser::create([
                    'group_id' => $group->id,
                    'user_id' => $memberId
                ]);
            }
        });

        return redirect()->back()->with('success', 'Group created successfully');
    }

    public function groupmessages(Group $group)
    {
        $messages = Message::where('group_id', $group->id)
        ->with('sender:id,name') 
        ->orderBy('created_at', 'asc')
        ->get();

        return response()->json($messages);
    }

    public function groupsend(Request $request)
    {
        $msg = Message::create([
            'group_id' => $request->group_id,
            'sender_id'  => auth()->id(),
            'message'  => $request->message
        ]);

        MessageRead::create([
            'message_id' => $msg->id,
            'user_id'    => auth()->id(),
            'read_at'    => now()
        ]);
        // load sender info (VERY IMPORTANT)
        $msg->load('sender:id,name');

        //realtime broadcast
        broadcast(new GroupMessageSent($msg))->toOthers();

        return response()->json($msg);
    }

    public function markGroupMessagesRead(Group $group)
    {
        $userId = auth()->id();
        $messages = Message::where('group_id', $group->id)
            ->whereDoesntHave('reads', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->get();

        $readMessageIds = [];

        foreach ($messages as $msg) {
            MessageRead::create([
                'message_id' => $msg->id,
                'user_id'    => $userId,
                'read_at'    => now()
            ]);
            $readMessageIds[] = $msg->id;
        }

        if (count($readMessageIds)) {
            broadcast(
                new GroupMessageRead($group->id, $readMessageIds, auth()->user())
            )->toOthers();
        }

        return response()->json([
            'status' => true
        ]);
    }

    public function groupUnreadCount(Group $group)
    {
        
        $userId = auth()->id();
        $count = Message::where('group_id', $group->id)
            ->whereDoesntHave('reads', function ($q) use ($userId) {
                $q->where('user_id', $userId);
            })
            ->count();

        return response()->json([
            'count' => $count
        ]);
    }
}
