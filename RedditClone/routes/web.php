<?php

use App\Http\Controllers;
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

Route::get('/', [Controllers\HomeController::class, 'index'])->name('home');

Route::get('/post/{post}', [Controllers\PostController::class, 'show'])->name('post.details');

Route::get('/r/{subreddit}', [Controllers\SubredditController::class, 'show'])->name('subreddit.details');

Route::middleware(['guest'])->group(function () {
    Route::post('/sign-up', [Controllers\Auth\RegisterController::class, 'store'])->name('auth.register');
    Route::get('/sign-up', [Controllers\Auth\RegisterController::class, 'create']);  

    Route::post('/sign-in', [Controllers\Auth\SessionController::class, 'store'])->name('auth.login');  
    Route::get('/sign-in', [Controllers\Auth\SessionController::class, 'create']);  
});

Route::middleware(['auth'])->group(function () {
    Route::post('/sign-out', [Controllers\Auth\SessionController::class, 'destroy'])->name('auth.logout');

    Route::get('/create', [Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/create', [Controllers\PostController::class, 'store']);

    Route::post('/post/{post}/comment', [Controllers\PostController::class, 'comment'])->name('post.comment');

    Route::post('/comment/{comment}/reply', [Controllers\CommentController::class, 'reply'])->name('comment.reply');

    Route::get('/post/{post}/edit', [Controllers\PostController::class, 'edit'])->name('post.edit');
    Route::post('/post/{post}/edit', [Controllers\PostController::class, 'update']);

    Route::post('/post/{post}/image', [Controllers\PostController::class, 'uploadImage'])->name('post.image');

    Route::post('/post/{post}/vote', [Controllers\PostController::class, 'vote'])->name('post.vote');

    Route::post('/comment/{comment}/vote', [Controllers\PostController::class, 'vote'])->name('comment.vote');

});
    
