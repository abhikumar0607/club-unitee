<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\Admin\EventService;
use App\Services\Admin\MemberService;

class EventController extends Controller
{

    protected $eventService;
    protected $getAllActiveMembers;
    
    public function __construct(EventService $eventService , MemberService $memberService)
    {
        $this->eventService = $eventService;
        $this->getAllActiveMembers = $memberService;
    }

    //Function for event page
    public function index(Request $request){
        $events = $this->eventService->getAllEvents($request);
        $getAllActiveMembers = $this->getAllActiveMembers->getAllActiveMembers();
        // echo"<pre>";
        // print_r($getAllActiveMembers->toArray());exit;
        return view('admin.events.index', compact('events', 'getAllActiveMembers'));
    }

    //Function for store event
    public function store(Request $request){
        $created = $this->eventService->store($request);
        if ($created === true) {
            return redirect()->route('admin.events')->with('success', 'Event created successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Event title already exists. Please use a different title.');
    }

    //Function for edit event
    public function edit($id){
        $event = $this->eventService->edit($id);
        $getAllActiveMembers = $this->getAllActiveMembers->getAllActiveMembers();
        $html = view('admin.events.edit-form', compact('event','getAllActiveMembers'))->render();
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    //Function for update event
    public function update(Request $request, $id){
        $created = $this->eventService->update($request, $id);
        if ($created === true) {
            return redirect()->route('admin.events')->with('success', 'Event updated successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Event title already exists. Please use a different title.');
    }

    //Function for delete event
    public function destroy(Request $request){
        $this->eventService->destroy($request->event_id);
        return redirect()->route('admin.events')->with('success', 'Event deleted successfully');
    }

    //Function for event rsvp page
    public function rsvp($id){
        $events = $this->eventService->getEventRsvps($id);
        return view('admin.events.event-rsvps', compact('events'));
    }
}