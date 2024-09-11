document.addEventListener('DOMContentLoaded', function () {
    console.log('Login script loaded');

    const form = document.getElementById('login-form');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Get the CSRF token from the meta tag

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        emailError.innerText = '';
        passwordError.innerText = '';

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Handle redirection
                window.location.href = data.redirect;
            } else {
                // Display errors
                if (data.errors) {
                    emailError.innerText = data.errors.email ? data.errors.email[0] : '';
                    passwordError.innerText = data.errors.password ? data.errors.password[0] : '';
                }
            }
        })
        .catch(error => console.error('Error:', error));
    });
});