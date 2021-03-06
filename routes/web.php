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

//Route::get('/admin', 'AdminController@login' );

Route::match(['get','post'],'/admin','AdminController@login'); 



Auth::routes();


Route::group(['middleware'=>['auth']], function()
{
    Route::get('/admin/dashboard', 'AdminController@dashboard');
    Route::get('/admin/settings','AdminController@settings');
    Route::get('/admin/check-pwd','AdminController@check_pwd');
    Route::match(['get','post'],'/admin/update-pwd','AdminController@update_pwd');
    Route::get('/logout','AdminController@logout');
    Route::resource('/admin/license','LicenseController');
    

});


//Route::get('/home', 'HomeController@index')->name('home');
