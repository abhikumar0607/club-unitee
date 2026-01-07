<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Event;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryRelation;

class frontController extends Controller
{
    //Function for home page
    public function index(){
        //Get latest customers
        $customers = User::where('role', 'customer')->latest()->take(20)->get();
        // echo "<pre>"; print_r($customers->toArray());exit;
        return view('customer.home', compact('customers'));
    }

    //Function for events page
    public function events(){
        //Get events
        $all_events = Event::with('rsvps')->whereDate('date', '>=', now())->orderBy('date', 'asc')->whereIn('status', ['Published'])->paginate(6);
        //echo "<pre>"; print_r($all_events->toArray());exit;
        return view('customer.events', compact('all_events'));
    }

    //Function for event detail
    public function event_detail($slug){
        //Get events
        $all_events = Event::where('slug', $slug)->firstOrFail();
        return view('customer.event-detail', compact('all_events'));
    }

    //Function for blog page
    public function blogs(Request $request){
        //All features
        $featuredBlog = Blog::whereIn('status', ['Published'])->with('category_details')->latest()->first();
        //Get blogs
        $blogs = Blog::with('category_details')->whereIn('status', ['Published'])
            ->when($request->category, function ($q) use ($request) {
                $q->whereHas('category_details', function ($sub) use ($request) {
                    $sub->where('slug', $request->category); 
                });
            })
            ->latest()
            ->paginate(6)
            ->appends($request->query());
        //Categories
        $categories = BlogCategory::OrderBy('ID', 'DESC')->whereIn('status', ['Published'])->get();
        return view('customer.blog', compact('featuredBlog','categories','blogs'));
    }

    //Function for blog detail
    public function blog_detail($slug){
        $blog_detail = Blog::with('category_details')->where('slug', $slug)->firstOrFail();
        return view('customer.blog-detail', compact('blog_detail'));
    }

    //Function for about page
    public function about(){
        return view('customer.about');
    }

    //Function for privacy page
    public function privacy(){
        return view('customer.privacy');
    }

    //Function for term page
    public function term(){
        return view('customer.term');
    }

    //Function for thank you page 
    public function thankyou(){
        return view('customer.thankyou');
    }
}