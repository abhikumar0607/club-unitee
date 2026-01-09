<!-- NOTIFICATION ICON -->
<div class="position-relative notification-wrapper">

    <a href="javascript:void(0)" class="notification-icon" onclick="toggleNotifications()">
        <i class="fas fa-bell fs-5 text-warning"></i>

        {{-- UNREAD COUNT --}}
        @if (auth()->user()->unreadNotifications->count() > 0)
            <span class="badge bg-danger notification-badge">
                {{ auth()->user()->unreadNotifications->count() }}
            </span>
        @endif
    </a>

    <!-- NOTIFICATION DROPDOWN -->
    <div class="notification-dropdown d-none" id="notificationDropdown">

        <div class="dropdown-header d-flex justify-content-between align-items-center px-3 py-2">
            <span class="fw-semibold">Notifications</span>

            @if (auth()->user()->unreadNotifications->count() > 0)
                <a href="{{ route('notifications.readAll') }}" class="small text-primary main-all-read-btn">
                    Mark all as read
                </a>
            @endif
        </div>


        <ul class="list-unstyled m-0">

            @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                <li class="border-bottom">
                    <div class="d-flex justify-content-between align-items-center px-3 py-2">

                        {{-- 🔹 MESSAGE LINK (go to actual page) --}}
                        <a href="{{ $notification->data['url'] }}"
                            class="listing-icon-11 d-flex gap-2 align-items-start text-decoration-none flex-grow-1
                            {{ is_null($notification->read_at) ? 'fw-semibold' : '' }}"
                            style="color:#111">

                            <i class="{{ $notification->data['icon'] }} text-primary mt-1"></i>

                            <div>
                                <div class="fw-semibold">
                                    {{ $notification->data['sender_name'] ?? '' }}
                                </div>
                                <div class="small text-muted">
                                    {{ $notification->data['message'] }}
                                </div>
                            </div>
                        </a>

                        {{-- 🔹 MARK AS READ (SIDE LINK) --}}
                        @if (is_null($notification->read_at))
                            <a href="{{ route('notifications.read', $notification->id) }}"
                                class="small text-primary ms-2 mark-as-read-btn">
                                Mark as read
                            </a>
                        @endif

                    </div>
                </li>
            @empty
                <li class="text-center text-muted py-3">
                    No notifications
                </li>
            @endforelse

        </ul>


    </div>
</div>
<style>
    .notification-wrapper {
        position: relative;
    }

    .notification-badge {
        position: absolute;
        top: -6px;
        right: -6px;
        font-size: 11px;
        padding: 3px 6px;
        border-radius: 50%;
    }

    .notification-dropdown {
        position: absolute;
        top: 53px;
        left: -278px;
        width: 560px;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        z-index: 999;
        overflow: hidden;
    }

    .notification-dropdown ul li a {
        padding: 10px 14px;
        text-decoration: none;
        color: #111;
    }

    .notification-dropdown ul li a:hover {
        background: #f3f4f6;
    }
    .notification-dropdown a.mark-as-read-btn {
        border: 1px solid #10b981;
        border-radius: 9px;
        color: #000 !important;
    }
    a.main-all-read-btn {
        color: #000 !important;
        text-decoration: none;
    }
    a.listing-icon-11 i {
        color: #37ae82 !important;
    }
    a.notification-icon i {
        color: #37ae82 !important;
    }
</style>
<script>
    function toggleNotifications() {
        document
            .getElementById('notificationDropdown')
            .classList.toggle('d-none');
    }

    // close when clicking outside
    document.addEventListener('click', function(e) {
        let wrapper = document.querySelector('.notification-wrapper');
        if (!wrapper.contains(e.target)) {
            document.getElementById('notificationDropdown').classList.add('d-none');
        }
    });
</script>
