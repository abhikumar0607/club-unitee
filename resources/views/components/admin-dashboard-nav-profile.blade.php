      <div class="d-flex align-items-center gap-3">
        
    <div class="main-profile-content">
        <a href="{{ url('settings') }}">
            <div class="text-end">
                <p class="m-0 user-name fw-semibold">{{ Auth::user()->name }}</p>
                <p class="m-0 user-role">Administrator</p>
            </div>
        </a>
    </div>

    <!-- PROFILE IMAGE -->
    <div class="main-profile-image-01">
        <a href="{{ url('settings') }}">
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
