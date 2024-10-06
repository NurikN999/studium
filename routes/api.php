<?php

use App\Modules\City\Controllers\CityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('cities', [CityController::class, 'index']);
