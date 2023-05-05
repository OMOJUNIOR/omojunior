<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'userLogin']);

Route::post('login/verify', [App\Http\Controllers\Auth\LoginController::class, 'verifyLogin']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', [App\Http\Controllers\Auth\LoginController::class, 'getUser']);
    Route::get('/driver', [App\Http\Controllers\Driver\DriverController::class, 'show']);
    Route::post('/update-profile', [App\Http\Controllers\Driver\DriverController::class, 'update']);
    Route::post('/trip', [App\Http\Controllers\Trip\TripController::class, 'createTrip']);
    Route::post('/trip/{trip}', [App\Http\Controllers\Trip\TripController::class, 'getUserTrip']);
    Route::post('/trip/{trip}/accept', [App\Http\Controllers\Trip\TripController::class, 'acceptTrip']);
    Route::post('/trip/{trip}/end-trip', [App\Http\Controllers\Trip\TripController::class, 'endTrip']);
    Route::post('/trip/{trip}/start', [App\Http\Controllers\Trip\TripController::class, 'startTrip']);
    Route::post('/trip/{trip}/location', [App\Http\Controllers\Trip\TripController::class, 'location']);

});
