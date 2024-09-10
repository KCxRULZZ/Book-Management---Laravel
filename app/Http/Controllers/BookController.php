<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request): View
{
    // Get the search term from the request
    $search = $request->input('search');

    // Check if there's a search term
    if ($search) {
        // If there's a search term, filter books based on title, author, or genre
        $books = Book::where('title', 'like', '%' . $search . '%')
            ->orWhere('author', 'like', '%' . $search . '%')
            ->orWhere('genre', 'like', '%' . $search . '%')
            ->orderBy('title', 'asc')
            ->paginate(10); // Use pagination
    } else {
        // If no search term, retrieve all books with pagination
        $books = Book::orderBy('title', 'asc')->paginate(10); // Use pagination
    }

    return view('books.index')->with('books', $books);
}


    public function create(): View
    {
        return view('books.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'publication_date' => 'required|date|before_or_equal:today',
        ]);

        // Create the book with validated data
        Book::create($validatedData);

        return redirect('books')->with('flash_message', 'Book Added!');
    }

    public function show(string $id): View
    {
        $book = Book::find($id);
        return view('books.show')->with('book', $book);
    }

    public function edit(string $id): View
    {
        $book = Book::find($id);
        return view('books.edit')->with('book', $book);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'publication_date' => 'required|date|before_or_equal:today',
        ]);

        // Find the book by ID and update with validated data
        $book = Book::find($id);
        $book->update($validatedData);

        return redirect('books')->with('flash_message', 'Book Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Book::destroy($id);
        return redirect('books')->with('flash_message', 'Book deleted!');
    }
}

