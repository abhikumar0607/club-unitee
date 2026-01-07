<?php

namespace App\Services\Customer;

use App\Repositories\Customer\DashboardRepository;

class DashboardService
{
    //protected repo
    protected $repo;

    //Fublic function for construct
    public function __construct(DashboardRepository $repo) {
        $this->repo = $repo;
    }

    //Function for total connection
    public function totalConnections(int $userId) {
        return $this->repo->totalConnections($userId);
    }

    //Function for pending requests
    public function pendingRequests(int $userId) {
        return $this->repo->pendingRequests($userId);
    }

    //Function for current month connnection
    public function currentMonthConnections(int $userId) {
        return $this->repo->currentMonthConnections($userId);
    }

    //Function for all events
    public function allEvents() {
        return $this->repo->allEvents();
    }

    //Function for upcoming events
    public function upcomingEvents() {
       $query = $this->repo->upcomingEvents();

        $query->with(['rsvps' => function($q){
            $q->where('user_id', auth()->user()->id);
        }]);
        
        return $query->paginate(6);
    }
}
