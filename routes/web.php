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
	// borrower 
	Route::get('/borrower','BorrowerController@index')->name('borrower');
	Route::post('/borrower','BorrowerController@store')->name('borrower');
	Route::get('/borrower/get_datatable','BorrowerController@get_datatable');
	Route::get('/borrower/new_borrower','BorrowerController@create')->name('new_borrower');	

	// borrower loan
	Route::get('/borrower_loan', 'BorrowerLoanController@index')->name('borrower_loan');
	Route::get('/borrower_loan/get_datatable', 'BorrowerLoanController@get_datatable');


	//setting
	// Route::get('/setting/setting_loan/get_datatable','LoanController@get_datatable');
	Route::get('/setting/setting_loan', 'LoanController@index')->name('setting_loan');
	Route::post('/setting/setting_loan', 'LoanController@store')->name('setting_loan');
	Route::get('/setting/setting_loan/new_setting_loan', 'LoanController@create')->name('new_setting_loan');

});


