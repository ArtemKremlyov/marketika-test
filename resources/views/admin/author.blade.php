@extends('layouts.admin')
@section('page-title') {{$author->name}} @endsection

@section('content')
    <div class="container">
        <h1 class="card-title text-center mt-5 mb-5">{{$author->name}}</h1>
        <div class="row">
            <div class="card mb-5 w-50 col-6">
                <ul class="list-group-flush list-group mb-2">
                    <li class="list-group-item">Author Id: <span class="font-weight-bold">{{$author->id}}</span></li>
                    <li class="list-group-item">Name: <span class="font-weight-bold">{{$author->name}}</span></li>
                    <li class="list-group-item">Birthdate: <span class="font-weight-bold">{{$author->birthdate}}</span></li>
                    <li class="list-group-item">About: <span class="font-weight-bold">{{$author->description}}</span></li>
                    <li class="list-group-item">Books count: <span class="font-weight-bold">{{$author->books->count()}}</span></li>
                    <li class="list-group-item">Created at: <span class="font-weight-bold">{{$author->created_at}}</span></li>
                    <li class="list-group-item">Last update: <span class="font-weight-bold">{{$author->updated_at}}</span></li>
                </ul>
                <div class="row d-flex flex-column align-items-center">
                    <a href="{{route('authors.edit', $author)}}" class="btn btn-primary mb-2">Edit author info</a>
                    <form action="{{route('authors.destroy', $author)}}" method="POST" class="mb-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="{{route('authors.index')}}" class="btn btn-dark mb-2">Back to authors page</a>
                </div>
            </div>
            <div class="col-6 d-flex flex-column align-items-start">
                <div class="card">
                    <h5 class="card-title">Author books:</h5>
                    <div class="card-header d-flex">
                        <div class="col-6">Title</div>
                        <div class="col-6">Desc</div>
                    </div>
                    <ul class="list-group overflow-auto h-100" style="max-height: 500px">
                        @foreach($author->books as $book)
                            <li class="list-group-item">
                                <a href="{{route('books.show', $book)}}" target="_blank" class="d-flex">
                                    <div class="col-6">{{$book->title}}</div>
                                    <div class="col-6">{{$book->description}}</div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
