<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::controller(PostController::class)->prefix('posts')->name('posts.')->group(function(){
    Route::get('/', 'index');

    Route::get('/create','create')->name('create');
    Route::post('/create', 'store_post');

    Route::get('/show/{post}', 'show')->name('show');
    Route::post('/show/{post}', 'add_comment')->name('add_comment');
});

Route::controller(LikeController::class)->prefix('like')->name('like.')->group(function(){
    Route::get('/set/{post_type}/{post_id}', 'set')->name('set');
    Route::get('/unset/{post_type}/{post_id}', 'unset')->name('unset');
});