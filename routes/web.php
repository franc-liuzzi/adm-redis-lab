<?php

use App\Http\Controllers\GeodataController;
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

Route::prefix('geodata')->group(function () {
    Route::get('regioni', [GeodataController::class, 'getRegioni']);
    Route::get('province/{regione_id}', [GeodataController::class, 'getProvince']);
    Route::get('comuni/{provincia_id}', [GeodataController::class, 'getComuni']);
});