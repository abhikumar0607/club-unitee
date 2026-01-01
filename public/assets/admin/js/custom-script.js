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
});

