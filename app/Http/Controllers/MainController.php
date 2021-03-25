<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function authors() {
        $authors = Author::paginate(15);

        return view('home', compact('authors'));
    }
}
