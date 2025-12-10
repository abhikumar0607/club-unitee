<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontController extends Controller
{
    //function to show home page
    public function index(){
        return view('customer.home');
    }

    //function for events page
    public function events(){
        return view('customer.events');
    }

    //function for blog page
    public function blog(){
        return view('customer.blog');
    }
}
