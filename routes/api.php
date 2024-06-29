<?php

use App\Http\Controllers\Auth\SignInController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/logout', [SignInController::class, 'destroy'])
    ->name('logout');

Route::post('/register', [SignInController::class, 'store'])
    ->name('api.auth.store');

Route::post('/signin', [SignInController::class, 'auth'])
    ->name('api.auth.signin');

Route::get('/users', [UserController::class, 'show'])
    ->middleware('auth:sanctum')
    ->name('api.user.show');
