<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\pagesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::redirect('/admin', '/admin/dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

Route::get('/admin/pages', [PagesController::class, 'index']);
Route::post('/admin/pages/submit', [PagesController::class, 'submit']);