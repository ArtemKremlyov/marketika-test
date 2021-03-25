@extends('layouts.admin')
@section('page-title') Create book @endsection

@section('content')
    <div class="container">
        <h1 class="text-center m-3">{{isset($book) ? 'Update' : 'Create'}} Book</h1>
        <form action="{{isset($book) ? route('books.update', $book) : route('books.store')}}" method="POST">
            @isset($book)
                @method('PUT')
            @endisset
            @csrf
            <div class="row mb-2">
                <input type="text" value="{{old('title' ,isset($book) ? $book->title : '')}}" name="title" placeholder="Book title" class="form-control">
                @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row mb-2">
                <select name="author_id" class="form-control">
                    <option disabled selected>Book Author</option>
                    @foreach($authors as $author)
                        @if(isset($book) && isset($book->author))
                            @if(!is_null(old('author_id')))
                                @if(old('author_id') == $author->id)
                                    <option selected value="{{$author->id}}">{{$author->name}}</option>
                                @endif
                            @else
                                @if($book->author->id == $author->id)
                                    <option selected value="{{$author->id}}">{{$author->name}}</option>
                                @else
                                    <option value="{{$author->id}}">{{$author->name}}</option>
                                @endif
                            @endif
                        @else
                            <option value="{{$author->id}}">{{$author->name}}</option>
                        @endif
                    @endforeach
                </select>
                @error('author_id')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <textarea name="description" class="form-control" placeholder="Book description">{{old('description' ,isset($book) ? $book->description : '')}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Send</button>
            </div>
        </form>
    </div>
@endsection
