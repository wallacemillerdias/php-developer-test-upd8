<?php

use App\Http\Controllers\ClienteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['as' => 'cliente.', 'prefix' => ''], function () {
    Route::get('/cadastro', [ClienteController::class, 'index']);
//    Route::post('/store', ["as" => "slug", "uses" => 'MateriaController@store'])->middleware('auth:api');
//    Route::get('/{id}', ["as" => "index", "uses" => 'MateriaController@show'])->where('id', '[0-9]+');
//    Route::post('/search-slug', ["as" => "slug", "uses" => 'MateriaController@search_slug']);
//    Route::get('/editoria/{id}/{quantity?}', ["as" => "index", "uses" => 'MateriaController@show_posts_editoria'])->where('id', '[0-9]+');
//    Route::get('/testar', ["as" => "slug", "uses" => 'MateriaController@testar']);
});
