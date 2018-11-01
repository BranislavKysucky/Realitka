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

Route::get('/', 'InzeratyController@index');

Auth::routes();

Route::resource('inzeraty', 'InzeratyController');

Route::get('moje_inzeraty',function (){
  return view('inzeraty/moje_inzeraty');
});

Route::get('/home', 'HomeController@index')->name('home');
