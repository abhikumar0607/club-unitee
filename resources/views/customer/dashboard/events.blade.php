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
        <section class="page-header text-center py-5">
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

                    <div class="row g-3">

                        <div class="col-md-4">
                            <select class="form-select input-uni">
                                <option value="">Event Type</option>
                                <option>Golf Outing</option>
                                <option>Social Event</option>
                                <option>Workshop</option>
                                <option>Tournament</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <select class="form-select input-uni">
                                <option value="">Skill Level</option>
                                <option>All</option>
                                <option>Beginner</option>
                                <option>Intermediate</option>
                                <option>Advanced</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <button class="btn btn-gradient w-100 fw-semibold">Clear Filters</button>
                        </div>

                    </div>

                </div>

            </div>
        </section>

        <!-- EVENTS LIST -->
        <section class="pb-5">
            <div class="container">

                <div class="row g-4">

                    <!-- EVENT CARD -->
                    <div class="col-md-4">
                        <div class="card card-uni p-3">
                            <div class="event-img mb-3"></div>

                            <h5 class="fw-bold">Beginner-Friendly Social Round</h5>
                            <p class="text-muted small mb-1">Next Saturday • 9:00 AM</p>
                            <p class="text-muted small mb-1">Torrey Pines Golf Course</p>

                            <span class="badge bg-success-subtle text-success fw-semibold mb-2">Beginners Welcome</span>

                            <p class="text-muted small">A relaxed round perfect for new golfers.</p>

                            <a href="event-details.html" class="btn btn-gradient w-100 mt-2">View Details</a>
                        </div>
                    </div>

                    <!-- EVENT CARD -->
                    <div class="col-md-4">
                        <div class="card card-uni p-3">
                            <div class="event-img mb-3"></div>

                            <h5 class="fw-bold">Coffee & Connection</h5>
                            <p class="text-muted small mb-1">Next Wednesday • 10:00 AM</p>
                            <p class="text-muted small mb-1">Local Coffee House</p>

                            <span class="badge bg-warning-subtle text-warning fw-semibold mb-2">Social Event</span>

                            <p class="text-muted small">Meet members over warm coffee.</p>

                            <a href="event-details.html" class="btn btn-gradient w-100 mt-2">View Details</a>
                        </div>
                    </div>

                    <!-- EVENT CARD -->
                    <div class="col-md-4">
                        <div class="card card-uni p-3">
                            <div class="event-img mb-3"></div>

                            <h5 class="fw-bold">Putting Basics Workshop</h5>
                            <p class="text-muted small mb-1">In 2 Weeks • 5:00 PM</p>
                            <p class="text-muted small mb-1">Driving Range</p>

                            <span class="badge bg-primary-subtle text-primary fw-semibold mb-2">Workshop</span>

                            <p class="text-muted small">Learn foundational putting skills with mentors.</p>

                            <a href="event-details.html" class="btn btn-gradient w-100 mt-2">View Details</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection