@extends('layouts.Auth')
@section('title', 'Register | Club UniTee')

@section('content')
    <!-- HEADER SECTION -->
    <section class="py-5 text-center header-gradient">
        <div class="container">
            <h1 class="fw-bold" style="color:var(--gray-800);">Welcome Back</h1>
            <p class="lead" style="color:var(--gray-600);">Login to access your dashboard.</p>
        </div>
    </section>
    <!-- APPLICATION FORM -->
    <section class="pb-5">
        <div class="container" style="max-width:650px;">
            <div class="card-uni">

                <!-- Alignment Box -->
                <!-- <div class="p-4 rounded mb-4" style="background:var(--emerald-50); border-left:5px solid var(--emerald);">
                                <p class="mb-2" style="color:var(--gray-700);">
                                    You foster a spirit of kindness, empathy, and sincere openness toward people of diverse
                                    experiences and backgrounds.
                                </p>


                            </div> -->

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- STEP 1 -->
                    <div class="step" id="step1">

                        <!-- Name -->
                        <div class="mb-3">
                            <label class="fw-medium">Full Name *</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" placeholder="Your full name" required>

                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="fw-medium">Email Address *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" placeholder="your.email@example.com" required>

                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Profession -->
                        <div class="mb-3">
                            <label class="fw-medium">Current Profession / Title *</label>
                            <input type="text" name="profession"
                                class="form-control @error('profession') is-invalid @enderror"
                                value="{{ old('profession') }}" placeholder="Program Director, Professor, etc." required>

                            @error('profession')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Organization -->
                        <div class="mb-3">
                            <label class="fw-medium">Organization</label>
                            <input type="text" name="organization" class="form-control" value="{{ old('organization') }}"
                                placeholder="Your organization">

                            @error('organization')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Bio -->
                        <div class="mb-3">
                            <label class="fw-medium">Tell us about yourself *</label>
                            <textarea name="bio" class="form-control @error('bio') is-invalid @enderror"
                                placeholder="Share something..." required>{{ old('bio') }}</textarea>

                            @error('bio')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Referral -->
                        <div class="mb-3">
                            <label class="fw-medium">How did you hear about us?</label>
                            <select name="referral_source" class="form-select">
                                <option value="">Select one</option>
                                <option {{ old('referral_source') == 'Friend / Colleague' ? 'selected' : '' }}>Friend /
                                    Colleague</option>
                                <option {{ old('referral_source') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                                <option {{ old('referral_source') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                                <option {{ old('referral_source') == 'Google Search' ? 'selected' : '' }}>Google Search
                                </option>
                                <option {{ old('referral_source') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>

                            @error('referral_source')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- LinkedIn -->
                        <div class="mb-3">
                            <label class="fw-medium">LinkedIn Profile URL</label>
                            <input type="url" name="linkedin_url" class="form-control"
                                value="{{ old('linkedin_url') }}" placeholder="https://linkedin.com/in/yourname">

                            @error('linkedin_url')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Instagram -->
                        <div class="mb-3">
                            <label class="fw-medium">Instagram Handle</label>
                            <input type="text" name="instagram_handle" class="form-control"
                                value="{{ old('instagram_handle') }}" placeholder="@yourname">

                            @error('instagram_handle')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- NEXT Button -->
                        <button type="button" class="btn-uni w-100" id="nextBtn">Next</button>

                    </div>

                    <!-- STEP 2 -->
                    <div class="step" id="step2" style="display:none;">
                        <div class="main-golf-info">

                            <h4 class="fw-bold section-title-uni mb-3">Golf Information</h4>

                            <div class="row g-3 mb-4">

                                <!-- Skill Level -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Skill Level*</label>
                                    <select class="form-select input-uni @error('skill_level') is-invalid @enderror"
                                        name="skill_level" required>
                                        <option value="">Select</option>
                                        <option value="Beginner" {{ old('skill_level') == 'Beginner' ? 'selected' : '' }}>
                                            Beginner</option>
                                        <option value="Intermediate"
                                            {{ old('skill_level') == 'Intermediate' ? 'selected' : '' }}>Intermediate
                                        </option>
                                        <option value="Advanced" {{ old('skill_level') == 'Advanced' ? 'selected' : '' }}>
                                            Advanced</option>
                                    </select>

                                    @error('skill_level')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Fitness Level -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Fitness Level*</label>
                                    <select class="form-select input-uni @error('fitness_level') is-invalid @enderror"
                                        name="fitness_level" required>
                                        <option value="">Select</option>
                                        <option value="Low">Low</option>
                                        <option value="Medium">Medium</option>
                                        <option value="High">High</option>
                                    </select>

                                    @error('fitness_level')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Handicap -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Handicap</label>
                                    <input type="text" name="handicap" class="form-control input-uni"
                                        value="{{ old('handicap') }}">

                                    @error('handicap')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Course Play -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Course Play Preferences*</label>
                                    <select
                                        class="form-select input-uni @error('course_play_preference') is-invalid @enderror"
                                        name="course_play_preference" required>
                                        <option value="">Select</option>
                                        <option value="Walk">Walk</option>
                                        <option value="Cart">Cart</option>
                                        <option value="No Preference">No Preference</option>
                                    </select>

                                    @error('course_play_preference')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Top Facilities -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Top 3 Regular Golfing Facilities</label>
                                    <input type="text" name="top_facilities" class="form-control input-uni"
                                        value="{{ old('top_facilities') }}">
                                    @error('top_facilities')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Most Used Courses -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Most Used Courses</label>
                                    <input type="text" name="most_used_courses" class="form-control input-uni"
                                        value="{{ old('most_used_courses') }}">
                                    @error('most_used_courses')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <!-- AVAILABILITY -->
                            <h4 class="fw-bold section-title-uni mb-3">Availability & Connections</h4>

                            <div class="row g-3 mb-4">

                                <!-- Availability -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Availability*</label>

                                    @php
                                        $availabilityOptions = ['Weekday Mornings', 'Weekday Evenings', 'Weekends'];
                                    @endphp

                                    @foreach ($availabilityOptions as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="availability"
                                                value="{{ $opt }}"
                                                {{ old('availability') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('availability')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Looking For -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Looking For</label>

                                    @php
                                        $lookOptions = ['Golf Buddies', 'Networking', 'Friendship'];
                                    @endphp

                                    @foreach ($lookOptions as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="looking_for"
                                                value="{{ $opt }}"
                                                {{ old('looking_for') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('looking_for')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Preferred Connection -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Preferred Connection Methods*</label>

                                    @php
                                        $conn = ['Text / Cell', 'Email', 'LinkedIn', 'Instagram'];
                                    @endphp

                                    @foreach ($conn as $c)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="preferred_connection"
                                                value="{{ $c }}"
                                                {{ old('preferred_connection') == $c ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $c }}</label>
                                        </div>
                                    @endforeach

                                    @error('preferred_connection')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <!-- MATCHING PREFERENCES -->
                            <h4 class="fw-bold section-title-uni mb-3">Matching Preferences</h4>

                            <div class="row g-3 mb-4">

                                <!-- Play Style -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Play Style</label>

                                    @foreach (['Casual', 'Competitive'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="play_style"
                                                value="{{ $opt }}"
                                                {{ old('play_style') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('play_style')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Travel Radius -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Travel Radius*</label>

                                    @foreach (['Within 10 Miles', 'Within 25 Miles', 'Anywhere'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="travel_radius"
                                                value="{{ $opt }}"
                                                {{ old('travel_radius') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('travel_radius')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Handicap Preference -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Handicap Preference</label>

                                    @foreach (['Similar To Mine', 'Any Handicap'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="handicafe_prefernce"
                                                value="{{ $opt }}"
                                                {{ old('handicafe_prefernce') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('handicafe_prefernce')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Fitness Level Preference -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Fitness Level Preference</label>

                                    @foreach (['Low', 'Medium', 'High'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="fitness_level_prefernce"
                                                value="{{ $opt }}"
                                                {{ old('fitness_level_prefernce') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('fitness_level_prefernce')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Availability Preference -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Availability Preference</label>

                                    @foreach (['Weekday Mornings', 'Weekday Evenings', 'Weekends'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="availability_prefernce"
                                                value="{{ $opt }}"
                                                {{ old('availability_prefernce') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('availability_prefernce')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Looking For Preference -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Looking For Preference</label>

                                    @foreach (['Golf Buddies', 'Networking', 'Friendship'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="looking_for_prefernce"
                                                value="{{ $opt }}"
                                                {{ old('looking_for_prefernce') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('looking_for_prefernce')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Course Play Preference -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Course Play Preference</label>

                                    @foreach (['Walk', 'Cart', 'No Preference'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="course_play_prefernce"
                                                value="{{ $opt }}"
                                                {{ old('course_play_prefernce') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('course_play_prefernce')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Skill Level Preference -->
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Skill Level Preference</label>

                                    @foreach (['Beginner', 'Intermediate', 'Advanced'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="skill_level_prefernce"
                                                value="{{ $opt }}"
                                                {{ old('skill_level_prefernce') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('skill_level_prefernce')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Interests Preference -->
                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Interests Preference</label>

                                    @foreach (['Casual Rounds', 'Lessons', 'Social Play', 'Competitive'] as $opt)
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" name="intrest_prefrence"
                                                value="{{ $opt }}"
                                                {{ old('intrest_prefrence') == $opt ? 'checked' : '' }}>
                                            <label class="form-check-label">{{ $opt }}</label>
                                        </div>
                                    @endforeach

                                    @error('intrest_prefrence')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                            <!-- Agreement -->
                            <div class="form-check my-3">
                                <input type="checkbox" id="agreeCheck" class="form-check-input">
                                <label class="form-check-label">I agree that this describes me.</label>
                            </div>

                            <!-- Buttons -->
                            <button type="button" class="btn btn-light w-100 mb-2" id="backBtn">Back</button>
                            <button type="submit" id="submitBtn" class="btn-uni disabled-btn w-100">Submit
                                Application</button>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>


    <!-- STEP SCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const step1 = document.getElementById("step1");
            const step2 = document.getElementById("step2");
            const nextBtn = document.getElementById("nextBtn");
            const backBtn = document.getElementById("backBtn");
            const agree = document.getElementById("agreeCheck");

            // STEP 1 -> STEP 2 (NO AGREE CHECK)
            nextBtn.addEventListener("click", function() {

                // only validate required fields
                const requiredFields = step1.querySelectorAll("[required]");
                for (let field of requiredFields) {
                    if (!field.value.trim()) {
                        field.focus();
                        return;
                    }
                }

                // move to step 2 without agree validation
                step1.style.display = "none";
                step2.style.display = "block";
            });

            // STEP 2 -> STEP 1
            backBtn.addEventListener("click", function() {
                step2.style.display = "none";
                step1.style.display = "block";
            });

            // STEP 2 SUBMIT CHECK (AGREE ALERT HERE)
            document.querySelector("form").addEventListener("submit", function(e) {

                // ❗ Agree must be checked on step 2
                if (!agree.checked) {
                    e.preventDefault();
                    return;
                }

                // validate required fields in step 2
                const requiredStep2 = step2.querySelectorAll("[required]");
                for (let field of requiredStep2) {
                    if (!field.value.trim()) {
                        e.preventDefault();
                        alert("Please fill required fields in Step 2.");
                        field.focus();
                        return;
                    }
                }
            });

            //
            const check = document.getElementById('agreeCheck');
            const btn = document.getElementById('submitBtn');

            check.addEventListener('change', () => {
                btn.classList.toggle('disabled-btn', !check.checked);
            });

        });
    </script>

@endsection
