@extends('books.layout')
@section('content')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Book</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('books/' . $book->id) }}" method="post" onsubmit="return validateForm()">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" name="id" id="id" value="{{ $book->id }}" />

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" value="{{ $book->title }}" class="form-control">
                            <div id="title-error" class="text-danger"></div>
                        </div>
                        
                        <!-- Author -->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" name="author" id="author" value="{{ $book->author }}" class="form-control">
                            <div id="author-error" class="text-danger"></div>
                        </div>

                        <!-- Published Date -->
                        <div class="mb-3">
                            <label for="publication_date" class="form-label">Published Date</label>
                            <input type="date" name="publication_date" id="publication_date" value="{{ $book->publication_date }}" class="form-control">
                            <div id="date-error" class="text-danger"></div>
                        </div>
                        
                        <!-- Genre -->
                        <div class="mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input type="text" name="genre" id="genre" value="{{ $book->genre }}" class="form-control">
                            <div id="genre-error" class="text-danger"></div>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function validateForm() {
    let isValid = true;
    
    // Clear any previous errors
    document.getElementById('title-error').innerText = '';
    document.getElementById('author-error').innerText = '';
    document.getElementById('date-error').innerText = '';
    document.getElementById('genre-error').innerText = '';

    // Validate Title
    const title = document.getElementById('title').value;
    if (!title) {
        document.getElementById('title-error').innerText = 'Title is required.';
        isValid = false;
    }

    // Validate Author
    const author = document.getElementById('author').value;
    if (!author) {
        document.getElementById('author-error').innerText = 'Author is required.';
        isValid = false;
    }

    // Validate Published Date
    const publicationDate = document.getElementById('publication_date').value;
    const today = new Date().toISOString().split('T')[0]; // Get today's date in 'YYYY-MM-DD' format
    if (!publicationDate) {
        document.getElementById('date-error').innerText = 'Published date is required.';
        isValid = false;
    } else if (publicationDate > today) {
        document.getElementById('date-error').innerText = 'Published date cannot be in the future.';
        isValid = false;
    }

    // Validate Genre
    const genre = document.getElementById('genre').value;
    if (!genre) {
        document.getElementById('genre-error').innerText = 'Genre is required.';
        isValid = false;
    }

    return isValid;
}
</script>

@endsection
