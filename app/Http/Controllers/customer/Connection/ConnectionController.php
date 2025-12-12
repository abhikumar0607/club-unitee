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
        return view('customer.connection.index', compact('connections','sentRequests','receivedRequests'));
    }

    //function for connection request
    public function sendConnectionRequest(Request $request, $receiver_id){
        $this->connService->sendConnectionRequest($receiver_id);
        return redirect()->back()->with('success', 'Connection request sent successfully');
    }

}
