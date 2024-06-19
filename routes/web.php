<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\QuehacetpController;
use App\Http\Controllers\EdtController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\MessagesclientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LikeUserController;
use App\Models\Category;

Route::resource('index', IndexController::class);
Route::get('/', [IndexController::class, 'index']);
Route::resource('info', QuehacetpController::class);
Route::resource('edt', EdtController::class);
Route::resource('bulletin', BulletinController::class);
Route::resource('messagesclient', MessagesclientController::class);

Route::get('teku', function () {
    return view('users.appTeku');
});
Route::get('ruta', function () {
    return view('users.ruta');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('state', StateController::class);
    Route::resource('multimedia', MultimediaController::class);
    Route::resource('messages', MessagesController::class);
    Route::resource('user', UserController::class);
    Route::get('likeUser', [LikeUserController::class, 'index'])->name('likeUser');
    Route::post('/like/{multimedia}', [LikeController::class, 'toggleLike'])->name('like.toggle');
  	Route::post('process-login', [DashboardController::class, 'processLogin'])->name('process-login');

});
