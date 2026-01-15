<?php

namespace App\Repositories\Customer;
use App\Models\Event;
use App\Models\EventMember;
use App\Models\User;
class EventRepository
{
    //Function for get all events
    public function getAllEvents(){
        $user = auth()->user();
        $events = $user->events()
                    ->orderBy('date', 'asc');
        return $events;
    }
}