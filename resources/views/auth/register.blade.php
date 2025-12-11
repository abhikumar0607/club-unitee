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
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Your full name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="fw-medium">Email Address *</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                            placeholder="your.email@example.com" required>
                    </div>

                    <!-- Title -->
                    <div class="mb-3">
                        <label class="fw-medium">Current Profession / Title *</label>
                        <input type="text" name="profession" class="form-control" value="{{ old('profession') }}"
                            placeholder="Program Director, Professor, etc." required>
                    </div>

                    <!-- Organization -->
                    <div class="mb-3">
                        <label class="fw-medium">Organization</label>
                        <input type="text" name="organization" class="form-control" value="{{ old('organization') }}"
                            placeholder="Your organization">
                    </div>

                    <!-- Bio -->
                    <div class="mb-3">
                        <label class="fw-medium">Tell us about yourself *</label>
                        <textarea name="bio" class="form-control" rows="5" minlength="30"
                            placeholder="Share your background, interests, and why you're excited to join..."
                            required>{{ old('bio') }}</textarea>
                        <small class="text-muted">Minimum 30 characters</small>
                    </div>

                    <!-- Referral -->
                    <div class="mb-3"> <label class="fw-medium">How did you hear about us?</label> <select
                            name="referral_source" class="form-select">
                            <option value="">Select one</option>
                            <option {{ old('referral_source') == 'Friend / Colleague' ? 'selected' : '' }}>Friend /
                                Colleague</option>
                            <option {{ old('referral_source') == 'LinkedIn' ? 'selected' : '' }}>LinkedIn</option>
                            <option {{ old('referral_source') == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                            <option {{ old('referral_source') == 'Google Search' ? 'selected' : '' }}>Google Search
                            </option>
                            <option {{ old('referral_source') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select> </div> <!-- LinkedIn -->
                    <div class="mb-3"> <label class="fw-medium">LinkedIn Profile URL</label> <input type="url"
                            name="linkedin_url" class="form-control" value="{{ old('linkedin_url') }}"
                            placeholder="https://linkedin.com/in/yourname"> </div> <!-- Instagram -->
                    <div class="mb-3"> <label class="fw-medium">Instagram Handle</label> <input type="text"
                            name="instagram_handle" class="form-control" value="{{ old('instagram_handle') }}"
                            placeholder="@yourname"> </div>

                    <!-- NEXT Button -->
                    <button type="button" class="btn-uni w-100" id="nextBtn">Next</button>

                </div>


                <!-- STEP 2 -->
                <div class="step" id="step2" style="display:none;">

                    <div class="main-golf-info">

                        <h4 class="fw-bold section-title-uni mb-3">Golf Information</h4>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Skill Level*</label>
                                <select class="form-select input-uni" id="skillLevel" required>
                                    <option value="">Select</option>
                                    <option>Beginner</option>
                                    <option>Intermediate</option>
                                    <option>Advanced</option>
                                </select>
                                <div class="invalid-feedback">Skill level required</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Fitness Level*</label>
                                <select class="form-select input-uni" id="fitnessLevel" required>
                                    <option value="">Select</option>
                                    <option>Low</option>
                                    <option>Medium</option>
                                    <option>High</option>
                                </select>
                                <div class="invalid-feedback">Fitness level required</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Handicap</label>
                                <input type="text" class="form-control input-uni" id="handicap">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Course Play Preferences</label>
                                <select class="form-select input-uni" id="coursePlayPref" required>
                                    <option value="">Select</option>
                                    <option>Walk</option>
                                    <option>Cart</option>
                                    <option>No Preference</option>
                                </select>
                                <div class="invalid-feedback">Choose one option</div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Top 3 Regular Golfing Facilities</label>
                                <input type="text" class="form-control input-uni" id="topFacilities">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Most Used Courses</label>
                                <input type="text" class="form-control input-uni" id="mostUsedCourses">
                            </div>
                        </div>

                        <!-- AVAILABILITY -->
                        <h4 class="fw-bold section-title-uni mb-3">Availability & Connections</h4>

                        <div class="row g-3 mb-4">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Availability*</label>

                                <div class="form-check">
                                    <input class="form-check-input avail" type="checkbox" id="avail1">
                                    <label class="form-check-label">Weekday Mornings</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input avail" type="checkbox" id="avail2">
                                    <label class="form-check-label">Weekday Evenings</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input avail" type="checkbox" id="avail3">
                                    <label class="form-check-label">Weekends</label>
                                </div>

                                <p class="error-text" id="availError">Select at least one</p>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Looking For</label>

                                <div class="form-check">
                                    <input class="form-check-input lookfor" type="checkbox" id="lookfor1">
                                    <label class="form-check-label">Golf Buddies</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input lookfor" type="checkbox" id="lookfor2">
                                    <label class="form-check-label">Networking</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input lookfor" type="checkbox" id="lookfor3">
                                    <label class="form-check-label">Friendship</label>
                                </div>

                                <p class="error-text" id="lookingError">Select at least one</p>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Preferred Connection Methods</label>

                                <div class="form-check">
                                    <input class="form-check-input pcm" type="checkbox" id="pcm1">
                                    <label class="form-check-label">Text / Cell</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input pcm" type="checkbox" id="pcm2">
                                    <label class="form-check-label">Email</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input pcm" type="checkbox" id="pcm3">
                                    <label class="form-check-label">LinkedIn</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input pcm" type="checkbox" id="pcm4">
                                    <label class="form-check-label">Instagram</label>
                                </div>

                                <p class="error-text" id="pcmError">Select at least one</p>
                            </div>
                        </div>

                        <!-- MATCHING PREFERENCES -->
                        <h4 class="fw-bold section-title-uni mb-3">Matching Preferences</h4>
                        <div class="row g-3 mb-4">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Play Style</label>

                                <div class="form-check">
                                    <input class="form-check-input playstyle" type="checkbox" id="play1">
                                    <label class="form-check-label">Casual</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input playstyle" type="checkbox" id="play2">
                                    <label class="form-check-label">Competitive</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Travel Radius*</label>

                                <div class="form-check">
                                    <input class="form-check-input radius" type="radio" name="radius" id="rad1">
                                    <label class="form-check-label">Within 10 Miles</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input radius" type="radio" name="radius" id="rad2">
                                    <label class="form-check-label">Within 25 Miles</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input radius" type="radio" name="radius" id="rad3">
                                    <label class="form-check-label">Anywhere</label>
                                </div>

                                <p class="error-text" id="radiusError">Please select a radius</p>
                            </div>

                            <!-- Handicap Preference -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Handicap Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input handicap-pref" type="checkbox" id="hp1">
                                    <label class="form-check-label">Similar to mine</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input handicap-pref" type="checkbox" id="hp2">
                                    <label class="form-check-label">Any Handicap</label>
                                </div>
                            </div>

                            <!-- Fitness Level Preference -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Fitness Level Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input fitness-pref" type="checkbox" id="fp1">
                                    <label class="form-check-label">Low</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input fitness-pref" type="checkbox" id="fp2">
                                    <label class="form-check-label">Medium</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input fitness-pref" type="checkbox" id="fp3">
                                    <label class="form-check-label">High</label>
                                </div>
                            </div>

                            <!-- Availability Preference -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Availability Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input avail-pref" type="checkbox" id="ap1">
                                    <label class="form-check-label">Weekday Mornings</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input avail-pref" type="checkbox" id="ap2">
                                    <label class="form-check-label">Weekday Evenings</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input avail-pref" type="checkbox" id="ap3">
                                    <label class="form-check-label">Weekends</label>
                                </div>
                            </div>

                            <!-- Looking For Preference -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Looking For Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input lookpref" type="checkbox" id="lp1">
                                    <label class="form-check-label">Golf Buddies</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input lookpref" type="checkbox" id="lp2">
                                    <label class="form-check-label">Networking</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input lookpref" type="checkbox" id="lp3">
                                    <label class="form-check-label">Friendship</label>
                                </div>
                            </div>

                            <!-- Course Play Preference -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Course Play Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input coursepref" type="checkbox" id="cp1">
                                    <label class="form-check-label">Walk</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input coursepref" type="checkbox" id="cp2">
                                    <label class="form-check-label">Cart</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input coursepref" type="checkbox" id="cp3">
                                    <label class="form-check-label">No Preference</label>
                                </div>
                            </div>

                            <!-- Skill Level Preference -->
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Skill Level Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input skillpref" type="checkbox" id="sp1">
                                    <label class="form-check-label">Beginner</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input skillpref" type="checkbox" id="sp2">
                                    <label class="form-check-label">Intermediate</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input skillpref" type="checkbox" id="sp3">
                                    <label class="form-check-label">Advanced</label>
                                </div>
                            </div>

                            <!-- Interests Preference -->
                            <div class="col-md-12">
                                <label class="form-label fw-semibold">Interests Preference</label>

                                <div class="form-check">
                                    <input class="form-check-input interestpref" type="checkbox" id="ip1">
                                    <label class="form-check-label">Casual Rounds</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input interestpref" type="checkbox" id="ip2">
                                    <label class="form-check-label">Lessons</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input interestpref" type="checkbox" id="ip3">
                                    <label class="form-check-label">Social Play</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input interestpref" type="checkbox" id="ip4">
                                    <label class="form-check-label">Competitive</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="agreeCheck">
                            <label class="form-check-label" for="agreeCheck" style="color:var(--gray-600);">
                                I agree that this describes me.
                            </label>
                        </div>

                        <!-- BACK Button -->
                        <button type="button" class="btn btn-light w-100 mb-2" id="backBtn">
                            Back
                        </button>

                        <!-- SUBMIT Button -->
                        <button type="submit" class="btn-uni w-100">
                            Submit Application
                        </button>

                    </div>

            </form>

        </div>
    </div>
</section>


<!-- STEP SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const step1 = document.getElementById("step1");
    const step2 = document.getElementById("step2");
    const nextBtn = document.getElementById("nextBtn");
    const backBtn = document.getElementById("backBtn");
    const agree = document.getElementById("agreeCheck");

    // STEP 1 -> STEP 2 (NO AGREE CHECK)
    nextBtn.addEventListener("click", function () {

        // only validate required fields
        const requiredFields = step1.querySelectorAll("[required]");
        for (let field of requiredFields) {
            if (!field.value.trim()) {
                alert("Please fill all required fields.");
                field.focus();
                return;
            }
        }

        // move to step 2 without agree validation
        step1.style.display = "none";
        step2.style.display = "block";
    });

    // STEP 2 -> STEP 1
    backBtn.addEventListener("click", function () {
        step2.style.display = "none";
        step1.style.display = "block";
    });

    // STEP 2 SUBMIT CHECK (AGREE ALERT HERE)
    document.querySelector("form").addEventListener("submit", function (e) {

        // ❗ Agree must be checked on step 2
        if (!agree.checked) {
            e.preventDefault();
            alert("Please agree to continue.");
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

});
</script>





<script>
// Enable Submit After Agreement
const check = document.getElementById('agreeCheck');
const btn = document.getElementById('submitBtn');

check.addEventListener('change', () => {
    if (check.checked) {
        btn.classList.remove('disabled-btn');
    } else {
        btn.classList.add('disabled-btn');
    }
});
</script>
@endsection