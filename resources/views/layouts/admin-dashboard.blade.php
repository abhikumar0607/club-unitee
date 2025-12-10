<!DOCTYPE html>
<html lang="en">
<x-meta-tags />
<body>
    <!-- SIDEBAR -->
    <div class="sidebar-uni">
        <div class="sidebar-header">
            <a href="{{ url('/') }}">
              <x-dashboard-logo />
            </a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="{{ url('admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a></li>
            <li><a href="{{ url('customer/members ') }}" class="{{ request()->is('customer/members') ? 'active' : '' }}">Members</a></li>
            <li><a href="{{ url('customer/connections') }}" class="{{ request()->is('customer/connections') ? 'active' : '' }}">Connections</a></li>
            <li><a href="{{ url('customer/events') }}" class="{{ request()->is('customer/events') ? 'active' : '' }}">Events</a></li>
            <li><a href="{{ url('customer/profile') }}" class="{{ request()->is('customer/profile') ? 'active' : '' }}">My Profile</a></li>
        </ul>
    </div>
    @yield('content')
</body>

</html>
