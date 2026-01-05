<?php

namespace App\Repositories\Admin;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogCategoryRelation;
use App\Traits\HandlesFileUpload;
use Illuminate\Support\Str;

class BlogRepository
{
    use HandlesFileUpload;
    //Function for store blog
    public function store($request) {
        //Check if image is exit or not
        $filename = $this->uploadImage($request->file('image'),
            'assets/admin/uploads/blogs');
        $author_image = $this->uploadImage($request->file('author_image'),
            'assets/admin/uploads/blogs');    
        //Generate slug 
        $slug = Str::slug($request->input('title'), "-");
        //Check if slug already exists or not
        if (Blog::where('slug', $slug)->exists()) {
            return false;
        }    
        //Create blog
        $blog = Blog::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'publish_date' => $request->publish_date,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $filename,
            'author_name' => $request->author_name,
            'author_type' => $request->author_type,
            'status' => $request->status,
            'author_image' => $author_image,
        ]);
        if ($request->filled('category_name')) {
            foreach ($request->category_name as $category_id) {
                BlogCategoryRelation::create([
                    'blog_id' => $blog->id,
                    'category_id' => $category_id,
                ]);
            }
        }
        return true;
    }

    //Function for get all blogs
    public function getAllBlogs($request) {
        $query = Blog::with('category_details')->where('user_id', auth()->id())->whereIn('status', ['Published'])
            ->orderBy('id', 'desc');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        return $query->paginate(10);
    }

    //Function for get all categories
    public function getAllCategories() {
        return BlogCategory::OrderBy('ID', 'DESC')->where('user_id', auth()->id())->get();
    }

    //Function for edit event
    public function edit($id) {
        return Blog::with('category_details')->find($id);
    }

    //Function for update blog
    public function update($request, $id) {
        //Get blog detail
        $blog = Blog::findOrFail($id);
        //image upload
        $filename = $blog->image ?? null;
        if ($request->hasFile('image')) {
            if ($blog->image) {
                $this->deleteImage($blog->image, 'assets/admin/uploads/blogs');
            }
            $filename = $this->uploadImage(
                $request->file('image'),
                'assets/admin/uploads/blogs'
            );
        }
        //image upload
        $author_image = $blog->author_image ?? null;
        if ($request->hasFile('author_image')) {
            if ($blog->author_image) {
                $this->deleteImage($blog->author_image, 'assets/admin/uploads/blogs');
            }
            $author_image = $this->uploadImage(
                $request->file('author_image'),
                'assets/admin/uploads/blogs'
            );
        }
        //Update slug
        $slug = Str::slug($request->input('title'), "-");
        //Check if slug exists or not
        if (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return false;
        }
        //Update event
        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'publish_date' => $request->publish_date,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $filename,
            'author_name' => $request->author_name,
            'author_type' => $request->author_type,
            'status' => $request->status,
            'author_image' => $author_image,
        ]);
        //Delete old blog
        BlogCategoryRelation::where('blog_id', $blog->id)->delete();
        //Get request
        if ($request->has('category_name')) {
            foreach ($request->category_name as $category_id) {
                BlogCategoryRelation::create([
                    'blog_id' => $blog->id,
                    'category_id' => $category_id,
                ]);
            }
        }
        return true;
    }
    
    //Function for delete event
    public function destroy($blog_id) {
        return Blog::findOrFail($blog_id)->delete();
    }
}