<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\memberController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PublicController::class, 'index']);
Route::get('list-books', [PublicController::class, 'home']);

Route::middleware('only_guest')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticating']);
    Route::get('/home', [AuthController::class, 'home']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('only_admin');

    // Category Route
    Route::get('categories', [CategoryController::class, 'index'])->middleware('only_admin');
    Route::get('categories/create', [CategoryController::class, 'create'])->middleware('only_admin');
    Route::post('categories', [CategoryController::class, 'store'])->middleware('only_admin');
    Route::get('category-edit/{slug}', [CategoryController::class, 'edit'])->middleware('only_admin');
    Route::put('category-edit/{slug}', [CategoryController::class, 'update'])->middleware('only_admin');
    Route::get('category-delete/{slug}', [CategoryController::class, 'delete'])->middleware('only_admin');
    Route::get('category-destroy/{slug}', [CategoryController::class, 'destroy'])->middleware('only_admin');
    Route::get('category-deleted', [CategoryController::class, 'deletedCategory'])->middleware('only_admin');
    Route::get('category-restore/{slug}', [CategoryController::class, 'restore'])->middleware('only_admin');
    
    // Members Route
    Route::resource('/members', App\Http\Controllers\MemberController::class)->middleware('only_admin');
    Route::get('members', [MemberController::class, 'index'])->middleware('only_admin');
    Route::get('/member-details/{slug}', [MemberController::class, 'show'])->middleware('only_admin');
    Route::get('/members-approve/{slug}', [MemberController::class, 'approve'])->middleware('only_admin');
    Route::get('/registered-user', [MemberController::class, 'registeredUser'])->middleware('only_admin');
    Route::get('user-ban/{slug}', [MemberController::class, 'delete'])->middleware('only_admin');
    Route::get('user-destroy/{id}', [MemberController::class, 'destroy'])->middleware('only_admin');
    Route::get('members-restore/{slug}', [MemberController::class, 'restore'])->middleware('only_admin');

    Route::get('profile', [UserController::class, 'profile'])->middleware('only_client');
    
    // Books Route
    Route::resource('/books', App\Http\Controllers\BookController::class)->middleware('only_admin');
    Route::post('/books/update/{slug}',[App\Http\Controllers\BookController::class, 'update'])->middleware('only_admin');
    Route::put('/books-edit/{slug}', [BookController::class, 'update'])->middleware('only_admin');
    Route::get('/books-delete/{slug}', [BookController::class, 'delete'])->middleware('only_admin');
    Route::get('/books-destroy/{slug}', [BookController::class, 'destroy'])->middleware('only_admin');
    Route::get('books-restore/{slug}', [BookController::class, 'restore'])->middleware('only_admin');
    Route::get('books-deleted', [BookController::class, 'deletedBook'])->middleware('only_admin');
    Route::get('book-return', [BookController::class, 'bookReturn'])->middleware('only_admin');
    Route::post('book-return', [BookController::class, 'savebookReturn'])->middleware('only_admin');
    
    //Transactions
    Route::get('transactions', [TransactionController::class, 'index'])->middleware('only_admin');
    Route::post('transactions', [TransactionController::class, 'store'])->middleware('only_admin');
    
    
});
