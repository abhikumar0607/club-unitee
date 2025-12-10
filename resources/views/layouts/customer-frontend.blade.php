<!DOCTYPE html>
<html lang="en">
<x-meta-tags />
<body style="background: var(--gradient-background);">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 nacbarr12">
        <div class="container">
            <a class="navbar-brand site-brand" href="index.html"> <x-application-logo /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto gap-3">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link nav-item-uni {{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                    <li class="nav-item"><a href="{{ url('events') }}" class="nav-link nav-item-uni {{ request()->is('events') ? 'active' : '' }}">Events</a></li>
                    <li class="nav-item"><a href="{{ url('blog') }}" class="nav-link nav-item-uni {{ request()->is('blog') ? 'active' : '' }}">Blog</a></li>
                    <!-- <li class="nav-item"><a href="adaptive-golf.html" class="nav-link nav-item-uni">Adaptive Golf</a></li> -->
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @guest
                        <li class="nav-item"><a class="nav-link-1" href="{{ url('register') }}">Apply</a></li>
                        <li class="nav-item">
                            <a class="btn btn-uni1" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest

                    @auth
                         <li class="nav-item">
                            <a class="btn btn-uni1" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-uni1">Logout</button>
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
                    <img src="{{  asset('customer/images/trasparent-logo1.png') }}" class="footer-logo mb-3" alt="">
                    <p class="footer-text">
                        A joyful community of women supporting one another and shaping a better world—on and off the
                        course.
                    </p>
                </div>

                <!-- COMPANY LINKS -->
                <div class="col-md-4 mb-4">
                    <h6 class="footer-heading">COMPANY</h6>
                    <ul class="footer-links">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                        <li><a href="term-service.html">Terms & Waiver</a></li>
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
                <p class="small mb-1">© 2025 Club UniTee. All rights reserved.</p>
            </div>
        </div>
    </footer>
    </body>
</html>
