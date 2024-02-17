<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\Api\ApiController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('register', [ApiController::class, 'register']);
Route::post('login', [ApiController::class, 'login']);