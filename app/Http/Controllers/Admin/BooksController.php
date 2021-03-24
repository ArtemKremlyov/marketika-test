<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $books = Book::paginate(15);
        return view('admin.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('admin.book_form', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(BookRequest $request)
    {
        Book::create($request->only(['title', 'author_id', 'description']));
        return redirect()->route('books.index')->withSuccess('Book: '.$request->title.' success created');
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Response
     */
    public function show(Book $book)
    {
        return view('admin.book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Book $book
     * @return Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('admin.book_form', compact(['book', 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Book $book
     * @return Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($request->only(['title', 'author_id', 'description']));
        return redirect()->route('books.index')->withSuccess('Book: '.$request->title.' success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Book $book
     * @return Response
     * @throws \Exception
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->withSuccess($book->title.'- success deleted');
    }
}
