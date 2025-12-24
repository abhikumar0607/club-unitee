<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //Call migration
    protected $table = 'blogs';
    protected $fillable = ['user_id','title','slug','publish_date','type','short_description','description','image','author_name','author_image','author_type','status'];  
}
