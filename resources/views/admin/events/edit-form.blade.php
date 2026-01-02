<form method="POST" action="{{ route('admin.events.update', $event->id) }}') }}" enctype="multipart/form-data">
   @csrf
    <!--Event Title-->
    <div class="mb-3">
        <label class="fw-semibold">Event Title *</label>
        <input
            type="text"
            name="title"
            class="form-control"
            value="{{ $event->title }}"
            required
        >
    </div>
    <!--Event Type-->
    <div class="mb-3">
        <label class="fw-semibold">Event Type *</label>
        <select name="type" class="form-select" required>
            <option value="" disabled selected>Select Type</option>
            <option value="Golf Outing" {{ $event->type == 'Golf Outing' ? 'selected' : '' }}>Golf Outing</option>
            <option value="Social Event" {{ $event->type == 'Social Event' ? 'selected' : '' }}>Social Event</option>
            <option value="Workshop" {{ $event->type == 'Workshop' ? 'selected' : '' }}>Workshop</option>
        </select>
    </div>
    <!--Event Date-->
    <div class="mb-3">
        <label class="fw-semibold">Event Date *</label>
        <input
            type="date"
            name="date"
            id="event_date"
            class="form-control"
            value="{{ $event->date }}"
            required
        >
    </div>
    <!--Event time-->
    <div class="mb-3">
        <label class="fw-semibold">Event Time *</label>
        <input
            type="time"
            name="event_time"
            class="form-control"
            value="{{ $event->event_time }}"
            required
        >
    </div>
    <!--Location-->
    <div class="mb-3">
        <label class="fw-semibold">Location *</label>
        <input
            type="text"
            name="location"
            class="form-control"
            value="{{ $event->location }}"
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
        >
        {{ $event->description }}
        </textarea>
    </div>
    <!--Image-->
    <div class="mb-3">
        <label class="fw-semibold">Image *</label>
        <input type="file" name="image" class="form-control"><br>
        @if($event->image)
            <img src="{{ asset('assets/admin/uploads/events/' .$event->image) }}" class="event-images">
        @else
        @endif 
    </div>
    <!--Status-->
    <div class="mb-3">
        <label class="fw-semibold">Status *</label>
        <select name="status" class="form-select" required>
            <option value="" disabled selected>Select</option>
            <option value="Published" {{ $event->status == 'Published' ? 'selected' : '' }}>Published</option>
            <option value="Completed" {{ $event->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            <option value="Draft" {{ $event->status == 'Draft' ? 'selected' : '' }}>Draft</option>
        </select>
    </div>
    <!--Footer-->
    <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
            Cancel
        </button>
        <button type="submit" class="btn btn-gradient">
            Update Event
        </button>
    </div>
</form>