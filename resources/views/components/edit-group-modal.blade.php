<!-- edit-group-modal.blade.php -->
<div class="modal fade" id="editGroupModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <form method="POST"
            action="{{ route('chat.updateGroup') }}"
            enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="group_id" id="editGroupId">

        <div class="modal-header">
          <h5 class="modal-title">Edit Group</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">

          <!-- GROUP IMAGE -->
          <div class="text-center mb-3">
            <img id="editGroupPreview" src=""
                 style="width:80px;height:80px;border-radius:50%">
            <input type="file" name="image" class="form-control mt-2">
          </div>

          <!-- GROUP NAME -->
          <div class="mb-3">
            <label class="form-label fw-semibold">Group Name</label>
            <input type="text" name="name" id="editGroupName"
                   class="form-control" required>
          </div>
        <!-- SEARCH -->
        <input type="text"
            id="groupMemberSearch"
            class="form-control mb-2"
            placeholder="Search members...">
          <!-- MEMBERS -->
          <label class="form-label fw-semibold">Members</label>
          <div class="border rounded p-2" style="max-height:200px;overflow:auto">
            @foreach ($members as $m)
              <div class="form-check group-member-item">
                <input class="form-check-input group-member-checkbox"
                       type="checkbox"
                       name="members[]"
                       value="{{ $m->id }}"
                       id="edit-member-{{ $m->id }}">
                <label class="form-check-label">
                  {{ $m->name }}
                </label>
              </div>
            @endforeach
          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">
            Update Group
          </button>
        </div>

      </form>

    </div>
  </div>
</div>

<script>
function openEditGroupModal(btn) {
    document.getElementById('editGroupId').value   = btn.dataset.id;
    document.getElementById('editGroupName').value = btn.dataset.name;
    document.getElementById('editGroupPreview').src= btn.dataset.image;

    let members = JSON.parse(btn.dataset.members);

    document.querySelectorAll('.group-member-checkbox')
        .forEach(cb => cb.checked = false);

    members.forEach(id => {
        let cb = document.getElementById(`edit-member-${id}`);
        if (cb) cb.checked = true;
    });

    new bootstrap.Modal(
        document.getElementById('editGroupModal')
    ).show();
}


/* MEMBER SEARCH */
document.getElementById('groupMemberSearch')
.addEventListener('keyup', function () {

    let val = this.value.toLowerCase();

    document.querySelectorAll('.group-member-item')
        .forEach(item => {
            let text = item.innerText.toLowerCase();
            item.style.display = text.includes(val) ? 'block' : 'none';
        });
});
</script>
