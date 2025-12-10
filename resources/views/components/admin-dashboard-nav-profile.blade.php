      <div class="d-flex align-items-center gap-3">
          <div class="text-end">
              <p class="m-0 user-name">Admin User</p>
              <p class="m-0 user-role">Administrator</p>
          </div>
          <img src="{{ asset('customer/images/01.png') }}" class="user-avatar" alt="User">
          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="btn logout-btn">Logout</button>
          </form>
      </div>
