<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Services\Admin\BlogService;

class BlogController extends Controller
{

    protected $blogService;
    
    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
    }
    //function for blog page
    public function index(){
        $categories = $this->blogService->getAllCategories();
        $blogs = $this->blogService->getAllBlogs();
        return view('admin.blogs.index', compact('blogs','categories'));
    }

    //function for store blog
    public function store(Request $request){
        $created = $this->blogService->store($request);
        if ($created === true) {
            return redirect()->route('admin.blogs')->with('success', 'Blog created successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Blog title already exists. Please use a different title.');
    }

    //function for edit event
    public function edit($id){
        $categories = $this->blogService->getAllCategories();
        $blogs = $this->blogService->edit($id);
        $html = view('admin.blogs.edit-form', compact('blogs','categories'))->render();
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    // //function for update event
    public function update(Request $request, $id){
        $created = $this->blogService->update($request, $id);
        if ($created === true) {
            return redirect()->route('admin.blogs')->with('success', 'Blog updated successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Blog title already exists. Please use a different title.');
    }

    //function for delete event
    public function destroy(Request $request){
        $this->blogService->destroy($request->event_id);
        return redirect()->route('admin.blogs')->with('success', 'Blog deleted successfully');
    }
}
