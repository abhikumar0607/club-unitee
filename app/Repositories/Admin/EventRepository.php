<?php

namespace App\Repositories\Admin;
use App\Models\Event;
use App\Models\EventRsvp;
use App\Models\EventMember;
use App\Traits\HandlesFileUpload;
use Illuminate\Support\Str;
use App\Mail\EventAssignedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

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
        $event = Event::create([
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

        //Store members in event_rsvps table
        if ($request->filled('members')) {

            $members = User::whereIn('id', $request->members)->get();

            foreach ($members as $member) {

                EventMember::create([
                    'event_id' => $event->id,
                    'member_id' => $member->id,
                ]);

                Mail::to($member->email)
                    ->send(new EventAssignedMail($event, $member));
            }
        }


        return true;
    }

    //Function for get all events
    public function getAllEvents($request) {
        $query = Event::where('user_id', auth()->id())
            ->orderBy('id', 'desc');
        //Filter
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        $query->with('rsvps');
        return $query->paginate(10);
    }

    //Function for edit event
    public function edit($id) {
        return Event::with('members')->findOrFail($id);
    }

    //Function for update event
    public function update($request, $id) {
        //Get event detail
        $event = Event::findOrFail($id);
        $oldMemberIds = $event->members->pluck('id')->toArray();
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

        //Update members in event_member table
        $newMemberIds = $request->members ?? [];

        // SYNC MEMBERS
        $event->members()->sync($newMemberIds);

        // FIND ONLY NEWLY ADDED MEMBERS
        $onlyNewMembers = array_diff($newMemberIds, $oldMemberIds);

        // SEND MAIL ONLY TO NEW MEMBERS
        if (!empty($onlyNewMembers)) {
            $users = User::whereIn('id', $onlyNewMembers)->get();

            foreach ($users as $user) {
                Mail::to($user->email)
                    ->send(new EventAssignedMail($event, $user));
            }
        }

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