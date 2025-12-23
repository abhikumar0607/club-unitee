@extends('layouts.customer-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP NAVBAR -->
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
            <h4 class="m-0 fw-bold text-uni">Events</h4>
            <x-customer-dashboard-nav-profile />
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-3">
            <div class="container">
                <h1 class="page-title">Events</h1>
                <p class="page-subtitle">Join activities, meet members, and build community.</p>
            </div>
        </section>

        <!-- FILTER SECTION -->
        <section class="pb-4">
            <div class="container">

                <div class="card card-uni p-4 mb-4">
                    <h5 class="fw-bold mb-3">Filter Events</h5>

                    <form action="{{ route('customer.dashboard.events') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control input-uni" placeholder="Search by event name" name="search" value="{{ request('search') }}">
                        </div>

                        <div class="col-md-4">
                            <select class="form-select input-uni" name="type">
                                <option value="">All Event Types</option>
                                <option value="Golf Outing" {{ request('type') == 'Golf Outing' ? 'selected' : '' }}>Golf Outing</option>
                                <option value="Social Event" {{ request('type') == 'Social Event' ? 'selected' : '' }}>Social Event</option>
                                <option value="Workshop" {{ request('type') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-gradient w-100 fw-semibold">Apply Filters</button>
                        </div>

                    </div>
                    </form>

                </div>

            </div>
        </section>

        <!-- EVENTS LIST -->
        <section class="pb-5">
            <div class="container">

                <div class="row g-4">

                    <!-- EVENT CARD -->
                    <div class="col-md-4">
                        @if ($events->count() > 0)
                            @foreach ($events as $event)
                                <div class="card card-uni p-3">
                                    <div class="event-img mb-3"></div>

                                    <h5 class="fw-bold">{{ $event->title }}</h5>
                                    <p class="text-muted small mb-1">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} • {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}</p>
                                    <p class="text-muted small mb-1">{{ $event->location }}</p>

                                    @if ($event->type == 'Golf Outing')
                                        <span
                                            class="badge bg-info-subtle text-info fw-semibold mb-2">{{ $event->type }}</span>
                                    @elseif($event->type == 'Social Event')
                                        <span
                                            class="badge bg-warning-subtle text-warning fw-semibold mb-2">{{ $event->type }}</span>
                                    @elseif($event->type == 'Workshop')
                                        <span
                                            class="badge bg-primary-subtle text-primary fw-semibold mb-2">{{ $event->type }}</span>
                                    @endif

                                    <p class="text-muted small">{{ $event->description }}</p>

                                    <a href="#"
                                        class="btn btn-gradient w-100 mt-2">View Details</a>
                                </div>
                            @endforeach
                        @else
                            <p>No event found.</p>
                        @endif
                    </div>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-5">
                        {{ $events->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection
