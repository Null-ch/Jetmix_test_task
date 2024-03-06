<?php

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

Route::middleware('auth')->group(function () {
    Route::get('/', [App\Http\Controllers\Client\AppealController::class, 'index'])->name('client.index');
    Route::post('/store', [App\Http\Controllers\Client\AppealController::class, 'store'])->name('client.appeal.store');
    
    Route::middleware('admin')->prefix('admin')->group(function () {
        Route::get('/', [App\Http\Controllers\Admin\AppealController::class, 'index'])->name('admin.index');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\AppealController::class, 'show'])->name('admin.show');
        Route::get('download/file/{filename}', [App\Http\Controllers\FileController::class, 'getAttachedFile'])->name('download.attached.file');
    });
});

Auth::routes();
