<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\FlightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/New', function () {
    return DB::select ('ShOW TABLES');
});

//Route::post('/flights/create', [FlightController::class, 'create']);


Route::get('/students', [App\Http\Controllers\StudentController::class, 'index']);
