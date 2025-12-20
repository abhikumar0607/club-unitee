<?php

namespace App\Http\Controllers\Customer\Event;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
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
}