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
            'type' => $request->type,
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
    public function getAllBlogs() {
        return Blog::OrderBy('ID', 'DESC')->where('user_id', auth()->id())->paginate(10);
    }

    //Function for get all categories
    public function getAllCategories() {
        return BlogCategory::OrderBy('ID', 'DESC')->where('user_id', auth()->id())->get();
    }

    //Function for edit event
    public function edit($id) {
        return Blog::findOrFail($id);
    }

    //Function for update event
    public function update($request, $id) {
        //Get event detail
        $event = Blog::findOrFail($id);
        //image upload
        $filename = $event->image ?? null;
        if ($request->hasFile('image')) {
            if ($event->image) {
                $this->deleteImage($event->image, 'assets/admin/uploads/events');
            }
            $filename = $this->uploadImage(
                $request->file('image'),
                'assets/admin/uploads/events'
            );
        }
        //Update slug
        $slug = Str::slug($request->input('title'), "-");
        //Check if slug exists or not
        if (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            return false;
        }
        //Update event
        $event->update([
            'title' => $request->title,
            'slug' => $slug,
            'type' => $request->type,
            'date' => $request->date,
            'event_time' => $request->event_time,
            'location' => $request->location,
            'description' => $request->description,
            'status' => $request->status,
            'image' => $filename,
        ]);

        return true;
    }
    
    //Function for delete event
    public function destroy($event_id) {
        return Blog::findOrFail($event_id)->delete();
    }
}