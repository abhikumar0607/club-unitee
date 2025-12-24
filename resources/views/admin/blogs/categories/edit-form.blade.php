<form method="POST" action="{{ route('admin.categories.update', $category->id) }}') }}" enctype="multipart/form-data">
    @csrf
    <!-- Event Title -->
    <div class="mb-3">
        <label class="fw-semibold">Category Name *</label>
        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ $category->name }}"
            required
        >
    </div>
    <!-- Status -->
    <div class="mb-3">
        <label class="fw-semibold">Status *</label>
        <select name="status" class="form-select" required>
            <option value="Published" {{ $category->status == 'Published' ? 'selected' : '' }}>
                Published
            </option>
            <option value="Completed" {{ $category->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>
            <option value="Draft" {{ $category->status == 'Draft' ? 'selected' : '' }}>
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
            Update Category
        </button>
    </div>
</form>