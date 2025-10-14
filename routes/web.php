<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-env', function () {
    dd(env('DB_CONNECTION'));
});