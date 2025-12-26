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
                 @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
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
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Date Applied</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @if ($pendingApplications->count() > 0)
                                        @php $count = 1; @endphp
                                            @foreach ($pendingApplications as $pendingApplication)
                                                <tr>
                                                    <td>{{ $count ++ }}.</td>
                                                    <td>{{ $pendingApplication->name }}</td>
                                                    <td>{{ $pendingApplication->email }}</td>
                                                    <td>{{ $pendingApplication->profession }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($pendingApplication->created_at)->format('d M, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('profile.index', $pendingApplication->id) }}" class="btn btn-outline-uni btn-sm">View</a>
                                                        <a href="{{ route('admin.application.approve', $pendingApplication->id) }}" class="btn btn-gradient btn-sm">Accept</a>
                                                        <a href="{{ route('admin.application.reject', $pendingApplication->id) }}" class="btn btn-outline-uni btn-sm">Decline</a>
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
                                    </tbody>

                                </table>

                            </div>
                            <!-- PAGINATION -->
                            <div class="mt-3">
                                {{ $pendingApplications->links('pagination::bootstrap-5') }}
                            </div>
                        </div>

                    </div>

                    <!-- ==================== ACCEPTED TAB ==================== -->
                    <div class="tab-pane fade" id="accepted">

                        <div class="card card-uni p-4">

                            <h4 class="fw-bold text-uni mb-4">Accepted Applications</h4>

                            <div class="table-responsive">
                                <table class="table align-middle">

                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Approved On</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @if ($approvedApplications->count() > 0)
                                        @php $count = 1; @endphp
                                            @foreach ($approvedApplications as $approvedApplication)
                                                <tr>
                                                    <td>{{ $count ++ }}.</td>
                                                    <td>{{ $approvedApplication->name }}</td>
                                                    <td>{{ $approvedApplication->email }}</td>
                                                    <td>{{ $approvedApplication->profession }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($approvedApplication->approved_at)->format('d M, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('profile.index', $approvedApplication->id) }}" class="btn btn-outline-uni btn-sm">View</a>
                                                        <a href="{{ route('admin.application.reject', $approvedApplication->id) }}" class="btn btn-outline-uni btn-sm">Decline</a>
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

                                    </tbody>

                                </table>
                            </div>
                            <!-- PAGINATION -->
                            <div class="mt-3">
                                {{ $approvedApplications->links('pagination::bootstrap-5') }}
                            </div>

                        </div>

                    </div>

                    <!-- ==================== DECLINED TAB ==================== -->
                    <div class="tab-pane fade" id="declined">

                        <div class="card card-uni p-4">

                            <h4 class="fw-bold text-uni mb-4">Declined Applications</h4>

                            <div class="table-responsive">
                                <table class="table  align-middle">

                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Profession</th>
                                            <th>Declined On</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @if ($declinedApplications->count() > 0)
                                        @php $count = 1; @endphp
                                            @foreach ($declinedApplications as $declinedApplication)
                                                <tr>
                                                    <td>{{ $count ++ }}.</td>
                                                    <td>{{ $declinedApplication->name }}</td>
                                                    <td>{{ $declinedApplication->email }}</td>
                                                    <td>{{ $declinedApplication->profession }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($declinedApplication->declined_at)->format('d M, Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('profile.index', $declinedApplication->id) }}" class="btn btn-outline-uni btn-sm">View</a>
                                                        <a href="{{ route('admin.application.approve', $declinedApplication->id) }}" class="btn btn-gradient btn-sm">Accept</a>
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

                                    </tbody>

                                </table>
                            </div>
                            <!-- PAGINATION -->
                            <div class="mt-3">
                                {{ $declinedApplications->links('pagination::bootstrap-5') }}
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
@endsection
