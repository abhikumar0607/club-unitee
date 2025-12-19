@extends('layouts.customer-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- TOP NAVBAR -->
        <nav class="top-navbar d-flex justify-content-between align-items-center px-4 shadow-sm">
            <h4 class="m-0 fw-bold text-uni">My Profile</h4>

            <x-customer-dashboard-nav-profile />
        </nav>

        <!-- PAGE HEADER -->
        <section class="page-header text-center py-3    ">
            <div class="container">
                <h1 class="page-title">Edit Your Profile</h1>
                <p class="page-subtitle">Update your details so the community knows you better.</p>
            </div>
        </section>

        <!-- FORM SECTION -->
        <section class="pb-5">
            <div class="container">
                <form method="POST" action="{{ route('customer.dashboard.profile.update') }}" class="card card-uni p-4" enctype="multipart/form-data">
                    @csrf
                    @method('Post')

                    <!-- PROFILE PHOTO -->
                    <h4 class="fw-bold section-title-uni mb-3">Profile Photo</h4>

                    <div class="row align-items-center mb-4">

                        <!-- CURRENT PHOTO -->
                        <div class="col-md-3 text-center">
                            <div class="profile-photo-view mb-2">
                                <img
                                    src="{{ $user->profile_image 
                                            ?  asset('assets/customer/uploads/profile/' . $user->profile_image) 
                                            : asset('assets/customer/images/person-dummy.jpg') }}"
                                    class="rounded-circle"
                                    style="width:120px;height:120px;object-fit:cover;"
                                    alt="Profile Image">
                            </div>
                            <small class="text-muted">Current Photo</small>
                        </div>

                        <!-- UPLOAD -->
                        <div class="col-md-9">
                            <label class="form-label fw-semibold">Upload New Photo</label>
                            <input type="file"
                                name="profile_image"
                                class="form-control input-uni @error('profile_image') is-invalid @enderror"
                                accept="image/*">

                            <small class="text-muted">
                                JPG, PNG allowed. Max size 2MB.
                            </small>

                            @error('profile_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <hr class="my-4">

                    <!-- BASIC INFO -->
                    <h4 class="fw-bold section-title-uni mb-3">Basic Information</h4>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Full Name*</label>
                            <input type="text" name="name"
                                class="form-control input-uni @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Email*</label>
                            <input type="email" class="form-control input-uni" value="{{ $user->email }}" disabled>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Profession*</label>
                            <input type="text" name="profession" class="form-control input-uni "
                                value="{{ old('profession', $user->profession) }}">
                            @error('profession')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Organization</label>
                            <input type="text" name="organization" class="form-control input-uni"
                                value="{{ old('organization', $user->organization) }}">
                        </div>
                    </div>

                    <!-- BIO -->
                    <h4 class="fw-bold section-title-uni mb-3">About You</h4>
                    <div class="mb-4">
                        <label class="form-label fw-semibold">Bio*</label>
                        <textarea name="bio" rows="4" class="form-control input-uni">{{ old('bio', $user->bio) }}</textarea>
                    </div>

                    <!-- SOCIAL LINKS -->
                    <h4 class="fw-bold section-title-uni mb-3">Social Links</h4>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">LinkedIn URL</label>
                            <input type="url" name="linkedin_url" class="form-control input-uni"
                                value="{{ old('linkedin_url', $user->linkedin_url) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Instagram Handle</label>
                            <input type="text" name="instagram_handle" class="form-control input-uni"
                                value="{{ old('instagram_handle', $user->instagram_handle) }}">
                        </div>
                    </div>

                    <!-- GOLF INFO -->
                    <h4 class="fw-bold section-title-uni mb-3">Golf Information</h4>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Skill Level*</label>
                            <select name="skill_level" class="form-select input-uni">
                                @foreach (['Beginner', 'Intermediate', 'Advanced'] as $opt)
                                    <option value="{{ $opt }}"
                                        {{ old('skill_level', $user->golfProfile->skill_level ?? '') == $opt ? 'selected' : '' }}>
                                        {{ $opt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Fitness Level*</label>
                            <select name="fitness_level" class="form-select input-uni">
                                @foreach (['Low', 'Medium', 'High'] as $opt)
                                    <option value="{{ $opt }}"
                                        {{ old('fitness_level', $user->golfProfile->fitness_level ?? '') == $opt ? 'selected' : '' }}>
                                        {{ $opt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Handicap</label>
                            <input type="text" name="handicap" class="form-control input-uni"
                                value="{{ old('handicap', $user->golfProfile->handicap ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Course Play Preference*</label>
                            <select name="course_play_preference" class="form-select input-uni">
                                @foreach (['Walk', 'Cart', 'No Preference'] as $opt)
                                    <option value="{{ $opt }}"
                                        {{ old('course_play_preference', $user->golfProfile->course_play_preference ?? '') == $opt ? 'selected' : '' }}>
                                        {{ $opt }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Top 3 Regular Golfing Facilities</label>
                            <input type="text" name="top_facilities" class="form-control input-uni"
                                value="{{ old('top_facilities', $user->golfProfile->top_facilities ?? '') }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Most Used Courses</label>
                            <input type="text" name="most_used_courses" class="form-control input-uni"
                                value="{{ old('most_used_courses', $user->golfProfile->most_used_courses ?? '') }}">
                        </div>
                    </div>

                    <!-- AVAILABILITY -->
                    <h4 class="fw-bold section-title-uni mb-3">Availability</h4>
                    <div class="row mb-4">
                        @foreach (['Weekday Mornings', 'Weekday Afternoons', 'Weekends', 'No Preference'] as $opt)
                            <div class="col-md-4 form-check">
                                <input type="radio" class="form-check-input" name="availability"
                                    value="{{ $opt }}"
                                    {{ old('availability', $user->useravailability->availability ?? '') == $opt ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $opt }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- LOOKING FOR -->
                    <h4 class="fw-bold section-title-uni mb-3">Looking For</h4>
                    <div class="row mb-4">
                        @foreach (['Golf Buddies', 'Networking', 'Friendship'] as $opt)
                            <div class="col-md-4 form-check">
                                <input type="radio" class="form-check-input" name="looking_for"
                                    value="{{ $opt }}"
                                    {{ old('looking_for', $user->useravailability->looking_for ?? '') == $opt ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $opt }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Preferred Connection -->
                    <h4 class="fw-bold section-title-uni mb-3">Preferred Connection</h4>
                       <div class="row mb-4">
                        @php
                            $conn = ['Text / Cell', 'Email', 'LinkedIn', 'Instagram'];
                        @endphp

                        @foreach ($conn as $c)
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="preferred_connection"
                                    value="{{ $c }}" {{ old('preferred_connection', $user->useravailability->preferred_connection ?? '') == $c ? 'checked' : '' }}>
                                <label class="form-check-label">{{ $c }}</label>
                            </div>
                        @endforeach

                        @error('preferred_connection')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- MATCHING PREFERENCES -->
                    <h4 class="fw-bold section-title-uni mb-3">Matching Preferences</h4>

                    @php $pref = $user->usermatchingPreference; @endphp

                    <div class="row g-3 mb-4">
                        <!-- Play Style -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Play Style</label>
                            @foreach (['Casual', 'Competitive'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="play_style" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('play_style', $pref->play_style ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Travel Radius -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Travel Radius*</label>
                            @foreach (['Within 10 Miles', 'Within 25 Miles', 'Anywhere'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="travel_radius" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('travel_radius', $pref->travel_radius ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Handicap Preference -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Handicap Preference</label>
                            @foreach (['Similar To Mine', 'Any Handicap'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="handicafe_prefernce" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('handicafe_prefernce', $pref->handicafe_prefernce ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Fitness Level Preference -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Fitness Level Preference</label>
                            @foreach (['Low', 'Medium', 'High'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="fitness_level_prefernce" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('fitness_level_prefernce', $pref->fitness_level_prefernce ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Availability Preference -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Availability Preference</label>
                            @foreach (['Weekday Mornings', 'Weekday Afternoons', 'Weekends', 'No Preference'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="availability_prefernce" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('availability_prefernce', $pref->availability_prefernce ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Looking For Preference -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Looking For Preference</label>
                            @foreach (['Golf Buddies', 'Networking', 'No Preference'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="looking_for_prefernce" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('looking_for_prefernce', $pref->looking_for_prefernce ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Course Play Preference -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Course Play Preference</label>
                            @foreach (['Walk', 'Cart', 'No Preference'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="course_play_prefernce" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('course_play_prefernce', $pref->course_play_prefernce ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Skill Level Preference -->
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Skill Level Preference</label>
                            @foreach (['Beginner', 'Intermediate', 'Advanced'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="skill_level_prefernce" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('skill_level_prefernce', $pref->skill_level_prefernce ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Interest Preference -->
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Interest Preference</label>
                            @foreach (['Casual Rounds', 'Lessons', 'Social Play', 'Competitive', 'Range Practice', 'No Preference'] as $opt)
                                <div class="form-check">
                                    <input type="radio" name="intrest_prefrence" class="form-check-input"
                                        value="{{ $opt }}"
                                        {{ old('intrest_prefrence', $pref->intrest_prefrence ?? '') == $opt ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $opt }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- SAVE -->
                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-gradient px-5">Save Changes</button>
                        <a href="{{ route('customer.dashboard') }}" class="btn btn-outline-uni px-5">Cancel</a>
                    </div>
                </form>



            </div>
        </section>
</div @endsection
