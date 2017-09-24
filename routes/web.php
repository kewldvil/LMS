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
	// Route::get('/borrower','BorrowerController@index')->name('borrower');
	// Route::post('/borrower','BorrowerController@store')->name('borrower');
	// Route::get('/borrower/get_datatable','BorrowerController@get_datatable');
	// Route::get('/borrower/new_borrower','BorrowerController@create')->name('new_borrower');
	Route::get('/borrower/get_datatable','BorrowerController@get_datatable');
	Route::resource('/borrower','BorrowerController');	

	// borrower loan
	// Route::get('/borrower_loan', 'BorrowerLoanController@index')->name('borrower_loan');
	// Route::post('/borrower_loan', 'BorrowerLoanController@store')->name('borrower_loan');
	// Route::get('/borrower_loan/new_borrower_loan', 'BorrowerLoanController@create')->name('new_borrower_loan');
	Route::get('/borrower_loan/get_datatable', 'BorrowerLoanController@get_datatable');
	Route::match(['PUT','PATCH'],'/borrower_loan/{borrower_loan_id}', 'BorrowerLoanController@cut_up')->name('borrower_loan.cut_up');
	Route::get('/borrower_loan/{borrower_loan}/edit_cut_up', 'BorrowerLoanController@edit_cut_up')->name('borrower_loan.edit_cut_up');
	Route::resource('/borrower_loan','BorrowerLoanController');
	Route::delete('/borrower_loan/{borrower_loan_id}/destroy_bl','BorrowerLoanController@destroy_bl')->name('borrower_loan.destroy_bl');

	//setting //loan
	Route::get('/setting/loan/get_datatable','LoanController@get_datatable');
	Route::resource('/setting/loan', 'LoanController');
	// Route::get('/setting/setting_loan', 'LoanController@index')->name('setting_loan');
	// Route::post('/setting/setting_loan', 'LoanController@store')->name('setting_loan');
	// Route::get('/setting/setting_loan/new_setting_loan', 'LoanController@create')->name('new_setting_loan');

});


