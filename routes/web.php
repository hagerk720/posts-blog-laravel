<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
Route::group(['middleware' =>[ 'auth']],function(){
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
    Route::get('/posts/deleted', [PostController::class, 'showDeletedPosts'])->name('posts.deleted-posts');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
    Route::get('/posts/{post}/restore', [PostController::class, 'restore'])->name('posts.restore');
    Route::post('/posts/{post}', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/posts/{post}/{comment}/', [CommentController::class, 'delete'])->name('comments.delete');
    Route::delete('/posts/{post}/tags/{tag}', [PostController::class, 'detachTag'])->name('post.tags.detach');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/deleteOldPosts', [PostController::class, 'deleteOldPosts'])->name('posts.deleteOldPosts');
});
Route::group(['middleware' =>['XssSanitization'  , 'auth']] , function(){
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
