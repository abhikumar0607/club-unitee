<div class="d-flex align-items-center gap-3">
    <div class="text-end">
        <p class="m-0 user-name">Priya Sharma</p>
        <p class="m-0 user-role">Member</p>
    </div>
    <img src="{{  asset('customer/images/01.png') }}" class="user-avatar" alt="User">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"  class="btn logout-btn">Logout</button>
    </form>
</div>