<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\DashboardService;

class DashboardController extends Controller
{
    protected $dashboard_service;

    public function __construct(DashboardService $dashboard_service)
    {
        $this->dashboard_service = $dashboard_service;
    }

    //Function for show dashboard
    public function index(){
        $allApplications = $this->dashboard_service->allApplications();
        $pendingApplications = $this->dashboard_service->pendingApplications();
        $allEvents = $this->dashboard_service->allEvents();
        $currentMonth = $this->dashboard_service->currentMonth();
        $membersData = $this->dashboard_service->membersData();
        $eventsData = $this->dashboard_service->eventsData();
        $upcomingEvents = $this->dashboard_service->upcomingEvents();
        return view('admin.index', compact('allApplications','pendingApplications','allEvents','currentMonth','membersData','eventsData','upcomingEvents'));
    }

    //function for analytic page
    public function analytics(){
        return view('admin.analytics');
    }

    //function to show profile page
    public function profile(){
        return view('admin.profile');
    }
}
