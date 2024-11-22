<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/posts', [PostController::class, 'index'])
    ->name('posts');

Route::get('/promoted', [PostController::class, 'promoted'])
    ->name('posts.promoted');

Route::get('/posts/{post:slug}', [PostController::class, 'show'])
    ->name('post');

Route::get('/authors/{user}', [PostController::class, 'index'])
    ->name('author');

Route::delete('/comment/{comment}', [PostController::class, 'deleteComment'])
    ->name('comment.delete');

Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])
    ->name('comment');
