<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderListController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\HTTP;

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware('auth_check')->group(function () {

    Route::get('/registerPage', [AuthController::class, 'registerPage'])->name('registerPage');

    Route::get('/loginPage', [AuthController::class, 'loginPage'])->name('loginPage');
});

Route::middleware('auth')->group(function () {

    Route::group(['middleware' => 'auth_admin'], function () {

        //Admin Account Profile Detail
        Route::prefix('admins')->group(function () {

            Route::get('/viewAdminList', [AuthController::class, 'viewAdminList'])->name('account#adminList');

            Route::get('/viewUserList', [AuthController::class, 'viewUserList'])->name('account#userList');

            Route::get('/changeRole/{role}/{id}', [AuthController::class, 'changeRole'])->name('account#changeRole');

            Route::get('/suspend/{id}', [AuthController::class, 'suspend'])->name('account#suspend');

            Route::get('/unsuspend/{id}', [AuthController::class, 'unsuspend'])->name('account#unsuspend');

            Route::get('/delete/{id}', [AuthController::class, 'deleteAccount'])->name('account#delete');
        });

        //Admin CRUD Author
        Route::prefix('authors')->group(function () {
            Route::get('/list', [AuthorController::class, 'showAuthorList'])->name('author#list');

            Route::get('/add', [AuthorController::class, 'addAuthor'])->name('author#add');

            Route::post('/create', [AuthorController::class, 'createAuthor'])->name('author#create');

            Route::get('/delete/{id}', [AuthorController::class, 'deleteAuthor'])->name('author#delete');

            Route::get('/view/{id}', [AuthorController::class, 'viewAuthor'])->name('author#view');

            Route::get('/edit/{id}', [AuthorController::class, 'editAuthor'])->name('author#edit');

            Route::post('/update', [AuthorController::class, 'updateAuthor'])->name('author#update');

            Route::get('/viewBooks/{id}', [AuthorController::class, 'viewBooks'])->name('author#viewBooks');
        });

        //Admin CRUD Category
        Route::prefix('categories')->group(function () {
            Route::get('/list', [CategoryController::class, 'showCategoryList'])->name('category#list');

            Route::post('/create', [CategoryController::class, 'createCategory'])->name('category#create');

            Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category#delete');

            Route::post('/update', [CategoryController::class, 'updateCategory'])->name('category#update');
        });

        //Admin CRUD Book
        Route::prefix('books')->group(function () {
            Route::get('/list', [BookController::class, 'showBookList'])->name('book#list');

            Route::get('/add', [BookController::class, 'addBook'])->name('book#add');

            Route::post('/create', [BookController::class, 'createBook'])->name('book#create');

            Route::get('/view/{id}', [BookController::class, 'viewBook'])->name('book#view');

            Route::get('/delete/{id}', [BookController::class, 'deleteBook'])->name('book#delete');

            Route::get('/edit/{id}', [BookController::class, 'editBook'])->name('book#edit');

            Route::post('/update', [BookController::class, 'updateBook'])->name('book#update');
        });
    });

    Route::group(['middleware' => 'auth_user'], function () {
        //User

    });

    Route::prefix('account')->group(function () {
        Route::get('/viewDetail', [AuthController::class, 'viewDetail'])->name('account#detail');

        Route::get('/editDetail', [AuthController::class, 'editDetail'])->name('account#edit');

        Route::post('/updateDetail', [AuthController::class, 'updateDetail'])->name('account#update');
    });

    Route::prefix('comments')->group(function () {

        Route::post('/create', [CommentController::class, 'createComment'])->name('comment#create');

        Route::get('/edit/{id}', [CommentController::class, 'editComment'])->name('comment#edit');

        Route::post('/update/{id}', [CommentController::class, 'updateComment'])->name('comment#update');

        Route::get('/delete/{id}', [CommentController::class, 'deleteComment'])->name('comment#delete');
    });

    Route::prefix('carts')->group(function () {
        Route::get('/add', [CartController::class, 'addCart'])->name('cart#add');

        Route::get('/view/{userName}', [CartController::class, 'viewCart'])->name('cart#view');

        Route::get('/deleteList', [CartController::class, 'deleteCart'])->name('cart#delete');

        Route::get('/clear', [CartController::class, 'clearCart'])->name('cart#clear');

        Route::get('/order', [CartController::class, 'order'])->name('cart#order');
    });

    Route::prefix('orders')->group(function () {

        Route::get('/history/{userId}', [OrderListController::class, 'orderHistory'])->name('order#history');

        Route::get('/list/{orderCode}', [OrderItemController::class, 'historyList'])->name('order#list');

        Route::get('/success', [OrderItemController::class, 'orderSuccess'])->name('order#success');
    });
});

Route::get('/', [BookController::class, 'getAllBooks'])->name('book#all');

Route::get('/books/all', [BookController::class, 'getAllBooks'])->name('book#all');

Route::get('/downloadBook/{id}', [BookController::class, 'download'])->name('download#book');

Route::get('/books/detail/{id}', [BookController::class, 'viewBookDetail'])->name('book#detail');

Route::get('/categories/filter/{id}', [BookController::class, 'catFilter'])->name('category#filter');

Route::get('/authors/filter/{id}', [BookController::class, 'autFilter'])->name('author#filter');

Route::get('/prices/filter/{amount}', [BookController::class, 'priceFilter'])->name('price#filter');