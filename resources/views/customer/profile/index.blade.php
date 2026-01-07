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
        <section class="page-header text-center py-3">
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
                            <div class="profile-photo-view">
                                <img
                                    src="{{ $user->profile_image 
                                            ?  asset('assets/customer/uploads/profile/' . $user->profile_image) 
                                            : asset('assets/customer/images/person-dummy.jpg') }}"
                                    class="rounded-circle"
                                    style="width:120px;height:120px;object-fit:cover;"
                                    alt="Profile Image">
                            </div>
                        </div>

                        <div class="col-md-9">
                            <h2 class="fw-bold mb-1">{{ $user->name }}</h2>

                            <p class="text-muted mb-1">
                                {{ $user->profession }}
                                @if ($user->organization)
                                    • {{ $user->organization }}
                                @endif
                            </p>

                            <span class="badge bg-success-subtle text-success fw-semibold">
                                {{ $user->golfProfile->skill_level ?? 'N/A' }}
                            </span>

                            <div class="d-flex flex-wrap gap-3 mt-3">
                                <a href="{{ route('customer.dashboard.profile.edit') }}" class="btn btn-gradient px-4">
                                    Edit Profile
                                </a>
                                {{-- <a href="{{ route('customer.dashboard.profile.delete.account') }}" class="btn btn-outline-uni px-4">Delete Account</a> --}}
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
                                {{ $user->bio ?? 'N/A' }}
                            </p>

                            <p class="small text-muted mb-1">
                                <strong>Why I Joined:</strong> {{ $user->referral_source ?? 'N/A' }}
                            </p>
                        </div>

                        <!-- CONTACT -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">Contact</h5>

                            <ul class="list-unstyled text-muted">
                                <li class="mb-2"><strong>Email:</strong> {{ $user->email }}</li>
                                <li class="mb-2"><strong>LinkedIn:</strong> {{ $user->linkedin_url ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Instagram:</strong> {{ $user->instagram_handle ?? 'N/A' }}</li>
                            </ul>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- GOLF DETAILS -->
                    <div class="row g-4">

                        <!-- GOLF INFO -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">Golf Information</h5>

                            <p class="small text-muted mb-1">
                                <strong>Skill Level:</strong> {{ $user->golfProfile->skill_level ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Fitness Level:</strong> {{ $user->golfProfile->fitness_level ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Handicap:</strong> {{ $user->golfProfile->handicap ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Course Play Preference:</strong>
                                {{ $user->golfProfile->course_play_preference ?? 'N/A' }}
                            </p>
                        </div>

                        <!-- AVAILABILITY & LOOKING FOR -->
                        <div class="col-md-6">
                            <h5 class="fw-bold mb-3 section-title-uni">Availability & Connections</h5>

                            <p class="small text-muted mb-1">
                                <strong>Availability:</strong>
                                {{ $user->useravailability->availability ?? 'N/A' }}
                            </p>

                            <p class="small text-muted mb-1">
                                <strong>Preferred Connection:</strong>
                                {{ $user->useravailability->preferred_connection ?? 'N/A' }}
                            </p>
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- MATCHING PREFERENCES -->
                    <h5 class="fw-bold mb-3 section-title-uni">Matching Preferences</h5>

                    <div class="row g-4">

                        <div class="col-md-6">
                            <p class="small text-muted mb-1">
                                <strong>Handicap Preference:</strong>
                                {{ $user->usermatchingPreference->handicafe_prefernce ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Fitness Level Preference:</strong>
                                {{ $user->usermatchingPreference->fitness_level_prefernce ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Availability Preference:</strong>
                                {{ $user->usermatchingPreference->availability_prefernce ?? 'N/A' }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <p class="small text-muted mb-1">
                                <strong>Looking For Preference:</strong>
                                {{ $user->usermatchingPreference->looking_for_prefernce ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Course Play Preference:</strong>
                                {{ $user->usermatchingPreference->course_play_prefernce ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Skill Level Preference:</strong>
                                {{ $user->usermatchingPreference->skill_level_prefernce ?? 'N/A' }}
                            </p>
                            <p class="small text-muted mb-1">
                                <strong>Interests Preference:</strong>
                                {{ $user->usermatchingPreference->intrest_prefrence ?? 'N/A' }}
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </section>
    </div>
@endsection
