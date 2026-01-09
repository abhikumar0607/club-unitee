<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    //mark as read
    public function markAsRead($id)
    {
        $notification = Auth::user()
            ->unreadNotifications()
            ->where('id', $id)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return back();
    }

    //mark all as read
    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();

        return back();
    }
}
