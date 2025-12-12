@extends('layouts.admin-dashboard')
@section('content')
    <!-- MAIN CONTENT -->
    <div class="main-content">

        <nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
            <x-admin-dashboard-nav-profile />
        </nav>

        <!-- HEADER -->
        <section class="page-header text-center py-5">
            <div class="container">
                <h1 class="page-title">All Members</h1>
                <p class="page-subtitle">Manage, edit, deactivate or view complete member information.</p>
            </div>
        </section>

        <!-- ================== CONTENT ================== -->
        <section class="py-5">
            <div class="container">

                <!-- SEARCH & FILTER CARD -->
                <div class="card card-uni p-4 mb-4">
                 <form method="GET" action="{{ route('admin.members') }}">
                    <div class="row g-3 align-items-end">

                        <!-- SEARCH -->
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Search Members</label>
                            <input type="text" name="search" class="form-control input-uni"
                                placeholder="Name, email or profession" value="{{ request('search') }}">
                        </div>

                        <!-- STATUS -->
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select input-uni">
                                <option value="">All</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive
                                </option>
                            </select>
                        </div>

                        <!-- SORT -->
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Sort By</label>
                            <select name="sort" class="form-select input-uni">
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                                <option value="az" {{ request('sort') == 'az' ? 'selected' : '' }}>Name A-Z</option>
                                <option value="za" {{ request('sort') == 'za' ? 'selected' : '' }}>Name Z-A</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-gradient w-100">Apply</button>
                        </div>

                    </div>
               </form>
                </div>

                <!-- MEMBERS TABLE -->
                <div class="card card-uni p-4">

                    <h4 class="fw-bold text-uni mb-4">Members List</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Profession</th>
                                    <th>Join Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            @if ($members->count() > 0)
                                @foreach ($members as $member)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('assets/customer/images/01.png') }}" class="rounded-circle"
                                                width="50">
                                        </td>

                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->email }}</td>
                                        <td>{{ $member->profession ?? 'N/A' }}</td>
                                        <td>{{ $member->created_at->format('M d, Y') }}</td>
                                        <td>
                                            @if ($member->status == 'active')
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                            <a href="#" class="btn btn-gradient btn-sm">Edit</a>

                                            @if ($member->status == 'active')
                                                <a href="#" class="btn btn-outline-uni btn-sm">Deactivate</a>
                                            @else
                                                <a href="#" class="btn btn-outline-uni btn-sm">Activate</a>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center py-4">
                                        <strong>No members found.</strong>
                                    </td>
                                </tr>
                            @endif
                        </table>
                    </div>
                    <!-- PAGINATION -->
                    <div class="mt-3">
                        {{ $members->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </section>


    </div>
@endsection
