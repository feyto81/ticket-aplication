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
    return redirect('/home');
});
Route::get('/login', 'HomeController@login')->name('login');
Route::post('/postlogin', 'HomeController@postlogin');
Route::get('/logout', 'HomeController@logout');

Route::group(['middleware' => ['auth', 'checkRole:1']], function () {

    //route of log activity
    Route::get('add-to-log', 'HomeController@myTestAddToLog');
    Route::get('/logActivity', 'HomeController@logActivity');
    //route of category
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/add-category', 'CategoryController@add_category');
    Route::post('/save-category', 'CategoryController@save_category');
    Route::get('/all-category', 'CategoryController@all_category');
    Route::get('/edit-category/{id}', 'CategoryController@edit_category');
    Route::post('/update-category/{id}', 'CategoryController@update_category');
    Route::get('/delete-category/{id}', 'CategoryController@delete_category');
    Route::get('/import-excel-category','CategoryController@excel');
    Route::post('/import-category','CategoryController@upload');

    //route of category
    Route::get('/add-ticket', 'TicketController@add_ticket');
    Route::post('/save-ticket', 'TicketController@save_ticket');
    Route::get('/all-ticket', 'TicketController@all_ticket');
    Route::get('/edit-ticket/{id}', 'TicketController@edit_ticket');
    Route::post('/update-ticket/{id}', 'TicketController@update_ticket');
    Route::get('/delete-ticket/{id}', 'TicketController@delete_ticket');

    //route of transaction
    Route::get('/transaction', 'TransactionController@add_transaction');
    Route::post('/save-transaction', 'TransactionController@save_transaction');
    Route::get('/delete-transaction/{id}', 'TransactionController@delete_transaction');
    Route::get('/transaction_finish', 'TransactionController@uproaf');


    //route of report
    Route::get('/day', 'ReportController@index');
    Route::get('/dayreport', 'ReportController@day_report');
    Route::get('/printdaygoogle', 'ReportController@print_day');
    Route::get('/printdaypdf', 'ReportController@print_day_pdf');
    Route::get('/printdayexcel', 'ReportController@print_day_excel');

    //route of user
    Route::get('/add-user', 'UserController@add_user');
    Route::post('/save-user', 'UserController@save_user');
    Route::get('/all-user', 'UserController@all_user');
    Route::get('/edit-user/{id}', 'UserController@edit_user');
    Route::post('/update-user/{id}', 'UserController@update_user');
    Route::get('/delete-user/{id}', 'UserController@delete_user');

    //route of setting
    Route::get('/edit-setting/{id}','SettingController@edit_setting');
    Route::post('/update-setting/{id}','SettingController@update_setting');
});
Route::group(['middleware' => ['auth', 'checkRole:1,2']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    //route of transaction
    Route::get('/transaction', 'TransactionController@add_transaction');
    Route::post('/save-transaction', 'TransactionController@save_transaction');
    Route::get('/delete-transaction/{id}', 'TransactionController@delete_transaction');
    Route::get('/transaction_finish', 'TransactionController@uproaf');
});
Route::group(['middleware' => ['auth', 'checkRole:1,3']], function () {

    //route of report day
    Route::get('/day', 'ReportController@index');
    Route::get('/dayreport', 'ReportController@day_report');
    Route::get('/printdaygoogle', 'ReportController@print_day');
    Route::get('/printdaypdf', 'ReportController@print_day_pdf');
    Route::get('/printdayexcel', 'ReportController@print_day_excel');

    //route of report month
    Route::get('/month','ReportController@month');
    Route::get('/monthreport', 'ReportController@month_report');
    Route::get('/printmonthgoogle', 'ReportController@print_month');
    Route::get('/printmonthpdf', 'ReportController@print_month_pdf');

    //route of report Years
    Route::get('/years','ReportController@years');
    Route::get('/yearsreport', 'ReportController@years_report');
    Route::get('/printyearsgoogle', 'ReportController@print_years');
    Route::get('/printyearspdf', 'ReportController@print_years_pdf');
    
});
Route::group(['middleware' => ['auth', 'checkRole:1,2,3']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/update-profile', 'ProfileController@updateProfile');
    Route::get('/password', 'ProfileController@password');
    Route::put('/update-password', 'ProfileController@updatepassword');
});
