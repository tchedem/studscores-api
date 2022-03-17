<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\v1\JWTAuthController;
use App\Http\Controllers\API\v1\UserAPIController;
use App\Http\Controllers\API\v1\TeacherAPIController;
use App\Http\Controllers\API\v1\MatterAPIController;
use App\Http\Controllers\API\v1\StudentAPIController;
use App\Http\Controllers\API\v1\ScoreAPIController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => '/v1'
], function ($router){
    // Route::post('/login', [JWTAuthController::class, 'login', 'https' => true]);
    Route::post('/login', [JWTAuthController::class, 'login']);
    Route::post('/refresh', [JWTAuthController::class, 'refresh']);
    Route::get('/user-profile', [JWTAuthController::class, 'userProfile']);
    Route::post('/logout', [JWTAuthController::class, 'logout']);

    Route::apiResource('users', UserAPIController::class)->only(['index', 'store', 'show']);
    Route::apiResource('teachers', TeacherAPIController::class)->only(['index', 'show', 'update']);
    Route::apiResource('matters', MatterAPIController::class)->only(['index', 'show']);
    Route::apiResource('students', StudentAPIController::class)->only(['index', 'show']);
    Route::apiResource('scores', ScoreAPIController::class)->only(['index', 'show']);

    // Route::post('/register', [JWTAuthController::class, 'register']);
});
