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


Route::middleware('login')->group(function(){

    //EXCEL
    Route::get('import', 'App\Http\Controllers\ExcelController@index');
    Route::post('import', 'App\Http\Controllers\ExcelController@import');
    Route::get('export', 'App\Http\Controllers\ExcelController@export');
    Route::get('delete', 'App\Http\Controllers\ExcelController@delete');
    Route::post('update', 'App\Http\Controllers\ExcelController@update');

    //CERRAR SESION, PERFIL, LINKS, HOME
    Route::get('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');

    Route::get('account', 'App\Http\Controllers\UserController@account');
    Route::post('account', 'App\Http\Controllers\UserController@updateAccount');

    Route::get('links', 'App\Http\Controllers\LinkController@index');

    Route::get('home', 'App\Http\Controllers\AuthController@home');

    //CREACION USUARIOS
    Route::get('users', 'App\Http\Controllers\UserController@index');
    Route::get('create-user', 'App\Http\Controllers\UserController@create');
    Route::post('create-user', 'App\Http\Controllers\UserController@store');

    //ACTUALIZAR USUARIOS
    Route::get('update-user/{id}','App\Http\Controllers\UserController@edit');
    Route::post('update-user/{id}','App\Http\Controllers\UserController@update');

    //CREACION TRABAJOS
    Route::get('work-user/{id}', 'App\Http\Controllers\WorkController@index');
    Route::get('work-create/{id}', 'App\Http\Controllers\WorkController@create');
    Route::post('work-create', 'App\Http\Controllers\WorkController@store');

    //ACTUALIZACION TRABAJOS
    Route::get('work-update/{idWork}','App\Http\Controllers\WorkController@edit');
    Route::post('work-update/{idWork}','App\Http\Controllers\WorkController@update');

    //VER TRABAJOS
    Route::get('work-show/{id}', 'App\Http\Controllers\WorkController@show');
});



Route::middleware('guest')->group(function(){

    //solo con la url
    Route::get('/', function () {
        return view('Auth.login');
    });

    //LOGIN, RESETEO DE CLAVE, CERRAR SESION, PERFIL, LINKS, HOME
    Route::get('login', 'App\Http\Controllers\AuthController@login');
    Route::post('login', 'App\Http\Controllers\AuthController@enter');

    Route::get('reset-password');
    Route::post('reset-password');

});

