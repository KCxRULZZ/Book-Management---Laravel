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
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                // Clear previous error messages
                document.getElementById('title-error').innerText = '';
                document.getElementById('author-error').innerText = '';
                document.getElementById('date-error').innerText = '';
                document.getElementById('genre-error').innerText = '';

                if (data.errors) {
                    // Display validation errors
                    if (data.errors.title) {
                        document.getElementById('title-error').innerText = data.errors.title[0];
                    }
                    if (data.errors.author) {
                        document.getElementById('author-error').innerText = data.errors.author[0];
                    }
                    if (data.errors.publication_date) {
                        document.getElementById('date-error').innerText = data.errors.publication_date[0];
                    }
                    if (data.errors.genre) {
                        document.getElementById('genre-error').innerText = data.errors.genre[0];
                    }
                } else {
                    // Redirect or handle successful response
                    window.location.href = data.redirect; // Assuming your server sends a redirect URL
                }
            })
            .catch(error => console.error('Error:', error));
        });
    }
});
