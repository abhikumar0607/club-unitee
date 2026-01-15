 <!--CREATE BUTTON-->
 <div class="d-flex justify-content-end mb-3">
     <!--CREATE EVENT MODAL-->
     <div class="modal fade" id="createEventModal" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-lg modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title fw-bold">Create New Event</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                 </div>

                 <div class="modal-body">
                     <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data">
                         @csrf

                         <div class="row">
                             <!-- Event Title -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Event Title *</label>
                                 <input type="text" name="title" class="form-control" required>
                             </div>

                             <!-- Event Type -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Event Type *</label>
                                 <select name="type" class="form-select" required>
                                     <option value="" disabled selected>Select Type</option>
                                     <option>Golf Outing</option>
                                     <option>Social Event</option>
                                     <option>Workshop</option>
                                 </select>
                             </div>

                             <!-- Event Date -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Event Date *</label>
                                 <input type="date" name="date" id="event_date" class="form-control"  min="{{ date('Y-m-d') }}" required>
                             </div>

                             <!-- Event Time -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Event Time *</label>
                                 <input type="time" name="event_time" class="form-control" required>
                             </div>

                             <!-- Location -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Location *</label>
                                 <input type="text" name="location" class="form-control" required>
                             </div>

                             <!-- Status -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Status *</label>
                                 <select name="status" class="form-select" required>
                                     <option value="" disabled selected>Select Status</option>
                                     <option value="Published">Published</option>
                                     <option value="Completed">Completed</option>
                                     <option value="Draft">Draft</option>
                                 </select>
                             </div>

                             <!-- Image -->
                             <div class="col-md-6 mb-3">
                                 <label class="fw-semibold">Image *</label>
                                 <input type="file" name="image" class="form-control" required>
                             </div>

                             <!-- Empty column for alignment -->
                             <div class="col-md-6 mb-3"></div>

                             <!-- Description (Full Width) -->
                             <div class="col-12 mb-3">
                                 <label class="fw-semibold">Event Description</label>
                                 <textarea name="description" class="form-control" rows="4"></textarea>
                             </div>
                            <!-- Members Selection -->
                            <div class="col-12 mb-3">
                                <label class="fw-semibold mb-2">Select Members *</label>

                                <!-- Search Box -->
                                <input type="text"
                                    id="memberSearch"
                                    class="form-control mb-2"
                                    placeholder="Search members...">

                                <!-- Members List -->
                                <div class="border rounded p-2"
                                    style="max-height: 220px; overflow-y: auto;"
                                    id="membersList">

                                  @foreach($getAllActiveMembers as $key => $member)
                                        <div class="form-check member-item">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                name="members[]"
                                                value="{{ $member->id }}"
                                                id="member_{{ $member->id }}"
                                                {{ $key == 0 ? 'required' : '' }}>

                                            <label class="form-check-label"
                                                for="member_{{ $member->id }}">
                                                {{ $member->name }} ({{ $member->email ?? '' }})
                                            </label>
                                        </div>
                                    @endforeach
                                    @if($getAllActiveMembers->isEmpty())
                                        <p class="text-muted mb-0">No members found</p>
                                    @endif
                                </div>
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
 </div>
 <script>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('memberSearch');
    const members     = document.querySelectorAll('.member-item');

    searchInput.addEventListener('keyup', function () {
        const value = this.value.toLowerCase();

        members.forEach(function (member) {
            const text = member.innerText.toLowerCase();
            member.style.display = text.includes(value) ? 'block' : 'none';
        });
    });
});
</script>

