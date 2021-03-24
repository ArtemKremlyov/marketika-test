@extends('layouts.admin')
@section('page-title') {{$book->title}} @endsection

@section('content')
    <div class="container">
        <h1 class="card-title text-center mt-5 mb-5">{{$book->title}}</h1>
        <div class="row">
            <div class="card mb-5 w-50 col-6">
                <ul class="list-group-flush list-group">
                    <li class="list-group-item">Book Id: <span class="font-weight-bold">{{$book->id}}</span></li>
                    <li class="list-group-item">Title: <span class="font-weight-bold">{{$book->title}}</span></li>
                    <li class="list-group-item">Description: <span class="font-weight-bold">{{$book->description}}</span></li>
                    <li class="list-group-item">Author: <span class="font-weight-bold">{{$book->author->name ?? 'Unkown Author'}}</span></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item">Created at: <span class="font-weight-bold">{{$book->created_at}}</span></li>
                    <li class="list-group-item">Last update: <span class="font-weight-bold">{{$book->updated_at}}</span></li>
                </ul>
            </div>
            <div class="col-6 d-flex flex-column align-items-start">
                <a href="{{route('books.edit', $book)}}" class="btn btn-primary mb-2">Edit book info</a>
                <form action="{{route('books.destroy', $book)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
        <a href="{{route('books.index')}}" class="btn btn-danger">Back to books page</a>
    </div>
@endsection
