document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('book-form');

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            const formData = new FormData(form); // Collect form data

            fetch(form.action, {
                method: 'POST', // Use POST for creating new resources
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json' // Expect JSON response
                }
            })
            .then(response => {
                if (!response.ok) {
                    // Check if the response is not OK, handle error
                    return response.json().then(errorData => Promise.reject(errorData));
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Redirect to books page if successful
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                // Clear previous error messages
                document.getElementById('title-error').innerText = '';
                document.getElementById('author-error').innerText = '';
                document.getElementById('date-error').innerText = '';
                document.getElementById('genre-error').innerText = '';

                // Display validation errors
                if (error.errors) {
                    if (error.errors.title) {
                        document.getElementById('title-error').innerText = error.errors.title[0];
                    }
                    if (error.errors.author) {
                        document.getElementById('author-error').innerText = error.errors.author[0];
                    }
                    if (error.errors.publication_date) {
                        document.getElementById('date-error').innerText = error.errors.publication_date[0];
                    }
                    if (error.errors.genre) {
                        document.getElementById('genre-error').innerText = error.errors.genre[0];
                    }
                }
            });
        });
    }
});
