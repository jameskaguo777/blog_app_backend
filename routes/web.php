<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function () {
    Route::get('/', [ HomeController::class, 'index' ])->name('home');
    Route::get('/schools', [ SchoolController::class, 'index' ])->name('schools');
    Route::get('/competitions', [ CompetitionController::class, 'index' ])->name('competitions');
    Route::get('/competition/create', [ CompetitionController::class, 'create' ])->name('competition.create');
    Route::get('/competition/send-notification', [ NotificationController::class, 'create' ])->name('competitions.notification.create');
    Route::get('/posts', [ PostController::class, 'index' ])->name('posts');
    Route::get('/post/create', [ PostController::class, 'create' ])->name('post.create');
    // Route::get('/');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
