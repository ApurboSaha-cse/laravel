<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function index()
    {
        $books = Book::paginate(10);

        
        return view('books.index')->with('books', $books);
    }

    public function show($bookId)
    {
        $book = Book::find($bookId);
        return view('books.show')->with('book', $book);
    }
    
}
