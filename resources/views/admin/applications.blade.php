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
                <h1 class="page-title">Applications</h1>
                <p class="page-subtitle">Review, accept, or decline member applications.</p>
            </div>
        </section>

        <!-- ================== APPLICATIONS SECTION ================== -->
        <section class="py-5">
            <div class="container">

                <!-- TABS -->
                <ul class="nav nav-tabs tabs-uni mb-4">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#pending">Pending</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#accepted">Accepted</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#declined">Declined</a>
                    </li>
                </ul>

                <!-- TAB CONTENT -->
                <div class="tab-content">

                    <!-- ==================== PENDING TAB ==================== -->
                    <div class="tab-pane fade show active" id="pending">

                        <div class="card card-uni p-4">

                            <h4 class="fw-bold text-uni mb-4">Pending Applications</h4>

                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Date Applied</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Priya Sharma</td>
                                            <td>priya@example.com</td>
                                            <td>Program Manager</td>
                                            <td>2 hours ago</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                                <a href="#" class="btn btn-gradient btn-sm">Accept</a>
                                                <a href="#" class="btn btn-outline-uni btn-sm">Decline</a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Anika Patel</td>
                                            <td>anika@example.com</td>
                                            <td>Executive Director</td>
                                            <td>1 day ago</td>
                                            <td>
                                                <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                                <a href="#" class="btn btn-gradient btn-sm">Accept</a>
                                                <a href="#" class="btn btn-outline-uni btn-sm">Decline</a>
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                    <!-- ==================== ACCEPTED TAB ==================== -->
                    <div class="tab-pane fade" id="accepted">

                        <div class="card card-uni p-4">

                            <h4 class="fw-bold text-uni mb-4">Accepted Applications</h4>

                            <div class="table-responsive">
                                <table class="table table-striped align-middle">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Approved On</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Maya Rodriguez</td>
                                            <td>maya@example.com</td>
                                            <td>Director of Development</td>
                                            <td>Feb 1</td>
                                        </tr>

                                        <tr>
                                            <td>Zara Chen</td>
                                            <td>zara@example.com</td>
                                            <td>Founder, Climate Startup</td>
                                            <td>Jan 28</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                    <!-- ==================== DECLINED TAB ==================== -->
                    <div class="tab-pane fade" id="declined">

                        <div class="card card-uni p-4">

                            <h4 class="fw-bold text-uni mb-4">Declined Applications</h4>

                            <div class="table-responsive">
                                <table class="table table-striped align-middle">

                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Declined On</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Tina Gomez</td>
                                            <td>tina@example.com</td>
                                            <td>Nonprofit Consultant</td>
                                            <td>Jan 22</td>
                                        </tr>

                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
