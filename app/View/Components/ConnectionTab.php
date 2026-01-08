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
        $this->myConnectionscount = count($connService->getMyConnections());
        $this->sentRequestsCount = count($connService->getSentConnectionRequests());
        $this->receivedRequestsCount = count($connService->getReceivedConnectionRequests());
    }

    public function render()
    {
        return view('components.connection-tab');
    }
}
