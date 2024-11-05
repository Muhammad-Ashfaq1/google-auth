<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PerformanceController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function (){
    Route::get('google', 'redirectToGoogle')->name('auth.google');
    Route::get('google/callback', 'handleGoogleCallback')->name('auth.google.callback');
    Route::post('login', 'login')->name('auth.login');
});
Route::post('/performance', [PerformanceController::class, 'checkPerformance'])->middleware('auth:api');

