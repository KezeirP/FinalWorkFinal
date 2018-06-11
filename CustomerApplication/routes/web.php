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


use Cornford\Googlmapper\Facades\MapperFacade;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/history', 'HistoryController@index')->name('history');
//Route::get('/codes', 'AddCodeController@index')->name('codes');
Route::resource('codes','AddCodeController');
Route::resource('history','HistoryController');
Route::get('/lol', 'DataController@index')->name('history');
Route::get('/welcome', function () { return view('welcome');});
//Route::get('/addCode', function () {return view('addCode');});