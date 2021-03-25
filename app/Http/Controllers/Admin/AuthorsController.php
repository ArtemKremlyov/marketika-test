<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use function React\Promise\reduce;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $authors = Author::paginate(15);
        return view('admin.authors', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.author_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(AuthorRequest $request)
    {
        Author::create($request->only(['name', 'birthdate', 'description']));
        return redirect()->route('authors.index')->withSuccess('Book: '.$request->name.' success created');
    }

    /**
     * Display the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function show(Author $author)
    {
        return view('admin.author', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Author $author
     * @return Response
     */
    public function edit(Author $author)
    {
        return view('admin.author_form', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Author $author
     * @return Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->only(['name', 'birthdate', 'description']));
        return redirect()->route('authors.index')->withSuccess('Book: '.$request->name.' success updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Author $author
     * @return Response
     * @throws \Exception
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->withSuccess($author->name.'- success deleted');
    }
}
