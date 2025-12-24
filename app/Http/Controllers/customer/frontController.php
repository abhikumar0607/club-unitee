<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Event;


class frontController extends Controller
{
    //function to show home page
    public function index(){
        return view('customer.home');
    }

    //function for events page
    public function events(){
        //Get events
        $all_events = Event::OrderBy('ID', 'ASC')->paginate(6);
        return view('customer.events', compact('all_events'));
    }

    //Function for event detail
    public function event_detail($slug){
        //Get events
        $all_events = Event::where('slug', $slug)->firstOrFail();
        return view('customer.event-detail', compact('all_events'));
    }

    //function for blog page
    public function blog(){
        return view('customer.blog');
    }

    //function for about page
    public function about(){
        return view('customer.about');
    }

    //function for privacy page
    public function privacy(){
        return view('customer.privacy');
    }

    //function for term page
    public function term(){
        return view('customer.term');
    }

    //function for thank you page 
    public function thankyou(){
        return view('customer.thankyou');
    }
}