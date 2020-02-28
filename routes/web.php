<?php

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

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::post('/resdaxod', 'HomeController@resdaxod');
Route::get('/datadax', 'HomeController@datadaxcategor');
Route::post('/qoshish', 'HomeController@qoshish');
Route::get('/dat', 'HomeController@qoshish');
Route::get('/mesto', 'HomeController@mesto');
Route::get('/rasxod', 'RasxodController@rasxod');
Route::get('/dataras', 'RasxodController@dataras');
Route::get('/rasmesto', 'RasxodController@rasmesto');
Route::post('/rasqoshish', 'RasxodController@rasqoshish');
Route::get('/deystviy', 'DoxodController@deystviy');
Route::post('/udalit', 'DoxodController@udalit');
Route::get('/deystviyper', 'DoxodController@deystviyper');
Route::post('/redakt', 'DoxodController@redakt');
Route::post('/qoshishred', 'HomeController@qoshishred');
Route::get('/doxodmeses', 'DoxodController@doxodmeses');
Route::get('/doxodmeses30', 'DoxodController@doxodmeses30');
Route::post('/mestoxr', 'DoxodController@mestoxr');
Route::get('/pochta', 'DoxodController@pochta');
Route::get('/get', 'DoxodController@get');