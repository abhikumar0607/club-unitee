<!DOCTYPE html>
<html lang="en">
<x-meta-tags />

<body style="background: var(--gradient-background);">
    <!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 nacbarr12">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand site-brand" href="{{ url('/') }}">
            <x-application-logo />
        </a>

        <!-- TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- COLLAPSE -->
        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- LEFT / MAIN LINKS -->
            <ul class="navbar-nav gap-lg-3 mt-3 mt-lg-0">
                <li class="nav-item">
                    <a href="{{ url('/') }}"
                       class="nav-link nav-item-uni {{ request()->is('/') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('events') }}"
                       class="nav-link nav-item-uni {{ request()->is('events') ? 'active' : '' }}">
                        Events
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ url('blog') }}"
                       class="nav-link nav-item-uni {{ request()->is('blog') ? 'active' : '' }}">
                        Blog
                    </a>
                </li>
            </ul>

            <!-- RIGHT / AUTH ACTIONS -->
            <ul class="navbar-nav ms-lg-4 align-items-lg-center mt-3 mt-lg-0 gap-2 auth-right">

                @guest
                    <li class="nav-item">
                        <a class="nav-link-1 d-block text-center" href="{{ url('register') }}">
                            Apply
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-uni1 w-100" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endguest

                @auth
                    @can('is-customer')
                        <li class="nav-item">
                            <a class="btn btn-uni1 w-100" href="{{ url('customer/dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    @endcan

                    @can('is-admin')
                        <li class="nav-item">
                            <a class="btn btn-uni1 w-100" href="{{ url('admin/dashboard') }}">
                                Dashboard
                            </a>
                        </li>
                    @endcan

                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-uni1 w-100">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

    @yield('content')
    <!-- FOOTER -->
    <footer class="pb-5 shadow-sm back-color-footer">
        <div class="container">
            <div class="row align-items-start footer-top">
                <!-- LEFT LOGO + TEXT -->
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('assets/customer/images/trasparent-logo1.png') }}" class="footer-logo mb-3"
                        alt="">
                    <p class="footer-text">
                        A joyful community of women supporting one another and shaping a better world—on and off the
                        course.
                    </p>
                </div>

                <!-- COMPANY LINKS -->
                <div class="col-md-4 mb-4">
                    <h6 class="footer-heading">COMPANY</h6>
                    <ul class="footer-links">
                        <li><a href="{{ url('about') }}">About Us</a></li>
                        <li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ url('term') }}">Terms & Waiver</a></li>
                        <!-- <li><a href="#">Support</a></li> -->
                    </ul>
                </div>

                <!-- CONNECT -->
                <div class="col-md-4 mb-4">
                    <h6 class="footer-heading">CONNECT</h6>
                    <div class="footer-icons d-flex align-items-center gap-3">
                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    </div>
                </div>

            </div>

            <hr class="footer-line">
            <div class="container text-center">
                <p class="small mb-1">© 2025 Club Unitee. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>
