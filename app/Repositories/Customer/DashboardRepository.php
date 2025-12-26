<?php

namespace App\Repositories\Customer;

use App\Models\ConnectionRequest;
use Carbon\Carbon;

class DashboardRepository
{
    public function totalConnections($userId)
    {
        return ConnectionRequest::where('status', 'accepted')
            ->where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)
                  ->orWhere('receiver_id', $userId);
            })
            ->count();
    }

    public function pendingRequests($userId)
    {
        return ConnectionRequest::where('receiver_id', $userId)
            ->where('status', 'pending')
            ->count();
    }

    public function currentMonthConnections($userId)
    {
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
}
