@extends('layouts.customer-frontend')
@section('title', 'Application Submitted | Club Unitee')

@section('content')

<section class="py-5">
    <div class="container" style="max-width:720px;">

        <div class="card-uni p-5 text-center">

            <!-- Success Icon -->
            <div class="mb-4">
                <div style="
                    width:90px;
                    height:90px;
                    margin:0 auto;
                    border-radius:50%;
                    background:#e6f6f1;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                ">
                    <svg width="42" height="42" fill="#1f7a5c" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.97 11.03a.75.75 0 0 0 1.08.02l3.992-4.99a.75.75 0 1 0-1.14-.976L7.5 9.417 5.97 7.97a.75.75 0 1 0-1.06 1.06l2.06 2z"/>
                    </svg>
                </div>
            </div>

            <!-- Heading -->
            <h2 class="fw-bold mb-3">
                Thank You for Your Interest in Club Unitee
            </h2>

            <!-- Message -->
            <p class="text-muted mb-4" style="font-size:16px; line-height:1.7;">
                We’ve successfully received your application.  
                Our team is currently reviewing your details, and we’ll be in touch with you shortly
                regarding the next steps.
            </p>

            <!-- What Happens Next -->
            <div class="text-start mx-auto mb-4" style="max-width:520px;">
                <h6 class="fw-semibold mb-2">What happens next?</h6>
                <ul class="text-muted" style="padding-left:18px; line-height:1.7;">
                    <li>Your application will be reviewed by our team</li>
                    <li>You may be contacted for additional information</li>
                    <li>Once approved, you’ll receive access details via email</li>
                </ul>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                <a href="{{ url('/') }}" class="btn btn-outline-uni-1 px-4">
                    Back to Home
                </a>
                <a href="{{ route('login') }}" class="btn-uni px-4">
                    Go to Login
                </a>
            </div>

            <!-- Support -->
            <p class="small text-muted mt-4">
                Questions? Reach us at 
                <a href="mailto:support@clubunitee.com">support@clubunitee.com</a>
            </p>

        </div>

    </div>
</section>




















@endsection