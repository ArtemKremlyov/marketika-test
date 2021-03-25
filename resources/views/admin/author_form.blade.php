@extends('layouts.admin')
@section('page-title') Create author @endsection

@section('content')
    <div class="container">
        <h1 class="text-center m-3">{{isset($author) ? 'Update' : 'Create'}} Author</h1>
        <form action="{{isset($author) ? route('authors.update', $author) : route('authors.store')}}" method="POST">
            @isset($author)
                @method('PUT')
            @endisset
            @csrf
            <div class="row mb-2">
                <input type="text" value="{{old('name', isset($author) ? $author->name : '')}}" name="name" placeholder="Author name" class="form-control">
                @error('name')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row mb-2">
                <input type="date" value="{{old('birthdate',isset($author) ? $author->birthdate : '')}}" name="birthdate" class="form-control">
                @error('birthdate')
                   <div class="alert alert-danger">{{$message}}</div>
                @enderror
            </div>
            <div class="row mb-3">
                <textarea name="description" class="form-control" placeholder="Author description">{{old('description' ,isset($author) ? $author->description : '')}}</textarea>
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
