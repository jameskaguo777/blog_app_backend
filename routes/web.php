<?php

use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\EnvironmentStatusController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HealthEmergencyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use App\Models\EnvironmentStatus;
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
    Route::get('/school/create', [ SchoolController::class, 'create' ])->name('school.create');
    Route::post('/school/store', [ SchoolController::class, 'store' ])->name('school.store');
    Route::get('/competitions', [ CompetitionController::class, 'index' ])->name('competitions');
    Route::get('/competition/create', [ CompetitionController::class, 'create' ])->name('competition.create');
    Route::post('competition/store', [ CompetitionController::class, 'store' ])->name('competition.store');
    Route::get('/competition/send-notification', [ NotificationController::class, 'create' ])->name('competitions.notification.create');
    Route::get('/posts', [ PostController::class, 'index' ])->name('posts');
    Route::get('/post/create', [ PostController::class, 'create' ])->name('post.create');
    Route::get('/events', [ EventController::class, 'index' ])->name('events');
    Route::get('/event/create', [ EventController::class, 'create' ])->name('event.create');
    Route::get('/health-emergency', [ HealthEmergencyController::class, 'index' ])->name('health-emergency');
    Route::get('/environment-status', [ EnvironmentStatusController::class, 'index' ])->name('environment-status');
    Route::get('/users', [ UserController::class, 'index' ])->name('users');
});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');