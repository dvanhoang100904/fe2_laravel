<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/all', [ProductController::class, 'productsAllAPI'])->name('product-all-api');
Route::get('/products/search/{keyword}', [ProductController::class, 'searchAPI']);
Route::post('/products/{id}/comment', [CommentController::class, 'storeAPI'])->name('comments.store-api');
