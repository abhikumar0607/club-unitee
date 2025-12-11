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

                    <div class="row g-3 align-items-end">

                        <div class="col-md-4">
                            <label class="form-label fw-bold">Search Members</label>
                            <input type="text" class="form-control input-uni" placeholder="Name, email or profession">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold">Status</label>
                            <select class="form-select input-uni">
                                <option value="">All</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label fw-bold">Sort By</label>
                            <select class="form-select input-uni">
                                <option>Newest</option>
                                <option>Oldest</option>
                                <option>Name A-Z</option>
                                <option>Name Z-A</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-gradient w-100">Apply</button>
                        </div>

                    </div>

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

                            <tbody>

                                <!-- ROW 1 -->
                                <tr>
                                    <td><img src="https://via.placeholder.com/50" class="rounded-circle" width="50">
                                    </td>
                                    <td>Priya Sharma</td>
                                    <td>priya@example.com</td>
                                    <td>Program Manager</td>
                                    <td>Jan 22, 2025</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                        <a href="#" class="btn btn-gradient btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-uni btn-sm">Deactivate</a>
                                    </td>
                                </tr>

                                <!-- ROW 2 -->
                                <tr>
                                    <td><img src="https://via.placeholder.com/50" class="rounded-circle" width="50">
                                    </td>
                                    <td>Zara Chen</td>
                                    <td>zara@example.com</td>
                                    <td>Founder, Climate Startup</td>
                                    <td>Jan 18, 2025</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                        <a href="#" class="btn btn-gradient btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-uni btn-sm">Deactivate</a>
                                    </td>
                                </tr>

                                <!-- ROW 3 -->
                                <tr>
                                    <td><img src="https://via.placeholder.com/50" class="rounded-circle" width="50">
                                    </td>
                                    <td>Anika Patel</td>
                                    <td>anika@example.com</td>
                                    <td>Executive Director</td>
                                    <td>Jan 10, 2025</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                        <a href="#" class="btn btn-gradient btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-uni btn-sm">Activate</a>
                                    </td>
                                </tr>

                            </tbody>

                        </table>
                    </div>

                </div>

            </div>
        </section>


    </div>
@endsection
