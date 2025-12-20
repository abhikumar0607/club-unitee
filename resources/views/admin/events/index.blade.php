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
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <h1 class="page-title">Events Management</h1>
                <p class="page-subtitle">Create, edit, manage and track club events.</p>
            </div>
        </section>

        <!-- ================== EVENTS SECTION ================== -->
        <section class="pb-5">
            <div class="container">

                <!-- CREATE BUTTON -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-gradient px-4" data-bs-toggle="modal"
                        data-bs-target="#createEventModal">
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
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('admin.events.store') }}">
                                        @csrf
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

                                        <div class="mb-3">
                                            <label class="fw-semibold">Event Time *</label>
                                            <input type="time" name="event_time" class="form-control" required>
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
                                                <option value="Completed">Completed</option>
                                                <option value="Draft">Draft</option>
                                            </select>
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

                                @if ($events->count() > 0)
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $event->title }}</td>
                                            <td><span class="badge bg-success">{{ $event->type }}</span></td>
                                            <td>{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }}</td>
                                            <td>{{ $event->location }}</td>
                                            <td>--</td>
                                            <td>
                                                @if ($event->status == 'Published')
                                                    <span class="badge bg-primary">Published</span>
                                                @elseif($event->status == 'Completed')
                                                    <span class="badge bg-secondary">Completed</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="#" class="btn btn-outline-uni btn-sm">View</a> --}}
                                                <a href="javascript:void(0);" class="editEventBtn btn btn-gradient btn-sm"
                                                    data-id="{{ $event->id }}">Edit</a>
                                                <a href="{{ route('admin.events.destroy', $event->id) }}"
                                                    class="btn btn-outline-uni btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No events found.</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <!-- PAGINATION -->
                    <div class="mt-3">
                        {{ $events->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </section>

        <!---edit event modal--->
        <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Edit Event</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- The content will be loaded here via AJAX -->
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script>
            $('body').on('click', '.editEventBtn', function() {
                let eventId = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.events.edit', ':id') }}".replace(':id', eventId),
                    type: 'GET',
                    success: function(res) {
                        if (!res.status) return;
                        $('#editEventModal .modal-body').html(res.html);
                        $('#editEventModal').modal('show');
                    },
                    error: function() {
                        alert('Something went wrong');
                    }
                });
            });
        </script>

    @endsection
