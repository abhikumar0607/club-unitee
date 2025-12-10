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
                <div class="p-4 rounded mb-4" style="background:var(--emerald-50); border-left:5px solid var(--emerald);">
                    <p class="mb-2" style="color:var(--gray-700);">
                        You foster a spirit of kindness, empathy, and sincere openness toward people of diverse
                        experiences and backgrounds.
                    </p>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="checkbox" id="agreeCheck">
                        <label class="form-check-label" for="agreeCheck" style="color:var(--gray-600);">
                            I agree that this describes me.
                        </label>
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

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
                            placeholder="Share your background, interests, and why you're excited to join..." required>{{ old('bio') }}</textarea>
                        <small class="text-muted">Minimum 30 characters</small>
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
                            <option {{ old('referral_source') == 'Google Search' ? 'selected' : '' }}>Google Search</option>
                            <option {{ old('referral_source') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>

                    <!-- LinkedIn -->
                    <div class="mb-3">
                        <label class="fw-medium">LinkedIn Profile URL</label>
                        <input type="url" name="linkedin_url" class="form-control" value="{{ old('linkedin_url') }}"
                            placeholder="https://linkedin.com/in/yourname">
                    </div>

                    <!-- Instagram -->
                    <div class="mb-3">
                        <label class="fw-medium">Instagram Handle</label>
                        <input type="text" name="instagram_handle" class="form-control"
                            value="{{ old('instagram_handle') }}" placeholder="@yourname">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn-uni w-100 disabled-btn" id="submitBtn">
                        Submit Application
                    </button>

                </form>

            </div>
        </div>
    </section>
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
