<?php

namespace App\Services\Customer;

use App\Repositories\Customer\EventRepository;
class Eventservice
{
    protected $eventRepository;
    
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    //function for get all events
    public function getAllEvents($request){
        $query =  $this->eventRepository->getAllEvents();

        if($request->filled('search')){
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if($request->filled('type')){
            $query->where('type', $request->type);
        }
          
        return $query->paginate(6);
    }

}