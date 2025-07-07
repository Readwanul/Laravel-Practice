<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/flights/create', [App\Http\Controllers\FlightController::class, 'create']);
Route::post('/auth/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/auth/login', [App\Http\Controllers\AuthController::class, 'login']);



Route::middleware('auth:sanctum')->group(function () {
    Route::post('/customers/create', [App\Http\Controllers\CustomerController::class, 'create']);
    Route::delete('/customers/delete/{id}', [App\Http\Controllers\CustomerController::class, 'delete']);
    Route::get('/customers/showall', [App\Http\Controllers\CustomerController::class, 'showall']);
});