<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\Karyawan;
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

Route::get('/get_karyawan', 'App\Http\Controllers\KaryawanController@getAllKaryawan');
Route::get('/find_karyawan/{id}', 'App\Http\Controllers\KaryawanController@getKaryawan');
Route::post('/create_karyawan', 'App\Http\Controllers\KaryawanController@createKaryawan');
Route::put('/update_karyawan/{id}', 'App\Http\Controllers\KaryawanController@updateKaryawan');
Route::delete('/delete_karyawan/{id}', 'App\Http\Controllers\KaryawanController@deleteKaryawan');
Route::post('/login', 'App\Http\Controllers\KaryawanController@login');

Route::get('/get_barang', 'App\Http\Controllers\BarangController@getAllBarang');
Route::get('/find_barang/{id}', 'App\Http\Controllers\BarangController@getBarang');
Route::post('/create_barang', 'App\Http\Controllers\BarangController@createBarang');
Route::put('/update_barang/{id}', 'App\Http\Controllers\BarangController@updateBarang');
Route::delete('/delete_barang/{id}', 'App\Http\Controllers\BarangController@deleteBarang');

Route::get('/get_barang_masuk', 'App\Http\Controllers\BarangMasukController@getAllBarang_masuk');
Route::get('/find_barang_masuk/{id}', 'App\Http\Controllers\BarangMasukController@getBarang_masuk');
Route::post('/create_barang_masuk', 'App\Http\Controllers\BarangMasukController@createBarang_masuk');
Route::put('/update_barang_masuk/{id}', 'App\Http\Controllers\BarangMasukController@updateBarang_masuk');
Route::delete('/delete_barang_masuk/{id}', 'App\Http\Controllers\BarangMasukController@deleteBarang_masuk');

Route::get('/get_barang_keluar', 'App\Http\Controllers\BarangKeluarController@getAllBarang_keluar');
Route::get('/find_barang_keluar/{id}', 'App\Http\Controllers\BarangKeluarController@getBarang_keluar');
Route::post('/create_barang_keluar', 'App\Http\Controllers\BarangKeluarController@createBarang_keluar');
Route::put('/update_barang_keluar/{id}', 'App\Http\Controllers\BarangKeluarController@updateBarang_keluar');
Route::delete('/delete_barang_keluar/{id}', 'App\Http\Controllers\BarangKeluarController@deleteBarang_keluar');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
