@extends('layouts.customer-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP NAVBAR -->
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
            <h4 class="m-0 fw-bold text-uni">Connections</h4>
            <x-customer-dashboard-nav-profile /> 
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-5">
            <div class="container">
                <h1 class="page-title">My Connections</h1>
                <p class="page-subtitle">Manage your network and connection requests.</p>
            </div>
        </section>

        <!-- TABS -->
        <section class="pb-3">
            <div class="container text-center main-color-11">
                <ul class="nav nav-pills justify-content-center connections-tabs">
                    <li class="nav-item">
                        <a class="nav-link1 active" data-bs-toggle="pill" href="#all">All Connections</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link1" data-bs-toggle="pill" href="#sent">Sent Requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link1" data-bs-toggle="pill" href="#received">Received Requests</a>
                    </li>
                </ul>
            </div>
        </section>

        <section class="pb-5">
            <div class="container">

                <div class="tab-content">

                    <!-- ALL CONNECTIONS -->
                    <div class="tab-pane fade show active" id="all">

                        <div class="row g-4 mt-3">

                            <!-- CONNECTION CARD -->
                            <div class="col-md-4">
                                <div class="card card-uni p-3 text-center">
                                    <div class="member-photo mb-3"></div>
                                    <h5 class="fw-bold">Maya Rodriguez</h5>
                                    <p class="text-muted mb-1">Director of Development</p>
                                    <p class="text-muted small">Connected 2 weeks ago</p>

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="view-member.html" class="btn btn-outline-uni w-50">View</a>
                                        <button class="btn btn-gradient w-50">Request Contact</button>
                                    </div>
                                </div>
                            </div>

                            <!-- CONNECTION CARD -->
                            <div class="col-md-4">
                                <div class="card card-uni p-3 text-center">
                                    <div class="member-photo mb-3"></div>
                                    <h5 class="fw-bold">Anika Patel</h5>
                                    <p class="text-muted mb-1">Executive Director</p>
                                    <p class="text-muted small">Connected 3 days ago</p>

                                    <div class="d-flex gap-2 mt-3">
                                        <a href="view-member.html" class="btn btn-outline-uni w-50">View</a>
                                        <button class="btn btn-gradient w-50">Request Contact</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- SENT REQUESTS -->
                    <div class="tab-pane fade" id="sent">

                        <div class="row g-4 mt-3">

                            <div class="col-md-4">
                                <div class="card card-uni p-3 text-center">
                                    <div class="member-photo mb-3"></div>
                                    <h5 class="fw-bold">Zara Chen</h5>
                                    <p class="text-muted small">Request sent on Jan 12</p>

                                    <button class="btn btn-outline-uni mt-2 w-100">Cancel Request</button>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- RECEIVED REQUESTS -->
                    <div class="tab-pane fade" id="received">

                        <div class="row g-4 mt-3">

                            <div class="col-md-4">
                                <div class="card card-uni p-3 text-center">
                                    <div class="member-photo mb-3"></div>
                                    <h5 class="fw-bold">Sophia Lee</h5>
                                    <p class="text-muted small mb-3">"Would love to connect!"</p>

                                    <div class="d-flex gap-2">
                                        <button class="btn btn-gradient w-50">Accept</button>
                                        <button class="btn btn-outline-uni w-50">Decline</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection