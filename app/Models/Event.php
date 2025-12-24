<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'type',
        'date',
        'event_time',
        'location',
        'description',
        'image',
        'status',
    ];
}
