document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (alert) {
            if (window.bootstrap) {
                let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }
        });
    }, 4000);
});
const clearBtn = document.getElementById('clearBtn');
const fields = document.querySelectorAll('input[name="search"], select[name="status"], select[name="sort"]');

function toggleClear(){
    clearBtn.classList.toggle(
        'd-none',
        ![...fields].some(f => f.value.trim() !== '')
    );
}

fields.forEach(f => f.addEventListener('input', toggleClear));
toggleClear();