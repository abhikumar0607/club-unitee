<form method="POST" action="{{ route('admin.blogs.update', $blogs->id) }}" enctype="multipart/form-data" id="editBlogForm">
   @csrf
    <!--Event Title-->
    <div class="mb-3">
        <label class="fw-semibold">Blog Title *</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ $blogs->title }}"
            required
        >
    </div>
    <!--Event Type-->
    <div class="mb-3">
        <label class="fw-semibold">Categories *</label>
        <select name="category_name[]" class="form-select" required>
            <option value="" disabled selected>Select</option>
            <!--Get categories-->
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $blogs->category_details->contains($category->id) ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    <!--Publish Date-->
    <div class="mb-3">
        <label class="fw-semibold">Publish Date *</label>
        <input
            type="date"
            name="publish_date"
            class="form-control"
            id="publish_date"
            value="{{ $blogs->publish_date }}"
            required
        >
    </div>
    <!--Short Description-->
    <div class="mb-3">
        <label class="fw-semibold mb-1">Short Description</label>
        <div id="editShortDescEditor"
            class="border rounded bg-white"
            style="min-height:150px;">
            {!! $blogs->short_description !!}
        </div>
        <input type="hidden" name="short_description" id="edit_short_description">
    </div>
    <!--Description-->
    <div class="mb-3">
        <label class="fw-semibold mb-1">Description</label>
        <div id="editDescEditor"
             class="border rounded bg-white"
             style="min-height:220px;">
            {!! $blogs->description !!}
        </div>
        <input type="hidden" name="description" id="edit_description">
    </div>

    <!-- Image -->
    <div class="mb-3">
        <label class="fw-semibold">Image *</label>
        <input type="file" name="image" class="form-control"><br>
        <!--Check if image exists or not-->
        @if($blogs->image)
            <img src="{{ asset('assets/admin/uploads/blogs/' .$blogs->image) }}" class="event-images">
        @else
        @endif 
    </div>
    <!--Author Name-->
    <div class="mb-3">
        <label class="fw-semibold">Author Name *</label>
        <input type="text" name="author_name" class="form-control"  value="{{ $blogs->author_name }}" required>
    </div>
    <!--Author Type-->
    <div class="mb-3">
        <label class="fw-semibold">Author Type *</label>
        <input type="text" name="author_type" class="form-control"  value="{{ $blogs->author_type }}" required>
    </div>
    <div class="mb-3">
        <label class="fw-semibold">Author Image *</label>
        <input type="file" name="author_image" class="form-control"><br>
        <!--Check if image exists or not-->
        @if($blogs->author_image)
            <img src="{{ asset('assets/admin/uploads/blogs/' .$blogs->author_image) }}" class="event-images">
        @else
        @endif 
    </div>
    <!--Status-->
    <div class="mb-3">
        <label class="fw-semibold">Status *</label>
        <select name="status" class="form-select" required>
            <option value ="" disabled selected></option>
            <option value="Published" {{ $blogs->status == 'Published' ? 'selected' : '' }}>Published</option>
            <!--<option value="Completed" {{ $blogs->status == 'Completed' ? 'selected' : '' }}>Completed</option> -->
            <option value="Draft" {{ $blogs->status == 'Draft' ? 'selected' : '' }}>Draft</option>
        </select>
    </div>
    <!--Footer-->
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
            Cancel
        </button>
        <button type="submit" class="btn btn-gradient">
            Update Blog
        </button>
    </div>
</form>
