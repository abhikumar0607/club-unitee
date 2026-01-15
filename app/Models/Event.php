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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rsvps()
    {
        return $this->hasMany(EventRsvp::class)->with('user');
    }

    public function members()
    {
        return $this->belongsToMany(User::class, 'event_member', 'event_id', 'member_id')
                    ->withTimestamps();
    }

}
