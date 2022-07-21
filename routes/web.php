<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
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

Route::get('/home', [IndexController::class, 'index'])->name('home');

Route::get('/', [IndexController::class, 'index'])->name('home');


Route::get('/session/put', [UserController::class, 'session_put'])->name('session_put');
Route::get('/session/get', [UserController::class, 'session_get'])->name('session_get');


Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users-store', [UserController::class, 'store'])->name('users-store');
Route::post('crop', [UserController::class, 'crop'])->name('crop');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
