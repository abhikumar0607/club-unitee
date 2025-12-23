<?php

namespace App\Repositories\Admin;
use App\Models\Event;
use App\Traits\HandlesFileUpload;

class EventRepository
{
    use HandlesFileUpload;
    //Function for store event
    public function store($request) {
        //Check if image is exit or not
        $filename = $this->uploadImage($request->file('image'),
            'assets/admin/uploads/events');
        //Create event
        return Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
        ]);
    }

    //Function for get all events
    public function getAllEvents() {
        return Event::OrderBy('ID', 'DESC')->where('user_id', auth()->id())->paginate(10);
    }

    //Function for edit event
    public function edit($id) {
        return Event::findOrFail($id);
    }

    //Function for update event
    public function update($request, $id) {
        //Get event detail
        $event = Event::findOrFail($id);
        //image upload
        $filename = $event->image ?? null;
        if ($request->hasFile('image')) {
            if ($event->image) {
                $this->deleteImage($event->image, 'assets/admin/uploads/events');
            }
            $filename = $this->uploadImage(
                $request->file('image'),
                'assets/admin/uploads/events'
            );
        }
        //Update event
        $event->update([
            'title' => $request->title,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
        ]);
    }
    
    //Function for delete event
    public function destroy($event_id) {
        return Event::findOrFail($event_id)->delete();
    }
}