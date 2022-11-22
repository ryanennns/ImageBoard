<?php

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

Route::prefix('posts')->group(function () {
    Route::get('/{post}', \App\Http\Controllers\PostController::class . '@show')
        ->name('.show');

    Route::post('/{post}/comments', \App\Http\Controllers\CommentController::class . '@store')
        ->name('.comments.store');

    Route::post('/', \App\Http\Controllers\PostController::class . '@store')
        ->name('.store');
});

Route::get('/', \App\Http\Controllers\PostController::class . '@index')
    ->name('posts.index');

Route::get('/register', \App\Http\Controllers\RegisterController::class . '@create');
Route::post('/register', \App\Http\Controllers\RegisterController::class . '@store');

Route::middleware('guest')->group(function () {
    Route::get('/login', \App\Http\Controllers\SessionController::class . '@index');
    Route::post('/login', \App\Http\Controllers\SessionController::class . '@create');
});

Route::middleware('auth')->group(function() {
    Route::post('/logout', \App\Http\Controllers\SessionController::class . '@destroy');
});

Route::get('/me', function() {
    if(auth()->user()) {
        dd(auth()->user()->attributes);
    }
    else {
        dd("you're not logged in, chief");
    }
});
