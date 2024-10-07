<?php

use App\Http\Controllers\AuthController;
use App\Modules\City\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/logout', [AuthController::class, 'logout']);


Route::get('cities', [CityController::class, 'index']);
