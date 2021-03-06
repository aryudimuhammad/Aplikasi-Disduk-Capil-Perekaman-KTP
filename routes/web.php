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
    Route::post('/admin/pensiun', 'PensiunController@store')->name('pensiunStore');
    Route::put('/admin/pensiun', 'PensiunController@update')->name('pensiunUpdate');
    Route::patch('/admin/pensiun', 'PensiunController@status')->name('pensiunStatus');
    Route::delete('/admin/pensiun/delete/{id}', 'PensiunController@delete')->name('pensiunDelete');

    Route::get('/admin/cuti', 'CutiController@index')->name('cutiIndex');
    Route::post('/admin/cuti', 'CutiController@store')->name('cutiStore');
    Route::patch('/admin/cuti', 'CutiController@status')->name('cutiStatus');
    Route::put('/admin/cuti', 'CutiController@update')->name('cutiUpdate');
    Route::delete('/admin/cuti/delete/{id}', 'CutiController@delete')->name('cutiDelete');

    //perpanjang cuti
    Route::get('/admin/cuti/aktif', 'PerpanjangController@index')->name('perpanjangIndex');
    Route::get('/admin/perpanjang/masa/cuti/{id}', 'PerpanjangController@show')->name('perpanjangShow');
    Route::post('/admin/perpanjang/masa/cuti/{id}', 'PerpanjangController@store')->name('perpanjangStore');
    Route::put('/admin/perpanjang/masa/cuti/{id}', 'PerpanjangController@update')->name('perpanjangUpdate');
    Route::patch('/admin/perpanjang/masa/cuti/{id}', 'PerpanjangController@status')->name('perpanjangStatus');
    Route::delete('/admin/perpanjang/masa/cuti/{id}/{uuid}', 'PerpanjangController@delete')->name('perpanjangDelete');

    //Dashboard dan Profile
    Route::get('/home', 'HomeController@dashboard')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profileIndex');
    Route::post('/profile', 'HomeController@update')->name('profileUpdate');
});

Route::group(['middleware' => ['auth', 'Checkrole:1']], function () {
    Route::get('/admin/instansi', 'InstansiController@index')->name('instansiIndex');
    Route::post('/admin/instansi', 'InstansiController@store')->name('instansiStore');
    Route::put('/admin/instansi', 'InstansiController@update')->name('instansiUpdate');
    Route::delete('/admin/instansi/delete/{id}', 'InstansiController@delete')->name('instansiDelete');

    Route::get('/admin/unit', 'UnitController@index')->name('unitIndex');
    Route::post('/admin/unit', 'UnitController@store')->name('unitStore');
    Route::put('/admin/unit', 'UnitController@update')->name('unitUpdate');
    Route::delete('/admin/unit/delete/{id}', 'UnitController@delete')->name('unitDelete');

    Route::get('/admin/satuan', 'SatuanController@index')->name('satuanIndex');
    Route::post('/admin/satuan', 'SatuanController@store')->name('satuanStore');
    Route::put('/admin/satuan', 'SatuanController@update')->name('satuanUpdate');
    Route::delete('/admin/satuan/delete/{id}', 'SatuanController@delete')->name('satuanDelete');

    Route::get('/admin/golongan', 'GolonganController@index')->name('golonganIndex');
    Route::post('/admin/golongan', 'GolonganController@store')->name('golonganStore');
    Route::put('/admin/golongan', 'GolonganController@update')->name('golonganUpdate');
    Route::delete('/admin/golongan/delete/{id}', 'GolonganController@delete')->name('golonganDelete');

    Route::get('/admin/jabatan', 'JabatanController@index')->name('jabatanIndex');
    Route::post('/admin/jabatan', 'JabatanController@store')->name('jabatanStore');
    Route::put('/admin/jabatan', 'JabatanController@update')->name('jabatanUpdate');
    Route::delete('/admin/jabatan/delete/{id}', 'JabatanController@delete')->name('jabatanDelete');

    Route::get('/admin/pegawai', 'PegawaiController@index')->name('pegawaiIndex');
    Route::post('/admin/pegawai', 'PegawaiController@store')->name('pegawaiStore');
    Route::put('/admin/pegawai', 'PegawaiController@update')->name('pegawaiUpdate');
    Route::delete('/admin/pegawai/delete/{id}', 'PegawaiController@delete')->name('pegawaiDelete');
    Route::get('/admin/pegawai/show/{id}', 'PegawaiController@show')->name('pegawaiShow');

    Route::get('/admin/ktp', 'KtpController@index')->name('ktpIndex');
    Route::post('/admin/ktp', 'KtpController@store')->name('ktpStore');
    Route::put('/admin/ktp', 'KtpController@update')->name('ktpUpdate');
    Route::patch('/admin/ktp', 'KtpController@status')->name('ktpStatus');
    Route::delete('/admin/ktp/delete/{id}', 'KtpController@delete')->name('ktpDelete');
    Route::get('/admin/ktp/{id}', 'KtpController@show')->name('ktpShow');

    //Cetak Laporan
    Route::get('/cetak/pegawai', 'CetakController@pegawai')->name('pegawaiCetak');
    Route::get('/cetak/pegawaitgl', 'CetakController@pegawaitgl')->name('pegawaitglCetak');
    Route::get('/cetak/ktp', 'CetakController@ktp')->name('ktpCetak');
    Route::get('/cetak/ktptgl', 'CetakController@ktptgl')->name('ktptglCetak');
    Route::get('/cetak/pensiun', 'CetakController@pensiun')->name('pensiunCetak');
    Route::get('/cetak/pensiuntgl', 'CetakController@pensiuntgl')->name('pensiuntglCetak');
    Route::get('/cetak/cuti', 'CetakController@cuti')->name('cutiCetak');
    Route::get('/cetak/cutitgl', 'CetakController@cutitgl')->name('cutitglCetak');
    Route::get('/cetak/perpanjang/cuti', 'CetakController@perpanjang')->name('perpanjangCetak');
    Route::get('/cetak/perpanjangtgl/cuti', 'CetakController@perpanjangtgl')->name('perpanjangtglCetak');
    Route::get('/cetak/instansi', 'CetakController@instansi')->name('instansiCetak');
    Route::get('/cetak/unit', 'CetakController@unit')->name('unitCetak');
    Route::get('/cetak/unitnama', 'CetakController@unitnama')->name('unitnamaCetak');
    Route::get('/cetak/satuan', 'CetakController@satuan')->name('satuanCetak');
    Route::get('/cetak/satuannama', 'CetakController@satuannama')->name('satuannamaCetak');
    Route::get('/cetak/golongan', 'CetakController@golongan')->name('golonganCetak');
    Route::get('/cetak/golongannama', 'CetakController@golongannama')->name('golongannamaCetak');
    Route::get('/cetak/jabatan', 'CetakController@jabatan')->name('jabatanCetak');
    Route::get('/cetak/jabatannama', 'CetakController@jabatannama')->name('jabatannamaCetak');
    Route::get('/cetak/ktpsementara/{id}', 'CetakController@ktpsementara')->name('ktpsementaraCetak');
});
