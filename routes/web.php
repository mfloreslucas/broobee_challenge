<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MetricController;

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

Route::get('/', function () {
    return view('content.welcome');
});

// Route::get('/run_metric', function () {
//     return view('content.run_metric');
// });

Route::get('/run_metric', [MetricController::class, 'index']);

Route::get('/metric_history', function () {
    return view('content.metric_history');
});


/******** Controllers(Functions) ********/
Route::get('/metrics', [MetricController::class, 'index']);
Route::post('/get-metrics', [MetricController::class, 'getMetrics']);
Route::post('/save-metric-history', [MetricController::class, 'store']);

