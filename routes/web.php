<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\HTTP;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [BookController::class, 'getAllBooks'])->name('book#all');

Route::get('/books/all', [BookController::class, 'getAllBooks'])->name('book#all');

//CRUD
Route::get('/books/list', [BookController::class, 'showBookList'])->name('book#list');

Route::get('/books/add', [BookController::class, 'addBook'])->name('book#add');

Route::post('/books/create', [BookController::class, 'createBook'])->name('book#create');

Route::get('/books/view/{id}', [BookController::class, 'viewBook'])->name('book#view');

Route::get('/books/delete/{id}', [BookController::class, 'deleteBook'])->name('book#delete');

Route::get('/books/edit/{id}', [BookController::class, 'editBook'])->name('book#edit');

Route::post('/books/update', [BookController::class, 'updateBook'])->name('book#update');