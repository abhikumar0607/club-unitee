<?php

namespace App\Services\Customer;

use App\Repositories\Customer\DashboardRepository;

class DashboardService
{
    protected $repo;

    public function __construct(DashboardRepository $repo)
    {
        $this->repo = $repo;
    }

    public function totalConnections(int $userId)
    {
        return $this->repo->totalConnections($userId);
    }

    public function pendingRequests(int $userId)
    {
        return $this->repo->pendingRequests($userId);
    }

    public function currentMonthConnections(int $userId)
    {
        return $this->repo->currentMonthConnections($userId);
    }
}
