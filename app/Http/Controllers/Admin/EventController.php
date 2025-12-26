<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Services\Admin\EventService;

class EventController extends Controller
{

    protected $eventService;
    
    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }
    //function for event page
    public function index(Request $request){
        $events = $this->eventService->getAllEvents($request);
        return view('admin.events.index', compact('events'));
    }

    //function for store event
    public function store(Request $request){
        $created = $this->eventService->store($request);
        if ($created === true) {
            return redirect()->route('admin.events')->with('success', 'Event created successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Event title already exists. Please use a different title.');
    }

    //function for edit event
    public function edit($id){
        $event = $this->eventService->edit($id);
        $html = view('admin.events.edit-form', compact('event'))->render();
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    // //function for update event
    public function update(Request $request, $id){
        $created = $this->eventService->update($request, $id);
        if ($created === true) {
            return redirect()->route('admin.events')->with('success', 'Event updated successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Event title already exists. Please use a different title.');
    }

    //function for delete event
    public function destroy(Request $request){
        $this->eventService->destroy($request->event_id);
        return redirect()->route('admin.events')->with('success', 'Event deleted successfully');
    }
}