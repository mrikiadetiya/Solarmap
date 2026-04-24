<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SolarApiController;
use App\Http\Controllers\Api\CalculationApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/solar-data', [SolarApiController::class, 'getSolarData']);
Route::post('/calculate', [CalculationApiController::class, 'calculate']);
