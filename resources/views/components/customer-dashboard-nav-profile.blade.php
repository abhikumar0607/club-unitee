<div class="d-flex align-items-center gap-3">
    <div class="text-end">
        <p class="m-0 user-name">{{ Auth::user()->name }}</p>
        <p class="m-0 user-role">Member</p>
    </div>
    <img src="{{ auth()->user()->profile_image
        ? asset('assets/customer/uploads/profile/' . auth()->user()->profile_image)
        : asset('assets/customer/images/person-dummy.jpg') }}"
        class="user-avatar rounded-circle" alt="Profile Image">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn logout-btn">Logout</button>
    </form>
</div>
