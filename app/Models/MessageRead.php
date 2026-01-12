<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MessageRead extends Model
{
    protected $table = 'message_reads';
     protected $fillable = ['message_id','user_id','read_at'];
}
