<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\ApplicationService;

class ApplicationController extends Controller
{

    protected $app_service;

    public function __construct(ApplicationService $app_service)
    {
        $this->app_service = $app_service;
    }

    //function to show connections page
    public function index(){
        $pendingApplications = $this->app_service->pendingApplications();
        $approvedApplications = $this->app_service->approvedApplications();
        $declinedApplications = $this->app_service->rejectedApplications();
        return view('admin.application.index', compact('pendingApplications', 'approvedApplications', 'declinedApplications'));
    }

    //approve application
    public function approveApplication($id){
        $this->app_service->approveApplication($id);
        return redirect()->route('admin.applications')->with('success', 'Application approved successfully.');
    }
    //reject application
    public function rejectApplication($id){
        $this->app_service->rejectApplication($id);
        return redirect()->route('admin.applications')->with('success', 'Application rejected successfully.');
    }
}
