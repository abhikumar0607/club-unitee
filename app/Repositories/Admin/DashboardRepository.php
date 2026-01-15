<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    //Function for all customers
    public function allApplications()
    {
        return User::where('role', 'customer')->count();
    }

    //Function for pending customers
    public function pendingApplications()
    {
        return User::where('role', 'customer')->where('is_approved', 'pending')->count();
    }

    //Function for all events
    public function allEvents()
    {
        return Event::where('user_id', auth()->id())->whereIn('status', ['Published', 'Completed'])->count();
    }

    //Function for current month members
    public function currentMonth()
    {
        return User::where('role', 'customer')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
    }

    //Function for members count month-wise
    public function membersData()
    {
        $months = array_fill(1, 12, 0);
        $data = User::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
            )
            ->where('role', 'customer')
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total', 'month')
            ->toArray();
        foreach ($data as $month => $count) {
            $months[$month] = $count;
        }

        return array_values($months);
    }

    //Function for events count month-wise
    public function eventsData()
    {
        $months = array_fill(0, 12, 0);
        $data = Event::selectRaw('MONTH(date) m, COUNT(*) c')
            ->whereYear('date', date('Y'))
            ->groupBy('m')
            ->pluck('c', 'm');
        foreach ($data as $m => $c) {
            $months[$m - 1] = $c;
        }
        return $months;
    }

    //Function for upcoming event
    public function upcomingEvents()
    {
        return Event::whereDate('date', '>=', now())
        ->orderBy('date', 'asc')
        ->where('status', 'Published')
        ->paginate(6);
    }
}