<?php

namespace App\Repositories\Customer;
use App\Models\ConnectionRequest;
use App\Models\Event;
use Carbon\Carbon;

class DashboardRepository
{
    //Function for total connection
    public function totalConnections($userId) {
        return ConnectionRequest::where('status', 'accepted')
        ->where(function ($q) use ($userId) {
            $q->where('sender_id', $userId)
            ->orWhere('receiver_id', $userId);
        })
        ->count();
    }

    //Function for pending requests
    public function pendingRequests($userId) {
        return ConnectionRequest::where('sender_id', $userId)
        ->where('status', 'pending')
        ->count();
    }

    //Function for current month connnection
    public function currentMonthConnections($userId) {
        return ConnectionRequest::where('status', 'accepted')
        ->whereBetween('updated_at', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth(),
        ])
        ->where(function ($q) use ($userId) {
            $q->where('sender_id', $userId)
                ->orWhere('receiver_id', $userId);
        })
        ->count();
    }

    //Function for all events
    public function allEvents() {
        return Event::count();
    }

    //Function for upcoming event
    public function upcomingEvents() {
        return Event::whereDate('date', '>=', now())
        ->orderBy('date', 'asc')
        ->whereIn('status', ['Published']);
    }
}
