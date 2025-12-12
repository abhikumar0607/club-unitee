<?php
namespace App\Repositories\Customer;

use App\Models\user;
use App\Models\ConnectionRequest;

class ConnectionRepository
{

    public function getCurrnetUserWithPreference($userId)
    {
        return User::with('usermatchingPreference')->find($userId);
    }

    public function getOtherActiveUsers($currentUserId)
    {
        return User::with('usermatchingPreference')
            ->where('id', '!=', $currentUserId)
            ->where('role', 'customer')
            ->where('status', 'active')
            ->get();
    }

    //function for send connection request
    public function sendConnectionRequest($receiverId){
        //check if the user has already sent a request to the receiver
        $existingRequest = ConnectionRequest::where('sender_id', auth()->user()->id)
            ->where('receiver_id', $receiverId)
            ->first();

        if ($existingRequest) {
            return $existingRequest;
        }
        
        return ConnectionRequest::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiverId,
            'status' => 'pending',
        ]);
    }

    //function for get sent connection requests
    public function getSentConnectionRequests(){
        return ConnectionRequest::where('sender_id', auth()->user()->id)->where('status', 'pending')->with('receiver')->get();
    }

    //function for get received connection requests
    public function getReceivedConnectionRequests(){
        return ConnectionRequest::where('receiver_id', auth()->user()->id)->where('status', 'pending')->with('sender')->get();
    }
}