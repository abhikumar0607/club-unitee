<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Customer\DashboardService;

class DashboardController extends Controller
{
    protected $dashboard_service;

    public function __construct(DashboardService $dashboard_service)
    {
        $this->dashboard_service = $dashboard_service;
    }

    public function index()
    {
        $userId = auth()->id(); 

        $totalConnections = $this->dashboard_service->totalConnections($userId);
        $pendingRequests  = $this->dashboard_service->pendingRequests($userId);
        $monthConnections = $this->dashboard_service->currentMonthConnections($userId);

        return view('customer.dashboard.index', compact(
            'totalConnections',
            'pendingRequests',
            'monthConnections'
        ));
    }
}
