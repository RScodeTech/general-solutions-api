<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TechnicianClickController;
use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Broadcast;
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
Route::post('user', [AuthController::class, 'store']);
Route::get('user/google/{id}', [AuthController::class, 'findGoogle']);
Route::group(['middleware' => ['JWTToken']], function () {
    Route::get('user', [AuthController::class, 'index']);
    Route::get('/user/termo', [AuthController::class, 'termo']);
    Route::get('user/{id}', [AuthController::class, 'show']);
    Route::put('user/{id}', [AuthController::class, 'update']);

    Route::post('technicians/{id}/click', [TechnicianClickController::class, 'store']);
});
Route::get('dashboard', [DashboardController::class, 'index']);
Route::apiResource('technicians', TechnicianController::class);

Broadcast::routes(['middleware' => ['JWTToken']]);
