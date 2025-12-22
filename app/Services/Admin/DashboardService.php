<?php

namespace App\Services\Admin;

use App\Repositories\Admin\DashboardRepository;

class DashboardService
{
    protected $dashboard_repo;

    public function __construct(DashboardRepository $dashboard_repo)
    {
        $this->dashboard_repo = $dashboard_repo;
    }

    public function allApplications()
    {
        return $this->dashboard_repo->allApplications();
    }

    public function pendingApplications()
    {
        return $this->dashboard_repo->pendingApplications();
    }

    public function allEvents()
    {
        return $this->dashboard_repo->allEvents();
    }

    public function currentMonth()
    {
        return $this->dashboard_repo->currentMonth();
    }

    public function membersData()
    {
        return $this->dashboard_repo->membersData();
    }

    public function eventsData()
    {
        return $this->dashboard_repo->eventsData();
    }

    public function upcomingEvents()
    {
        return $this->dashboard_repo->upcomingEvents();
    }
}
