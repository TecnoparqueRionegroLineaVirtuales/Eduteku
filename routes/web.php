<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EdtController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LinesController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EdtAdminController;
use App\Http\Controllers\LikeUserController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QuehacetpController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\EdtAdminInfoController;
use App\Http\Controllers\BulletinAdminController;
use App\Http\Controllers\ChallengeTypeController;
use App\Http\Controllers\MessagesclientController;
use App\Http\Controllers\BulletinAdminInfoController;
use App\Http\Controllers\ChallengeQuestionController;

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

Route::get('successCases', function () {
    return view('users.successCases');
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
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('likeUser', [LikeUserController::class, 'index'])->name('likeUser');
    Route::post('/like/{multimedia}', [LikeController::class, 'toggleLike'])->name('like.toggle');
  	Route::post('process-login', [DashboardController::class, 'processLogin'])->name('process-login');
    Route::resource('home', InicioController::class);
    Route::resource('infoAdmin', InfoController::class);
    Route::resource('lines', LinesController::class);
    Route::get('panelInfo', [InfoController::class, 'panel'])->name('panelInfo');
    Route::resource('edtAdmin', EdtAdminController::class);
    Route::resource('edtInfoAdmin', EdtAdminInfoController::class);
    Route::get('panelEdt', [EdtAdminController::class, 'panel'])->name('panelEdt');
    Route::resource('bulletinInfoAdmin', BulletinAdminInfoController::class);
    Route::resource('bulletinAdmin', BulletinAdminController::class);
    Route::get('panelBulletin', [BulletinAdminInfoController::class, 'panel'])->name('panelBulletin');
    Route::get('surveyTypes', [ChallengeTypeController::class, 'index'])->name('surveyType');
    Route::get('surveyTypes/{challengeType}/questions', [ChallengeTypeController::class, 'details'])->name('surveyQuestions');
    Route::resource('challengeQuestions', ChallengeQuestionController::class);
    Route::post('/users/{user}/change-role', [UserController::class, 'changeRole'])->name('user.changeRole');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
