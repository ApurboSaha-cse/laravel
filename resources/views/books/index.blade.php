@extends('layout')

@section('page-content')
<h1>Bookstore</h1>
<div class="row">
    <div class="col-lg-12">
        <p class="text-right">
            <a href="{{route('books.create')}}" class="btn btn-success"><i class="bi bi-plus-circle"></i> Add Book</a>
    </div>
</div>
<table class= "table table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Author</th> 
        <th>Price</th>
        <th colspan="2">Action</th>
    </tr>
    @foreach($books as $book)
    <tr>
        <td>{{ $book->id }}</td>
        <td>{{ $book->title }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->price }}</td>
        <td><a href="{{route('books.show', $book->id)}}">View</a></td>
        <td><a href="{{route('books.edit', $book->id)}}">Edit</a></td>

    </tr>
    @endforeach
</table>
{{ $books->links()}}
@endsection


