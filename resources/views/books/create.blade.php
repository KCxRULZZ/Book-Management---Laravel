@extends('books.layout')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Add New Book</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/books') }}" method="post" id="bookForm">
                        @csrf
                        
                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                            <div class="text-danger" id="titleError"></div>
                        </div>
                        
                        <!-- Author -->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" name="author" id="author" class="form-control">
                            <div class="text-danger" id="authorError"></div>
                        </div>
                        
                        <!-- Published Date -->
                        <div class="mb-3">
                            <label for="publication_date" class="form-label">Published Date</label>
                            <input type="date" name="publication_date" id="publication_date" class="form-control">
                            <div class="text-danger" id="dateError"></div>
                        </div>
                        
                        <!-- Genre -->
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" name="genre" id="genre" class="form-control">
                            <div class="text-danger" id="genreError"></div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('bookForm').addEventListener('submit', function(event) {
        // Clear previous errors
        document.getElementById('titleError').innerText = '';
        document.getElementById('authorError').innerText = '';
        document.getElementById('dateError').innerText = '';
        document.getElementById('genreError').innerText = '';

        // Get form values
        const title = document.getElementById('title').value.trim();
        const author = document.getElementById('author').value.trim();
        const publicationDate = document.getElementById('publication_date').value;
        const genre = document.getElementById('genre').value.trim();

        let isValid = true;

        // Validate title
        if (title === '') {
            document.getElementById('titleError').innerText = 'Title is required.';
            isValid = false;
        }

        // Validate author
        if (author === '') {
            document.getElementById('authorError').innerText = 'Author is required.';
            isValid = false;
        }

        // Validate publication date
        if (publicationDate === '') {
            document.getElementById('dateError').innerText = 'Published date is required.';
            isValid = false;
        } else {
            const selectedDate = new Date(publicationDate);
            const today = new Date();
            if (selectedDate > today) {
                document.getElementById('dateError').innerText = 'Published date cannot be in the future.';
                isValid = false;
            }
        }

        // Validate genre
        if (genre === '') {
            document.getElementById('genreError').innerText = 'Genre is required.';
            isValid = false;
        }

        // Prevent form submission if there are validation errors
        if (!isValid) {
            event.preventDefault();
        }
    });
</script>

@endsection
