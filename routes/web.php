<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth as Loged;

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

Route::get('/', function (Request $request) {

    if(Loged::check()) {
        
        return view('main', ['name' => Loged::user()->name]);

    }
    
    return view('main');

})->name('main');

Route::get('blogs', function (Request $request) {
    $data = [
        'name' => Loged::user()->name,
    ];
    return view('blogs', $data);
})->name('blogs')->middleware('auth');

Route::get('/register', [Auth\RegisterController::class, 'show'])->name('register');
Route::post('/register', [Auth\RegisterController::class, 'store']);

Route::get('/login', [Auth\LoginController::class, 'show'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'store']);

Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');
