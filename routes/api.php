<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
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
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::group([
    'middleware' => 'auth.jwt',
    'prefix' => 'auth'
], function ($router) {
    Route::post('refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('profile', [AuthController::class, 'me'])->name('profile');
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('services', [ApiController::class, 'getServices'])->name('services');
    Route::post('order', [ApiController::class, 'order'])->name('order');
    Route::get('service_providers', [ApiController::class, 'fetchServiceProviders'])->name('serviceProviders');
});
