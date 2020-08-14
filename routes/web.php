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
Route::get('/pertanyaan', function () {
    return view('template');
});
Auth::routes();
Route::get('/all', 'BerandaController@all');
Route::get('/pertanyaan/{id}', 'BerandaController@show');
Route::post('/vote/store', 'VotePertanyaanController@store');

Route::get('/home', 'HomeController@index')->name('home');
