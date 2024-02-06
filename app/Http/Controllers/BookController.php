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

    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $books = Book::where('title', 'like', '%'.$request->input('search').'%')
            ->orWhere('author', 'like', '%'.$request->input('search').'%')
            ->paginate(10);
        }
        else
        {
            $books = Book::paginate(10);
        }
        

        
        return view('books.index')->with('books', $books);
    }

    public function show($bookId)
    {
        $book = Book::find($bookId);
        return view('books.show')->with('book', $book);
    }
    public function create()
    {
        return view('books.create');
    }
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|digits:13|numeric|integer',
            'stock' => 'required|numeric|integer|min:0',
            'price' => 'required|numeric'
        ];
        $request->validate($rules);
        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->stock = $request->input('stock');
        $book->price = $request->input('price');
        $book->save();
        return redirect()->route('books.show', $book->id);
    }


    public function edit($bookId)
    {
        $book = Book::find($bookId);
        return view('books.edit')->with('book', $book);
    }

    public function update(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'isbn' => 'required|digits:13|numeric|integer',
            'stock' => 'required|numeric|integer|min:0',
            'price' => 'required|numeric'
        ];
        $request->validate($rules);

        $book = Book::find($request->input('id'));
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->isbn = $request->input('isbn');
        $book->stock = $request->input('stock');
        $book->price = $request->input('price');
        $book->save();
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->input('id'));
        $book->delete();
        return redirect()->route('books.index');
    }
    
}
