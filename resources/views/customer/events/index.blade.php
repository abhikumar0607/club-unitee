@extends('layouts.customer-dashboard')
@section('content')
<!--MAIN CONTENT-->
<div class="main-content">
    <!--TOP NAVBAR-->
    <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
        <h4 class="m-0 fw-bold text-uni">Events</h4>
        <x-customer-dashboard-nav-profile />
    </nav>
    <!--HEADER-->
    <section class="page-header text-center py-3">
        <div class="container">
            <h1 class="page-title">Events</h1>
            <p class="page-subtitle">Join activities, meet members, and build community.</p>
        </div>
    </section>
    <!--FILTER SECTION-->
    <section class="pb-4">
        <div class="container">
            <div class="card card-uni p-4 mb-4">
                <h5 class="fw-bold mb-3">Filter Events</h5>
                <form action="{{ route('customer.dashboard.events') }}" method="GET">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <input type="text" class="form-control input-uni" placeholder="Search by event name" name="search" value="{{ request('search') }}">
                        </div>
                        <div class="col-md-3">
                            <select name="type" class="form-select input-uni" name="type">
                                <option value="" disabled selected>Select Type</option>
                                <option value="Golf Outing" {{ request('type') == 'Golf Outing' ? 'selected' : '' }}>Golf Outing</option>
                                <option value="Social Event" {{ request('type') == 'Social Event' ? 'selected' : '' }}>Social Event</option>
                                <option value="Workshop" {{ request('type') == 'Workshop' ? 'selected' : '' }}>Workshop</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-gradient w-100 fw-semibold">Apply Filters</button>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('customer.dashboard.events') }}" id="clearBtn"
                                class="btn btn-gradient w-100">Clear
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--EVENTS LIST-->
    <section class="pb-5">
        <div class="container">
            <div class="row g-4">
                <!--check if events exists or not-->
                @if ($events->count() > 0)
                <!--Get events-->
                @foreach ($events as $event)
                <div class="col-md-4 col-sm-6">
                    <div class="card card-uni p-3 h-100">
                        <div class="event-img mb-3 position-relative">
                            <a href="{{ url('event-detail/' . $event->slug) }}" class="stretched-link"></a>
                            @if ($event->image)
                                <img src="{{ asset('assets/admin/uploads/events/' . $event->image) }}" class="event-img-sm mb-3" alt="{{ $event->title }}">
                            @else
                                <div class="event-img-sm mb-3 d-flex align-items-center justify-content-center no-image">No Image Found</div>
                            @endif
                        </div>
                        <h5 class="fw-bold">{{ $event->title }}</h5>
                        <p class="text-muted small mb-1">
                            {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}
                            •
                            {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                        </p>
                        <p class="text-muted small mb-1">{{ $event->location }}</p>
                        @if ($event->type == 'Golf Outing')
                            <span class="badge bg-info-subtle text-info fw-semibold mb-2">
                                {{ $event->type }}
                            </span>
                        @elseif($event->type == 'Social Event')
                            <span class="badge bg-warning-subtle text-warning fw-semibold mb-2">
                                {{ $event->type }}
                            </span>
                        @elseif($event->type == 'Workshop')
                            <span class="badge bg-primary-subtle text-primary fw-semibold mb-2 published-btn">
                                {{ $event->type }}
                            </span>
                        @endif
                        <p class="text-muted small">
                            {{ \Illuminate\Support\Str::words(strip_tags($event->description), 18, '...') }}
                        </p>
                        <div class="main-view-btn">
                            <a href="{{ url('event-detail/' . $event->slug) }}" class="btn btn-gradient w-100 mt-auto">
                                View Details
                            </a>
                            @if($event->rsvps->count())
                                <button class="btn btn-success btn-sm btn-gradient"
                                    onclick="openRsvpModal('{{ $event->title }}', {{ $event->id }}, 'cancel')">You're Going (Cancel)
                                </button>
                                @else
                                <button class="btn btn-gradient"
                                    onclick="openRsvpModal('{{ $event->title }}', {{ $event->id }}, 'confirm')">RSVP
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 text-center">
                    <p>No event found.</p>
                </div>
                @endif
                <!--Pagination-->
                <div class="d-flex justify-content-center mt-5">
                    {{ $events->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </section>
</div>
<!--RSVP Modal-->
<x-rsvp-event-modal />
@endsection