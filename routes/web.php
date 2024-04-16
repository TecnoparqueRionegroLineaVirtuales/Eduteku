<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StateController;
use App\Models\Category;

Route::get('/', function () {
    return view('users.welcome');
});
Route::get('info', function () {
    return view('users.info');
});
Route::get('edt', function () {
    return view('users.edt');
});
Route::get('bulletin', function () {
    return view('users.bulletin');
});
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
    Route::get('/multimedia', function () {
        return view('admin.multimedia');
    })->name('multimedia');
    Route::get('/users', function () {
        return view('admin.users');
    })->name('users');
    Route::get('/messages', function () {
        return view('admin.messages');
    })->name('messages');
});
