<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "welcome";
});

Route::get('/user', [UserController::class, 'index']);

Route::get('/greeting', function () {
    return 'Hello World';
});

