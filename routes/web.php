<?php

use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ComunaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('comunas', ComunaController::class);
Route::resource('municipios', MunicipioController::class);
//Route::get('/comunas', [ComunaController::class, 'index']);