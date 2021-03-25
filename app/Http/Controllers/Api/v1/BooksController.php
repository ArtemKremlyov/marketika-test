<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Builder[]|Collection
     */
    public function index()
    {
        $books = Book::with('author')->get();
        return response()->json($books, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Book $book
     * @return Builder[]|Collection
     */
    public function show(Book $book)
    {
        dd($book);
        $book = $book->with('author')->get();
        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $book = Book::findOrFail($request->id);
        $book->update($request->only(['title', 'author_id', 'description']));

        return response()->json(['message' => 'Success update'], 200);
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
        return response()->json(null, 204);
    }
}
