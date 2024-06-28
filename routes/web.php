<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('signin');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot', function () {
    return view('forgot');
});
