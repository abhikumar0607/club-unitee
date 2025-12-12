<?php

namespace App\Repositories\Admin;

use App\Models\User;

class MemberRepository
{
    // Get only customers
    public function getAllMembers()
    {
        return User::where('role', 'customer');
    }
}