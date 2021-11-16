<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Http\Controllers\BooksApiController;
use App\Http\Controllers\WishlistApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/books', [BooksApiController::class, 'index']);

Route::post('/books', [BooksApiController::class, 'store']);

Route::put('/books/{book}', [BooksApiController::class, 'update']);

Route::delete('/books/{book}', [BooksApiController::class, 'delete']);

Route::get('/wishlist/{user}', [WishlistApiController::class, 'getUserWishlist']);

Route::post('/wishlist', [WishlistApiController::class, 'store']);

Route::put('/wishlist/{wishlist}', [WishlistApiController::class, 'update']);

Route::delete('/wishlist/{wishlist}', [WishlistApiController::class, 'delete']);
