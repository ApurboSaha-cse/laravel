@extends('layout')

@section('page-content')
<h1>Bookstore</h1>
<table class= "table table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th> 
        <th>Price</th>
        <th>Action</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
        <td><a href="{{route('books.show', $book->id)}}">view</a></td>

    </tr>
    @endforeach
</table>
@endsection


