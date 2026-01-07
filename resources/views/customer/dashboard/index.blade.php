@extends('layouts.customer-dashboard')
@section('content')
<!--MAIN CONTENT-->
<div class="main-content">
    <!--TOP NAVBAR-->
    <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
        <h4 class="m-0 fw-bold text-uni">Dashboard</h4>
        <x-customer-dashboard-nav-profile />
    </nav>
    <!--HEADER-->
    <section class="page-header text-center py-3">
        <div class="container">
            <h1 class="page-title">Welcome back!</h1>
            <p class="page-subtitle">Here’s your activity overview.</p>
        </div>
    </section>
    <!--DASHBOARD CONTENT-->
    <section class="pb-5">
        <div class="container">
            <!--Quick Action Buttons-->
            <!--<div class="row mb-4 g-3">
                    <div class="col-md-4">
                        <button class="btn btn-gradient w-100 p-3 fw-semibold">Browse Members</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-gradient w-100 p-3 fw-semibold">View My Profile</button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-gradient w-100 p-3 fw-semibold">Upcoming Events</button>
                    </div>
                </div> -->
            <!--Stats Cards-->
            <div class="row g-4 mb-5">
                <div class="col-md-3">
                    <div class="card card-uni p-3 text-center">
                        <h3 class="fw-bold stat-number">{{ $totalConnections }}</h3>
                        <p class="stat-label">Connections</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-uni p-3 text-center">
                        <h3 class="fw-bold stat-number">{{ $pendingRequests }}</h3>
                        <p class="stat-label">Pending Requests</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-uni p-3 text-center">
                        <h3 class="fw-bold stat-number">{{ $allEvents }}</h3>
                        <p class="stat-label">Upcoming Events</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-uni p-3 text-center">
                        <h3 class="fw-bold stat-number">{{ $monthConnections }}</h3>
                        <p class="stat-label">New Members (This Month)</p>
                    </div>
                </div>
            </div>
            <!--UPCOMING EVENTS-->
            <h3 class="section-title-uni mt-5">Upcoming Events</h3>
            <div class="row g-4 mt-1">
                <!--Check if evnets exists or not-->
                @if ($upcomingEvents->count() > 0)
                <!--Get events-->
                @foreach($upcomingEvents as $event)
                <div class="col-md-4">
                    <div class="card card-uni p-3">
                         @if($event->rsvps->where('user_id', auth()->id())->first())
                            <div class="going-ribbon-01">
                                 You're Going
                            </div>
                        @endif
                        @if($event->image)
                            <a href="{{ url('event-detail/' . $event->slug) }}">
                                <img src="{{ asset('assets/admin/uploads/events/' . $event->image) }}" class="event-img-sm mb-3" alt="{{ $event->title }}">
                            </a>
                        @else
                            <div class="event-img-sm mb-3 d-flex align-items-center justify-content-center no-image">No Image Found</div>
                        @endif
                        <h5 class="fw-bold">{{ $event->title }}</h5>
                        @php
                            $eventDate = \Carbon\Carbon::parse($event->date);
                            $daysDiff = now()->diffInDays($eventDate);
                        @endphp
                        <p class="text-muted small mb-1">
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
                        </p>
                        <div class="main-view-btn">
                            <a href="{{ url('event-detail/' . $event->slug) }}" class="btn btn-gradient w-100 mt-auto">
                                View Details
                            </a>
                            @if($event->rsvps->count())
                                <button class="btn btn-success btn-sm btn-gradient"
                                    onclick="openRsvpModal('{{ $event->title }}', {{ $event->id }}, 'cancel')">Cancel
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
            </div>
            <!--Activity Feed -->
            <!--<div class="card card-uni p-4 mt-4">
                <h4 class="fw-bold mb-3">Recent Activity</h4>
                <p class="empty-text">No recent activity. Start by browsing members!</p>
            </div>-->
        </div>
    </section>
</div>
<!--RSVP Modal-->
<x-rsvp-event-modal />
@endsection