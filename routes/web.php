<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
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





Route::get('/users', [UserController::class, 'index'])->name('users');
Route::post('/users/create', [UserController::class, 'create'])->name('users-create');
Route::post('/users/edit', [UserController::class, 'edit'])->name('users-edit');
Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('user-delete');
Route::get('/users/data/{id}', [UserController::class, 'data'])->name('users-data');
Route::get('/users/show/data/{id}', [UserController::class, 'data_show'])->name('users-data-show');
Route::post('/users/update_role', [UserController::class, 'update_role'])->name('user-update-role');




Route::get('/roles', [RoleController::class, 'index'])->name('roles');
Route::post('/roles/create', [RoleController::class, 'create'])->name('roles-create');
Route::post('/roles/edit', [RoleController::class, 'edit'])->name('roles-edit');
Route::get('/roles/delete/{id}', [RoleController::class, 'delete'])->name('roles-delete');
Route::get('/roles/data/{id}', [RoleController::class, 'data'])->name('roles-data');
Route::get('/roles/show/data/{id}', [RoleController::class, 'data_show'])->name('roles-data-show');
Route::post('/roles/update_permission', [RoleController::class, 'update_permission'])->name('role-update-permission');


Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
Route::post('/permissions/create', [PermissionController::class, 'create'])->name('permissions-create');
Route::post('/permissions/edit', [PermissionController::class, 'edit'])->name('permissions-edit');
Route::get('/permissions/delete/{id}', [PermissionController::class, 'delete'])->name('permissions-delete');
Route::get('/permissions/data/{id}', [PermissionController::class, 'data'])->name('permissions-data');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
