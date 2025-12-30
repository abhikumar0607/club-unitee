<?php

namespace App\Repositories\Customer;
use App\Models\Event;
class EventRepository
{
    //function for get all events
    public function getAllEvents(){
        return Event::OrderBy('id','desc');
    }

}