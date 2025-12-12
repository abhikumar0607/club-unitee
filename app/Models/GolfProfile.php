<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GolfProfile extends Model
{
    protected $table = 'golf_profiles';
     protected $fillable = [
        'user_id',
        'skill_level',
        'fitness_level',
        'handicap',
        'course_play_preference',
        'top_facilities',
        'most_used_courses',
    ];

}
