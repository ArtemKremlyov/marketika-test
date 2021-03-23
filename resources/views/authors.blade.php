@extends('layouts.main')

@section('page-title') Books authors @endsection

@section('content')
    <div class="container pt-5">
        <h1 class="card-title text-center mb-5">All authors</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Birth</th>
                    <th scope="col">Books Count</th>
                </tr>
            </thead>
            @foreach($authors as $author)
                <tr>
                    <td>{{$author->name}}</td>
                    <td>{{$author->birthdate}}</td>
                    <td>{{$author->booksCount}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
