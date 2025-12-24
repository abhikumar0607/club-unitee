<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Services\Admin\BlogCategoryService;

class BlogCategoryController extends Controller
{

    protected $categoryService;
    
    public function __construct(BlogCategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    //Function for category page
    public function index(){
        $categories= $this->categoryService->getAllCategories();
        return view('admin.blogs.categories.index', compact('categories'));
    }

    //Function for store category
    public function store(Request $request){
        $created = $this->categoryService->store($request);
        if ($created === true) {
            return redirect()->route('admin.categories')->with('success', 'Category created successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Category name already exists. Please use a different name.');
    }

    //Function for edit category
    public function edit($id){
        $category = $this->categoryService->edit($id);
        $html = view('admin.blogs.categories.edit-form', compact('category'))->render();
        return response()->json([
            'status' => true,
            'html' => $html
        ]);
    }

    //Function for update category
    public function update(Request $request, $id){
        $created = $this->categoryService->update($request, $id);
        if ($created === true) {
            return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
        }
        return redirect()->back()->withInput()->with('error', 'Category name already exists. Please use a different name.');
    }

    //Function for delete category
    public function destroy(Request $request){
        $this->categoryService->destroy($request->category_id);
        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }
}
