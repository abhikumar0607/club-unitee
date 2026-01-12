<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GroupMessageRead implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $groupId;
    public $messageIds;
    public $user;

    public function __construct($groupId, $messageIds, $user)
    {
        $this->groupId    = $groupId;
        $this->messageIds = $messageIds; // array of message ids
        $this->user       = [
            'id'   => $user->id,
            'name' => $user->name
        ];
    }

    public function broadcastOn()
    {
        return new PrivateChannel('chat.' . $this->groupId);
    }

    public function broadcastAs()
    {
        return 'group.message.read';
    }
}
