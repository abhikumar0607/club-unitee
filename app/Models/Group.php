<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [
        'name',
        'created_by',
        'image'
    ];

  // group → members
    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'group_users',
            'group_id',
            'user_id'
        )->withTimestamps();
    }

    // group → messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    // group → creator (admin)
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

}
