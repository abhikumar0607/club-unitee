<?php

namespace App\Http\Controllers\Customer\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRsvp;

use App\Services\Customer\EventService;

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

        return view('customer.events.index', compact('events'));
    }

    //function for confirm rsvp
    public function confirmRsvp($id){
       $event = EventRsvp::updateOrCreate(
            [
                'event_id' => $id,
                'user_id' => auth()->user()->id
            ],
            [
                'status' => 'going',
            ]
        );

        return response()->json(['message' => 'RSVP confirmed successfully.']);
    }

    //function for cancel rsvp
    public function cancelRsvp($id){
        $event = EventRsvp::where('event_id', $id)->where('user_id', auth()->user()->id)->delete();
        return response()->json(['message' => 'RSVP cancelled successfully.']);
    }
}