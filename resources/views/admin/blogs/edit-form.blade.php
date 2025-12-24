<form method="POST" action="{{ route('admin.blogs.update', $blogs->id) }}') }}" enctype="multipart/form-data">
    @csrf

    <!-- Event Title -->
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

    <!-- Event Type -->
    <div class="mb-3">
        <label class="fw-semibold">Categories *</label>
            <select name="category_name[]" class="form-select" required>
            <option value="" Disabled selected>Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <!-- Event Date -->
    <div class="mb-3">
        <label class="fw-semibold">Event Date *</label>
        <input
            type="date"
            name="date"
            class="form-control"
            value="{{ $blogs->date }}"
            required
        >
    </div>
    <!-- Event time -->
    <div class="mb-3">
        <label class="fw-semibold">Event Time *</label>
        <input
            type="time"
            name="event_time"
            class="form-control"
            value="{{ $blogs->event_time }}"
            required
        >
    </div>

    <!-- Location -->
    <div class="mb-3">
        <label class="fw-semibold">Location *</label>
        <input
            type="text"
            name="location"
            class="form-control"
            value="{{ $blogs->location }}"
            required
        >
    </div>

    <!-- Description -->
    <div class="mb-3">
        <label class="fw-semibold">Event Description</label>
        <textarea
            name="description"
            class="form-control"
            rows="4"
        >{{ $blogs->description }}</textarea>
    </div>

    <!-- Image -->
    <div class="mb-3">
        <label class="fw-semibold">Image *</label>
        <input type="file" name="image" class="form-control"><br>
        @if($blogs->image)
            <img src="{{ asset('assets/admin/uploads/events/' .$blogs->image) }}" class="blogs-images">
        @else
            
        @endif 
    </div>

    <!-- Status -->
    <div class="mb-3">
        <label class="fw-semibold">Status *</label>
        <select name="status" class="form-select" required>
            <option value="Published" {{ $blogs->status == 'Published' ? 'selected' : '' }}>
                Published
            </option>
            <option value="Completed" {{ $blogs->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
            <option value="Draft" {{ $blogs->status == 'Draft' ? 'selected' : '' }}>
                Draft
            </option>
        </select>
    </div>

    <!-- Footer -->
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
            Cancel
        </button>
        <button type="submit" class="btn btn-gradient">
            Update Event
        </button>
    </div>
</form>
