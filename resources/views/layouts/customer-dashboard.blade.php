<!DOCTYPE html>
<html lang="en">
<x-meta-tags />
<body>
    <!-- SIDEBAR -->
    <div class="sidebar-uni">
        <div class="sidebar-header">
            <a href="{{ url('/') }}">
            <img src="{{  asset('customer/images/trasparent-logo1.png') }}" alt="" class="sidebar-logo">
            </a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ url('customer/dashboard') }}" class="{{ request()->is('customer/dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ url('customer/dashboard/members ') }}" class="{{ request()->is('customer/dashboard/members') ? 'active' : '' }}">Members</a></li>
            <li><a href="{{ url('customer/dashboard/connections') }}" class="{{ request()->is('customer/dashboard/connections') ? 'active' : '' }}">Connections</a></li>
            <li><a href="{{ url('customer/dashboard/events') }}" class="{{ request()->is('customer/dashboard/events') ? 'active' : '' }}">Events</a></li>
            <li><a href="{{ url('customer/dashboard/profile') }}" class="{{ request()->is('customer/dashboard/profile') ? 'active' : '' }}">My Profile</a></li>
        </ul>
    </div>
    @yield('content')
</body>

</html>
