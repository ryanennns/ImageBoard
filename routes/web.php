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
        ->name('posts.show');

    Route::post('/{post}/comments', \App\Http\Controllers\CommentController::class . '@store')
        ->name('.posts.comments.store');

    Route::post('/', \App\Http\Controllers\PostController::class . '@store')
        ->name('posts.store');
});

Route::get('/', \App\Http\Controllers\PostController::class . '@index')
    ->name('posts.index');
