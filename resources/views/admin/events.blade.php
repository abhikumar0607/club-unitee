@extends('layouts.admin-dashboard')
@section('content')
<!-- MAIN CONTENT -->
<div class="main-content">

    <nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
        <x-admin-dashboard-nav-profile />
    </nav>

    <!-- HEADER -->
    <section class="page-header text-center py-3">
        <div class="container">
            <h1 class="page-title">Events Management</h1>
            <p class="page-subtitle">Create, edit, manage and track club events.</p>
        </div>
    </section>

    <!-- ================== EVENTS SECTION ================== -->
    <section class="pb-5">
        <div class="container">

            <!-- CREATE BUTTON -->
            <div class="d-flex justify-content-end mb-3">
                <a href="#" class="btn btn-gradient px-4" data-bs-toggle="modal" data-bs-target="#createEventModal">
                    Create New Event
                </a>

                <!-- CREATE EVENT MODAL -->
                <div class="modal fade" id="createEventModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title fw-bold">Create New Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <form method="POST" action="#">
                                @csrf

                                <div class="modal-body">

                                    <!-- Event Title -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Event Title *</label>
                                        <input type="text" name="title" class="form-control" required>
                                    </div>

                                    <!-- Event Type -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Event Type *</label>
                                        <select name="type" class="form-select" required>
                                            <option value="">Select Type</option>
                                            <option>Golf Outing</option>
                                            <option>Social Event</option>
                                            <option>Workshop</option>
                                        </select>
                                    </div>

                                    <!-- Event Date -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Event Date *</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>

                                    <!-- Location -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Location *</label>
                                        <input type="text" name="location" class="form-control" required>
                                    </div>

                                    <!-- Description -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Event Description</label>
                                        <textarea name="description" class="form-control" rows="4"></textarea>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label class="fw-semibold">Status *</label>
                                        <select name="status" class="form-select" required>
                                            <option value="Published">Published</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-gradient">
                                        Create Event
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
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