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

Route::post('/createBook', [App\Http\Controllers\Api\ApiController::class, 'createBook'])->name('create');
Route::post('/updateBook', [App\Http\Controllers\Api\ApiController::class, 'updateBook'])->name('update');
Route::post('/deleteBook', [App\Http\Controllers\Api\ApiController::class, 'deleteBook'])->name('delete');
