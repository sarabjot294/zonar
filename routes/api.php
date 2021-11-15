<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Book;


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


Route::get('/books', function(){
    return Book::all();
});

Route::post('/books', function(){

    return Book::create([
        'title' => request('title'),
        'author' => request('author'),
        'isbn'=> request('isbn'),
        'date_of_publication' => request('date_of_publication'),
    ]);
});


Route::put('/books/{book}', function(Book $book){

    $success = $book->update([
        'title' => request('title'),
        'author' => request('author'),
        'isbn'=> request('isbn'),
        'date_of_publication' => request('date_of_publication'),
    ]);

    return [
        'success' => $success
    ];
});


Route::delete('/books/{book}', function(Book $book){

    $success = $book->delete();
    
    return [
        'success' => $success
    ];
});