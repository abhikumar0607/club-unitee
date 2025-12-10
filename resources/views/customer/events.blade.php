@extends('layouts.customer-frontend')

@section('content')
    <!-- MAIN CONTENT -->
    <section class="events-main py-5">
        <div class="container">


            <!-- HEADER ROW: TITLE + SORT -->
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 gap-2">
                <div>
                    <h5 class="fw-semibold text-uni mb-1 fs-2">All Events</h5>
                    <p class="text-muted small mb-0">Browse upcoming rounds, socials, and workshops.</p>
                </div>

            </div>


            <!-- FILTER CARD WITH TOGGLE -->
            <div class="card events-filter-card mb-4">
                <h4 class="btn-11">All Event</h4>
                <hr>
                <!-- Toggle button (collapsed by default) -->
                <div class="d-flex justify-content-between align-items-center">
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
                </div>

                <!-- Collapsible filter body -->
                <div class="collapse" id="eventsFilter">
                    <div class="filter-body pt-3">

                        <div class="row g-3 mb-3">

                            <!-- Search -->
                            <div class="col-md-4">
                                <label class="form-label filter-label">Search</label>
                                <input type="text" class="form-control input-uni" placeholder="Event name or location">
                            </div>

                            <!-- Date -->
                            <div class="col-md-4">
                                <label class="form-label filter-label">Date</label>
                                <input type="date" class="form-control input-uni">
                            </div>

                            <!-- Event Type -->
                            <div class="col-md-4">
                                <label class="form-label filter-label">Event Type</label>
                                <select class="form-select input-uni">
                                    <option value="">All types</option>
                                    <option>Golf Outing</option>
                                    <option>Social Event</option>
                                    <option>Workshop</option>
                                    <option>Tournament</option>
                                </select>
                            </div>

                            <!-- Skill Level -->
                            <div class="col-md-4">
                                <label class="form-label filter-label">Skill Level</label>
                                <select class="form-select input-uni">
                                    <option value="">Any level</option>
                                    <option>Beginner</option>
                                    <option>Intermediate</option>
                                    <option>Advanced</option>
                                </select>
                            </div>

                            <!-- Location -->
                            <div class="col-md-4">
                                <label class="form-label filter-label">Region / Course</label>
                                <input type="text" class="form-control input-uni" placeholder="e.g. LA, Torrey Pines...">
                            </div>

                            <!-- Capacity -->
                            <div class="col-md-4">
                                <label class="form-label filter-label">Availability</label>
                                <select class="form-select input-uni">
                                    <option value="">All</option>
                                    <option>Spots available</option>
                                    <option>Almost full</option>
                                    <option>Waitlist only</option>
                                </select>
                            </div>

                        </div>

                        <!-- Checkbox row (separate, not inside last field) -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showMyEvents">
                                    <label class="form-check-label filter-label" for="showMyEvents">
                                        Show only events I’m registered for
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex flex-wrap gap-2 justify-content-end">
                            <button class="btn btn-outline-uni px-4" type="button">Clear filters</button>
                            <button class="btn btn-gradient px-4" type="button">Apply filters</button>
                        </div>

                    </div>
                </div>

                <!-- EVENTS GRID -->
                <div class="row g-4">

                    <!-- EVENT CARD 1 -->
                    <div class="col-md-4">
                        <div class="card card-uni-11 event-card h-100 d-flex flex-column">
                            <div class="event-img mb-3"><img src="{{ asset('customer/images/A Women Golfer.jpg') }}" alt=""></div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge event-badge-green">Golf Outing</span>
                                <span class="event-date small text-muted">Sat • Feb 10 • 9:00 AM</span>
                            </div>

                            <h5 class="fw-bold mb-1">Beginner-Friendly Social Round</h5>
                            <p class="text-muted small mb-2">Torrey Pines Golf Course</p>
                            <p class="text-muted small flex-grow-1">
                                A relaxed, beginner-welcoming round focused on fun, friendship, and fresh air.
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <p class="small text-muted mb-0">12 of 20 spots filled</p>
                                <a href="event-details.html" class="btn btn-outline-uni btn-sm px-3">View details</a>
                            </div>
                        </div>
                    </div>

                    <!-- EVENT CARD 2 -->
                    <div class="col-md-4">
                        <div class="card card-uni-11 event-card h-100 d-flex flex-column">
                            <div class="event-img mb-3"><img src="{{ asset('customer/images/golf-1208900_1280.jpg') }}" alt=""></div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge event-badge-amber">Social Event</span>
                                <span class="event-date small text-muted">Wed • Feb 7 • 10:00 AM</span>
                            </div>

                            <h5 class="fw-bold mb-1">Coffee & Connection</h5>
                            <p class="text-muted small mb-2">Bluebird Café, Los Angeles</p>
                            <p class="text-muted small flex-grow-1">
                                A cozy coffee meetup to swap stories, share ideas, and meet new golf buddies.
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <p class="small text-muted mb-0">22 registered</p>
                                <a href="event-details.html" class="btn btn-outline-uni btn-sm px-3">View
                                    details</a>
                            </div>
                        </div>
                    </div>

                    <!-- EVENT CARD 3 -->
                    <div class="col-md-4">
                        <div class="card card-uni-11 event-card h-100 d-flex flex-column">
                            <div class="event-img mb-3"><img src="{{ asset('customer/images/golf-buddies.avif') }}" alt=""></div>

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge event-badge-blue">Workshop</span>
                                <span class="event-date small text-muted">Thu • Feb 22 • 5:00 PM</span>
                            </div>

                            <h5 class="fw-bold mb-1">Putting Basics Workshop</h5>
                            <p class="text-muted small mb-2">Westside Driving Range</p>
                            <p class="text-muted small flex-grow-1">
                                Build confidence on the greens with simple, beginner-friendly putting drills.
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <p class="small text-muted mb-0">14 registered</p>
                                <a href="event-details.html" class="btn btn-outline-uni btn-sm px-3">View details</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </section>
@endsection
