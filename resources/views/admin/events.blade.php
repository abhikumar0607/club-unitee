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
                <h1 class="page-title">Events Management</h1>
                <p class="page-subtitle">Create, edit, manage and track club events.</p>
            </div>
        </section>

        <!-- ================== EVENTS SECTION ================== -->
        <section class="py-5">
            <div class="container">

                <!-- CREATE BUTTON -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-gradient px-4">Create New Event</a>
                </div>

                <!-- EVENTS TABLE CARD -->
                <div class="card card-uni p-4">
                    <h4 class="fw-bold text-uni mb-4">Upcoming & Past Events</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>RSVPs</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                <!-- EVENT 1 -->
                                <tr>
                                    <td>Beginner-Friendly Social Round</td>
                                    <td><span class="badge bg-success">Golf Outing</span></td>
                                    <td>Feb 12, 2025</td>
                                    <td>Torrey Pines</td>
                                    <td>18</td>
                                    <td><span class="badge bg-primary">Published</span></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                        <a href="#" class="btn btn-gradient btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-uni btn-sm">Delete</a>
                                    </td>
                                </tr>

                                <!-- EVENT 2 -->
                                <tr>
                                    <td>Coffee & Connection</td>
                                    <td><span class="badge bg-warning">Social Event</span></td>
                                    <td>Feb 7, 2025</td>
                                    <td>Bluebird Café</td>
                                    <td>22</td>
                                    <td><span class="badge bg-primary">Published</span></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                        <a href="#" class="btn btn-gradient btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-uni btn-sm">Delete</a>
                                    </td>
                                </tr>

                                <!-- EVENT 3 -->
                                <tr>
                                    <td>Putting Basics Workshop</td>
                                    <td><span class="badge bg-info">Workshop</span></td>
                                    <td>Jan 25, 2025</td>
                                    <td>Driving Range</td>
                                    <td>14</td>
                                    <td><span class="badge bg-secondary">Completed</span></td>
                                    <td>
                                        <a href="#" class="btn btn-outline-uni btn-sm">View</a>
                                        <a href="#" class="btn btn-gradient btn-sm">Edit</a>
                                        <a href="#" class="btn btn-outline-uni btn-sm">Delete</a>
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
