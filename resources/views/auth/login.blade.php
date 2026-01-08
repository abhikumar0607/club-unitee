@extends('layouts.Auth')
@section('title', 'Login | Club UniTee')
@section('content')
<!--HEADER SECTION-->
<section class="py-4 text-center header-gradient">
    <!-- <div class="container">
        <h1 class="fw-bold" style="color:var(--gray-800);">Welcome Back</h1>
        <p class="lead" style="color:var(--gray-600);">Sign in to continue to your Club UniTee dashboard.</p>
    </div> -->
</section>
<!--LOGIN FORM-->
<section class="pb-5">
    <div class="container" style="max-width:460px;">
        <div class="card-uni">
            <a href="{{ url('/') }}" class="back-arrow">← Back</a>
            <h4 class="fw-bold text-center mb-4" style="color:var(--emerald);">
                Member Login
            </h4>
            {{--SHOW LOGIN ERROR--}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>{{ $errors->first() }}</strong>
            </div>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!--Email-->
                <div class="mb-3">
                    <label class="fw-medium mb-1">Email Address</label>
                    <input type="email" class="form-control" name="email" placeholder="your.email@example.com" value="{{ old('email') }}" required>
                </div>
                <!--Password-->
                <div class="mb-3">
                    <label class="fw-medium mb-1">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                </div>
                <!--Forgot Password-->
                <div class="text-end mb-3">
                <a href="{{ route('password.request') }}"
                    style="color:red; font-size:14px;">
                    Forgot Password?
                </a>
                </div>
                <!--Login Button-->
                <button type="submit" class="btn-uni w-100 mt-2">Login</button>
            </form>
            <!--SIGN UP LINK-->
            <div class="text-center mt-4">
                <p class="mb-0" style="font-size:14px;color:var(--gray-600);">
                    Don’t have an account?
                    <a href="{{ route('register') }}"
                        class="fw-semibold"
                        style="color:var(--emerald);">Sign up
                    </a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection