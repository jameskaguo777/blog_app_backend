<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\CompetitionParticipantController;
use App\Http\Controllers\CompetitionResultsController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
use App\Http\Resources\AssignedResource;
use App\Http\Resources\CompetitionResource;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\Competition;
use App\Models\CompetitionParticipant;
use App\Models\HealthEmergency;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [ UserController::class, 'register' ]);
Route::post('/login', [ UserController::class, 'login' ]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('/authorized', function(){
        return true;
    });

    Route::get('/user/assigned', function () {
        $user = Auth::user();
        return response()->json([
            'role' => $user->roles->pluck('name')
        ]);
    });
    // Route::post('/competition-participant/join', [ CompetitionParticipantController::class, 'join' ]);
    Route::get('/user', function(){
        $user = Auth::user();

        return new UserResource($user);
    });
    Route::get('/user/profile', function(){
        $user = Auth::user();
        return new ProfileResource($user->profile);
    });

    Route::get('/events', [ EventController::class, 'events' ]);
    Route::get('/posts', [ PostController::class, 'posts' ]);
    Route::post('health-emergency', [ HealthEmergency::class, 'store' ]);

    // teacher || ward
    Route::middleware(['role:teacher|ward'])->group(function () {

        Route::post('/competition-participant/join', [CompetitionParticipantController::class, 'join']);
    });

    // normal-user
    Route::middleware(['role:normal-user'])->group(function () {
        Route::get('/active/competition', function () {
            return new CompetitionResource(Competition::where('status', true)->first());
        });
        Route::post('/comment', [ CommentController::class, 'store' ]);
        Route::get('/votable', [VoteController::class, 'votable']);
        Route::post('/vote', [VoteController::class, 'store']);
        Route::get('/participants', [CompetitionParticipantController::class, 'participants']);

        Route::get('/competitions', [ CompetitionController::class, 'competitions' ]);
        Route::get('/competition/{id}', [ CompetitionResultsController::class, 'show' ]);
    });

});