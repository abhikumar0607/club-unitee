<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAvailability extends Model
{
    protected $table = 'user_availability';

    protected $fillable = [
        'user_id',
        'availability',
        'looking_for',
        'preferred_connection',
    ];
}
