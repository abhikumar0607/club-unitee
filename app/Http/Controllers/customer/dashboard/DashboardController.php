<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function for dashboard index
    public function index(){
        return view('customer.dashboard.index');
    }

    //function for member
    public function member(){
        return view('customer.dashboard.member');
    }

    //function for events
    public function events(){
        return view('customer.dashboard.events');
    }

    //function for profile
    public function profile(){
        return view('customer.dashboard.profile');
    }
}
