<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/', 'IndexController');
Route::resource('/DatosRenovacion', 'DatosRenovacionController',['only' => ['index', 'store', 'update']]);
Route::resource('/Oferta', 'OfertaController',['only' => ['store', 'update']]);
Route::resource('/DatosRenovacion_cp', 'Cambio_CP_Controller',['only' => ['store', 'update']]);