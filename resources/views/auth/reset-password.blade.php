@extends('layouts.Auth')
@section('title', 'Reset Password | Club UniTee')
@section('content')
<style>
.password-success{
    display: inline-block;  
    background: #d1fae5;
    color: #065f46;
    border: 1px solid #6ee7b7;
    padding: 10px 14px;
    border-radius: 8px;
    font-size: 14px;
    margin-top: 20px;         
}
.password-success.hide{
    opacity: 0;
    transition: opacity 0.5s ease;
    pointer-events: none;
}
.password-success strong{
    font-weight: 600;
}
.password-success a{
    margin-left: auto;
    color: #047857;
    font-weight: 600;
    text-decoration: underline;
}
.password-success a:hover{
    color: #065f46;
}
</style>
<!--HEADER SECTION-->
<section class="py-4 text-center header-gradient">
    <div class="container">
        <h1 class="fw-bold" style="color:var(--gray-800);">Reset Password</h1>
        <p class="lead" style="color:var(--gray-600);">
            Create a new password to secure your account.
        </p>
        @if(session('success'))
        <div class="password-success"  id="passwordSuccess">
            <span>{{ session('success') }}</span>
            <a href="{{ route('login') }}">Login</a>
        </div>
        @endif
    </div>
</section>
<!--RESET PASSWORD FORM-->
<section class="pb-5">
    <div class="container" style="max-width:460px;">
        <div class="card-uni">
            <a href="{{ route('login') }}" class="back-arrow">← Back to Login</a>
            <h4 class="fw-bold text-center mb-4" style="color:var(--emerald);">
                Set New Password
            </h4>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!--Password Reset Token-->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <!--Email-->
                <div class="mb-3">
                    <label class="fw-medium mb-1">Email Address</label>
                    <input type="email"
                        name="email"
                        class="form-control"
                        value="{{ old('email', $request->email) }}"
                        required
                        autofocus
                        autocomplete="username">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--New Password-->
                <div class="mb-3">
                    <label class="fw-medium mb-1">New Password</label>
                    <input type="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter new password"
                        required
                        autocomplete="new-password">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--Confirm Password-->
                <div class="mb-3">
                    <label class="fw-medium mb-1">Confirm Password</label>
                    <input type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Confirm new password"
                        required
                        autocomplete="new-password">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <!--Submit-->
                <button type="submit" class="btn-uni w-100 mt-2">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const msg = document.getElementById('passwordSuccess');
        if (msg) {
            setTimeout(() => {
                msg.classList.add('hide');
            }, 5000);
            setTimeout(() => {
                window.location.reload();
            }, 5500);
        }
    });
</script>
@endsection