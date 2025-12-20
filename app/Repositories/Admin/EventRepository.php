<?php

namespace App\Repositories\Admin;
use App\Models\Event;
class EventRepository
{
    //function for store event
    public function store($request){
        return Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    }

    //function for get all events
    public function getAllEvents(){
        return Event::where('user_id', auth()->id())->paginate(10);
    }

    //function for edit event
    public function edit($id){
        return Event::findOrFail($id);
    }

    // //function for update event
    public function update($request, $id){
        return Event::findOrFail($id)->update([
            'title' => $request->title,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
        ]);
    }

    //function for delete event
    public function destroy($id){
        return Event::findOrFail($id)->delete();
    }
}