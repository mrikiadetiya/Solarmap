<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\MapController;
use App\Http\Controllers\Frontend\AnalysisController;
use App\Http\Controllers\Frontend\CalculatorController;
use App\Http\Controllers\Frontend\CostController;
use App\Http\Controllers\Frontend\RecommendationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReportController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::match(['get', 'post'], '/analysis', [AnalysisController::class, 'index'])->name('analysis');
Route::get('/calculator', [CalculatorController::class, 'index'])->name('calculator');
Route::post('/calculator/calculate', [CalculatorController::class, 'calculate'])->name('calculator.calculate');
Route::get('/cost', [CostController::class, 'index'])->name('cost');
Route::get('/recommendation', [RecommendationController::class, 'index'])->name('recommendation');