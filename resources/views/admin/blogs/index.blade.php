@extends('layouts.admin-dashboard')
@section('content')
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
<!--MAIN CONTENT-->
<div class="main-content">
<nav class="top-navbar d-flex justify-content-end align-items-center px-4 shadow-sm">
   <x-admin-dashboard-nav-profile />
</nav>
<!--HEADER-->
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
        <h1 class="page-title">Blogs Management</h1>
        <p class="page-subtitle">Create, edit, manage and track club blogs.</p>
    </div>
    <a href="#" class="btn btn-gradient px-4 create-btn" data-bs-toggle="modal"
        data-bs-target="#createEventModal">
        Create New Blog
    </a>
</section>
<!--FILTER SECTION-->
<section class="pb-4">
    <div class="container">
        <div class="card card-uni p-4 mb-4">
            <h5 class="fw-bold mb-3">Filter Blogs</h5>
            <form action="{{ route('admin.blogs') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-3">
                        <input type="text" class="form-control input-uni" placeholder="Search by blog title" name="search" value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select input-uni" name="status">
                            <option value="" disabled selected>Select Status</option>
                            <option value="Published" {{ request('status') == 'Published' ? 'selected' : '' }}>Published</option>
                            <option value="Draft" {{ request('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                            <!--<option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>-->
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-gradient w-100 fw-semibold">Apply Filters</button>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.blogs') }}" id="clearBtn" class="btn btn-gradient w-100">
                            Clear
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--Blogs SECTION-->
<section class="pb-5">
    <div class="container">
        <!--CREATE BUTTON-->
        <div class="d-flex justify-content-end mb-3">
            <!--CREATE Blogs MODAL-->
            <div class="modal fade" id="createEventModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold">Create New Blog</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" id="createBlogForm">
                                @csrf
                                <!--Event Title-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Blog Title *</label>
                                    <input type="text"
                                        name="title"
                                        id="blogTitle"
                                        class="form-control"
                                        required>
                                    <div class="d-flex justify-content-between mt-1">
                                        <small id="wordCount" class="text-muted">0 / 20 words</small>
                                        <small id="wordError" class="text-danger d-none">
                                            Maximum 20 words allowed
                                        </small>
                                    </div>
                                </div>
                                <!--Event Type-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Categories *</label>
                                    <select name="category_name[]" class="form-select" required>
                                        <option value="" disabled selected>Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--Blog Date-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Publish Date *</label>
                                    <input type="date" name="publish_date" id="publish_date" class="form-control" required>
                                </div>
                                <!--Short Description-->
                                <div class="mb-3">
                                    <label class="fw-semibold mb-1">Short Description</label>
                                    <div id="shortDescEditor"
                                        class="border rounded bg-white"
                                        style="min-height:150px;">
                                    </div>
                                    <input type="hidden" name="short_description" id="short_description">
                                </div>
                                <!--Description-->
                                <div class="mb-3">
                                    <label class="fw-semibold mb-1">Description</label>
                                    <div id="descEditor"
                                        class="border rounded bg-white"
                                        style="min-height:220px;">
                                    </div>
                                    <input type="hidden" name="description" id="description">
                                </div>
                                <!--Image-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Image *</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <!--Author Name-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Author Name *</label>
                                    <input type="text" name="author_name" class="form-control" required>
                                </div>
                                <!--Author Type-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Author Type *</label>
                                    <input type="text" name="author_type" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="fw-semibold">Author Image *</label>
                                    <input type="file" name="author_image" class="form-control" required>
                                </div>
                                <!--Status-->
                                <div class="mb-3">
                                    <label class="fw-semibold">Status *</label>
                                    <select name="status" class="form-select" required>
                                        <option value="" disabled selected>Select Status</option>
                                        <option value="Published">Published</option>
                                        <!--<option value="Completed">Completed</option>-->
                                        <option value="Draft">Draft</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                        Cancel
                                    </button>
                                    <button type="submit" class="btn btn-gradient">
                                        Create Blog
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--EVENTS TABLE CARD-->
        <div class="card card-uni p-4">
            <h4 class="fw-bold text-uni mb-4">All Blogs</h4>
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Sr No.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Check if blogs exists or not-->
                        @if ($blogs->count() > 0)
                        @php $count = 1; @endphp
                        <!--Get blogs-->
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{ $count ++ }}.</td>
                            <td>    
                                <a href="{{ url('blog-detail', $blog->slug) }}" class="text-decoration-none text-reset">
                                    {{ $blog->title }}
                                </a>
                            </td>
                            <td>
                                <span class="badge bg-success">
                                    <!--Check if categories exists or not-->
                                    @if (isset($blog['category_details']))
                                    <!--Get categories--> 
                                    @foreach ($blog['category_details'] as $category)   
                                        {{ $category->name }}
                                        @if (!$loop->last), 
                                        @endif
                                    @endforeach
                                    @endif
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($blog->date)->format('d M, Y') }}</td>
                            <td>
                                <!--Check if image exists or not-->
                                @if($blog->image)
                                <a href="{{ url('blog-detail/'.$blog->slug) }}" class="d-inline-block">
                                    <img src="{{ asset('assets/admin/uploads/blogs/'.$blog->image) }}" class="event-images">
                                </a>
                                @else
                                    --
                                @endif
                            </td>
                            <td>
                                @if ($blog->status == 'Published')
                                    <span class="badge bg-primary published-btn">Published</span>
                                @elseif($blog->status == 'Completed')
                                    <span class="badge bg-secondary">Completed</span>
                                @else
                                    <span class="badge bg-warning text-dark draft-btn">Draft</span>
                                @endif
                            </td>
                            <td>
                                {{--<a href="#" class="btn btn-outline-uni btn-sm">View</a>--}}
                                <a href="javascript:void(0);" class="editBlogBtn btn btn-gradient btn-sm"
                                    data-id="{{ $blog->id }}">Edit
                                </a>
                                <a class="btn btn-outline-uni btn-sm delete_blog_record"
                                    data-blog_id="{{ $blog->id }}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="7" class="text-center">No blogs found.</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <!--PAGINATION -->
            <div class="mt-3">
                {{ $blogs->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
<!---edit event modal--->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Edit Blogs</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body"></div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
<script>
    $('body').on('click', '.editBlogBtn', function() {
        let eventId = $(this).data('id');
        $.ajax({
            url: "{{ route('admin.blogs.edit', ':id') }}".replace(':id', eventId),
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let shortDescEditor, descEditor;
        $('#createEventModal').on('shown.bs.modal', function () {
            if (!shortDescEditor) {
                shortDescEditor = new Quill('#shortDescEditor', {
                    theme: 'snow'
                });
            }
            if (!descEditor) {
                descEditor = new Quill('#descEditor', {
                    theme: 'snow'
                });
            }
        });
        document.getElementById('createBlogForm').addEventListener('submit', function () {
            document.getElementById('short_description').value =
                shortDescEditor.root.innerHTML.trim();
            document.getElementById('description').value =
                descEditor.root.innerHTML.trim();
        });
    });
</script>
<script>
   let editShortDescEditor = null;
   let editDescEditor = null;
   $('#editEventModal').on('shown.bs.modal', function () {
        if (!editShortDescEditor) {
            editShortDescEditor = new Quill('#editShortDescEditor', {
                theme: 'snow'
            });
        }
        if (!editDescEditor) {
            editDescEditor = new Quill('#editDescEditor', {
                theme: 'snow'
            });
        }
   });
   //EDIT FORM SUBMIT
    $(document).on('submit', '#editBlogForm', function () {
        $('#edit_short_description').val(
            editShortDescEditor.root.innerHTML.trim()
        );
        $('#edit_description').val(
            editDescEditor.root.innerHTML.trim()
        );
    });
</script>
<script>
    document.addEventListener('click', function (e) {
        if (e.target && e.target.id === 'publish_date') {
            if (e.target.showPicker) {
                e.target.showPicker();
            }
        }
    });
</script>
@endsection