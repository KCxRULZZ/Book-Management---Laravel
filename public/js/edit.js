document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('edit-book-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Get CSRF token from the meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Prepare data to send
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'PUT', // Use the PUT method
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.message || 'Something went wrong');
                });
            }
            return response.json(); // Parse JSON if the response is OK
        })
        .then(data => {
            if (data.success) {
                // Handle success
                alert('Book updated successfully!');
                window.location.href = '/books';
            } else {
                // Handle errors
                console.error('Errors:', data.errors);
                document.getElementById('title-error').innerText = data.errors.title ? data.errors.title[0] : '';
                document.getElementById('author-error').innerText = data.errors.author ? data.errors.author[0] : '';
                document.getElementById('date-error').innerText = data.errors.publication_date ? data.errors.publication_date[0] : '';
                document.getElementById('genre-error').innerText = data.errors.genre ? data.errors.genre[0] : '';
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});
