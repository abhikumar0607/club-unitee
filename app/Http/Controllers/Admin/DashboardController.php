<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //function to show admin dashboard
    public function index(){
        return view('admin.index');
    }

    //function to show connections page
    public function applications(){
        return view('admin.applications');
    }

    //function to show events page
    public function events(){
        return view('admin.events');
    }

    //function for analytic page
    public function analytics(){
        return view('admin.analytics');
    }

    //function to show profile page
    public function profile(){
        return view('admin.profile');
    }
}
