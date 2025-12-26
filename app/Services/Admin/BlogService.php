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

    //Function for store blog
    public function store($request){
        return $this->blogRepository->store($request);
    }

    //Function for get all blog
    public function getAllBlogs($request){
        return $this->blogRepository->getAllBlogs($request);
    }

    //Function for get all categories
    public function getAllCategories(){
        return $this->blogRepository->getAllCategories();
    }

    //Function for edit blog
    public function edit($id){
        return $this->blogRepository->edit($id);
    }

    //Function for update blog
    public function update($request, $id){
        return $this->blogRepository->update($request, $id);
    }

    //Function for delete blog
    public function destroy($blog_id){
        return $this->blogRepository->destroy($blog_id);
    }
}