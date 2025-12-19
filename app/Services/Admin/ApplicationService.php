<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ApplicationRepository;

class ApplicationService
{
    protected $app_repo;

    public function __construct(ApplicationRepository $app_repo)
    {
        $this->app_repo = $app_repo;
    }

  
    public function pendingApplications()
    {
        return $this->app_repo->pendingApplications();
    }

    public function approvedApplications()
    {
        return $this->app_repo->approvedApplications();
    }

    public function rejectedApplications()
    {
        return $this->app_repo->rejectedApplications();
    }

    public function approveApplication($id)
    {
        return $this->app_repo->approveApplication($id);
    }

    public function rejectApplication($id)
    {
        return $this->app_repo->rejectApplication($id);
    }
      
}
