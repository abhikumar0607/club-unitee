<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventMember extends Model
{
    protected $table = 'event_member';
    protected $fillable = [
        'event_id',
        'member_id',
        //'status',
    ];
}
