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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/byDevice', 'ByDeviceController@index')->name('byDevice');
Route::get('/welcome', function () { return view('welcome');});
Route::resource('codes','AddCodeController');
Route::resource('history','HistoryController');


Route::get('/map/status', function()
{
    /**'SELECT * FROM `GPS` WHERE Time IN (SELECT MAX(Time)FROM `GPS`GROUP BY Device)**/

    $users = DB::table('GPS')
        ->join('add_codes', 'add_codes.code', '=', 'GPS.Device')
        ->selectRaw('GPS.*')
        ->where('add_codes.user', '=', Auth::user()->getAuthIdentifier())
        ->whereRaw('GPS.Time IN (SELECT MAX(GPS.Time) FROM `GPS` GROUP BY GPS.Device)')
        ->get();

    return json_encode($users);
});

Route::get('/map/byDevice/{id?}', function($id = null)
{
    // $users = DB::table('GPS')->where('id', $id)->get();

    $users = DB::table('users')
        ->join('add_codes', 'add_codes.user', '=', 'users.id')
        ->join('GPS', 'add_codes.code', '=', 'GPS.Device')
        ->where('add_codes.user', '=', Auth::user()->getAuthIdentifier())
        ->where('GPS.Device' , '=', $id)
        ->select('users.*', 'GPS.*', 'add_codes.*')
        ->orderByDesc("GPS.Time")
        ->get();

    return json_encode($users);
});