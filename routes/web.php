<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

// Default route: Login page becomes the welcome page (index page)
Route::get('/', [UserController::class, 'showLoginForm'])->name('welcome');

// Registration routes
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register'])->name('register.submit');

// Login routes
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.submit');

// Logout route
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Protect routes that require authentication
Route::middleware('auth')->group(function () {
    // Book routes
    Route::get('/books', [BookController::class, 'index'])->name('books.index'); // Index route with pagination
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    // Example of a protected dashboard route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
