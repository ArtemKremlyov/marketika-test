<?php

use App\Http\Controllers\Api\v1\BooksController;
use App\Http\Controllers\AuthorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'books'], function() {
        Route::get('/list', [BooksController::class, 'index'])->name('api.books.index');
        Route::get('/{book}', [BooksController::class, 'show'])->name('api.books.show');
        Route::post('/update', [BooksController::class, 'update'])->name('api.books.update');
        Route::delete('/{book}', [BooksController::class, 'destroy'])->name('api.books.destroy');
    });
});
