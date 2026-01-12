<!-- CREATE GROUP MODAL -->
<div class="modal fade" id="createGroupModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <form method="POST"
                  action="{{ route('chat.createGroup') }}"
                  id="createGroupForm"
                  enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Create Group</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <!-- GROUP IMAGE -->
                    <div class="mb-3 text-center">
                        <img id="groupImagePreview"
                             src="{{ asset('assets/customer/images/person-dummy.jpg') }}"
                             class="rounded-circle mb-2"
                             style="width:90px;height:90px;object-fit:cover">

                        <div>
                            <label class="btn btn-sm btn-outline-success">
                                Select Group Image
                                <input type="file"
                                       name="image"
                                       id="groupImageInput"
                                       class="d-none"
                                       accept="image/*">
                            </label>
                        </div>
                    </div>

                    <!-- GROUP NAME -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Group Name</label>
                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Enter group name"
                               required>
                    </div>

                    <!-- MEMBERS -->
                    <label class="form-label fw-semibold">Select Members</label>

                    <!-- SEARCH -->
                    <input type="text"
                           id="memberSearch"
                           class="form-control mb-2"
                           placeholder="Search members...">

                    <!-- MEMBER LIST -->
                    <div class="border rounded p-2"
                         style="max-height:200px;overflow:auto">

                        @foreach ($members as $m)
                            <div class="form-check member-item"
                                 data-name="{{ strtolower($m->name) }}">

                                <input class="form-check-input member-checkbox"
                                       type="checkbox"
                                       name="members[]"
                                       value="{{ $m->id }}"
                                       id="member-{{ $m->id }}">

                                <label class="form-check-label"
                                       for="member-{{ $m->id }}">
                                    {{ $m->name }}
                                </label>
                            </div>
                        @endforeach

                    </div>

                    <!-- ERROR -->
                    <small id="memberError" class="text-danger d-none">
                        Please select at least one member.
                    </small>

                </div>

                <div class="modal-footer">
                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-success"
                            id="createGroupBtn"
                            disabled>
                        Create Group
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
<script>
/* ================= OPEN MODAL ================= */
function openCreateGroupModal() {
    new bootstrap.Modal(
        document.getElementById('createGroupModal')
    ).show();
}

/* ================= IMAGE PREVIEW ================= */
document.getElementById('groupImageInput')
    .addEventListener('change', function (e) {

        const file = e.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('groupImagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

/* ================= MEMBER SEARCH ================= */
document.getElementById('memberSearch')
    .addEventListener('keyup', function () {

        let value = this.value.toLowerCase();

        document.querySelectorAll('.member-item').forEach(item => {
            let name = item.dataset.name;
            item.style.display = name.includes(value) ? 'block' : 'none';
        });
    });

/* ================= ENABLE BUTTON IF MEMBER SELECTED ================= */
const checkboxes = document.querySelectorAll('.member-checkbox');
const createBtn  = document.getElementById('createGroupBtn');
const errorText  = document.getElementById('memberError');

checkboxes.forEach(cb => {
    cb.addEventListener('change', () => {

        let checked =
            document.querySelectorAll('.member-checkbox:checked').length;

        if (checked > 0) {
            createBtn.disabled = false;
            errorText.classList.add('d-none');
        } else {
            createBtn.disabled = true;
        }
    });
});

/* ================= FORM VALIDATION ================= */
document.getElementById('createGroupForm')
    .addEventListener('submit', function (e) {

        let checked =
            document.querySelectorAll('.member-checkbox:checked').length;

        if (checked === 0) {
            e.preventDefault();
            errorText.classList.remove('d-none');
        }
    });
</script>
