@extends('books.layout')
@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>View Book Details</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <h4><strong>Title:</strong> {{ $book->title }}</h4>
                </div>
                <div class="mb-3">
                    <h5><strong>Author:</strong> {{ $book->author }}</h5>
                </div>
                <div class="mb-3">
                    <h5><strong>Published Date:</strong> {{ \Carbon\Carbon::parse($book->publication_date)->format('d M, Y') }}</h5>
                </div>
                <div class="mb-3">
                    <h5><strong>Genre:</strong> {{ $book->genre }}</h5>
                </div>
                
                <!-- Back Button -->
                <a href="{{ url('/books') }}" class="btn btn-primary">Back</a>
                <!-- Edit Button -->
                <a href="{{ url('books/' . $book->id . '/edit') }}" class="btn btn-warning">Edit</a>
                <!-- Delete Button -->
                <form method="POST" action="{{ url('/books' . $book->id) }}" accept-charset="UTF-8" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm delete?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
