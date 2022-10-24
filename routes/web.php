<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\OrderListController;
use App\Http\Controllers\ViewController;
use App\Models\Contact;
use App\Models\OrderList;
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

        //Admin Dashboard
        Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin#dashboard');

        //Admin Account Profile Detail
        Route::prefix('admins')->group(function () {

            Route::get('/viewAdminList', [AuthController::class, 'viewAdminList'])->name('account#adminList');

            Route::get('/viewUserList', [AuthController::class, 'viewUserList'])->name('account#userList');

            Route::get('/changeRole/{role}/{id}', [AuthController::class, 'changeRole'])->name('account#changeRole');

            Route::get('/suspend/{id}', [AuthController::class, 'suspend'])->name('account#suspend');

            Route::get('/unsuspend/{id}', [AuthController::class, 'unsuspend'])->name('account#unsuspend');

            Route::get('/delete/{id}', [AuthController::class, 'deleteAccount'])->name('account#delete');

            Route::get('account/viewDetail', [AuthController::class, 'viewDetail'])->name('account#detail');

            Route::get('account/editDetail', [AuthController::class, 'editDetail'])->name('account#edit');

            Route::post('account/updateDetail', [AuthController::class, 'updateDetail'])->name('account#update');

            Route::get('account/changePassword/{id}', [AuthController::class, 'adminChangePasswordPage'])->name('admin#changePassword');

            Route::post('/account/changePassword', [AuthController::class, 'changeAdminPassword'])->name('adminPassword#change');
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

        //Admin Manage Order
        Route::prefix('orders')->group(function () {

            Route::get('/viewList', [OrderListController::class, 'orderList'])->name('order#viewList');

            Route::get('chooseStatus/{status}', [OrderListController::class, 'orderStatus'])->name('order#statusChoose');

            Route::get('/changeStatus/{id}/{status}', [OrderListController::class, 'changeStatus'])->name('order#status');

            Route::get('/viewListDetail/{code}/{status}', [OrderItemController::class, 'orderListDetail'])->name('order#detail');
        });

        //Admin Manage Comment
        Route::prefix('comments')->group(function () {

            Route::get('/list', [CommentController::class, 'showCommentList'])->name('comment#list');

            Route::get('/ban/{id}', [CommentController::class, 'deleteCommentByAdmin'])->name('comment#ban');

            Route::get('/check/{id}', [CommentController::class, 'checkComment'])->name('comment#check');
        });

        //Admin Manage Contacts
        Route::prefix('contacts')->group(function () {

            Route::get('/list', [ContactController::class, 'list'])->name('contact#list');

            Route::get('/chooseList/{status}', [ContactController::class, 'chooseList'])->name('contact#chooseList');

            Route::get('/changeStatus/{id}/{status}', [ContactController::class, 'changeStatus'])->name('contact#status');

            Route::get('/view/{id}', [ContactController::class, 'view'])->name('contact#view');
        });

        Route::get('/admin/manage/{role}', [AuthController::class, 'goAdmin'])->name('admin');
    });

    Route::group(['middleware' => 'auth_user'], function () {

        //User
        Route::prefix('user')->group(function () {

            Route::get('account/viewDetail', [AuthController::class, 'viewUserDetail'])->name('user#detail');

            Route::get('account/editDetail', [AuthController::class, 'editUserDetail'])->name('user#edit');

            Route::post('account/updateDetail', [AuthController::class, 'updateUserDetail'])->name('user#update');

            Route::get('account/changePassword/{id}', [AuthController::class, 'changePasswordPage'])->name('user#changePassword');

            Route::post('/account/changePassword', [AuthController::class, 'changeUserPassword'])->name('password#change');
        });
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

    Route::prefix('contacts')->group(function () {

        Route::get('/page', [ContactController::class, 'contact'])->name('contact#page');

        Route::post('/send', [ContactController::class, 'send'])->name('contact#send');

        Route::get('/success', [ContactController::class, 'success'])->name('contact#success');
    });

    Route::prefix('comments')->group(function () {

        Route::post('/create', [CommentController::class, 'createComment'])->name('comment#create');

        Route::get('/edit/{id}', [CommentController::class, 'editComment'])->name('comment#edit');

        Route::post('/update/{id}', [CommentController::class, 'updateComment'])->name('comment#update');

        Route::get('/delete/{id}', [CommentController::class, 'deleteComment'])->name('comment#delete');
    });
});

Route::get('/', [BookController::class, 'getAllBooks'])->name('book#all');

Route::get('/books/all', [BookController::class, 'getAllBooks'])->name('book#all');

Route::get('/downloadBook/{id}', [BookController::class, 'download'])->name('download#book');

Route::get('/books/detail/{id}', [BookController::class, 'viewBookDetail'])->name('book#detail');

Route::get('/view/{bookId}', [CommentController::class, 'viewComment'])->name('comment#view');

Route::get('/categories/filter/{id}', [BookController::class, 'catFilter'])->name('category#filter');

Route::get('/authors/filter/{id}', [BookController::class, 'autFilter'])->name('author#filter');

Route::get('/prices/filter/{amount}', [BookController::class, 'priceFilter'])->name('price#filter');

Route::get('/mode/changeMode', [ViewController::class, 'changeMode'])->name('mode#changeMode');