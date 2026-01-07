@extends('layouts.customer-frontend')
@section('content')
<!-- MAIN CONTENT -->
<section class="events-main py-5">
    <div class="container">
        <!--HEADER ROW: TITLE + SORT-->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
            <div>
                <h5 class="fw-semibold text-uni mb-1 fs-2">All Events</h5>
                <p class="text-muted small mb-0">Browse upcoming rounds, socials, and workshops.</p>
            </div>
        </div>
        <!--FILTER CARD WITH TOGGLE-->
        <div class="card events-filter-card mb-4">
            <h4 class="btn-11">All Event</h4>
            <hr>
            <!--Toggle button (collapsed by default) -->
            <!--<div class="d-flex justify-content-between align-items-center">
                <button class="btn filter-toggle collapsed d-flex justify-content-between align-items-center"
                    type="button" data-bs-toggle="collapse" data-bs-target="#eventsFilter" aria-expanded="false"
                    aria-controls="eventsFilter">
                    <div class="d-flex align-items-center gap-2 text-start">
                        <span class="filter-chevron"></span>
                        <span class="filter-title">Show Filter</span>
                    </div>
                </button>
                <div class="reset-fill">
                    <a href="#">Reset All</a>
                </div>
                </div>-->
            <!--Collapsible filter body-->
            <div class="collapse" id="eventsFilter">
                <div class="filter-body pt-3">
                    <div class="row g-3 mb-3">
                        <!--Search-->
                        <div class="col-md-4">
                            <label class="form-label filter-label">Search</label>
                            <input type="text" class="form-control input-uni" placeholder="Event name or location">
                        </div>
                        <!--Date-->
                        <div class="col-md-4">
                            <label class="form-label filter-label">Date</label>
                            <input type="date" class="form-control input-uni">
                        </div>
                        <!--Event Type-->
                        <div class="col-md-4">
                            <label class="form-label filter-label">Event Type</label>
                            <select class="form-select input-uni">
                                <option value="" disabled selected>All types</option>
                                <option>Golf Outing</option>
                                <option>Social Event</option>
                                <option>Workshop</option>
                                <option>Tournament</option>
                            </select>
                        </div>
                        <!--Skill Level-->
                        <!--<div class="col-md-4">
                                <label class="form-label filter-label">Skill Level</label>
                                <select class="form-select input-uni">
                                    <option value="">Any level</option>
                                    <option>Beginner</option>
                                    <option>Intermediate</option>
                                    <option>Advanced</option>
                                </select>
                            </div>-->
                        <!--Location-->
                        <div class="col-md-4">
                            <label class="form-label filter-label">Region / Course</label>
                            <input type="text" class="form-control input-uni" placeholder="e.g. LA, Torrey Pines...">
                        </div>
                        <!--Capacity-->
                        <!--<div class="col-md-4">
                            <label class="form-label filter-label">Availability</label>
                            <select class="form-select input-uni">
                                <option value="">All</option>
                                <option>Spots available</option>
                                <option>Almost full</option>
                                <option>Waitlist only</option>
                            </select>
                        </div> -->
                    </div>
                    <!--Checkbox row (separate, not inside last field)-->
                    <!--<div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showMyEvents">
                                    <label class="form-check-label filter-label" for="showMyEvents">
                                        Show only events I’m registered for
                                    </label>
                                </div>
                            </div>
                        </div>-->
                    <!--Buttons-->
                    <div class="d-flex flex-wrap gap-2 justify-content-end">
                        <button class="btn btn-outline-uni px-4" type="button">Clear filters</button>
                        <button class="btn btn-gradient px-4" type="button">Apply filters</button>
                    </div>
                </div>
            </div>
            <!--EVENTS GRID-->
            <div class="row g-4">
                @foreach($all_events as $event)
                <!--EVENT CARD 1-->
                <div class="col-md-4">
                    <div class="card card-uni-11 event-card h-100 d-flex flex-column">
                        @if($event->image)
                        <a href="{{ url('event-detail/'.$event['slug']) }}">
                            <img src="{{ asset('assets/admin/uploads/events/' . $event->image) }}" class="event-img-sm mb-3" alt="{{ $event->title }}">
                        </a>
                        @else
                        <div class="event-img-sm mb-3 d-flex align-items-center justify-content-center no-image">
                            No Image Found
                        </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="badge event-badge-green">{{ $event->type }}</span>
                            <span class="event-date small text-muted"> 
                                @php
                                    $eventDate = \Carbon\Carbon::parse($event->date);
                                    $daysDiff = now()->diffInDays($eventDate);
                                @endphp
                                @if($daysDiff <= 7)
                                    {{ $eventDate->format('l') }} •
                                    {{ \Carbon\Carbon::parse($event->event_time)->format('h:i A') }}
                                @else
                                @if($daysDiff < 28)
                                    {{ ceil($daysDiff / 7) }} week
                                    {{ ceil($daysDiff / 7) > 1 ? 's' : '' }} later
                                @else
                                    {{ ceil($daysDiff / 30) }} month
                                    {{ ceil($daysDiff / 30) > 1 ? 's' : '' }} later
                                @endif
                                @endif
                            </span>
                        </div>
                        <h5 class="fw-bold mb-1">
                            <a href="{{ url('event-detail', $event->slug) }}"
                                class="text-decoration-none"
                                style="color:#0f766e;">
                                {{ $event->title }}
                            </a>
                        </h5>
                        <!--<p class="text-muted small mb-2">{{ $event->location }}</p>-->
                        <p class="text-muted small flex-grow-1">
                            {{ \Illuminate\Support\Str::words(strip_tags($event->description), 20) }}
                        </p>
                        <div class="main-view-btn">
                            <a href="{{ url('event-detail', $event->slug) }}" class="btn btn-outline-uni btn-sm px-3">
                                View details
                            </a>
                            @auth
                                @php
                                    $isAdmin  = auth()->user()->role === 'admin'; 
                                    $userRsvp = $event->rsvps->where('user_id', auth()->id())->first();
                                @endphp

                                @if($isAdmin)
                                    <a href="{{ url('admin/events/rsvp/'.$event->id) }}"
                                        class="btn btn-gradient text-decoration-none">
                                        <strong>{{ $event->rsvps->count() }}</strong> RSVP’s
                                    </a>
                                @else
                                    @if($userRsvp)
                                        <button class="btn btn-success btn-sm btn-gradient"
                                            onclick="openRsvpModal('{{ $event->title }}', {{ $event->id }}, 'cancel')">Cancel
                                        </button>
                                        @else
                                        <button class="btn btn-gradient"
                                            onclick="openRsvpModal('{{ $event->title }}', {{ $event->id }}, 'confirm')">RSVP
                                        </button>
                                    @endif
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-gradient">RSVP</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
                {{--Pagination --}}
                <div class="mt-3">
                    {{ $all_events->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
<!--RSVP Modal-->
<x-rsvp-event-modal />
@endsection