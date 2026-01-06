document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        document.querySelectorAll('.alert').forEach(function (alert) {
            if (window.bootstrap) {
                bootstrap.Alert.getOrCreateInstance(alert).close();
            }
        });
    }, 4000);
    const clearBtn = document.getElementById('clearBtn');
    if (!clearBtn) return;
    const fields = document.querySelectorAll(
        'input[name="search"], select[name="status"], select[name="sort"], select[name="type"]'
    );
    function toggleClear() {
        const hasValue = [...fields].some(field => {
            return field.value && field.value.trim() !== '';
        });
        clearBtn.classList.toggle('d-none', !hasValue);
    }
    fields.forEach(field => {
        field.addEventListener('input', toggleClear);
        field.addEventListener('change', toggleClear);
    });
    toggleClear();

    const input   = document.getElementById('blogTitle');
    const counter = document.getElementById('wordCount');
    const error   = document.getElementById('wordError');
    const MAX_WORDS = 20;

    input.addEventListener('keydown', function (e) {
        const words = this.value.trim().split(/\s+/).filter(Boolean);
        const count = words.length;
        const allowedKeys = [
            'Backspace', 'Delete',
            'ArrowLeft', 'ArrowRight',
            'ArrowUp', 'ArrowDown',
            'Tab'
        ];
        if (allowedKeys.includes(e.key)) return;
        if (count >= MAX_WORDS) {
            e.preventDefault();
            error.classList.remove('d-none');
            this.classList.add('border-danger');
        }
    });

input.addEventListener('input', function () {
    const words = this.value.trim().split(/\s+/).filter(Boolean);
    counter.innerText = `${words.length} / 20 words`;
    if (words.length < MAX_WORDS) {
        error.classList.add('d-none');
        this.classList.remove('border-danger');
    }
});
});

