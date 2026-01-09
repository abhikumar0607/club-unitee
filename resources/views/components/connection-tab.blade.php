<div class="container text-center main-color-11">
    <ul class="nav nav-pills justify-content-left">
        {{-- <li class="nav-item">
            <a class="nav-link1 {{ request()->routeIs('customer.match.suggestions') ? 'active' : '' }}"
                href="{{ route('customer.match.suggestions') }}">
                Match Suggestions
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link1 {{ request()->routeIs('customer.my.connections') ? 'active' : '' }}"
                href="{{ route('customer.my.connections') }}">
                My Connections
            </a>
        </li>
         <span class="badge bg-danger">{{ $myConnectionscount ?? 0 }}</span>
        <li class="nav-item"> 
            <a class="nav-link1 {{ request()->routeIs('customer.sent.requests') ? 'active' : '' }}"
                href="{{ route('customer.sent.requests') }}">
                Sent Requests
            </a>
        </li>
        <span class="badge bg-danger">{{ $sentRequestsCount ?? 0 }}</span>
        <li class="nav-item">
            <a class="nav-link1 {{ request()->routeIs('customer.received.requests') ? 'active' : '' }}"
                href="{{ route('customer.received.requests') }}">
                Received Requests
            </a>
        </li>
         <span class="badge bg-danger">{{ $receivedRequestsCount ?? 0 }}</span>
    </ul>
</div>