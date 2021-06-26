<?php

use App\Http\Controllers\CompetitionParticipantController;
use App\Http\Controllers\UserController;
use App\Http\Resources\ProfileResource;
use App\Http\Resources\UserResource;
use App\Models\CompetitionParticipant;
use App\Models\User;
use Illuminate\Http\Request;
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

    Route::post('/competition-participant/join', [ CompetitionParticipantController::class, 'join' ]);
    Route::get('/user', function(){
        $user = Auth::user();

        return UserResource::collection($user->get());
    });
    Route::get('/user/profile', function(){
        $user = Auth::user();
        return ProfileResource::collection($user->profile()->get());
    });

});
