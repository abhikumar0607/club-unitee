<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMatchingPreference extends Model
{
    protected $table = 'user_matching_preffrence';

    protected $fillable = [
        'user_id',
        'play_style',
        'travel_radius',
        'handicafe_prefernce',
        'fitness_level_prefernce',
        'availability_prefernce',
        'looking_for_prefernce',
        'skill_level_prefernce',
        'course_play_prefernce',
        'intrest_prefrence',
    ];
}
