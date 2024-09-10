<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetricController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/******** Views ********/
Route::get('/', fn() => view('content.welcome'));
Route::get('/run_metric', [DashboardController::class, 'index']);

/******** Controllers(Functions) ********/
// Route::get('/metrics', [MetricController::class, 'index']);
Route::get('/metric_history', [MetricController::class, 'index'])->name('metric_history.index');

Route::post('/get-metrics', [MetricController::class, 'getMetrics']);
Route::post('/save-metric-history', [MetricController::class, 'store']);
