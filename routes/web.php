<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::post('/createBook', [ApiController::class, 'createBook'])->name('create-book');
Route::post('/updateBook', [ApiController::class, 'updateBook'])->name('update-book');
Route::post('/deleteBook', [ApiController::class, 'deleteBook'])->name('delete-book');

Route::post('/createAuthor', [ApiController::class, 'createAuthor'])->name('create-author');
Route::post('/updateAuthor', [ApiController::class, 'updateAuthor'])->name('update-author');
Route::post('/deleteAuthor', [ApiController::class, 'deleteAuthor'])->name('delete-author');

Route::post('/createCategory', [ApiController::class, 'createCategory'])->name('create-category');
Route::post('/updateCategory', [ApiController::class, 'updateCategory'])->name('update-category');
Route::post('/deleteCategory', [ApiController::class, 'deleteCategory'])->name('delete-category');

Route::post('/createPublisher', [ApiController::class, 'createPublisher'])->name('create-publisher');
Route::post('/updatePublisher', [ApiController::class, 'updatePublisher'])->name('update-publisher');
Route::post('/deletePublisher', [ApiController::class, 'deletePublisher'])->name('delete-publisher');
