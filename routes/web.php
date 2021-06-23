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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', 'HomeController@check')->name('main-page');

Route::post('/cpanel/invoices/create/', 'InvoicesController@getSerialInfo')->name('serial-info-ajax');

Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function(){
    Route::get('/cpanel', 'HomeController@index')->name('home');
    Route::resource('/cpanel/clients','ClientsController');
    Route::resource('/cpanel/devices','DevicesController')->middleware('check.category');
    Route::resource('/cpanel/categories','CategoriesController');
    Route::resource('/cpanel/invoices','InvoicesController');
});

Route::get('locale/{locale}',function($locale){

    Session::put('locale',$locale);
    
       return redirect()->back();
    
    })
    ->name('switchLan');
