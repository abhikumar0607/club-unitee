<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //Call migration
    protected $table = 'blog_categories';
    protected $fillable = ['user_id','name','slug','status'];

   //Function for get category details
    public function blog_details() {
        return $this->belongsToMany(
            Blog::class,
            'blog_category_relation',
            'category_id',
            'blog_id'
        );
    }
}
