<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BlogsController;
use App\Models\User;

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

Route::get('/register', [Auth\RegisterController::class, 'show'])->name('register');
Route::post('/register', [Auth\RegisterController::class, 'store']);

Route::get('/login', [Auth\LoginController::class, 'show'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'store']);

Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
