<?php

use App\Http\Controllers\Auth\SignInController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/logout', [SignInController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::post('/signin', [SignInController::class, 'store'])
    ->name('api.signin.store');
