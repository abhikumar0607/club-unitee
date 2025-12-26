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
                <h1 class="page-title">Blog Category Management</h1>
                <p class="page-subtitle">Create, edit, manage and track club blog category.</p>
            </div>
        </section>

        <!-- ================== Categories SECTION ================== -->
        <section class="pb-5">
            <div class="container">

                <!-- CREATE BUTTON -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-gradient px-4" data-bs-toggle="modal"
                        data-bs-target="#createEventModal">
                        Create New Category
                    </a>
                    <!-- CREATE Categories MODAL -->
                    <div class="modal fade" id="createEventModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title fw-bold">Create New Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <!-- Category Title -->
                                        <div class="mb-3">
                                            <label class="fw-semibold">Category Name *</label>
                                            <input type="text" name="name" class="form-control" placeholder="Enter category name" required>
                                        </div>
                                        <!-- Status -->
                                        <div class="mb-3">
                                            <label class="fw-semibold">Status *</label>
                                            <select name="status" class="form-select" required>
                                                <option value="" disabled selected>Select Status</option>
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
                                                Create Category
                                            </button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categories TABLE CARD -->
                <div class="card card-uni p-4">
                    <h4 class="fw-bold text-uni mb-4">Blog Categories</h4>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">

                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($categories->count() > 0)
                                @php $count = 1; @endphp
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $count ++ }}.</td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                @if ($category->status == 'Published')
                                                    <span class="badge bg-primary">Published</span>
                                                @elseif($category->status == 'Completed')
                                                    <span class="badge bg-secondary">Completed</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Draft</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{-- <a href="#" class="btn btn-outline-uni btn-sm">View</a> --}}
                                                <a href="javascript:void(0);" class="editCategoryBtn btn btn-gradient btn-sm"
                                                    data-id="{{ $category->id }}">Edit</a>
                                                <a class="btn btn-outline-uni btn-sm delete_category_record" data-category_id="{{ $category->id }}">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7" class="text-center">No blog category found.</td>
                                    </tr>
                                @endif
                            </tbody>

                        </table>
                    </div>
                    <!-- PAGINATION -->
                    <div class="mt-3">
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </div>
                </div>

            </div>
        </section>

        <!---edit event modal--->
        <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">Edit Category</h5>
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
            $('body').on('click', '.editCategoryBtn', function() {
                let eventId = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.categories.edit', ':id') }}".replace(':id', eventId),
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
