<?php

use App\Http\Controllers\Api\Auth\UserRegistrationController;
use App\Http\Controllers\Api\Device\DeviceRegistrationController;
use App\Http\Controllers\Api\Device\SensorReadingController;
use App\Http\Controllers\Api\Device\SensorRegistrationController;
use Illuminate\Http\Request;
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

Route::prefix('auth')->group(function () {
    Route::post('register/store', [UserRegistrationController::class, 'store'])->name('api.user.regis');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('device', DeviceRegistrationController::class)->only(['store', 'show', 'destroy']);
    Route::resource('sensor/type', SensorRegistrationController::class)->only(['store', 'show', 'destroy']);
    Route::resource('sensor/reading', SensorReadingController::class)->only(['store', 'show']);
});
