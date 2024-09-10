@extends('books.layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <!-- Header -->
        <div class="col-12 text-center" style="background-color: greenyellow;">
            <label class="form-label text-black fw-bold fs-2">Books</label>
        </div>

        <!-- Search and Add Buttons -->
        <div class="col-12 mt-3">
            <div class="row">
                <div class="offset-0 offset-lg-2 col-12 col-lg-8 mb-3">
                    <div class="row">
                        <!-- Search Input -->
                        <div class="col-6">
                            <input type="text" class="form-control" id="bsearch" placeholder="Search by title, author, genre..." onkeypress="handleKeyPress(event)" />
                        </div>
                        <!-- Search Button -->
                        <div class="col-3 d-grid">
                            <button class="btn btn-outline-success" onclick="searchBooks(0);">Search</button>
                        </div>
                        <!-- Add New Button -->
                        <div class="col-3 d-grid">
                            <a href="{{ url('/books/create') }}" class="btn btn-outline-primary">Add New</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Book Listing Header -->
        <div class="col-12 mt-3 mb-3" style="background-color: greenyellow;">
            <div class="row text-black">
                <div class="col-4 py-2" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    <span class="fs-4">Title</span>
                </div>
                <div class="col-2 py-2">
                    <span class="fs-4">Author</span>
                </div>
                <div class="col-2 py-2">
                    <span class="fs-4">Genre</span>
                </div>
                <div class="col-2 py-2">
                    <span class="fs-4">Publication Date</span>
                </div>
                <div class="col-2 py-2">
                    <span class="fs-4">Actions</span>
                </div>
            </div>
        </div>

        <!-- Books Results -->
        <div class="col-12" id="bookResults">
            @foreach($books as $book)
            <div class="col-12 mt-3 mb-3">
                <div class="row align-items-stretch">
                    <!-- Book Title -->
                    <div class="col-4 bg-light py-2 text-truncate" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        <span class="fs-4 text-dark">{{ $book->title }}</span>
                    </div>
                    <!-- Book Author -->
                    <div class="col-2 bg-light py-2">
                        <span class="fs-4">{{ $book->author }}</span>
                    </div>
                    <!-- Book Genre -->
                    <div class="col-2 bg-light py-2">
                        <span class="fs-4">{{ $book->genre }}</span>
                    </div>
                    <!-- Publication Date -->
                    <div class="col-2 bg-light py-2">
                        <span class="fs-4">{{ $book->publication_date }}</span>
                    </div>
                    <!-- Actions (Edit and Delete Buttons) -->
                    <div class="col-3 bg-white py-2 d-flex">
                        <!-- Edit Button -->
                        <a href="{{ url('/books/' . $book->id . '/edit') }}" class="col-7 btn btn-outline-secondary me-1">Edit</a>
                        <!-- Delete Button -->
                        <form method="POST" action="{{ url('/books/' . $book->id) }}" accept-charset="UTF-8" style="display:inline-block" class="col-7">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-outline-danger w-100" title="Delete Book" onclick="return confirm('Confirm delete?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="col-12 d-flex justify-content-center text-center mb-3">
                <nav aria-label="Page navigation example">
                    <div class="d-flex flex-row">
                        <!-- Previous Page Button -->
                        <div class="bg-success fs-2 rounded-1 px-2 mx-1" @if ($books->currentPage() <= 1) style="pointer-events: none; opacity: 0.5;" @else onclick="window.location = '{{ $books->previousPageUrl() }}'" @endif>&laquo;</div>

                        <!-- Page Numbers -->
                        @for ($page = 1; $page <= $books->lastPage(); $page++)
                            <div class="fs-2 px-2 @if ($page == $books->currentPage()) bg-primary @endif" onclick="window.location = '{{ $books->url($page) }}'">{{ $page }}</div>
                        @endfor

                        <!-- Next Page Button -->
                        <div class="bg-success fs-2 rounded-1 px-2 mx-1" @if ($books->currentPage() >= $books->lastPage()) style="pointer-events: none; opacity: 0.5;" @else onclick="window.location = '{{ $books->nextPageUrl() }}'" @endif>&raquo;</div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<script>
    function searchBooks(page = 1) {
        const query = document.getElementById('bsearch').value.trim();
        window.location.href = "{{ url('/books') }}?search=" + encodeURIComponent(query) + "&page=" + page;
    }

    function handleKeyPress(event) {
        if (event.key === "Enter") {
            searchBooks(0); // Call search when "Enter" is pressed
        }
    }
</script>

@endsection
