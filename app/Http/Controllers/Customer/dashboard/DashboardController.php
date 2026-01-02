<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\Customer\DashboardService;

class DashboardController extends Controller
{
    //protected d service
    protected $dashboard_service;

    //Function for construct
    public function __construct(DashboardService $dashboard_service) {
        $this->dashboard_service = $dashboard_service;
    }

    //Function for index
    public function index() {
        //Get auth detai
        $userId = auth()->id();
        //total connection 
        $totalConnections = $this->dashboard_service->totalConnections($userId);
        //pendingrequets
        $pendingRequests  = $this->dashboard_service->pendingRequests($userId);
        //monthlyconnection
        $monthConnections = $this->dashboard_service->currentMonthConnections($userId);
        //allevents
        $allEvents  = $this->dashboard_service->allEvents();
        //upcomingEvents
        $upcomingEvents  = $this->dashboard_service->upcomingEvents();
        return view('customer.dashboard.index', compact(
            'totalConnections',
            'pendingRequests',
            'monthConnections',
            'allEvents',
            'upcomingEvents'
        ));
    }
}
