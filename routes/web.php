<?php

use App\Http\Controllers\Admin\AuthorsController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'authors']);


Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::redirect('/', 'admin/authors');
    Route::resource('authors', AuthorsController::class);
    Route::resource('books', BooksController::class);
});
