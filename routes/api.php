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

Route::prefix('/patient')->group(function () {
    Route::post('/register', 'API\PasienAuthController@register');
    Route::post('/login', 'API\PasienAuthController@login');
    Route::post('/logout', 'API\PasienAuthController@logout');
    
    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::post('/update', 'API\PasienAuthController@update');
    });
});

Route::prefix('/monitoring')->group(function(){
    Route::post('/insert', 'API\MonitoringController@insertSensor');
    
    Route::group(['middleware' => ['auth:sanctum']], function(){
        Route::get('/patient', 'API\MonitoringController@getRiwayatMonitoring');
        Route::post('/patient', 'API\MonitoringController@getDetailRiwayatMonitoring');
    });
});