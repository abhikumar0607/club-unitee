@extends('layouts.Auth')
@section('title', 'Forgot Password | Club UniTee')
@section('content')
<!--HEADER SECTION-->
<section class="py-4 text-center header-gradient">
    <div class="container">
        <h1 class="fw-bold" style="color:var(--gray-800);">Forgot Password</h1>
        <p class="lead" style="color:var(--gray-600);">
            No worries, we’ll help you reset it.
        </p>
    </div>
</section>
<!--FORGOT PASSWORD FORM-->
<section class="pb-5">
    <div class="container" style="max-width:460px;">
        <div class="card-uni">
            <a href="{{ route('login') }}" class="back-arrow">← Back to Login</a>
            <h4 class="fw-bold text-center mb-4" style="color:var(--emerald);">
                Reset Password
            </h4>
            <!--INFO TEXT (CONTENT SAME AS DEFAULT)-->
            <div class="mb-4 text-sm" style="color:var(--gray-600); font-size:14px;">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
            <!--Session Status-->
            @if (session('status'))
            <div class="alert alert-success mb-3">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <!--Email Address-->
                <div class="mb-3">
                <label class="fw-medium mb-1">Email Address</label>
                <input type="email"
                    name="email"
                    class="form-control"
                    placeholder="your.email@example.com"
                    value="{{ old('email') }}"
                    required
                    autofocus>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <!--Submit Button-->
                <button type="submit" class="btn-uni w-100 mt-2">
                    Email Password Reset Link
                </button>
            </form>
        </div>
    </div>
</section>
@endsection