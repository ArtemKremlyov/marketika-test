@extends('layouts.admin')

@section('page-title') Authors @endsection

@section('content')
    <div class="container">
        <h1 class="card-title text-center mt-5 mb-5 text-primary">All authors</h1>
        <a href="{{route('authors.create')}}" class="btn btn-dark mb-5 w-100 ">Create author</a>
        @if(session('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Birth</th>
                <th scope="col">Books Count</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th scope="row">{{$author->id}}</th>
                    <td>{{$author->name}}</td>
                    <td>{{$author->birthdate}}</td>
                    <td>{{$author->books->count()}}</td>
                    <td>
                        <a href="{{route('authors.show', $author)}}" class="btn btn-primary">Show</a>
                    <td>
                        <a href="{{route('authors.edit', $author)}}" class="btn btn-secondary">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('authors.destroy', $author)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row d-flex justify-content-center">{{$authors->links()}}</div>
    </div>
@endsection
