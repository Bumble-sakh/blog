<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
// use App\Models\User;

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

Route::get('/', [PostsController::class, 'getPosts'])->name('main');

Route::get('blogs', [BlogsController::class, 'getBlogs'])->name('blogs');
Route::get('blog/add', [BlogsController::class, 'addBlog'])->name('blog_add')->middleware('auth');
Route::post('blog/add', [BlogsController::class, 'addBlog'])->middleware('auth');
Route::get('blog/edit/{id}', [BlogsController::class, 'editBlog'])->name('blog_edit')->middleware('auth');
Route::post('blog/edit/{id}', [BlogsController::class, 'editBlog'])->middleware('auth');
Route::get('blog/delete/{id}', [BlogsController::class, 'deleteBlog'])->name('blog_delete')->middleware('auth');
Route::get('blog/{id}', [BlogsController::class, 'getBlog'])->name('blog')->middleware('auth');

// Route::get('posts', [PostsController::class, 'getPosts'])->name('posts');
Route::get('post/add/{blogId}', [PostsController::class, 'addPost'])->name('post_add')->middleware('auth');
Route::post('post/add/{blogId}', [PostsController::class, 'addPost'])->middleware('auth');
Route::get('post/edit/{id}', [PostsController::class, 'editPost'])->name('post_edit')->middleware('auth');
Route::post('post/edit/{id}', [PostsController::class, 'editPost'])->middleware('auth');
Route::get('post/delete/{id}', [PostsController::class, 'deletePost'])->name('post_delete')->middleware('auth');
Route::get('post/{id}', [PostsController::class, 'getPost'])->name('post')->middleware('auth');

// Route::get('blog/{id}/posts', [PostsController::class, 'getPostsFromBlog']);
// Route::get('blog/{id}/post/{id}', [PostsController::class, 'getPost']);

Route::get('users', [UsersController::class, 'getUsers'])->name('users');
Route::get('profile/{id?}', [UsersController::class, 'getProfile'])->name('profile')->middleware('auth');

Route::get('/register', [Auth\RegisterController::class, 'show'])->name('register');
Route::post('/register', [Auth\RegisterController::class, 'store']);

Route::get('/login', [Auth\LoginController::class, 'show'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'store']);

Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
