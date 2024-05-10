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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('state', StateController::class);
    Route::resource('multimedia', MultimediaController::class);
    Route::resource('messages', MessagesController::class);
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');
    
});
