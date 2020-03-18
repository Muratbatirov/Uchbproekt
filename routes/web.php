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

Route::get('/home', 'HomeController@index')->name('home');
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
Route::get('/admin/dashboard','Admin\HomeController@index')->name('admin.home');
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function(){
    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login');
        Route::post('/logout','LoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    });
});

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/balans', 'BalansController@balans');
Route::get('/daxtoolcat', 'ToolsController@daxtoolcat');
Route::get('/rastoolcat', 'ToolsController@rastoolcat');
Route::post('/daxtoolcatpag', 'ToolsController@daxtoolcatpag');
Route::post('/catdoxod', 'ToolsController@catdoxod');
Route::post('/catrasxod', 'ToolsController@catrasxod');
Route::post('/catdoxred', 'ToolsController@catdoxred');
Route::post('/catrasred', 'ToolsController@catrasred');
Route::post('/catredmat', 'ToolsController@catredmat');
Route::post('/catredmatras', 'ToolsController@catredmatras');
Route::post('/udaltooldox', 'ToolsController@udaltooldox');
Route::post('/udaltoolras', 'ToolsController@udaltoolras');
