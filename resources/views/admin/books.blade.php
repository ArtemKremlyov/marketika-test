@extends('layouts.admin')
@section('page-title') Books @endsection

@section('content')
    <div class="container">
        <h1 class="card-title text-center mt-5 mb-5 text-primary">All books</h1>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <th scope="row">{{$book->title}}</th>
                        <td>{{substr($book->description, 0, 75)}}...</td>
                        <td>{{$book->author->name ?? 'Unkown Author'}}</td>
                        <td>
                            <a href="{{route('books.show', $book)}}" class="btn btn-primary">Show</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-secondary">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('books.destroy', $book)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row d-flex justify-content-center">{{$books->links()}}</div>
    </div>
@endsection
