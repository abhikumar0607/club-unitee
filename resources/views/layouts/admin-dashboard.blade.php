<!DOCTYPE html>
<html lang="en">
    <x-meta-tags />
    <link rel="icon" type="image/png" href="{{ asset('assets/admin/images/favicon.svg') }}" />
    <body>
        <!--SIDEBAR-->
        <div class="sidebar-uni">
            <div class="sidebar-header">
                <a href="{{ url('/') }}">
                    <x-dashboard-logo />
                </a>
            </div>
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ url('admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('admin/applications') }}" class="{{ request()->is('admin/applications') || (request()->is('profile*') && session('profile_from') === 'applications') ? 'active' : '' }}">Applications</a>
                </li>
                <li>
                    <a href="{{ url('admin/members ') }}" class="{{ request()->is('admin/members') || (request()->is('profile*') && session('profile_from') === 'members') ? 'active' : '' }}">Members</a>
                </li>
                <li>
                    <a href="{{ url('admin/events') }}" class="{{ request()->is('admin/events') || request()->is('admin/events/rsvp/*') ? 'active' : '' }}">Events</a>
                </li>
                <li>
                    <a href="{{ url('admin/categories') }}" class="{{ request()->is('admin/categories') ? 'active' : '' }}">Blog Categories</a>
                </li>
                <li>
                    <a href="{{ url('admin/blogs') }}" class="{{ request()->is('admin/blogs') ? 'active' : '' }}">Blogs</a>
                </li>
                <li>
                    <a href="{{ url('settings') }}" class="{{ request()->is('settings') ? 'active' : '' }}">My Settings</a>
                </li>
                <!--<li>
                    <a href="{{ url('admin/analytics') }}" class="{{ request()->is('admin/analytics') ? 'active' : '' }}">Analytics</a>
                </li> -->
            </ul>
        </div>
        @yield('content')
        <script>
            var base_url = '{{ url("/") }}'; 
        </script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('assets/admin/js/custom-script.js') }}"></script>
        <script src="{{ asset('assets/admin/js/custom-ajax.js') }}"></script>
    </body>
</html>