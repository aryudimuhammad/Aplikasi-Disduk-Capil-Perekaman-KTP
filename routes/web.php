<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home/pendaftaran', 'PendaftaranController@index')->name('ktppendaftaranIndex');
Route::post('/home/pendaftaran', 'PendaftaranController@create')->name('ktppendaftaranCreate');
Route::get('/home/show', 'PendaftaranController@show')->name('ktppendaftaranShow');

Route::group(['middleware' => ['auth', 'Checkrole:1,2']], function () {
    Route::get('/admin/pensiun', 'PensiunController@index')->name('pensiunIndex');
    Route::post('/admin/pensiun', 'PensiunController@store')->name('pensiunstore');
    Route::put('/admin/pensiun', 'PensiunController@update')->name('pensiunUpdate');
    Route::delete('/admin/pensiun/delete/{id}', 'PensiunController@delete')->name('pensiunDelete');

    Route::get('/admin/cuti', 'CutiController@index')->name('cutiIndex');
    Route::post('/admin/cuti', 'CutiController@store')->name('cutistore');
    Route::put('/admin/cuti', 'CutiController@update')->name('cutiUpdate');
    Route::delete('/admin/cuti/delete/{id}', 'CutiController@delete')->name('cutiDelete');

    Route::get('/admin/perpanjang/cuti', 'PerpanjangController@index')->name('perpanjangIndex');
    Route::post('/admin/perpanjang/cuti', 'PerpanjangController@store')->name('perpanjangstore');
    Route::put('/admin/perpanjang/cuti', 'PerpanjangController@update')->name('perpanjangUpdate');
    Route::delete('/admin/perpajnagan/cuti/delete/{id}', 'PerpanjangController@delete')->name('perpanjangDelete');

    Route::get('/user', 'UserController@index')->name('userIndex');
    Route::delete('/user/delete/{id}', 'UserController@delete')->name('userDelete');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'HomeController@profile')->name('profileIndex');
    Route::post('/profile', 'HomeController@update')->name('profileUpdate');
});

Route::group(['middleware' => ['auth', 'Checkrole:1']], function () {
    Route::get('/admin/instansi', 'InstansiController@index')->name('instansiIndex');
    Route::post('/admin/instansi', 'InstansiController@store')->name('instansistore');
    Route::put('/admin/instansi', 'InstansiController@update')->name('instansiUpdate');
    Route::delete('/admin/instansi/delete/{id}', 'InstansiController@delete')->name('instansiDelete');

    Route::get('/admin/unit', 'UnitController@index')->name('unitIndex');
    Route::post('/admin/unit', 'UnitController@store')->name('unitstore');
    Route::put('/admin/unit', 'UnitController@update')->name('unitUpdate');
    Route::delete('/admin/unit/delete/{id}', 'UnitController@delete')->name('unitDelete');

    Route::get('/admin/satuan', 'SatuanController@index')->name('satuanIndex');
    Route::post('/admin/satuan', 'SatuanController@store')->name('satuanstore');
    Route::put('/admin/satuan', 'SatuanController@update')->name('satuanUpdate');
    Route::delete('/admin/satuan/delete/{id}', 'SatuanController@delete')->name('satuanDelete');

    Route::get('/admin/golongan', 'GolonganController@index')->name('golonganIndex');
    Route::post('/admin/golongan', 'GolonganController@store')->name('golonganstore');
    Route::put('/admin/golongan', 'GolonganController@update')->name('golonganUpdate');
    Route::delete('/admin/golongan/delete/{id}', 'GolonganController@delete')->name('golonganDelete');

    Route::get('/admin/jabatan', 'JabatanController@index')->name('jabatanIndex');
    Route::post('/admin/jabatan', 'JabatanController@store')->name('jabatanstore');
    Route::put('/admin/jabatan', 'JabatanController@update')->name('jabatanUpdate');
    Route::delete('/admin/jabatan/delete/{id}', 'JabatanController@delete')->name('jabatanDelete');

    Route::get('/admin/pegawai', 'PegawaiController@index')->name('pegawaiIndex');
    Route::post('/admin/pegawai', 'PegawaiController@store')->name('pegawaiStore');
    Route::put('/admin/pegawai', 'PegawaiController@update')->name('pegawaiUpdate');
    Route::delete('/admin/pegawai/delete/{id}', 'PegawaiController@delete')->name('pegawaiDelete');
    Route::get('/admin/pegawai/show/{id}', 'PegawaiController@show')->name('pegawaiShow');

    Route::get('/admin/ktp', 'KtpController@index')->name('ktpIndex');
    Route::post('/admin/ktp', 'KtpController@store')->name('ktpstore');
    Route::put('/admin/ktp', 'KtpController@update')->name('ktpUpdate');
    Route::delete('/admin/ktp/delete/{id}', 'KtpController@delete')->name('ktpDelete');
    Route::get('/admin/ktp/{id}', 'KtpController@show')->name('ktpShow');
});
