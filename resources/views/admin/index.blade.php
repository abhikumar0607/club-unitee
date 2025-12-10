@extends('layouts.admin-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
            <x-admin-dashboard-nav-profile />
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-4">
            <div class="container">
                <h1 class="page-title">Admin Dashboard</h1>
                <p class="page-subtitle">Manage members, events, and applications.</p>
            </div>
        </section>

        <!-- ================== DASHBOARD CARDS ================== -->
        <section class="py-5">
            <div class="container">

                <div class="row g-4">

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h3 class="fw-bold stat-number">246</h3>
                            <p class="stat-label">Total Members</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h3 class="fw-bold stat-number">14</h3>
                            <p class="stat-label">Pending Applications</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h3 class="fw-bold stat-number">36</h3>
                            <p class="stat-label">Total Events</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h3 class="fw-bold stat-number">12</h3>
                            <p class="stat-label">New Members (This Month)</p>
                        </div>
                    </div>

                </div>

                <!-- QUICK ACTIONS -->
                <h3 class="section-title-uni mt-5">Quick Actions</h3>

                <div class="d-flex flex-wrap gap-3 mt-3">
                    <a href="admin-applications.html" class="btn btn-gradient px-4">Review Applications</a>
                    <a href="admin-events-create.html" class="btn btn-gradient px-4">Create Event</a>
                    <a href="admin-members.html" class="btn btn-gradient px-4">Manage Members</a>
                </div>

                <!-- RECENT ACTIVITY -->
                <h3 class="section-title-uni mt-5">Recent Activity</h3>

                <div class="card card-uni p-4 mt-3">

                    <div class="activity-item mb-3">
                        <p class="fw-semibold mb-1">New Application Submitted</p>
                        <p class="text-muted small">Priya Sharma applied 2 hours ago</p>
                    </div>

                    <div class="activity-item mb-3">
                        <p class="fw-semibold mb-1">Event Created</p>
                        <p class="text-muted small">“Coffee & Connections” added by Admin</p>
                    </div>

                    <div>
                        <p class="fw-semibold mb-1">New Member Joined</p>
                        <p class="text-muted small">Zara Chen joined yesterday</p>
                    </div>

                </div>

                <!-- UPCOMING EVENTS -->
                <h3 class="section-title-uni mt-5">Upcoming Events</h3>

                <div class="row g-4 mt-1">

                    <div class="col-md-4">
                        <div class="card card-uni p-3">
                            <div class="event-img-sm mb-3"></div>
                            <h5 class="fw-bold">Beginner Social Round</h5>
                            <p class="text-muted small mb-1">Saturday • 9 AM</p>
                            <a href="event-details.html" class="btn btn-outline-uni w-100 mt-2">View Details</a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-uni p-3">
                            <div class="event-img-sm mb-3"></div>
                            <h5 class="fw-bold">Coffee & Connection</h5>
                            <p class="text-muted small mb-1">Wednesday • 10 AM</p>
                            <a href="event-details.html" class="btn btn-outline-uni w-100 mt-2">View Details</a>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-uni p-3">
                            <div class="event-img-sm mb-3"></div>
                            <h5 class="fw-bold">Putting Workshop</h5>
                            <p class="text-muted small mb-1">2 weeks later</p>
                            <a href="event-details.html" class="btn btn-outline-uni w-100 mt-2">View Details</a>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
