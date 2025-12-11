@extends('layouts.admin-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
            <x-admin-dashboard-nav-profile />
        </nav>

        <!-- PAGE HEADER -->
        <section class="page-header text-center py-5">
            <div class="container">
                <h1 class="page-title">Analytics & Insights</h1>
                <p class="page-subtitle">Track member growth, engagement, and event statistics.</p>
            </div>
        </section>

        <!-- ================== ANALYTICS CONTENT ================== -->
        <section class="py-5">
            <div class="container">

                <!-- TOP STATS CARDS -->
                <div class="row g-4 mb-4">

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h5 class="fw-bold text-uni">Total Members</h5>
                            <p class="stat-number">248</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h5 class="fw-bold text-uni">Active Members</h5>
                            <p class="stat-number">192</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h5 class="fw-bold text-uni">Total Events</h5>
                            <p class="stat-number">34</p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-uni p-4 text-center">
                            <h5 class="fw-bold text-uni">Avg RSVP Rate</h5>
                            <p class="stat-number">61%</p>
                        </div>
                    </div>

                </div>

                <!-- CHART SECTIONS -->
                <div class="row g-4">

                    <!-- MEMBER GROWTH -->
                    <div class="col-md-6">
                        <div class="card card-uni p-4 chart-box">
                            <h5 class="fw-bold text-uni mb-3">Member Growth Over Time</h5>
                            <div class="chart-placeholder">Chart Placeholder</div>
                        </div>
                    </div>

                    <!-- EVENT ATTENDANCE -->
                    <div class="col-md-6">
                        <div class="card card-uni p-4 chart-box">
                            <h5 class="fw-bold text-uni mb-3">Event Attendance Trends</h5>
                            <div class="chart-placeholder">Chart Placeholder</div>
                        </div>
                    </div>

                    <!-- POPULAR EVENT TYPES -->
                    <div class="col-md-6">
                        <div class="card card-uni p-4 chart-box">
                            <h5 class="fw-bold text-uni mb-3">Most Popular Event Types</h5>
                            <div class="chart-placeholder">Chart Placeholder</div>
                        </div>
                    </div>

                    <!-- DEMOGRAPHICS -->
                    <div class="col-md-6">
                        <div class="card card-uni p-4 chart-box">
                            <h5 class="fw-bold text-uni mb-3">Member Demographics</h5>
                            <div class="chart-placeholder">Chart Placeholder</div>
                        </div>
                    </div>

                </div>

                <!-- EXPORT BUTTON -->
                <div class="text-end mt-4">
                    <a href="#" class="btn btn-gradient px-4">Export Data</a>
                </div>

            </div>
        </section>
    </div>
@endsection
