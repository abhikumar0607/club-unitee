<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\Customer\ConnectionService;

class ConnectionTab extends Component
{
    public $myConnectionscount;
    public $sentRequestsCount;
    public $receivedRequestsCount;

    public function __construct(ConnectionService $connService)
    {
        $myConnections = $connService->getMyConnections();
        $sentRequests = $connService->getSentConnectionRequests();
        $receivedRequests = $connService->getReceivedConnectionRequests();

        // Set the counts, but only if greater than 0
        $this->myConnectionscount = count($myConnections) > 0 ? count($myConnections) : null;
        $this->sentRequestsCount = count($sentRequests) > 0 ? count($sentRequests) : null;
        $this->receivedRequestsCount = count($receivedRequests) > 0 ? count($receivedRequests) : null;
    }

    public function render()
    {
        return view('components.connection-tab');
    }
}
