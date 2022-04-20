<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', view: 'contact')->name('contact');

//Route::get('post/{postId}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show'); // or
Route::get('post/{post}',  [\App\Http\Controllers\PostController::class, 'showOr'])->name('post.show'); // or