<?php

namespace App\Services\Admin;

use App\Repositories\Admin\BlogRepository;
class BlogService
{
    protected $blogRepository;
    
    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    //Function for store event
    public function store($request){
        return $this->blogRepository->store($request);
    }

    //function for get all events
    public function getAllBlogs(){
        return $this->blogRepository->getAllBlogs();
    }

    //function for get all categories
    public function getAllCategories(){
        return $this->blogRepository->getAllCategories();
    }

    //function for edit event
    public function edit($id){
        return $this->blogRepository->edit($id);
    }

    //function for update event
    public function update($request, $id){
        return $this->blogRepository->update($request, $id);
    }

    //function for delete event
    public function destroy($event_id){
        return $this->blogRepository->destroy($event_id);
    }
}