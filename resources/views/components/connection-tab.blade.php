<div class="container text-center main-color-11">
    <ul class="nav nav-pills justify-content-left gap-4">
        {{-- <li class="nav-item">
            <a class="nav-link1 {{ request()->routeIs('customer.match.suggestions') ? 'active' : '' }}"
                href="{{ route('customer.match.suggestions') }}">
                Match Suggestions
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.my.connections') ? 'active' : '' }}"
                href="{{ route('customer.my.connections') }}">
                My Connections
                <span class="badge bg-danger receive-counter">{{ $myConnectionscount ?? '' }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.sent.requests') ? 'active' : '' }}"
                href="{{ route('customer.sent.requests') }}">
                Sent Requests
                <span class="badge bg-danger receive-counter">{{ $sentRequestsCount ?? '' }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="btn-uni2 nav-link1 {{ request()->routeIs('customer.received.requests') ? 'active' : '' }}"
                href="{{ route('customer.received.requests') }}">
                Received Requests
                <span class="badge bg-danger receive-counter">{{ $receivedRequestsCount ?? '' }}</span>
            </a>
        </li>

    </ul>
</div>