<?php

use App\Http\Controllers\PasienController;
use Illuminate\Routing\RouteRegistrar;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 
Route::get('/dashboard', 'indexController@index')->name('index');

Route::get('/patients', 'PasienController@index')->name('daftar-pasien');

Route::get('/patients/edit{id}', 'PasienController@edit')->name('pasien-edit');
Route::put('/patients/{id}', 'PasienController@update')->name('pasien-update');
Route::delete('/patients/{id}', 'PasienController@destroy')->name('pasien-delete');

Route::get('/laporan', 'LaporanController@index')->name('laporan');