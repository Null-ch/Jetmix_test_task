<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('v1/login', App\Http\Controllers\Api\TokenController::class);
Route::middleware('auth:api')->group(function () {
    Route::get('v1/index', [App\Http\Controllers\Api\AppealController::class, 'index']);
    Route::get('v1/appeal/{id}', [App\Http\Controllers\Api\AppealController::class, 'show']);
});
