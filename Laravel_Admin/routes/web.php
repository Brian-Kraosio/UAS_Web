<?php

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

Route::get('/bass','bass@index');
Route::get('/bassadd','bass@add');
Route::post('/bass/simpan','bass@simpan');
Route::get('/bass/hapus/{id}','bass@hapus');
Route::get('/bass/detail/{id}','bass@detail');
Route::get('/bass/edit/{id}','bass@edit');
Route::post('/bass/update','bass@update');
Route::get('/bass/bass','bass@bass');
Route::get('/bass/piano','bass@piano');
Route::get('/bass/violin','bass@violin');
Route::get('/bass/guitar','bass@guitar');
Route::get('/bass/search','bass@search');

Route::resource('/admin/users', 'Admin\UsersController',['except' =>['show','create','store']]);







Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
