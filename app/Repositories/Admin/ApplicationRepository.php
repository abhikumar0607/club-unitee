<?php

namespace App\Repositories\Admin;

use App\Models\User;

class ApplicationRepository
{
    // Get only customers
    public function pendingApplications()
    {
        return User::where('role', 'customer')->where('is_approved', 'pending')->paginate(10);
    }

    // Get approved customers
    public function approvedApplications(){
        return User::where('role', 'customer')->where('is_approved', 'approved')->paginate(10);
    }

    // Get rejected customers
    public function rejectedApplications(){
        return User::where('role', 'customer')->where('is_approved', 'rejected')->paginate(10);
    }


    // Approve customer
     public function approveApplication($id){
        $user = User::find($id);
        $user->is_approved = 'approved';
        $user->approved_at = now();
        $user->save();
        return $user;
    }

    // Reject customer
    public function rejectApplication($id){
        $user = User::find($id);
        $user->is_approved = 'rejected';
        $user->declined_at = now();
        $user->save();
        return $user;
    }
}