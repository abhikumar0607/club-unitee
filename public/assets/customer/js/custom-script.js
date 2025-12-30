
document.addEventListener('DOMContentLoaded', function () {

    const clearBtn = document.getElementById('clearBtn');
    if (!clearBtn) return;


    const fields = document.querySelectorAll(`
        input[name="search"],
        select[name="golf_skill_level"],
        select[name="availability"],
        select[name="type"]
    `);

    function toggleClear() {
        const hasValue = [...fields].some(field => {
            return field && field.value && field.value.trim() !== '';
        });

        clearBtn.classList.toggle('d-none', !hasValue);
    }

    fields.forEach(field => {
        field.addEventListener('input', toggleClear);
        field.addEventListener('change', toggleClear);
    });
    toggleClear();
});

