<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


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

    //function for about page
    public function about(){
        return view('customer.about');
    }

    //function for thank you page 
    public function thankyou(){
        return view('customer.thankyou');
    }
}
