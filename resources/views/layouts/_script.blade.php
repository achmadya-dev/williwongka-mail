<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('logo').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.querySelector('.img-placeholder').src = reader.result;
                }
                reader.readAsDataURL(file);
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const closeButtons = document.querySelectorAll('[data-dismiss-target]');
        closeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const target = document.querySelector(
                    button.getAttribute('data-dismiss-target'));
                if (target) {
                    target.remove();
                }
            });
        });
    });
</script>
