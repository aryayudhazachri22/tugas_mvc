<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('blog',BlogController::class);

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', [BlogController::class, 'logout'])->name('logout');

Route::get('admin',[App\Http\Controllers\BlogController::class, 'index'])->name('admin')->middleware(['CheckRole:admin']);