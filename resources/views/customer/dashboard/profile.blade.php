@extends('layouts.customer-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP NAVBAR -->
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
            <h4 class="m-0 fw-bold text-uni">My Profile</h4>

            <x-customer-dashboard-nav-profile />
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-5">
            <div class="container">
                <h1 class="page-title">My Profile</h1>
                <p class="page-subtitle">This is how others see your profile.</p>
            </div>
        </section>

        <!-- PROFILE CONTENT -->
        <section class="pb-5">
            <div class="container">

                <div class="card card-uni p-4">

                    <!-- TOP HEADER -->
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center mb-4 mb-md-0">
                            <div class="profile-photo-view"><img src="{{  asset('customer/images/hat woman golf (1).jpg') }}" alt="">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <h2 class="fw-bold mb-1">Priya Sharma</h2>
                            <p class="text-muted mb-1">Program Manager • Education Nonprofit</p>

                            <span class="badge bg-success-subtle text-success fw-semibold">Beginner</span>

                            <div class="d-flex flex-wrap gap-3 mt-3">
                                <a href="profile-edit.html" class="btn btn-gradient px-4">Edit Profile</a>
                                <a href="#" class="btn btn-outline-uni px-4">Delete Account</a>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <!-- ABOUT + CONTACT -->
                    <div class="row g-4">

                        <!-- ABOUT ME -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">About Me</h5>

                            <p class="text-muted">
                                New to LA and golf. Working in the education nonprofit sector and excited to connect
                                with mission-driven women.
                            </p>

                            <p class="small text-muted mb-1"><strong>Why I Joined:</strong> To meet like-minded women.
                            </p>
                            <p class="small text-muted mb-1"><strong>Favorite Quote:</strong> “Lift as you climb.”</p>
                        </div>

                        <!-- CONTACT -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">Contact</h5>

                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><strong>Email:</strong> priya@example.com</li>
                                <li class="mb-2"><strong>LinkedIn:</strong> linkedin.com/in/priya</li>
                                <li class="mb-2"><strong>Instagram:</strong> @priya_sharma</li>
                            </ul>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- GOLF DETAILS -->
                    <div class="row g-4">

                        <!-- GOLF INFO -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">Golf Information</h5>

                            <p class="small text-muted mb-1"><strong>Skill Level:</strong> Beginner</p>
                            <p class="small text-muted mb-1"><strong>Fitness Level:</strong> Medium</p>
                            <p class="small text-muted mb-1"><strong>Handicap:</strong> I don’t have one</p>
                            <p class="small text-muted mb-1"><strong>Course Play Preference:</strong> Walk</p>
                            <p class="small text-muted mb-1"><strong>Top 3 Facilities:</strong> Rancho Park, Griffith
                                Park, Brookside</p>
                            <p class="small text-muted mb-1"><strong>Most Used Courses:</strong> Griffith Park, Rancho
                                Park</p>
                        </div>

                        <!-- AVAILABILITY & LOOKING FOR -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">Availability & Connections</h5>

                            <p class="small text-muted mb-1"><strong>Availability:</strong> Weekday Mornings, Weekends
                            </p>
                            <p class="small text-muted mb-1"><strong>Looking For:</strong> Golf Buddies, Networking,
                                Friendship</p>
                            <p class="small text-muted mb-1"><strong>Preferred Connection Methods:</strong> Text/Cell,
                                Email, LinkedIn</p>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- MATCHING PREFERENCES (OPTION C: SEPARATE SECTIONS) -->
                    <h5 class="fw-bold mb-3 section-title-uni">Matching Preferences</h5>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <p class="small text-muted mb-1"><strong>Handicap Preference:</strong> Similar to mine</p>
                            <p class="small text-muted mb-1"><strong>Fitness Level Preference:</strong> Medium</p>
                            <p class="small text-muted mb-1"><strong>Availability Preference:</strong> Weekday Mornings
                            </p>
                        </div>

                        <div class="col-md-6">
                            <p class="small text-muted mb-1"><strong>Looking For Preference:</strong> Golf Buddies</p>
                            <p class="small text-muted mb-1"><strong>Course Play Preference:</strong> Walk</p>
                            <p class="small text-muted mb-1"><strong>Skill Level Preference:</strong> Intermediate</p>
                            <p class="small text-muted mb-1"><strong>Interests Preference:</strong> Lessons, Social Play
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
