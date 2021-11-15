<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksApiController extends Controller
{
    public function index()
    {
        return Book::all();
    }

    public function store()
    {
        return Book::create([
            'title' => request('title'),
            'author' => request('author'),
            'isbn'=> request('isbn'),
            'date_of_publication' => request('date_of_publication'),
        ]);
    }

    public function update(Book $book)
    {
        $success = $book->update([
            'title' => request('title'),
            'author' => request('author'),
            'isbn'=> request('isbn'),
            'date_of_publication' => request('date_of_publication'),
        ]);
    
        return [
            'success' => $success
        ];
    }

    public function delete(Book $book)
    {
        $success = $book->delete();

        return [
            'success' => $success
        ];
    }


}
