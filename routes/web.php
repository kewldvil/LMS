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
    // return view('auth.login');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function ()
{
	Route::get('/borrower','BorrowerController@index')->name('borrower');
	Route::post('/borrower','BorrowerController@store')->name('borrower');
	Route::get('/borrower/get_datatable','BorrowerController@get_datatable');
	Route::get('/borrower/new_borrower','BorrowerController@create')->name('new_borrower');	
});

