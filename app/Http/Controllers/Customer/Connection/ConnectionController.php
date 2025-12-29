<?php

namespace App\Http\Controllers\Customer\Connection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Customer\ConnectionService;

class ConnectionController extends Controller
{

    protected $connService;

    public function __construct(ConnectionService $connService)
    {
        $this->connService = $connService;
    }
    //function for connection
    public function index(){
        $connections = $this->connService->getAllConnections();
        $sentRequests = $this->connService->getSentConnectionRequests();
        $receivedRequests = $this->connService->getReceivedConnectionRequests();
        $isrequestsent = $this->connService->isRequestSent();
        $isRequestReceived = $this->connService->isRequestReceived();
        $isRequestAccepted = $this->connService->isRequestAccepted();
        $myConnections = $this->connService->getMyConnections();
        //echo "<pre>";print_r($sentRequests->toArray());exit;
        return view('customer.connection.index', compact('connections','sentRequests','receivedRequests','isrequestsent','isRequestReceived','isRequestAccepted','myConnections'));
    }

    //function for connection request
    public function sendConnectionRequest(Request $request, $receiver_id){
        $this->connService->sendConnectionRequest($receiver_id);
        return redirect()->back()->with('success', 'Connection request sent successfully');
    }

    //function for cancel connection request
    public function cancelConnectionRequest(Request $request, $request_id){
        $this->connService->cancelConnectionRequest($request_id);
        return redirect()->back()->with('success', 'Connection request cancelled successfully');
    }

    //function for accept connection request
    public function acceptConnectionRequest(Request $request, $request_id){
        $this->connService->acceptConnectionRequest($request_id);
        return redirect()->back()->with('success', 'Connection request accepted successfully');
    }

}
