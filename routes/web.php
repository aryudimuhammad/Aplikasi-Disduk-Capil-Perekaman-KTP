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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'Checkrole:1,2']], function () {
    Route::get('/user', 'UserController@index')->name('userIndex');
    Route::delete('/user/{id}', 'UserController@delete')->name('userDelete');
    Route::get('/home', 'HomeController@index')->name('home');
});
