<?php

namespace App\Http\Controllers\Customer\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRsvp;
use App\Mail\AdminRsvpConfirmedMail;
use Illuminate\Support\Facades\Mail;

use App\Services\Customer\EventService;

class EventController extends Controller
{

    protected $eventService;
    
    public function __construct(EventService $eventService){
        $this->eventService = $eventService;
    }

    //Function for event page
    public function index(Request $request){
        //Get events
        $events = $this->eventService->getAllEvents($request);
        //echo "<pre>"; print_r($events->toArray()); die;
        return view('customer.events.index', compact('events'));
    }

    //Fnction for confirm rsvp
    public function confirmRsvp($id){
        //Get user
        $user = auth()->user();
        //Get events
        $event = EventRsvp::updateOrCreate(
            [
                'event_id' => $id,
                'user_id' => auth()->user()->id
            ],
            [
                'status' => 'going',
            ]
        );
        //Get event detail
        $event = Event::findOrFail($id);
        //Send email admin
        Mail::to('kapoorthakur906@gmail.com','expertdesignpro@gmail.com')
            ->send(new AdminRsvpConfirmedMail($event, $user));
        return response()->json(['message' => 'RSVP confirmed successfully.']);
    }

    //Function for cancel rsvp
    public function cancelRsvp($id){
        //Delete event
        $event = EventRsvp::where('event_id', $id)->where('user_id', auth()->user()->id)->delete();
        return response()->json(['message' => 'RSVP cancelled successfully.']);
    }
}