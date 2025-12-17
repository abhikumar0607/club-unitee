@extends('layouts.customer-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP NAVBAR -->
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
            <h4 class="m-0 fw-bold text-uni">Dashboard</h4>
            <x-customer-dashboard-nav-profile /> 
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-3">
            <div class="container">
                <h1 class="page-title">Welcome back!</h1>
                <p class="page-subtitle">Here’s your activity overview.</p>
            </div>
        </section>

        <!-- DASHBOARD CONTENT -->
        <section class="pb-5">
            <div class="container">

                <!-- Quick Action Buttons -->
                <!-- <div class="row mb-4 g-3">
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

                <!-- Stats Cards -->
                <div class="row g-4 mb-5">

                    <div class="col-md-3">
                        <div class="card card-uni p-3 text-center">
                            <h3 class="fw-bold stat-number">12</h3>
                            <p class="stat-label">Connections</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-3 text-center">
                            <h3 class="fw-bold stat-number">3</h3>
                            <p class="stat-label">Pending Requests</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-3 text-center">
                            <h3 class="fw-bold stat-number">2</h3>
                            <p class="stat-label">Upcoming Events</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-3 text-center">
                            <h3 class="fw-bold stat-number">5</h3>
                            <p class="stat-label">New Members</p>
                        </div>
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


                <!-- Activity Feed -->
                <!-- <div class="card card-uni p-4 mt-4">
                    <h4 class="fw-bold mb-3">Recent Activity</h4>
                    <p class="empty-text">No recent activity. Start by browsing members!</p>
                </div> -->

            </div>
        </section>

    </div>
    @endsection