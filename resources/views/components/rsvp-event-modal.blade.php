{{-- ================= RSVP MODAL ================= --}}
<div class="modal fade" id="rsvpModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4 text-center rsvp-popup">

            <div class="mb-3">
                <div class="icon-circle" id="rsvpIcon">?</div>
            </div>

            <h4 class="fw-bold mb-2" id="rsvpTitle"></h4>

            <p class="text-muted mb-4" id="rsvpText"></p>

            <div class="d-flex justify-content-center gap-3">
                <button class="btn btn-light" data-bs-dismiss="modal">
                    No
                </button>

                <button class="btn btn-gradient" id="confirmRsvpBtn">
                    Yes, Continue
                </button>
            </div>

        </div>
    </div>
</div>



{{-- ================= STYLE ================= --}}
<style>
.rsvp-popup {
    padding: 40px 30px;
    border-radius: 16px;
}
.icon-circle {
    width: 70px;
    height: 70px;
    background: #e6f7f1;
    color: #198754;
    border-radius: 50%;
    font-size: 34px;
    font-weight: bold;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: center;
}
</style>


{{-- ================= SCRIPT ================= --}}
<script>
const baseUrl = "{{ url('/') }}";
let eventId = null;
let action = null;

function openRsvpModal(name, id, type) {
    eventId = id;
    action = type;

    if (type === 'confirm') {
        rsvpIcon.innerText = '✔';
        rsvpTitle.innerText = 'Confirm RSVP';
        rsvpText.innerText = `Do you want to attend "${name}"?`;
    } else {
        rsvpIcon.innerText = '!';
        rsvpTitle.innerText = 'Cancel RSVP';
        rsvpText.innerText = `Are you sure you want to cancel RSVP for "${name}"?`;
    }

    new bootstrap.Modal(document.getElementById('rsvpModal')).show();
}

document.getElementById('confirmRsvpBtn').onclick = function () {
    fetch(`${baseUrl}/customer/${action}-rsvp/${eventId}`, {
        method:  'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(() => location.reload());
};
</script>
