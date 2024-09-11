@extends('books.layout')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="jumbotron d-none d-lg-block" style="background-color: greenyellow;">
            <h1 class="fs-2 mt-4">Add Book</h1>
            <p class="lead mx-1">"I hid my deepest feelings so well I forgot where I placed them." <br>&nbsp;~Amy Tan~</p>
            <hr class="my-4 text-success">
        </div>
        <div class="col-5 d-none d-lg-block border-end border-dark">
            <div class="row p-5">
                <div class="col-12">
                    <div class="row">
                        <img src="{{ asset('build/assets/prettyladydress.svg') }}" class="prettylady">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row mt-5 p-4 d-flex justify-content-center">
                <div class="row mt-4">
                    <form id="book-form" action="{{ route('books.store') }}" method="post">
                        @csrf

                        <!-- Title -->
                        <div class="col-12 mb-2">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                            <div id="title-error" class="text-danger"></div>
                        </div>

                        <!-- Author -->
                        <div class="col-12 mb-2">
                            <label class="form-label">Author</label>
                            <input type="text" name="author" id="author" class="form-control">
                            <div id="author-error" class="text-danger"></div>
                        </div>

                        <!-- Published Date -->
                        <div class="col-12 mb-2">
                            <label class="form-label">Published Date</label>
                            <input type="date" name="publication_date" id="publication_date" class="form-control">
                            <div id="date-error" class="text-danger"></div>
                        </div>

                        <!-- Genre -->
                        <div class="col-12 mb-2">
                            <label class="form-label">Genre</label>
                            <input type="text" name="genre" id="genre" class="form-control">
                            <div id="genre-error" class="text-danger"></div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 d-grid mt-3">
                            <button class="btn btn-outline-success" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/create.js') }}"></script> <!-- Include the JS file -->

@endsection
