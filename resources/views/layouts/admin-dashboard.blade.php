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
            <li><a href="{{ url('admin/applications') }}" class="{{ request()->is('admin/applications') ? 'active' : '' }}">Applications</a></li>
            <li><a href="{{ url('admin/members ') }}" class="{{ request()->is('admin/members') ? 'active' : '' }}">Members</a></li>
            <li><a href="{{ url('admin/events') }}" class="{{ request()->is('admin/events') ? 'active' : '' }}">Events</a></li>
            <li><a href="{{ url('admin/analytics') }}" class="{{ request()->is('admin/analytics') ? 'active' : '' }}">Analytics</a></li>
        </ul>
    </div>
    @yield('content')
</body>

</html>
