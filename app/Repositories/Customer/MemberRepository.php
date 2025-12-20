<?php

namespace App\Repositories\Customer;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class MemberRepository
{
    //function for get all connections
    public function getAllMembers()
    {
        $userId = auth()->user()->id;

        $friendsIds = DB::table('connection_requests')
            ->where('status', 'accepted')
            ->where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)
                ->orWhere('receiver_id', $userId);
            })
            ->get()
            ->map(function ($row) use ($userId) {
                return $row->sender_id == $userId
                    ? $row->receiver_id
                    : $row->sender_id;
            })
            ->toArray();

        return User::whereIn('id', $friendsIds)
            ->where('role', 'customer')
            ->with('usermatchingPreference', 'golfProfile','useravailability');
    }


}