<div class="d-flex align-items-center gap-4">

    <!-- NOTIFICATION ICON + UNREAD COUNT -->
    <x-notification />
    <!-- CHAT ICON + UNREAD COUNT -->
    <div class="position-relative chat-icon-wrapper">
        <a href="{{ url('chat') }}" class="chat-icon-link">
            <!-- Chat SVG Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" stroke="#22c55e" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8
                    8.5 8.5 0 0 1-7.6 4.7
                    8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7
                    a8.38 8.38 0 0 1-.9-3.8
                    8.5 8.5 0 0 1 4.7-7.6
                    8.38 8.38 0 0 1 3.8-.9h.5
                    a8.48 8.48 0 0 1 8 8v.5z" />
            </svg>
            <!-- GLOBAL UNREAD COUNT -->
            <x-chat-unread-counter />
        </a>
    </div>

    <!-- USER INFO -->

    <div class="main-profile-content">
        <a href="{{ url('customer/profile') }}">
            <div class="text-end">
                <p class="m-0 user-name fw-semibold">{{ Auth::user()->name }}</p>
                <p class="m-0 user-role text-muted">Member</p>
            </div>
        </a>
    </div>

    <!-- PROFILE IMAGE -->
    <div class="main-profile-image-01">
        <a href="{{ url('customer/profile') }}">
            <img src="{{ auth()->user()->profile_image
        ? asset('assets/customer/uploads/profile/' . auth()->user()->profile_image)
        : asset('assets/customer/images/person-dummy.jpg') }}" class="user-avatar rounded-circle" alt="Profile Image">
        </a>
    </div>

    <!-- LOGOUT -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn logout-btn">Logout</button>
    </form>

</div>