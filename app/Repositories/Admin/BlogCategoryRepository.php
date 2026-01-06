<?php

namespace App\Repositories\Admin;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryRepository
{
    //Function for store category
    public function store($request){
        //Generate slug 
        $slug = Str::slug($request->input('name'), "-");
        //Check if slug already exists or not
        if (BlogCategory::where('slug', $slug)->exists()) {
            return false;
        }    
        //Create category
        BlogCategory::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->status,
        ]);
        return true;
    }

    //Function for all categories
    public function getAllCategories(){
        return BlogCategory::OrderBy('ID', 'DESC')->where('user_id', auth()->id())->paginate(10);
    }

    //Function for edit category
    public function edit($id){
        return BlogCategory::findOrFail($id);
    }

    //Function for update category
    public function update($request, $id){
        //Get category detail
        $category = BlogCategory::findOrFail($id);
        //Update slug
        $slug = Str::slug($request->input('name'), "-");
        //Check if slug exists or not
        if (BlogCategory::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return false;
        }
        //Update category
        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'status' => $request->status,
        ]);
        return true;
    }

    //Function for delete category
    public function destroy($category_id){
        return BlogCategory::findOrFail($category_id)->delete();
    }
}