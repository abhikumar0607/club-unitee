<div class="container text-center main-color-11">
    <ul class="nav nav-pills justify-content-left gap-4 main-connetion-tab">
        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.match.suggestions') ? 'active' : '' }}"
                href="{{ route('customer.match.suggestions') }}">
                Match Suggestions
            </a>
        </li>
        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.my.connections') ? 'active' : '' }}"
                href="{{ route('customer.my.connections') }}">
                My Connections
            </a>
            <span class="badge bg-danger receive-counter">{{ $myConnectionscount ?? 0 }}</span>
        </li>
        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.sent.requests') ? 'active' : '' }}"
                href="{{ route('customer.sent.requests') }}">
                Sent Requests
            </a>
            <span class="badge bg-danger receive-counter">{{ $sentRequestsCount ?? 0 }}</span>
        </li>

        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.received.requests') ? 'active' : '' }}"
                href="{{ route('customer.received.requests') }}">
                Received Requests
            </a>
            <span class="badge bg-danger receive-counter">{{ $receivedRequestsCount ?? 0 }}</span>
        </li>

    </ul>
</div>