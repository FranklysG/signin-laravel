<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signin');
})->name('login');
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot', function () {
    return view('forgot');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});
