@extends('layouts.admin')
@section('page-title') Create book @endsection

@section('content')
    <div class="container">
        <h1 class="text-center m-3">Create Book</h1>
        <form action="{{route('books.store')}}" method="POST">
            @csrf
            <div class="row mb-2">
                <input type="text" name="title" placeholder="Book title" class="form-control">
            </div>
            <div class="row mb-2">
                <select name="author_id" class="form-control">
                    <option disabled selected>Book Author</option>
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row mb-3">
                <textarea name="description" class="form-control" placeholder="Book description"></textarea>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Create</button>
            </div>
        </form>
    </div>
@endsection
