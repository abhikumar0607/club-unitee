<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //Call migration
    protected $table = 'blog_categories';
    protected $fillable = ['user_id','name','slug','status'];
}
