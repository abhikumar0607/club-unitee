<?php

namespace App\Repositories\Customer;
use App\Models\Event;
class EventRepository
{
    //Function for get all events
    public function getAllEvents(){
        return Event::OrderBy('id','desc')->whereIn('status', ['Published','Completed']);
    }
}