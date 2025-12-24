<?php

namespace App\Services\Admin;

use App\Repositories\Admin\EventRepository;
class Eventservice
{
    protected $eventRepository;
    
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    //function for store event
    public function store($request){
        return $this->eventRepository->store($request);
    }

    //function for get all events
    public function getAllEvents(){
        return $this->eventRepository->getAllEvents();
    }

    //function for edit event
    public function edit($id){
        return $this->eventRepository->edit($id);
    }

    //function for update event
    public function update($request, $id){
        return $this->eventRepository->update($request, $id);
    }

    //function for delete event
    public function destroy($event_id){
        return $this->eventRepository->destroy($event_id);
    }
}