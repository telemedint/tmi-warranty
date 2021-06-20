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

Route::get('/', 'HomeController@home')->name('main-page');


Auth::routes(['register'=>false]);

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/clients','ClientsController');
    Route::resource('/devices','DevicesController')->middleware('check.category');
    Route::resource('/categories','CategoriesController');
    Route::resource('/invoices','InvoicesController');
});

Route::get('locale/{locale}',function($locale){

    Session::put('locale',$locale);
    
       return redirect()->back();
    
    })
    ->name('switchLan');
