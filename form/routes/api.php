<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//API ROUTES
Route::post('register', [ApiController::class, 'register']);
Route::post('login', [ApiController::class, 'login']);

Route::group([
    'middleware' => ['auth:api']
], function(){
    Route::get('show', [ApiController::class, 'show']);
    Route::get('get/{id}', [ApiController::class, 'getUser']);
    Route::post('update/{id}', [ApiController::class, 'updateUser']);
    Route::delete('deleteUser/{id}', [ApiController::class, 'deleteUser']);
    Route::get('logout', [ApiController::class, 'logout']);
});