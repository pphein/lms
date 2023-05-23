<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/createBook', [App\Http\Controllers\Api\ApiController::class, 'createBook'])->name('create-book');
Route::post('/updateBook', [App\Http\Controllers\Api\ApiController::class, 'updateBook'])->name('update-book');
Route::post('/deleteBook', [App\Http\Controllers\Api\ApiController::class, 'deleteBook'])->name('delete-book');

Route::post('/createAuthor', [App\Http\Controllers\Api\ApiController::class, 'createAuthor'])->name('create-author');
Route::post('/updateAuthor', [App\Http\Controllers\Api\ApiController::class, 'updateAuthor'])->name('update-author');
Route::post('/deleteAuthor', [App\Http\Controllers\Api\ApiController::class, 'deleteAuthor'])->name('delete-author');
