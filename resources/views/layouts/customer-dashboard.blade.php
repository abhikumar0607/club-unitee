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
            @can('is-customer')
                <li>
                    <a href="{{ url('customer/dashboard') }}"
                    class="{{ request()->is('customer/dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
            @endcan
            @can('is-admin')
                <li>
                    <a href="{{ url('admin/dashboard') }}"
                    class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        Dashboard
                    </a>
                </li>
            @endcan
            <li>
                <a href="{{ url('customer/members ') }}" class="{{ request()->is('customer/members') || (request()->is('profile*') && session('profile_from') === 'members') ? 'active' : '' }}">
                    Members
                </a>
            </li>
            <li>
                <a href="{{ route('customer.match.suggestions') }}" class="{{ request()->is('customer/connections/*') || (request()->is('profile*') && session('profile_from') === 'connection') ? 'active' : '' }}">
                    Connections
                </a>
            </li>
            <li>
                <a href="{{ url('customer/events') }}" class="{{ request()->is('customer/events') ? 'active' : '' }}">
                    Events
                </a>
            </li>
            <li>
                <a href="{{ url('customer/profile') }}" class="{{ request()->is('customer/profile','customer/profile/edit') ? 'active' : '' }}">
                    My Profile
                </a>
            </li>
            <li class="chat-nav-item">
                <a href="{{ url('chat') }}"
                class="chat-nav-link {{ request()->is('chat') ? 'active' : '' }}">
                    Chat
                    <x-chat-unread-count />
                </a>
            </li>

            <li>
                <a href="{{ url('/settings') }}" class="{{ request()->is('settings') ? 'active' : '' }}">
                    My Settings
                </a>
            </li>
        </ul>
    </div>
    @yield('content')
    <script src="{{ asset('assets/customer/js/custom-script.js') }}"></script>
</body>
</html>
