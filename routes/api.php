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


Route::group(['prefix' => 'v1/'], function () {
    Route::post('login', App\Http\Controllers\Api\TokenController::class);

    Route::middleware('auth:api')->group(function () {
        Route::resource('appeal', App\Http\Controllers\Api\AppealController::class);
    });
});
