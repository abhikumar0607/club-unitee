<?php

namespace App\Repositories\Admin;
use App\Models\Event;
use App\Models\EventRsvp;
use App\Traits\HandlesFileUpload;
use Illuminate\Support\Str;

class EventRepository
{
    use HandlesFileUpload;
    //Function for store event
    public function store($request) {
        //Check if image is exit or not
        $filename = $this->uploadImage($request->file('image'),
            'assets/admin/uploads/events');
        //Generate slug 
        $slug = Str::slug($request->input('title'), "-");
        //Check if slug already exists or not
        if (Event::where('slug', $slug)->exists()) {
            return false;
        }    
        //Create event
        Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
        ]);

        return true;
    }

    //Function for get all events
    public function getAllEvents($request) {
        $query = Event::where('user_id', auth()->id())
            ->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $query->with('rsvps');
        return $query->paginate(10);
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
        //Update slug
        $slug = Str::slug($request->input('title'), "-");
        //Check if slug exists or not
        if (Event::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return false;
        }
        //Update event
        $event->update([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
        ]);

        return true;
    }
    
    //Function for delete event
    public function destroy($event_id) {
        return Event::findOrFail($event_id)->delete();
    }

    //function for get event rsvps
    public function getEventRsvps($id) {
        return EventRsvp::where('event_id', $id)->with('user')->paginate(10);
    }
}