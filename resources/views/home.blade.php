@extends('layouts.main')
@section('page-title') Home @endsection

@section('content')
    @include('components.header')
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Authors list</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" style="width: 30%;">Name</th>
                <th scope="col" style="width: 20%;">Birth</th>
                <th scope="col" style="width: 15%">Books Count</th>
                <th scope="col" style="width: 35%;">Books</th>
            </tr>
            </thead>
            <tbody>
            @foreach($authors as $author)
                <tr>
                    <th>{{$author->name}}</th>
                    <th>{{$author->birthdate}}</th>
                    <th>{{$author->books->count()}}</th>
                    <th>
                        @if(count($author->books))
                            @foreach($author->books as $book)
                                <p>{{$book->title}}</p>
                            @endforeach
                        @else
                            <p>---</p>
                        @endisset
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row d-flex justify-content-center">{{$authors->links()}}</div>
    </div>
@endsection
