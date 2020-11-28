<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/admin', '/admin/dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

// Route::post('/admin/users/create', [UserController::class, 'register']);
// Route::post('/admin/users/create', [UserController::class, 'register']);
Route::get('/admin/users', [UserController::class, 'show']);
Route::delete('/admin/users/delete/{id}', [UserController::class, 'delete']);
Route::post('/admin/users/update/{id}', [UserController::class, 'updateUserInfo']);

Route::get('/admin/pages', [PagesController::class, 'index']);
Route::get('/admin/pages/create', [PagesController::class, 'create']);
Route::post('/admin/pages/create/submit', [PagesController::class, 'submit']);
Route::get('/admin/pages/edit/{id}', [PagesController::class, 'edit']);
Route::patch('/admin/pages/edit/submit/{id}', [PagesController::class, 'editSubmit']);
Route::delete('/admin/pages/delete/{id}', [PagesController::class, 'delete']);
Route::get('{slug}', [PagesController::class, 'viewFrontend']);