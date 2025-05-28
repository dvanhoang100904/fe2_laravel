<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Models\Comment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'homeDefault'])->name('home');

Route::get('products/search', [ProductController::class, 'search'])->name('products.search');
Route::get('products/{id}', [ProductController::class, 'show'])->name('products.user.show');
Route::get('categories/{id}', [CategoryController::class, 'show'])->name('categories.user.show');

// Route::resource('comments', CommentController::class);
Route::post('products/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

Route::get('/admin', function () {
    return view('admin.home');
});

Route::prefix('admin')->group(function () {
    Route::get('products/bin', [ProductController::class, 'bin'])->name('products.bin');
    Route::patch('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');

    Route::delete('products/{id}/force-delete', [ProductController::class, 'forceDelete'])->name('products.forceDelete');
    Route::delete('products/empty', [ProductController::class, 'empty'])->name('products.empty');
    
    Route::resource('products', ProductController::class);

    Route::resource('categories', CategoryController::class);
});