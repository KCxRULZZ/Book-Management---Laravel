document.addEventListener('DOMContentLoaded', function () {
    console.log('Registration script loaded');

    const form = document.getElementById('register-form');
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const passwordConfirmationError = document.getElementById('password_confirmation-error');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); // Get the CSRF token from the meta tag

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        nameError.innerText = '';
        emailError.innerText = '';
        passwordError.innerText = '';
        passwordConfirmationError.innerText = '';

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
                // Redirect to the login page on success
                window.location.href = data.redirect;
            } else {
                // Display errors
                if (data.errors) {
                    nameError.innerText = data.errors.name ? data.errors.name[0] : '';
                    emailError.innerText = data.errors.email ? data.errors.email[0] : '';
                    passwordError.innerText = data.errors.password ? data.errors.password[0] : '';
                    passwordConfirmationError.innerText = data.errors.password_confirmation ? data.errors.password_confirmation[0] : '';
                }
            }
        })
        .catch(error => console.error('Error:', error));
    });
});
