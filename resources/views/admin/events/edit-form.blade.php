<form method="POST"
      action="{{ route('admin.events.update', $event->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('Post')

    <div class="row">

        <!-- Event Title -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Event Title *</label>
            <input type="text" name="title" class="form-control"
                   value="{{ $event->title }}" required>
        </div>

        <!-- Event Type -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Event Type *</label>
            <select name="type" class="form-select" required>
                <option value="" disabled>Select Type</option>
                <option value="Golf Outing" {{ $event->type == 'Golf Outing' ? 'selected' : '' }}>Golf Outing</option>
                <option value="Social Event" {{ $event->type == 'Social Event' ? 'selected' : '' }}>Social Event</option>
                <option value="Workshop" {{ $event->type == 'Workshop' ? 'selected' : '' }}>Workshop</option>
            </select>
        </div>

        <!-- Event Date -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Event Date *</label>
            <input type="date" name="date" class="form-control"  min="{{ date('Y-m-d') }}"
                   value="{{ $event->date }}" required>
        </div>

        <!-- Event Time -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Event Time *</label>
            <input type="time" name="event_time" class="form-control"
                   value="{{ $event->event_time }}" required>
        </div>

        <!-- Location -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Location *</label>
            <input type="text" name="location" class="form-control"
                   value="{{ $event->location }}" required>
        </div>

        <!-- Status -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Status *</label>
            <select name="status" class="form-select" required>
                <option value="Published" {{ $event->status == 'Published' ? 'selected' : '' }}>Published</option>
                <option value="Completed" {{ $event->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Draft" {{ $event->status == 'Draft' ? 'selected' : '' }}>Draft</option>
            </select>
        </div>

        <!-- Image -->
        <div class="col-md-6 mb-3">
            <label class="fw-semibold">Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            @if($event->image)
                <img src="{{ asset('assets/admin/uploads/events/'.$event->image) }}"
                     class="event-images mt-4">
            @endif
        </div>

        <!-- Description -->
        <div class="col-12 mb-3">
            <label class="fw-semibold">Event Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
        </div>

        <!-- MEMBERS SECTION -->
        <div class="col-12 mb-3">
            <label class="fw-semibold mb-2">Select Members *</label>

            <!-- Search -->
            <input type="text" id="memberSearch"
                   class="form-control mb-2"
                   placeholder="Search members...">

            <div class="border rounded p-2"
                 style="max-height:220px; overflow-y:auto"
                 id="membersList">

                @php
                    $selectedMembers = $event->members->pluck('id')->toArray();
                @endphp

                @foreach($getAllActiveMembers as $key => $member)
                    <div class="form-check member-item">
                        <input class="form-check-input"
                               type="checkbox"
                               name="members[]"
                               value="{{ $member->id }}"
                               id="member_{{ $member->id }}"
                               {{ in_array($member->id, $selectedMembers) ? 'checked' : '' }}
                              {{ $key == 0 ? 'required' : '' }}
                               >

                        <label class="form-check-label"
                               for="member_{{ $member->id }}">
                            {{ $member->name }} ({{ $member->email ?? '' }})
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('memberSearch');
    const members = document.querySelectorAll('.member-item');

    if (searchInput) {
        searchInput.addEventListener('keyup', function () {
            const value = this.value.toLowerCase();

            members.forEach(member => {
                member.style.display =
                    member.innerText.toLowerCase().includes(value)
                        ? 'block'
                        : 'none';
            });
        });
    }
});
</script>
