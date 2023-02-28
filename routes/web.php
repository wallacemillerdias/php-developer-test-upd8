<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::group(['prefix' => ''], function () {
    Route::get('/', [ClientController::class, 'create']);
    Route::post('/', [ClientController::class, 'store']);
    Route::get('/customer-list', [ClientController::class, 'index']);
    Route::get('/cities/{state_id}', [ClientController::class, 'indexCities']);
    Route::get('/destroy/{client_id}', [ClientController::class, 'destroy']);
});
