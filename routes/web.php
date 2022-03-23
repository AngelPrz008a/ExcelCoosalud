<?php

use App\Http\Controllers\ExcelController;
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
//     return view('Excel/index');
// });

Route::get('index','App\Http\Controllers\ExcelController@index');
Route::post('import', 'App\Http\Controllers\ExcelController@import');
Route::get('excel', 'App\Http\Controllers\ExcelController@index');
Route::get('export', 'App\Http\Controllers\ExcelController@export');
Route::get('delete', 'App\Http\Controllers\ExcelController@delete');
Route::post('update', 'App\Http\Controllers\ExcelController@update');
