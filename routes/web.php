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

Route::get('/', 'HomeController@checkSerial')->name('main-page');
Route::get('/device-details', 'HomeController@deviceDetails')->name('device-details');
Route::get('/request-maintenance/{id}', 'HomeController@requestMaintenance')->name('request-maintenance');
Route::get('/request-sent', 'HomeController@requestSent')->name('request-sent');
Route::get('/upgrade-license/{id}', 'HomeController@upgradeLicense')->name('upgrade-license');
Route::get('/payment/{id}', 'HomeController@payment')->name('payment');
Route::get('/upgraded-license', 'HomeController@upgradedLicense')->name('upgraded-license');

Route::post('/cpanel/invoices/create/', 'InvoicesController@getSerialInfo')->name('serial-info-ajax');
Route::post('/cpanel/devices/create/', 'DevicesController@getDevicePhoto')->name('device-photo-ajax');

Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function(){
    Route::get('/cpanel', 'HomeController@index')->name('home');
    Route::resource('/cpanel/clients','ClientsController');
    Route::resource('/cpanel/devices','DevicesController')->middleware('check.category');
    Route::resource('/cpanel/categories','CategoriesController');
    Route::resource('/cpanel/invoices','InvoicesController');
    Route::resource('/cpanel/tickets','TicketsController');
    Route::resource('/cpanel/photos','PhotosController');
    Route::post('/cpanel/tickets/', 'TicketsController@updateStatus')->name('tickets.updateStatus');
});

Route::get('locale/{locale}',function($locale){

    Session::put('locale',$locale);
    
       return redirect()->back();
    
    })
    ->name('switchLan');

    