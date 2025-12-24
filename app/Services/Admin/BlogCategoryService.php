<?php

namespace App\Services\Admin;

use App\Repositories\Admin\BlogCategoryRepository;
class BlogCategoryService
{
    protected $categoryRepository;
    
    public function __construct(BlogCategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    //Function for store category
    public function store($request){
        return $this->categoryRepository->store($request);
    }

    //Function for get all category
    public function getAllCategories(){
        return $this->categoryRepository->getAllCategories();
    }

    //Function for edit category
    public function edit($id){
        return $this->categoryRepository->edit($id);
    }

    //Function for update category
    public function update($request, $id){
        return $this->categoryRepository->update($request, $id);
    }

    //Function for delete category
    public function destroy($category_id){
        return $this->categoryRepository->destroy($category_id);
    }
}